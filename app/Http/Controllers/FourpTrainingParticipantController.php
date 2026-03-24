<?php

namespace App\Http\Controllers;

use App\Models\FourpTraining;
use App\Models\FourpTrainingParticipant;
use App\Support\TrainingParticipantStats;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class FourpTrainingParticipantController extends Controller
{
    public function listParticipants(Request $request, $fourpTrainingId)
    {
        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = FourpTrainingParticipant::where('fourp_training_id', $fourpTrainingId)
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
            FourpTrainingParticipant::class,
            'fourp_training_id',
            $fourpTrainingId
        );

        return view('fourp_training_participants.index', array_merge(
            compact('fourpTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }

    public function create($fourp_training_id)
    {
        $fourpTraining = FourpTraining::findOrFail($fourp_training_id);
        return view('fourp_training_participants.create', compact('fourpTraining'));
    }

    public function store(Request $request, $fourpTrainingId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'address_institution' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'designation' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
        ]);

        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);
        $youth = ($request->age >= 18 && $request->age <= 40) ? 'Youth' : 'Not Youth';

        $fourpTraining->fourpTrainingParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('4p-training-participants.list', $fourpTrainingId)->with('success', '4P training participant added successfully.');
    }

    public function destroy($fourpTrainingId, $participantId)
    {
        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);
        $participant = FourpTrainingParticipant::where('fourp_training_id', $fourpTrainingId)->findOrFail($participantId);
        $participant->delete();
        return redirect()->route('4p-training-participants.list', $fourpTrainingId)->with('success', '4P training participant deleted successfully.');
    }

    public function uploadCsv(Request $request, $fourpTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 40) ? 'Youth' : 'Not Youth';
            $fourpTraining->fourpTrainingParticipants()->create([
                'name' => $row['Name'],
                'nic' => $row['NIC'],
                'address_institution' => $row['Address/Institution'],
                'contact_number' => $row['Contact Number'],
                'gender' => $row['Gender'],
                'designation' => $row['Designation'],
                'age' => $age,
                'youth' => $youth,
            ]);
        }

        return redirect()->route('4p-training-participants.list', $fourpTrainingId)->with('success', '4P training participants uploaded successfully.');
    }

    public function downloadCsv($fourpTrainingId)
    {
        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);
        $participants = $fourpTraining->fourpTrainingParticipants;

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

        $filename = '4p_training_participants_' . $fourpTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }

    public function search(Request $request, $fourpTrainingId)
    {
        $fourpTraining = FourpTraining::findOrFail($fourpTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = FourpTrainingParticipant::where('fourp_training_id', $fourpTrainingId)
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
            FourpTrainingParticipant::class,
            'fourp_training_id',
            $fourpTrainingId
        );

        return view('fourp_training_participants.index', array_merge(
            compact('fourpTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }
}
