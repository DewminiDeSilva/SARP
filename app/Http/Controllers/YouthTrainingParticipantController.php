<?php

namespace App\Http\Controllers;

use App\Models\YouthTraining;
use App\Models\YouthTrainingParticipant;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class YouthTrainingParticipantController extends Controller
{
    public function listParticipants(Request $request, $youthTrainingId)
    {
        $youthTraining = YouthTraining::findOrFail($youthTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)
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

        $totalParticipants = $participants->total();
        $maleCount = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)->where('gender', 'male')->count();
        $femaleCount = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)->where('gender', 'female')->count();

        return view('youth_training_participants.index', compact('youthTraining', 'participants', 'totalParticipants', 'maleCount', 'femaleCount', 'search', 'entries'));
    }

    public function create($youth_training_id)
    {
        $youthTraining = YouthTraining::findOrFail($youth_training_id);
        return view('youth_training_participants.create', compact('youthTraining'));
    }

    public function store(Request $request, $youthTrainingId)
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

        $youthTraining = YouthTraining::findOrFail($youthTrainingId);
        $youth = ($request->age >= 18 && $request->age <= 35) ? 'Youth' : 'Not Youth';

        $youthTraining->youthTrainingParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('youth-training-participants.list', $youthTrainingId)->with('success', 'Youth training participant added successfully.');
    }

    public function destroy($youthTrainingId, $participantId)
    {
        $youthTraining = YouthTraining::findOrFail($youthTrainingId);
        $participant = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)->findOrFail($participantId);
        $participant->delete();
        return redirect()->route('youth-training-participants.list', $youthTrainingId)->with('success', 'Youth training participant deleted successfully.');
    }

    public function uploadCsv(Request $request, $youthTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $youthTraining = YouthTraining::findOrFail($youthTrainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 35) ? 'Youth' : 'Not Youth';
            $youthTraining->youthTrainingParticipants()->create([
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

        return redirect()->route('youth-training-participants.list', $youthTrainingId)->with('success', 'Youth training participants uploaded successfully.');
    }

    public function downloadCsv($youthTrainingId)
    {
        $youthTraining = YouthTraining::findOrFail($youthTrainingId);
        $participants = $youthTraining->youthTrainingParticipants;

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

        $filename = 'youth_training_participants_' . $youthTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }

    public function search(Request $request, $youthTrainingId)
    {
        $youthTraining = YouthTraining::findOrFail($youthTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)
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

        $totalParticipants = $participants->total();
        $maleCount = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)->where('gender', 'male')->count();
        $femaleCount = YouthTrainingParticipant::where('youth_training_id', $youthTrainingId)->where('gender', 'female')->count();
        return view('youth_training_participants.index', compact('youthTraining', 'participants', 'totalParticipants', 'maleCount', 'femaleCount', 'search', 'entries'));
    }
}
