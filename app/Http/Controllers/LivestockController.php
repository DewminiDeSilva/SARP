<?php
namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\LiveProduct;
use App\Models\LiveFarmerContribution;
use App\Models\LivePromoterContribution;
use App\Models\LiveGrantDetail;
use App\Models\LiveInstallmentPayment;
use App\Models\Beneficiary;
use Illuminate\Http\Request;


class LivestockController extends Controller
{
    public function listLivestock(Request $request)
    {
        $beneficiary_id = $request->route('beneficiary_id');
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);

        $livestocks = Livestock::with([
            'liveProducts',
            'farmerContributions',
            'promoterContributions',
            'grantDetails',
            'installmentPayments'
        ])->where('beneficiary_id', $beneficiary_id)->get();

        return view('livestock.livestock_index', compact('livestocks', 'beneficiary'));
    }


    // Method to show the form to create a new livestock record
    public function create(Request $request, $beneficiary_id)
{
    // Fetch the beneficiary data based on the ID
    $beneficiary = Beneficiary::findOrFail($beneficiary_id);

    // Check if the beneficiary has livestock-related data
    if ($beneficiary->input1 === 'livestock') {
        $livestockType = $beneficiary->input2; // Livestock type
        $productionFocus = $beneficiary->input3; // Production focus
    } else {
        $livestockType = null;
        $productionFocus = null;
    }

    // Pass the beneficiary and pre-filled data to the view
    return view('livestock.livestock_create', compact('beneficiary', 'livestockType', 'productionFocus'));
}



    // Method to store a new livestock record in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'livestock_type' => 'required',
            'production_focus' => 'required',
            'livestock_commencement_date' => 'required|date',
            'number_of_livestocks' => 'required|integer',
            'area_of_cade' => 'required|numeric',
           'livestock_value' => 'required|numeric|min:0',

            'bank_name' => 'nullable|string',
            'branch' => 'nullable|string',
            'account_number' => 'nullable|string',
            'interest_rate' => 'nullable|numeric',
            'credit_issue_date' => 'nullable|date',
            'loan_installment_date' => 'nullable|date',
            'credit_amount' => 'nullable|numeric',
            'number_of_installments' => 'nullable|integer',
            'installment_due_date' => 'nullable|date',
            'credit_balance_no' => 'nullable|string',
            'credit_balance_date' => 'nullable|date',
            'credit_balance_value' => 'nullable|numeric',

           // Products
'product_name.*' => 'nullable|string|max:255',
'total_production.*' => 'nullable|numeric|min:0',
'total_income.*' => 'nullable|numeric|min:0',
'profit.*' => 'nullable|numeric|min:0',

// Farmer Contributions
'farmer_date.*' => 'nullable|date',
'farmer_description.*' => 'nullable|string|max:255',
'farmer_value.*' => 'nullable|numeric|min:0',

// Promoter Contributions
'promoter_date.*' => 'nullable|date',
'promoter_description.*' => 'nullable|string|max:255',
'promoter_value.*' => 'nullable|numeric|min:0',

// Grant Details
'grant_date.*' => 'nullable|date',
'grant_description.*' => 'nullable|string|max:255',
'grant_value.*' => 'nullable|numeric|min:0',
'grant_issued_by.*' => 'nullable|string|max:255',

// Installment Payments
'installment_payment_date.*' => 'nullable|date',
'installment_payment_value.*' => 'nullable|numeric|min:0',

        ]);

        // Retrieve the beneficiary to get the GN division name
        $beneficiary = Beneficiary::findOrFail($validatedData['beneficiary_id']);
        $validatedData['gn_division_name'] = $beneficiary->gn_division_name;
        // Fix the column mapping
            $validatedData['value'] = $validatedData['livestock_value'];
            unset($validatedData['livestock_value']);
        // Create the livestock record
        $livestock = Livestock::create($validatedData);
