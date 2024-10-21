<?php

namespace App\Http\Controllers;

use App\Models\ASC;
use Illuminate\Http\Request;

class ASCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asc = ASC::select('id', 'asc_name')->get();
        return response()->json($asc);
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
    public function show(ASC $aSC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ASC $aSC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ASC $aSC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ASC $aSC)
    {
        //
    }
}
