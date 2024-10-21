<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AscRegistration;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AscRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ascRegistrations = AscRegistration::paginate(10);
            return view('asc.asc_index', compact('ascRegistrations'));
        } catch (\Exception $e) {
            \Log::error($e);
            abort(500, 'Something went wrong.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asc.asc_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ds_division_name' => 'required|string|max:255',
            'gn_division_name' => 'required|string|max:255',
            'as_center' => 'required|string|max:255',
            'asc_name' => 'required|string|max:255',
            'officer_incharge' => 'required|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'contact_number' => 'required|string|max:255',
            'services_available' => 'required|string|max:255',
        ]);

        $ascRegistration = new AscRegistration;

        $ascRegistration->province_name = $request->input('province_name');
        $ascRegistration->district_name = $request->input('district_name');
        $ascRegistration->ds_division_name = $request->input('ds_division_name');
        $ascRegistration->gn_division_name = $request->input('gn_division_name');
        $ascRegistration->as_center = $request->input('as_center');
        $ascRegistration->asc_name = $request->input('asc_name');
        $ascRegistration->officer_incharge = $request->input('officer_incharge');
        $ascRegistration->contact_email = $request->input('contact_email');
        $ascRegistration->contact_number = $request->input('contact_number');
        $ascRegistration->services_available = $request->input('services_available');

        $ascRegistration->save();

        return redirect('/asc_registration')->with('success', 'ASC Registration created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AscRegistration $ascRegistration)
    {
        return view('asc.asc_show', compact('ascRegistration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AscRegistration $ascRegistration)
    {
        return view('asc.asc_edit', compact('ascRegistration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AscRegistration $ascRegistration)
    {
        $validated = $request->validate([
            'province_name' => 'required|string',
            'district_name' => 'required|string',
            'ds_division_name' => 'required|string',
            'gn_division_name' => 'required|string',
            'as_center' => 'required|string',
            'asc_name' => 'required|string',
            'officer_incharge' => 'required|string',
            'contact_email' => 'required|email',
            'contact_number' => 'required|string',
            'services_available' => 'required|string',
        ]);

        $ascRegistration->update($validated);

        return redirect('/asc_registration')->with('success', 'ASC Registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AscRegistration $ascRegistration)
    {
        $ascRegistration->delete();

        return redirect('/asc_registration')->with('success', 'ASC Registration deleted successfully.');
    }

    /**
     * Search for the specified resource.
     */
    public function search(Request $request)
{
    $search = $request->get('search');
    $ascRegistrations = AscRegistration::where('province_name', 'like', '%' . $search . '%')
        ->orWhere('district_name', 'like', '%' . $search . '%')
        ->orWhere('ds_division_name', 'like', '%' . $search . '%')
        ->orWhere('gn_division_name', 'like', '%' . $search . '%')
        ->orWhere('as_center', 'like', '%' . $search . '%')
        ->orWhere('asc_name', 'like', '%' . $search . '%')
        // ->orWhere('asc_id', 'like', '%' . $search . '%')
        ->orWhere('officer_incharge', 'like', '%' . $search . '%')
        ->orWhere('contact_email', 'like', '%' . $search . '%')
        ->orWhere('contact_number', 'like', '%' . $search . '%')
        ->orWhere('services_available', 'like', '%' . $search . '%')
        ->paginate(10);

    return view('asc.asc_index', compact('ascRegistrations', 'search'));
}

  /**
 * Export data to CSV.
 */
public function reportCsv()
{
    $ascRegistrations = AscRegistration::latest()->get();
    $filename = 'asc_registration_report.csv';
    $fp = fopen($filename, 'w+'); // Corrected file path
    fputcsv($fp, ['Province Name','District Name','DS Division Name','GN Division Name','AS Center', 'ASC Name', 'Officer Incharge', 'Contact Email', 'Contact Number', 'Services Available']);

    foreach ($ascRegistrations as $row) {
        fputcsv($fp, [
             $row->province_name,
            $row->district_name,
            $row->ds_division_name,
            $row->gn_division_name,
            $row->as_center,
            $row->asc_name,
             //$row->asc_id,
            $row->officer_incharge,
            $row->contact_email,
            $row->contact_number,
            $row->services_available
        ]);
    }
    fclose($fp);
    $headers = [
        'Content-Type' => 'text/csv',
    ];

    return response()->download($filename, 'asc_registration_report.csv', $headers);
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

    // Increase memory and timeout limits (optional, based on server config)
    ini_set('memory_limit', '512M'); // Adjust based on your server configuration
    set_time_limit(300); // 300 seconds timeout limit, adjust as needed

    // Read the CSV file
    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    // Parse the CSV file
    $csv = Reader::createFromPath($path, 'r');
    $csv->setHeaderOffset(0);

    // Variable to track row number
    $rowNumber = 0;

    // Iterate through each row in the CSV
    foreach ($csv as $row) {
        $rowNumber++;

        try {
            // Log the current row being processed
            \Log::info('Processing row: ' . $rowNumber);

            // Create a new AscRegistration instance
            $ascRegistration = new AscRegistration();
            $ascRegistration->province_name = $row['Province Name'] ?? null;
            $ascRegistration->district_name = $row['District Name'] ?? null;
            $ascRegistration->ds_division_name = $row['DS Division Name'] ?? null;
            $ascRegistration->gn_division_name = $row['GN Division Name'] ?? null;
            $ascRegistration->as_center = $row['AS Center'] ?? null;
            $ascRegistration->asc_name = $row['ASC Name'] ?? null;
            $ascRegistration->officer_incharge = $row['Officer Incharge'] ?? null;
            $ascRegistration->contact_email = $row['Contact Email'] ?? null;
            $ascRegistration->contact_number = $row['Contact Number'] ?? null;
            $ascRegistration->services_available = $row['Services Available'] ?? null;

            // Log data before saving
            \Log::info('Row data: ', $row);

            // Save the data
            $ascRegistration->save();

            // Log successful save
            \Log::info('Row ' . $rowNumber . ' saved successfully.');

        } catch (\Exception $e) {
            // Log the error for this specific row
            \Log::error('Error on row ' . $rowNumber . ': ' . $e->getMessage());
            \Log::error('Row data: ', $row);
        }

        // Optionally, log memory usage
        \Log::info('Memory usage after row ' . $rowNumber . ': ' . memory_get_usage());
    }

    // Provide feedback to the user
    return redirect('/asc_registration')->with('success', 'CSV data import process completed.');
}





}
