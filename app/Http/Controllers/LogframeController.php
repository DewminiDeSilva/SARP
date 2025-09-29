<?php

namespace App\Http\Controllers;

use App\Models\TankLogframe;
use App\Models\TankRehabilitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogframeController extends Controller
{
    // View table
    public function index(Request $request)
    {
        $indicatorKey = 'tanks_rehab_number';
        $years = range(2021, 2028);

        $rows = TankLogframe::where('indicator_key', $indicatorKey)
            ->whereIn('year', $years)
            ->orderBy('year')
            ->get()
            ->keyBy('year');

        // Meta defaults (fall back if first-time empty)
        $first = $rows->first();
        $meta = [
            'results_hierarchy' => "Output\nMinor irrigation tanks and water harvesting infrastructure constructed or rehabilitated",
            'name'              => "Rehabilitation/construction of tanks — Tanks rehabilitated/constructed (Number)",
            'baseline'          => optional($first)?->baseline ?? 0,
            'mid_term'          => optional($first)?->mid_term ?? 120,
            'end_target'        => optional($first)?->end_target ?? 260,
            'source'            => optional($first)?->source ?? 'MIS',
            'frequency'         => optional($first)?->frequency ?? 'Monthly',
            'responsibility'    => optional($first)?->responsibility ?? 'PMU',
            'assumptions'       => optional($first)?->assumptions ?? '',
        ];

        $yearTargets = [];
        $yearResults = [];

        // Compute results from TankRehabilitation: count status 'Completed' per year
        foreach ($years as $y) {
            $yearTargets[$y] = $rows[$y]->year_target ?? 0;

            $completedForYear = TankRehabilitation::where('status', 'Completed')
                ->where(function ($q) use ($y) {
                    $q->whereNotNull('awarded_date')
                        ->whereYear('awarded_date', $y)
                      ->orWhere(function ($q2) use ($y) {
                          $q2->whereNull('awarded_date')
                             ->whereYear('updated_at', $y);
                      });
                })
                ->count();

            $yearResults[$y] = (int) $completedForYear;
        }

        return view('logframe.tanks-index', compact(
            'years','meta','yearTargets','yearResults'
        ));
    }

    // Show create/edit
    public function create()
    {
        $indicatorKey = 'tanks_rehab_number';
        $years = range(2021, 2028);

        $existing = TankLogframe::where('indicator_key', $indicatorKey)
            ->whereIn('year', $years)
            ->get()
            ->keyBy('year');

        $first = $existing->first();

        // Ensure all variables are properly initialized
        $meta = [
            'baseline'       => optional($first)?->baseline ?? 0,
            'mid_term'       => optional($first)?->mid_term ?? 120,
            'end_target'     => optional($first)?->end_target ?? 260,
            'source'         => optional($first)?->source ?? 'MIS',
            'frequency'      => optional($first)?->frequency ?? 'Monthly',
            'responsibility' => optional($first)?->responsibility ?? 'PMU',
            'assumptions'    => optional($first)?->assumptions ?? '',
        ];

        $data = $existing ?? collect();

        return view('logframe.tanks-create', compact('years', 'meta', 'data'));
    }

    // Save (bulk years)
    public function store(Request $request)
    {
        $indicatorKey = 'tanks_rehab_number';

        $validated = $request->validate([
            'baseline'       => ['nullable','integer','min:0'],
            'mid_term'       => ['nullable','integer','min:0'],
            'end_target'     => ['nullable','integer','min:0'],
            'source'         => ['nullable','string','max:100'],
            'frequency'      => ['nullable','string','max:100'],
            'responsibility' => ['nullable','string','max:100'],
            'assumptions'    => ['nullable','string','max:1000'],
            'year_target.*'  => ['nullable','integer','min:0'],
            'year_result.*'  => ['nullable','integer','min:0'],
        ]);

        $years = array_keys($request->input('year_target', []) + $request->input('year_result', []));

        foreach ($years as $y) {
            TankLogframe::updateOrCreate(
                ['indicator_key' => $indicatorKey, 'year' => (int)$y],
                [
                    'year_target'    => (int)($request->input("year_target.$y", 0)),
                    'year_result'    => (int)($request->input("year_result.$y", 0)),
                    'baseline'       => (int)($validated['baseline'] ?? 0),
                    'mid_term'       => (int)($validated['mid_term'] ?? 0),
                    'end_target'     => (int)($validated['end_target'] ?? 0),
                    'source'         => $validated['source'] ?? 'MIS',
                    'frequency'      => $validated['frequency'] ?? 'Monthly',
                    'responsibility' => $validated['responsibility'] ?? 'PMU',
                    'assumptions'    => $validated['assumptions'] ?? '',
                ]
            );
        }

        return redirect()->route('logframe.tanks.index')
            ->with('status', 'Tank logframe updated successfully.');
    }

    // Delete indicator
    public function destroy(Request $request, $indicatorKey)
    {
        try {
            // Delete all records for this indicator key
            TankLogframe::where('indicator_key', $indicatorKey)->delete();
            
            return redirect()->route('logframe.tanks.index')
                ->with('status', 'Indicator deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('logframe.tanks.index')
                ->with('status', 'Error deleting indicator: ' . $e->getMessage());
        }
    }
}
