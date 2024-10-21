<?php

namespace App\Http\Controllers;



use App\Models\FFSParticipant;
use App\Models\FFSTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;


class FFSParticipantController extends Controller
{
    /**
     * Display a list of participants for a specific FFS training program.
     */
    public function listParticipants(Request $request, $ffsTrainingId)
    {
        $ffsTraining = FFSTraining::findOrFail($ffsTrainingId);

        // If there's a search query, filter participants
        $search = $request->input('search');
        
        $ffsParticipants = FFSParticipant::where('ffs_training_id', $ffsTrainingId)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('nic', 'like', "%{$search}%")
                             ->orWhere('address_institution', 'like', "%{$search}%")
                             ->orWhere('contact_number', 'like', "%{$search}%")
                             ->orWhere('designation', 'like', "%{$search}%")
                             ->orWhere('youth', 'like', "%{$search}%");
            })
            ->get();
            return view('ffs_participants.index', compact('ffsTraining', 'ffsParticipants', 'search'));

        // return view('ffs_participant.index', compact('ffsTraining', 'ffsParticipants', 'search'));
    }

    /**
     * Show the form to create a new participant for a specific FFS training program.
     */
    public function create($ffs_training_id)
{
    $ffsTraining = FFSTraining::findOrFail($ffs_training_id);
    return view('ffs_participants.create', compact('ffsTraining'));
}


    /**
     * Store a new participant for a specific FFS training program.
     */
    public function store(Request $request, $ffsTrainingId)
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

        $ffsTraining = FFSTraining::findOrFail($ffsTrainingId);

        // Calculate the youth status
        $youth = ($request->age >= 18 && $request->age <= 35) ? 'Youth' : 'Not Youth';

        // Create a new FFS participant
        $ffsTraining->ffsParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('ffs-participants.list', $ffsTrainingId)->with('success', 'FFS Participant added successfully.');
    }

    /**
     * Delete a participant from a specific FFS training program.
     */
    public function destroy($ffsTrainingId, $ffsParticipantId)
    {
        $ffsTraining = FFSTraining::findOrFail($ffsTrainingId);
        $ffsParticipant = FFSParticipant::where('ffs_training_id', $ffsTrainingId)->findOrFail($ffsParticipantId);

        $ffsParticipant->delete();

        return redirect()->route('ffs-participants.list', $ffsTrainingId)->with('success', 'FFS Participant deleted successfully.');
    }

    /**
     * Upload CSV and import FFS participants for a specific FFS training program.
     */
    public function uploadCsv(Request $request, $ffsTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Create the CSV reader
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // This assumes the first row of your CSV contains headers

        // Find the FFS training program
        $ffsTraining = FFSTraining::findOrFail($ffsTrainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 35) ? 'Youth' : 'Not Youth';

            // Create a new FFS participant
            $ffsTraining->ffsParticipants()->create([
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

        return redirect()->route('ffs-participants.list', $ffsTrainingId)->with('success', 'FFS Participants uploaded successfully.');
    }

    /**
     * Download CSV report of all FFS participants for a specific FFS training program.
     */
    public function downloadCsv($ffsTrainingId)
    {
        // Fetch participants for the given FFS training program
        $ffsTraining = FFSTraining::findOrFail($ffsTrainingId);
        $ffsParticipants = $ffsTraining->ffsParticipants;

        // Create a CSV writer instance
        $csv = Writer::createFromString('');

        // Add header row to the CSV
        $csv->insertOne(['Name', 'NIC', 'Address/Institution', 'Contact Number', 'Gender', 'Designation', 'Age', 'Youth']);

        // Add participant rows to the CSV
        foreach ($ffsParticipants as $ffsParticipant) {
            $csv->insertOne([
                $ffsParticipant->name,
                $ffsParticipant->nic,
                $ffsParticipant->address_institution,
                $ffsParticipant->contact_number,
                $ffsParticipant->gender,
                $ffsParticipant->designation,
                $ffsParticipant->age,
                $ffsParticipant->youth,
            ]);
        }

        // Create a CSV file and return it as a download
        $filename = 'ffs_participants_' . $ffsTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());

        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }
    
}
