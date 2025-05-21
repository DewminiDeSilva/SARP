<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;

class FruitController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $fruits = Fruit::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.fruit_create', compact('fruits', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.fruit_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fruit_name' => 'required|string|max:255',
        ]);

        Fruit::create($request->all());

        // Redirect to agriculture overview page
        return redirect()->route('agri')->with('success', 'Fruit registered successfully.');
    }


    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
