<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmerOrganization;
use League\Csv\Reader;

class FarmerOrganizationController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $farmerorganizations = FarmerOrganization::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('farmer_organization.farmer_organization_index', compact('farmerorganizations', 'entries'));
    }

    public function create()
    {
        return view('farmer_organization.farmer_organization_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'registration_institute' => 'required|string|max:255',
            'edate' => 'required|date',
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ds_division_name' => 'required|string|max:255',
            'gn_division_name' => 'required|string|max:255',
            'as_center' => 'required|string|max:255',
            'tank_name' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
        ]);

        $farmerorganization = FarmerOrganization::create($request->all());

        return redirect('/farmerorganization')->with('success', 'Farmer Organization registered successfully.');
    }

    public function show($id)
{
    // Find the FarmerOrganization by ID
    $farmerOrganization = FarmerOrganization::findOrFail($id);

    // Return the view with the farmer organization data
    return view('farmer_organization.farmer_organization_show', compact('farmerOrganization'));
}
    public function edit(FarmerOrganization $farmerorganization)
    {
        return view('farmer_organization.farmer_organization_edit', compact('farmerorganization'));
    }

    public function update(Request $request, FarmerOrganization $farmerorganization)
    {
        $request->validate([
            'registration_number' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'registration_institute' => 'required|string|max:255',
            'edate' => 'required|date',
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ds_division_name' => 'required|string|max:255',
            'gn_division_name' => 'required|string|max:255',
            'as_center' => 'required|string|max:255',
            'tank_name' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
        ]);

        $farmerorganization->update($request->all());

        return redirect('/farmerorganization')->with('success', 'Farmer Organization updated successfully.');
    }

    public function destroy(FarmerOrganization $farmerorganization)
    {
        // If there are associated family members, handle their deletion
        // Assuming there's a relationship defined in the FarmerOrganization model
        // $familyMembers = $farmerorganization->family;

        // foreach ($familyMembers as $familyMember) {
        //     $familyMember->delete();
        // }

        $farmerorganization->delete();

        return redirect('/farmerorganization')->with('success', 'Farmer Organization and associated family members deleted successfully.');
    }


    /**
     * Export data to CSV.
     */
    public function reportCsv()
    {
        $tankRehabilitations = FarmerOrganization::latest()->get();
        $filename = 'farmer_organization_report.csv';
        $fp = fopen($filename, 'w+'); // Corrected file path
        fputcsv($fp, ['Registration Number','Farmer Organization Name', 'Address', 'Registration Institute', 'Establish Date', 'Province', 'District', 'DSD', 'GND', 'ASC', 'Tank Name', 'Cascade Name']);

        foreach ($tankRehabilitations as $row) {
            fputcsv($fp, [$row->registration_number, $row->organization_name, $row->address, $row->registration_institute, $row->edate, $row->province_name, $row->district_name, $row->ds_division_name, $row->gn_division_name, $row->as_center, $row->tank_name, $row->cascade_name]);
        }
        fclose($fp);
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'farmer_organization_report.csv', $headers);
    }


    /**
     * Upload CSV and import data.
     */
    public function uploadCsv(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        // Read the CSV file
        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        // Parse the CSV file
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        // Iterate through each row in the CSV
        foreach ($csv as $row) {
            // Create a new TankRehabilitation instance
            $farmerorganization = new FarmerOrganization();
            $farmerorganization->registration_number = $row['Registration Number'];
            $farmerorganization->organization_name = $row['Farmer Organization Name'];
            $farmerorganization->address = $row['Address'];
            $farmerorganization->registration_institute = $row['Registration Institute'];
            $farmerorganization->edate = $row['Establish Date'];
            $farmerorganization->province_name = $row['Province'];
            $farmerorganization->district_name = $row['District'];
            $farmerorganization->ds_division_name = $row['DSD'];
            $farmerorganization->gn_division_name = $row['GND'];
            $farmerorganization->as_center = $row['ASC'];
            $farmerorganization->tank_name = $row['Tank Name'];
            $farmerorganization->cascade_name = $row['Cascade Name'];

            $farmerorganization->save();
        }

        // Provide feedback to the user
        return redirect('/farmerorganization')->with('success', 'CSV data imported successfully');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $farmerorganizations = FarmerOrganization::where('registration_number', 'like', '%'.$search.'%')
            ->orWhere('organization_name', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('registration_institute', 'like', '%'.$search.'%')
            ->orWhere('edate', 'like', '%'.$search.'%')
            ->orWhere('province_name', 'like', '%'.$search.'%')
            ->orWhere('district_name', 'like', '%'.$search.'%')
            ->orWhere('ds_division_name', 'like', '%'.$search.'%')
            ->orWhere('gn_division_name', 'like', '%'.$search.'%')
            ->orWhere('as_center', 'like', '%'.$search.'%')
            ->orWhere('tank_name', 'like', '%'.$search.'%')
            ->orWhere('cascade_name', 'like', '%'.$search.'%')
            ->paginate(10);

        return view('farmer_organization.farmer_organization_index', compact('farmerorganizations', 'search'));
    }
}
