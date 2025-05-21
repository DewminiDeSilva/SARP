<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeGarden;

class HomeGardenController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $homegardens = HomeGarden::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.homegarden_create', compact('homegardens', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.homegarden_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'homegarden_name' => 'required|string|max:255',
        ]);

        HomeGarden::create($request->all());

        // Redirect to agri route (agriculture dashboard)
        return redirect()->route('agri')->with('success', 'Homegarden registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
