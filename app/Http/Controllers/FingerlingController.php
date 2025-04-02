<?php

namespace App\Http\Controllers;

use App\Models\Fingerling;
use App\Models\TankRehabilitation;
use Illuminate\Http\Request;

class FingerlingController extends Controller
{
    /**
     * Display a listing of tank records in the Fingerling module.
     */
    public function index(Request $request)
    {
    $query = TankRehabilitation::select(
        'id',
        'tank_id',
        'tank_name',
        'ds_division_name',
        'gn_division_name',
        'as_centre',
        'river_basin',
        'cascade_name'
    );

    // Apply search filter if provided
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('tank_id', 'like', "%$search%")
              ->orWhere('tank_name', 'like', "%$search%")
              ->orWhere('ds_division_name', 'like', "%$search%")
              ->orWhere('gn_division_name', 'like', "%$search%")
              ->orWhere('as_centre', 'like', "%$search%")
              ->orWhere('cascade_name', 'like', "%$search%")
              ->orWhere('river_basin', 'like', "%$search%");
        });
    }

    $tanks = $query->paginate(10)->appends(['search' => $request->search]);

    return view('fingerling.fingerling_index', compact('tanks'));
    }


    /**
     * Show the form to add fingerling data for a specific tank.
     *
     * @param int $tank_id The ID of the tank for which data will be added.
     */
    public function create($tank_id)
    {
        // Fetch the tank details using the provided foreign key
        $tank = TankRehabilitation::find($tank_id);

        if (!$tank) {
            return redirect()->route('fingerling.index')->with('error', 'Tank not found.');
        }

        // Pass the tank details to the 'fingerling_create' view
        return view('fingerling.fingerling_create', compact('tank'));
    }

    /**
     * Store the fingerling data submitted from the form.
     *
     * @param \Illuminate\Http\Request $request The request containing form data.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'tank_id' => 'required|exists:tank_rehabilation,id', // Ensure the foreign key is valid
            'livestock_type' => 'required|string',
            'stocking_type' => 'required|string',
            'stocking_date' => 'required|date',
            'stocking_details' => 'nullable|array',
            'stocking_details.*.variety' => 'nullable|string',
            'stocking_details.*.stock_number' => 'nullable|integer',
            'harvest_date' => 'nullable|date',
            'variety_harvest_kg' => 'nullable|numeric',
            'amount_cumulative_kg' => 'nullable|numeric',
            'unit_price_rs' => 'nullable|numeric',
            'total_income_rs' => 'nullable|numeric',
            'wholesale_quantity_kg' => 'nullable|numeric',
            'wholesale_unit_price_rs' => 'nullable|numeric',
            'wholesale_total_income_rs' => 'nullable|numeric',
        ]);

        // Create a new fingerling record
        Fingerling::create([
            'tank_id' => $request->tank_id,
            'livestock_type' => $request->livestock_type,
            'stocking_type' => $request->stocking_type,
            'stocking_date' => $request->stocking_date,
            'stocking_details' => json_encode($request->stocking_details), // Encode as JSON
            'harvest_date' => $request->harvest_date,
            'variety_harvest_kg' => $request->variety_harvest_kg,
            'amount_cumulative_kg' => $request->amount_cumulative_kg,
            'unit_price_rs' => $request->unit_price_rs,
            'total_income_rs' => $request->total_income_rs,
            'wholesale_quantity_kg' => $request->wholesale_quantity_kg,
            'wholesale_unit_price_rs' => $request->wholesale_unit_price_rs,
            'wholesale_total_income_rs' => $request->wholesale_total_income_rs,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('fingerling.index')->with('success', 'Fingerling data added successfully.');
    }

    /**
     * Show the fingerling data for a specific tank.
     *
     * @param int $id The ID of the tank whose data is being viewed.
     */
    public function show($id)
    {
        // Fetch the fingerling data by matching the foreign key 'tank_id'
        $fingerlings = Fingerling::where('tank_id', $id)->get(); // Fetch all related fingerling records
        $tank = TankRehabilitation::find($id); // Fetch tank details for display

        if ($fingerlings->isEmpty()) {
            return redirect()->route('fingerling.index')->with('error', 'No fingerling data found for this tank.');
        }

        // Pass the fingerling data and tank details to the 'fingerling_show' view
        return view('fingerling.fingerling_show', compact('fingerlings', 'tank'));
    }


    public function destroy($id)
    {
    // Find the fingerling record by its ID
    $fingerling = Fingerling::find($id);

    // If the record is not found, redirect back to the show page with an error
    if (!$fingerling) {
        return redirect()->route('fingerling.show', $fingerling->tank_id)->with('error', 'Fingerling data not found.');
    }

    // Store the tank ID before deleting the fingerling record
    $tank_id = $fingerling->tank_id;

    // Delete the fingerling record
    $fingerling->delete();

    // Redirect back to the show page with a success message
    return redirect()->route('fingerling.show', $tank_id)->with('success', 'Fingerling data deleted successfully.');
    }

    public function edit($id)
    {
    // Find the fingerling record by its ID
    $fingerling = Fingerling::find($id);

    // If the record is not found, redirect to the index with an error message
    if (!$fingerling) {
        return redirect()->route('fingerling.index')->with('error', 'Fingerling record not found.');
    }

    // Pass the fingerling record to the edit view
    return view('fingerling.fingerling_edit', compact('fingerling'));
    }


    public function update(Request $request, $id)
    {
    // Validate the form data
    $request->validate([
        'livestock_type' => 'required|string',
        'stocking_type' => 'required|string',
        'stocking_date' => 'required|date',
        'stocking_details' => 'nullable|array',
        'stocking_details.*.variety' => 'nullable|string',
        'stocking_details.*.stock_number' => 'nullable|integer',
        'harvest_date' => 'nullable|date',
        'variety_harvest_kg' => 'nullable|numeric',
        'amount_cumulative_kg' => 'nullable|numeric',
        'unit_price_rs' => 'nullable|numeric',
        'total_income_rs' => 'nullable|numeric',
        'wholesale_quantity_kg' => 'nullable|numeric',
        'wholesale_unit_price_rs' => 'nullable|numeric',
        'wholesale_total_income_rs' => 'nullable|numeric',
    ]);

    // Find the fingerling record by its ID
    $fingerling = Fingerling::find($id);

    if (!$fingerling) {
        return redirect()->route('fingerling.index')->with('error', 'Fingerling record not found.');
    }

    // Update the fingerling record with validated data
    $fingerling->update([
        'livestock_type' => $request->livestock_type,
        'stocking_type' => $request->stocking_type,
        'stocking_date' => $request->stocking_date,
        'stocking_details' => json_encode($request->stocking_details), // Encode as JSON
        'harvest_date' => $request->harvest_date,
        'variety_harvest_kg' => $request->variety_harvest_kg,
        'amount_cumulative_kg' => $request->amount_cumulative_kg,
        'unit_price_rs' => $request->unit_price_rs,
        'total_income_rs' => $request->total_income_rs,
        'wholesale_quantity_kg' => $request->wholesale_quantity_kg,
        'wholesale_unit_price_rs' => $request->wholesale_unit_price_rs,
        'wholesale_total_income_rs' => $request->wholesale_total_income_rs,
    ]);

    // Redirect to the show page with a success message
    return redirect()->route('fingerling.show', $fingerling->tank_id)->with('success', 'Fingerling data updated successfully.');
    }

    



}
