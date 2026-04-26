<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Models\TankRehabilitation;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TankController extends Controller
{
    /**
     * Shared module back navigation: Blade partial `partials.sarp_history_back` (history.back + fallback URL).
     *
     * JSON list of tank names for dropdowns: Tank registry + unique names from Tank Rehabilitation.
     * Query: q (optional filter), limit (default 300, max 500).
     */
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $limit = (int) $request->query('limit', 300);
        $limit = max(10, min(500, $limit));

        $like = $q !== ''
            ? '%' . str_replace(['%', '_'], ['\\%', '\\_'], $q) . '%'
            : null;

        $byKey = [];

        $registryQuery = Tank::query()
            ->select('id', 'tank_name')
            ->whereNotNull('tank_name')
            ->where('tank_name', '!=', '');

        if ($like !== null) {
            $registryQuery->where('tank_name', 'like', $like);
        }

        foreach ($registryQuery->orderBy('tank_name')->limit($limit * 2)->get() as $row) {
            $name = trim((string) $row->tank_name);
            if ($name === '') {
                continue;
            }
            $key = mb_strtolower($name);
            if (!isset($byKey[$key])) {
                $byKey[$key] = ['id' => (int) $row->id, 'tank_name' => $name];
            }
        }

        $rehabQuery = TankRehabilitation::query()
            ->select('tank_name')
            ->whereNotNull('tank_name')
            ->where('tank_name', '!=', '');

        if ($like !== null) {
            $rehabQuery->where('tank_name', 'like', $like);
        }

        foreach ($rehabQuery->distinct()->orderBy('tank_name')->limit($limit * 2)->get() as $row) {
            $name = trim((string) $row->tank_name);
            if ($name === '') {
                continue;
            }
            $key = mb_strtolower($name);
            if (!isset($byKey[$key])) {
                $byKey[$key] = ['id' => 0, 'tank_name' => $name];
            }
        }

        /** @var Collection<int, array{id:int,tank_name:string}> $list */
        $list = collect($byKey)
            ->sortBy(fn ($v) => mb_strtolower($v['tank_name']))
            ->values()
            ->take($limit);

        return response()->json($list->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tank $tank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tank $tank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tank $tank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tank $tank)
    {
        //
    }
}
