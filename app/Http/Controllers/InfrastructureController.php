<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Http\Request;
use League\Csv\Reader;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $entries = request()->get('entries', 10);
    $infrastructures = Infrastructure::latest()->paginate($entries)->appends(['entries' => $entries]);

    // Get counts for ongoing and completed infrastructure records
    $totalInfrastructures = Infrastructure::count();
    $ongoingCount = Infrastructure::where('status', 'On Going')->count();
    $completedCount = Infrastructure::where('status', 'Finished')->count();

    // Pass these counts to the view
    return view('infrastructure.infrastructure_index', compact('infrastructures', 'totalInfrastructures', 'ongoingCount', 'completedCount', 'entries'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infrastructure.infrastructure_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        $infrastructure = new Infrastructure;
        $infrastructure->type_of_infrastructure = request('type_of_infrastructure');
        $infrastructure->infrastructure_progress = request('infrastructure_progress');
        $infrastructure->infrastructure_description = request('infrastructure_description'); // New field
        $infrastructure->river_basin = request('river_basin');
        $infrastructure->cascade_name = request('cascade_name');
        $infrastructure->province_name = request('province_name');
        $infrastructure->district = request('district');
        $infrastructure->ds_division_name = request('ds_division_name');
        $infrastructure->gn_division_name = request('gn_division_name');
        $infrastructure->as_centre = request('as_centre');
        $infrastructure->agency = request('agency');
        $infrastructure->no_of_family = request('no_of_family');
        $infrastructure->longitude = request('longitude');
        $infrastructure->latitude = request('latitude');
        $infrastructure->contractor = request('contractor');
        $infrastructure->payment = request('payment');
        $infrastructure->eot = request('eot');
        $infrastructure->contract_period = request('contract_period');
        $infrastructure->status = request('status');
        $infrastructure->remarks = request('remarks');
        $infrastructure->image_path = $imagePath ?? null;
        $infrastructure->save();

        return redirect('/infrastructure')->with('success', 'Infrastructure record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Infrastructure $infrastructure)
    {
        $totalAmount = 1000; // Replace with the actual total amount
        $payment = $infrastructure->payment;

        $percentage = $this->calculatePercentage($payment, $totalAmount);

        return view('infrastructure.infrastructure_show', compact('infrastructure', 'percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infrastructure $infrastructure)
    {
        return view('infrastructure.infrastructure_edit', compact('infrastructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        $infrastructure->type_of_infrastructure = request('type_of_infrastructure');
        $infrastructure->infrastructure_progress = request('infrastructure_progress');
        $infrastructure->infrastructure_description = request('infrastructure_description'); // New field
        $infrastructure->river_basin = request('river_basin');
        $infrastructure->cascade_name = request('cascade_name');
        $infrastructure->province_name = request('province_name');
        $infrastructure->district = request('district');
        $infrastructure->ds_division_name = request('ds_division_name');
        $infrastructure->gn_division_name = request('gn_division_name');
        $infrastructure->as_centre = request('as_centre');
        $infrastructure->agency = request('agency');
        $infrastructure->no_of_family = request('no_of_family');
        $infrastructure->longitude = request('longitude');
        $infrastructure->latitude = request('latitude');
        $infrastructure->contractor = request('contractor');
        $infrastructure->payment = request('payment');
        $infrastructure->eot = request('eot');
        $infrastructure->contract_period = request('contract_period');
        $infrastructure->status = request('status');
        $infrastructure->remarks = request('remarks');
        $infrastructure->save();

        return redirect('/infrastructure')->with('success', 'Infrastructure record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infrastructure $infrastructure)
    {
        $infrastructure->delete();
        return redirect('/infrastructure')->with('success', 'Infrastructure record deleted successfully.');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $infrastructures = Infrastructure::where('type_of_infrastructure', 'like', '%'.$search.'%')
            ->orWhere('infrastructure_progress', 'like', '%'.$search.'%')
            ->orWhere('infrastructure_description', 'like', '%'.$search.'%')
            ->orWhere('river_basin', 'like', '%'.$search.'%')
            ->orWhere('cascade_name', 'like', '%'.$search.'%')
            ->orWhere('province_name', 'like', '%'.$search.'%')
            ->orWhere('district', 'like', '%'.$search.'%')
            ->orWhere('ds_division_name', 'like', '%'.$search.'%')
            ->orWhere('gn_division_name', 'like', '%'.$search.'%')
            ->orWhere('as_centre', 'like', '%'.$search.'%')
            ->orWhere('agency', 'like', '%'.$search.'%')
            ->orWhere('payment', 'like', '%'.$search.'%')
            ->orWhere('status', 'like', '%'.$search.'%')
            ->paginate(10);

        return view('infrastructure.infrastructure_index', compact('infrastructures', 'search'));
    }

    /**
     * Export data to CSV.
     */
    public function reportCsv()
    {
        $infrastructures = Infrastructure::latest()->get();
        $filename = 'infrastructure_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Type of Infrastructure', 'Infrastructure Progress', 'Infrastructure Description', 'River Basin', 'Cascade Name', 'Province', 'District', 'DS Division', 'GN Division', 'AS Centre', 'Agency', 'No of Family', 'Longitude', 'Latitude', 'Contractor', 'Payment', 'EOT', 'Contract Period', 'Status', 'Remarks']);

        foreach ($infrastructures as $row) {
            fputcsv($fp, [$row->type_of_infrastructure, $row->infrastructure_progress, $row->infrastructure_description, $row->river_basin, $row->cascade_name, $row->province_name, $row->district, $row->ds_division_name, $row->gn_division_name, $row->as_centre, $row->agency, $row->no_of_family, $row->longitude, $row->latitude, $row->contractor, $row->payment, $row->eot, $row->contract_period, $row->status, $row->remarks]);
        }
        fclose($fp);
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'infrastructure_report.csv', $headers);
    }

    /**
     * Upload CSV and import data.
     */
    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            $infrastructure = new Infrastructure();
            $infrastructure->type_of_infrastructure = $row['Type of Infrastructure'];
            $infrastructure->infrastructure_progress = $row['Infrastructure Progress'];
            $infrastructure->infrastructure_description = $row['Infrastructure Description']; // New field
            $infrastructure->river_basin = $row['River Basin'];
            $infrastructure->cascade_name = $row['Cascade Name'];
            $infrastructure->province_name = $row['Province'];
            $infrastructure->district = $row['District'];
            $infrastructure->ds_division_name = $row['DS Division'];
            $infrastructure->gn_division_name = $row['GN Division'];
            $infrastructure->as_centre = $row['AS Centre'];
            $infrastructure->agency = $row['Agency'];
            $infrastructure->no_of_family = $row['No of Family'];
            $infrastructure->longitude = $row['Longitude'];
            $infrastructure->latitude = $row['Latitude'];
            $infrastructure->contractor = $row['Contractor'];
            $infrastructure->payment = $row['Payment'];
            $infrastructure->eot = $row['EOT'];
            $infrastructure->contract_period = $row['Contract Period'];
            $infrastructure->status = $row['Status'];
            $infrastructure->remarks = $row['Remarks'];

            $infrastructure->save();
        }

        return redirect('/infrastructure')->with('success', 'CSV data imported successfully');
    }

    /**
     * Calculate the percentage of payment with respect to total amount.
     */
    private function calculatePercentage($payment, $totalAmount)
    {
        $payment = (float) $payment;
        $totalAmount = (float) $totalAmount;

        if ($totalAmount > 0) {
            return ($payment / $totalAmount) * 100;
        }
        return 0;
    }
}
