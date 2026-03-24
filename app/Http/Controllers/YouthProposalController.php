<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YouthProposal;
use App\Models\Beneficiary;

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
            'nic_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'business_type' => 'nullable|string|in:New Business,Existing Business',
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
            'implementation_plan_names' => 'nullable|array',
            'implementation_plan_names.*' => 'nullable|string|max:255',
            'implementation_plan_files' => 'nullable|array',
            'implementation_plan_files.*' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $proposal = new YouthProposal();
        $proposal->organization_name = $request->organization_name;
        $proposal->registration_details = $request->registration_details;
        $proposal->contact_person = $request->contact_person;
        $proposal->nic_number = $request->nic_number;
        $proposal->birth_date = $request->birth_date;
        $proposal->business_type = $request->business_type;
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
        $proposal->status = $request->status;
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

        $planFiles = $request->file('implementation_plan_files') ?? [];
        $planNames = $request->implementation_plan_names ?? [];
        $plans = [];
        foreach ($planFiles as $i => $file) {
            if ($file && $file->isValid()) {
                $path = $file->store('youth_proposals', 'public');
                $plans[] = ['name' => $planNames[$i] ?? 'Plan ' . ($i + 1), 'path' => $path];
            }
        }
        if (!empty($plans)) {
            $proposal->implementation_plans = $plans;
            $proposal->implementation_plan = $plans[0]['path'];
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
            'nic_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'business_type' => 'nullable|string|in:New Business,Existing Business',
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
            'implementation_plan_names' => 'nullable|array',
            'implementation_plan_names.*' => 'nullable|string|max:255',
            'implementation_plan_files' => 'nullable|array',
            'implementation_plan_files.*' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $proposal = YouthProposal::findOrFail($id);
        $proposal->organization_name = $request->organization_name;
        $proposal->registration_details = $request->registration_details;
        $proposal->contact_person = $request->contact_person;
        $proposal->nic_number = $request->nic_number;
        $proposal->birth_date = $request->birth_date;
        $proposal->business_type = $request->business_type;
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

        $planFiles = $request->file('implementation_plan_files') ?? [];
        $planNames = $request->implementation_plan_names ?? [];
        $existingPlans = is_array($proposal->implementation_plans) ? $proposal->implementation_plans : (json_decode($proposal->implementation_plans ?? '[]', true) ?? []);
        foreach ($planFiles as $i => $file) {
            if ($file && $file->isValid()) {
                $path = $file->store('youth_proposals', 'public');
                $existingPlans[] = ['name' => $planNames[$i] ?? 'Plan ' . (count($existingPlans) + 1), 'path' => $path];
            }
        }
        if (!empty($existingPlans)) {
            $proposal->implementation_plans = $existingPlans;
            $proposal->implementation_plan = $existingPlans[0]['path'] ?? $existingPlans[0];
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
        $signedProposals = YouthProposal::where('status', 'Agreement Signed')
            ->with(['beneficiaries' => function ($q) {
                $q->with('youthForm');
            }])
            ->orderByDesc('id')
            ->paginate(10);

        return view('youth_proposal.agreement_signed_index', compact('signedProposals'));
    }

    /**
     * Show form to add youth data (register new beneficiary linked to this proposal).
     */
    public function addBeneficiaryForm($id)
    {
        $proposal = YouthProposal::findOrFail($id);
        return view('youth_proposal.add_beneficiary', compact('proposal'));
    }

    /**
     * Link an existing beneficiary to this youth proposal.
     */
    public function linkBeneficiary(Request $request, $id)
    {
        $proposal = YouthProposal::findOrFail($id);
        $request->validate(['beneficiary_id' => 'required|exists:beneficiaries,id']);
        $beneficiary = Beneficiary::findOrFail($request->beneficiary_id);
        if ($beneficiary->youth_proposal_id) {
            return redirect()->back()->with('error', 'This beneficiary is already linked to another youth proposal.');
        }
        $beneficiary->youth_proposal_id = $proposal->id;
        $beneficiary->project_type = 'Youth Enterprise';
        $youthProposal = YouthProposal::find($proposal->id);
        $beneficiary->input3 = $youthProposal ? ($youthProposal->business_title ?? $youthProposal->organization_name) : null;
        $beneficiary->save();
        return redirect()->route('youth-proposal.agreementSigned')->with('success', 'Beneficiary linked successfully.');
    }
}
