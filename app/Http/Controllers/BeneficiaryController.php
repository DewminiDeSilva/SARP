<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Livestock;
use App\Models\YouthProposal;
use League\Csv\Reader;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BeneficiaryController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        // search function crop names 
        $search = $request->get('search', ''); // Default value if not provided
        $beneficiaries = Beneficiary::where('nic', 'like', '%'.$search.'%')
            ->orWhere('name_with_initials', 'like', '%'.$search.'%')
            ->orWhere('gender', '=', $search) // Exact match for gender
            ->orWhere('dob', 'like', '%'.$search.'%') // Added
            ->orWhere('age', 'like', '%'.$search.'%') // Added
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%') // Added
            ->orWhere('phone', 'like', '%'.$search.'%')
            ->orWhere('income_source', 'like', '%'.$search.'%')
            ->orWhere('average_income', 'like', '%'.$search.'%') // Added
            ->orWhere('monthly_household_expenses', 'like', '%'.$search.'%') // Added
            ->orWhere('number_of_family_members', 'like', '%'.$search.'%')
            ->orWhere('education', 'like', '%'.$search.'%')
            ->orWhere('land_ownership_total_extent', 'like', '%'.$search.'%')
            ->orWhere('land_ownership_proposed_cultivation_area', 'like', '%'.$search.'%')
            ->orWhere('province_name', 'like', '%'.$search.'%')
            ->orWhere('district_name', 'like', '%'.$search.'%')
            ->orWhere('ds_division_name', 'like', '%'.$search.'%')
            ->orWhere('gn_division_name', 'like', '%'.$search.'%')
            ->orWhere('as_center', 'like', '%'.$search.'%')
            ->orWhere('cascade_name', 'like', '%'.$search.'%') // Added
            ->orWhere('ai_division', 'like', '%'.$search.'%') // Added
            ->orWhere('tank_name', 'like', '%'.$search.'%')
            ->orWhere('bank_name', 'like', '%'.$search.'%')
            ->orWhere('bank_branch', 'like', '%'.$search.'%')
            ->orWhere('account_number', 'like', '%'.$search.'%')
            ->orWhere('head_of_householder_name', 'like', '%'.$search.'%') // Added
            ->orWhere('householder_number', 'like', '%'.$search.'%') // Added
            ->orWhere('household_level_assets_description', 'like', '%'.$search.'%') // Added
            ->orWhere('community_based_organization', 'like', '%'.$search.'%') // Added
            ->orWhere('type_of_water_resource', 'like', '%'.$search.'%') // Added
            ->orWhere('training_details_description', 'like', '%'.$search.'%') // Added
            ->orWhere('latitude', 'like', '%'.$search.'%')
            ->orWhere('longitude', 'like', '%'.$search.'%')
            ->orWhere('input1', 'like', '%' . $search . '%') // New input
            ->orWhere('input2', 'like', '%' . $search . '%') // New input
            ->orWhere('input3', 'like', '%' . $search . '%') // New input
            ->orWhere('project_type', 'like', '%' . $search . '%')
            ->paginate(10);
                            
            $allBeneficiaries = Beneficiary::all();

    $convertedMap = [];
    foreach ($allBeneficiaries as $b) {
        $nic = $b->nic;
        if (preg_match('/^(\d{2})(\d{3})(\d{4})[VXvx]?$/', $nic, $matches)) {
            $convertedMap[$b->id] = '19' . $matches[1] . $matches[2] . '0' . $matches[3];
        }
    }

    $input3Summary = Beneficiary::where('input3', 'like', '%'.$search.'%')
        ->select('input3', DB::raw('COUNT(*) as count'))
        ->groupBy('input3')
        ->get();

    $tankNameSummary = Beneficiary::select('tank_name', DB::raw('COUNT(*) as count'))
        ->groupBy('tank_name')
        ->get();

    return view('beneficiary.beneficiary_index', compact(
        'beneficiaries',
        'search',
        'input3Summary',
        'tankNameSummary',
        'allBeneficiaries',
        'convertedMap'
    ));
}
        
    
        // Check if you want to return the beneficiary_index or beneficiary_list view
        
    
    
    /**
     * Import data.
     */
     public function uploadCsv(Request $request)
     {
         // Validate that the uploaded file is a CSV
         $request->validate([
             'csv_file' => 'required|mimes:csv,txt|max:2048',
         ]);
     
         // Read the CSV file
         if ($file = $request->file('csv_file')) {
             $csvData = file_get_contents($file);
             $rows = array_map('str_getcsv', explode("\n", $csvData));
             $header = array_shift($rows); // Extract header row
     
             // Process each row and insert into the database
             foreach ($rows as $row) {
                 if (count($row) === count($header)) {
                     $beneficiaryData = array_combine($header, $row);
     
                     // Handle invalid or empty DOB
                     $dob = isset($beneficiaryData['Date Of Birth']) && !empty($beneficiaryData['Date Of Birth']) 
                         ? $beneficiaryData['Date Of Birth'] // No format conversion
                         : null;
     
                     // Insert into Beneficiary model
                     Beneficiary::create([
                         'nic' => $beneficiaryData['NIC'] ?? null,
                         'name_with_initials' => $beneficiaryData['Name with Initials'] ?? null,
                         'dob' => $dob, // Store as null if invalid
                         'gender' => $beneficiaryData['Gender'] ?? null,
                         'age' => $beneficiaryData['Age'] ?? null,
                         'address' => $beneficiaryData['Address'] ?? null,
                         'email' => $beneficiaryData['Email'] ?? null,
                         'phone' => $beneficiaryData['Phone'] ?? null,
                         'education' => $beneficiaryData['Education'] ?? null,
                         'bank_name' => $beneficiaryData['Bank Name'] ?? null,
                         'bank_branch' => $beneficiaryData['Bank Branch'] ?? null,
                         'account_number' => $beneficiaryData['Account Number'] ?? null,
                         'land_ownership_total_extent' => $beneficiaryData['Land Ownership Total Extent'] ?? null,
                         'land_ownership_proposed_cultivation_area' => $beneficiaryData['Land Ownership Proposed Cultivation Area'] ?? null,
                         'province_name' => $beneficiaryData['Province'] ?? null,
                         'district_name' => $beneficiaryData['District'] ?? null,
                         'ds_division_name' => $beneficiaryData['DS Division'] ?? null,
                         'gn_division_name' => $beneficiaryData['GN Division'] ?? null,
                         'as_center' => $beneficiaryData['AS Center'] ?? null,
                         'cascade_name' => $beneficiaryData['Cascade Name'] ?? null,
                         'tank_name' => $beneficiaryData['Tank Name'] ?? null,
                         'ai_division' => $beneficiaryData['AI Division'] ?? null,
                         'latitude' => $beneficiaryData['Latitude'] ?? null,
                         'longitude' => $beneficiaryData['Longitude'] ?? null,
                         'number_of_family_members' => $beneficiaryData['Number of Family Members'] ?? null,
                         'head_of_householder_name' => $beneficiaryData['Head of Householder Name'] ?? null,
                         'householder_number' => $beneficiaryData['Householder Number'] ?? null,
                         'income_source' => $beneficiaryData['Income Source'] ?? null,
                         'average_income' => $beneficiaryData['Average Income'] ?? null,
                         'monthly_household_expenses' => $beneficiaryData['Monthly Household Expenses'] ?? null,
                         'household_level_assets_description' => $beneficiaryData['Household Level Assets Description'] ?? null,
                         'community_based_organization' => $beneficiaryData['Community-Based Organization'] ?? null,
                         'type_of_water_resource' => $beneficiaryData['Type of Water Resource'] ?? null,
                         'training_details_description' => $beneficiaryData['Training Details Description'] ?? null,
                         'input1' => $beneficiaryData['Input1'] ?? null, // New input
                        'input2' => $beneficiaryData['Input2'] ?? null, // New input
                        'input3' => $beneficiaryData['Input3'] ?? null, // New input
                        'project_type' => $beneficiaryData['project_type'] ?? null, // New input
                     ]);
                 }
             }
         }
     
         // Redirect back with a success message
         return redirect()->back()->with('success', 'CSV uploaded and beneficiary records added successfully.');
     }
     

