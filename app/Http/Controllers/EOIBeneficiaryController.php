<?php

namespace App\Http\Controllers;

use App\Models\EOIBeneficiaryForm;
use App\Models\EOIFarmerContribution;
use App\Models\EOIPromoterContribution;
use App\Models\EOIGrantDetail;
use App\Models\EOICreditDetail;
use App\Models\EOICreditPayment;
use App\Models\EOIAgricultureProduct;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EOIBeneficiaryController extends Controller
{
    public function create($beneficiary_id)
{
    $beneficiary = Beneficiary::findOrFail($beneficiary_id);
    $expressionId = $beneficiary->expression_id;
    

    $eoiCategory = $beneficiary->eoi_category ?? ''; // or whatever field holds the EOI Category
    $eoiBusinessTitle = $beneficiary->eoi_business_title ?? ''; // adjust as per your DB

    return view('eoi_form.eoi_beneficiary_create', compact(
        'beneficiary',
        'eoiCategory',
        'eoiBusinessTitle',
        'expressionId'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'eoi_business_title' => $request->eoi_business_title, 
            'eoi_category' => $request->eoi_category,          
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric',
            'total_livestock_area' => 'nullable|numeric',
            'total_cost' => 'nullable|numeric',
        ]);

        // Save EOI beneficiary data
        $eoi = EOIBeneficiaryForm::create([
            'beneficiary_id' => $request->beneficiary_id,
            'planting_date' => $request->planting_date,
            'total_acres' => $request->total_acres,
            'total_livestock_area' => $request->total_livestock_area,
            'total_cost' => $request->total_cost,
            'gn_division_name' => $request->gn_division_name,
        ]);

        // Farmer Contributions
        if ($request->farmer_contribution) {
            foreach ($request->farmer_contribution as $index => $contribution) {
                EOIFarmerContribution::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'farmer_contribution' => $contribution,
                    'cost' => $request->cost[$index],
                    'date' => $request->farmer_date[$index],
                ]);
            }
        }

        // Promoter Contributions
        if ($request->promoter_description) {
            foreach ($request->promoter_description as $index => $desc) {
                EOIPromoterContribution::create([
                   'eoi_beneficiary_form_id' => $eoi->id,
                    'description' => $desc,
                    'cost' => $request->promoter_cost[$index],
                    'date' => $request->promoter_date[$index],
                ]);
            }
        }

        // Grant Details
        if ($request->grant_description) {
            foreach ($request->grant_description as $index => $desc) {
                EOIGrantDetail::create([
                'eoi_beneficiary_form_id' => $eoi->id,
                    'description' => $desc,
                    'value' => $request->grant_value[$index],
                    'date' => $request->grant_date[$index],
                    'grant_issued_by' => $request->grant_issued_by[$index],
                ]);
            }
        }

        // Credit Details (single)
        $credit = EOICreditDetail::create([
           'eoi_beneficiary_form_id' => $eoi->id,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'account_number' => $request->account_number,
            'interest_rate' => $request->interest_rate,
            'credit_issue_date' => $request->credit_issue_date,
            'loan_installment_date' => $request->loan_installment_date,
            'credit_amount' => $request->credit_amount,
            'number_of_installments' => $request->number_of_installments,
            'installment_due_date' => $request->installment_due_date,
            'credit_balance_on_date' => $request->credit_balance_on_date,
            'credit_balance' => $request->credit_balance,
        ]);

        // Credit Payments (multiple)
        if ($request->payment_date) {
            foreach ($request->payment_date as $index => $date) {
                EOICreditPayment::create([
                    'eoi_credit_detail_id' => $credit->id,
                    'payment_date' => $date,
                    'installment_payment' => $request->installment_payment[$index],
                ]);
            }
        }

        // Agriculture Products
        if ($request->product_name) {
            foreach ($request->product_name as $index => $name) {
                EOIAgricultureProduct::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'product_name' => $name,
                    'total_production' => $request->total_production[$index],
                    'total_income' => $request->total_income[$index],
                    'profit' => $request->profit[$index],
                    'buyer_details' => $request->buyer_details[$index],
                ]);
            }
        }

        return redirect()->route('beneficiary.index')->with('success', 'EOI Beneficiary details saved successfully.');
    }
//     public function show($id)
// {
//     // Load EOI form with all relationships
//     $eoi = EOIBeneficiaryForm::with([
//         'farmerContributions',
//         'promoterContributions',
//         'grantDetails',
//         'creditDetail.creditPayments',
//         'agricultureProducts',
//         'beneficiary' // assuming there's a 'beneficiary' relationship
//     ])->findOrFail($id);

//     return view('eoi_form.eoi_beneficiary_show', [
//         'data' => $eoi,
//         'beneficiary' => $eoi->beneficiary,
//     ]);
// }
public function show($beneficiaryId)
{
    $beneficiary = Beneficiary::findOrFail($beneficiaryId);

    $eoiData = EOIBeneficiaryForm::with([
        'farmerContributions',
        'promoterContributions',
        'grantDetails',
        'creditDetail.creditPayments',
        'agricultureProducts'
    ])->where('beneficiary_id', $beneficiaryId)->get();

    return view('eoi_form.eoi_beneficiary_show', compact('beneficiary', 'eoiData'));
}


