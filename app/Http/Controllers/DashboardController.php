<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\TankRehabilitation; 
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // load all tanks (id + name)
        $tanks = Tank::select('id', 'tank_name')->orderBy('tank_name')->get();

        $totalTanks = $tanks->count();
        $completedCount = TankRehabilitation::whereRaw('LOWER(status) = ?', ['completed'])->count();
        $ongoingCount = TankRehabilitation::where('status', 'On Going')->count();
        $startedCount = TankRehabilitation::whereRaw('LOWER(status) = ?', ['started'])->count();

        // Tank Rehabilitation KPIs
        $tankRehabKPIs = $this->calculateTankRehabKPIs();

        // Define the modules and their labels
        $modules = [
            'staff_profile', 'beneficiary', 'family', 'training', 'livestock', 'agri', 'nutrition', 'nutrition_trainee',
            'ffs-training', 'ffs-participants', 'cdf', 'cdfmembers', 'farmerorganization', 'farmermember',
            'asc_registration', 'grievances', 'officer', 'tank_rehabilitation', 'fingerling', 'infrastructure',
            'gallery', 'agro', 'shareholder', 'bene_form', 'nrm', 'nrm_participants', 'awpb',
            'costtab', 'projectdesignreport', 'vegitable', 'fruit', 'goat', 'dairy', 'poultary',
            'aquaculture', 'homegarden', 'other_crops', 'agriculture', 'livestocks', 'expressions', 'nutrient_rich_home_garden'
        ];

        $moduleLabels = [
            'staff_profile' => 'Staff Profile',
            'beneficiary' => 'Beneficiary',
            'family' => 'Family Member',
            'training' => 'Training Program',
            'livestock' => 'Livestock',
            'agri' => 'Agriculture',
            'nutrition' => 'Nutrition',
            'nutrition_trainee' => 'Nutrition Trainee',
            'ffs-training' => 'FFS Training',
            'ffs-participants' => 'FFS Participants',
            'cdf' => 'CDF',
            'cdfmembers' => 'CDF Members',
            'farmerorganization' => 'Farmer Organization',
            'farmermember' => 'Farmer Members',
            'asc_registration' => 'Agrarian Service Center',
            'grievances' => 'Grievances',
            'officer' => 'Officer',
            'tank_rehabilitation' => 'Tank Rehabilitation',
            'fingerling' => 'Fingerlings',
            'infrastructure' => 'Infrastructure',
            'gallery' => 'Gallery',
            'agro' => 'Agro Enterprise',
            'shareholder' => 'Shareholder',
            'bene_form' => 'Beneficiary Form',
            'nrm' => 'NRM',
            'nrm_participants' => 'NRM Participants',
            'awpb' => 'AWPB',
            'costtab' => 'Cost Tab',
            'projectdesignreport' => 'Project Design Report',
            'vegitable' => 'Vegetable',
            'fruit' => 'Fruit',
            'goat' => 'Goat',
            'dairy' => 'Dairy',
            'poultary' => 'Poultry',
            'aquaculture' => 'Aquaculture',
            'homegarden' => 'Home Garden',
            'other_crops' => 'Other Crops',
            'agriculture' => 'Agriculture',
            'livestocks' => 'Livestocks',
            'expressions' => 'Expressions',
            'nutrient_rich_home_garden' => 'Nutrient Rich Home Garden'
        ];

        // pass to dashboard view (merge with other data you already pass)
        return view('dashboard', compact(
            'tanks',
            'totalTanks',
            'completedCount',
            'ongoingCount',
            'startedCount', 
            'modules', 
            'moduleLabels',
            'tankRehabKPIs'
        ));
    }

    private function calculateTankRehabKPIs()
    {
        // Get all tank rehabilitation records
        $tankRehabs = TankRehabilitation::all();

        // 1. Total Tanks
        $totalTanks = $tankRehabs->count();

        // 2. Ongoing
        $ongoing = $tankRehabs->where('status', 'On Going')->count();

        // 3. Completed
        $completed = $tankRehabs->filter(function($tank) {
            return strtolower($tank->status) === 'completed';
        })->count();

        // 4. Average Physical Progress %
        $progressValues = $tankRehabs->pluck('progress')
            ->filter(function($progress) {
                // Handle both numeric and string percentage values
                if (is_numeric($progress)) {
                    return $progress >= 0 && $progress <= 100;
                }
                if (is_string($progress)) {
                    // Remove % sign and convert to numeric
                    $cleanProgress = str_replace('%', '', trim($progress));
                    return is_numeric($cleanProgress) && $cleanProgress >= 0 && $cleanProgress <= 100;
                }
                return false;
            })
            ->map(function($progress) {
                if (is_string($progress)) {
                    return (float) str_replace('%', '', trim($progress));
                }
                return (float) $progress;
            })
            ->values();
        
        $avgPhysicalProgress = $progressValues->count() > 0 
            ? round($progressValues->avg(), 1) 
            : 0;

        // 5. Budget vs Spent (utilization %)
        $totalBudget = $tankRehabs->sum(function($tank) {
            return is_numeric($tank->cumulative_amount) ? (float) $tank->cumulative_amount : 0;
        });
        $totalSpent = $tankRehabs->sum(function($tank) {
            return is_numeric($tank->payment) ? (float) $tank->payment : 0;
        });
        $budgetUtilization = $totalBudget > 0 
            ? round(($totalSpent / $totalBudget) * 100, 1) 
            : 0;

        // 6. Beneficiary HHs (Households)
        $beneficiaryHHs = $tankRehabs->sum(function($tank) {
            return is_numeric($tank->no_of_family) ? (int) $tank->no_of_family : 0;
        });

        // 7. Irrigated Area (ha) - Placeholder calculation
        // Since this field doesn't exist in the current model, we'll use a placeholder
        // In a real scenario, you would add this field to the model
        $irrigatedArea = 0; // Placeholder - would need to be calculated from actual data

        // 8. Capacity Restored (MCM) - Placeholder calculation
        // Since this field doesn't exist in the current model, we'll use a placeholder
        // In a real scenario, you would add this field to the model
        $capacityRestored = 0; // Placeholder - would need to be calculated from actual data

        return [
            'total_tanks' => $totalTanks,
            'ongoing' => $ongoing,
            'completed' => $completed,
            'avg_physical_progress' => $avgPhysicalProgress,
            'budget_utilization' => $budgetUtilization,
            'beneficiary_hhs' => $beneficiaryHHs,
            'irrigated_area' => $irrigatedArea,
            'capacity_restored' => $capacityRestored,
            'total_budget' => $totalBudget,
            'total_spent' => $totalSpent
        ];
    }
}