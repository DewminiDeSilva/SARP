<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Livestock;
use App\Models\YouthProposal;
use App\Models\EOI;
use League\Csv\Reader;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use App\Support\NicYouth;

class BeneficiaryController extends Controller
{
    /** Index/show/create/edit back links: Blade partial `partials.sarp_history_back`. */

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        // search function crop names/production focus/youth proposal names 
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

    $maleBeneficiaryCount = Beneficiary::whereRaw("LOWER(TRIM(COALESCE(gender, ''))) = ?", ['male'])->count();
    $femaleBeneficiaryCount = Beneficiary::whereRaw("LOWER(TRIM(COALESCE(gender, ''))) = ?", ['female'])->count();
    $youthBeneficiaryCount = Beneficiary::query()
        ->pluck('nic')
        ->filter(fn ($nic) => NicYouth::isYouthByNic($nic))
        ->count();
    $notYouthBeneficiaryCount = Beneficiary::query()
        ->pluck('nic')
        ->filter(fn ($nic) => NicYouth::isNotYouthByNic($nic))
        ->count();
    $tankNameSummary = Beneficiary::select('tank_name', DB::raw('COUNT(*) as count'))
        ->groupBy('tank_name')
        ->get();

    $tankBeneficiaryCount = Beneficiary::where('project_type', 'Tank Beneficiary')->count();
    $youthProgrammeBeneficiaryCount = Beneficiary::whereIn('project_type', ['Youth Enterprise', 'youth'])->count();
    $fourpBeneficiaryCount = Beneficiary::whereIn('project_type', ['4P Projects', '4p'])->count();
    $resilienceAgricultureCount = Beneficiary::where('project_type', 'Resilience Project')
        ->where('input1', 'agriculture')
        ->count();
    $resilienceLivestockCount = Beneficiary::where('project_type', 'Resilience Project')
        ->where('input1', 'livestock')
        ->count();

