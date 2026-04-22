<?php

namespace App\Http\Controllers;

use App\Models\FeederRoadDevelopment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FeederRoadDevelopmentController extends Controller
{
    private function applyFeederRoadIndexSearch(Builder $query, string $search): void
    {
        $search = trim($search);
        if ($search === '') {
            return;
        }
        $like = '%' . $search . '%';
        $query->where(function (Builder $q) use ($like) {
            $q->where('feeder_road_id', 'like', $like)
                ->orWhere('feeder_road_name', 'like', $like)
                ->orWhere('type_of_feeder_road', 'like', $like)
                ->orWhere('river_basin', 'like', $like)
                ->orWhere('cascade_name', 'like', $like)
                ->orWhere('province_name', 'like', $like)
                ->orWhere('district', 'like', $like)
                ->orWhere('ds_division_name', 'like', $like)
                ->orWhere('gn_division_name', 'like', $like)
                ->orWhere('as_centre', 'like', $like)
                ->orWhere('agency', 'like', $like)
                ->orWhere('feeder_road_progress', 'like', $like)
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

    private function applyFeederRoadTableFilters(Builder $query, Request $request): void
    {
        if ($request->filled('filter_tank')) {
            $query->where('feeder_road_name', $request->get('filter_tank'));
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

    private function buildFeederRoadIndexBaseQuery(Request $request): Builder
    {
        $query = FeederRoadDevelopment::query();
        $this->applyFeederRoadIndexSearch($query, (string) $request->get('search', ''));
        $this->applyFeederRoadTableFilters($query, $request);

        return $query;
    }

    public function index(Request $request)
    {
        $entries = (int) $request->get('entries', 10);
        if (! in_array($entries, [10, 25, 50, 100], true)) {
            $entries = 10;
        }

        $baseQuery = $this->buildFeederRoadIndexBaseQuery($request);
        $records = $baseQuery->clone()->latest()->paginate($entries)->appends($request->query());

        $summaryBase = $this->buildFeederRoadIndexBaseQuery($request);
        $totalRecords = $summaryBase->count();
        $totalHouseholds = (int) $summaryBase->sum('no_of_family');
        $ongoingCount = $summaryBase->clone()->where('status', 'On Going')->count();
        $completedCount = $summaryBase->clone()->where('status', 'Completed')->count();

        $locations = $summaryBase->clone()
            ->select(
                'feeder_road_id',
                'feeder_road_name',
                'latitude',
                'longitude',
                'feeder_road_progress',
                'status'
            )
            ->get();

        $filterTankOptions = FeederRoadDevelopment::query()
            ->whereNotNull('feeder_road_name')
            ->where('feeder_road_name', '!=', '')
            ->distinct()
            ->orderBy('feeder_road_name')
            ->pluck('feeder_road_name');

        $filterDsOptions = FeederRoadDevelopment::query()
            ->whereNotNull('ds_division_name')
            ->where('ds_division_name', '!=', '')
            ->distinct()
            ->orderBy('ds_division_name')
            ->pluck('ds_division_name');

        $ascScope = FeederRoadDevelopment::query();
        if ($request->filled('filter_ds')) {
            $ascScope->where('ds_division_name', $request->get('filter_ds'));
        }
        $filterAscOptions = $ascScope->clone()
            ->whereNotNull('as_centre')
            ->where('as_centre', '!=', '')
            ->distinct()
            ->orderBy('as_centre')
            ->pluck('as_centre');

        $gnScope = FeederRoadDevelopment::query();
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

        return view('feeder_road.feeder_road_index', compact(
            'records',
            'ongoingCount',
            'completedCount',
            'totalRecords',
            'totalHouseholds',
            'entries',
            'locations',
            'filterTankOptions',
            'filterDsOptions',
            'filterAscOptions',
            'filterGnOptions',
            'activeFilterCount'
        ));
    }

    public function create()
    {
        return view('feeder_road.feeder_road_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pre_construction_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'during_construction_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'post_construction_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $pre = $request->hasFile('pre_construction_image') ? $request->file('pre_construction_image')->store('images', 'public') : null;
        $during = $request->hasFile('during_construction_image') ? $request->file('during_construction_image')->store('images', 'public') : null;
        $post = $request->hasFile('post_construction_image') ? $request->file('post_construction_image')->store('images', 'public') : null;

        FeederRoadDevelopment::create([
            'feeder_road_id' => $request->feeder_road_id,
            'feeder_road_name' => $request->feeder_road_name,
            'type_of_feeder_road' => $request->type_of_feeder_road,
            'feeder_road_progress' => $request->feeder_road_progress,
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
            'contractor' => $request->contractor,
            'payment' => $request->payment,
            'eot' => $request->eot,
            'contract_period' => $request->contract_period,
            'status' => $request->input('status', 'On Going'),
            'remarks' => $request->remarks,
            'open_ref_no' => $request->open_ref_no,
            'awarded_date' => $request->awarded_date,
            'cumulative_amount' => $request->cumulative_amount,
            'paid_advanced_amount' => $request->paid_advanced_amount,
            'recommended_ipc_no' => $request->recommended_ipc_no,
            'recommended_ipc_amount' => $request->recommended_ipc_amount,
            'pre_construction_image' => $pre,
            'during_construction_image' => $during,
            'post_construction_image' => $post,
        ]);

        return redirect()->route('feeder_road_development.index')->with('success', 'Feeder road development record created successfully.');
    }

    public function show(FeederRoadDevelopment $feederRoadDevelopment)
    {
        $cumulativePaid = $feederRoadDevelopment->cumulative_amount;
        $contractAmount = $feederRoadDevelopment->payment;
        $percentage = $this->calculateFinanceProgressPercent($cumulativePaid, $contractAmount);

        return view('feeder_road.feeder_road_show', [
            'record' => $feederRoadDevelopment,
            'percentage' => $percentage,
        ]);
    }

    public function edit(FeederRoadDevelopment $feederRoadDevelopment)
    {
        return view('feeder_road.feeder_road_edit', ['record' => $feederRoadDevelopment]);
    }

    public function update(Request $request, FeederRoadDevelopment $feederRoadDevelopment)
    {
        $request->validate([
            'image_pre_construction' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_during_construction' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image_post_construction' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($request->hasFile('image_pre_construction')) {
            if ($feederRoadDevelopment->pre_construction_image) {
                Storage::disk('public')->delete($feederRoadDevelopment->pre_construction_image);
            }
            $feederRoadDevelopment->pre_construction_image = $request->file('image_pre_construction')->store('images', 'public');
        }
        if ($request->hasFile('image_during_construction')) {
            if ($feederRoadDevelopment->during_construction_image) {
                Storage::disk('public')->delete($feederRoadDevelopment->during_construction_image);
            }
            $feederRoadDevelopment->during_construction_image = $request->file('image_during_construction')->store('images', 'public');
        }
        if ($request->hasFile('image_post_construction')) {
            if ($feederRoadDevelopment->post_construction_image) {
                Storage::disk('public')->delete($feederRoadDevelopment->post_construction_image);
            }
            $feederRoadDevelopment->post_construction_image = $request->file('image_post_construction')->store('images', 'public');
        }

        $feederRoadDevelopment->update($request->only([
            'feeder_road_id',
            'feeder_road_name',
            'type_of_feeder_road',
            'feeder_road_progress',
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
            'contractor',
            'payment',
            'eot',
            'contract_period',
            'status',
            'remarks',
            'open_ref_no',
            'awarded_date',
            'cumulative_amount',
            'paid_advanced_amount',
            'recommended_ipc_no',
            'recommended_ipc_amount',
        ]));

        return redirect()->route('feeder_road_development.index')->with('success', 'Feeder road development record updated successfully.');
    }

    public function destroy(FeederRoadDevelopment $feederRoadDevelopment)
    {
        foreach (['pre_construction_image', 'during_construction_image', 'post_construction_image'] as $field) {
            if ($feederRoadDevelopment->{$field}) {
                Storage::disk('public')->delete($feederRoadDevelopment->{$field});
            }
        }
        $feederRoadDevelopment->delete();

        return redirect()->route('feeder_road_development.index')->with('success', 'Feeder road development record deleted successfully.');
    }

    /**
     * @return array<int, string>
     */
    private static function excelColumnHeaders(): array
    {
        return [
            'Feeder Road ID',
            'Feeder Road Name',
            'Type of Feeder Road',
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
            'Feeder Road Progress',
            'Contractor',
            'Payment',
            'EOT',
            'Contract Period',
            'Implementation Status',
            'Remarks',
            'Open Ref No',
            'Awarded Date',
            'Cumulative Amount',
            'Paid Advanced Amount',
            'Recommended IPC No',
            'Recommended IPC Amount',
        ];
    }

    public function reportExcel()
    {
        $headers = self::excelColumnHeaders();
        $rows = FeederRoadDevelopment::latest()->get();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($headers, null, 'A1');

        $r = 2;
        foreach ($rows as $row) {
            $sheet->fromArray([
                $row->feeder_road_id,
                $row->feeder_road_name,
                $row->type_of_feeder_road,
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
                $row->feeder_road_progress,
                $row->contractor,
                $row->payment,
                $row->eot,
                $row->contract_period,
                $row->status,
                $row->remarks,
                $row->open_ref_no,
                $row->awarded_date ? $row->awarded_date->format('Y-m-d') : null,
                $row->cumulative_amount,
                $row->paid_advanced_amount,
                $row->recommended_ipc_no,
                $row->recommended_ipc_amount,
            ], null, 'A'.$r);
            $r++;
        }

        $path = storage_path('app/feeder_road_development_report_'.uniqid('', true).'.xlsx');
        (new Xlsx($spreadsheet))->save($path);

        return response()->download($path, 'feeder_road_development_report.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    public function downloadTemplate()
    {
        $headers = self::excelColumnHeaders();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($headers, null, 'A1');

        $path = storage_path('app/feeder_road_development_template_'.uniqid('', true).'.xlsx');
        (new Xlsx($spreadsheet))->save($path);

        return response()->download($path, 'feeder_road_development_upload_template.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    public function search(Request $request)
    {
        return redirect()->route('feeder_road_development.index', $request->query());
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|max:10240',
        ]);

        $file = $request->file('excel_file');
        $ext = strtolower($file->getClientOriginalExtension() ?: '');
        if (! in_array($ext, ['xlsx', 'xls'], true)) {
            return redirect()->back()->with('error', 'Please upload an Excel file (.xlsx or .xls).');
        }

        try {
            $spreadsheet = IOFactory::load($file->getRealPath());
        } catch (\Throwable $e) {
            Log::warning('Feeder road Excel load failed', ['message' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Could not read the Excel file. Save it as .xlsx and try again.');
        }

        $sheet = $spreadsheet->getActiveSheet();
        $matrix = $sheet->toArray();

        if (empty($matrix)) {
            return redirect()->back()->with('error', 'The Excel file is empty.');
        }

        $canonical = self::excelColumnHeaders();
        $numCols = count($canonical);

        $headerRow = array_shift($matrix);
        $headerRow = is_array($headerRow) ? array_values($headerRow) : [];
        $columnMap = $this->excelHeaderColumnMap($headerRow, $canonical);

        $imported = 0;

        foreach ($matrix as $rowIndex => $row) {
            if (! is_array($row)) {
                continue;
            }

            $row = array_values($row);
            $data = [];

            foreach ($canonical as $i => $colName) {
                $idx = $columnMap[$colName];
                if ($idx === null) {
                    $idx = $i;
                }
                $data[$colName] = array_key_exists($idx, $row) ? $row[$idx] : null;
            }

            if (empty(array_filter($data, static fn ($c) => $c !== null && $c !== ''))) {
                continue;
            }

            $name = $data['Feeder Road Name'] ?? '';
            if (is_string($name)) {
                $name = trim($name);
            } else {
                $name = (string) $name;
            }
            if ($name === '') {
                return redirect()->back()->with('error', 'Row '.($rowIndex + 2).": each row must include Feeder Road Name (use the downloaded template column order).");
            }

            $awardedDate = $this->parseExcelDate($data['Awarded Date'] ?? null);

            FeederRoadDevelopment::create([
                'feeder_road_id' => $this->excelString($data['Feeder Road ID'] ?? null),
                'feeder_road_name' => $this->excelString($data['Feeder Road Name'] ?? null),
                'type_of_feeder_road' => $this->excelString($data['Type of Feeder Road'] ?? null),
                'river_basin' => $this->excelString($data['River Basin'] ?? null),
                'cascade_name' => $this->excelString($data['Cascade Name'] ?? null),
                'province_name' => $this->excelString($data['Province'] ?? null),
                'district' => $this->excelString($data['District'] ?? null),
                'ds_division_name' => $this->excelString($data['DS Division'] ?? null),
                'gn_division_name' => $this->excelString($data['GN Division'] ?? null),
                'as_centre' => $this->excelString($data['AS Centre'] ?? null),
                'agency' => $this->excelString($data['Agency'] ?? null),
                'no_of_family' => $this->excelString($data['No. of Family'] ?? null),
                'longitude' => $this->excelString($data['Longitude'] ?? null),
                'latitude' => $this->excelString($data['Latitude'] ?? null),
                'feeder_road_progress' => $this->excelString($data['Feeder Road Progress'] ?? null),
                'contractor' => $this->excelString($data['Contractor'] ?? null),
                'payment' => $this->excelString($data['Payment'] ?? null),
                'eot' => $this->excelString($data['EOT'] ?? null),
                'contract_period' => $this->excelString($data['Contract Period'] ?? null),
                'status' => $this->excelString($data['Implementation Status'] ?? null) ?: 'On Going',
                'remarks' => $this->excelString($data['Remarks'] ?? null),
                'open_ref_no' => $this->excelString($data['Open Ref No'] ?? null),
                'awarded_date' => $awardedDate,
                'cumulative_amount' => $this->excelDecimal($data['Cumulative Amount'] ?? null),
                'paid_advanced_amount' => $this->excelDecimal($data['Paid Advanced Amount'] ?? null),
                'recommended_ipc_no' => $this->excelString($data['Recommended IPC No'] ?? null),
                'recommended_ipc_amount' => $this->excelDecimal($data['Recommended IPC Amount'] ?? null),
            ]);
            $imported++;
        }

        if ($imported === 0) {
            return redirect()->back()->with('error', 'No data rows were found. Add rows under the header row and ensure Feeder Road Name is filled.');
        }

        return redirect()->back()->with('success', 'Excel file uploaded successfully ('.$imported.' record(s) added).');
    }

    /**
     * Map column names to 0-based indexes. Falls back to template column order (A, B, C…).
     *
     * @param  array<int, mixed>  $headerRow
     * @param  array<int, string>  $canonical
     * @return array<string, int|null>
     */
    private function excelHeaderColumnMap(array $headerRow, array $canonical): array
    {
        $normalize = static function (mixed $v): string {
            if ($v === null) {
                return '';
            }
            $s = is_string($v) ? trim($v) : trim((string) $v);

            return strtolower(preg_replace('/\s+/u', ' ', $s));
        };

        $map = [];
        foreach ($canonical as $i => $name) {
            $map[$name] = null;
        }

        foreach ($headerRow as $i => $cell) {
            $key = $normalize($cell);
            if ($key === '') {
                continue;
            }
            foreach ($canonical as $name) {
                if ($normalize($name) === $key) {
                    $map[$name] = $i;
                    break;
                }
            }
        }

        $found = count(array_filter($map, static fn ($v) => $v !== null));
        if ($found === 0) {
            foreach ($canonical as $i => $name) {
                $map[$name] = $i;
            }
        } else {
            foreach ($canonical as $i => $name) {
                if ($map[$name] === null) {
                    $map[$name] = $i;
                }
            }
        }

        return $map;
    }

    private function excelString(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        if (is_numeric($value) && ! is_string($value)) {
            return (string) $value;
        }

        return trim((string) $value);
    }

    private function excelDecimal(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        if (is_numeric($value)) {
            return (string) $value;
        }

        return trim((string) $value) ?: null;
    }

    private function parseExcelDate(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        if (is_numeric($value)) {
            try {
                return ExcelDate::excelToDateTimeObject((float) $value)->format('Y-m-d');
            } catch (\Throwable $e) {
                Log::info('Invalid Excel serial date', ['value' => $value]);

                return null;
            }
        }
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }
        try {
            return Carbon::parse((string) $value)->format('Y-m-d');
        } catch (\Throwable $e) {
            Log::info('Invalid Awarded Date in Excel', ['value' => $value]);

            return null;
        }
    }

    private function calculateFinanceProgressPercent($cumulativePaid, $contractAmount): float
    {
        $paid = is_numeric($cumulativePaid) ? (float) $cumulativePaid : 0.0;
        $contract = is_numeric($contractAmount) ? (float) $contractAmount : 0.0;

        if ($contract > 0) {
            return round(($paid / $contract) * 100, 2);
        }

        return 0.0;
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return response()->json(['error' => 'No records selected.'], 400);
        }
        FeederRoadDevelopment::whereIn('id', $ids)->delete();

        return response()->json(['success' => 'Selected records deleted successfully.']);
    }
}
