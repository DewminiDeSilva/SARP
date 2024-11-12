<?php

namespace App\Http\Controllers;

use App\Models\Dairy;
use App\Models\Poultary;
use App\Models\Goat;
use App\Models\AquaCulture;

use Illuminate\Http\Request;

class LivestockDataController extends Controller
{
    public function index()
    {
        $dairies = Dairy::all();
        $poultaries = Poultary::all();
        $goats = Goat::all();
        $aquacultures = AquaCulture::all();

        return view('vegitable_dairy.livestock', compact('dairies', 'poultaries', 'goats', 'aquacultures'));
    }
    
}
