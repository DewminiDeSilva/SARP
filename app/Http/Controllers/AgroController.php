<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agro;
use App\Models\AgroAsset;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

class AgroController extends Controller
{
    public function index()
    {
        $agros = Agro::with('assets')->paginate(10);
        return view('agro.agro_index', compact('agros'));
    }

    public function create()
    {
        return view('agro.agro_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'enterprise_name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'institute_of_registration' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'website_name' => 'nullable|string|max:255',
            'description_of_certificates' => 'nullable|string',
            'nature_of_business' => 'required|string|max:255',
            'products_available' => 'required|string',
            'yield_collection_details' => 'required|string',
            'marketing_information' => 'required|string',
            'list_of_distributors' => 'required|string',
            'business_plan' => 'nullable|file|mimes:pdf|max:2048',
            'asset_name.*' => 'required|string|max:255',
            'asset_value.*' => 'required|numeric|min:0',
        ]);

        $data = $request->except(['asset_name', 'asset_value']);
        if ($request->hasFile('business_plan')) {
            $data['business_plan'] = $request->file('business_plan')->store('business_plans');
        }

        $agro = Agro::create($data);

        foreach ($request->asset_name as $index => $assetName) {
            AgroAsset::create([
                'agro_id' => $agro->id,
                'asset_name' => $assetName,
                'asset_value' => $request->asset_value[$index],
            ]);
        }

        return redirect()->route('agro.index')->with('success', 'Agro enterprise created successfully.');
    }

    public function show($id)
    {
        $agro = Agro::with('assets')->findOrFail($id);
        return view('agro.agro_show', compact('agro'));
    }

    public function edit($id)
    {
        $agro = Agro::with('assets')->findOrFail($id);
        return view('agro.agro_edit', compact('agro'));
    }

    public function update(Request $request, $id)
    {
    $agro = Agro::findOrFail($id);

    $request->validate([
        'enterprise_name' => 'required|string|max:255',
        'registration_number' => 'required|string|max:255',
        'institute_of_registration' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:15',
        'website_name' => 'nullable|string|max:255',
        'description_of_certificates' => 'nullable|string',
        'nature_of_business' => 'required|string|max:255',
        'products_available' => 'required|string',
        'yield_collection_details' => 'required|string',
        'marketing_information' => 'required|string',
        'list_of_distributors' => 'required|string',
        'business_plan' => 'nullable|file|mimes:pdf|max:2048',
        'asset_name.*' => 'required|string|max:255',
        'asset_value.*' => 'required|numeric|min:0',
    ]);

    $data = $request->except(['asset_name', 'asset_value']);

    // Handle file upload for business plan
    if ($request->hasFile('business_plan')) {
        // Delete old business plan if exists
        if ($agro->business_plan) {
            Storage::delete($agro->business_plan);
        }

        // Store the new business plan
        $data['business_plan'] = $request->file('business_plan')->store('business_plans');
    }

    $agro->update($data);

    // Update assets
    AgroAsset::where('agro_id', $id)->delete(); // Delete all existing assets
    foreach ($request->asset_name as $index => $assetName) {
        AgroAsset::create([
            'agro_id' => $agro->id,
            'asset_name' => $assetName,
            'asset_value' => $request->asset_value[$index],
        ]);
    }

    return redirect()->route('agro.index')->with('success', 'Agro enterprise updated successfully.');
    }


    public function destroy($id)
    {
        $agro = Agro::findOrFail($id);

        if ($agro->business_plan) {
            Storage::delete($agro->business_plan);
        }

        $agro->delete();

        return redirect()->route('agro.index')->with('success', 'Agro enterprise deleted successfully.');
    }

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

        // Normalize headers: make lowercase and replace spaces with underscores
        $header = array_map(function($value) {
            return strtolower(str_replace(' ', '_', trim($value)));
        }, $header);

        // Log the headers to debug
        logger('CSV Headers: ', $header);

        // Process each row and insert into the database
        foreach ($rows as $row) {
            // Check if row has the correct number of columns
            if (count($row) === count($header)) {
                // Combine header and row to form an associative array
                $agroData = array_combine($header, $row);

                // Log each row to ensure data is being parsed correctly
                logger('CSV Row Data: ', $agroData);

                // Check if 'enterprise_name' exists and is not null
                if (isset($agroData['enterprise_name']) && !empty($agroData['enterprise_name'])) {
                    // Insert into Agro model
                    $agro = Agro::create([
                        'enterprise_name' => $agroData['enterprise_name'] ?? null,
                        'registration_number' => $agroData['registration_number'] ?? null,
                        'institute_of_registration' => $agroData['institute_of_registration'] ?? null,
                        'address' => $agroData['address'] ?? null,
                        'email' => $agroData['email'] ?? null,
                        'phone_number' => $agroData['phone_number'] ?? null,
                        'website_name' => $agroData['website_name'] ?? null,
                        'description_of_certificates' => $agroData['description_of_certificates'] ?? null,
                        'nature_of_business' => $agroData['nature_of_business'] ?? null,
                        'products_available' => $agroData['products_available'] ?? null,
                        'yield_collection_details' => $agroData['yield_collection_details'] ?? null,
                        'marketing_information' => $agroData['marketing_information'] ?? null,
                        'list_of_distributors' => $agroData['list_of_distributors'] ?? null,
                    ]);

                    // Insert related AgroAssets
                    AgroAsset::create([
                        'agro_id' => $agro->id,
                        'asset_name' => $agroData['asset_name'] ?? null,
                        'asset_value' => $agroData['asset_value'] ?? 0,
                    ]);
                } else {
                    // Log an error if 'enterprise_name' is missing
                    logger('Missing enterprise_name for row: ', $agroData);
                }
            }
        }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'CSV uploaded and agro records added successfully.');
}





