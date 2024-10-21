<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmerMember;
use App\Models\FarmerOrganization;

class FarmerMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmer_members = FarmerMember::latest()->paginate(10);
        return view('farmer_member.farmer_member_index', compact('farmer_members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($farmerorganization_id)
    {
        return view('farmer_member.farmer_member_create', ['farmerorganization_id' => $farmerorganization_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'farmerorganization_id' => 'required|exists:farmer_organizations,id',
            'member_name' => 'required|string|max:255',
            'member_id' => 'required|string|max:255',
            'member_position' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'youth' => 'required|string|max:255',
        ]);

        $farmer_member = new FarmerMember($request->only([
            'member_name', 'member_id', 'member_position',
            'contact_number', 'address', 'gender', 'dob', 'youth'
        ]));

        $farmerorganization = FarmerOrganization::findOrFail($request->input('farmerorganization_id'));
        $farmer_member->farmerorganization()->associate($farmerorganization);

        $farmer_member->save();

        //return redirect('/farmermember')->with('success', 'Farmer member added successfully!');
        return response()->json([
            'success' => true,
            'message' => 'Farmer member added successfully!',
            'redirect_url' => route('farmerorganization.index')
        ]);






        // Validate the request data
        /*$request->validate([
            'member_name' => 'required|string|max:255',
            'member_id' => 'required|string|max:255',
            'member_position' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            // Additional validation rules if needed...
        ]);

        // Find the FarmerMember by id
        $farmer_member = FarmerMember::findOrFail($id);

        // Update the FarmerMember attributes
        $farmer_member->update([
            'member_name' => $request->member_name,
            'member_id' => $request->member_id,
            'member_position' => $request->member_position,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'youth' => $request->dob ? (now()->diffInYears($request->dob) < 35 ? 'Youth' : 'Not Youth') : $farmer_member->youth,
        ]);

        // Redirect to the farmer organization show page
        return redirect()->route('farmerorganization.show', $farmer_member->farmerorganization_id)
                         ->with('success', 'Farmer member updated successfully!');
*/



    }

    /**
     * Display the specified resource.
     */
   /* public function show(FarmerMember $farmer_member)
    {
        return view('farmer_member.farmer_member_show', compact('farmer_member'));
    }*/

    public function show($id)
    {
        $member = FarmerMember::findOrFail($id);
        return view('farmer_member.farmer_member_show', compact('member'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $farmer_member = FarmerMember::find($id);
    return view('farmer_member.farmer_member_edit', compact('farmer_member'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $farmer_member = FarmerMember::find($id);

        if ($farmer_member) {
            $request->validate([
                'member_name' => 'required|string|max:255',
                'member_id' => 'required|string|max:255',
                'member_position' => 'required|string|max:255',
                'contact_number' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'dob' => 'required|date',
                'youth' => 'required|string|max:255',
            ]);

            $farmer_member->update($request->all());

            return redirect()->route('farmermember.show', $farmer_member->id)
                             ->with('success', 'Farmer Member updated successfully.');
        } else {
            return redirect()->route('farmermember.index')
                             ->with('error', 'Farmer Member not found.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy($id)
{
    $farmer_member = FarmerMember::findOrFail($id);
    $farmer_member->delete();

    return redirect()->route('farmermember.index')
                     ->with('success', 'Farmer member deleted successfully!');
}*/

/**
 * Remove the specified resource from storage.
 */
public function destroy($id)
{
    $farmer_member = FarmerMember::findOrFail($id);
    $organization_id = $farmer_member->farmerorganization_id; // Assuming FarmerMember has a farmerorganization_id attribute
    $farmer_member->delete();

    return redirect()->route('farmerorganization.show', $organization_id)
                     ->with('success', 'Farmer member deleted successfully!');
}

}
