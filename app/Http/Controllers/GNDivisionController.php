<?php

namespace App\Http\Controllers;

use App\Models\GNDivision;
use App\Models\DSDivision;
use Illuminate\Http\Request;

class GNDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getGNByDS(Request $request, $dsDivisionId)
    {
        // $gnDivisions = GNDivision::where('ds_division_id', $dsDivisionId)->get();
        // return response()->json($gnDivisions);
        // $gnds = $dsDivision->gnDivisions; // Assuming there is a relationship between DS Division and GND in your model
        // return response()->json($gnds);

        // Find the DS Division
    $dsDivision = DSDivision::findOrFail($dsDivisionId);

    // Get the associated GND divisions
    $gnds = $dsDivision->gnDivisions;

    // Return the GND divisions as JSON response
    return response()->json($gnds);
    }

    /**
     * Show the form for creating a new resource.
     */
}
