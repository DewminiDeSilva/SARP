<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
    {
        // return view('beneficiary.beneficiary_index');
        
        return view('welcome');
    }
}
