<?php

namespace App\Http\Controllers;

use App\Models\TankRehabilitation;

class FingerlingController extends Controller
{
    /**
     * Display a listing of tank records in the Fingerling module.
     */
    public function index()
    {
        // Fetch relevant data from the TankRehabilitation model
        $tanks = TankRehabilitation::select(
            'tank_id',
            'tank_name',
            'province_name',
            'district',
            'ds_division_name',
            'gn_division_name',
            'as_centre',
            'river_basin',
            'cascade_name',
            'no_of_family'
        )->get();

        // Pass the data to the Fingerling index view
        return view('fingerling.fingerling_index', compact('tanks'));
    }
}
