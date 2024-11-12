<?php

namespace App\Http\Controllers;

use App\Models\Vegitable;
use App\Models\Fruit;
use App\Models\HomeGarden;
use App\Models\OtherCrop;

class AgricultureDataController extends Controller
{
    public function index()
    {
        $vegitables = Vegitable::all();
        $fruits = Fruit::all();
        $homegardens = HomeGarden::all();
        $crops = OtherCrop::all();

        return view('vegitable_dairy.agriculture', compact('vegitables', 'fruits', 'homegardens', 'crops'));
    }
}