public function generateCsv()
{
    $beneficiaries = Beneficiary::all(); // Retrieve all beneficiaries

    // Define the CSV file name
    $filename = 'beneficiary_report.csv';

    // Open a file in write mode
    $file = fopen($filename, 'w+');

    // Define the header for the CSV file
    $header = [
        'NIC', 'Name with Initials', 'Gender', 'Date Of Birth', 'Age', 'Address', 'Email', 'Phone', 'Education',
        'Bank Name', 'Bank Branch', 'Account Number', 'Land Ownership Total Extent', 'Land Ownership Proposed Cultivation Area',
        'Province', 'District', 'DS Division', 'GN Division', 'ASC', 'Cascade Name', 'AI Division', 'Latitude', 'Longitude',
        'Number of Family Members', 'Head of Householder Name', 'Householder Number', 'Income Source', 'Average Income',
        'Monthly Household Expenses', 'Household Level Assets Description', 'Community-Based Organization', 'Type of Water Resource',
        'Training Details Description','Input1', 'Input2', 'Input3','project_type'
    ];

    // Insert the header into the CSV file
    fputcsv($file, $header);

    // Iterate through each beneficiary and insert data row into CSV
    foreach ($beneficiaries as $beneficiary) {
        $data = [
            $beneficiary->nic,
            $beneficiary->name_with_initials,
            $beneficiary->gender,
            $beneficiary->dob,
            $beneficiary->age,
            $beneficiary->address,
            $beneficiary->email,
            $beneficiary->phone,
            $beneficiary->education,
            $beneficiary->bank_name,
            $beneficiary->bank_branch,
            $beneficiary->account_number,
            $beneficiary->land_ownership_total_extent,
            $beneficiary->land_ownership_proposed_cultivation_area,
            $beneficiary->province_name,
            $beneficiary->district_name,
            $beneficiary->ds_division_name,
            $beneficiary->gn_division_name,
            $beneficiary->as_center,
            $beneficiary->cascade_name,
            $beneficiary->ai_division,
            $beneficiary->latitude,
            $beneficiary->longitude,
            $beneficiary->number_of_family_members,
            $beneficiary->head_of_householder_name,
            $beneficiary->householder_number,
            $beneficiary->income_source,
            $beneficiary->average_income,
            $beneficiary->monthly_household_expenses,
            $beneficiary->household_level_assets_description,
            $beneficiary->community_based_organization,
            $beneficiary->type_of_water_resource,
            $beneficiary->training_details_description,
            $beneficiary->input1, // New input
            $beneficiary->input2, // New input
            $beneficiary->input3, // New input
            $beneficiary->project_type,
        ];

        

        // Insert data row into CSV
        fputcsv($file, $data);
    }

    // Close the file
    fclose($file);

    // Return the CSV file as a download response
    return response()->download($filename, 'beneficiary_report.csv', [
        'Content-Type' => 'text/csv',
    ]);
}

