<?php

namespace App\Http\Controllers;

use App\Models\DSDivision;
use Illuminate\Http\Request;

class DSDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getDSByDistrict(Request $request, $districtId)
    {
        $dsDivisions = DSDivision::where('district_id', $districtId)->get();
    
        return response()->json($dsDivisions);
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
    public function show(DSDivision $dSDivision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DSDivision $dSDivision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DSDivision $dSDivision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DSDivision $dSDivision)
    {
        //
    }
}
