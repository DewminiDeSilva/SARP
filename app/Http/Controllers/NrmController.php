<?php

namespace App\Http\Controllers;

use App\Models\NrmTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;

class NrmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = request()->get('entries', 10); // Get 'entries' from request, default to 10 if not present
        $nrmtrainings = NrmTraining::latest()->paginate($entries)->appends(['entries' => $entries]);

        // Calculate the total value of Program Cost
        $totalProgramCost = NrmTraining::sum('training_program_cost'); // Assuming training_program_cost is numeric

        // Count the total number of NRM training programs
        $totalPrograms = NrmTraining::count(); // Assuming you want to count all programs

        // Pass the variables to the view
        return view('nrm.nrm_index', compact('nrmtrainings', 'entries', 'totalProgramCost', 'totalPrograms'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nrm.nrm_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nrmtraining = new NrmTraining;
        $nrmtraining->program_name = request('program_name');
        $nrmtraining->program_number = request('program_number');
        $nrmtraining->crop_name = request('crop_name');
        $nrmtraining->date = request('date');
        $nrmtraining->venue = request('venue');  // Changed 'place' to 'venue'
        $nrmtraining->resource_person_name = request('resource_person_name');  // Changed 'conductor_name' to 'resource_person_name'
        $nrmtraining->training_program_cost = request('training_program_cost');  // Changed 'conductor_payment' to 'training_program_cost'
        $nrmtraining->resource_person_payment = request('resource_person_payment');  // New field for resource person payment
        $nrmtraining->province_name = request('province_name');
        $nrmtraining->district = request('district');
        $nrmtraining->ds_division_name = request('ds_division_name');
        $nrmtraining->gn_division_name = request('gn_division_name');
        $nrmtraining->as_center = request('as_center');
        $nrmtraining->save();

        return redirect('/nrmtraining')->with('success', 'Training program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $nrmTraining = NrmTraining::findOrFail($id); // Fetch the specific NRM training by ID
    return view('nrm.show', compact('nrmTraining')); // Return the show view with the training details
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nrm = NrmTraining::findOrFail($id); // Fetch the NRM training program by ID
        return view('nrm.nrm_edit', compact('nrm')); // Return the edit view with the program details
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Fetch the NRM training program by ID
    $nrmtraining = NrmTraining::findOrFail($id);

    // Update the NRM training program's details
    $nrmtraining->program_name = $request->input('program_name');
    $nrmtraining->program_number = request('program_number');
    $nrmtraining->crop_name = request('crop_name');
    $nrmtraining->date = $request->input('date');
    $nrmtraining->venue = $request->input('venue');  // Changed 'place' to 'venue'
    $nrmtraining->resource_person_name = $request->input('resource_person_name');  // Changed 'conductor_name' to 'resource_person_name'
    $nrmtraining->training_program_cost = $request->input('training_program_cost');  // Changed 'conductor_payment' to 'training_program_cost'
    $nrmtraining->resource_person_payment = $request->input('resource_person_payment');  // New field for resource person payment
    $nrmtraining->province_name = $request->input('province_name');
    $nrmtraining->district = $request->input('district');
    $nrmtraining->ds_division_name = $request->input('ds_division_name');
    $nrmtraining->gn_division_name = $request->input('gn_division_name');
    $nrmtraining->as_center = $request->input('as_center');

    // Save the updated details
    $nrmtraining->save();

    // Redirect back with a success message
    return redirect('/nrmtraining')->with('success', 'Training program updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the NRM training by ID and delete it
        $nrmtraining = NrmTraining::findOrFail($id);
        $nrmtraining->delete();

        // Redirect to the index page with a success message
        return redirect()->route('nrm.index')->with('success', 'Training program deleted successfully.');
    }


    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        // Search in the NrmTraining model using relevant fields
        $nrmtrainings = NrmTraining::where('program_name', 'like', '%' . $search . '%')
            ->orWhere('program_number', 'like', '%' . $search . '%')
            ->orWhere('crop_name', 'like', '%' . $search . '%')
            ->orWhere('date', 'like', '%' . $search . '%')
            ->orWhere('venue', 'like', '%' . $search . '%')
            ->orWhere('resource_person_name', 'like', '%' . $search . '%')
            ->orWhere('training_program_cost', 'like', '%' . $search . '%')
            ->orWhere('resource_person_payment', 'like', '%' . $search . '%')
            ->orWhere('province_name', 'like', '%' . $search . '%')
            ->orWhere('district', 'like', '%' . $search . '%')
            ->orWhere('ds_division_name', 'like', '%' . $search . '%')
            ->orWhere('gn_division_name', 'like', '%' . $search . '%')
            ->orWhere('as_center', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('nrm.nrm_index', compact('nrmtrainings', 'search'));
    }


    /**
     * Export data to CSV.
     */
    public function downloadCsv()
    {
        $nrmtrainings = NrmTraining::latest()->get();
        $filename = 'NRM_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Program Name','Program Number', 'Crop Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($nrmtrainings as $row) {
            fputcsv($fp, [
                $row->program_name,
                $row->program_number,
                $row->crop_name,
                $row->date,
                $row->venue,  // Changed 'place' to 'venue'
                $row->resource_person_name,  // Changed 'conductor_name' to 'resource_person_name'
                $row->training_program_cost,  // Changed 'conductor_payment' to 'training_program_cost'
                $row->resource_person_payment,  // New field for resource person payment
                $row->province_name,
                $row->district,
                $row->ds_division_name,
                $row->gn_division_name,
                $row->as_center
            ]);
        }
        fclose($fp);
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'NRM_training_program_report.csv', $headers);
    }

    /**
     * Upload CSV and import data.
     */
    public function uploadCsv(Request $request)
    {
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt',
    ]);

    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    // Create the CSV reader
    $csv = Reader::createFromPath($path, 'r');
    $csv->setHeaderOffset(0); // This assumes the first row of your CSV contains headers

    foreach ($csv as $row) {
        $nrmtraining = new NrmTraining();
        $nrmtraining->program_name = $row['Program Name'];
        $nrmtraining->program_number = $row['Program Number'];
        $nrmtraining->crop_name = $row['Crop Name'];
        $nrmtraining->date = $row['Date'];
        $nrmtraining->venue = $row['Venue'];  // Updated to 'venue'
        $nrmtraining->resource_person_name = $row['Resource Person Name'];  // Updated to 'resource_person_name'
        $nrmtraining->training_program_cost = $row['Training Program Cost'];  // Updated to 'training_program_cost'
        $nrmtraining->resource_person_payment = $row['Resource Person Payment'];  // New field for resource person payment
        $nrmtraining->province_name = $row['Province'];
        $nrmtraining->district = $row['District'];
        $nrmtraining->ds_division_name = $row['DS Division'];
        $nrmtraining->gn_division_name = $row['GN Division'];
        $nrmtraining->as_center = $row['ASC'];
        $nrmtraining->save();
    }

    return redirect('/nrmtraining')->with('success', 'CSV data imported successfully.');
    }

}
