<?php

namespace App\Http\Controllers;

use App\Models\LogframeIndicator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class LogframeIndicatorController extends Controller
{
    /**
     * Get all indicators for a specific section
     */
    public function getBySection($sectionKey)
    {
        $indicators = LogframeIndicator::bySection($sectionKey)->get();
        return response()->json($indicators);
    }

    /**
     * Get a specific indicator
     */
    public function show($id)
    {
        $indicator = LogframeIndicator::findOrFail($id);
        return response()->json($indicator);
    }

    /**
     * Create a new indicator
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_key' => 'required|string|max:255',
            'indicator_name' => 'required|string|max:500',
            'indicator_description' => 'required|string',
            'indicator_type' => 'string|max:50',
            'baseline' => 'integer|min:0',
            'mid_term' => 'integer|min:0',
            'end_target' => 'integer|min:0',
            'source' => 'nullable|string|max:255',
            'frequency' => 'nullable|string|max:255',
            'responsibility' => 'nullable|string|max:255',
            'assumptions' => 'nullable|string',
            'yearly_targets' => 'nullable|array',
            'yearly_results' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $indicator = LogframeIndicator::create($request->all());
        return response()->json($indicator, 201);
    }

    /**
     * Update an existing indicator
     */
    public function update(Request $request, $id)
    {
        $indicator = LogframeIndicator::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'section_key' => 'sometimes|string|max:255',
            'indicator_name' => 'sometimes|string|max:500',
            'indicator_description' => 'sometimes|string',
            'indicator_type' => 'sometimes|string|max:50',
            'baseline' => 'sometimes|integer|min:0',
            'mid_term' => 'sometimes|integer|min:0',
            'end_target' => 'sometimes|integer|min:0',
            'source' => 'nullable|string|max:255',
            'frequency' => 'nullable|string|max:255',
            'responsibility' => 'nullable|string|max:255',
            'assumptions' => 'nullable|string',
            'yearly_targets' => 'nullable|array',
            'yearly_results' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $indicator->update($request->all());
        return response()->json($indicator);
    }

    /**
     * Update specific year data for an indicator
     */
    public function updateYearData(Request $request, $id)
    {
        $indicator = LogframeIndicator::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'year' => 'required|integer|min:2020|max:2030',
            'target' => 'required|integer|min:0',
            'result' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $year = $request->year;
        $target = $request->target;
        $result = $request->result;

        // Update the specific year data
        $indicator->setTargetForYear($year, $target);
        $indicator->setResultForYear($year, $result);
        $indicator->save();

        return response()->json([
            'success' => true,
            'indicator' => $indicator,
            'cumulative' => $indicator->getCumulativeResult($year)
        ]);
    }

    /**
     * Update meta data for an indicator
     */
    public function updateMeta(Request $request, $id)
    {
        $indicator = LogframeIndicator::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'baseline' => 'required|integer|min:0',
            'mid_term' => 'required|integer|min:0',
            'end_target' => 'required|integer|min:0',
            'source' => 'nullable|string|max:255',
            'frequency' => 'nullable|string|max:255',
            'responsibility' => 'nullable|string|max:255',
            'assumptions' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $indicator->update($request->only([
            'baseline', 'mid_term', 'end_target', 'source', 
            'frequency', 'responsibility', 'assumptions'
        ]));

        return response()->json([
            'success' => true,
            'indicator' => $indicator
        ]);
    }

    /**
     * Delete an indicator
     */
    public function destroy($id)
    {
        $indicator = LogframeIndicator::findOrFail($id);
        $indicator->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Get all indicators with their data for the logframe display
     */
    public function getAllForDisplay()
    {
        $indicators = LogframeIndicator::all()->groupBy('section_key');
        return response()->json($indicators);
    }
}
