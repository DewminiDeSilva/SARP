<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poultary;

class PoultaryController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $poultaries = Poultary::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.Poultary_create', compact('poultaries', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.Poultary_create');
    }

    public function store(Request $request)
{
    $request->validate([
        'poultary_name' => 'required|string|max:255',
    ]);

    Poultary::create($request->all());

    return redirect()->route('livestock')->with('success', 'Poultry registered successfully.');
}


    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
