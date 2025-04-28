<?php

namespace App\Http\Controllers;

use App\Models\Fingerling;
use App\Models\TankRehabilitation;
use Illuminate\Http\Request;
use App\Models\FingerlingStatus;



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

    $tanksWithFingerlings = Fingerling::pluck('tank_id')->unique();

    // 👇 Add this: Get all statuses
    $statuses = FingerlingStatus::pluck('status', 'tank_id')->toArray();

    return view('fingerling.fingerling_index', compact('tanks', 'tanksWithFingerlings', 'statuses'));
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
    $request->validate([
        'tank_id' => 'required|exists:tank_rehabilation,id',
        'stocking_details' => 'nullable|array',
        'stocking_details.*.stocking_date' => 'nullable|date',
        'stocking_details.*.variety' => 'nullable|string',
        'stocking_details.*.stock_number' => 'nullable|integer',

        'harvest_details' => 'nullable|array',
        'harvest_details.*.harvest_date' => 'nullable|date',
        'harvest_details.*.variety' => 'nullable|string',
        'harvest_details.*.variety_harvest_kg' => 'nullable|numeric',

        'community_distribution_kg' => 'nullable|numeric',
        'amount_cumulative_kg' => 'nullable|numeric',
        'total_income_rs' => 'nullable|numeric',
        'wholesale_quantity_kg' => 'nullable|numeric',
        'no_of_families_benefited' => 'nullable|integer',
    ]);

    Fingerling::create([
        'tank_id' => $request->tank_id,
        'stocking_details' => json_encode($request->stocking_details),
        'harvest_details' => json_encode($request->harvest_details),
        'community_distribution_kg' => $request->community_distribution_kg,
        'amount_cumulative_kg' => $request->amount_cumulative_kg,
        'total_income_rs' => $request->total_income_rs,
        'wholesale_quantity_kg' => $request->wholesale_quantity_kg,
        'no_of_families_benefited' => $request->no_of_families_benefited,
    ]);

    return redirect()->route('fingerling.show', $request->tank_id)->with('success', 'Fingerling data added successfully.');
    }

    /**
     * Show the fingerling data for a specific tank.
     *
     * @param int $id The ID of the tank whose data is being viewed.
     */

    public function show($id)
    {
    // Fetch all fingerlings for the selected tank
    $fingerlings = Fingerling::where('tank_id', $id)->get();

    // Fetch the tank details
    $tank = TankRehabilitation::find($id);

    // If the tank does not exist, redirect back
    if (!$tank) {
        return redirect()->route('fingerling.index')->with('error', 'Tank not found.');
    }

    // Load the show view, even if fingerlings are empty
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
    $request->validate([
        'stocking_details' => 'nullable|array',
        'stocking_details.*.stocking_date' => 'nullable|date',
        'stocking_details.*.variety' => 'nullable|string',
        'stocking_details.*.stock_number' => 'nullable|integer',

        'harvest_details' => 'nullable|array',
        'harvest_details.*.harvest_date' => 'nullable|date',
        'harvest_details.*.variety' => 'nullable|string',
        'harvest_details.*.variety_harvest_kg' => 'nullable|numeric',

        'community_distribution_kg' => 'nullable|numeric',
        'amount_cumulative_kg' => 'nullable|numeric',
        'total_income_rs' => 'nullable|numeric',
        'wholesale_quantity_kg' => 'nullable|numeric',
        'no_of_families_benefited' => 'nullable|integer',
    ]);

    $fingerling = Fingerling::find($id);

    if (!$fingerling) {
        return redirect()->route('fingerling.index')->with('error', 'Fingerling record not found.');
    }

    $fingerling->update([
        'stocking_details' => json_encode($request->stocking_details),
        'harvest_details' => json_encode($request->harvest_details),
        'community_distribution_kg' => $request->community_distribution_kg,
        'amount_cumulative_kg' => $request->amount_cumulative_kg,
        'total_income_rs' => $request->total_income_rs,
        'wholesale_quantity_kg' => $request->wholesale_quantity_kg,
        'no_of_families_benefited' => $request->no_of_families_benefited,
    ]);

    return redirect()->route('fingerling.show', $fingerling->tank_id)->with('success', 'Fingerling data updated successfully.');
    }

    
    public function updateStatus(Request $request, $tank_id)
    {
        $request->validate([
            'status' => 'nullable|string',
        ]);
    
        // Update or create status
        FingerlingStatus::updateOrCreate(
            ['tank_id' => $tank_id],
            ['status' => $request->status]
        );
    
        return back()->with('success', 'Status updated successfully.');
    }
    


}
