<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YouthProposal;

class YouthProposalController extends Controller
{
    /**
     * Display a listing of Youth Proposals.
     */
    public function index()
    {
        $entries = request()->get('entries', 10);
    
        // Get paginated proposals
        $proposals = YouthProposal::latest()->paginate($entries)->appends(['entries' => $entries]);
    
        // Summary counts
        $totalOrganizations = YouthProposal::count();
        $agreementSignedCount = YouthProposal::where('status', 'Agreement Signed')->count();
        $notAgreementSignedCount = YouthProposal::whereNull('status')
            ->orWhere('status', '!=', 'Agreement Signed')
            ->count();
    
        // Pass everything to the view
        return view('youth_proposal.youth_proposal_index', compact(
            'proposals',
            'entries',
            'totalOrganizations',
            'agreementSignedCount',
            'notAgreementSignedCount'
        ));
    }

    /**
     * Show the form for creating a new Youth Proposal.
     */
    public function create()
    {
        return view('youth_proposal.youth_proposal_create');
    }

    /**
     * Store a newly created Youth Proposal in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_name' => 'nullable|string|max:255',
            'registration_details' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'office_phone' => 'nullable|string|max:20',
            'mobile_phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'market_problem' => 'nullable|string',
            'business_title' => 'nullable|string|max:255',
            'business_objectives' => 'nullable|string',
            'background_info' => 'nullable|string',
            'project_justification' => 'nullable|string',
            'project_benefits' => 'nullable|string',
            'category' => 'nullable|string',
            'status' => 'nullable|string',
            'risks' => 'nullable|array',
            'mitigations' => 'nullable|array',
            'investment_breakdown' => 'nullable|array',
            'project_coverage' => 'nullable|array',
            'expected_outputs' => 'nullable|array',
            'expected_outcomes' => 'nullable|array',
            'funding_source' => 'nullable|array',
            'assistance_required' => 'nullable|array',
            'implementation_plan' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $proposal = new YouthProposal();
        $proposal->organization_name = $request->organization_name;
        $proposal->registration_details = $request->registration_details;
        $proposal->contact_person = $request->contact_person;
        $proposal->address = $request->address;
        $proposal->office_phone = $request->office_phone;
        $proposal->mobile_phone = $request->mobile_phone;
        $proposal->email = $request->email;
        $proposal->market_problem = $request->market_problem;
        $proposal->business_title = $request->business_title;
        $proposal->business_objectives = $request->business_objectives;
        $proposal->background_info = $request->background_info;
        $proposal->project_justification = $request->project_justification;
        $proposal->project_benefits = $request->project_benefits;
        $proposal->category = $request->category;
        $proposal->status = $request->status; // ✅ Add this below $proposal->category
        $proposal->risk_factors = json_encode([
            'risks' => $request->risks,
            'mitigations' => $request->mitigations
        ]);
        $proposal->investment_breakdown = json_encode($request->investment_breakdown);
        $proposal->project_coverage = json_encode($request->project_coverage);
        $proposal->expected_outputs = json_encode($request->expected_outputs);
        $proposal->expected_outcomes = json_encode($request->expected_outcomes);
        $proposal->funding_source = json_encode($request->funding_source);
        $proposal->assistance_required = json_encode($request->assistance_required);

        if ($request->hasFile('implementation_plan')) {
            $path = $request->file('implementation_plan')->store('youth_proposals', 'public');
            $proposal->implementation_plan = $path;
        }




        $proposal->save();

        return redirect()->route('youth-proposals.index')->with('success', 'Youth Proposal submitted successfully!');
    }

    /**
     * Display the specified Youth Proposal.
     */
    public function show($id)
    {
        $proposal = YouthProposal::findOrFail($id);
        return view('youth_proposal.youth_proposal_show')->with('youth_proposal', $proposal);
    }


