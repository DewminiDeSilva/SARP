<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grievance;
use League\Csv\Reader;


class GrievanceController extends Controller
{
    // Adjusted the index method if the parent Controller does not have parameters
    public function index() // Adjusted to have no parameters
    {
        $grievances = $this->getGrievances(request()); // Use the global request helper
        $totalGrievances = Grievance::count();
        return view('grievances.grievances_index', compact('grievances', 'totalGrievances'));
    }


    public function create()
    {
        return view('grievances.grievances_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grievance_description' => 'required|string|max:1000',
            'contact_number' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'dsd' => 'required|string|max:255',
            'gnd' => 'required|string|max:255',
            'asc' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
            'tank_name' => 'required|string|max:255',
            'sub_project_name' => 'required|string|max:255',
            'sub_project_gn_division' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['date_received'] = now(); // Automatically set the system date

        Grievance::create($data);

        return redirect()->route('grievances.index')->with('success', 'Grievance created successfully.');
    }

    // Method to generate CSV report
// Method to generate CSV report
public function reportCsv()
{
    $grievances = Grievance::all();
    $filename = 'grievances_report.csv';
    $fp = fopen($filename, 'w+');

    // Headers for the CSV file
    fputcsv($fp, [
        'ID',
        'Name',
        'NIC',
        'Address',
        'Subject',
        'Grievance Description',
        'Contact Number',
        'Province',
        'District',
        'DSD',
        'GND',
        'ASC',
        'Cascade Name',
        'Tank Name',
        'Sub Project Name',
        'Sub Project GN Division',
        'Date Received'
    ]);

    // Loop through grievances and export each record
    foreach ($grievances as $grievance) {
        fputcsv($fp, [
            $grievance->id,
            $grievance->name,
            $grievance->nic,
            $grievance->address,
            $grievance->subject,
            $grievance->grievance_description,
            $grievance->contact_number,
            $grievance->province,
            $grievance->district,
            $grievance->dsd,
            $grievance->gnd,
            $grievance->asc,
            $grievance->cascade_name,
            $grievance->tank_name,
            $grievance->sub_project_name,
            $grievance->sub_project_gn_division,
            $grievance->date_received // Include the date received field
        ]);
    }

    fclose($fp);

    return response()->download($filename, 'grievances_report.csv');
}

// Method to upload CSV and import data
public function uploadCsv(Request $request)
{
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt',
    ]);

    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    $csv = Reader::createFromPath($path, 'r');
    $csv->setHeaderOffset(0); // Assume first row contains headers

    foreach ($csv as $row) {
        Grievance::create([
            'name' => $row['Name'],
            'nic' => $row['NIC'],
            'address' => $row['Address'],
            'subject' => $row['Subject'],
            'grievance_description' => $row['Grievance Description'],
            'contact_number' => $row['Contact Number'],
            'province' => $row['Province'], // Add as needed
            'district' => $row['District'], // Add as needed
            'dsd' => $row['DSD'], // Add as needed
            'gnd' => $row['GND'], // Add as needed
            'asc' => $row['ASC'], // Add as needed
            'cascade_name' => $row['Cascade Name'], // Add as needed
            'tank_name' => $row['Tank Name'], // Add as needed
            'sub_project_name' => $row['Sub Project Name'], // Add as needed
            'sub_project_gn_division' => $row['Sub Project GN Division'], // Add as needed
            'date_received' => now(), // Automatically set the date
        ]);
    }

    return redirect()->route('grievances.index')->with('success', 'CSV data imported successfully.');
}

public function show($id)
{
    // Find the grievance by its ID or fail if not found
    $grievance = Grievance::findOrFail($id);

    // Return a view to display the grievance details
    return view('grievances.grievance_show', compact('grievance'));
}

private function getGrievances(Request $request)
    {
        $search = $request->get('search');

        return Grievance::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('nic', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%")
                ->orWhere('grievance_description', 'like', "%{$search}%")
                ->orWhere('contact_number', 'like', "%{$search}%")
                ->orWhere('province', 'like', "%{$search}%")
                ->orWhere('district', 'like', "%{$search}%")
                ->orWhere('dsd', 'like', "%{$search}%")
                ->orWhere('gnd', 'like', "%{$search}%")
                ->orWhere('asc', 'like', "%{$search}%")
                ->orWhere('cascade_name', 'like', "%{$search}%")
                ->orWhere('tank_name', 'like', "%{$search}%")
                ->orWhere('sub_project_name', 'like', "%{$search}%")
                ->orWhere('sub_project_gn_division', 'like', "%{$search}%");
        })->paginate(10);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        // Search query for grievances through all relevant fields
        $grievances = Grievance::where('name', 'like', '%' . $search . '%')
            ->orWhere('nic', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('subject', 'like', '%' . $search . '%')
            ->orWhere('grievance_description', 'like', '%' . $search . '%')
            ->orWhere('contact_number', 'like', '%' . $search . '%')
            ->orWhere('province', 'like', '%' . $search . '%')
            ->orWhere('district', 'like', '%' . $search . '%')
            ->orWhere('dsd', 'like', '%' . $search . '%')
            ->orWhere('gnd', 'like', '%' . $search . '%')
            ->orWhere('asc', 'like', '%' . $search . '%')
            ->orWhere('cascade_name', 'like', '%' . $search . '%')
            ->orWhere('tank_name', 'like', '%' . $search . '%')
            ->orWhere('sub_project_name', 'like', '%' . $search . '%')
            ->orWhere('sub_project_gn_division', 'like', '%' . $search . '%')
            ->paginate(10);

            $totalGrievances = $grievances->total();

        return view('grievances.grievances_index', compact('grievances', 'search', 'totalGrievances'));
    }

}




