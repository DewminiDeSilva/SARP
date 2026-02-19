<?php

namespace App\Http\Controllers;

use App\Models\LivestockTraining;
use App\Models\LivestockTrainingParticipant;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class LivestockTrainingParticipantController extends Controller
{
    public function listParticipants(Request $request, $livestockTrainingId)
    {
        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = LivestockTrainingParticipant::where('livestock_training_id', $livestockTrainingId)
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

        return view('livestock_training_participants.index', compact('livestockTraining', 'participants', 'totalParticipants', 'search', 'entries'));
    }

    public function create($livestock_training_id)
    {
        $livestockTraining = LivestockTraining::findOrFail($livestock_training_id);
        return view('livestock_training_participants.create', compact('livestockTraining'));
    }

    public function store(Request $request, $livestockTrainingId)
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

        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);
        $youth = ($request->age >= 18 && $request->age <= 35) ? 'Youth' : 'Not Youth';

        $livestockTraining->livestockTrainingParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('livestock-training-participants.list', $livestockTrainingId)->with('success', 'Livestock training participant added successfully.');
    }

    public function destroy($livestockTrainingId, $participantId)
    {
        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);
        $participant = LivestockTrainingParticipant::where('livestock_training_id', $livestockTrainingId)->findOrFail($participantId);
        $participant->delete();
        return redirect()->route('livestock-training-participants.list', $livestockTrainingId)->with('success', 'Livestock training participant deleted successfully.');
    }

    public function uploadCsv(Request $request, $livestockTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);

        foreach ($csv as $row) {
            $age = (int) ($row['Age'] ?? 0);
            $youth = ($age >= 18 && $age <= 35) ? 'Youth' : 'Not Youth';
            $livestockTraining->livestockTrainingParticipants()->create([
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

        return redirect()->route('livestock-training-participants.list', $livestockTrainingId)->with('success', 'Livestock training participants uploaded successfully.');
    }

    public function downloadCsv($livestockTrainingId)
    {
        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);
        $participants = $livestockTraining->livestockTrainingParticipants;

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

        $filename = 'livestock_training_participants_' . $livestockTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }

    public function search(Request $request, $livestockTrainingId)
    {
        $livestockTraining = LivestockTraining::findOrFail($livestockTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = LivestockTrainingParticipant::where('livestock_training_id', $livestockTrainingId)
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
        return view('livestock_training_participants.index', compact('livestockTraining', 'participants', 'totalParticipants', 'search', 'entries'));
    }
}
