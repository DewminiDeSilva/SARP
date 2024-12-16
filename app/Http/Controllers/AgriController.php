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
use Illuminate\Support\Facades\DB;

class AgriController extends Controller
{
    // public function index()
    // {
    //     $entries = request()->get('entries', 10);
    //     $agricultureData = AgricultureData::latest()->paginate($entries)->appends(['entries' => $entries]);
    //     $totalAgricultureData = AgricultureData::count();

    //     $totalCrops = AgricultureData::distinct('crop_name')->count('crop_name');
    //     //$totalBeneficiaries = AgricultureData::distinct('beneficiary_id')->count('beneficiary_id');
    //     $totalBeneficiaries = AgricultureData::distinct('input1','agriculture')->count();
    //     $totalGnDivisions = AgricultureData::distinct('gn_division_name')->count('gn_division_name');
    //     $beneficiaries = Beneficiary::paginate($entries);
    
    //     return view('agriculture.agri_index', compact('agricultureData', 'totalAgricultureData', 'entries', 'beneficiaries', 'totalCrops', 'totalBeneficiaries', 'totalGnDivisions','input1','agriculture'));
    // }

    public function index()
{
    $entries = request()->get('entries', 10);

    // Fetch only beneficiaries where input1 is 'agriculture'
    $beneficiaries = Beneficiary::where('input1', 'agriculture')->paginate($entries);

    // Agriculture Data Pagination
    $agricultureData = AgricultureData::latest()->paginate($entries)->appends(['entries' => $entries]);

    // Total Counts
    $totalAgricultureData = AgricultureData::count();
    $totalCrops = AgricultureData::distinct('crop_name')->count('crop_name');
    $totalBeneficiaries = Beneficiary::where('input1', 'agriculture')->count();
    $totalGnDivisions = AgricultureData::distinct('gn_division_name')->count('gn_division_name');

    // Pass data to the view
    return view('agriculture.agri_index', compact(
        'agricultureData', 
        'totalAgricultureData', 
        'entries', 
        'beneficiaries', 
        'totalCrops', 
        'totalBeneficiaries', 
        'totalGnDivisions'
    ));
}