// Store Live Products
        foreach ($request->product_name ?? [] as $i => $name) {
            LiveProduct::create([
                'livestock_id' => $livestock->id,
                'product_name' => $name,
                'total_production' => $request->total_production[$i] ?? 0,
                'total_income' => $request->total_income[$i] ?? 0,
                'profit' => $request->profit[$i] ?? 0,
            ]);
        }

        // Farmer Contributions
        foreach ($request->farmer_date ?? [] as $i => $date) {
            LiveFarmerContribution::create([
                'livestock_id' => $livestock->id,
                'date' => $date,
                'description' => $request->farmer_description[$i] ?? null,
                'value' => $request->farmer_value[$i] ?? null,
            ]);
        }

        // Promoter Contributions
        foreach ($request->promoter_date ?? [] as $i => $date) {
            LivePromoterContribution::create([
                'livestock_id' => $livestock->id,
                'date' => $date,
                'description' => $request->promoter_description[$i] ?? null,
                'value' => $request->promoter_value[$i] ?? null,
            ]);
        }

        // Grant Details
        foreach ($request->grant_date ?? [] as $i => $date) {
            LiveGrantDetail::create([
                'livestock_id' => $livestock->id,
                'date' => $date,
                'description' => $request->grant_description[$i] ?? null,
                'value' => $request->grant_value[$i] ?? null,
                'grant_issued_by' => $request->grant_issued_by[$i] ?? null,
            ]);
        }

        // Installment Payments
        foreach ($request->installment_payment_date ?? [] as $i => $date) {
            LiveInstallmentPayment::create([
                'livestock_id' => $livestock->id,
                'installment_payment_date' => $date,
                'installment_payment_value' => $request->installment_payment_value[$i] ?? null,
            ]);
        }

        return redirect()->route('livestocks.list', ['beneficiary_id' => $request->beneficiary_id])
            ->with('success', 'Livestock record created successfully!');
    }

    // Method to retrieve GN division name via AJAX
    public function getGnDivisionName(Request $request, $beneficiary_id)
    {
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);
        return response()->json(['gn_division_name' => $beneficiary->gn_division_name]);
    }

    // Method to show a list of livestock records for a specific beneficiary
    public function showLivestockList(Request $request)
    {
        $beneficiary_id = $request->get('beneficiary_id');
        $livestocks = Livestock::where('beneficiary_id', $beneficiary_id)->get();

        return view('livestock.livestock_index', compact('livestocks', 'beneficiary_id'));
    }

    // Method to show the form to edit an existing livestock record
   public function edit($beneficiary_id, $livestock_id)
    {
        $livestock = Livestock::with([
            'liveProducts',
            'farmerContributions',
            'promoterContributions',
            'grantDetails',
            'installmentPayments'
        ])->where('id', $livestock_id)
          ->where('beneficiary_id', $beneficiary_id)
          ->firstOrFail();

        return view('livestock.livestock_edit', compact('livestock', 'beneficiary_id'));
    }

    // Method to update an existing livestock record
    public function update(Request $request, $beneficiary_id, $livestock_id)
{
    $livestock = Livestock::where('id', $livestock_id)
                          ->where('beneficiary_id', $beneficiary_id)
                          ->firstOrFail();

        $validatedData = $request->validate([
             
            'livestock_type' => 'required',
            'production_focus' => 'required',
            'livestock_commencement_date' => 'required|date',
            'number_of_livestocks' => 'required|integer',
            'area_of_cade' => 'required|numeric',
            'livestock_value' => 'required|numeric|min:0',

            'bank_name' => 'nullable|string',
            'branch' => 'nullable|string',
            'account_number' => 'nullable|string',
            'interest_rate' => 'nullable|numeric',
            'credit_issue_date' => 'nullable|date',
            'loan_installment_date' => 'nullable|date',
            'credit_amount' => 'nullable|numeric',
            'number_of_installments' => 'nullable|integer',
            'installment_due_date' => 'nullable|date',
            'credit_balance_no' => 'nullable|string',
            'credit_balance_date' => 'nullable|date',
            'credit_balance_value' => 'nullable|numeric',

            // Products
        'product_name.*' => 'nullable|string|max:255',
        'total_production.*' => 'nullable|numeric|min:0',
        'total_income.*' => 'nullable|numeric|min:0',
        'profit.*' => 'nullable|numeric|min:0',

        // Farmer Contributions
        'farmer_date.*' => 'nullable|date',
        'farmer_description.*' => 'nullable|string|max:255',
        'farmer_value.*' => 'nullable|numeric|min:0',

        // Promoter Contributions
        'promoter_date.*' => 'nullable|date',
        'promoter_description.*' => 'nullable|string|max:255',
        'promoter_value.*' => 'nullable|numeric|min:0',

        // Grant Details
        'grant_date.*' => 'nullable|date',
        'grant_description.*' => 'nullable|string|max:255',
        'grant_value.*' => 'nullable|numeric|min:0',
        'grant_issued_by.*' => 'nullable|string|max:255',

        // Installment Payments
        'installment_payment_date.*' => 'nullable|date',
        'installment_payment_value.*' => 'nullable|numeric|min:0',

            ]);

        $livestock->update($validatedData);

        // Update related products (if applicable)
        $livestock->liveProducts()->delete(); // Delete all existing products
         $livestock->farmerContributions()->delete();
        $livestock->promoterContributions()->delete();
        $livestock->grantDetails()->delete();
        $livestock->installmentPayments()->delete();
        // Re-create live products
    foreach ($request->product_name ?? [] as $i => $name) {
        \App\Models\LiveProduct::create([
            'livestock_id' => $livestock->id,
            'product_name' => $name,
            'total_production' => $request->total_production[$i] ?? 0,
            'total_income' => $request->total_income[$i] ?? 0,
            'profit' => $request->profit[$i] ?? 0,
        ]);
    }

    // Farmer Contributions
    foreach ($request->farmer_date ?? [] as $i => $date) {
        \App\Models\LiveFarmerContribution::create([
            'livestock_id' => $livestock->id,
            'date' => $date,
            'description' => $request->farmer_description[$i] ?? null,
            'value' => $request->farmer_value[$i] ?? null,
        ]);
    }

    // Promoter Contributions
    foreach ($request->promoter_date ?? [] as $i => $date) {
        \App\Models\LivePromoterContribution::create([
            'livestock_id' => $livestock->id,
            'date' => $date,
            'description' => $request->promoter_description[$i] ?? null,
            'value' => $request->promoter_value[$i] ?? null,
        ]);
    }

    // Grant Details
    foreach ($request->grant_date ?? [] as $i => $date) {
        \App\Models\LiveGrantDetail::create([
            'livestock_id' => $livestock->id,
            'date' => $date,
            'description' => $request->grant_description[$i] ?? null,
            'value' => $request->grant_value[$i] ?? null,
            'grant_issued_by' => $request->grant_issued_by[$i] ?? null,
        ]);
    }

    // Installment Payments
    foreach ($request->installment_payment_date ?? [] as $i => $date) {
        \App\Models\LiveInstallmentPayment::create([
            'livestock_id' => $livestock->id,
            'installment_payment_date' => $date,
            'installment_payment_value' => $request->installment_payment_value[$i] ?? null,
        ]);
    }

    return redirect()->route('livestocks.list', ['beneficiary_id' => $beneficiary_id])
        ->with('success', 'Livestock record updated successfully!');
}
    // Method to delete a livestock record
    public function destroy($livestock_id)
    {
        $livestock = Livestock::findOrFail($livestock_id);
        $beneficiary_id = $livestock->beneficiary_id;

        // Delete related records (products and contributions)
        $livestock->liveProducts()->delete();
        $livestock->farmerContributions()->delete();
        $livestock->promoterContributions()->delete();
        $livestock->grantDetails()->delete();
        $livestock->installmentPayments()->delete();
        $livestock->delete();

        return redirect()->route('livestocks.list', ['beneficiary_id' => $beneficiary_id])
            ->with('success', 'Livestock record deleted successfully!');
    }

    public function getProductionFocusByLivestockType($type)
    {
        try {
            $options = [];

            switch ($type) {
                case 'Dairy':
                    $options = \App\Models\Dairy::select('id', 'dairy_name as name')
                        ->orderBy('name')
                        ->get();
                    break;
                case 'Poultry':
                    $options = \App\Models\Poultary::select('id', 'poultary_name as name')
                        ->orderBy('name')
                        ->get();
                    break;
                case 'Goat Rearing':
                    $options = \App\Models\Goat::select('id', 'goat_name as name')
                        ->orderBy('name')
                        ->get();
                    break;
                case 'Aqua Culture':
                    $options = \App\Models\AquaCulture::select('id', 'aquaculture_name as name')
                        ->orderBy('name')
                        ->get();
                    break;
                default:
                    return response()->json(['error' => 'Invalid livestock type'], 400);
            }

            return response()->json($options);
        } catch (\Exception $e) {
            \Log::error('Error fetching production focus: ' . $e->getMessage());
            return response()->json(['error' => 'Server error while fetching production focus'], 500);
        }
    }

    public function searchLivestock(Request $request)
    {
        $search = $request->input('search'); // Get the search query

        // Search in Beneficiary fields where input1 is 'livestock'
        $beneficiariesQuery = Beneficiary::select(
            'id',
            'nic',
            'name_with_initials',
            'address',
            'gn_division_name',
            'gender',
            'dob',
            'age',
            'phone',
            'input2 as livestock_type',
            'input3 as production_focus'
        )
        ->where('input1', 'livestock')
        ->where(function ($query) use ($search) {
            $query->where('nic', 'like', "%$search%")
                  ->orWhere('name_with_initials', 'like', "%$search%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('gn_division_name', 'like', "%{$search}%")
                  ->orWhere('gender', '=', $search) // Exact match for gender
                  ->orWhere('dob', 'like', '%'.$search.'%')
                  ->orWhere('age', 'like', '%'.$search.'%')
                  ->orWhere('phone', 'like', '%'.$search.'%')
                  ->orWhere('input2', 'like', "%{$search}%") // Search in input2 (livestock_type)
                  ->orWhere('input3', 'like', "%{$search}%"); // Search in input3 (production_focus)
        });

        // Paginate the filtered beneficiaries
        $beneficiaries = $beneficiariesQuery->paginate(10);

        // Calculate summary statistics based on the filtered query
        $totalLivestocks = Livestock::whereIn('beneficiary_id', $beneficiariesQuery->pluck('id'))->count(); // Livestocks related to filtered beneficiaries
        $totalBeneficiaries = $beneficiariesQuery->count(); // Filtered beneficiaries count
        $totalGnDivisions = $beneficiariesQuery->distinct('gn_division_name')->count('gn_division_name'); // Filtered distinct GN Divisions

        // Return the view with data
        return view('beneficiary.beneficiary_list', compact(
            'beneficiaries',
            'search',
            'totalLivestocks',
            'totalBeneficiaries',
            'totalGnDivisions'
        ));
    }






}
