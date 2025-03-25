<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EOI;


class EOIController extends Controller
{
    /**
     * Display a listing of EOIs.
     */
    public function index()
    {
        $expressions = EOI::all();
        return view('eoi.eoi_index', compact('expressions'));
    }

    /**
     * Show the form for creating a new EOI.
     */
    public function create()
    {
        return view('eoi.eoi_create');
    }

    /**
     * Store a newly created EOI.
     */
    public function store(Request $request)
    {$request->validate([
        'organization_name' => 'required|string|max:255',
        'contact_person' => 'required|string|max:255',
        'address' => 'required|string',
        'mobile_phone' => 'required|string|max:20',
        'market_problem' => 'required|string',
        'business_title' => 'required|string|max:255',
        'business_objectives' => 'required|string',
        'project_justification' => 'required|string',
        'project_benefits' => 'required|string',
        'background_info' => 'nullable|string',
        'project_coverage' => 'nullable|string',
        'expected_outputs' => 'nullable|string',
        'expected_outcomes' => 'nullable|string',
        'funding_source' => 'nullable|string',
        'implementation_plan' => 'nullable|string',
        'assistance_required' => 'nullable|string',
        'risks' => 'nullable|array',
        'mitigations' => 'nullable|array',
        'investment_breakdown' => 'nullable|array',
    ]);
    

        $expression = new EOI();
        $expression->organization_name = $request->organization_name;
        $expression->registration_details = $request->registration_details;
        $expression->contact_person = $request->contact_person;
        $expression->address = $request->address;
        $expression->office_phone = $request->office_phone;
        $expression->mobile_phone = $request->mobile_phone;
        $expression->email = $request->email;
        $expression->market_problem = $request->market_problem;
        $expression->business_title = $request->business_title;
        $expression->business_objectives = $request->business_objectives;
        $expression->risk_factors = json_encode([
            'risks' => $request->risks,
            'mitigations' => $request->mitigations,
        ]);
        
        $expression->investment_breakdown = json_encode($request->investment_breakdown);
        $expression->background_info = $request->background_info;
        $expression->project_justification = $request->project_justification;
        $expression->project_benefits = $request->project_benefits;
        $expression->project_coverage = $request->project_coverage;
        $expression->expected_outputs = $request->expected_outputs;
        $expression->expected_outcomes = $request->expected_outcomes;
        $expression->funding_source = $request->funding_source;
        $expression->implementation_plan = $request->implementation_plan;
        $expression->assistance_required = $request->assistance_required;

        $expression->save();

        return redirect()->route('expressions.index')->with('success', 'EOI submitted successfully!');
    }

    /**
     * Display the specified EOI.
     */
    public function show($id)
    {
        $expression = EOI::findOrFail($id);
        return view('eoi.eoi_show', compact('expression'));
    }

    /**
     * Show the form for editing the specified EOI.
     */
    public function edit($id)
    {
        $expression = EOI::findOrFail($id);
        return view('eoi.eoi_edit', compact('expression'));
    }

    /**
     * Update the specified EOI.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile_phone' => 'required|string|max:20',
            'market_problem' => 'required|string',
            'business_title' => 'required|string|max:255',
            'business_objectives' => 'required|string',
            'project_justification' => 'required|string',
            'project_benefits' => 'required|string',
            'background_info' => 'nullable|string',
            'project_coverage' => 'nullable|string',
            'expected_outputs' => 'nullable|string',
            'expected_outcomes' => 'nullable|string',
            'funding_source' => 'nullable|string',
            'implementation_plan' => 'nullable|string',
            'assistance_required' => 'nullable|string',
            'risks' => 'nullable|array',
            'mitigations' => 'nullable|array',
            'investment_breakdown' => 'nullable|array',
        ]);
        

        $expression = EOI::findOrFail($id);
        $expression->organization_name = $request->organization_name;
        $expression->registration_details = $request->registration_details;
        $expression->contact_person = $request->contact_person;
        $expression->address = $request->address;
        $expression->office_phone = $request->office_phone;
        $expression->mobile_phone = $request->mobile_phone;
        $expression->email = $request->email;
        $expression->market_problem = $request->market_problem;
        $expression->business_title = $request->business_title;
        $expression->business_objectives = $request->business_objectives;
        $expression->risk_factors = json_encode([
            'risks' => $request->risks,
            'mitigations' => $request->mitigations,
        ]);
        
        $expression->investment_breakdown = json_encode($request->investment_breakdown);
        $expression->background_info = $request->background_info;
        $expression->project_justification = $request->project_justification;
        $expression->project_benefits = $request->project_benefits;
        $expression->project_coverage = $request->project_coverage;
        $expression->expected_outputs = $request->expected_outputs;
        $expression->expected_outcomes = $request->expected_outcomes;
        $expression->funding_source = $request->funding_source;
        $expression->implementation_plan = $request->implementation_plan;
        $expression->assistance_required = $request->assistance_required;

        $expression->save();

        return redirect()->route('expressions.index')->with('success', 'EOI updated successfully!');
    }

    /**
     * Remove the specified EOI.
     */
    public function destroy($id)
    {
        $expression = EOI::findOrFail($id);
        $expression->delete();

        return redirect()->route('expressions.index')->with('success', 'EOI deleted successfully!');
    }
}
