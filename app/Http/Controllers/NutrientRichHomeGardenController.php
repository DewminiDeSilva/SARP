<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\NutrientHomeGarden;
use Illuminate\Support\Facades\DB;

class NutrientRichHomeGardenController extends Controller
{
    public function index(Request $request)
    {
        $query = Beneficiary::where('input1', 'agriculture');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_with_initials', 'like', "%{$search}%")
                  ->orWhere('nic', 'like', "%{$search}%")
                  ->orWhere('district', 'like', "%{$search}%");
            });
        }

        $beneficiaries = $query->get();
        $homeGardens = NutrientHomeGarden::all()->keyBy('beneficiary_id');

        return view('nutrient_home.nutritionrich_homegarden_index', compact('beneficiaries', 'homeGardens'));
    }

    public function create($beneficiaryId)
    {
        $beneficiary = Beneficiary::findOrFail($beneficiaryId);
        $cropCategory = $beneficiary->input2 ?? '';
        $cropName = $beneficiary->input3 ?? '';

        return view('nutrient_home.nutritionrich_homegarden_create', compact('beneficiary', 'cropName', 'cropCategory'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'crop_name' => 'required|string|max:255',
            'production_focus' => 'nullable|string|max:255',
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric',
            'total_livestock_area' => 'nullable|numeric',
            'total_cost' => 'nullable|numeric',
            'beneficiary_id' => 'required|exists:beneficiaries,id',
        ]);

        DB::beginTransaction();
        try {
            $beneficiary = Beneficiary::findOrFail($request->beneficiary_id);

            $farmerContributions = collect($request->farmer_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->farmer_contribution[$i],
                    'value' => $request->farmer_cost[$i],
                ];
            });

            $promoterContributions = collect($request->promoter_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->promoter_description[$i],
                    'value' => $request->promoter_cost[$i],
                ];
            });

            $grantDetails = collect($request->grant_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->grant_description[$i],
                    'value' => $request->grant_value[$i],
                    'issued_by' => $request->grant_issued_by[$i],
                ];
            });

            $products = collect($request->input('agriculture_products.product_name'))->map(function ($name, $i) use ($request) {
                return [
                    'product_name' => $name,
                    'total_production' => $request->input('agriculture_products.total_production')[$i],
                    'total_income' => $request->input('agriculture_products.total_income')[$i],
                    'profit' => $request->input('agriculture_products.profit')[$i],
                ];
            });

            $creditPayments = collect($request->payment_date)->map(function ($date, $i) use ($request) {
                return [
                    'payment_date' => $date,
                    'payment_value' => $request->installment_payment[$i],
                ];
            });

            $homeGarden = NutrientHomeGarden::create([
                'beneficiary_id' => $beneficiary->id,
                'crop_name' => $request->crop_name,
                'production_focus' => $request->production_focus,
                'planting_date' => $request->planting_date,
                'total_acres' => $request->total_acres,
                'total_livestock_area' => $request->total_livestock_area,
                'total_cost' => $request->total_cost,

                'farmer_contributions' => $farmerContributions,
                'promoter_contributions' => $promoterContributions,
                'grant_details' => $grantDetails,
                'credit_payments' => $creditPayments,
                'agriculture_products' => $products,

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

            DB::commit();
            return redirect()->route('nutrient-home.index')->with('success', 'Data saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $homeGarden = NutrientHomeGarden::findOrFail($id);
        $beneficiary = Beneficiary::findOrFail($homeGarden->beneficiary_id);
        $homeGardens = NutrientHomeGarden::where('beneficiary_id', $beneficiary->id)->get();

        return view('nutrient_home.nutritionrich_homegarden_show', compact('beneficiary', 'homeGardens'));
    }

    public function edit($id)
    {
        $homeGarden = NutrientHomeGarden::findOrFail($id);
        $beneficiary = Beneficiary::findOrFail($homeGarden->beneficiary_id);

        return view('nutrient_home.nutritionrich_homegarden_edit', compact('homeGarden', 'beneficiary'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'crop_name' => 'required|string|max:255',
            'production_focus' => 'nullable|string|max:255',
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric',
            'total_livestock_area' => 'nullable|numeric',
            'total_cost' => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {
            $homeGarden = NutrientHomeGarden::findOrFail($id);

            $farmerContributions = collect($request->farmer_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->farmer_contribution[$i],
                    'value' => $request->farmer_cost[$i],
                ];
            });

            $promoterContributions = collect($request->promoter_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->promoter_description[$i],
                    'value' => $request->promoter_cost[$i],
                ];
            });

            $grantDetails = collect($request->grant_date)->map(function ($date, $i) use ($request) {
                return [
                    'date' => $date,
                    'description' => $request->grant_description[$i],
                    'value' => $request->grant_value[$i],
                    'issued_by' => $request->grant_issued_by[$i],
                ];
            });

            $products = collect($request->input('agriculture_products.product_name'))->map(function ($name, $i) use ($request) {
                return [
                    'product_name' => $name,
                    'total_production' => $request->input('agriculture_products.total_production')[$i],
                    'total_income' => $request->input('agriculture_products.total_income')[$i],
                    'profit' => $request->input('agriculture_products.profit')[$i],
                ];
            });

            $creditPayments = collect($request->payment_date)->map(function ($date, $i) use ($request) {
                return [
                    'payment_date' => $date,
                    'payment_value' => $request->installment_payment[$i],
                ];
            });

            $homeGarden->update([
                'crop_name' => $request->crop_name,
                'production_focus' => $request->production_focus,
                'planting_date' => $request->planting_date,
                'total_acres' => $request->total_acres,
                'total_livestock_area' => $request->total_livestock_area,
                'total_cost' => $request->total_cost,

                'farmer_contributions' => $farmerContributions,
                'promoter_contributions' => $promoterContributions,
                'grant_details' => $grantDetails,
                'credit_payments' => $creditPayments,
                'agriculture_products' => $products,

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

            DB::commit();
            return redirect()->route('nutrient-home.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Update failed: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $homeGarden = NutrientHomeGarden::findOrFail($id);
            $homeGarden->delete();

            return redirect()->route('nutrient-home.index')->with('success', 'Record deleted.');
        } catch (\Exception $e) {
            return back()->withErrors('Delete failed: ' . $e->getMessage());
        }
    }
}
