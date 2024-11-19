<?php

namespace App\Http\Controllers;

use App\Models\NRMParticipant;
use App\Models\NrmTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;

class NrmParticipantController extends Controller
{
    /**
     * Display a list of participants for a specific NRM training program.
     */
    public function listParticipants(Request $request, $nrmTrainingId)
    {
        $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);

        // Get search query
        $search = $request->input('search');

        // Number of entries per page
        $entries = $request->get('entries', 10);

        // Fetch participants with pagination
        $nrmParticipants = NRMParticipant::where('nrm_training_id', $nrmTrainingId)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('nic', 'like', "%{$search}%")
                             ->orWhere('address_institution', 'like', "%{$search}%")
                             ->orWhere('contact_number', 'like', "%{$search}%")
                             ->orWhere('designation', 'like', "%{$search}%")
                             ->orWhere('youth', 'like', "%{$search}%");
            })
            ->paginate($entries);

        // Calculate total participants
        $totalParticipants = $nrmParticipants->total();

        // Pass variables to the view
        return view('nrm_participants.index', compact('nrmTraining', 'nrmParticipants', 'totalParticipants', 'search', 'entries'));
    }




    /**
     * Show the form to create a new participant for a specific NRM training program.
     */
    public function create($nrm_training_id)
    {
        $nrmTraining = NrmTraining::findOrFail($nrm_training_id);
        return view('nrm_participants.create', compact('nrmTraining'));
    }

    /**
     * Store a new participant for a specific NRM training program.
     */
    public function store(Request $request, $nrmTrainingId)
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

        $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);

        // Calculate the youth status
        $youth = ($request->age >= 18 && $request->age <= 35) ? 'Youth' : 'Not Youth';

        // Create a new NRM participant
        $nrmTraining->nrmParticipants()->create([
            'name' => $request->name,
            'nic' => $request->nic,
            'address_institution' => $request->address_institution,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'designation' => $request->designation,
            'age' => $request->age,
            'youth' => $youth,
        ]);

        return redirect()->route('nrm-participants.list', $nrmTrainingId)->with('success', 'NRM Participant added successfully.');
    }

    /**
     * Delete a participant from a specific NRM training program.
     */
    public function destroy($nrmTrainingId, $nrmParticipantId)
    {
        $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);
        $nrmParticipant = NRMParticipant::where('nrm_training_id', $nrmTrainingId)->findOrFail($nrmParticipantId);

        $nrmParticipant->delete();

        return redirect()->route('nrm-participants.list', $nrmTrainingId)->with('success', 'NRM Participant deleted successfully.');
    }

    /**
     * Upload CSV and import NRM participants for a specific NRM training program.
     */
    public function uploadCsv(Request $request, $nrmTrainingId)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Create the CSV reader
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // This assumes the first row of your CSV contains headers

        // Find the NRM training program
        $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);

        foreach ($csv as $row) {
            $age = $row['Age'];
            $youth = ($age >= 18 && $age <= 35) ? 'Youth' : 'Not Youth';

            // Create a new NRM participant
            $nrmTraining->nrmParticipants()->create([
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

        return redirect()->route('nrm-participants.list', $nrmTrainingId)->with('success', 'NRM Participants uploaded successfully.');
    }

    /**
     * Download CSV report of all NRM participants for a specific NRM training program.
     */
    public function downloadCsv($nrmTrainingId)
    {
        // Fetch participants for the given NRM training program
        $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);
        $nrmParticipants = $nrmTraining->nrmParticipants;

        // Create a CSV writer instance
        $csv = Writer::createFromString('');

        // Add header row to the CSV
        $csv->insertOne(['Name', 'NIC', 'Address/Institution', 'Contact Number', 'Gender', 'Designation', 'Age', 'Youth']);

        // Add participant rows to the CSV
        foreach ($nrmParticipants as $nrmParticipant) {
            $csv->insertOne([
                $nrmParticipant->name,
                $nrmParticipant->nic,
                $nrmParticipant->address_institution,
                $nrmParticipant->contact_number,
                $nrmParticipant->gender,
                $nrmParticipant->designation,
                $nrmParticipant->age,
                $nrmParticipant->youth,
            ]);
        }

        // Create a CSV file and return it as a download
        $filename = 'nrm_participants_' . $nrmTrainingId . '.csv';
        Storage::disk('local')->put($filename, $csv->toString());

        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }
    public function search(Request $request, $nrmTrainingId)
{
    $nrmTraining = NrmTraining::findOrFail($nrmTrainingId);

    // If there's a search query, filter participants
    $search = $request->input('search');

    // Get 'entries' from request (for pagination), default to 10 if not present
    $entries = $request->get('entries', 10);

    $nrmParticipants = NrmParticipant::where('nrm_training_id', $nrmTrainingId)
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('nic', 'like', "%{$search}%")
                         ->orWhere('address_institution', 'like', "%{$search}%")
                         ->orWhere('contact_number', 'like', "%{$search}%")
                         ->orWhere('designation', 'like', "%{$search}%")
                         ->orWhere('youth', 'like', "%{$search}%");
        })
        ->paginate($entries);

        // Calculate total participants (after filtering)
    $totalParticipants = $nrmParticipants->total();

    return view('nrm_participants.index', compact('nrmTraining', 'nrmParticipants', 'totalParticipants',  'search', 'entries'));
}

}