// public function edit($id)
// {
//     $beneficiary = EOIBeneficiary::with([
//         'farmerContributions',
//         'promoterContributions',
//         'grantDetails',
//         'creditDetail.creditPayments',
//         'products'
//     ])->findOrFail($id);

//     return view('eoi_form.eoi_beneficiary_edit', compact('beneficiary'));
// }


   public function destroy($id)
{
    $eoi = EOIBeneficiaryForm::findOrFail($id);
    $eoi->delete();
    return redirect()->back()->with('success', 'EOI record deleted successfully.');
}

public function edit($id)
{
    $eoi = EOIBeneficiaryForm::with([
    'farmerContributions',
    'promoterContributions',
    'grantDetails',
    'creditDetail.creditPayments',  // fixed this line
    'agricultureProducts'
])->findOrFail($id);
    $beneficiary = Beneficiary::findOrFail($eoi->beneficiary_id);

    return view('eoi_form.eoi_beneficiary_edit', compact('eoi', 'beneficiary'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'planting_date' => 'required|date',
        'total_acres' => 'required|numeric',
        'gn_division_name' => 'nullable|string',
        'total_cost' => 'required|numeric',
    ]);

    DB::beginTransaction();
    try {
        $eoi = EOIBeneficiaryForm::findOrFail($id);
        $eoi->update([
            'planting_date' => $request->planting_date,
            'total_acres' => $request->total_acres,
            'gn_division_name' => $request->gn_division_name,
            'total_cost' => $request->total_cost,
        ]);

        // Delete existing related records
        EOIFarmerContribution::where('eoi_beneficiary_form_id', $eoi->id)->delete();
        EOIPromoterContribution::where('eoi_beneficiary_form_id', $eoi->id)->delete();
        EOIGrantDetail::where('eoi_beneficiary_form_id', $eoi->id)->delete();
        EOIAgricultureProduct::where('eoi_beneficiary_form_id', $eoi->id)->delete();
        EOICreditPayment::where('eoi_credit_detail_id', optional($eoi->creditDetail)->id)->delete();

        // Re-create Farmer Contributions
        if ($request->farmer_date) {
            foreach ($request->farmer_date as $i => $date) {
                EOIFarmerContribution::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'date' => $date,
                    'farmer_contribution' => $request->farmer_contribution[$i],
                    'cost' => $request->cost[$i],
                ]);
            }
        }

        // Re-create Promoter Contributions
        if ($request->promoter_date) {
            foreach ($request->promoter_date as $i => $date) {
                EOIPromoterContribution::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'date' => $date,
                    'description' => $request->promoter_description[$i],
                    'cost' => $request->promoter_cost[$i],
                ]);
            }
        }

        // Re-create Grant Details
        if ($request->grant_date) {
            foreach ($request->grant_date as $i => $date) {
                EOIGrantDetail::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'date' => $date,
                    'description' => $request->grant_description[$i],
                    'value' => $request->grant_value[$i],
                    'grant_issued_by' => $request->grant_issued_by[$i],
                ]);
            }
        }

        // Credit Detail
        if ($eoi->creditDetail) {
            $credit = $eoi->creditDetail;
            $credit->update([
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_number' => $request->account_number,
                'interest_rate' => $request->interest_rate,
                'credit_issue_date' => $request->credit_issue_date,
                'loan_installment_date' => $request->loan_installment_date,
                'credit_amount' => $request->credit_amount,
                'number_of_installments' => $request->number_of_installments,
                'installment_due_date' => $request->installment_due_date,
                'credit_balance_on_date' => $request->credit_balance_on_date,
                'credit_balance' => $request->credit_balance,
            ]);
        } else {
            $credit = EOICreditDetail::create([
                'eoi_beneficiary_form_id' => $eoi->id,
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_number' => $request->account_number,
                'interest_rate' => $request->interest_rate,
                'credit_issue_date' => $request->credit_issue_date,
                'loan_installment_date' => $request->loan_installment_date,
                'credit_amount' => $request->credit_amount,
                'number_of_installments' => $request->number_of_installments,
                'installment_due_date' => $request->installment_due_date,
                'credit_balance_on_date' => $request->credit_balance_on_date,
                'credit_balance' => $request->credit_balance,
            ]);
        }

        // Credit Payments
        if ($request->payment_date) {
            foreach ($request->payment_date as $i => $date) {
                EOICreditPayment::create([
                    'eoi_credit_detail_id' => $credit->id,
                    'payment_date' => $date,
                    'installment_payment' => $request->installment_payment[$i],
                ]);
            }
        }

        // Agriculture Products
        if ($request->product_name) {
            foreach ($request->product_name as $i => $name) {
                EOIAgricultureProduct::create([
                    'eoi_beneficiary_form_id' => $eoi->id,
                    'product_name' => $name,
                    'total_production' => $request->total_production[$i],
                    'total_income' => $request->total_income[$i],
                    'profit' => $request->profit[$i],
                    'buyer_details' => $request->buyer_details[$i],
                ]);
            }
        }

        DB::commit();
        return redirect()->route('eoi_form.show', $eoi->beneficiary_id)->with('success', 'EOI record updated successfully.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Update failed: ' . $e->getMessage());
    }
}

}
