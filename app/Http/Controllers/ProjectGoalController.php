<?php

namespace App\Http\Controllers;

use App\Models\ProjectGoalLogframe;
use Illuminate\Http\Request;

class ProjectGoalController extends Controller
{
    // View table
    public function index(Request $request)
    {
        $indicatorKey = 'project_goal_income';
        $years = range(2021, 2028);

        $rows = ProjectGoalLogframe::where('indicator_key', $indicatorKey)
            ->whereIn('year', $years)
            ->orderBy('year')
            ->get()
            ->keyBy('year');

        // Meta defaults (fall back if first-time empty)
        $first = $rows->first();
        $meta = [
            'results_hierarchy' => "Project Goal",
            'name'              => "Contribute to smallholder poverty reduction, food security and nutrition in target Dry Zone districts",
            'baseline'          => optional($first)?->baseline ?? 0,
            'mid_term'          => optional($first)?->mid_term ?? 10500,
            'end_target'        => optional($first)?->end_target ?? 28000,
            'source'            => optional($first)?->source ?? 'Reference studies and HH surveys',
            'frequency'         => optional($first)?->frequency ?? 'Baseline, MTR, End-line',
            'responsibility'    => optional($first)?->responsibility ?? 'PMU',
            'assumptions'       => optional($first)?->assumptions ?? 'Extreme climate change shocks do not occur',
        ];

        $yearTargets = [];
        $yearResults = [];

        foreach ($years as $y) {
            $yearTargets[$y] = $rows[$y]->year_target ?? 0;
            $yearResults[$y] = $rows[$y]->year_result ?? 0;
        }

        return view('logframe.project-goal-index', compact(
            'years','meta','yearTargets','yearResults'
        ));
    }

    // Show create/edit
    public function create()
    {
        $indicatorKey = 'project_goal_income';
        $years = range(2021, 2028);

        $existing = ProjectGoalLogframe::where('indicator_key', $indicatorKey)
            ->whereIn('year', $years)
            ->get()
            ->keyBy('year');

        $first = $existing->first();

        // Ensure all variables are properly initialized
        $meta = [
            'baseline'       => optional($first)?->baseline ?? 0,
            'mid_term'       => optional($first)?->mid_term ?? 10500,
            'end_target'     => optional($first)?->end_target ?? 28000,
            'source'         => optional($first)?->source ?? 'Reference studies and HH surveys',
            'frequency'      => optional($first)?->frequency ?? 'Baseline, MTR, End-line',
            'responsibility' => optional($first)?->responsibility ?? 'PMU',
            'assumptions'    => optional($first)?->assumptions ?? 'Extreme climate change shocks do not occur',
        ];

        $data = $existing ?? collect();

        return view('logframe.project-goal-create', compact('years', 'meta', 'data'));
    }

    // Save (bulk years)
    public function store(Request $request)
    {
        $indicatorKey = 'project_goal_income';

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
            ProjectGoalLogframe::updateOrCreate(
                ['indicator_key' => $indicatorKey, 'year' => (int)$y],
                [
                    'year_target'    => (int)($request->input("year_target.$y", 0)),
                    'year_result'    => (int)($request->input("year_result.$y", 0)),
                    'baseline'       => (int)($validated['baseline'] ?? 0),
                    'mid_term'       => (int)($validated['mid_term'] ?? 0),
                    'end_target'     => (int)($validated['end_target'] ?? 0),
                    'source'         => $validated['source'] ?? 'Reference studies and HH surveys',
                    'frequency'      => $validated['frequency'] ?? 'Baseline, MTR, End-line',
                    'responsibility' => $validated['responsibility'] ?? 'PMU',
                    'assumptions'    => $validated['assumptions'] ?? 'Extreme climate change shocks do not occur',
                ]
            );
        }

        return redirect()->route('logframe.project-goal.index')
            ->with('status', 'Project Goal logframe saved successfully.');
    }
}

