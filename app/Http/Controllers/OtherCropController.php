<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherCrop;

class OtherCropController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $crops = OtherCrop::latest()->paginate($entries)->appends(['entries' => $entries]);

        return view('vegitable_dairy.othercrop_create', compact('crops', 'entries'));
    }

    public function create()
    {
        return view('vegitable_dairy.othercrop_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'crop_name' => 'required|string|max:255',
        ]);

        $crop = OtherCrop::create($request->all());

        return redirect('/other_crops')->with('success', 'Crop registered successfully.');
    }

    public function show($id)
    {
        // Find the OtherCrop by ID
        $crop = OtherCrop::findOrFail($id);

        // Return the view with the crop data
        return view('other_crops.other_crop_show', compact('crop'));
    }
}
