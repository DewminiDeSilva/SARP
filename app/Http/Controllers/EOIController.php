<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EOI;
use App\Models\Beneficiary;

class EOIController extends Controller
{
    /**
     * Display a listing of EOIs.
     */
   public function index(Request $request)
    {
        // controls from the toolbar
        $entries = (int) $request->get('entries', 10);
        $search  = trim($request->get('search', ''));
         $sortBy  = $request->get('sortBy', 'eoi_code'); // Default sort column
         $sortDir = $request->get('sortDir', 'desc');    // Default sort direction

        // base query
        $query = EOI::query();

        // search across visible columns in your table
        if ($search !== '') {
            $like = "%{$search}%";
            $query->where(function ($q) use ($like, $search) {
                $q->where('organization_name', 'like', $like)
                    ->orWhere('eoi_code', 'like', $like)
                  ->orWhere('contact_person',   'like', $like)
                  ->orWhere('business_title',   'like', $like)
                  ->orWhere('category',         'like', $like)   // <- use your actual column name
                  ->orWhere('status',           'like', $like)
                  ->orWhere('mobile_phone',     'like', $like);

                // also allow searching by exact numeric ID
                if (is_numeric($search)) {
                    $q->orWhere('id', (int) $search);
                }
            });
        }

        // paginate (keep params when switching pages)
        $expressions = $query->latest()
            ->paginate($entries)
            ->appends($request->only('entries', 'search'));

        // summary counts (overall, not filtered)
        $totalEOIs        = EOI::count();
        $rejectedEOIs     = EOI::where('status', 'Rejected')->count();
        $bpecApprovedEOIs = EOI::where('status', 'BPEC Approved')->count();
        $agreementSigned  = EOI::where('status', 'Agreement Signed')->count();
        $ifadApproved     = EOI::where('status', 'IFAD Approved')->count();
        $nscApproved      = EOI::where('status', 'NSC Approved')->count();

        $query->orderBy($sortBy, $sortDir);
         $expressions = $query->paginate($entries)->appends($request->only('entries', 'search', 'sortBy', 'sortDir'));


        return view('eoi.eoi_index', compact(
            'expressions',
            'entries',
            'search',
            'totalEOIs',
            'rejectedEOIs',
            'bpecApprovedEOIs',
            'agreementSigned',
            'ifadApproved',
            'nscApproved'
        ));
    }
    /**
     * Show the form for creating a new EOI.
     */
    public function create()
    {
        return view('eoi.eoi_create');
    }

   
      
    public function store(Request $request)
{
   $request->validate([
    'eoi_code' => 'nullable|string|max:255',
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

    'risks' => 'nullable|array',
    'mitigations' => 'nullable|array',
    'investment_breakdown' => 'nullable|array',
    'project_coverage' => 'nullable|array',
    'expected_outputs' => 'nullable|array',
    'expected_outcomes' => 'nullable|array',
    'funding_source' => 'nullable|array',
    'assistance_required' => 'nullable|array',

    'implementation_plan' => 'nullable|file|mimes:pdf|max:1048576',
    'category' => 'nullable|string',
    'status' => 'nullable|string',
]);
    $expression = new EOI();
    $expression->eoi_code = $request->eoi_code;
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
    $expression->background_info = $request->background_info;
    $expression->project_justification = $request->project_justification;
    $expression->project_benefits = $request->project_benefits;

    $expression->risk_factors = json_encode([
        'risks' => $request->risks,
        'mitigations' => $request->mitigations
    ]);
    $expression->investment_breakdown = json_encode($request->investment_breakdown);
    $expression->project_coverage = json_encode($request->project_coverage);
    $expression->expected_outputs = json_encode($request->expected_outputs);
    $expression->expected_outcomes = json_encode($request->expected_outcomes);
    $expression->funding_source = json_encode($request->funding_source);
    $expression->assistance_required = json_encode($request->assistance_required);

    if ($request->hasFile('implementation_plan')) {
        $file = $request->file('implementation_plan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/implementation_plans'), $filename);
        $expression->implementation_plan = $filename;
    }
    $expression->category = $request->category;

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

 

    public function update(Request $request, $id)
{
    $request->validate([
    'eoi_code' => 'nullable|string|max:255',
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

    'risks' => 'nullable|array',
    'mitigations' => 'nullable|array',
    'investment_breakdown' => 'nullable|array',
    'project_coverage' => 'nullable|array',
    'expected_outputs' => 'nullable|array',
    'expected_outcomes' => 'nullable|array',
    'funding_source' => 'nullable|array',
    'assistance_required' => 'nullable|array',

    'implementation_plan' => 'nullable|file|mimes:pdf|max:1048576',
    'category' => 'nullable|string',
    'status' => 'nullable|string',
]);
    $expression = EOI::findOrFail($id);
    $expression->eoi_code = $request->eoi_code;
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
    $expression->background_info = $request->background_info;
    $expression->project_justification = $request->project_justification;
    $expression->project_benefits = $request->project_benefits;

    $expression->risk_factors = json_encode([
        'risks' => $request->risks,
        'mitigations' => $request->mitigations,
    ]);

    $expression->investment_breakdown = json_encode($request->investment_breakdown);
    $expression->project_coverage = json_encode($request->project_coverage);
    $expression->expected_outputs = json_encode($request->expected_outputs);
    $expression->expected_outcomes = json_encode($request->expected_outcomes);
    $expression->funding_source = json_encode($request->funding_source);
    $expression->assistance_required = json_encode($request->assistance_required);

    // Update implementation plan if new file is uploaded
     if ($request->hasFile('implementation_plan')) {
    $file = $request->file('implementation_plan');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/implementation_plans'), $filename);
    $expression->implementation_plan = $filename;
//    if ($request->hasFile('implementation_plan')) {
//     $file = $request->file('implementation_plan');
//     $filename = time() . '_' . $file->getClientOriginalName();
//     $file->move(public_path('uploads/implementation_plans'), $filename);
//     $expression->implementation_plan = $filename;
}

    $expression->category = $request->category;

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

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string',
    ]);

    $expression = EOI::findOrFail($id);
    $expression->status = $request->status;
    $expression->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}
public function evaluationCompleted()
{
    $completedExpressions = EOI::where('status', 'Agreement Signed')->paginate(10);
    return view('eoi.evaluation_completed_index', compact('completedExpressions'));
}


public function viewEOIBeneficiaries($id)
{
    $eoi = EOI::findOrFail($id);

    $beneficiaries = Beneficiary::where('eoi_business_title', $eoi->business_title)
        ->where('eoi_category', $eoi->category)
        ->whereNotNull('eoi_business_title')
        ->whereNotNull('eoi_category')
        ->get();

    return view('eoi.eoi_beneficiaries', compact('eoi', 'beneficiaries'));
}

public function createForBeneficiary($beneficiaryId)
{
    $beneficiary = Beneficiary::findOrFail($beneficiaryId);
    return view('eoi.create', compact('beneficiary'));
}

}
