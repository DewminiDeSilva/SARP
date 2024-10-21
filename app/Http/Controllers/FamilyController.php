<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use App\Models\Beneficiary;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::latest()->paginate(10); // Change 10 to the desired number of records per page
        return view('family.family_index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($beneficiaryId)
    {
        return view('family.family_create', ['beneficiaryId' => $beneficiaryId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_with_initials' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'nic' => 'required|string|max:20', // Validate NIC
            'youth' => 'required|string',
            'education' => 'required|string',
            'income_source' => 'required|string',
            'income' => 'required|numeric',
            'nutrition_level' => 'required|string',
        ]);

        $family = new Family;

        $family->name_with_initials = $request->input('name_with_initials');
        $family->phone = $request->input('phone');
        $family->gender = $request->input('gender');
        $family->dob = $request->input('dob');
        $family->nic = $request->input('nic'); // Store NIC
        $family->youth = $request->input('youth');
        $family->education = $request->input('education');
        $family->income_source = $request->input('income_source'); // Changed from employment
        $family->income = $request->input('income');
        $family->nutrition_level = $request->input('nutrition_level');
        
        // Get the beneficiary ID from the request
        $beneficiaryId = $request->input('beneficiary_id');
        
        // Find the beneficiary
        $beneficiary = Beneficiary::findOrFail($beneficiaryId);
        
        // Associate the family member with the beneficiary
        $family->beneficiary()->associate($beneficiary);
        
        $family->save();

        return redirect('/family')->with('success', 'Family member added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        return view('family.family_show', compact('family'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('family.family_edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name_with_initials' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'nic' => 'required|string|max:20', // Validate NIC
            'youth' => 'required|string',
            'education' => 'required|string',
            'income_source' => 'required|string',
            'income' => 'required|numeric',
            'nutrition_level' => 'required|string',
        ]);

        $family->name_with_initials = $request->input('name_with_initials');
        $family->phone = $request->input('phone');
        $family->gender = $request->input('gender');
        $family->dob = $request->input('dob');
        $family->nic = $request->input('nic'); // Update NIC
        $family->youth = $request->input('youth');
        $family->education = $request->input('education');
        $family->income_source = $request->input('income_source'); // Changed from employment
        $family->income = $request->input('income');
        $family->nutrition_level = $request->input('nutrition_level');
        
        $family->save();

        return redirect('/family')->with('success', 'Family member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();
        return redirect('/family')->with('success', 'Family member deleted successfully!');
    }
}
