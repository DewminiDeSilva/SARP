<?php

namespace App\Http\Controllers;
use App\Models\CDFMember;
use App\Models\CDF;
use Illuminate\Http\Request;
use League\Csv\Reader; // Add this line

class CDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index()
    {
        $entries = request()->get('entries', 10);
        $cdfs = CDF::latest()->paginate($entries)->appends(['entries' => $entries]);
        $totalCDFs = CDF::count();
        $cdfMembers = CDFMember::all();

        return view('cdf.cdf_index', compact('cdfs', 'totalCDFs', 'entries', 'cdfMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cdf.cdf_index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cdf = new CDF;
        $cdf->province_name = $request->input('province_name');
        $cdf->district_name = $request->input('district_name');
        $cdf->ds_division_name = $request->input('ds_division_name');
        $cdf->gn_division_name = $request->input('gn_division_name');
        $cdf->as_center = $request->input('as_center', ''); // Default value or validation ensures it's not null
        $cdf->cascade_name = $request->input('cascade_name');
        $cdf->cdf_name = $request->input('cdf_name');
        $cdf->cdf_address = $request->input('cdf_address');
        $cdf->save();


        return redirect('/cdf')->with('success', 'CDF record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CDF $cdf)
    {
        $membersInSameCDF = CDFMember::where('cdf_name', $cdf->cdf_name)
                                     ->where('cdf_address', $cdf->cdf_address)
                                     ->get();

        return view('cdf.cdf_show', compact('cdf', 'membersInSameCDF'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CDF $cdf)
    {
        return view('cdf.cdf_edit', compact('cdf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CDF $cdf)
    {
    $cdf->province_name = $request->province_name;
    $cdf->district_name = $request->district_name;
    $cdf->ds_division_name = $request->ds_division_name;
    $cdf->gn_division_name = $request->gn_division_name;
    $cdf->as_center = $request->as_center;
    $cdf->cascade_name = $request->cascade_name;
    $cdf->cdf_name = $request->cdf_name;
    $cdf->cdf_address = $request->cdf_address;
    $cdf->save();

        return redirect('/cdf')->with('success', 'CDF record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CDF $cdf)
    {
        $cdf->delete();
        return redirect('/cdf')->with('success', 'CDF record deleted successfully.');
    }


    //serch and

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $cdfs = CDF::where('province_name', 'like', '%'.$search.'%')
            ->orWhere('district_name', 'like', '%'.$search.'%')
            ->orWhere('ds_division_name', 'like', '%'.$search.'%')
            ->orWhere('gn_division_name', 'like', '%'.$search.'%')
            ->orWhere('as_center', 'like', '%'.$search.'%')
            ->orWhere('cascade_name', 'like', '%'.$search.'%')
            ->orWhere('cdf_name', 'like', '%'.$search.'%')
            ->orWhere('cdf_address', 'like', '%'.$search.'%')
            ->paginate(10);

        return view('cdf.cdf_index', compact('cdfs', 'search'));
    }

    /**
     * Export data to CSV.
     */
    public function reportCsv()
    {
        // Fetch the latest records from the CDF table
        $cdfs = CDF::latest()->get();

        // Define the CSV filename
        $filename = 'cdf_report.csv';

        // Open a file in write mode
        $fp = fopen($filename, 'w+'); // Corrected file path

        // Write the CSV column headers
        fputcsv($fp, ['Province','District', 'DSD', 'GND', 'ASC', 'Cascade Name', 'CDF Name','CDF Address']);

        foreach ($cdfs as $row) {
            fputcsv($fp, [$row->province_name, $row->district_name, $row->ds_division_name, $row->gn_division_name, $row->as_center, $row->cascade_name, $row->cdf_name, $row->cdf_address]);
        }

        // Close the file after writing all the data
        fclose($fp);

        // Define headers for the CSV download response
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'cdf_report.csv', $headers);
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
            $cdf = new CDF();
            $cdf->province_name = $row['Province'];
            $cdf->district_name = $row['District'];
            $cdf->ds_division_name = $row['DSD'];
            $cdf->gn_division_name = $row['GND'];
            $cdf->as_center = $row['ASC'];
            $cdf->cascade_name = $row['Cascade Name'];
            $cdf->cdf_name = $row['CDF Name'];
            $cdf->cdf_address = $row['CDF Address'];


            $cdf->save();
        }

        // Provide feedback to the user
        return redirect('/cdf')->with('success', 'CSV data imported successfully');



    }

    /**
     * Show members belonging to the same CDF.
     */
   /* public function showMembers(CDF $cdf)
    {
        $members = CDFMember::where('province_name', $cdf->province_name)
            ->where('district_name', $cdf->district_name)
            ->where('ds_division_name', $cdf->ds_division_name)
            ->where('gn_division_name', $cdf->gn_division_name)
            ->where('as_center', $cdf->as_center)
            ->get();

        return view('cdf.cdf_members', compact('cdfMembers', 'cdf'));
    }*/
    public function showMembers($cdf_name, $cdf_address)
    {
        $cdf = CDF::where('cdf_name', $cdf_name)
              ->where('cdf_address', $cdf_address)
              ->first();

    $membersInSameCDF = CDFMember::where('cdf_name', $cdf_name)
                                 ->where('cdf_address', $cdf_address)
                                 ->get();

    return view('cdf_member.cdf_member_show', compact('cdf', 'membersInSameCDF'));
    }


}