    return view('beneficiary.beneficiary_index', compact(
        'beneficiaries',
        'search',
        'input3Summary',
        'maleBeneficiaryCount',
        'femaleBeneficiaryCount',
        'youthBeneficiaryCount',
        'notYouthBeneficiaryCount',
        'tankNameSummary',
        'tankBeneficiaryCount',
        'youthProgrammeBeneficiaryCount',
        'fourpBeneficiaryCount',
        'resilienceAgricultureCount',
        'resilienceLivestockCount',
        'allBeneficiaries',
        'convertedMap'
    ) + [
        'filterTankOptions' => collect(),
        'filterDsOptions' => collect(),
        'filterAscOptions' => collect(),
        'filterGnOptions' => collect(),
        'activeFilterCount' => 0,
    ]);
}
        
    
        // Check if you want to return the beneficiary_index or beneficiary_list view
        
    
    
    /**
     * Normalize NIC for comparison (e.g. 981771540v and 981771540V treated as same).
     */
    private function normalizeNic(?string $nic): string
    {
        $s = trim($nic ?? '');
        if ($s === '') {
            return '';
        }
        $last = substr($s, -1);
        if (strtolower($last) === 'v' || strtolower($last) === 'x') {
            $s = substr($s, 0, -1) . strtoupper($last);
        }
        return $s;
    }

    /**
     * Fix NIC stored in scientific notation by Excel (e.g. 1.96E+11 → 196000000000).
     * Returns the full digit string so it uploads correctly.
     */
    private function fixScientificNic(?string $value): ?string
    {
        $s = trim($value ?? '');
        if ($s === '') {
            return null;
        }
        // Match scientific notation: optional minus, digits, optional decimal, E/e, optional +/-, digits
        if (preg_match('/^-?\d+\.?\d*[eE][+-]?\d+$/', $s)) {
            $num = (float) $s;
            return sprintf('%0.0f', $num);
        }
        return $s;
    }

    /**
     * Whether CSV / stored project_type value represents a 4P beneficiary (same linkage as the manual form).
     */
    private function isCsvFourPProjectType(?string $projectType): bool
    {
        $t = strtolower(trim($projectType ?? ''));
        if ($t === '') {
            return false;
        }

        return in_array($t, ['4p projects', '4p project', '4p'], true);
    }

    /**
     * Import data from CSV. Handles duplicate NICs: same NIC in CSV or already in system is skipped (first occurrence only added).
     */
    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('csv_file');
        if (!$file) {
            return redirect()->back()->with('error', 'No CSV file provided.');
        }

        $csvData = file_get_contents($file->getRealPath());
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($rows);
        if (!$header || !is_array($header)) {
            return redirect()->back()->with('error', 'CSV file has no header row.');
        }
        $header = array_map(function ($h) {
            return preg_replace('/^\xEF\xBB\xBF/', '', trim((string) $h));
        }, $header);

        $getNumericValue = function ($value) {
            $trimmed = trim($value ?? '');
            return (empty($trimmed) || !is_numeric($trimmed)) ? null : $trimmed;
        };
        $getStringValue = function ($value) {
            $trimmed = trim($value ?? '');
            return empty($trimmed) ? null : $trimmed;
        };

        $added = 0;
        $skippedInvalid = 0;

        foreach ($rows as $row) {
            if (count($row) !== count($header) || empty(array_filter($row))) {
                $skippedInvalid++;
                continue;
            }

            $beneficiaryData = array_combine($header, $row);
            $rawNic = $getStringValue($beneficiaryData['NIC Number'] ?? $beneficiaryData['NIC'] ?? null);
            if ($rawNic !== null) {
                $rawNic = $this->fixScientificNic($rawNic) ?? $rawNic;
            }
            if ($rawNic === null || $rawNic === '') {
                $skippedInvalid++;
                continue;
            }

            $normalizedNic = $this->normalizeNic($rawNic);
            if ($normalizedNic === '') {
                $skippedInvalid++;
                continue;
            }

            $getCsvValue = function ($keys, $default = null) use ($beneficiaryData, $getStringValue) {
                foreach ($keys as $key) {
                    if (isset($beneficiaryData[$key])) {
                        return $getStringValue($beneficiaryData[$key]);
                    }
                }
                return $default;
            };

            $dob = isset($beneficiaryData['Date Of Birth']) && !empty(trim($beneficiaryData['Date Of Birth'] ?? ''))
                ? trim($beneficiaryData['Date Of Birth'])
                : null;

            $input1 = $getCsvValue(['Input1 (Agriculture/Livestock)', 'Input1'], null);
            $input2 = $getCsvValue(['Input2 (Crop Category/Livestock Type/4P Business Concept Title)', 'Input2', 'Cereals/Legumes'], null);
            if (strtolower(trim($input2 ?? '')) === 'others') {
                $input2 = 'Cereals/Legumes';
            }
            $input3 = $getCsvValue(['Input3 (Crop Name/Production Focus/Youth Proposal/4P Category/Nutrition Program Name)', 'Input3'], null);
            $projectType = $getCsvValue(['Type of Project', 'project_type'], null);
            $storedProjectType = $this->isCsvFourPProjectType($projectType) ? '4P Projects' : $projectType;

            try {
                $beneficiary = Beneficiary::create([
                    'nic' => $rawNic,
                    'name_with_initials' => $getStringValue($beneficiaryData['Name with Initials'] ?? null),
                    'dob' => $dob,
                    'gender' => $getStringValue($beneficiaryData['Gender'] ?? null),
                    'age' => $getNumericValue($beneficiaryData['Age'] ?? null),
                    'address' => $getStringValue($beneficiaryData['Address'] ?? null),
                    'email' => $getStringValue($beneficiaryData['Email address'] ?? $beneficiaryData['Email'] ?? null),
                    'phone' => $getStringValue($beneficiaryData['Phone Numbers'] ?? $beneficiaryData['Phone'] ?? null),
                    'education' => $getStringValue($beneficiaryData['Highest Education Level'] ?? $beneficiaryData['Education'] ?? null),
                    'bank_name' => $getStringValue($beneficiaryData['Bank Name'] ?? null),
                    'bank_branch' => $getStringValue($beneficiaryData['Bank Branch'] ?? null),
                    'account_number' => $getStringValue($beneficiaryData['Account Number'] ?? null),
                    'land_ownership_total_extent' => $getNumericValue($beneficiaryData['Land Ownership Total Extent'] ?? null),
                    'land_ownership_proposed_cultivation_area' => $getNumericValue($beneficiaryData['Land Ownership Proposed Cultivation Area'] ?? null),
                    'province_name' => $getStringValue($beneficiaryData['Province'] ?? null),
                    'district_name' => $getStringValue($beneficiaryData['District'] ?? null),
                    'ds_division_name' => $getStringValue($beneficiaryData['DS Division'] ?? null),
                    'gn_division_name' => $getStringValue($beneficiaryData['GN Division'] ?? null),
                    'as_center' => $getStringValue($beneficiaryData['ASC'] ?? $beneficiaryData['AS Center'] ?? null),
                    'cascade_name' => $getStringValue($beneficiaryData['Cascade Name'] ?? null),
                    'tank_name' => $getStringValue($beneficiaryData['Tank Name'] ?? $beneficiaryData['tank_name'] ?? $beneficiaryData['Tank'] ?? null),
                    'ai_division' => $getStringValue($beneficiaryData['AI Division'] ?? null),
                    'latitude' => $getNumericValue($beneficiaryData['Latitude'] ?? null),
                    'longitude' => $getNumericValue($beneficiaryData['Longitude'] ?? null),
                    'number_of_family_members' => $getNumericValue($beneficiaryData['Number of Family Members'] ?? null),
                    'head_of_householder_name' => $getStringValue($beneficiaryData['Head of Householder Name'] ?? null),
                    'householder_number' => $getStringValue($beneficiaryData['Householder Number'] ?? null),
                    'income_source' => $getStringValue($beneficiaryData['Income Source'] ?? null),
                    'average_income' => $getNumericValue($beneficiaryData['Average Income'] ?? null),
                    'monthly_household_expenses' => $getNumericValue($beneficiaryData['Monthly Household Expenses'] ?? null),
                    'household_level_assets_description' => $getStringValue($beneficiaryData['Household Level Assets Description'] ?? null),
                    'community_based_organization' => $getStringValue($beneficiaryData['Community-Based Organization'] ?? null),
                    'type_of_water_resource' => $getStringValue($beneficiaryData['Type of Water Resource'] ?? null),
                    'training_details_description' => $getStringValue($beneficiaryData['Training Details Description'] ?? null),
                    'input1' => $input1,
                    'input2' => $input2,
                    'input3' => $input3,
                    'project_type' => $storedProjectType,
                ]);

                // View EOI beneficiaries matches on eoi_business_title + eoi_category (not input2/input3 alone).
                // property_exists() is always false for Eloquent attributes, so this block never ran for CSV imports before.
                if ($this->isCsvFourPProjectType($projectType)) {
                    $beneficiary->eoi_business_title = $input2;
                    $beneficiary->eoi_category = $input3;
                    $beneficiary->save();
                }

                $added++;
            } catch (\Throwable $e) {
                $skippedInvalid++;
            }
        }

        $parts = [];
        if ($added > 0) {
            $parts[] = "{$added} beneficiary(ies) added";
        }
        if ($skippedInvalid > 0) {
            $parts[] = "{$skippedInvalid} row(s) skipped (invalid or error)";
        }

        $message = empty($parts) ? 'No valid rows to import.' : implode('. ', $parts);
        return redirect()->back()->with('success', $message)->with('swal_title', 'CSV upload');
    }
     

