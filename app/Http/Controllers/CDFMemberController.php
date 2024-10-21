<?php
namespace App\Http\Controllers;
use App\Models\CDF;
use App\Models\CDFMember;
use Illuminate\Http\Request;

class CDFMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = request()->get('entries', 10); // Get 'entries' from request, default to 10 if not present
        $cdfMembers = CDFMember::latest()->paginate($entries)->appends(['entries' => $entries]); // Paginate based on 'entries'
       
        $totalCDFMembers = CDFMember::count(); // Fetch total count

        return view('cdf_member.cdf_member_index', compact('cdfMembers', 'totalCDFMembers', 'entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('cdf_member.cdf_member_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cdf_name' => 'required|string|max:255',
            'cdf_address' => 'required|string|max:255',
            'member_name' => 'required|string|max:255',
            'member_nic' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'position' => 'required|string|max:255',
            'representing_organization' => 'required|string|max:255',
            'province_name' => 'nullable|string|max:255',
            'district_name' => 'nullable|string|max:255',
            'ds_division_name' => 'nullable|string|max:255',
            'gn_division_name' => 'nullable|string|max:255',
            'as_center' => 'nullable|string|max:255',
        ]);

        $cdfMember = new CDFMember;
        $cdfMember->cdf_name = $request->input('cdf_name');
        $cdfMember->cdf_address = $request->input('cdf_address');
        $cdfMember->member_name = $request->input('member_name');
        $cdfMember->member_nic = $request->input('member_nic');
        $cdfMember->address = $request->input('address');
        $cdfMember->contact_number = $request->input('contact_number');
        $cdfMember->gender = $request->input('gender');
        $cdfMember->dob = $request->input('dob');
        $cdfMember->youth = $request->input('youth');
        $cdfMember->position = $request->input('position');
        $cdfMember->representing_organization = $request->input('representing_organization');

        $cdfMember->save();

        return redirect()->route('cdfmembers.index')->with('success', 'CDF registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the CDF and its associated members
        $cdf = Cdf::with('members')->findOrFail($id);

        dd($cdf);

        // Alternatively, if you want to fetch members in the same area:
        $membersInSameArea = CdfMember::where('area', $cdf->area)->get();

        return view('cdfmembers.show', compact('cdf', 'membersInSameArea'));

        // Fetch the CDF and its associated members
            $cdf = CDF::with('members')->findOrFail($id);
            return view('cdfmembers.show', compact('cdf'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cdfMember = CDFMember::findOrFail($id);
        return view('cdf_member.cdf_member_edit', compact('cdfMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'cdf_name' => 'required',
            'cdf_address' => 'required',
            'member_name' => 'required',
            'member_nic' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'position' => 'required',
            'representing_organization' => 'required',
        ]);

        // Find the existing record by ID
        $cdfMember = CDFMember::find($id);

        if ($cdfMember) {
            // Update the record with the validated data
            $cdfMember->update($request->all());

            // Redirect with success message
            return redirect()->route('cdfmembers.index')->with('success', 'CDF Member updated successfully.');
        } else {
            // If the record is not found, return an error
            return redirect()->route('cdfmembers.index')->with('error', 'CDF Member not found.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the record by ID
    $cdfMember = CDFMember::find($id);

    // Check if the record exists
    if ($cdfMember) {
        // Delete the record
        $cdfMember->delete();

        // Redirect with success message
        return redirect()->route('cdfmembers.index')->with('success', 'CDF Member deleted successfully.');
    } else {
        // If the record is not found, return an error
        return redirect()->route('cdfmembers.index')->with('error', 'CDF Member not found.');
    }
}


    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $cdfMembers = CDFMember::where('member_name', 'like', '%'.$search.'%')
            ->orWhere('cdf_name', 'like', '%'.$search.'%')
            ->orWhere('cdf_address', 'like', '%'.$search.'%')
            ->orWhere('member_nic', 'like', '%'.$search.'%')
            ->orWhere('contact_number', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('gender', 'like', '%'.$search.'%')
            ->orWhere('dob', 'like', '%'.$search.'%')
            ->orWhere('position', 'like', '%'.$search.'%')
            ->orWhere('representing_organization', 'like', '%'.$search.'%')
            ->paginate(10);

        return view('cdf_member.cdf_member_index', compact('cdfMembers', 'search'));
    }

/**
     * Display members in the same area.
     */
   /* public function showMembersInSameArea($id)
    {
        // Fetch the CDF by ID
        $cdf = Cdf::findOrFail($id);

        // Fet    ch members in the same area
        $membersInSameArea = CdfMember::where('area', $cdf->area)->get();

        // Pass both the cdf and membersInSameArea to the view
        return view('cdf_member.cdf_member_show', compact('cdf', 'membersInSameArea'));
    }
*/
public function showMembersInSameAreaByName($name)
{
    if (empty($name)) {
        return redirect()->back()->with('error', 'Invalid CDF Name');
    }

    // Fetch the CDF by name
    $cdf = CDF::where('cdf_name', $name)->firstOrFail();

    // Fetch members in the same CDF by name and address
    $membersInSameCDF = CDFMember::where('cdf_name', $cdf->cdf_name)
                                 ->where('cdf_address', $cdf->cdf_address)
                                 ->get();

    return view('cdf_member.cdf_member_show', compact('cdf', 'membersInSameCDF'));
}


}
