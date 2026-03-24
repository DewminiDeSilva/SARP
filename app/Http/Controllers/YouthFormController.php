<?php

namespace App\Http\Controllers;

use App\Models\YouthBeneficiaryForm;
use App\Models\YouthFarmerContribution;
use App\Models\YouthPromoterContribution;
use App\Models\YouthGrantDetail;
use App\Models\YouthCreditDetail;
use App\Models\YouthCreditPayment;
use App\Models\YouthAgricultureProduct;
use App\Models\Beneficiary;
use Illuminate\Http\Request;

class YouthFormController extends Controller
{
    public function create($beneficiary_id)
    {
        $beneficiary = Beneficiary::with('youthProposal')->findOrFail($beneficiary_id);
        if (!$beneficiary->youth_proposal_id) {
            return redirect()->back()->with('error', 'This beneficiary is not linked to a youth proposal.');
        }
        $proposal = $beneficiary->youthProposal;
        $youthCategory = $beneficiary->input3 ?? $proposal->business_title ?? $proposal->organization_name ?? '';
        $youthBusinessTitle = $proposal->business_title ?? $proposal->organization_name ?? '';

        $planting_date = old('planting_date');
        $total_acres = old('total_acres');
        $total_livestock_area = old('total_livestock_area');
        $total_cost = old('total_cost');

        return view('youth_form.youth_beneficiary_create', compact(
            'beneficiary',
            'youthCategory',
            'youthBusinessTitle',
            'planting_date',
            'total_acres',
            'total_livestock_area',
            'total_cost'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'youth_business_title' => 'nullable|string|max:255',
            'youth_category' => 'nullable|string|max:255',
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric',
            'total_livestock_area' => 'nullable|numeric',
            'total_cost' => 'nullable|numeric',
        ]);

        $youth = YouthBeneficiaryForm::create([
            'beneficiary_id' => $request->beneficiary_id,
            'youth_business_title' => $request->youth_business_title,
            'youth_category' => $request->youth_category,
            'planting_date' => $request->planting_date,
            'total_acres' => $request->total_acres,
            'total_livestock_area' => $request->total_livestock_area,
            'total_cost' => $request->total_cost,
            'gn_division_name' => $request->gn_division_name,
        ]);

        if ($request->farmer_contribution) {
            foreach ($request->farmer_contribution as $index => $contribution) {
                YouthFarmerContribution::create([
                    'youth_beneficiary_form_id' => $youth->id,
                    'farmer_contribution' => $contribution,
                    'cost' => $request->cost[$index] ?? null,
                    'date' => $request->farmer_date[$index] ?? null,
                ]);
            }
        }

        if ($request->promoter_description) {
            foreach ($request->promoter_description as $index => $desc) {
                YouthPromoterContribution::create([
                    'youth_beneficiary_form_id' => $youth->id,
                    'description' => $desc,
                    'cost' => $request->promoter_cost[$index] ?? null,
                    'date' => $request->promoter_date[$index] ?? null,
                ]);
            }
        }

        if ($request->grant_description) {
            foreach ($request->grant_description as $index => $desc) {
                YouthGrantDetail::create([
                    'youth_beneficiary_form_id' => $youth->id,
                    'description' => $desc,
                    'value' => $request->grant_value[$index] ?? null,
                    'date' => $request->grant_date[$index] ?? null,
                    'grant_issued_by' => $request->grant_issued_by[$index] ?? null,
                ]);
            }
        }

        $credit = YouthCreditDetail::create([
            'youth_beneficiary_form_id' => $youth->id,
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

        if ($request->payment_date) {
            foreach ($request->payment_date as $index => $date) {
                YouthCreditPayment::create([
                    'youth_credit_detail_id' => $credit->id,
                    'payment_date' => $date,
                    'installment_payment' => $request->installment_payment[$index] ?? null,
                ]);
            }
        }

        if ($request->product_name) {
            foreach ($request->product_name as $index => $name) {
                YouthAgricultureProduct::create([
                    'youth_beneficiary_form_id' => $youth->id,
                    'product_name' => $name,
                    'total_production' => $request->total_production[$index] ?? null,
                    'total_income' => $request->total_income[$index] ?? null,
                    'profit' => $request->profit[$index] ?? null,
                    'buyer_details' => $request->buyer_details[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('youth-proposal.agreementSigned')->with('success', 'Youth data saved successfully.');
    }

    public function show($beneficiary_id)
    {
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);
        $youthData = YouthBeneficiaryForm::with([
            'farmerContributions',
            'promoterContributions',
            'grantDetails',
            'creditDetail.creditPayments',
            'agricultureProducts',
        ])->where('beneficiary_id', $beneficiary_id)->get();

        return view('youth_form.youth_beneficiary_show', compact('beneficiary', 'youthData'));
    }
}
