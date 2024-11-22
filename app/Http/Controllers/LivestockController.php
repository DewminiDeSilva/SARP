<?php
namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\LiveProduct;
use App\Models\LiveContribution;
use App\Models\Beneficiary;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    // Method to list all livestock for a specific beneficiary
    public function listLivestock(Request $request)
    {
        $beneficiary_id = $request->route('beneficiary_id');
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);
    
        // Fetch livestock records with related products and contributions
        $livestocks = Livestock::with(['liveProducts', 'liveContributions'])
            ->where('beneficiary_id', $beneficiary_id)
            ->get();
    
        return view('livestock.livestock_index', compact('livestocks', 'beneficiary'));
    }

    // Method to show the form to create a new livestock record
    public function create(Request $request)
    {
        $beneficiary_id = $request->route('beneficiary_id');
        $beneficiary = Beneficiary::findOrFail($beneficiary_id);
        return view('livestock.livestock_create', compact('beneficiary'));
    }

    // Method to store a new livestock record in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'livestock_type' => 'required|string|max:255',
            'production_focus' => 'required|string|max:255',
            'total_livestock_area' => 'required|numeric',
            'total_cost' => 'required|numeric',
            'inputs' => 'required|string|max:255',
            'total_number_of_acres' => 'required|numeric|min:0',
            'livestock_commencement_date' => 'required|date', // Added this validation

            // Validate related products (if applicable)
            'product_name.*' => 'nullable|string|max:255',
            'total_production.*' => 'nullable|numeric|min:0',
            'total_income.*' => 'nullable|numeric|min:0',
            'profit.*' => 'nullable|numeric|min:0',

            // Validate related contributions (if applicable)
            'contribution_type.*' => 'nullable|string|max:255',
            'cost.*' => 'nullable|numeric|min:0',
        ]);

        // Retrieve the beneficiary to get the GN division name
        $beneficiary = Beneficiary::findOrFail($validatedData['beneficiary_id']);
        $validatedData['gn_division_name'] = $beneficiary->gn_division_name;

        // Create the livestock record
        $livestock = Livestock::create($validatedData);

        // Store related products (if applicable)
        if ($request->has('product_name')) {
            foreach ($request->product_name as $index => $productName) {
                LiveProduct::create([
                    'livestock_id' => $livestock->id,
                    'product_name' => $productName,
                    'total_production' => $request->total_production[$index] ?? null,
                    'total_income' => $request->total_income[$index] ?? null,
                    'profit' => $request->profit[$index] ?? null,
                ]);
            }
        }

        // Store related contributions (if applicable)
        if ($request->has('contribution_type')) {
            foreach ($request->contribution_type as $index => $contributionType) {
                LiveContribution::create([
                    'livestock_id' => $livestock->id,
                    'contribution_type' => $contributionType,
                    'cost' => $request->cost[$index] ?? null,
                ]);
            }
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
    public function edit($id)
    {
        $livestock = Livestock::findOrFail($id);
        return view('livestock.livestock_edit', compact('livestock'));
    }

    // Method to update an existing livestock record
    public function update(Request $request, $id)
    {
        $livestock = Livestock::findOrFail($id);
        
        $validatedData = $request->validate([
            'livestock_type' => 'required|string|max:255',
            'production_focus' => 'required|string|max:255',
            'total_livestock_area' => 'required|numeric',
            'total_cost' => 'required|numeric',
            'inputs' => 'required|string|max:255',
            'total_number_of_acres' => 'required|numeric|min:0',
            'livestock_commencement_date' => 'required|date', // Added validation for start date
            
            // Validate related products (if applicable)
            'product_name.*' => 'nullable|string|max:255',
            'total_production.*' => 'nullable|numeric|min:0',
            'total_income.*' => 'nullable|numeric|min:0',
            'profit.*' => 'nullable|numeric|min:0',

            // Validate related contributions (if applicable)
            'contribution_type.*' => 'nullable|string|max:255',
            'cost.*' => 'nullable|numeric|min:0',
        ]);

        $livestock->update($validatedData);

        // Update related products (if applicable)
        $livestock->liveProducts()->delete(); // Delete all existing products
        if ($request->has('product_name')) {
            foreach ($request->product_name as $index => $productName) {
                LiveProduct::create([
                    'livestock_id' => $livestock->id,
                    'product_name' => $productName,
                    'total_production' => $request->total_production[$index],
                    'total_income' => $request->total_income[$index],
                    'profit' => $request->profit[$index],
                ]);
            }
        }

        // Update related contributions (if applicable)
        $livestock->liveContributions()->delete(); // Delete all existing contributions
        if ($request->has('contribution_type')) {
            foreach ($request->contribution_type as $index => $contributionType) {
                LiveContribution::create([
                    'livestock_id' => $livestock->id,
                    'contribution_type' => $contributionType,
                    'cost' => $request->cost[$index],
                ]);
            }
        }
    
        return redirect()->route('livestocks.list', ['beneficiary_id' => $livestock->beneficiary_id])
            ->with('success', 'Livestock record updated successfully.');
    }

    // Method to delete a livestock record
    public function destroy($livestock_id)
    {
        $livestock = Livestock::findOrFail($livestock_id);
        $beneficiary_id = $livestock->beneficiary_id;

        // Delete related records (products and contributions)
        $livestock->liveProducts()->delete();
        $livestock->liveContributions()->delete();
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

    // Search in Beneficiary fields
    $beneficiaries = Beneficiary::where('nic', 'like', "%{$search}%")
        ->orWhere('name_with_initials', 'like', "%{$search}%")
        ->orWhere('address', 'like', "%{$search}%")
        ->orWhere('gn_division_name', 'like', "%{$search}%")
        ->paginate(10); // Add pagination
        

    // Add required statistics
    $totalLivestocks = Livestock::count();
    $totalBeneficiaries = Beneficiary::count();
    $totalGnDivisions = Beneficiary::distinct('gn_division_name')->count();

    // Return the view with data
    return view('beneficiary.beneficiary_list', compact('beneficiaries','search','totalLivestocks','totalBeneficiaries','totalGnDivisions'
    ));
}

  


}
