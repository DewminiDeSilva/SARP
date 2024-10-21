<?php

namespace App\Http\Controllers;

use App\Models\FFSTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;

class FFSTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = request()->get('entries', 10); // Get 'entries' from request, default to 10 if not present
        $ffsTrainings = FFSTraining::latest()->paginate($entries)->appends(['entries' => $entries]);

        // Calculate the total value of Program Cost
        $totalProgramCost = FFSTraining::sum('training_program_cost'); // Assuming training_program_cost is numeric

        return view('ffs_training.ffs_training_index', compact('ffsTrainings', 'entries', 'totalProgramCost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ffs_training.ffs_training_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required',
            'date' => 'required',
            'venue' => 'required',
            'resource_person_name' => 'required',
            'training_program_cost' => 'required|numeric',
            'resource_person_payment' => 'required|numeric',
            'province_name' => 'required',
            'district' => 'required',
            'ds_division_name' => 'required',
            'gn_division_name' => 'required',
            'as_center' => 'required',
            'program_number' => 'required',
            'crop_name' => 'required',
        ]);

        $ffsTraining = new FFSTraining($request->all());
        $ffsTraining->save();

        return redirect('/ffs-training')->with('success', 'FFS Training Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FFSTraining $ffsTraining)
    {
        return view('ffs_training.ffs_training_show', compact('ffsTraining'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FFSTraining $ffsTraining)
    {
        return view('ffs_training.ffs_training_edit', compact('ffsTraining'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FFSTraining $ffsTraining)
    {
        $request->validate([
            'program_name' => 'required',
            'date' => 'required',
            'venue' => 'required',
            'resource_person_name' => 'required',
            'training_program_cost' => 'required|numeric',
            'resource_person_payment' => 'required|numeric',
            'province_name' => 'required',
            'district' => 'required',
            'ds_division_name' => 'required',
            'gn_division_name' => 'required',
            'as_center' => 'required',
            'program_number' => 'required',
            'crop_name' => 'required',
        ]);

        $ffsTraining->update($request->all());

        return redirect('/ffs-training')->with('success', 'FFS Training Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FFSTraining $ffsTraining)
    {
        $ffsTraining->delete();
        return redirect('/ffs-training')->with('success', 'FFS Training Program deleted successfully.');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        // Search in all the relevant fields
        $ffsTrainings = FFSTraining::where('program_name', 'like', '%' . $search . '%')
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
        $totalProgramCost = FFSTraining::sum('training_program_cost');

        return view('ffs_training.ffs_training_index', compact('ffsTrainings', 'search', 'totalProgramCost'));
    }

    /**
     * Export data to CSV.
     */
    public function downloadCsv()
    {
        $ffsTrainings = FFSTraining::latest()->get();
        $filename = 'ffs_training_program_report.csv';
        $fp = fopen($filename, 'w+');

        // Adding headers
        fputcsv($fp, [
            'Program Name',
            'Date',
            'Venue',
            'Resource Person Name',
            'Training Program Cost',
            'Resource Person Payment',
            'Province',
            'District',
            'DS Division',
            'GN Division',
            'ASC',
            'Program Number',
            'Crop Name'
        ]);

        // Adding data
        foreach ($ffsTrainings as $row) {
            fputcsv($fp, [
                $row->program_name,
                $row->date,
                $row->venue,
                $row->resource_person_name,
                $row->training_program_cost,
                $row->resource_person_payment,
                $row->province_name,
                $row->district,
                $row->ds_division_name,
                $row->gn_division_name,
                $row->as_center,
                $row->program_number,
                $row->crop_name,
            ]);
        }
        fclose($fp);

        $headers = ['Content-Type' => 'text/csv'];

        return response()->download($filename, 'ffs_training_program_report.csv', $headers);
    }

    /**
     * Upload CSV and import data.
     */
    public function uploadCsv(Request $request)
    {
        $request->validate(['csv_file' => 'required|mimes:csv,txt']);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Create the CSV reader
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0); // This assumes the first row of your CSV contains headers

        foreach ($csv as $row) {
            $ffsTraining = new FFSTraining();
            $ffsTraining->program_name = $row['Program Name'];
            $ffsTraining->date = $row['Date'];
            $ffsTraining->venue = $row['Venue'];
            $ffsTraining->resource_person_name = $row['Resource Person Name'];
            $ffsTraining->training_program_cost = $row['Training Program Cost'];
            $ffsTraining->resource_person_payment = $row['Resource Person Payment'];
            $ffsTraining->province_name = $row['Province'];
            $ffsTraining->district = $row['District'];
            $ffsTraining->ds_division_name = $row['DS Division'];
            $ffsTraining->gn_division_name = $row['GN Division'];
            $ffsTraining->as_center = $row['ASC'];
            $ffsTraining->program_number = $row['Program Number'];
            $ffsTraining->crop_name = $row['Crop Name'];
            $ffsTraining->save();
        }

        return redirect('/ffs-training')->with('success', 'CSV data imported successfully.');
    }
}

