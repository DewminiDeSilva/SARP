<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nutrition;
use App\Models\NutritionTrainee;
use League\Csv\Reader;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all nutrition programs
        $nutritionPrograms = Nutrition::latest()->paginate(10);

        return view('nutrition.nutrition_index', compact('nutritionPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nutrition.nutrition_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'program_type' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'program_conductor' => 'required|string|max:255',
            'cost_of_training_program' => 'required|numeric',
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ds_division_name' => 'required|string|max:255',
            'gn_division_name' => 'required|string|max:255',
            'asc_name' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create and store the new nutrition program
        $nutrition = new Nutrition($request->all());
        $nutrition->save();

        // Redirect back with a success message
        return redirect()->route('nutrition.index')->with('success', 'Nutrition Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the nutrition program by id
        $nutrition = Nutrition::findOrFail($id);
        // Retrieve the trainees associated with this nutrition program
        $trainees = NutritionTrainee::where('nutrition_id', $nutrition->id)->get();
        return view('nutrition.nutrition_show', compact('nutrition', 'trainees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the nutrition program by id
        $nutrition = Nutrition::findOrFail($id);
        return view('nutrition.nutrition_edit', compact('nutrition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'program_type' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'program_conductor' => 'required|string|max:255',
            'cost_of_training_program' => 'required|numeric',
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ds_division_name' => 'required|string|max:255',
            'gn_division_name' => 'required|string|max:255',
            'asc_name' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Fetch the existing nutrition program and update its details
        $nutrition = Nutrition::findOrFail($id);
        $nutrition->update($request->all());

        // Redirect back with a success message
        return redirect()->route('nutrition.index')->with('success', 'Nutrition Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the nutrition program and delete it
        $nutrition = Nutrition::findOrFail($id);
        $nutrition->delete();

        // Redirect back with a success message
        return redirect()->route('nutrition.index')->with('success', 'Nutrition Program deleted successfully.');
    }

    /**
     * Export data to CSV.
     */
    public function reportCsv1()
    {
        // Fetch all nutrition programs
        $nutritionPrograms = Nutrition::latest()->get();
        $filename = 'nutrition_programs_report.csv';
        $fp = fopen($filename, 'w+');

        // Headers for the CSV file
        fputcsv($fp, [
            'Program Type',
            'Date',
            'Location',
            'Program Conductor',
            'Cost of Training Program',
            'Province Name',
            'District Name',
            'DS Division Name',
            'GN Division Name',
            'ASC Name',
            'Cascade Name',
            'Description'
        ]);

        // Loop through nutrition programs and export each record
        foreach ($nutritionPrograms as $row) {
            fputcsv($fp, [
                $row->program_type,
                $row->date,
                $row->location,
                $row->program_conductor,
                $row->cost_of_training_program,
                $row->province_name,
                $row->district_name,
                $row->ds_division_name,
                $row->gn_division_name,
                $row->asc_name,
                $row->cascade_name,
                $row->description
            ]);
        }

        fclose($fp);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'nutrition_programs_report.csv', $headers);
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        // Search query for nutrition programs through all fields
        $nutritionPrograms = Nutrition::where('program_type', 'like', '%' . $search . '%')
            ->orWhere('date', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%')
            ->orWhere('program_conductor', 'like', '%' . $search . '%')
            ->orWhere('cost_of_training_program', 'like', '%' . $search . '%')
            ->orWhere('province_name', 'like', '%' . $search . '%')
            ->orWhere('district_name', 'like', '%' . $search . '%')
            ->orWhere('ds_division_name', 'like', '%' . $search . '%')
            ->orWhere('gn_division_name', 'like', '%' . $search . '%')
            ->orWhere('asc_name', 'like', '%' . $search . '%')
            ->orWhere('cascade_name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('nutrition.nutrition_index', compact('nutritionPrograms', 'search'));
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
        $nutrition = new Nutrition();
        $nutrition->program_type = $row['Program Type'];
        $nutrition->date = $row['Date'];
        $nutrition->location = $row['Location'];
        $nutrition->program_conductor = $row['Program Conductor'];
        $nutrition->cost_of_training_program = $row['Cost of Training Program'];
        $nutrition->province_name = $row['Province Name'];
        $nutrition->district_name = $row['District Name'];
        $nutrition->ds_division_name = $row['DS Division Name'];
        $nutrition->gn_division_name = $row['GN Division Name'];
        $nutrition->asc_name = $row['ASC Name'];
        $nutrition->cascade_name = $row['Cascade Name'];
        $nutrition->description = $row['Description'];
        $nutrition->save();
    }

    return redirect()->route('nutrition.index')->with('success', 'CSV data imported successfully.');
}


}
