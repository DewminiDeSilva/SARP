<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agro;
use App\Models\AgroAsset;
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

    public function uploadPdf(Request $request, $id)
    {
        $request->validate([
            'business_plan' => 'required|file|mimes:pdf|max:2048',
        ]);

        $agro = Agro::findOrFail($id);

        if ($request->hasFile('business_plan')) {
            // Delete old business plan if exists
            if ($agro->business_plan) {
                Storage::delete($agro->business_plan);
            }

            // Store the new business plan
            $agro->business_plan = $request->file('business_plan')->store('business_plans');
            $agro->save();
        }

        return redirect()->route('agro.show', $agro->id)->with('success', 'Business plan PDF uploaded successfully.');
    }

    public function viewPdf($id)
    {
        $agro = Agro::findOrFail($id);

        if (!$agro->business_plan) {
            return redirect()->route('agro.show', $agro->id)->with('error', 'No business plan found.');
        }

        // Add a query parameter to force the browser to reload the PDF
        $filePath = storage_path('app/' . $agro->business_plan);
        return response()->file($filePath, [
            'Cache-Control' => 'no-store, no-cache',
            'Pragma' => 'no-cache'
        ]);
    }

    public function uploadCsv(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt|max:2048',
    ]);

    $path = $request->file('csv_file')->getRealPath();
    $csvData = array_map('str_getcsv', file($path));
    $header = array_shift($csvData); // Remove the header

    foreach ($csvData as $row) {
        $row = array_combine($header, $row);

        // Validate data for each row
        $validatedData = Validator::make($row, [
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
            'asset_name' => 'required|string|max:255',
            'asset_value' => 'required|numeric|min:0',
        ])->validate();

        // Create the Agro enterprise
        $agro = Agro::create($validatedData);

        // Create AgroAsset for the enterprise
        AgroAsset::create([
            'agro_id' => $agro->id,
            'asset_name' => $row['asset_name'],
            'asset_value' => $row['asset_value'],
        ]);
    }

    return redirect()->route('agro.index')->with('success', 'CSV file uploaded successfully.');
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


}
