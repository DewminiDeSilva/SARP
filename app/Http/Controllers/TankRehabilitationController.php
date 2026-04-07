<?php

namespace App\Http\Controllers;

use App\Models\TankRehabilitation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class TankRehabilitationController extends Controller
{
    /**
     * Search text across tank fields (AND-combined with table filters).
     */
    private function applyTankIndexSearch(Builder $query, string $search): void
    {
        $search = trim($search);
        if ($search === '') {
            return;
        }
        $like = '%' . $search . '%';
        $query->where(function (Builder $q) use ($like) {
            $q->where('tank_id', 'like', $like)
                ->orWhere('tank_name', 'like', $like)
                ->orWhere('river_basin', 'like', $like)
                ->orWhere('cascade_name', 'like', $like)
                ->orWhere('province_name', 'like', $like)
                ->orWhere('district', 'like', $like)
                ->orWhere('ds_division_name', 'like', $like)
                ->orWhere('gn_division_name', 'like', $like)
                ->orWhere('as_centre', 'like', $like)
                ->orWhere('agency', 'like', $like)
                ->orWhere('progress', 'like', $like)
                ->orWhere('contractor', 'like', $like)
                ->orWhere('status', 'like', $like)
                ->orWhere('open_ref_no', 'like', $like)
                ->orWhere('awarded_date', 'like', $like)
                ->orWhere('cumulative_amount', 'like', $like)
                ->orWhere('paid_advanced_amount', 'like', $like)
                ->orWhere('recommended_ipc_no', 'like', $like)
                ->orWhere('recommended_ipc_amount', 'like', $like)
                ->orWhere('longitude', 'like', $like)
                ->orWhere('latitude', 'like', $like)
                ->orWhere('remarks', 'like', $like);
        });
    }

    /**
     * Table filters: tank name, completion status, DS → ASC → GN (AND).
     */
    private function applyTankTableFilters(Builder $query, Request $request): void
    {
        if ($request->filled('filter_tank')) {
            $query->where('tank_name', $request->get('filter_tank'));
        }

        $completion = $request->get('filter_completion');
        if ($completion === 'completed') {
            $query->where('status', 'Completed');
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

    /**
     * Base query for list, summaries, and map (search + table filters).
     */
    private function buildTankIndexBaseQuery(Request $request): Builder
    {
        $query = TankRehabilitation::query();
        $this->applyTankIndexSearch($query, (string) $request->get('search', ''));
        $this->applyTankTableFilters($query, $request);

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

        $baseQuery = $this->buildTankIndexBaseQuery($request);
        $tankRehabilitations = $baseQuery->clone()->latest()->paginate($entries)->appends($request->query());

        $summaryBase = $this->buildTankIndexBaseQuery($request);
        $ongoingCount = $summaryBase->clone()->where('status', 'On Going')->count();
        $completedCount = $summaryBase->clone()->where('status', 'Completed')->count();
        $totalHouseholds = (int) $summaryBase->sum('no_of_family');

        $tankLocations = $summaryBase->clone()
            ->select('tank_id', 'tank_name', 'latitude', 'longitude', 'progress', 'status')
            ->get();

        $filterTankOptions = TankRehabilitation::query()
            ->whereNotNull('tank_name')
            ->where('tank_name', '!=', '')
            ->distinct()
            ->orderBy('tank_name')
            ->pluck('tank_name');

        $filterDsOptions = TankRehabilitation::query()
            ->whereNotNull('ds_division_name')
            ->where('ds_division_name', '!=', '')
            ->distinct()
            ->orderBy('ds_division_name')
            ->pluck('ds_division_name');

        $ascScope = TankRehabilitation::query();
        if ($request->filled('filter_ds')) {
            $ascScope->where('ds_division_name', $request->get('filter_ds'));
        }
        $filterAscOptions = $ascScope->clone()
            ->whereNotNull('as_centre')
            ->where('as_centre', '!=', '')
            ->distinct()
            ->orderBy('as_centre')
            ->pluck('as_centre');

        $gnScope = TankRehabilitation::query();
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
            $request->filled('filter_tank'),
            $request->filled('filter_completion'),
            $request->filled('filter_ds'),
            $request->filled('filter_asc'),
            $request->filled('filter_gn'),
        ])->filter()->count();

        return view('tank.tank_rehabilitation_index', compact(
            'tankRehabilitations',
            'ongoingCount',
            'completedCount',
            'totalHouseholds',
            'entries',
            'tankLocations',
            'filterTankOptions',
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
        return view('tank.tank_rehabilitation_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate new fields including image uploads
        $request->validate([
            'pre_construction_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'during_construction_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'post_construction_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Handle image uploads for three stages
        $preConstructionImagePath = $request->hasFile('pre_construction_image') ? $request->file('pre_construction_image')->store('images', 'public') : null;
        $duringConstructionImagePath = $request->hasFile('during_construction_image') ? $request->file('during_construction_image')->store('images', 'public') : null;
        $postConstructionImagePath = $request->hasFile('post_construction_image') ? $request->file('post_construction_image')->store('images', 'public') : null;

        // Create a new TankRehabilitation record
        TankRehabilitation::create([
            'tank_id' => $request->tank_id,
            'tank_name' => $request->tank_name,
            'river_basin' => $request->river_basin,
            'cascade_name' => $request->cascade_name,
            'province_name' => $request->province_name,
            'district' => $request->district,
            'ds_division_name' => $request->ds_division_name,
            'gn_division_name' => $request->gn_division_name,
            'as_centre' => $request->as_centre,
            'agency' => $request->agency,
            'no_of_family' => $request->no_of_family,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'progress' => $request->progress,
            'contractor' => $request->contractor,
            'payment' => $request->payment,
            'eot' => $request->eot,
            'contract_period' => $request->contract_period,
            'status' => $request->status,
            'remarks' => $request->remarks,

            // New fields
            'open_ref_no' => $request->open_ref_no,
            'awarded_date' => $request->awarded_date,
            'cumulative_amount' => $request->cumulative_amount,
            'paid_advanced_amount' => $request->paid_advanced_amount,
            'recommended_ipc_no' => $request->recommended_ipc_no,
            'recommended_ipc_amount' => $request->recommended_ipc_amount,

            // Image paths
            'pre_construction_image' => $preConstructionImagePath,
    'during_construction_image' => $duringConstructionImagePath,
    'post_construction_image' => $postConstructionImagePath,
        ]);

        return redirect('/tank_rehabilitation')->with('success', 'Tank rehabilitation record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TankRehabilitation $tankRehabilitation)
    {
        // Assuming a total amount to calculate percentage (replace with actual logic)
        $cumulative_amount = $tankRehabilitation->cumulative_amount;
        $payment = $tankRehabilitation->payment;
        $percentage = $this->calculatePercentage($payment, $cumulative_amount);

        return view('tank.tank_rehabilitation_show', compact('tankRehabilitation', 'percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TankRehabilitation $tankRehabilitation)
    {
        return view('tank.tank_rehabilitation_edit', compact('tankRehabilitation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TankRehabilitation $tankRehabilitation)
    {
        // Validate new fields including image uploads
        $request->validate([
            'image_pre_construction' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_during_construction' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_post_construction' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Handle image uploads
        if ($request->hasFile('image_pre_construction')) {
            if ($tankRehabilitation->pre_construction_image) {
                Storage::disk('public')->delete($tankRehabilitation->pre_construction_image);
            }
            $tankRehabilitation->pre_construction_image = $request->file('image_pre_construction')->store('images', 'public');
        }

        if ($request->hasFile('image_during_construction')) {
            if ($tankRehabilitation->during_construction_image) {
                Storage::disk('public')->delete($tankRehabilitation->during_construction_image);
            }
            $tankRehabilitation->during_construction_image = $request->file('image_during_construction')->store('images', 'public');
        }

        if ($request->hasFile('image_post_construction')) {
            if ($tankRehabilitation->post_construction_image) {
                Storage::disk('public')->delete($tankRehabilitation->post_construction_image);
            }
            $tankRehabilitation->post_construction_image = $request->file('image_post_construction')->store('images', 'public');
        }

        // Update tank rehabilitation record
        $tankRehabilitation->update($request->only([
            'tank_id',
            'tank_name',
            'river_basin',
            'cascade_name',
            'province_name',
            'district',
            'ds_division_name',
            'gn_division_name',
            'as_centre',
            'agency',
            'no_of_family',
            'longitude',
            'latitude',
            'progress',
            'contractor',
            'payment',
            'eot',
            'contract_period',
            'status',
            'remarks',

            // New fields
            'open_ref_no',
            'awarded_date',
            'cumulative_amount',
            'paid_advanced_amount',
            'recommended_ipc_no',
            'recommended_ipc_amount',
        ]));

        return redirect('/tank_rehabilitation')->with('success', 'Tank rehabilitation record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TankRehabilitation $tankRehabilitation)
    {
        // Remove images from storage if they exist
        if ($tankRehabilitation->pre_construction_image) {
            Storage::disk('public')->delete($tankRehabilitation->pre_construction_image);
        }
        if ($tankRehabilitation->during_construction_image) {
            Storage::disk('public')->delete($tankRehabilitation->during_construction_image);
        }
        if ($tankRehabilitation->post_construction_image) {
            Storage::disk('public')->delete($tankRehabilitation->post_construction_image);
        }

        $tankRehabilitation->delete();

        return redirect('/tank_rehabilitation')->with('success', 'Tank rehabilitation record deleted successfully.');
    }


    /**
 * Export data to CSV.
 */
public function reportCsv()
{
    $tankRehabilitations = TankRehabilitation::latest()->get();
    $filename = 'tank_rehabilitation_report.csv';
    $fp = fopen($filename, 'w+'); // Create or open file

    // Headers for the CSV file (excluding image fields)
    fputcsv($fp, [
        'Tank Id',
        'Tank Name',
        'River Basin',
        'Cascade Name',
        'Province',
        'District',
        'DS Division',
        'GN Division',
        'AS Centre',
        'Agency',
        'No. of Family',
        'Longitude',
        'Latitude',
        'Progress',
        'Contractor',
        'Payment',
        'EOT',
        'Contract Period',
        'Status',
        'Remarks',
        'Open Ref No',
        'Awarded Date',
        'Cumulative Amount',
        'Paid Advanced Amount',
        'Recommended IPC No',
        'Recommended IPC Amount'
    ]);

    // Loop through tank rehabilitations and export each record (excluding image fields)
    foreach ($tankRehabilitations as $row) {
        fputcsv($fp, [
            $row->tank_id,
            $row->tank_name,
            $row->river_basin,
            $row->cascade_name,
            $row->province_name,
            $row->district,
            $row->ds_division_name,
            $row->gn_division_name,
            $row->as_centre,
            $row->agency,
            $row->no_of_family,
            $row->longitude,
            $row->latitude,
            $row->progress,
            $row->contractor,
            $row->payment,
            $row->eot,
            $row->contract_period,
            $row->status,
            $row->remarks,
            $row->open_ref_no,
            $row->awarded_date,
            $row->cumulative_amount,
            $row->paid_advanced_amount,
            $row->recommended_ipc_no,
            $row->recommended_ipc_amount
        ]);
    }

    fclose($fp);

    // Set headers for CSV download
    $headers = [
        'Content-Type' => 'text/csv',
    ];

    return response()->download($filename, 'tank_rehabilitation_report.csv', $headers);
}


    /**
     * Legacy search URL: same filters and summaries as index.
     */
    public function search(Request $request)
    {
        return redirect()->route('tank_rehabilitation.index', $request->query());
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

        // Process each row and insert into the database
        foreach ($rows as $row) {

             if (empty(array_filter($row))) {
                continue;
            }
            if (count($row) === count($header)) {
                $tankData = array_combine($header, $row);
               if (empty(trim($tankData['Tank Name'] ?? ''))) {
                    return redirect()->back()->with('error', "Row $rowCount: 'Tank Name' is required.");
                }
                  // Convert date format for 'awarded_date'
                  $awardedDate = null;
                  if (isset($tankData['Awarded Date']) && !empty($tankData['Awarded Date'])) {
                      try {
                          $awardedDate = Carbon::createFromFormat('Y-m-d', trim($tankData['Awarded Date']))->format('Y-m-d');
                      } catch (\Exception $e) {
                          Log::info('Invalid Awarded Date Format: ', ['awarded_date' => $tankData['Awarded Date']]);
                      }
                  }
                  

                // Insert into TankRehabilitation model
                TankRehabilitation::create([
                    'tank_id' => $tankData['Tank Id'] ?? null,
                    'tank_name' => $tankData['Tank Name'] ?? null,
                    'river_basin' => $tankData['River Basin'] ?? null,
                    'cascade_name' => $tankData['Cascade Name'] ?? null,
                    'province_name' => $tankData['Province'] ?? null,
                    'district' => $tankData['District'] ?? null,
                    'ds_division_name' => $tankData['DS Division'] ?? null,
                    'gn_division_name' => $tankData['GN Division'] ?? null,
                    'as_centre' => $tankData['AS Centre'] ?? null,
                    'agency' => $tankData['Agency'] ?? null,
                    'no_of_family' => $tankData['No. of Family'] ?? null,
                    'longitude' => $tankData['Longitude'] ?? null,
                    'latitude' => $tankData['Latitude'] ?? null,
                    'progress' => $tankData['Progress'] ?? null,
                    'contractor' => $tankData['Contractor'] ?? null,
                    'payment' => $tankData['Payment'] ?? null,
                    'eot' => $tankData['EOT'] ?? null,
                    'contract_period' => $tankData['Contract Period'] ?? null,
                    'status' => $tankData['Status'] ?? null,
                    'remarks' => $tankData['Remarks'] ?? null,
                    'open_ref_no' => $tankData['Open Ref No'] ?? null,
                    'awarded_date' => $awardedDate['Awarded Date']?? null,
                    'cumulative_amount' => !empty($tankData['Cumulative Amount']) ? $tankData['Cumulative Amount'] : null,
                    'paid_advanced_amount' => !empty($tankData['Paid Advanced Amount']) ? $tankData['Paid Advanced Amount'] : null,
                    'recommended_ipc_no' => $tankData['Recommended IPC No'] ?? null,
                    'recommended_ipc_amount' => !empty($tankData['Recommended IPC Amount']) ? $tankData['Recommended IPC Amount'] : null,
                ]);

            }
        }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'CSV uploaded and records added successfully.');
    }

    





    /**
     * Calculate percentage function.
     */
    private function calculatePercentage($payment, $cumulative_amount)
    {
        $payment = (float) $payment;
        $cumulative_amount = (float) $cumulative_amount;

        if ($cumulative_amount > 0) {
            return round(($cumulative_amount / $payment) * 100, 0);
        }
        return 0;
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
    
        if (empty($ids)) {
            return response()->json(['error' => 'No records selected.'], 400);
        }
    
        // Delete selected records
        TankRehabilitation::whereIn('id', $ids)->delete();
    
        return response()->json(['success' => 'Selected records deleted successfully.']);
    }
    



}