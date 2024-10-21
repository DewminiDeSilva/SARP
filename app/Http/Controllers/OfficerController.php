<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grievance;
use App\Models\Officer;

class OfficerController extends Controller
{
    public function create($grievanceId)
    {
        $grievance = Grievance::findOrFail($grievanceId);
        return view('officer.officer_create', compact('grievance'));
    }

    public function store(Request $request, $grievanceId)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'institution' => 'required|string|max:255',
        'actions_taken' => 'required|string',
        'status' => 'required|string',
    ]);

    $grievance = Grievance::findOrFail($grievanceId);
    $data = $request->all();
    $data['action_taken_date'] = now(); // Automatically set the system date

    $grievance->officers()->create($data);

    return redirect()->route('grievance.officers', $grievanceId)->with('success', 'Officer action recorded successfully.');
    }


    public function showOfficers($grievanceId)
    {
        $grievance = Grievance::findOrFail($grievanceId);
        $officers = $grievance->officers()->paginate(10);
        return view('officer.officer_index', compact('grievance', 'officers'));
    }
}
