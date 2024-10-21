<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Training;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    /**
     * Display a list of participants for a specific training program.
     */
    public function listParticipants(Request $request, $trainingId)
    {
        $training = Training::findOrFail($trainingId);

        // If there's a search query, filter participants
        $search = $request->input('search');
        
        $participants = Participant::where('training_id', $trainingId)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('nic', 'like', "%{$search}%")
                             ->orWhere('address_institution', 'like', "%{$search}%")
                             ->orWhere('contact_number', 'like', "%{$search}%")
                             ->orWhere('designation', 'like', "%{$search}%")
                             ->orWhere('youth', 'like', "%{$search}%");
            })
            ->get();

        return view('participant.index', compact('training', 'participants', 'search'));
    }

    /**
     * Show the form to create a new participant for a specific training program.
     */
    public function create($trainingId)
    {
        $training = Training::findOrFail($trainingId);
        return view('participant.create', compact('training'));
    }

    /**
     * Store a new participant for a specific training program.
     */
    public function store(Request $request, $trainingId)
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

        $training = Training::findOrFail($trainingId);

        // Calculate the youth status
        $youth = ($request->age >= 18 && $request->age <= 35) ? 'Youth' : 'Not Youth';

        // Create a new participant
        $training->participants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('participants.list', $trainingId)->with('success', 'Participant added successfully.');
    }

    /**
     * Delete a participant from a specific training program.
     */
    public function destroy($trainingId, $participantId)
    {
        $training = Training::findOrFail($trainingId);
        $participant = Participant::where('training_id', $trainingId)->findOrFail($participantId);

        $participant->delete();

        return redirect()->route('participants.list', $trainingId)->with('success', 'Participant deleted successfully.');
    }

    /**
     * Upload CSV and import participants for a specific training program.
     */
    public function uploadCsv(Request $request, $trainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Create the CSV reader
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // This assumes the first row of your CSV contains headers

        // Find the training program
        $training = Training::findOrFail($trainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 35) ? 'Youth' : 'Not Youth';

            // Create a new participant
            $training->participants()->create([
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

        return redirect()->route('participants.list', $trainingId)->with('success', 'Participants uploaded successfully.');
    }

    /**
     * Download CSV report of all participants for a specific training program.
     */
    public function downloadCsv($trainingId)
    {
        // Fetch participants for the given training program
        $training = Training::findOrFail($trainingId);
        $participants = $training->participants;

        // Create a CSV writer instance
        $csv = Writer::createFromString('');

        // Add header row to the CSV
        $csv->insertOne(['Name', 'NIC', 'Address/Institution', 'Contact Number', 'Gender', 'Designation', 'Age', 'Youth']);

        // Add participant rows to the CSV
        foreach ($participants as $participant) {
            $csv->insertOne([
                $participant->name,
                $participant->nic,
                $participant->address_institution,
                $participant->contact_number,
                $participant->gender,
                $participant->designation,
                $participant->age,
                $participant->youth,
            ]);
        }

        // Create a CSV file and return it as a download
        $filename = 'participants_' . $trainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());

        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }
}
