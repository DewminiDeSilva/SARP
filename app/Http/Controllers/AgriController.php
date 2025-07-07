<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\AgricultureData;
use App\Models\AgriFarmerContribution;
use App\Models\AgriculturProduct;
use App\Models\Vegitable;
use App\Models\Fruit;
use App\Models\HomeGarden;
use App\Models\PromoterContribution;
use App\Models\GrantDetail;
use App\Models\CreditDetail;
use App\Models\CreditPayment;
use Illuminate\Support\Facades\DB;

class AgriController extends Controller
{
    
    public function index(Request $request)
{
    $entries = $request->get('entries', 10);
    $search = $request->input('search');

    // Fetch only beneficiaries where input1 is 'agriculture'
    $query = Beneficiary::where('input1', 'agriculture');

    // Apply search filter
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nic', 'like', "%{$search}%")
              ->orWhere('name_with_initials', 'like', "%{$search}%")
              ->orWhere('gn_division_name', 'like', "%{$search}%")
              ->orWhere('input3', 'like', "%{$search}%"); // Crop Name stored in input3
        });
    }

    $beneficiaries = $query->paginate($entries)->appends(['search' => $search]);

    // Agriculture Data Pagination
    $agricultureData = AgricultureData::latest()->paginate($entries)->appends(['entries' => $entries]);

    // Total Counts
    $totalAgricultureData = AgricultureData::count();
    $totalCrops = AgricultureData::distinct('crop_name')->count('crop_name');
    $totalBeneficiaries = Beneficiary::where('input1', 'agriculture')->count();
    $totalGnDivisions = AgricultureData::distinct('gn_division_name')->count('gn_division_name');

    return view('agriculture.agri_index', compact(
        'agricultureData', 
        'totalAgricultureData', 
        'entries', 
        'beneficiaries', 
        'totalCrops', 
        'totalBeneficiaries', 
        'totalGnDivisions', 
        'search'
    ));
}


    public function create($beneficiaryId = null)
    {
        $beneficiary = null;
        $cropCategory = ''; // input2
        $cropName = '';     // input3
    
        if ($beneficiaryId) {
            $beneficiary = Beneficiary::find($beneficiaryId);
    
            if (!$beneficiary) {
                return redirect()->route('agriculture.index')->withErrors('Beneficiary not found.');
            }
    
            // Retrieve input2 and input3
            $cropCategory = $beneficiary->input2 ?? 'Not Available'; // Crop Category
            $cropName = $beneficiary->input3 ?? 'Not Available';     // Crop Name
        }
    
        return view('agriculture.agri_create', compact('beneficiary', 'beneficiaryId', 'cropCategory', 'cropName'));
    }
    