    /**
     * Show the form for editing the specified Youth Proposal.
     */
    public function edit($id)
    {
        $proposal = YouthProposal::findOrFail($id);

        // decode arrays for the form
        $proposal->risk_factors_decoded     = json_decode($proposal->risk_factors, true) ?? ['risks' => [], 'mitigations' => []];
        $proposal->investment_breakdown_decoded = json_decode($proposal->investment_breakdown, true) ?? [];
        $proposal->project_coverage_decoded = json_decode($proposal->project_coverage, true) ?? [];
        $proposal->expected_outputs_decoded = json_decode($proposal->expected_outputs, true) ?? [];
        $proposal->expected_outcomes_decoded = json_decode($proposal->expected_outcomes, true) ?? [];
        $proposal->funding_source_decoded   = json_decode($proposal->funding_source, true) ?? [];
        $proposal->assistance_required_decoded = json_decode($proposal->assistance_required, true) ?? [];

        // NOTE: your view path says 'youth_proposals.edit'
        return view('youth_proposal.youth_proposal_edit', compact('proposal'));
    }


    /**
     * Update the specified Youth Proposal in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'organization_name' => 'nullable|string|max:255',
            'registration_details' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'office_phone' => 'nullable|string|max:20',
            'mobile_phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'market_problem' => 'nullable|string',
            'business_title' => 'nullable|string|max:255',
            'business_objectives' => 'nullable|string',
            'background_info' => 'nullable|string',
            'project_justification' => 'nullable|string',
            'project_benefits' => 'nullable|string',
            'category' => 'nullable|string',
            'risks' => 'nullable|array',
            'mitigations' => 'nullable|array',
            'investment_breakdown' => 'nullable|array',
            'project_coverage' => 'nullable|array',
            'expected_outputs' => 'nullable|array',
            'expected_outcomes' => 'nullable|array',
            'funding_source' => 'nullable|array',
            'assistance_required' => 'nullable|array',
            'implementation_plan' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $proposal = YouthProposal::findOrFail($id);
        $proposal->organization_name = $request->organization_name;
        $proposal->registration_details = $request->registration_details;
        $proposal->contact_person = $request->contact_person;
        $proposal->address = $request->address;
        $proposal->office_phone = $request->office_phone;
        $proposal->mobile_phone = $request->mobile_phone;
        $proposal->email = $request->email;
        $proposal->market_problem = $request->market_problem;
        $proposal->business_title = $request->business_title;
        $proposal->business_objectives = $request->business_objectives;
        $proposal->background_info = $request->background_info;
        $proposal->project_justification = $request->project_justification;
        $proposal->project_benefits = $request->project_benefits;
        $proposal->category = $request->category;
        if ($request->has('status') && $request->filled('status')) {
            $proposal->status = $request->status;
        }
        $proposal->risk_factors = json_encode([
            'risks' => $request->risks,
            'mitigations' => $request->mitigations,
        ]);
        $proposal->investment_breakdown = json_encode($request->investment_breakdown);
        $proposal->project_coverage = json_encode($request->project_coverage);
        $proposal->expected_outputs = json_encode($request->expected_outputs);
        $proposal->expected_outcomes = json_encode($request->expected_outcomes);
        $proposal->funding_source = json_encode($request->funding_source);
        $proposal->assistance_required = json_encode($request->assistance_required);

        if ($request->hasFile('implementation_plan')) {
            $path = $request->file('implementation_plan')->store('youth_proposals', 'public'); // same as store()
            $proposal->implementation_plan = $path; // DO NOT prefix with "storage/"
        }

        $proposal->save();

        return redirect()->route('youth-proposals.index')->with('success', 'Youth Proposal updated successfully!');
    }

    /**
     * Remove the specified Youth Proposal from storage.
     */
    public function destroy($id)
    {
        $proposal = YouthProposal::findOrFail($id);
        $proposal->delete();

        return redirect()->route('youth-proposals.index')->with('success', 'Youth Proposal deleted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $proposal = YouthProposal::findOrFail($id);
        $proposal->status = $request->status;
        $proposal->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function agreementSigned()
    {
        $signedProposals = YouthProposal::where('status', 'Agreement Signed')->paginate(10);
        return view('youth_proposal.agreement_signed_index', compact('signedProposals'));
    }


    public function showBeneficiaries($id)
    {
        $proposal = YouthProposal::with('beneficiaries')->findOrFail($id);

        return view('youth_proposal.beneficiaries_by_proposal', compact('proposal'));
    }
    
}
