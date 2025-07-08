<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Youth;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\Storage;

class YouthController extends Controller
{
    /**
     * Display a paginated list of beneficiaries for Youth Enterprise linkage.
     * Only specific columns are selected, and sorted by latest first.
     */
   public function index(Request $request)
{
    // 1) Get all beneficiary IDs with youth records
    $youthBeneficiaryIds = Youth::pluck('beneficiary_id')->unique();

    // 2) Build base query
    $query = Beneficiary::select(
        'id',
        'nic',
        'name_with_initials',
        'gender',
        'address',
        'phone',
        'tank_name'
    );

    // 3) Apply search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            if (strtolower($search) === 'male' || strtolower($search) === 'female') {
                $q->where('gender', strtolower($search));
            } else {
                $q->where('nic', 'like', "%{$search}%")
                  ->orWhere('name_with_initials', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('tank_name', 'like', "%{$search}%");
            }
        });

    }

    // 4) Apply status filter
    if ($request->filled('status')) {
        if ($request->status == 'with') {
            $query->whereIn('id', $youthBeneficiaryIds);
        } elseif ($request->status == 'pending') {
            $query->whereNotIn('id', $youthBeneficiaryIds);
        }
    }

    // 5) Paginate and append filters
    $beneficiaries = $query->orderBy('created_at', 'desc')
        ->paginate(10)
        ->appends([
            'search' => $request->search,
            'status' => $request->status,
        ]);

    // 6) Summary counts
    $totalBeneficiaries = Beneficiary::count();
    $withYouthCount     = Youth::distinct('beneficiary_id')->count('beneficiary_id');
    $pendingYouthCount  = $totalBeneficiaries - $withYouthCount;

    // 7) Return view
    return view('youth.youth_index', compact(
        'beneficiaries',
        'youthBeneficiaryIds',
        'totalBeneficiaries',
        'withYouthCount',
        'pendingYouthCount'
    ));
}



    /**
     * Show the form to add Youth Enterprise details for a selected beneficiary.
     *
     * @param int $beneficiary_id
     * @return \Illuminate\View\View
     */
    public function create($beneficiary_id)
    {
        // Fetch the beneficiary record by ID
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);
        return view('youth.youth_create', compact('beneficiary'));
    }

    /**
     * Store the Youth Enterprise details submitted from the form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // ✅ Validate all inputs including file and dynamic fields
    $validated = $request->validate([
        'beneficiary_id' => 'required|exists:beneficiaries,id',

        // 🌱 Enterprise Information
        'enterprise_name' => 'nullable|string|max:255',
        'registration_number' => 'nullable|string|max:255',
        'institute_of_registration' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'email' => 'nullable|email|max:255',
        'phone_number' => 'nullable|string|max:50',
        'website_name' => 'nullable|string|max:255',
        'description_of_certificates' => 'nullable|string',
        'nature_of_business' => 'nullable|string',
        'products_available' => 'nullable|string',
        'yield_collection_details' => 'nullable|string',
        'marketing_information' => 'nullable|string',
        'list_of_distributors' => 'nullable|string',
        'business_plan' => 'nullable|file|mimes:pdf|max:10240',

        // 📦 Credit Static Fields
        'bank_name' => 'nullable|string|max:255',
        'branch' => 'nullable|string|max:255',
        'account_number' => 'nullable|string|max:50',
        'interest_rate' => 'nullable|string|max:50',
        'credit_issue_date' => 'nullable|date',
        'loan_installment_date' => 'nullable|date',
        'credit_amount' => 'nullable|string|max:255',
        'number_of_installments' => 'nullable|string|max:50',
        'installment_due_date' => 'nullable|date',

        // 💳 Credit Balance Fields
        'credit_balance_date' => 'nullable|date',
        'credit_balance_value' => 'nullable|string|max:255',

        // 📋 Dynamic JSON Fields
        'asset_details' => 'nullable|array',
        'youth_contributions' => 'nullable|array',
        'promoter_contributions' => 'nullable|array',
        'grant_details' => 'nullable|array',
        'installment_payments' => 'nullable|array',
    ]);

    // 📎 Upload business plan file if provided
    if ($request->hasFile('business_plan')) {
        $path = $request->file('business_plan')->store('business_plans', 'public');
        $validated['business_plan'] = $path;
    }

    // 🧠 Process JSON fields (add/remove capable)
    $validated['asset_details'] = isset($request->asset_details['asset_name'], $request->asset_details['asset_value']) 
        ? json_encode(array_map(function ($name, $value) {
            return ['asset_name' => $name, 'asset_value' => $value];
        }, $request->asset_details['asset_name'], $request->asset_details['asset_value']))
        : null;

    $validated['youth_contributions'] = isset($request->youth_contributions['date']) 
        ? json_encode(array_map(function ($date, $desc, $value) {
            return ['date' => $date, 'description' => $desc, 'value' => $value];
        }, $request->youth_contributions['date'], $request->youth_contributions['description'], $request->youth_contributions['value']))
        : null;

    $validated['promoter_contributions'] = isset($request->promoter_contributions['date']) 
        ? json_encode(array_map(function ($date, $desc, $value) {
            return ['date' => $date, 'description' => $desc, 'value' => $value];
        }, $request->promoter_contributions['date'], $request->promoter_contributions['description'], $request->promoter_contributions['value']))
        : null;

    $validated['grant_details'] = isset($request->grant_details['date']) 
        ? json_encode(array_map(function ($date, $desc, $value, $issuer) {
            return ['date' => $date, 'description' => $desc, 'value' => $value, 'grant_issued_by' => $issuer];
        }, $request->grant_details['date'], $request->grant_details['description'], $request->grant_details['value'], $request->grant_details['grant_issued_by']))
        : null;

    $validated['installment_payments'] = isset($request->installment_payments['installment_payment_date']) 
        ? json_encode(array_map(function ($date, $value) {
            return ['installment_payment_date' => $date, 'installment_payment_value' => $value];
        }, $request->installment_payments['installment_payment_date'], $request->installment_payments['installment_payment_value']))
        : null;

    // ✅ Save to database
    Youth::create($validated);

    return redirect()->route('youth.index')->with('success', 'Youth enterprise details saved successfully.');
    }


            /**
     * Show the Youth Enterprise data for a specific beneficiary.
     *
     * @param int $id The ID of the beneficiary whose youth enterprise details are being viewed.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
    // Fetch youth enterprise record linked to the given beneficiary ID
    $youth = Youth::where('beneficiary_id', $id)->first();

    // Fetch the beneficiary details
    $beneficiary = Beneficiary::find($id);

    // Redirect if beneficiary does not exist
    if (!$beneficiary) {
        return redirect()->route('youth.index')->with('error', 'Beneficiary not found.');
    }

    // ✅ Decode all JSON fields if youth record exists
    if ($youth) {
        $youth->asset_details = $youth->asset_details ? json_decode($youth->asset_details, true) : [];
        $youth->youth_contributions = $youth->youth_contributions ? json_decode($youth->youth_contributions, true) : [];
        $youth->promoter_contributions = $youth->promoter_contributions ? json_decode($youth->promoter_contributions, true) : [];
        $youth->grant_details = $youth->grant_details ? json_decode($youth->grant_details, true) : [];
        $youth->installment_payments = $youth->installment_payments ? json_decode($youth->installment_payments, true) : [];
    }

    // Load the view with both youth data and beneficiary info
    return view('youth.youth_show', compact('youth', 'beneficiary'));
    }

    public function edit($id)
    {
        $youth = Youth::findOrFail($id);
        $beneficiary = $youth->beneficiary;
    
        // Decode JSON fields before passing to the view
        $youth->assets = json_decode($youth->asset_details, true) ?? [];
        $youth->youth_contributions = json_decode($youth->youth_contributions, true) ?? [];
        $youth->promoter_contributions = json_decode($youth->promoter_contributions, true) ?? [];
        $youth->grant_details = json_decode($youth->grant_details, true) ?? [];
        $youth->installment_payments = json_decode($youth->installment_payments, true) ?? [];
    
        return view('youth.youth_edit', compact('youth', 'beneficiary'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'enterprise_name' => 'required|string|max:255',
        'registration_number' => 'nullable|string|max:255',
        'institute_of_registration' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:500',
        'email' => 'nullable|email|max:255',
        'phone_number' => 'nullable|string|max:20',
        'website_name' => 'nullable|string|max:255',
        'description_of_certificates' => 'nullable|string',
        'nature_of_business' => 'nullable|string',
        'products_available' => 'nullable|string',
        'yield_collection_details' => 'nullable|string',
        'marketing_information' => 'nullable|string',
        'list_of_distributors' => 'nullable|string',

        'business_plan' => 'nullable|mimes:pdf|max:2048',

        // Credit detail fields
        'bank_name' => 'nullable|string',
        'branch' => 'nullable|string',
        'account_number' => 'nullable|string',
        'interest_rate' => 'nullable|numeric',
        'credit_issue_date' => 'nullable|date',
        'loan_installment_date' => 'nullable|date',
        'credit_amount' => 'nullable|numeric',
        'number_of_installments' => 'nullable|integer',
        'installment_due_date' => 'nullable|date',

        // Credit balance
        'credit_balance_date' => 'nullable|date',
        'credit_balance_value' => 'nullable|numeric',
    ]);

    $youth = Youth::findOrFail($id);

    // Assign basic inputs directly
    $youth->enterprise_name = $request->enterprise_name;
    $youth->registration_number = $request->registration_number;
    $youth->institute_of_registration = $request->institute_of_registration;
    $youth->address = $request->address;
    $youth->email = $request->email;
    $youth->phone_number = $request->phone_number;
    $youth->website_name = $request->website_name;
    $youth->description_of_certificates = $request->description_of_certificates;
    $youth->nature_of_business = $request->nature_of_business;
    $youth->products_available = $request->products_available;
    $youth->yield_collection_details = $request->yield_collection_details;
    $youth->marketing_information = $request->marketing_information;
    $youth->list_of_distributors = $request->list_of_distributors;

    // Credit details
    $youth->bank_name = $request->bank_name;
    $youth->branch = $request->branch;
    $youth->account_number = $request->account_number;
    $youth->interest_rate = $request->interest_rate;
    $youth->credit_issue_date = $request->credit_issue_date;
    $youth->loan_installment_date = $request->loan_installment_date;
    $youth->credit_amount = $request->credit_amount;
    $youth->number_of_installments = $request->number_of_installments;
    $youth->installment_due_date = $request->installment_due_date;

    // Credit balance
    $youth->credit_balance_date = $request->credit_balance_date;
    $youth->credit_balance_value = $request->credit_balance_value;

    // Encode dynamic JSON arrays
    $youth->asset_details = json_encode($this->formatJsonInput($request, 'asset_details', ['asset_name', 'asset_value']));
    $youth->youth_contributions = json_encode($this->formatJsonInput($request, 'youth_contributions', ['date', 'description', 'value']));
    $youth->promoter_contributions = json_encode($this->formatJsonInput($request, 'promoter_contributions', ['date', 'description', 'value']));
    $youth->grant_details = json_encode($this->formatJsonInput($request, 'grant_details', ['date', 'description', 'value', 'grant_issued_by']));
    $youth->installment_payments = json_encode($this->formatJsonInput($request, 'installment_payments', ['installment_payment_date', 'installment_payment_value']));

    // Handle PDF re-upload
    if ($request->hasFile('business_plan')) {
        $file = $request->file('business_plan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/youth_business_plans'), $filename);
        $youth->business_plan = 'uploads/youth_business_plans/' . $filename;
    }

    $youth->save();

    return redirect()->route('youth.show', $youth->beneficiary_id)->with('success', 'Youth Enterprise updated successfully.');

}


    private function formatJsonInput(Request $request, $inputName, $fields)
{
    $inputData = $request->input($inputName);
    $formatted = [];

    if ($inputData && is_array($inputData[$fields[0]] ?? null)) {
        $count = count($inputData[$fields[0]]);
        for ($i = 0; $i < $count; $i++) {
            $entry = [];
            foreach ($fields as $field) {
                $entry[$field] = $inputData[$field][$i] ?? null;
            }
            $formatted[] = $entry;
        }
    }

    return $formatted;
}


        /**
     * Remove the specified Youth Enterprise record from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the record or fail if not found
        $youth = Youth::findOrFail($id);

        // Delete the uploaded business plan file if it exists
        if ($youth->business_plan && \Storage::disk('public')->exists($youth->business_plan)) {
            \Storage::disk('public')->delete($youth->business_plan);
        }

        // Delete the record from the database
        $youth->delete();

        return redirect()->route('youth.index')->with('success', 'Youth enterprise record deleted successfully.');
    }


}
