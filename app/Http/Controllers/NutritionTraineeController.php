<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\NutritionTrainee;
use App\Models\Nutrition;
use League\Csv\Writer;
use League\Csv\Reader;

class NutritionTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nutrition_id = null)
{
    // If $nutrition_id is provided, filter by nutrition_id, otherwise show all trainees
    if ($nutrition_id) {
        $nutrition = Nutrition::findOrFail($nutrition_id); // Retrieve the Nutrition model
        $trainees = NutritionTrainee::where('nutrition_id', $nutrition_id)->paginate(10);
    } else {
        $trainees = NutritionTrainee::paginate(10);
    }

    // Pass $nutrition to the view
    return view('nutrition_trainee.trainee_index', compact('trainees', 'nutrition'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create($nutrition_id)
    {
        return view('nutrition_trainee.trainee_create', ['nutrition_id' => $nutrition_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'nutrition_id' => 'required|exists:nutrient_details,id', // Ensure the correct table reference
            'full_name' => 'required|string|max:255',
            'nic' => ['required', 'string', 'max:12',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if the same NIC exists for the same nutrition program
                    if (NutritionTrainee::where('nic', $value)
                        ->where('nutrition_id', $request->nutrition_id)
                        ->exists()) {
                        $fail('The NIC is already registered for this nutrition program.');
                    }
                }
            ],
            'address' => 'required|string',
            'dob' => 'required|date',
            'age' => 'required|string',
            'gender' => 'required|string',
            'mobile_number' => 'required|string|max:10',
            'education_level' => 'required|string',
            'income_level' => 'required|string',
            'special_remark' => 'nullable|string'
        ]);

        // Create a new trainee
        $nutrition_trainee = new NutritionTrainee($request->all());

        // Find the Nutrition by ID
        $nutrition = Nutrition::findOrFail($request->nutrition_id);

        // Associate the trainee with the nutrition program
        $nutrition_trainee->nutrition()->associate($nutrition);

        // Save the trainee
        $nutrition_trainee->save();

        // Redirect back to the nutrition trainee index with success message
        return redirect()->route('nutrition_trainee.index', ['nutrition' => $request->nutrition_id])
    ->with('success', 'Trainee registered successfully.');

    }


    public function show($id)
{
    // Fetch the nutrition program by ID
    $nutrition = Nutrition::findOrFail($id);

    // Return the 'nutrition_show' view with the nutrition program details
    return view('nutrition_show', compact('nutrition'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trainee = NutritionTrainee::findOrFail($id);
        return view('nutrition_trainee.trainee_edit', compact('trainee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Retrieve the trainee record to update
        $trainee = NutritionTrainee::findOrFail($id); // Move this before the validation

        // Validate input data, ensuring that NIC is unique within the same nutrition program (except for the current trainee)
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nic' => [
                'required',
                'string',
                'max:12',
                // Custom validation for unique NIC within the same nutrition program, excluding the current trainee
                function ($attribute, $value, $fail) use ($request, $trainee) {
                    $exists = NutritionTrainee::where('nic', $value)
                        ->where('nutrition_id', $request->nutrition_id)
                        ->where('id', '!=', $trainee->id) // Exclude the current trainee from the check
                        ->exists();

                    if ($exists) {
                        $fail('The NIC is already registered for this nutrition program.');
                    }
                }
            ],
            'address' => 'required|string',
            'dob' => 'required|date',
            'age' => 'required|string',
            'gender' => 'required|string',
            'mobile_number' => 'required|string|max:10',
            'education_level' => 'required|string',
            'income_level' => 'required|string',
            'special_remark' => 'nullable|string',
        ]);

        // Update the trainee record with validated data
        $trainee->update($request->all());

        // Redirect back to the nutrition program's page with success message
        return redirect()->route('nutrition.show', ['nutrition' => $trainee->nutrition_id])
                        ->with('success', 'Trainee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trainee = NutritionTrainee::findOrFail($id);
        $trainee->delete();

        return redirect()->route('nutrition_trainee.index', ['nutrition' => $trainee->nutrition_id])
    ->with('success', 'Trainee updated successfully.');

    }


    //Serach

    public function search(Request $request, $nutrition_id)
{
    $searchTerm = $request->input('search');

    // Search across all relevant columns in the NutritionTrainee table
    $trainees = NutritionTrainee::where('nutrition_id', $nutrition_id)
        ->where(function ($query) use ($searchTerm) {
            $query->where('full_name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('nic', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('address', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('dob', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('age', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('gender', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('education_level', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('income_level', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('special_remark', 'LIKE', '%' . $searchTerm . '%');
        })
        ->paginate(10);

    // Redirect to the nutrition.show view and pass the nutrition program, trainees, and search term
    $nutrition = Nutrition::findOrFail($nutrition_id);

    return view('nutrition.nutrition_show', compact('nutrition', 'trainees', 'searchTerm'));
}


    //Generate csv


    public function download_csv($nutrition_id)
{
    // Fetch the nutrition program by ID
    $nutrition = Nutrition::findOrFail($nutrition_id);

    // Fetch the trainees (participants) related to the nutrition program
    $trainees = NutritionTrainee::where('nutrition_id', $nutrition_id)->get();

    // Create a CSV writer instance
    $csv = Writer::createFromString('');

    // Add header row to the CSV
    $csv->insertOne(['Full Name', 'NIC', 'Address', 'Date of Birth', 'Age' , 'Gender' , 'Mobile' , 'Education Level' , 'Income Level' , 'Special Remark']);

    // Add rows for each trainee
    foreach ($trainees as $trainee) {
        $csv->insertOne([
            $trainee->full_name,
            $trainee->nic,
            $trainee->address,
            $trainee->dob,
            $trainee->age,
            ucfirst($trainee->gender),
            $trainee->mobile_number,
            $trainee->education_level,
            $trainee->income_level,
            $trainee->special_remark,
        ]);
    }

    // Store the CSV file in the local storage
    $filename = 'nutrition_trainees_' . $nutrition_id . '.csv';
    Storage::disk('local')->put($filename, $csv->toString());

    // Return the CSV file as a downloadable response
    return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
}

//upload csv

public function uploadCsv(Request $request, $nutrition_id)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt',
    ]);

    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    // Create the CSV reader
    $csv = Reader::createFromPath($path, 'r');
    $csv->setHeaderOffset(0); // Assuming the first row contains headers

    foreach ($csv as $row) {
        // Use the nutrition ID from the route parameter to associate the records
        $nutritionTrainee = new NutritionTrainee();
        $nutritionTrainee->nutrition_id = $nutrition_id;
        $nutritionTrainee->full_name = $row['Full Name'];
        $nutritionTrainee->nic = $row['NIC'];
        $nutritionTrainee->address = $row['Address'];
        // Convert the date from MM/DD/YYYY to YYYY-MM-DD
        $dob = \Carbon\Carbon::createFromFormat('m/d/Y', $row['Date of Birth'])->format('Y-m-d');
        $nutritionTrainee->dob = $dob;
        $nutritionTrainee->age = $row['Age'];
        $nutritionTrainee->gender = $row['Gender'];
        $nutritionTrainee->mobile_number = $row['Mobile'];
        $nutritionTrainee->education_level = $row['Education Level'];
        $nutritionTrainee->income_level = $row['Income Level'];
        $nutritionTrainee->special_remark = $row['Special Remark'];
        $nutritionTrainee->save();
    }

    return redirect()->route('nutrition.show', $nutrition_id)
        ->with('success', 'CSV data uploaded successfully.');
}


}
