<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grievance;

class GrievanceController extends Controller
{
    public function index()
    {
        $grievances = Grievance::paginate(10);
        return view('grievances.grievances_index', compact('grievances'));
    }

    public function create()
    {
        return view('grievances.grievances_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:12',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'grievance_description' => 'required|string|max:1000',
            'contact_number' => 'required|string|max:10',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'dsd' => 'required|string|max:255',
            'gnd' => 'required|string|max:255',
            'asc' => 'required|string|max:255',
            'cascade_name' => 'required|string|max:255',
            'tank_name' => 'required|string|max:255',
            'sub_project_name' => 'required|string|max:255',
            'sub_project_gn_division' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['date_received'] = now(); // Automatically set the system date

        Grievance::create($data);

        return redirect()->route('grievances.index')->with('success', 'Grievance created successfully.');
    }
}