public function index(Request $request)
    {
        $search = '';
        $entries = $request->get('entries', 10);
        $showDuplicates = $request->get('duplicates');

        $query = Beneficiary::query();

        // Get all beneficiaries (for duplicate detection)
        $allBeneficiaries = Beneficiary::all();

        // Map for tracking NICs and converted NICs
        $nicMap = [];
        $convertedMap = [];

        foreach ($allBeneficiaries as $beneficiary) {
            $nic = $beneficiary->nic;
            $converted = null;

            if (preg_match('/^(\d{2})(\d{3})(\d{4})[VXvx]?$/', $nic, $matches)) {
                $converted = '19' . $matches[1] . $matches[2] . '0' . $matches[3];
                $convertedMap[$beneficiary->id] = $converted;
            }

            $nicMap[$nic][] = $beneficiary->id;
            if ($converted) {
                $nicMap[$converted][] = $beneficiary->id;
            }
        }

        // Find all duplicate NICs
        $duplicateNICs = [];
        foreach ($nicMap as $nic => $ids) {
            if (count($ids) > 1) {
                foreach ($ids as $id) {
                    $duplicateNICs[] = $id;
                }
            }
        }

        // Filter only duplicates if requested
        if ($showDuplicates) {
            $query->whereIn('id', $duplicateNICs);
        }

        $beneficiaries = $query->latest()->paginate($entries)->appends([
            'entries' => $entries,
            'duplicates' => $showDuplicates
        ]);

        $input3Summary = Beneficiary::select('input3', DB::raw('COUNT(*) as count'))
                                    ->groupBy('input3')->get();

        $tankNameSummary = Beneficiary::select('tank_name', DB::raw('COUNT(*) as count'))
                                    ->groupBy('tank_name')->get();

        return view('beneficiary.beneficiary_index', compact(
            'beneficiaries',
            'allBeneficiaries',
            'input3Summary',
            'tankNameSummary',
            'convertedMap',
            'duplicateNICs'
        ));
    }





    public function dashboard()
    {
        $maleCount = Beneficiary::where('gender', 'male')->count();
        $femaleCount = Beneficiary::where('gender','female')->count();
        $youthCount = Beneficiary::where('age','<', 30)->count();
        $middleAgeCount = Beneficiary::where('age','>=', 30)->count();
        return view('dashboard.dashboard', compact('maleCount', 'femaleCount', 'youthCount', 'middleAgeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agreementSignedYouth = YouthProposal::where('status', 'Agreement Signed')->get(['id', 'organization_name']);

        return view('beneficiary.beneficiary_create', compact('agreementSignedYouth'));
    }

    public function store(Request $request)
    {
        
    // Validate the request data
    $request->validate([
        'nic' => 'required|string|max:12|unique:beneficiaries,nic', // Not nullable
        'name_with_initials' => 'required|string|max:255', // Not nullable
        'gender' => 'required|string|in:male,female,other', // Not nullable
        'dob' => 'required|date', // Not nullable
        'age' => 'required|integer|min:0|max:150', // Not nullable
        'address' => 'required|string|max:255', // Not nullable
        'email' => 'nullable|email|max:255', // Nullable
        'phone' => 'required|string|max:15', // Not nullable
        'education' => 'required|string|max:255', // Not nullable
        'bank_name' => 'required|string|max:255', // Not nullable
        'bank_branch' => 'required|string|max:255', // Not nullable
        'account_number' => 'required|string|max:20', // Not nullable
        'land_ownership_total_extent' => 'required|string|max:255', // Not nullable
        'land_ownership_proposed_cultivation_area' => 'required|string|max:255', // Not nullable
        'province_name' => 'required|string|max:255', // Not nullable
        'district_name' => 'required|string|max:255', // Not nullable
        'ds_division_name' => 'required|string|max:255', // Not nullable
        'gn_division_name' => 'required|string|max:255', // Not nullable
        'as_center' => 'required|string|max:255', // Not nullable
        'cascade_name' => 'required|string|max:255', // Not nullable
        'tank_name' => 'required|string|max:255', // Not nullable
        'ai_division' => 'required|string|max:255', // Not nullable
        'latitude' => 'nullable|numeric|between:-90,90', // Nullable
        'longitude' => 'nullable|numeric|between:-180,180', // Nullable
        'number_of_family_members' => 'required|integer|min:1|max:100', // Not nullable
        'head_of_householder_name' => 'required|string|max:255', // Not nullable
        'householder_number' => 'required|string|max:20', // Not nullable
        'income_source' => 'required|string|max:255', // Not nullable
        'average_income' => 'required|numeric|min:0', // Not nullable
        'monthly_household_expenses' => 'required|numeric|min:0', // Not nullable
        'household_level_assets_description' => 'required|string|max:500', // Not nullable
        'community_based_organization' => 'nullable|string|max:255', // Nullable
        'type_of_water_resource' => 'required|string|max:255', // Not nullable
        'training_details_description' => 'nullable|string|max:500', // Nullable
        'input1' => 'nullable|string|max:255',
        'input2' => 'nullable|string|max:255',
        'input3' => 'nullable|string|max:255',
        'project_type' => 'nullable|string|max:255',
        'youth_proposal_id' => 'nullable|exists:youth_proposals,id',

    ]);
 




    // Create a new beneficiary instance after validation
    $beneficiary = new Beneficiary($request->all());
    $beneficiary->save();

    return redirect('/beneficiary')->with('success', 'Beneficiary registered successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Beneficiary $beneficiary)
    {


        return view('beneficiary.beneficiary_show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiary $beneficiary)
    {
        //return view('beneficiary.beneficiary_edit', compact('beneficiary'));

       // $beneficiary = Beneficiary::findOrFail($id);
        return view('beneficiary.beneficiary_edit', compact('beneficiary'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, Beneficiary $beneficiary)
    {

        dd($request->all());
        // Validate the request
        $request->validate([
        'nic' => 'required|string|max:20|unique:beneficiaries,nic,' . $id,
        'name_with_initials' => 'required|string|max:255',
        'gender' => 'required|string',
        'dob' => 'required|date',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'education' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'account_number' => 'nullable|string|max:255',
        'land_ownership_total_extent' => 'nullable|numeric',
        'land_ownership_proposed_cultivation_area' => 'nullable|numeric',
        'age' => 'required|integer',
        'province_name' => 'nullable|string|max:255',
        'district_name' => 'nullable|string|max:255',
        'ds_division_name' => 'nullable|string|max:255',
        'gn_division_name' => 'nullable|string|max:255',
        'as_center' => 'nullable|string|max:255',
        'tank_name' => 'nullable|string|max:255',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'cascade_name' => 'nullable|string|max:255',
        'ai_division' => 'nullable|string|max:255',
        'number_of_family_members' => 'nullable|integer',
        'head_of_householder_name' => 'nullable|string|max:255',
        'householder_number' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'community_based_organization' => 'nullable|string|max:255',
        'income_source' => 'nullable|string|max:255',
        'average_income' => 'nullable|numeric',
        'monthly_household_expenses' => 'nullable|numeric',
        'household_level_assets_description' => 'nullable|string|max:500',
        'type_of_water_resource' => 'nullable|string|max:255',
        'training_details_description' => 'nullable|string|max:500',
        ]);
        $beneficiary->save();
    
        // Update beneficiary data
        $beneficiary->update($request->all());
    
        // Redirect with success message
        return redirect()->route('beneficiary.index')->with('success', 'Beneficiary updated successfully.');
    }*/

    public function update(Request $request, $id)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'nic' => 'required|string|max:20|unique:beneficiaries,nic,' . $id,
        'name_with_initials' => 'required|string|max:255',
        'gender' => 'required|string',
        'dob' => 'required|date',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'education' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'account_number' => 'nullable|string|max:255',
        'land_ownership_total_extent' => 'nullable|numeric',
        'land_ownership_proposed_cultivation_area' => 'required|string|max:255',
        'age' => 'required|integer',
        'province_name' => 'nullable|string|max:255',
        'district_name' => 'nullable|string|max:255',
        'ds_division_name' => 'nullable|string|max:255',
        'gn_division_name' => 'nullable|string|max:255',
        'as_center' => 'nullable|string|max:255',
        'tank_name' => 'nullable|string|max:255',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'cascade_name' => 'nullable|string|max:255',
        'ai_division' => 'nullable|string|max:255',
        'number_of_family_members' => 'nullable|integer',
        'head_of_householder_name' => 'nullable|string|max:255',
        'householder_number' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'community_based_organization' => 'nullable|string|max:255',
        'income_source' => 'nullable|string|max:255',
        'average_income' => 'nullable|numeric',
        'monthly_household_expenses' => 'nullable|numeric',
        'household_level_assets_description' => 'nullable|string|max:500',
        'type_of_water_resource' => 'nullable|string|max:255',
        'training_details_description' => 'nullable|string|max:500',
        'input1' => 'nullable|string|max:255',
        'input2' => 'nullable|string|max:255',
        'input3' => 'nullable|string|max:255',
        'project_type' => 'nullable|string|max:255',
    ]);

    // Find the beneficiary by ID
    $beneficiary = Beneficiary::findOrFail($id);

    // Update beneficiary details
    $beneficiary->update($validatedData);

    // Return a response, like a redirect or JSON response
    return response()->json(['message' => 'Beneficiary updated successfully!']);
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiary $beneficiary)
    {
    // Retrieve all associated family members for the beneficiary
    $familyMembers = $beneficiary->family;

    // Check if there are family members before attempting to delete
    if ($familyMembers) {
        // Delete each family member
        foreach ($familyMembers as $familyMember) {
            $familyMember->delete();
        }
    }

    // Now, delete the beneficiary
    $beneficiary->delete();

    return redirect('/beneficiary')->with('success', 'Beneficiary and associated family members deleted successfully.');
    }


    /**
     * Export data to CSV.
     */
    public function reportCsv()
    {
    $beneficiaries = Beneficiary::latest()->get();
    $filename = 'beneficiary_report.csv';
    $fp = fopen($filename, 'w+'); // Corrected file path
    fputcsv($fp, [
        'NIC', 'Name with Initials', 'Address', 'Date Of Birth', 'Gender', 'Age', 'Phone', 'Email', 'Income Source', 'Average Income', 
        'Monthly Household Expenses', 'Number of Family Members', 'Education', 'Land Ownership Total Extent', 'Land Ownership Proposed Cultivation Area', 
        'Province', 'District', 'DS Division', 'GN Division', 'ASC', 'Cascade Name', 'Tank Name', 'AI Division', 'Account Number', 'Bank Name', 
        'Bank Branch', 'Latitude', 'Longitude', 'Head of Householder Name', 'Householder Number', 'Household Level Assets Description', 
        'Community-Based Organization', 'Type of Water Resource', 'Training Details Description','Input1', 'Input2', 'Input3','project_type'
    ]);

    foreach ($beneficiaries as $row) {
        fputcsv($fp, [
            $row->nic, $row->name_with_initials, $row->address, $row->dob, $row->gender, $row->age, $row->phone, $row->email, $row->income_source, 
            $row->average_income, $row->monthly_household_expenses, $row->number_of_family_members, $row->education, $row->land_ownership_total_extent, 
            $row->land_ownership_proposed_cultivation_area, $row->province_name, $row->district_name, $row->ds_division_name, $row->gn_division_name, 
            $row->as_center, $row->cascade_name, $row->tank_name, $row->ai_division, $row->account_number, $row->bank_name, $row->bank_branch, 
            $row->latitude, $row->longitude, $row->head_of_householder_name, $row->householder_number, $row->household_level_assets_description, 
            $row->community_based_organization, $row->type_of_water_resource, $row->training_details_description,$row->input1, // Added field
            $row->input2, // Added field
            $row->input3,
            $row->project_type,
            
              // Added field
        ]);
    }
    fclose($fp);
    $headers = [
        'Content-Type' => 'text/csv',
    ];

    return response()->download($filename, 'beneficiary_report.csv', $headers);
    }


    public function list()
{
    $beneficiaries = Beneficiary::where('input1', 'livestock')
        ->select('id', 'nic', 'name_with_initials', 'address', 'dob', 'gender', 'age', 'phone', 'gn_division_name','input2 as livestock_type','input3 as production_focus')
        ->paginate(10);

    // Calculate summary statistics
    $totalBeneficiaries = Beneficiary::where('input1', 'livestock')->count();
    $totalGnDivisions = Beneficiary::where('input1', 'livestock')->distinct('gn_division_name')->count();
    $totalLivestocks = Livestock::distinct('gn_division_name')->count('gn_division_name');

    return view('beneficiary.beneficiary_list', compact('beneficiaries', 'totalBeneficiaries', 'totalGnDivisions', 'totalLivestocks'));
}


    
}
