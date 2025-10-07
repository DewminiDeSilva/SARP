<?php

namespace App\Http\Controllers;

use App\Models\AgroForest;
use App\Models\AgroForestSpecies;
use App\Models\AgroForestNursery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgroForestController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->get('entries', 10);

        $agroForests = AgroForest::with(['species', 'nurseries'])
            ->withSum('species as total_plants', 'no_of_plants')
            ->latest()
            ->paginate($perPage);

        // view: resources/views/agro_forest/agro_forest_index.blade.php
        return view('agro_forest.agro_forest_index', compact('agroForests'));
    }

    public function create()
    {
        // view: resources/views/agro_forest/agro_forest_create.blade.php
        return view('agro_forest.agro_forest_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'river_basin'                 => 'nullable|string',
            'province_name'               => 'nullable|string',
            'district'                    => 'nullable|string',
            'gn_division_name'            => 'nullable|string|max:255',
            'gn_division_name_2'            => 'nullable|string|max:255',
            'gn_division_name_3'            => 'nullable|string|max:255',
            'ds_division_name'            => 'nullable|string|max:255',
            'no_of_trees_plans'           => 'nullable|integer',
            'paid_amount'                 => 'nullable|numeric',
            'tank_name'                   => 'nullable|string',
            'tank_name_2'                 => 'nullable|string',
            'tank_name_3'                 => 'nullable|string',

             'tank_names'                  => 'nullable|array',
             'tank_names.*'                => 'nullable|string|max:255',
            'replanting_forest_beat_name' => 'nullable|string',
            'number_of_hectares'          => 'nullable|numeric',
            'gps_longitude'               => 'nullable|numeric',
            'gps_latitude'                => 'nullable|numeric',
            'establish_cost'              => 'nullable|numeric',
            'project_proposal'            => 'nullable|mimes:pdf|max:5120',

            // dynamic rows
            'species_names_arr'           => 'nullable|array',
            'species_names_arr.*'         => 'nullable|string',
            'species_counts_arr'          => 'nullable|array',
            'species_counts_arr.*'        => 'nullable|integer',
            'nursery_locations_extra'     => 'nullable|array',
            'nursery_locations_extra.*'   => 'nullable|string',
            'nursery_plants_extra'     => 'nullable|array',
            'nursery_plants_extra.*'   => 'nullable|integer',

            
        ]);
        // Map dynamic tanks to fixed columns (keep DB unchanged)
    $names = array_values(array_filter($request->input('tank_names', []), fn($v) => trim((string)$v) !== ''));
    $data['tank_name']   = $names[0] ?? ($data['tank_name']   ?? null);
    $data['tank_name_2'] = $names[1] ?? ($data['tank_name_2'] ?? null);
    $data['tank_name_3'] = $names[2] ?? ($data['tank_name_3'] ?? null);

    if ($request->hasFile('project_proposal')) {
        $data['project_proposal_path'] = $request->file('project_proposal')->store('proposals', 'public');
    }

        // if ($request->hasFile('project_proposal')) {
        //     $data['project_proposal_path'] = $request->file('project_proposal')->store('proposals', 'public');
        // }

        DB::transaction(function () use ($request, $data) {
            $agro = AgroForest::create($data);

            // species
            $names  = $request->input('species_names_arr', []);
            $counts = $request->input('species_counts_arr', []);
            foreach ($names as $i => $name) {
                $name = trim((string)$name);
                if ($name !== '') {
                    $agro->species()->create([
                        'species_name' => $name,
                        'no_of_plants' => $counts[$i] ?? null,
                    ]);
                }
            }

            // nurseries
            // foreach ($request->input('nursery_locations_extra', []) as $loc) {
            //     $loc = trim((string)$loc);
            //     if ($loc !== '') {
            //         $agro->nurseries()->create(['location' => $loc]);
            //     }
            // }

            $locations = $request->input('nursery_locations_extra', []);
            $plants    = $request->input('nursery_plants_extra', []);

            foreach ($locations as $i => $loc) {
                $loc = trim((string)$loc);
                if ($loc !== '') {
                    $agro->nurseries()->create([
                        'location'        => $loc,
                        'number_of_plants'=> $plants[$i] ?? null,
                    ]);
                }
        }

        });

        return redirect()->route('agro-forest.index')
            ->with('success', 'Agro Forest record created successfully.');
    }

    public function show(AgroForest $agro_forest)
    {
        $agro_forest->load(['species', 'nurseries']);

        // view: resources/views/agro_forest/agro_forest_show_blade.php
        return view('agro_forest.agro_forest_show', compact('agro_forest'));
    }

    public function edit(AgroForest $agro_forest)
    {
        $agro_forest->load(['species', 'nurseries']);

        // view: resources/views/agro_forest/edit.blade.php (or whatever you named it)
        return view('agro_forest.agro_forest_edit', compact('agro_forest'));
    }

    public function update(Request $request, AgroForest $agro_forest)
    {
        $data = $request->validate([
            'river_basin'                 => 'nullable|string|max:255',
            'province_name'               => 'nullable|string|max:255',
            'district'                    => 'nullable|string|max:255',
            'gn_division_name'            => 'nullable|string|max:255',
            'gn_division_name_2'          => 'nullable|string|max:255',
            'gn_division_name_3'          => 'nullable|string|max:255',
            'ds_division_name'            => 'nullable|string|max:255',
            'no_of_trees_plans'           => 'nullable|integer|min:0',
            'paid_amount'                 => 'nullable|numeric|min:0',
            'tank_name'                   => 'nullable|string|max:255',
            'tank_name_2'                 => 'nullable|string|max:255',
            'tank_name_3'                 => 'nullable|string|max:255',

            'tank_names'                  => 'nullable|array',
             'tank_names.*'                => 'nullable|string|max:255',

            'replanting_forest_beat_name' => 'nullable|string|max:255',
            'number_of_hectares'          => 'nullable|numeric',
            'gps_longitude'               => 'nullable|numeric',
            'gps_latitude'                => 'nullable|numeric',
            'establish_cost'              => 'nullable|numeric',
            'project_proposal'            => 'nullable|file|mimes:pdf|max:10240',

            'species_names_arr'           => 'nullable|array',
            'species_names_arr.*'         => 'nullable|string|max:255',
            'species_counts_arr'          => 'nullable|array',
            'species_counts_arr.*'        => 'nullable|integer|min:0',

            'nursery_locations_extra'     => 'nullable|array',
            'nursery_locations_extra.*'   => 'nullable|string|max:255',
            'nursery_plants_extra'        => 'nullable|array',
            'nursery_plants_extra.*'      => 'nullable|integer|min:0',
        ]);

         $names = array_values(array_filter($request->input('tank_names', []), fn($v) => trim((string)$v) !== ''));
    $data['tank_name']   = $names[0] ?? ($data['tank_name']   ?? null);
    $data['tank_name_2'] = $names[1] ?? ($data['tank_name_2'] ?? null);
    $data['tank_name_3'] = $names[2] ?? ($data['tank_name_3'] ?? null);

        if ($request->hasFile('project_proposal')) {
            $data['project_proposal_path'] = $request->file('project_proposal')->store('proposals', 'public');
        }

        DB::transaction(function () use ($agro_forest, $data, $request) {
            // parent
            $agro_forest->update($data);

            // simple reset (easiest)
            $agro_forest->species()->delete();
            $agro_forest->nurseries()->delete();

            $names  = $request->input('species_names_arr', []);
            $counts = $request->input('species_counts_arr', []);
            foreach ($names as $i => $name) {
                $name = trim((string)$name);
                if ($name !== '') {
                    $agro_forest->species()->create([
                        'species_name' => $name,
                        'no_of_plants' => isset($counts[$i]) ? (int)$counts[$i] : null,
                    ]);
                }
            }

            // foreach ($request->input('nursery_locations_extra', []) as $loc) {
            //     $loc = trim((string)$loc);
            //     if ($loc !== '') {
            //         $agro_forest->nurseries()->create(['location' => $loc]);
            //     }
            // }
             $locations = $request->input('nursery_locations_extra', []);
        $plants    = $request->input('nursery_plants_extra', []);
        foreach ($locations as $i => $loc) {
            $loc = trim((string)$loc);
            if ($loc !== '') {
                $agro_forest->nurseries()->create([
                    'location'        => $loc,
                    'number_of_plants'=> $plants[$i] ?? null,
                ]);
            }
        }
        });

        return redirect()->route('agro-forest.show', $agro_forest->id)
            ->with('success', 'Agro Forest record updated successfully.');
    }

    public function destroy(AgroForest $agro_forest)
    {
        $agro_forest->delete();
        return redirect()->route('agro-forest.index')
            ->with('success', 'Agro Forest record deleted successfully.');
    }
}
