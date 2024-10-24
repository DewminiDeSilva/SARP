<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NutritionTrainee;
use App\Models\Nutrition;

class NutritionTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nutrition_id = null)
{
    // If $nutrition_id is provided, filter by nutrition_id, otherwise show all trainees
    if ($nutrition_id) {
        $trainees = NutritionTrainee::where('nutrition_id', $nutrition_id)->paginate(10);
    } else {
        $trainees = NutritionTrainee::paginate(10);
    }

    return view('nutrition_trainee.trainee_index', compact('trainees', 'nutrition_id'));
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
}
