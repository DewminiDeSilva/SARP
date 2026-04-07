<?php

namespace App\Http\Controllers;

use App\Models\Infrastructure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use League\Csv\Reader;

class InfrastructureController extends Controller
{
    private function applyInfrastructureIndexSearch(Builder $query, string $search): void
    {
        $search = trim($search);
        if ($search === '') {
            return;
        }
        $like = '%' . $search . '%';
        $query->where(function (Builder $q) use ($like) {
            $q->where('type_of_infrastructure', 'like', $like)
                ->orWhere('infrastructure_progress', 'like', $like)
                ->orWhere('infrastructure_description', 'like', $like)
                ->orWhere('river_basin', 'like', $like)
                ->orWhere('cascade_name', 'like', $like)
                ->orWhere('province_name', 'like', $like)
                ->orWhere('district', 'like', $like)
                ->orWhere('ds_division_name', 'like', $like)
                ->orWhere('gn_division_name', 'like', $like)
                ->orWhere('as_centre', 'like', $like)
                ->orWhere('agency', 'like', $like)
                ->orWhere('contractor', 'like', $like)
                ->orWhere('payment', 'like', $like)
                ->orWhere('eot', 'like', $like)
                ->orWhere('contract_period', 'like', $like)
                ->orWhere('status', 'like', $like)
                ->orWhere('remarks', 'like', $like)
                ->orWhere('longitude', 'like', $like)
                ->orWhere('latitude', 'like', $like);
        });
    }

    private function applyInfrastructureTableFilters(Builder $query, Request $request): void
    {
        if ($request->filled('filter_type')) {
            $query->where('type_of_infrastructure', $request->get('filter_type'));
        }

        $completion = $request->get('filter_completion');
        if ($completion === 'completed') {
            $query->where('status', 'Finished');
        } elseif ($completion === 'ongoing') {
            $query->where('status', 'On Going');
        }

        if ($request->filled('filter_ds')) {
            $query->where('ds_division_name', $request->get('filter_ds'));
        }
        if ($request->filled('filter_asc')) {
            $query->where('as_centre', $request->get('filter_asc'));
        }
        if ($request->filled('filter_gn')) {
            $query->where('gn_division_name', $request->get('filter_gn'));
        }
    }