public function generateCsv()
{
    $beneficiaries = Beneficiary::all(); // Retrieve all beneficiaries

    // Define the CSV file name
    $filename = 'beneficiary_report.csv';

    // Open a file in write mode
    $file = fopen($filename, 'w+');

    // Define the header for the CSV file (export labels)
    $header = [
        'NIC Number', 'Name with Initials', 'Gender', 'Date Of Birth', 'Age', 'Address', 'Email address', 'Phone Numbers', 'Highest Education Level',
        'Bank Name', 'Bank Branch', 'Account Number', 'Land Ownership Total Extent', 'Land Ownership Proposed Cultivation Area',
        'Province', 'District', 'DS Division', 'GN Division', 'ASC', 'Cascade Name', 'Tank Name', 'AI Division', 'Latitude', 'Longitude',
        'Number of Family Members', 'Head of Householder Name', 'Householder Number', 'Income Source', 'Average Income',
        'Monthly Household Expenses', 'Household Level Assets Description', 'Community-Based Organization', 'Type of Water Resource',
        'Training Details Description','Input1 (Agriculture/Livestock)', 'Input2 (Crop Category/Livestock Type/4P Business Concept Title)', 'Input3 (Crop Name/Production Focus/Youth Proposal/4P Category/Nutrition Program Name)','Type of Project'
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
            $beneficiary->tank_name,
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
            (strtolower(trim($beneficiary->input2 ?? '')) === 'others' ? 'Cereals/Legumes' : $beneficiary->input2), // Crop Category: others → Cereals/Legumes
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

    /**
     * Apply free-text search to a beneficiary query (same fields as index).
     */
    private function applyBeneficiaryIndexSearch(Builder $query, string $search): void
    {
        if ($search === '') {
            return;
        }
        $query->where(function ($q) use ($search) {
            $q->where('nic', 'like', '%'.$search.'%')
                ->orWhere('name_with_initials', 'like', '%'.$search.'%')
                ->orWhere('gender', '=', $search)
                ->orWhere('dob', 'like', '%'.$search.'%')
                ->orWhere('age', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('phone', 'like', '%'.$search.'%')
                ->orWhere('income_source', 'like', '%'.$search.'%')
                ->orWhere('average_income', 'like', '%'.$search.'%')
                ->orWhere('monthly_household_expenses', 'like', '%'.$search.'%')
                ->orWhere('number_of_family_members', 'like', '%'.$search.'%')
                ->orWhere('education', 'like', '%'.$search.'%')
                ->orWhere('land_ownership_total_extent', 'like', '%'.$search.'%')
                ->orWhere('land_ownership_proposed_cultivation_area', 'like', '%'.$search.'%')
                ->orWhere('province_name', 'like', '%'.$search.'%')
                ->orWhere('district_name', 'like', '%'.$search.'%')
                ->orWhere('ds_division_name', 'like', '%'.$search.'%')
                ->orWhere('gn_division_name', 'like', '%'.$search.'%')
                ->orWhere('as_center', 'like', '%'.$search.'%')
                ->orWhere('cascade_name', 'like', '%'.$search.'%')
                ->orWhere('ai_division', 'like', '%'.$search.'%')
                ->orWhere('tank_name', 'like', '%'.$search.'%')
                ->orWhere('bank_name', 'like', '%'.$search.'%')
                ->orWhere('bank_branch', 'like', '%'.$search.'%')
                ->orWhere('account_number', 'like', '%'.$search.'%')
                ->orWhere('head_of_householder_name', 'like', '%'.$search.'%')
                ->orWhere('householder_number', 'like', '%'.$search.'%')
                ->orWhere('household_level_assets_description', 'like', '%'.$search.'%')
                ->orWhere('community_based_organization', 'like', '%'.$search.'%')
                ->orWhere('type_of_water_resource', 'like', '%'.$search.'%')
                ->orWhere('training_details_description', 'like', '%'.$search.'%')
                ->orWhere('latitude', 'like', '%'.$search.'%')
                ->orWhere('longitude', 'like', '%'.$search.'%')
                ->orWhere('input1', 'like', '%'.$search.'%')
                ->orWhere('input2', 'like', '%'.$search.'%')
                ->orWhere('input3', 'like', '%'.$search.'%')
                ->orWhere('project_type', 'like', '%'.$search.'%');
        });
    }

    /**
     * Table filters: tank name, programme type, district, DS division, ASC, GN division.
     */
    private function applyBeneficiaryTableFilters(Builder $query, Request $request): void
    {
        if ($request->filled('filter_tank')) {
            $query->where('tank_name', $request->get('filter_tank'));
        }

        $cat = $request->get('filter_category');
        if ($cat === 'tank_beneficiary') {
            $query->where('project_type', 'Tank Beneficiary');
        } elseif ($cat === 'youth') {
            $query->whereIn('project_type', ['Youth Enterprise', 'youth']);
        } elseif ($cat === '4p') {
            $query->whereIn('project_type', ['4P Projects', '4p']);
        } elseif ($cat === 'resilience_agriculture') {
            $query->where('project_type', 'Resilience Project')->where('input1', 'agriculture');
        } elseif ($cat === 'resilience_livestock') {
            $query->where('project_type', 'Resilience Project')->where('input1', 'livestock');
        } elseif ($cat === 'nutrition_program') {
            $query->whereIn('project_type', ['Nutrition Programs', 'nutrition']);
        }

        if ($request->filled('filter_district')) {
            $query->where('district_name', $request->get('filter_district'));
        }

        if ($request->filled('filter_ds')) {
            $query->where('ds_division_name', $request->get('filter_ds'));
        }
        if ($request->filled('filter_asc')) {
            $query->where('as_center', $request->get('filter_asc'));
        }
        if ($request->filled('filter_gn')) {
            $query->where('gn_division_name', $request->get('filter_gn'));
        }
    }

    /**
     * Base query for index list and summaries (search + duplicates + table filters).
     */
    private function buildBeneficiaryIndexBaseQuery(Request $request, array $duplicateNICs): Builder
    {
        $query = Beneficiary::query();
        $this->applyBeneficiaryIndexSearch($query, (string) $request->get('search', ''));
        if ($request->get('duplicates')) {
            $query->whereIn('id', $duplicateNICs);
        }
        $this->applyBeneficiaryTableFilters($query, $request);

        return $query;
    }

    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $entries = $request->get('entries', 100);
        $showDuplicates = $request->get('duplicates');

        // Get all beneficiaries (for duplicate detection)
        $allBeneficiaries = Beneficiary::all();

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

        $duplicateNICs = [];
        foreach ($nicMap as $nic => $ids) {
            if (count($ids) > 1) {
                foreach ($ids as $id) {
                    $duplicateNICs[] = $id;
                }
            }
        }

        $baseQuery = $this->buildBeneficiaryIndexBaseQuery($request, $duplicateNICs);
        $beneficiaries = $baseQuery->clone()->latest()->paginate($entries)->appends($request->query());

        $summaryBase = $this->buildBeneficiaryIndexBaseQuery($request, $duplicateNICs);

        $input3Summary = $summaryBase->clone()
            ->select('input3', DB::raw('COUNT(*) as count'))
            ->groupBy('input3')
            ->get();

        $youthBeneficiaryCount = $summaryBase->clone()
            ->pluck('nic')
            ->filter(fn ($nic) => NicYouth::isYouthByNic($nic))
            ->count();
        $notYouthBeneficiaryCount = $summaryBase->clone()
            ->pluck('nic')
            ->filter(fn ($nic) => NicYouth::isNotYouthByNic($nic))
            ->count();
        $maleBeneficiaryCount = $summaryBase->clone()
            ->whereRaw("LOWER(TRIM(COALESCE(gender, ''))) = ?", ['male'])
            ->count();
        $femaleBeneficiaryCount = $summaryBase->clone()
            ->whereRaw("LOWER(TRIM(COALESCE(gender, ''))) = ?", ['female'])
            ->count();

        $tankNameSummary = $summaryBase->clone()
            ->select('tank_name', DB::raw('COUNT(*) as count'))
            ->groupBy('tank_name')
            ->get();

        $tankBeneficiaryCount = $summaryBase->clone()->where('project_type', 'Tank Beneficiary')->count();
        $youthProgrammeBeneficiaryCount = $summaryBase->clone()
            ->whereIn('project_type', ['Youth Enterprise', 'youth'])
            ->count();
        $fourpBeneficiaryCount = $summaryBase->clone()
            ->whereIn('project_type', ['4P Projects', '4p'])
            ->count();
        $resilienceAgricultureCount = $summaryBase->clone()
            ->where('project_type', 'Resilience Project')
            ->where('input1', 'agriculture')
            ->count();
        $resilienceLivestockCount = $summaryBase->clone()
            ->where('project_type', 'Resilience Project')
            ->where('input1', 'livestock')
            ->count();
        $nutritionProgrammeBeneficiaryCount = $summaryBase->clone()
            ->whereIn('project_type', ['Nutrition Programs', 'nutrition'])
            ->count();

        $filterTankOptions = Beneficiary::query()
            ->whereNotNull('tank_name')
            ->where('tank_name', '!=', '')
            ->distinct()
            ->orderBy('tank_name')
            ->pluck('tank_name');

        $filterDistrictOptions = Beneficiary::query()
            ->whereNotNull('district_name')
            ->where('district_name', '!=', '')
            ->distinct()
            ->orderBy('district_name')
            ->pluck('district_name');

        $filterDsOptions = Beneficiary::query()
            ->whereNotNull('ds_division_name')
            ->where('ds_division_name', '!=', '')
            ->distinct()
            ->orderBy('ds_division_name')
            ->pluck('ds_division_name');

        $ascScope = Beneficiary::query();
        if ($request->filled('filter_ds')) {
            $ascScope->where('ds_division_name', $request->get('filter_ds'));
        }
        $filterAscOptions = $ascScope->clone()
            ->whereNotNull('as_center')
            ->where('as_center', '!=', '')
            ->distinct()
            ->orderBy('as_center')
            ->pluck('as_center');

        $gnScope = Beneficiary::query();
        if ($request->filled('filter_district')) {
            $gnScope->where('district_name', $request->get('filter_district'));
        }
        if ($request->filled('filter_ds')) {
            $gnScope->where('ds_division_name', $request->get('filter_ds'));
        }
        if ($request->filled('filter_asc')) {
            $gnScope->where('as_center', $request->get('filter_asc'));
        }
        $filterGnOptions = $gnScope->clone()
            ->whereNotNull('gn_division_name')
            ->where('gn_division_name', '!=', '')
            ->distinct()
            ->orderBy('gn_division_name')
            ->pluck('gn_division_name');

        $activeFilterCount = collect([
            $request->filled('filter_tank'),
            $request->filled('filter_category'),
            $request->filled('filter_district'),
            $request->filled('filter_ds'),
            $request->filled('filter_asc'),
            $request->filled('filter_gn'),
        ])->filter()->count();

        return view('beneficiary.beneficiary_index', compact(
            'beneficiaries',
            'allBeneficiaries',
            'input3Summary',
            'maleBeneficiaryCount',
            'femaleBeneficiaryCount',
            'youthBeneficiaryCount',
            'notYouthBeneficiaryCount',
            'tankNameSummary',
            'tankBeneficiaryCount',
            'youthProgrammeBeneficiaryCount',
            'fourpBeneficiaryCount',
            'resilienceAgricultureCount',
            'resilienceLivestockCount',
            'nutritionProgrammeBeneficiaryCount',
            'convertedMap',
            'duplicateNICs',
            'filterTankOptions',
            'filterDistrictOptions',
            'filterDsOptions',
            'filterAscOptions',
            'filterGnOptions',
            'activeFilterCount'
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
   public function create(Request $request)
{
     $agreementSignedYouth = YouthProposal::where('status', 'Agreement Signed')
        ->orderBy('organization_name')
        ->get(['id', 'organization_name', 'business_title', 'contact_person', 'mobile_phone', 'category', 'status']);

     $businessTitles = EOI::where('status', 'Agreement Signed')
        ->whereNotNull('business_title')
        ->distinct()
        ->pluck('business_title');

    $preselectedYouthProposalId = $request->query('youth_proposal_id');

    return view('beneficiary.beneficiary_create', compact('agreementSignedYouth', 'businessTitles', 'preselectedYouthProposalId'));
}


    public function store(Request $request)
    {
        
    // Validate the request data
    $request->validate([
        'nic' => 'required|string|max:12', // Duplicate NICs allowed (same NIC can have multiple records)
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
        'nutrition_project_name' => 'nullable|string|max:255',
    ]);
 




    // Create a new beneficiary instance after validation
    $beneficiary = new Beneficiary($request->all());
    
    // Save EOI fields if project type is 4p
    if ($request->project_type === '4P Projects') {
        // Store 4P project data in input2 and input3 for easier CSV bulk upload
        $beneficiary->input2 = $request->eoi_business_title; // 4P Project - Business Concept Title
        $beneficiary->input3 = $request->eoi_category; // 4P Project Category
        // Also keep eoi_business_title and eoi_category for backward compatibility
        $beneficiary->eoi_business_title = $request->eoi_business_title;
        $beneficiary->eoi_category = $request->eoi_category;
    }

    // If youth enterprise is selected, populate input3 with business title (fallback to organization name)
    if ($request->project_type === 'Youth Enterprise' && $request->youth_proposal_id) {
        $youthProposal = \App\Models\YouthProposal::find($request->youth_proposal_id);
        if ($youthProposal) {
            $beneficiary->input3 = $youthProposal->business_title ?? $youthProposal->organization_name;
        }
    }

    // If nutrition program is selected, populate input3 with nutrition program name
    if ($request->project_type === 'Nutrition Programs' && $request->nutrition_project_name) {
        $beneficiary->input3 = $request->nutrition_project_name;
    }

    $beneficiary->save();

    if ($request->project_type === 'Youth Enterprise') {
        return redirect()->route('beneficiary.edit', $beneficiary->id)
            ->with('success', 'Beneficiary registered successfully. You can add youth data below.');
    }

    return redirect('/beneficiary')->with('success', 'Beneficiary registered successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Beneficiary $beneficiary)
    {
        $beneficiary->loadMissing('youthProposal');

        return view('beneficiary.beneficiary_show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiary $beneficiary)
    {
        $beneficiary->loadMissing(['youthProposal', 'youthForm']);

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
        'nic' => 'nullable|string|max:20', // Duplicate NICs allowed
        'name_with_initials' => 'nullable|string|max:255',
        'gender' => 'nullable|string',
        'dob' => 'nullable|date',
        'address' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
        'education' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'account_number' => 'nullable|string|max:255',
        'land_ownership_total_extent' => 'nullable|string',
        'land_ownership_proposed_cultivation_area' => 'nullable|string|max:255',
        'age' => 'nullable|integer',
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
        'youth_proposal_id' => 'nullable|exists:youth_proposals,id',

    ]);

    // Find the beneficiary by ID
    $beneficiary = Beneficiary::findOrFail($id);

    // Update beneficiary details
    $beneficiary->update($validatedData);

    // If 4P project, sync input2 and input3 with eoi_business_title and eoi_category
    if ($beneficiary->project_type === '4P Projects' || $beneficiary->project_type === '4p') {
        if (isset($validatedData['input2'])) {
            $beneficiary->eoi_business_title = $validatedData['input2'];
        }
        if (isset($validatedData['input3'])) {
            $beneficiary->eoi_category = $validatedData['input3'];
        }
        $beneficiary->save();
    }

    // Return a response, like a redirect or JSON response
    return response()->json(['message' => 'Beneficiary updated successfully!']);
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiary $beneficiary)
    {
        foreach ($beneficiary->families as $familyMember) {
            $familyMember->delete();
        }

        $beneficiary->delete();

        return redirect('/beneficiary')->with('success', 'Beneficiary and associated family members deleted successfully.');
    }

    /**
     * Delete multiple beneficiaries (and their family rows) by ID.
     */
    public function bulkDestroy(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:beneficiaries,id',
        ]);

        $deleted = 0;
        foreach ($validated['ids'] as $id) {
            $beneficiary = Beneficiary::find($id);
            if (!$beneficiary) {
                continue;
            }
            foreach ($beneficiary->families as $familyMember) {
                $familyMember->delete();
            }
            $beneficiary->delete();
            $deleted++;
        }

        return redirect()->back()->with('success', $deleted.' beneficiary(ies) deleted successfully.')->with('swal_title', 'Bulk delete');
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
        'NIC Number', 'Name with Initials', 'Address', 'Date Of Birth', 'Gender', 'Age', 'Phone Numbers', 'Email address', 'Income Source', 'Average Income', 
        'Monthly Household Expenses', 'Number of Family Members', 'Highest Education Level', 'Land Ownership Total Extent', 'Land Ownership Proposed Cultivation Area', 
        'Province', 'District', 'DS Division', 'GN Division', 'ASC', 'Cascade Name', 'Tank Name', 'AI Division', 'Account Number', 'Bank Name', 
        'Bank Branch', 'Latitude', 'Longitude', 'Head of Householder Name', 'Householder Number', 'Household Level Assets Description', 
        'Community-Based Organization', 'Type of Water Resource', 'Training Details Description','Input1 (Agriculture/Livestock)', 'Input2 (Crop Category/Livestock Type/4P Business Concept Title)', 'Input3 (Crop Name/Production Focus/Youth Proposal/4P Category/Nutrition Program Name)','Type of Project'
    ]);

    foreach ($beneficiaries as $row) {
        fputcsv($fp, [
            $row->nic, $row->name_with_initials, $row->address, $row->dob, $row->gender, $row->age, $row->phone, $row->email, $row->income_source, 
            $row->average_income, $row->monthly_household_expenses, $row->number_of_family_members, $row->education, $row->land_ownership_total_extent, 
            $row->land_ownership_proposed_cultivation_area, $row->province_name, $row->district_name, $row->ds_division_name, $row->gn_division_name, 
            $row->as_center, $row->cascade_name, $row->tank_name, $row->ai_division, $row->account_number, $row->bank_name, $row->bank_branch, 
            $row->latitude, $row->longitude, $row->head_of_householder_name, $row->householder_number, $row->household_level_assets_description, 
            $row->community_based_organization, $row->type_of_water_resource, $row->training_details_description,$row->input1, // Added field
            (strtolower(trim($row->input2 ?? '')) === 'others' ? 'Cereals/Legumes' : $row->input2), // Crop Category: others → Cereals/Legumes
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

public function getCategoriesByBusinessTitle($title)
{
    $categories = EOI::whereRaw('LOWER(TRIM(business_title)) = ?', [strtolower(trim($title))])
        ->where('status', 'Agreement Signed')
        ->whereNotNull('category')
        ->distinct()
        ->pluck('category');

    return response()->json($categories);
}



    
}
