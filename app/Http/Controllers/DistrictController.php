<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;


class DistrictController extends Controller
{
    // public function indexByProvince(Province $province)
    // {
    //     $districts = District::where('province_id', $province->id)->get();
    //     return response()->json($districts);
    // }

    public function indexByProvince($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }
    // public function indexByProvince(Province $province)
    // {
    //     $districts = $province->districts;
    //     return response()->json($districts);
    // }
    
}
