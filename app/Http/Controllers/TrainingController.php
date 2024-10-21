<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use League\Csv\Reader;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $entries = request()->get('entries', 10); // Get 'entries' from request, default to 10 if not present
    $trainings = Training::latest()->paginate($entries)->appends(['entries' => $entries]);

    // Calculate the total value of Program Cost
    $totalProgramCost = Training::sum('training_program_cost'); // Assuming training_program_cost is numeric

    return view('training.training_index', compact('trainings', 'entries', 'totalProgramCost'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('training.training_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $training = new Training;
        $training->program_name = request('program_name');
        $training->date = request('date');
        $training->venue = request('venue');  // Changed 'place' to 'venue'
        $training->resource_person_name = request('resource_person_name');  // Changed 'conductor_name' to 'resource_person_name'
        $training->training_program_cost = request('training_program_cost');  // Changed 'conductor_payment' to 'training_program_cost'
        $training->resource_person_payment = request('resource_person_payment');  // New field for resource person payment
        $training->province_name = request('province_name');
        $training->district = request('district');
        $training->ds_division_name = request('ds_division_name');
        $training->gn_division_name = request('gn_division_name');
        $training->as_center = request('as_center');
        $training->save();

        return redirect('/training')->with('success', 'Training program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        return view('training.training_show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('training.training_edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $training->program_name = request('program_name');
        $training->date = request('date');
        $training->venue = request('venue');  // Changed 'place' to 'venue'
        $training->resource_person_name = request('resource_person_name');  // Changed 'conductor_name' to 'resource_person_name'
        $training->training_program_cost = request('training_program_cost');  // Changed 'conductor_payment' to 'training_program_cost'
        $training->resource_person_payment = request('resource_person_payment');  // New field for resource person payment
        $training->province_name = request('province_name');
        $training->district = request('district');
        $training->ds_division_name = request('ds_division_name');
        $training->gn_division_name = request('gn_division_name');
        $training->as_center = request('as_center');
        $training->save();

        return redirect('/training')->with('success', 'Training program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return redirect('/training')->with('success', 'Training program deleted successfully.');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
    $search = $request->get('search');

    // Search in all the relevant fields
    $trainings = Training::where('program_name', 'like', '%' . $search . '%')
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

    // Calculate the total value of Program Cost
    $totalProgramCost = Training::sum('training_program_cost'); // Assuming training_program_cost is numeric

    return view('training.training_index', compact('trainings', 'search', 'totalProgramCost'));
    }



    /**
     * Export data to CSV.
     */
    public function downloadCsv()
    {
        $trainings = Training::latest()->get();
        $filename = 'training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Program Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($trainings as $row) {
            fputcsv($fp, [
                $row->program_name,
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

        return response()->download($filename, 'training_program_report.csv', $headers);
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
        $training = new Training();
        $training->program_name = $row['Program Name'];
        $training->date = $row['Date'];
        $training->venue = $row['Venue'];  // Updated to 'venue'
        $training->resource_person_name = $row['Resource Person Name'];  // Updated to 'resource_person_name'
        $training->training_program_cost = $row['Training Program Cost'];  // Updated to 'training_program_cost'
        $training->resource_person_payment = $row['Resource Person Payment'];  // New field for resource person payment
        $training->province_name = $row['Province'];
        $training->district = $row['District'];
        $training->ds_division_name = $row['DS Division'];
        $training->gn_division_name = $row['GN Division'];
        $training->as_center = $row['ASC'];
        $training->save();
    }

    return redirect('/training')->with('success', 'CSV data imported successfully.');
    }

}
