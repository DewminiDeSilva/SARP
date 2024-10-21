<?php

namespace App\Http\Controllers;

use App\Models\BeneForm;
use Illuminate\Http\Request;

class BeneFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all beneficiary application forms
        $beneForms = BeneForm::all();  // Or you can use paginate() if the data is large

        // Return the index view and pass the $beneForms variable to the view
        return view('bene_form.index', compact('beneForms'));
    }

    /**
     * Search for a beneficiary form based on the query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform a search on the `full_name`, `nic_number`, `phone_number`, or `email` fields
        $beneForms = BeneForm::where('full_name', 'LIKE', "%{$query}%")
            ->orWhere('nic_number', 'LIKE', "%{$query}%")
            ->orWhere('phone_number', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        // Return the index view and pass the filtered $beneForms to the view
        return view('bene_form.index', compact('beneForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the create view for beneficiary form
        return view('bene_form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request inputs
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'nic_number' => 'required|string|max:12',
            'dob' => 'required|date',
            'whatsapp_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string', // Already handled properly as a string
            'education_level' => 'nullable|array',
            'head_of_household' => 'required|in:1,0', // This should still be integer/boolean in validation
            'number_of_household_members' => 'required|integer|min:1',
            'district' => 'required|string|max:255',
            'gramaniladhari_division' => 'required|string|max:255',
            'divisional_secretariat' => 'required|string|max:255',
            'agrarian_service_division' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
            'tank_name' => 'required|string|max:255',
            'water_facility' => 'nullable|array',
            'other_water_facility' => 'nullable|string|max:255',
            'land_size' => 'required|numeric|min:0',
            'proposed_cultivation_area' => 'required|numeric|min:0',
            'ownership_type' => 'required|string',
            'grown_crop_before' => 'required|in:Yes,No', // Validate to accept Yes or No
            'participated_training_before' => 'required|in:Yes,No', // Validate to accept Yes or No
            'harvest_sale_buyers' => 'required|in:Yes,No', // Validate to accept Yes or No
            'buyer_details' => 'nullable|string',
            'buyer_type' => 'nullable|array',
            'will_store_harvest' => 'required|in:Yes,No', // Validate to accept Yes or No
            'store_method' => 'nullable|array',
            'machinery_number' => 'nullable|array',
            'registered_in_fo' => 'required|in:Yes,No', // Validate to accept Yes or No
            'fo_name' => 'nullable|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'sign_date' => 'nullable|date'
        ]);

        // Store 'Yes' or 'No' directly in the database based on user input from radio buttons
        $validatedData['head_of_household'] = $request->input('head_of_household') == 1 ? 'Yes' : 'No';
        $validatedData['grown_crop_before'] = $request->input('grown_crop_before'); // Stores 'Yes' or 'No'
        $validatedData['participated_training_before'] = $request->input('participated_training_before'); // Stores 'Yes' or 'No'
        $validatedData['harvest_sale_buyers'] = $request->input('harvest_sale_buyers'); // Stores 'Yes' or 'No'
        $validatedData['will_store_harvest'] = $request->input('will_store_harvest'); // Stores 'Yes' or 'No'
        $validatedData['registered_in_fo'] = $request->input('registered_in_fo'); // Stores 'Yes' or 'No'

        // Process machinery data
        $machineryData = $request->input('machinery_number');
        if ($request->filled('machinery_other_name')) {
            $machineryData['Other'] = $request->input('machinery_other_name');
        }

        // Store the machinery data as JSON in the database
        $validatedData['machinery'] = json_encode($machineryData);

        // Create a new BeneForm record
        BeneForm::create($validatedData);

        // Redirect to the index with success message
        return redirect()->route('bene-form.index')->with('success', 'Beneficiary form submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the beneficiary form by ID or fail
        $beneForm = BeneForm::findOrFail($id);

        // Return the show view with the specific form data
        return view('bene_form.show', compact('beneForm'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the form by ID and delete it
        BeneForm::destroy($id);

        // Redirect back to the index with a success message
        return redirect()->route('bene-form.index')->with('success', 'Beneficiary form deleted successfully.');
    }
}
