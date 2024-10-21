<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegitable;

class VegitableController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $vegitables = Vegitable::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.vegitable_create', compact('vegitables', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.vegitable_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
        ]);

        $vegitable = Vegitable::create($request->all());

        return redirect('/vegitable')->with('success', 'Vegitable registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