public function generateCsv()
{
    $agros = Agro::with('assets')->get();

    $csvData = [];
    $csvData[] = [
        'Enterprise Name', 'Registration Number', 'Institute of Registration',
        'Address', 'Email', 'Phone Number', 'Website Name',
        'Description of Certificates', 'Nature of Business', 'Products Available',
        'Yield Collection Details', 'Marketing Information', 'List of Distributors',
        'Asset Name', 'Asset Value'
    ];

    foreach ($agros as $agro) {
        foreach ($agro->assets as $asset) {
            $csvData[] = [
                $agro->enterprise_name, $agro->registration_number, $agro->institute_of_registration,
                $agro->address, $agro->email, $agro->phone_number, $agro->website_name,
                $agro->description_of_certificates, $agro->nature_of_business, $agro->products_available,
                $agro->yield_collection_details, $agro->marketing_information, $agro->list_of_distributors,
                $asset->asset_name, $asset->asset_value
            ];
        }
    }

    $fileName = 'agros_' . date('Ymd_His') . '.csv';
    $filePath = storage_path('app/public/' . $fileName);
    $file = fopen($filePath, 'w');

    foreach ($csvData as $line) {
        fputcsv($file, $line);
    }

    fclose($file);

    return response()->download($filePath)->deleteFileAfterSend(true);
}
public function uploadPdf(Request $request, $id)
{
    // Validate the PDF file input
    $request->validate([
        'business_plan' => 'required|file|mimes:pdf|max:2048',
    ]);

    // Find the Agro entity by ID
    $agro = Agro::findOrFail($id);

    // Check if a file was uploaded
    if ($request->hasFile('business_plan')) {
        // If the Agro already has a business plan, delete the old file
        if ($agro->business_plan) {
            Storage::delete($agro->business_plan);
        }

        // Store the new business plan PDF
        $agro->business_plan = $request->file('business_plan')->store('business_plans');
        $agro->save();
    }

    // Redirect back to the Agro index page with a success message
    return redirect()->route('agro.index')->with('success', 'Business plan PDF uploaded successfully.');
}
public function viewPdf($id)
{
    // Find the Agro entity by ID
    $agro = Agro::findOrFail($id);

    // Check if the Agro has an associated business plan PDF
    if (!$agro->business_plan) {
        return redirect()->route('agro.index')->with('error', 'No business plan found.');
    }

    // Get the full path of the PDF file
    $filePath = storage_path('app/' . $agro->business_plan);

    // Return the PDF as a response for viewing
    return response()->file($filePath, [
        'Cache-Control' => 'no-store, no-cache',
        'Pragma' => 'no-cache',
    ]);
}



/**
 * Search functionality for Agro enterprises.
 */
public function search(Request $request)
{
    $search = $request->get('search');

    // Search across Agro and related AgroAsset fields
    $agros = Agro::with('assets')
        ->where('enterprise_name', 'like', '%' . $search . '%')
        ->orWhere('registration_number', 'like', '%' . $search . '%')
        ->orWhere('institute_of_registration', 'like', '%' . $search . '%')
        ->orWhere('address', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->orWhere('phone_number', 'like', '%' . $search . '%')
        ->orWhere('website_name', 'like', '%' . $search . '%')
        ->orWhere('description_of_certificates', 'like', '%' . $search . '%')
        ->orWhere('nature_of_business', 'like', '%' . $search . '%')
        ->orWhere('products_available', 'like', '%' . $search . '%')
        ->orWhere('yield_collection_details', 'like', '%' . $search . '%')
        ->orWhere('marketing_information', 'like', '%' . $search . '%')
        ->orWhere('list_of_distributors', 'like', '%' . $search . '%')
        ->orWhereHas('assets', function ($query) use ($search) {
            $query->where('asset_name', 'like', '%' . $search . '%')
                ->orWhere('asset_value', 'like', '%' . $search . '%');
        })
        ->paginate(10);

    return view('agro.agro_index', compact('agros', 'search'));
}


}
