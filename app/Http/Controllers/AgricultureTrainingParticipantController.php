<?php

namespace App\Http\Controllers;

use App\Models\AgricultureTraining;
use App\Models\AgricultureTrainingParticipant;
use App\Support\TrainingParticipantStats;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class AgricultureTrainingParticipantController extends Controller
{
    public function listParticipants(Request $request, $agricultureTrainingId)
    {
        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = AgricultureTrainingParticipant::where('agriculture_training_id', $agricultureTrainingId)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('nic', 'like', "%{$search}%")
                    ->orWhere('address_institution', 'like', "%{$search}%")
                    ->orWhere('contact_number', 'like', "%{$search}%")
                    ->orWhere('designation', 'like', "%{$search}%")
                    ->orWhere('youth', 'like', "%{$search}%");
            })
            ->paginate($entries)
            ->appends(['search' => $search, 'entries' => $entries]);

        $stats = TrainingParticipantStats::forProgram(
            AgricultureTrainingParticipant::class,
            'agriculture_training_id',
            $agricultureTrainingId
        );

        return view('agriculture_training_participants.index', array_merge(
            compact('agricultureTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }

    public function create($agriculture_training_id)
    {
        $agricultureTraining = AgricultureTraining::findOrFail($agriculture_training_id);
        return view('agriculture_training_participants.create', compact('agricultureTraining'));
    }

    public function store(Request $request, $agricultureTrainingId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:255',
            'address_institution' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'designation' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
        ]);

        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);
        $youth = ($request->age >= 18 && $request->age <= 40) ? 'Youth' : 'Not Youth';

        $agricultureTraining->agricultureTrainingParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('agriculture-training-participants.list', $agricultureTrainingId)->with('success', 'Agriculture training participant added successfully.');
    }

    public function destroy($agricultureTrainingId, $participantId)
    {
        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);
        $participant = AgricultureTrainingParticipant::where('agriculture_training_id', $agricultureTrainingId)->findOrFail($participantId);
        $participant->delete();
        return redirect()->route('agriculture-training-participants.list', $agricultureTrainingId)->with('success', 'Agriculture training participant deleted successfully.');
    }

    public function uploadCsv(Request $request, $agricultureTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);

        foreach ($csv as $row) {
            $age = (int) ($row['Age'] ?? 0);
            $youth = ($age >= 18 && $age <= 40) ? 'Youth' : 'Not Youth';
            $agricultureTraining->agricultureTrainingParticipants()->create([
                'name' => $row['Name'] ?? '',
                'nic' => $row['NIC'] ?? '',
                'address_institution' => $row['Address/Institution'] ?? '',
                'contact_number' => $row['Contact Number'] ?? '',
                'gender' => strtolower($row['Gender'] ?? 'male') === 'female' ? 'female' : 'male',
                'designation' => $row['Designation'] ?? '',
                'age' => $age,
                'youth' => $youth,
            ]);
        }

        return redirect()->route('agriculture-training-participants.list', $agricultureTrainingId)->with('success', 'Agriculture training participants uploaded successfully.');
    }

    public function downloadCsv($agricultureTrainingId)
    {
        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);
        $participants = $agricultureTraining->agricultureTrainingParticipants;

        $csv = Writer::createFromString('');
        $csv->insertOne(['Name', 'NIC', 'Address/Institution', 'Contact Number', 'Gender', 'Designation', 'Age', 'Youth']);

        foreach ($participants as $p) {
            $csv->insertOne([
                $p->name,
                $p->nic,
                $p->address_institution,
                $p->contact_number,
                $p->gender,
                $p->designation,
                $p->age,
                $p->youth,
            ]);
        }

        $filename = 'agriculture_training_participants_' . $agricultureTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }

    public function search(Request $request, $agricultureTrainingId)
    {
        $agricultureTraining = AgricultureTraining::findOrFail($agricultureTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = AgricultureTrainingParticipant::where('agriculture_training_id', $agricultureTrainingId)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nic', 'like', "%{$search}%")
                        ->orWhere('address_institution', 'like', "%{$search}%")
                        ->orWhere('contact_number', 'like', "%{$search}%")
                        ->orWhere('designation', 'like', "%{$search}%")
                        ->orWhere('youth', 'like', "%{$search}%")
                        ->orWhereRaw('LOWER(gender) LIKE ?', ['%' . strtolower($search) . '%']);
                });
            })
            ->paginate($entries)
            ->appends(['search' => $search, 'entries' => $entries]);

        $stats = TrainingParticipantStats::forProgram(
            AgricultureTrainingParticipant::class,
            'agriculture_training_id',
            $agricultureTrainingId
        );

        return view('agriculture_training_participants.index', array_merge(
            compact('agricultureTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }
}
