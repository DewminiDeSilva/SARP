<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AquaCulture;


class AquaCultureController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $aquacultures = AquaCulture::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.aquaculture_create', compact('aquacultures', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.aquaculture_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'aquaculture_name' => 'required|string|max:255',
        ]);

        $aquaculture = AquaCulture::create($request->all());

        return redirect('/aquaculture')->with('success', 'Aqua Culture registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