    private function buildInfrastructureIndexBaseQuery(Request $request): Builder
    {
        $query = Infrastructure::query();
        $this->applyInfrastructureIndexSearch($query, (string) $request->get('search', ''));
        $this->applyInfrastructureTableFilters($query, $request);

        return $query;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $entries = (int) $request->get('entries', 10);
        if (! in_array($entries, [10, 25, 50, 100], true)) {
            $entries = 10;
        }

        $baseQuery = $this->buildInfrastructureIndexBaseQuery($request);
        $infrastructures = $baseQuery->clone()->latest()->paginate($entries)->appends($request->query());

        $summaryBase = $this->buildInfrastructureIndexBaseQuery($request);
        $totalInfrastructures = $summaryBase->count();
        $ongoingCount = $summaryBase->clone()->where('status', 'On Going')->count();
        $completedCount = $summaryBase->clone()->where('status', 'Finished')->count();

        $filterTypeOptions = Infrastructure::query()
            ->whereNotNull('type_of_infrastructure')
            ->where('type_of_infrastructure', '!=', '')
            ->distinct()
            ->orderBy('type_of_infrastructure')
            ->pluck('type_of_infrastructure');

        $filterDsOptions = Infrastructure::query()
            ->whereNotNull('ds_division_name')
            ->where('ds_division_name', '!=', '')
            ->distinct()
            ->orderBy('ds_division_name')
            ->pluck('ds_division_name');

        $ascScope = Infrastructure::query();
        if ($request->filled('filter_ds')) {
            $ascScope->where('ds_division_name', $request->get('filter_ds'));
        }
        $filterAscOptions = $ascScope->clone()
            ->whereNotNull('as_centre')
            ->where('as_centre', '!=', '')
            ->distinct()
            ->orderBy('as_centre')
            ->pluck('as_centre');

        $gnScope = Infrastructure::query();
        if ($request->filled('filter_ds')) {
            $gnScope->where('ds_division_name', $request->get('filter_ds'));
        }
        if ($request->filled('filter_asc')) {
            $gnScope->where('as_centre', $request->get('filter_asc'));
        }
        $filterGnOptions = $gnScope->clone()
            ->whereNotNull('gn_division_name')
            ->where('gn_division_name', '!=', '')
            ->distinct()
            ->orderBy('gn_division_name')
            ->pluck('gn_division_name');

        $activeFilterCount = collect([
            $request->filled('filter_type'),
            $request->filled('filter_completion'),
            $request->filled('filter_ds'),
            $request->filled('filter_asc'),
            $request->filled('filter_gn'),
        ])->filter()->count();

        return view('infrastructure.infrastructure_index', compact(
            'infrastructures',
            'totalInfrastructures',
            'ongoingCount',
            'completedCount',
            'entries',
            'filterTypeOptions',
            'filterDsOptions',
            'filterAscOptions',
            'filterGnOptions',
            'activeFilterCount'
        ));
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
            'pre_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'during_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image uploads
        $prePath = $request->hasFile('pre_image') ? $request->file('pre_image')->store('images', 'public') : null;
        $duringPath = $request->hasFile('during_image') ? $request->file('during_image')->store('images', 'public') : null;
        $postPath = $request->hasFile('post_image') ? $request->file('post_image')->store('images', 'public') : null;

        $infrastructure = new Infrastructure;
        $infrastructure->type_of_infrastructure = request('type_of_infrastructure');
        $infrastructure->infrastructure_progress = request('infrastructure_progress');
        $infrastructure->infrastructure_description = request('infrastructure_description');
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
        $infrastructure->pre_image_path = $prePath;
        $infrastructure->during_image_path = $duringPath;
        $infrastructure->post_image_path = $postPath;
        $infrastructure->save();

        if ($infrastructure->wasRecentlyCreated) {
            return redirect('/infrastructure')->with('create_success', 'Record saved successfully.');
        } else {
            return redirect('/infrastructure')->with('create_fail', 'Record save failed.');
        }

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
    public function update(Request $request, $id)
    {
        try {
        $request->validate([
            'pre_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'during_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $infrastructure = Infrastructure::findOrFail($id);

        // Upload logic
        if ($request->hasFile('pre_image')) {
            $infrastructure->pre_image_path = $request->file('pre_image')->store('images', 'public');
        }
        if ($request->hasFile('during_image')) {
            $infrastructure->during_image_path = $request->file('during_image')->store('images', 'public');
        }
        if ($request->hasFile('post_image')) {
            $infrastructure->post_image_path = $request->file('post_image')->store('images', 'public');
        }

        // Update all other fields
        $infrastructure->type_of_infrastructure = $request->type_of_infrastructure;
        $infrastructure->infrastructure_progress = $request->infrastructure_progress;
        $infrastructure->infrastructure_description = $request->infrastructure_description;
        $infrastructure->river_basin = $request->river_basin;
        $infrastructure->cascade_name = $request->cascade_name;
        $infrastructure->province_name = $request->province_name;
        $infrastructure->district = $request->district;
        $infrastructure->ds_division_name = $request->ds_division_name;
        $infrastructure->gn_division_name = $request->gn_division_name;
        $infrastructure->as_centre = $request->as_centre;
        $infrastructure->agency = $request->agency;
        $infrastructure->no_of_family = $request->no_of_family;
        $infrastructure->longitude = $request->longitude;
        $infrastructure->latitude = $request->latitude;
        $infrastructure->contractor = $request->contractor;
        $infrastructure->payment = $request->payment;
        $infrastructure->eot = $request->eot;
        $infrastructure->contract_period = $request->contract_period;
        $infrastructure->status = $request->status;
        $infrastructure->remarks = $request->remarks;

        $infrastructure->save();

        return redirect('/infrastructure')->with('update_success', 'Record updated successfully.');
        } catch (\Exception $e) {
        return redirect('/infrastructure')->with('update_fail', 'Record update failed.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infrastructure $infrastructure)
    {
        try {
        $infrastructure->delete();
        return redirect('/infrastructure')->with('delete_success', 'Record deleted successfully.');
        } catch (\Exception $e) {
    return redirect('/infrastructure')->with('delete_fail', 'Record delete failed.');
}
    }

    /**
     * Legacy search URL: same filters and summaries as index.
     */
    public function search(Request $request)
    {
        return redirect()->route('infrastructure.index', $request->query());
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
