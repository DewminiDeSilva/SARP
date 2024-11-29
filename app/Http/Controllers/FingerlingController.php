<?php

namespace App\Http\Controllers;

use App\Models\TankRehabilitation;
use Illuminate\Http\Request;


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
        )
        ->paginate(10); // Use pagination
        $entries = request()->get('entries', 10); // Get 'entries' from request, default to 10 if not present
        $tankRehabilitations = TankRehabilitation::latest()->paginate($entries)->appends(['entries' => $entries]);

        // Pass the data to the Fingerling index view
        return view('fingerling.fingerling_index', compact('tanks'));
    }
    public function searchFingerling(Request $request)
{
    $search = $request->input('search'); // Get the search query

    // Fetch search results and paginate
    $tanks = TankRehabilitation::where('tank_id', 'like', '%' . $search . '%')
        ->orWhere('tank_name', 'like', '%' . $search . '%')
        ->orWhere('river_basin', 'like', '%' . $search . '%')
        ->orWhere('cascade_name', 'like', '%' . $search . '%')
        ->orWhere('province_name', 'like', '%' . $search . '%')
        ->orWhere('district', 'like', '%' . $search . '%')
        ->orWhere('ds_division_name', 'like', '%' . $search . '%')
        ->orWhere('gn_division_name', 'like', '%' . $search . '%')
        ->orWhere('as_centre', 'like', '%' . $search . '%')
        ->paginate(10); // Use pagination here

    // Return the view with data
    return view('fingerling.fingerling_index', compact('tanks', 'search'));
}


}
