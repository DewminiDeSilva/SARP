<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dairy;

class DairyController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $dairies = Dairy::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.dairy_create', compact('dairies', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.dairy_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dairy_name' => 'required|string|max:255',
        ]);

        $dairy = Dairy::create($request->all());

        return redirect('/dairy')->with('success', 'Dairy registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    //$farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    //return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
}