    public function create($beneficiaryId = null)
    {
        $beneficiary = null;
        if ($beneficiaryId) {
            $beneficiary = Beneficiary::find($beneficiaryId);
            if (!$beneficiary) {
                return redirect()->route('agriculture.index')->withErrors('Beneficiary not found.');
            }
        }
        return view('agriculture.agri_create', compact('beneficiary','beneficiaryId'));
    }

  
public function store(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'category' => 'required|string|max:255',
        'crop_name' => 'required|string|max:255',
        'crop_variety' => 'nullable|string|max:255',
        'inputs' => 'required|string|max:255',
        'planting_date' => 'nullable|date',
        'total_acres' => 'required|numeric|min:0',
        'gn_division_name' => 'required|string|max:255',
        'beneficiary_id' => 'required|exists:beneficiaries,id',
        'farmer_contribution.*' => 'required|string|max:255',  // Array of contributions
        'cost.*' => 'required|numeric|min:0',  // Array of costs
        'product_name.*' => 'required|string|max:255', // Array of products
        'total_production.*' => 'required|numeric|min:0', // Array of product production
        'total_income.*' => 'required|numeric|min:0', // Array of product income
        'profit.*' => 'required|numeric|min:0', // Array of product profit
    ]);

    DB::beginTransaction();

    try {
        // Create the main agriculture data record
        $agricultureData = AgricultureData::create($validatedData);

        // Create farmer contributions
        foreach ($request->farmer_contribution as $index => $farmerContribution) {
            AgriFarmerContribution::create([
                'agriculture_data_id' => $agricultureData->id,
                'farmer_contribution' => $farmerContribution,
                'cost' => $request->cost[$index],
            ]);
        }

        // Create agricultur products
        foreach ($request->product_name as $index => $productName) {
            AgriculturProduct::create([
                'agriculture_data_id' => $agricultureData->id,
                'product_name' => $productName,
                'total_production' => $request->total_production[$index],
                'total_income' => $request->total_income[$index],
                'profit' => $request->profit[$index],
            ]);
        }

        DB::commit(); // Commit if everything is successful

        return redirect()->route('agriculture.showByBeneficiary', $validatedData['beneficiary_id'])
                         ->with('success', 'Data stored successfully.');

    } catch (\Exception $e) {
        DB::rollBack(); // Roll back in case of errors

        return redirect()->back()->withErrors('Error: ' . $e->getMessage());
    }
}

    public function show(AgricultureData $agricultureData)
    {
        $farmerContributions = $agricultureData->farmerContributions; 
        return view('agriculture.agri_show', compact('agricultureData','farmerContributions'));
    }

    public function edit($id)
    {
        $agricultureData = AgricultureData::findOrFail($id);
        return view('agriculture.agri_edit', compact('agricultureData'));
    }

    /*public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'category' => 'required|string|max:255',
            'crop_name' => 'required|string|max:255',
            'crop_variety' => 'nullable|string|max:255',
            'planting_date' => 'nullable|date',
            'total_acres' => 'required|numeric|min:0',
            'farmer_contribution.*' => 'required|string|max:255',
            'cost.*' => 'required|numeric|min:0',
        ]);
    
        // Find the AgricultureData record
        $agricultureData = AgricultureData::findOrFail($id);
    
        // Update the main AgricultureData record
        $agricultureData->update([
            'category' => $validatedData['category'],
            'crop_name' => $validatedData['crop_name'],
            'crop_variety' => $validatedData['crop_variety'],
            'planting_date' => $validatedData['planting_date'],
            'total_acres' => $validatedData['total_acres'],
            'total_production' => $validatedData['total_production'],
        ]);
    
        // Sync Farmer Contributions
        // First, delete all existing farmer contributions for this AgricultureData to handle updates and deletions
        $agricultureData->farmerContributions()->delete();
    
        // Loop through new farmer contributions and recreate them
        if ($request->has('farmer_contribution') && $request->has('cost')) {
            foreach ($validatedData['farmer_contribution'] as $index => $farmerContribution) {
                AgriFarmerContribution::create([
                    'agriculture_data_id' => $agricultureData->id,
                    'farmer_contribution' => $farmerContribution,
                    'cost' => $validatedData['cost'][$index],
                ]);
            }
        }
    
        // Redirect back to the agriculture index with a success message
        return redirect()->route('agriculture.index')->with('success', 'Agriculture data and farmer contributions updated successfully.');
    }*/
    public function update(Request $request, $id)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'category' => 'required|string|max:255',
        'crop_name' => 'required|string|max:255',
        'crop_variety' => 'nullable|string|max:255',
        'planting_date' => 'nullable|date',
        'total_acres' => 'required|numeric|min:0',
        //'total_production' => 'required|numeric|min:0', // Validate total production
        'farmer_contribution.*' => 'required|string|max:255', // Validate farmer contributions
        'cost.*' => 'required|numeric|min:0', // Validate cost
        'product_name.*' => 'required|string|max:255', // Validate product name
        'total_production.*' => 'required|numeric|min:0', // Validate product total production
        'total_income.*' => 'required|numeric|min:0', // Validate product total income
        'profit.*' => 'required|numeric|min:0', // Validate product profit
    ]);

    // Find the AgricultureData record
    $agricultureData = AgricultureData::findOrFail($id);

    // Update the main AgricultureData record
    $agricultureData->update([
        'category' => $validatedData['category'],
        'crop_name' => $validatedData['crop_name'],
        'crop_variety' => $validatedData['crop_variety'],
        'planting_date' => $validatedData['planting_date'],
        'total_acres' => $validatedData['total_acres'],
        //'total_production' => $validatedData['total_production'],
    ]);

    // Sync Farmer Contributions
    // First, delete all existing farmer contributions for this AgricultureData to handle updates and deletions
    $agricultureData->farmerContributions()->delete();

    // Loop through new farmer contributions and recreate them
    if ($request->has('farmer_contribution') && $request->has('cost')) {
        foreach ($validatedData['farmer_contribution'] as $index => $farmerContribution) {
            AgriFarmerContribution::create([
                'agriculture_data_id' => $agricultureData->id,
                'farmer_contribution' => $farmerContribution,
                'cost' => $validatedData['cost'][$index],
            ]);
        }
    }

    // Sync Product Details (Total Production, Income, Profit)
    // First, delete all existing products for this AgricultureData
    $agricultureData->agriculturProducts()->delete();

    // Loop through the new product details and recreate them
    if ($request->has('product_name') && $request->has('total_production')) {
        foreach ($validatedData['product_name'] as $index => $productName) {
            AgriculturProduct::create([
                'agriculture_data_id' => $agricultureData->id,
                'product_name' => $productName,
                'total_production' => $validatedData['total_production'][$index],
                'total_income' => $validatedData['total_income'][$index],
                'profit' => $validatedData['profit'][$index],
            ]);
        }
    }

    // Redirect back to the agriculture index with a success message
    return redirect()->route('agriculture.index')->with('success', 'Agriculture data, farmer contributions, and product details updated successfully.');
}

    

    public function destroy($id)
    {
        $agricultureData = AgricultureData::findOrFail($id);
        $agricultureData->delete();
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $entries = $request->get('entries', 10);

        $agricultureDataQuery = AgricultureData::query();
        $beneficiaryQuery = Beneficiary::query();

        if ($search) {
            $beneficiaryIds = $beneficiaryQuery->where(function($query) use ($search) {
                $query->where('nic', 'like', '%' . $search . '%')
                    ->orWhere('name_with_initials', 'like', '%' . $search . '%')
                    ->orWhere('gn_division_name', 'like', '%' . $search . '%');
            })->pluck('id');

            $agricultureDataQuery->where(function($query) use ($search, $beneficiaryIds) {
                $query->where('category', 'like', '%' . $search . '%')
                    ->orWhere('crop_name', 'like', '%' . $search . '%')
                    ->orWhere('total_acres', 'like', '%' . $search . '%')
                   // ->orWhere('total_production', 'like', '%' . $search . '%')
                    ->orWhereIn('beneficiary_id', $beneficiaryIds);
            });
        }

        $agricultureData = $agricultureDataQuery->paginate($entries)
            ->appends(['search' => $search, 'entries' => $entries]);

        $filteredBeneficiaryIds = $agricultureData->pluck('beneficiary_id')->unique();

        $beneficiaries = Beneficiary::where(function($query) use ($search) {
                $query->where('nic', 'like', '%' . $search . '%')
                    ->orWhere('name_with_initials', 'like', '%' . $search . '%');
                 
            })
            ->orWhereIn('id', $filteredBeneficiaryIds)
            ->paginate($entries)
            ->appends(['search' => $search, 'entries' => $entries]);

        $totalCrops = AgricultureData::distinct('crop_name')->count('crop_name');
        //$totalBeneficiaries = Beneficiary::count();
        $totalBeneficiaries = $filteredBeneficiaryIds->count();
        $totalGnDivisions = AgricultureData::distinct('gn_division_name')->count('gn_division_name');

        return view('agriculture.agri_index', compact('agricultureData', 'search', 'entries', 'beneficiaries', 'totalCrops', 'totalBeneficiaries', 'totalGnDivisions'));
    }

   

    public function showByBeneficiary($beneficiaryId)
    {
        $beneficiary = Beneficiary::findOrFail($beneficiaryId);
        $agricultureData = AgricultureData::where('beneficiary_id', $beneficiaryId)->get();

        return view('agriculture.agri_show', compact('beneficiary', 'agricultureData'));
    }

    public function cropsByGnDivision($gn_division_name)
    {
        $crops = AgricultureData::where('gn_division_name', $gn_division_name)
            ->select('crop_name', 
                     DB::raw('SUM(total_acres) as total_acres'), 
                     DB::raw('COUNT(DISTINCT beneficiary_id) as total_beneficiaries'))
            ->groupBy('crop_name')
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

