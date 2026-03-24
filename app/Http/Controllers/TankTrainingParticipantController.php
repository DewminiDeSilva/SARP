<?php

namespace App\Http\Controllers;

use App\Models\TankTraining;
use App\Models\TankTrainingParticipant;
use App\Support\TrainingParticipantStats;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class TankTrainingParticipantController extends Controller
{
    public function listParticipants(Request $request, $tankTrainingId)
    {
        $tankTraining = TankTraining::findOrFail($tankTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = TankTrainingParticipant::where('tank_training_id', $tankTrainingId)
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
            TankTrainingParticipant::class,
            'tank_training_id',
            $tankTrainingId
        );

        return view('tank_training_participants.index', array_merge(
            compact('tankTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }

    public function create($tank_training_id)
    {
        $tankTraining = TankTraining::findOrFail($tank_training_id);
        return view('tank_training_participants.create', compact('tankTraining'));
    }

    public function store(Request $request, $tankTrainingId)
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

        $tankTraining = TankTraining::findOrFail($tankTrainingId);
        $youth = ($request->age >= 18 && $request->age <= 40) ? 'Youth' : 'Not Youth';

        $tankTraining->tankTrainingParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('tank-training-participants.list', $tankTrainingId)->with('success', 'Tank training participant added successfully.');
    }

    public function destroy($tankTrainingId, $participantId)
    {
        $tankTraining = TankTraining::findOrFail($tankTrainingId);
        $participant = TankTrainingParticipant::where('tank_training_id', $tankTrainingId)->findOrFail($participantId);
        $participant->delete();
        return redirect()->route('tank-training-participants.list', $tankTrainingId)->with('success', 'Tank training participant deleted successfully.');
    }

    public function uploadCsv(Request $request, $tankTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $tankTraining = TankTraining::findOrFail($tankTrainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 40) ? 'Youth' : 'Not Youth';
            $tankTraining->tankTrainingParticipants()->create([
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

        return redirect()->route('tank-training-participants.list', $tankTrainingId)->with('success', 'Tank training participants uploaded successfully.');
    }

    public function downloadCsv($tankTrainingId)
    {
        $tankTraining = TankTraining::findOrFail($tankTrainingId);
        $participants = $tankTraining->tankTrainingParticipants;

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

        $filename = 'tank_training_participants_' . $tankTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());
        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }

    public function search(Request $request, $tankTrainingId)
    {
        $tankTraining = TankTraining::findOrFail($tankTrainingId);
        $search = $request->input('search');
        $entries = $request->get('entries', 10);

        $participants = TankTrainingParticipant::where('tank_training_id', $tankTrainingId)
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
            TankTrainingParticipant::class,
            'tank_training_id',
            $tankTrainingId
        );

        return view('tank_training_participants.index', array_merge(
            compact('tankTraining', 'participants', 'search', 'entries'),
            $stats
        ));
    }
}
