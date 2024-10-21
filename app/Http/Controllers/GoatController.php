<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;

class GoatController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $goats = Goat::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.goat_create', compact('goats', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.goat_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'goat_name' => 'required|string|max:255',
        ]);

        $goat = Goat::create($request->all());

        return redirect('/goat')->with('success', 'Goat Rearing registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