public function store(Request $request)
    {
        $validatedData = $request->validate([
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric|min:0',
            'total_livestock_area' => 'nullable|numeric|min:0',
            'total_cost' => 'nullable|numeric|min:0',
            'gn_division_name' => 'nullable|string|max:255',
            'beneficiary_id' => 'required|exists:beneficiaries,id',

            'farmer_contribution.*' => 'nullable|string|max:255',
            'cost.*' => 'nullable|numeric|min:0',

            'product_name.*' => 'nullable|string|max:255',
            'total_production.*' => 'nullable|numeric|min:0',
            'total_income.*' => 'nullable|numeric|min:0',
            'profit.*' => 'nullable|numeric',
        ]);

        DB::beginTransaction();

        try {
            $beneficiary = Beneficiary::findOrFail($request->beneficiary_id);
            $validatedData['category'] = $beneficiary->input2 ?? 'N/A';
            $validatedData['crop_name'] = $beneficiary->input3 ?? 'N/A';

            $agricultureData = AgricultureData::create([
                'category' => $validatedData['category'],
                'crop_name' => $validatedData['crop_name'],
                'planting_date' => $validatedData['planting_date'],
                'total_acres' => $validatedData['total_acres'],
                'total_livestock_area' => $validatedData['total_livestock_area'],
                'total_cost' => $validatedData['total_cost'],
                'gn_division_name' => $validatedData['gn_division_name'],
                'beneficiary_id' => $validatedData['beneficiary_id'],
            ]);

            if ($request->has('farmer_contribution')) {
                foreach ($request->farmer_contribution as $index => $val) {
                    AgriFarmerContribution::create([
                        'agriculture_data_id' => $agricultureData->id,
                        'farmer_contribution' => $val,
                        'cost' => $request->cost[$index] ?? null,
                        'date' => $request->farmer_date[$index] ?? null,
                    ]);
                }
            }

            if ($request->has('product_name')) {
                foreach ($request->product_name as $index => $productName) {
                    AgriculturProduct::create([
                        'agriculture_data_id' => $agricultureData->id,
                        'product_name' => $productName,
                        'total_production' => $request->total_production[$index] ?? null,
                        'total_income' => $request->total_income[$index] ?? null,
                        'profit' => $request->profit[$index] ?? null,
                    ]);
                }
            }

            if ($request->has('promoter_date')) {
                foreach ($request->promoter_date as $index => $date) {
                    PromoterContribution::create([
                        'agriculture_data_id' => $agricultureData->id,
                        'date' => $date,
                        'description' => $request->promoter_description[$index] ?? null,
                        'cost' => $request->promoter_cost[$index] ?? null,
                    ]);
                }
            }

            if ($request->has('grant_date')) {
                foreach ($request->grant_date as $index => $date) {
                    GrantDetail::create([
                        'agriculture_data_id' => $agricultureData->id,
                        'date' => $date,
                        'description' => $request->grant_description[$index] ?? null,
                        'value' => $request->grant_value[$index] ?? null,
                        'grant_issued_by' => $request->grant_issued_by[$index] ?? null,
                    ]);
                }
            }

            if ($request->has('bank_name')) {
                $creditDetail = CreditDetail::create([
                    'agriculture_data_id' => $agricultureData->id,
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

                if ($request->has('payment_date')) {
                    foreach ($request->payment_date as $index => $date) {
                        CreditPayment::create([
                            'credit_detail_id' => $creditDetail->id,
                            'payment_date' => $date,
                            'installment_payment' => $request->installment_payment[$index] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();
            return redirect()->route('agriculture.showByBeneficiary', $validatedData['beneficiary_id'])
                             ->with('success', 'Agriculture data saved successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error: ' . $e->getMessage());
        }
    }

   public function show(AgricultureData $agricultureData)
{
    $agricultureData->load([
        'beneficiary',
        'farmerContributions',
        'promoterContributions',
        'grantDetails',
        'creditDetail.creditPayments' // ✅ nested loading
    ]);

    return view('agriculture.agri_show', compact('agricultureData'));
}

    // public function edit($id)
    // {
    //     $agricultureData = AgricultureData::findOrFail($id);
    //     return view('agriculture.agri_edit', compact('agricultureData'));
    // }

    public function edit($id)
{
    $agricultureData = AgricultureData::findOrFail($id);
    return view('agriculture.agri_edit', ['agriculture' => $agricultureData]);
}




    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category' => 'nullable|string|max:255',
            'crop_name' => 'nullable|string|max:255',
            'planting_date' => 'nullable|date',
            'total_acres' => 'nullable|numeric|min:0',
            'total_livestock_area' => 'nullable|numeric|min:0',
            'total_cost' => 'nullable|numeric|min:0',

            'farmer_contribution.*' => 'nullable|string|max:255',
            'cost.*' => 'nullable|numeric|min:0',

            'product_name.*' => 'nullable|string|max:255',
            'total_production.*' => 'nullable|numeric|min:0',
            'total_income.*' => 'nullable|numeric|min:0',
            'profit.*' => 'nullable|numeric',
        ]);

        $agricultureData = AgricultureData::findOrFail($id);

        $agricultureData->update([
            'category' => $validatedData['category'],
            'crop_name' => $validatedData['crop_name'],
            'planting_date' => $validatedData['planting_date'],
            'total_acres' => $validatedData['total_acres'],
            'total_livestock_area' => $validatedData['total_livestock_area'],
            'total_cost' => $validatedData['total_cost'],
        ]);

        // Sync contributions and products
        $agricultureData->farmerContributions()->delete();
        if ($request->has('farmer_contribution')) {
            foreach ($request->farmer_contribution as $index => $value) {
                AgriFarmerContribution::create([
                    'agriculture_data_id' => $agricultureData->id,
                    'farmer_contribution' => $value,
                    'cost' => $request->cost[$index] ?? null,
                    'date' => $request->farmer_date[$index] ?? null,
                ]);
            }
        }

        $agricultureData->agriculturProducts()->delete();
        if ($request->has('product_name')) {
            foreach ($request->product_name as $index => $value) {
                AgriculturProduct::create([
                    'agriculture_data_id' => $agricultureData->id,
                    'product_name' => $value,
                    'total_production' => $request->total_production[$index] ?? null,
                    'total_income' => $request->total_income[$index] ?? null,
                    'profit' => $request->profit[$index] ?? null,
                ]);
            }
        }

        // TODO: Add promoter, grant, credit update logic if needed

        return redirect()->route('agriculture.index')->with('success', 'Agriculture data updated.');
    }



    public function destroy($id)
    {
        $agricultureData = AgricultureData::findOrFail($id);
        $agricultureData->delete();
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

   
    public function showByBeneficiary($beneficiaryId)
{
    $beneficiary = Beneficiary::findOrFail($beneficiaryId);
    $agricultureData = AgricultureData::where('beneficiary_id', $beneficiaryId)->get();

    // Retrieve input2 and input3 (Crop Category and Crop Name)
    $cropCategory = $beneficiary->input2 ?? 'N/A';
    $cropName = $beneficiary->input3 ?? 'N/A';

    return view('agriculture.agri_show', compact('beneficiary', 'agricultureData', 'cropCategory', 'cropName'));
}


   
    public function cropsByGnDivision($gn_division_name)
{
    $crops = DB::table('agriculture_data')
        ->join('beneficiaries', 'agriculture_data.beneficiary_id', '=', 'beneficiaries.id')
        ->where('agriculture_data.gn_division_name', $gn_division_name)
        ->select(
            'beneficiaries.input3 as crop_name', // Use input3 as the crop name
            DB::raw('SUM(agriculture_data.total_acres) as total_acres'),
            DB::raw('COUNT(DISTINCT agriculture_data.beneficiary_id) as total_beneficiaries')
        )
        ->groupBy('beneficiaries.input3') // Group by input3
        ->get();

    return view('agriculture.crops_by_gn_division', compact('crops', 'gn_division_name'));
}

    public function getGnDivisionName($beneficiaryId)
    {
        $beneficiary = Beneficiary::find($beneficiaryId);
        if ($beneficiary) {
            return response()->json(['gn_division_name' => $beneficiary->gn_division_name]);
        }
        return response()->json(['gn_division_name' => null], 404);
    }

    public function showAgricultureDetails($beneficiaryId)
    {
        $beneficiary = Beneficiary::findOrFail($beneficiaryId);
        $agricultureData = AgricultureData::where('beneficiary_id', $beneficiaryId)->get();

        $totalCrops = AgricultureData::distinct('crop_name')->count('crop_name');
        $totalBeneficiaries = AgricultureData::distinct('beneficiary_id')->count('beneficiary_id');
        $totalGnDivisions = AgricultureData::distinct('gn_division_name')->count('gn_division_name');

       

        return view('agriculture.agri_index', compact('beneficiary', 'agricultureData', 'totalCrops', 'totalBeneficiaries', 'totalGnDivisions'));
    }

    public function associateBeneficiariesWithAgricultureData()
    {
        $beneficiaries = Beneficiary::all();
        $agricultureDataRecords = AgricultureData::all();

        foreach ($agricultureDataRecords as $agricultureData) {
            foreach ($beneficiaries as $beneficiary) {
                $agricultureData->beneficiary_id = $beneficiary->id;
                $agricultureData->save();
            }
        }
    }

    public function getCropsByCategory($category)
{
    try {
        switch ($category) {
            case 'vegetables':
                $crops = \App\Models\Vegitable::all();
                break;
            case 'fruits':
                $crops = \App\Models\Fruit::all();
                break;
            case 'home_garden':
                $crops = \App\Models\HomeGarden::all();
                break;
            case 'others':
                $crops = \App\Models\OtherCrop::all();
                 break; 
            default:
                $crops = [];  // Handle "others" category or other cases
                break;
        }
        
        return response()->json($crops);
    } catch (\Exception $e) {
        // Log the error message for debugging
        \Log::error('Error fetching crops: ' . $e->getMessage());
        return response()->json(['error' => 'Server error while fetching crops'], 500);
    }
}


}

