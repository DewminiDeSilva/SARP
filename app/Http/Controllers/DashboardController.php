<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\TankRehabilitation;
use App\Models\Beneficiary;
use Illuminate\Support\Facades\DB;
use App\Models\Infrastructure;
use App\Models\CDF;
use App\Models\AscRegistration;
use App\Models\FarmerOrganization;
use App\Models\Training;
use App\Models\Grievance;
use App\Models\YouthProposal;
use App\Models\Agro;
use App\Models\AgroAsset;
use App\Models\Shareholder;
use App\Models\AgroForest;
use App\Models\AgroForestSpecies;
use App\Models\AgroForestNursery;
use App\Models\NrmTraining;
use App\Models\NrmParticipant;
use App\Models\NutrientHomeGarden;
use App\Models\FFSTraining;
use App\Models\FFSParticipant;
use App\Models\Nutrition;
use App\Models\NutritionTrainee;
use App\Models\LogframeIndicator;

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
            'aquaculture', 'homegarden', 'other_crops', 'agriculture', 'livestocks', 'expressions', 'nutrient_rich_home_garden',
            'project_types'
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
            'nutrient_rich_home_garden' => 'Nutrient Rich Home Garden',
            'project_types' => 'Project Types',
            'resilience_projects' => 'Resilience Projects'
        ];
        // Calculate beneficiary statistics
        $beneficiaryStats = $this->calculateBeneficiaryStats();
        
        // Calculate project type statistics
        $projectTypeStats = $this->calculateProjectTypeStats();

        // Infrastructure stats
        $infrastructureStats = $this->calculateInfrastructureStats();

        // Resilience stats
        $resilienceStats = $this->calculateResilienceStats();

        // Social Inclusion & Gender stats
        $socialInclusionStats = $this->calculateSocialInclusionStats();

        // Youth Enterprises stats
        $youthStats = $this->calculateYouthStats();

        $moduleStats = [
        'beneficiary' => [
            'count' => Beneficiary::count(),
        ],
        // later you can add more: 'training' => ['count' => Training::count()],
    ];

        // 4P (EOI) stats
        $fourPStats = $this->calculateFourPStats();

        // Agro Enterprise stats
        $agroEnterpriseStats = $this->calculateAgroEnterpriseStats();

        // NRM stats
        $nrmStats = $this->calculateNRMStats();

        // FFS Training stats
        $ffsStats = $this->calculateFFSStats();

        // Nutrition Training stats
        $nutritionStats = $this->calculateNutritionStats();

        // Fetch indicator values for each main logframe indicator
        $householdMembers = DB::table('logframe_indicators')
            ->where('indicator_name', 'like', '%Estimated corresponding total number of households members%')
            ->selectRaw('SUM(baseline) as baseline, SUM(mid_term) as mid_term, SUM(end_target) as end_target')
            ->first();
        
        // Get logframe indicator data for cumulative and current year result
        $currentYear = date('Y');
        $householdMembersIndicators = LogframeIndicator::where('indicator_name', 'like', '%Estimated corresponding total number of households members%')->get();
        
        $householdMembersCumulative = 0;
        $householdMembersCurrentYearResult = 0;
        $householdMembersLastUpdatedDate = null;
        
        if ($householdMembersIndicators->count() > 0) {
            // Sum cumulative results across all matching indicators
            foreach ($householdMembersIndicators as $indicator) {
                $householdMembersCumulative += $indicator->getCumulativeResult($currentYear);
                $householdMembersCurrentYearResult += $indicator->getResultForYear($currentYear);
                
                // Get the most recent updated date
                if ($indicator->updated_at) {
                    $updatedDate = $indicator->updated_at->format('Y-m-d');
                    if (!$householdMembersLastUpdatedDate || $updatedDate > $householdMembersLastUpdatedDate) {
                        $householdMembersLastUpdatedDate = $updatedDate;
                    }
                }
            }
        }
        
        // Add cumulative and result to householdMembers object
        if ($householdMembers) {
            $householdMembers->cumulative = $householdMembersCumulative;
            $householdMembers->current_year_result = $householdMembersCurrentYearResult;
            $householdMembers->last_updated_date = $householdMembersLastUpdatedDate;
        }
        
        $householdsReached = DB::table('logframe_indicators')
            ->where('indicator_name', 'like', '%Corresponding number of households reached%')
            ->selectRaw('SUM(baseline) as baseline, SUM(mid_term) as mid_term, SUM(end_target) as end_target')
            ->first();
        
        // Get logframe indicator data for cumulative and current year result for households reached
        $householdsReachedIndicators = LogframeIndicator::where('indicator_name', 'like', '%Corresponding number of households reached%')->get();
        
        $householdsReachedCumulative = 0;
        $householdsReachedCurrentYearResult = 0;
        $householdsReachedLastUpdatedDate = null;
        
        if ($householdsReachedIndicators->count() > 0) {
            // Sum cumulative results across all matching indicators
            foreach ($householdsReachedIndicators as $indicator) {
                $householdsReachedCumulative += $indicator->getCumulativeResult($currentYear);
                $householdsReachedCurrentYearResult += $indicator->getResultForYear($currentYear);
                
                // Get the most recent updated date
                if ($indicator->updated_at) {
                    $updatedDate = $indicator->updated_at->format('Y-m-d');
                    if (!$householdsReachedLastUpdatedDate || $updatedDate > $householdsReachedLastUpdatedDate) {
                        $householdsReachedLastUpdatedDate = $updatedDate;
                    }
                }
            }
        }
        
        // Add cumulative and result to householdsReached object
        if ($householdsReached) {
            $householdsReached->cumulative = $householdsReachedCumulative;
            $householdsReached->current_year_result = $householdsReachedCurrentYearResult;
            $householdsReached->last_updated_date = $householdsReachedLastUpdatedDate;
        }
        
        $personsReceivingServices = DB::table('logframe_indicators')
            ->where('indicator_name', 'like', '%Persons receiving services promoted or supported by the project%')
            ->selectRaw('SUM(baseline) as baseline, SUM(mid_term) as mid_term, SUM(end_target) as end_target')
            ->first();

        // pass to dashboard view (merge with other data you already pass)
        return view('dashboard', compact(
            'tanks',
            'totalTanks',
            'completedCount',
            'ongoingCount',
            'startedCount', 
            'modules', 
            'moduleLabels',
            'tankRehabKPIs',
            'moduleStats',
            'beneficiaryStats',
            'projectTypeStats'
            ,'infrastructureStats'
            ,'resilienceStats'
            ,'socialInclusionStats'
            ,'youthStats'
            ,'fourPStats'
            ,'agroEnterpriseStats'
            ,'nrmStats'
            ,'ffsStats'
            ,'nutritionStats'
            ,'householdMembers', 'householdsReached', 'personsReceivingServices'
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

    private function calculateBeneficiaryStats()
    {
        // Get all beneficiaries
        $beneficiaries = Beneficiary::all();

        // Query builder (for DB-level aggregations)
    $base = Beneficiary::query();


        // 1. Total beneficiaries
        $totalBeneficiaries = $beneficiaries->count();

        // 2) Gender (normalize: trim + lower + map M/F)
    $genderCounts = (clone $base)
    ->selectRaw("
        CASE
            WHEN LOWER(TRIM(gender)) IN ('male','m')   THEN 'male'
            WHEN LOWER(TRIM(gender)) IN ('female','f') THEN 'female'
            ELSE 'other'
        END AS g
    ")
    ->selectRaw("COUNT(*) AS c")
    ->groupBy('g')
    ->pluck('c','g');

$maleCount         = $genderCounts['male']   ?? 0;
$femaleCount       = $genderCounts['female'] ?? 0;
$otherGenderCount  = $genderCounts['other']  ?? 0;

// 3) Age groups (cast to number to avoid text issues)
$youthCount      = (clone $base)->whereRaw("CAST(age AS UNSIGNED) < 30")->count();
$middleAgeCount  = (clone $base)->whereRaw("CAST(age AS UNSIGNED) BETWEEN 30 AND 59")->count();
$seniorCount     = (clone $base)->whereRaw("CAST(age AS UNSIGNED) >= 60")->count();


        // 4. Education levels (assuming education field contains education level)
        $educationStats = $beneficiaries->groupBy('education')->map->count();

        // 5. Province distribution
        $provinceStats = $beneficiaries->groupBy('province_name')->map->count();

        // 6) Family size (cast to numeric to avoid text like '' or '  ')
    $avgFamilySize = (clone $base)
    ->whereNotNull('number_of_family_members')
    ->whereRaw("NULLIF(TRIM(number_of_family_members), '') IS NOT NULL")
    ->avg(DB::raw('CAST(number_of_family_members AS DECIMAL(10,2))'));

$totalHouseholdMembers = (clone $base)
    ->whereNotNull('number_of_family_members')
    ->whereRaw("NULLIF(TRIM(number_of_family_members), '') IS NOT NULL")
    ->sum(DB::raw('CAST(number_of_family_members AS UNSIGNED)'));

return [
    'total_beneficiaries'      => $totalBeneficiaries,
    'male_count'               => $maleCount,
    'female_count'             => $femaleCount,
    'other_gender_count'       => $otherGenderCount,
    'youth_count'              => $youthCount,
    'middle_age_count'         => $middleAgeCount,
    'senior_count'             => $seniorCount,
    'education_stats'          => $educationStats,
    'province_stats'           => $provinceStats,
    'avg_family_size'          => $avgFamilySize ? round($avgFamilySize, 1) : 0,
    'total_household_members'  => (int) $totalHouseholdMembers,
];
}

    private function calculateInfrastructureStats()
    {
        $query = Infrastructure::query();

        $all = $query->get();

        $total = $all->count();

        // Normalize status comparisons
        $statusCounts = [
            'identified' => $all->filter(function($r){ return strtolower(trim((string)$r->status)) === 'identified'; })->count(),
            'started'    => $all->filter(function($r){ return strtolower(trim((string)$r->status)) === 'started'; })->count(),
            'on_going'   => $all->filter(function($r){ return strtolower(trim((string)$r->status)) === 'on going'; })->count(),
            'finished'   => $all->filter(function($r){ return strtolower(trim((string)$r->status)) === 'finished'; })->count(),
        ];

        // Average progress from infrastructure_progress (may be number or string with %)
        $progressValues = $all->pluck('infrastructure_progress')
            ->filter(function($progress){
                if (is_null($progress)) return false;
                if (is_numeric($progress)) return $progress >= 0 && $progress <= 100;
                if (is_string($progress)) {
                    $clean = str_replace('%','', trim($progress));
                    return is_numeric($clean) && $clean >= 0 && $clean <= 100;
                }
                return false;
            })
            ->map(function($progress){
                if (is_string($progress)) {
                    return (float) str_replace('%','', trim($progress));
                }
                return (float) $progress;
            })
            ->values();

        $avgProgress = $progressValues->count() > 0 ? round($progressValues->avg(), 1) : 0;

        // Progress distribution buckets (0–25–50–75–100]
        $buckets = [
            'b0_25'  => 0,
            'b26_50' => 0,
            'b51_75' => 0,
            'b76_99' => 0,
            'b100'   => 0,
        ];

        foreach ($progressValues as $val) {
            if ($val <= 25) { $buckets['b0_25']++; }
            elseif ($val <= 50) { $buckets['b26_50']++; }
            elseif ($val <= 75) { $buckets['b51_75']++; }
            elseif ($val < 100) { $buckets['b76_99']++; }
            else { $buckets['b100']++; }
        }

        return [
            'total' => $total,
            'status_counts' => $statusCounts,
            'avg_progress' => $avgProgress,
            'progress_buckets' => $buckets,
        ];
    }

private function calculateProjectTypeStats()
{
    // Get project type counts from beneficiaries table
    $resilienceCount = Beneficiary::where('project_type', 'resilience')->count();
    $youthCount = Beneficiary::where('project_type', 'youth')->count();
    $fourPCount = Beneficiary::where('project_type', '4p')->count();
    $nutritionCount = Beneficiary::where('project_type', 'nutrition')->count();
    
    // Also get counts from dedicated tables for more comprehensive data
    $youthProposalCount = \App\Models\YouthProposal::count();
    $nutritionProgramCount = \App\Models\Nutrition::count();
    
    // Calculate total projects
    $totalProjects = $resilienceCount + $youthCount + $fourPCount + $nutritionCount;
    
    return [
        'resilience_count' => $resilienceCount,
        'youth_count' => $youthCount,
        'four_p_count' => $fourPCount,
        'nutrition_count' => $nutritionCount,
        'youth_proposal_count' => $youthProposalCount,
        'nutrition_program_count' => $nutritionProgramCount,
        'total_projects' => $totalProjects
    ];
}

    private function calculateResilienceStats()
    {
        // Base filter: project_type = resilience
        $base = Beneficiary::query()->whereRaw("LOWER(TRIM(COALESCE(project_type,''))) = 'resilience'");

        // Prefer dedicated tables; fallback to Beneficiary fields if empty
        $agriTableCount = DB::table('agriculture_data')->count();
        $liveTableCount = DB::table('livestocks')->count();

        // Agriculture counts
        if ($agriTableCount > 0) {
            $totalFarmersAgri = (int) DB::table('agriculture_data')
                ->whereNotNull('beneficiary_id')
                ->distinct('beneficiary_id')
                ->count('beneficiary_id');

            $farmersByCategory = DB::table('agriculture_data')
                ->selectRaw("LOWER(TRIM(COALESCE(category,''))) AS cat")
                ->selectRaw('COUNT(DISTINCT beneficiary_id) AS cnt')
                ->groupBy('cat')
                ->pluck('cnt','cat')
                ->filter(function($v,$k){ return $k !== ''; });

            $farmersByCrop = DB::table('agriculture_data')
                ->selectRaw("LOWER(TRIM(COALESCE(crop_name,''))) AS crop")
                ->selectRaw('COUNT(DISTINCT beneficiary_id) AS cnt')
                ->groupBy('crop')
                ->pluck('cnt','crop')
                ->filter(function($v,$k){ return $k !== ''; });
        } else {
            // Fallback to beneficiaries fields
            $totalFarmersAgri = (clone $base)
                ->whereRaw("LOWER(TRIM(COALESCE(input1,''))) = 'agriculture'")
                ->count();

            $farmersByCategory = (clone $base)
                ->whereRaw("LOWER(TRIM(COALESCE(input1,''))) = 'agriculture'")
                ->selectRaw("LOWER(TRIM(COALESCE(input2,''))) AS cat")
                ->selectRaw('COUNT(*) AS cnt')
                ->groupBy('cat')
                ->pluck('cnt','cat')
                ->filter(function($v,$k){ return $k !== ''; });

            $farmersByCrop = (clone $base)
                ->whereRaw("LOWER(TRIM(COALESCE(input1,''))) = 'agriculture'")
                ->selectRaw("LOWER(TRIM(COALESCE(input3,''))) AS crop")
                ->selectRaw('COUNT(*) AS cnt')
                ->groupBy('crop')
                ->pluck('cnt','crop')
                ->filter(function($v,$k){ return $k !== ''; });
        }

        // Livestock counts
        if ($liveTableCount > 0) {
            $totalFarmersLivestock = (int) DB::table('livestocks')
                ->whereNotNull('beneficiary_id')
                ->distinct('beneficiary_id')
                ->count('beneficiary_id');
        } else {
            $totalFarmersLivestock = (clone $base)
                ->whereRaw("LOWER(TRIM(COALESCE(input1,''))) = 'livestock'")
                ->count();
        }

        // Production focus from livestocks table if available
        $focusRows = DB::table('livestocks')
            ->selectRaw("CASE 
                WHEN LOWER(TRIM(COALESCE(production_focus,''))) IN ('subsistence') THEN 'subsistence'
                WHEN LOWER(TRIM(COALESCE(production_focus,''))) IN ('commercial') THEN 'commercial'
                WHEN LOWER(TRIM(COALESCE(production_focus,''))) IN ('mixed','mix') THEN 'mixed'
                ELSE 'other' END AS f")
            ->selectRaw('COUNT(*) AS c')
            ->groupBy('f')
            ->pluck('c','f');

        return [
            'total_farmers_agri' => (int) $totalFarmersAgri,
            'total_farmers_livestock' => (int) $totalFarmersLivestock,
            'farmers_by_category' => $farmersByCategory,
            'farmers_by_crop' => $farmersByCrop,
            'production_focus' => [
                'subsistence' => (int) ($focusRows['subsistence'] ?? 0),
                'commercial'  => (int) ($focusRows['commercial'] ?? 0),
                'mixed'       => (int) ($focusRows['mixed'] ?? 0),
                'other'       => (int) ($focusRows['other'] ?? 0),
            ],
        ];
    }

    private function calculateFourPStats()
    {
        // Expressions of Interest status-based KPIs
        $totalEOIs        = \App\Models\EOI::count();
        $rejectedEOIs     = \App\Models\EOI::where('status', 'Rejected')->count();
        $bpecApprovedEOIs = \App\Models\EOI::where('status', 'BPEC Approved')->count();
        $agreementSigned  = \App\Models\EOI::where('status', 'Agreement Signed')->count();
        $ifadApproved     = \App\Models\EOI::where('status', 'IFAD Approved')->count();
        $nscApproved      = \App\Models\EOI::where('status', 'NSC Approved')->count();

        return [
            'total' => (int) $totalEOIs,
            'rejected' => (int) $rejectedEOIs,
            'bpec_approved' => (int) $bpecApprovedEOIs,
            'agreement_signed' => (int) $agreementSigned,
            'ifad_approved' => (int) $ifadApproved,
            'nsc_approved' => (int) $nscApproved,
        ];
    }

    private function calculateSocialInclusionStats()
    {
        $cdfCount = CDF::count();
        $ascCount = AscRegistration::count();
        $farmerOrgCount = FarmerOrganization::count();
        $trainingCount = class_exists(Training::class) ? Training::count() : 0;
        $grievanceCount = class_exists(Grievance::class) ? Grievance::count() : 0;

        return [
            'cdf' => $cdfCount,
            'asc' => $ascCount,
            'farmer_organization' => $farmerOrgCount,
            'training' => $trainingCount,
            'grievances' => $grievanceCount,
        ];
    }

    private function calculateYouthStats()
    {
        $total = YouthProposal::count();
        $signed = YouthProposal::where('status', 'Agreement Signed')->count();
        $notSigned = YouthProposal::whereNull('status')
            ->orWhere('status', '!=', 'Agreement Signed')
            ->count();

        return [
            'total' => $total,
            'signed' => $signed,
            'not_signed' => $notSigned,
        ];
    }

    private function calculateAgroEnterpriseStats()
    {
        // 1. Basic Enterprise Statistics
        $totalEnterprises = Agro::count();
        $totalShareholders = Shareholder::count();
        $totalAssets = AgroAsset::count();
        $totalAgroForests = AgroForest::count();

        // 2. Enterprise Registration Analysis
        $registrationInstitutes = Agro::selectRaw('institute_of_registration, COUNT(*) as count')
            ->groupBy('institute_of_registration')
            ->pluck('count', 'institute_of_registration')
            ->filter(function($count, $institute) {
                return !empty(trim($institute));
            });

        // 3. Business Nature Analysis
        $businessNature = Agro::selectRaw('nature_of_business, COUNT(*) as count')
            ->groupBy('nature_of_business')
            ->pluck('count', 'nature_of_business')
            ->filter(function($count, $nature) {
                return !empty(trim($nature));
            });

        // 4. Asset Analysis
        $totalAssetValue = AgroAsset::sum('asset_value');
        $avgAssetValue = AgroAsset::avg('asset_value');
        $assetDistribution = AgroAsset::selectRaw('asset_name, COUNT(*) as count, SUM(asset_value) as total_value')
            ->groupBy('asset_name')
            ->orderBy('total_value', 'desc')
            ->get()
            ->map(function($asset) {
                return [
                    'name' => $asset->asset_name,
                    'count' => $asset->count,
                    'total_value' => (float) $asset->total_value
                ];
            });

        // 5. Shareholder Analysis
        $shareholderStats = [
            'total_shares' => Shareholder::sum('number_of_shares'),
            'total_share_capital' => Shareholder::sum('share_capital'),
            'avg_shares_per_shareholder' => Shareholder::avg('number_of_shares'),
            'avg_share_capital' => Shareholder::avg('share_capital'),
        ];

        // Gender distribution of shareholders
        $shareholderGender = Shareholder::selectRaw("
            CASE
                WHEN LOWER(TRIM(gender)) IN ('male','m') THEN 'male'
                WHEN LOWER(TRIM(gender)) IN ('female','f') THEN 'female'
                ELSE 'other'
            END AS gender_category
        ")
        ->selectRaw('COUNT(*) as count')
        ->groupBy('gender_category')
        ->pluck('count', 'gender_category');

        // 6. Agro Forest Analysis
        $agroForestStats = [
            'total_hectares' => AgroForest::sum('number_of_hectares'),
            'total_establishment_cost' => AgroForest::sum('establish_cost'),
            'avg_hectares_per_forest' => AgroForest::avg('number_of_hectares'),
            'avg_cost_per_hectare' => 0, // Will calculate below
        ];

        // Calculate average cost per hectare
        $totalHectares = $agroForestStats['total_hectares'];
        $totalCost = $agroForestStats['total_establishment_cost'];
        if ($totalHectares > 0) {
            $agroForestStats['avg_cost_per_hectare'] = round($totalCost / $totalHectares, 2);
        }

        // Species analysis
        $speciesCount = AgroForestSpecies::count();
        $totalPlants = AgroForestSpecies::sum('no_of_plants');
        $speciesDistribution = AgroForestSpecies::selectRaw('species_name, COUNT(*) as forest_count, SUM(no_of_plants) as total_plants')
            ->groupBy('species_name')
            ->orderBy('total_plants', 'desc')
            ->get()
            ->map(function($species) {
                return [
                    'name' => $species->species_name,
                    'forest_count' => $species->forest_count,
                    'total_plants' => (int) $species->total_plants
                ];
            });

        // 7. Geographic Distribution
        $provinceDistribution = AgroForest::selectRaw('province_name, COUNT(*) as count, SUM(number_of_hectares) as total_hectares')
            ->whereNotNull('province_name')
            ->groupBy('province_name')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function($province) {
                return [
                    'name' => $province->province_name,
                    'count' => $province->count,
                    'total_hectares' => (float) $province->total_hectares
                ];
            });

        // 8. Financial Summary
        $financialSummary = [
            'total_asset_value' => (float) $totalAssetValue,
            'total_share_capital' => (float) $shareholderStats['total_share_capital'],
            'total_forest_establishment_cost' => (float) $totalCost,
            'combined_enterprise_value' => (float) ($totalAssetValue + $shareholderStats['total_share_capital'] + $totalCost),
        ];

        // 9. Performance Indicators
        $performanceIndicators = [
            'enterprises_with_assets' => Agro::whereHas('assets')->count(),
            'enterprises_with_shareholders' => Agro::whereHas('shareholders')->count(),
            'enterprises_with_business_plans' => Agro::whereNotNull('business_plan')->count(),
            'asset_utilization_rate' => $totalEnterprises > 0 ? round(($totalAssets / $totalEnterprises) * 100, 1) : 0,
            'shareholder_participation_rate' => $totalEnterprises > 0 ? round(($totalShareholders / $totalEnterprises) * 100, 1) : 0,
        ];

        return [
            // Basic counts
            'total_enterprises' => $totalEnterprises,
            'total_shareholders' => $totalShareholders,
            'total_assets' => $totalAssets,
            'total_agro_forests' => $totalAgroForests,
            
            // Registration analysis
            'registration_institutes' => $registrationInstitutes,
            
            // Business analysis
            'business_nature' => $businessNature,
            
            // Asset analysis
            'total_asset_value' => (float) $totalAssetValue,
            'avg_asset_value' => (float) $avgAssetValue,
            'asset_distribution' => $assetDistribution,
            
            // Shareholder analysis
            'shareholder_stats' => $shareholderStats,
            'shareholder_gender' => $shareholderGender,
            
            // Agro forest analysis
            'agro_forest_stats' => $agroForestStats,
            'species_count' => $speciesCount,
            'total_plants' => (int) $totalPlants,
            'species_distribution' => $speciesDistribution,
            
            // Geographic distribution
            'province_distribution' => $provinceDistribution,
            
            // Financial summary
            'financial_summary' => $financialSummary,
            
            // Performance indicators
            'performance_indicators' => $performanceIndicators,
        ];
    }

    private function calculateNRMStats()
    {
        // 1. NRM Training Program Statistics
        $totalTrainingPrograms = NrmTraining::count();
        $totalParticipants = NrmParticipant::count();
        $totalNutrientHomeGardens = NutrientHomeGarden::count();

        // 2. Training Program Analysis
        $trainingPrograms = NrmTraining::all();
        
        // Training cost analysis
        $totalTrainingCost = $trainingPrograms->sum(function($program) {
            return is_numeric($program->training_program_cost) ? (float) $program->training_program_cost : 0;
        });
        
        $totalResourcePersonPayment = $trainingPrograms->sum(function($program) {
            return is_numeric($program->resource_person_payment) ? (float) $program->resource_person_payment : 0;
        });

        // 3. Geographic Distribution of Training Programs
        $provinceDistribution = $trainingPrograms->groupBy('province_name')->map->count();
        $districtDistribution = $trainingPrograms->groupBy('district')->map->count();
        $dsDivisionDistribution = $trainingPrograms->groupBy('ds_division_name')->map->count();

        // 4. Crop-wise Training Analysis
        $cropDistribution = $trainingPrograms->groupBy('crop_name')->map->count();

        // 5. Participant Analysis
        $participants = NrmParticipant::all();
        
        // Gender distribution
        $participantGender = $participants->groupBy('gender')->map->count();
        
        // Age group analysis
        $youthParticipants = $participants->where('youth', 'yes')->count();
        $adultParticipants = $participants->where('youth', 'no')->count();
        
        // Average age
        $avgAge = $participants->whereNotNull('age')->avg('age');

        // 6. Training Program Performance Metrics
        $avgParticipantsPerProgram = $totalTrainingPrograms > 0 ? round($totalParticipants / $totalTrainingPrograms, 1) : 0;
        $avgCostPerProgram = $totalTrainingPrograms > 0 ? round($totalTrainingCost / $totalTrainingPrograms, 2) : 0;
        $avgCostPerParticipant = $totalParticipants > 0 ? round($totalTrainingCost / $totalParticipants, 2) : 0;

        // 7. Nutrient Rich Home Garden Analysis
        $homeGardens = NutrientHomeGarden::all();
        
        // Total area and cost analysis
        $totalGardenArea = $homeGardens->sum('total_acres');
        $totalGardenCost = $homeGardens->sum('total_cost');
        $avgGardenArea = $totalNutrientHomeGardens > 0 ? round($totalGardenArea / $totalNutrientHomeGardens, 2) : 0;
        $avgGardenCost = $totalNutrientHomeGardens > 0 ? round($totalGardenCost / $totalNutrientHomeGardens, 2) : 0;

        // Production focus analysis
        $productionFocus = $homeGardens->groupBy('production_focus')->map->count();

        // Crop analysis for home gardens
        $gardenCropDistribution = $homeGardens->groupBy('crop_name')->map->count();

        // 8. Financial Analysis
        $totalCreditAmount = $homeGardens->sum('credit_amount');
        $totalCreditBalance = $homeGardens->sum('credit_balance');
        $creditUtilization = $totalCreditAmount > 0 ? round((($totalCreditAmount - $totalCreditBalance) / $totalCreditAmount) * 100, 1) : 0;

        // 9. Resource Person Analysis
        $resourcePersons = $trainingPrograms->groupBy('resource_person_name')->map->count();
        $topResourcePersons = $resourcePersons->sortDesc()->take(10);

        // 10. Venue Analysis
        $venueDistribution = $trainingPrograms->groupBy('venue')->map->count();

        // 11. Time-based Analysis (if date field is properly formatted)
        $monthlyTrainingDistribution = $trainingPrograms->groupBy(function($program) {
            try {
                return \Carbon\Carbon::parse($program->date)->format('Y-m');
            } catch (\Exception $e) {
                return 'Unknown';
            }
        })->map->count();

        // 12. Performance Indicators
        $performanceIndicators = [
            'training_program_completion_rate' => 100, // Assuming all programs are completed
            'participant_retention_rate' => 100, // Would need additional data to calculate
            'cost_efficiency_score' => $avgCostPerParticipant > 0 ? round(100 - min($avgCostPerParticipant / 100, 1) * 100, 1) : 0,
            'geographic_coverage_score' => $provinceDistribution->count() > 0 ? round(($provinceDistribution->count() / 9) * 100, 1) : 0, // Assuming 9 provinces
        ];

        // 13. Integration with Other Modules
        $integratedStats = [
            'beneficiaries_with_nrm_training' => NrmParticipant::whereHas('nrmTraining')->distinct('nic')->count(),
            'beneficiaries_with_home_gardens' => NutrientHomeGarden::distinct('beneficiary_id')->count(),
            'total_beneficiaries_reached' => max(
                NrmParticipant::distinct('nic')->count(),
                NutrientHomeGarden::distinct('beneficiary_id')->count()
            ),
        ];

        return [
            // Basic counts
            'total_training_programs' => $totalTrainingPrograms,
            'total_participants' => $totalParticipants,
            'total_nutrient_home_gardens' => $totalNutrientHomeGardens,
            
            // Financial metrics
            'total_training_cost' => (float) $totalTrainingCost,
            'total_resource_person_payment' => (float) $totalResourcePersonPayment,
            'total_garden_cost' => (float) $totalGardenCost,
            'total_credit_amount' => (float) $totalCreditAmount,
            'total_credit_balance' => (float) $totalCreditBalance,
            'credit_utilization_rate' => $creditUtilization,
            
            // Area metrics
            'total_garden_area' => (float) $totalGardenArea,
            'avg_garden_area' => $avgGardenArea,
            'avg_garden_cost' => $avgGardenCost,
            
            // Performance metrics
            'avg_participants_per_program' => $avgParticipantsPerProgram,
            'avg_cost_per_program' => $avgCostPerProgram,
            'avg_cost_per_participant' => $avgCostPerParticipant,
            'avg_participant_age' => $avgAge ? round($avgAge, 1) : 0,
            
            // Demographics
            'participant_gender' => $participantGender,
            'youth_participants' => $youthParticipants,
            'adult_participants' => $adultParticipants,
            
            // Geographic distribution
            'province_distribution' => $provinceDistribution,
            'district_distribution' => $districtDistribution,
            'ds_division_distribution' => $dsDivisionDistribution,
            
            // Content analysis
            'crop_distribution' => $cropDistribution,
            'garden_crop_distribution' => $gardenCropDistribution,
            'production_focus' => $productionFocus,
            
            // Resource analysis
            'resource_persons' => $resourcePersons,
            'top_resource_persons' => $topResourcePersons,
            'venue_distribution' => $venueDistribution,
            
            // Time analysis
            'monthly_training_distribution' => $monthlyTrainingDistribution,
            
            // Performance indicators
            'performance_indicators' => $performanceIndicators,
            
            // Integration stats
            'integrated_stats' => $integratedStats,
        ];
    }

    private function calculateFFSStats()
    {
        // 1. Basic FFS Training Program Statistics
        $totalTrainingPrograms = FFSTraining::count();
        $totalParticipants = FFSParticipant::count();
        
        // 2. Financial Analysis
        $trainingPrograms = FFSTraining::all();
        
        // Total costs
        $totalProgramCost = $trainingPrograms->sum(function($program) {
            return is_numeric($program->training_program_cost) ? (float) $program->training_program_cost : 0;
        });
        
        $totalResourcePersonPayment = $trainingPrograms->sum(function($program) {
            return is_numeric($program->resource_person_payment) ? (float) $program->resource_person_payment : 0;
        });
        
        $totalTrainingCost = $totalProgramCost + $totalResourcePersonPayment;
        
        // 3. Geographic Distribution
        $provinceDistribution = $trainingPrograms->groupBy('province_name')->map->count();
        $districtDistribution = $trainingPrograms->groupBy('district')->map->count();
        $dsDivisionDistribution = $trainingPrograms->groupBy('ds_division_name')->map->count();
        
        // 4. Crop-wise Training Analysis
        $cropDistribution = $trainingPrograms->groupBy('crop_name')->map->count();
        
        // 5. Resource Person Analysis
        $resourcePersons = $trainingPrograms->groupBy('resource_person_name')->map->count();
        $topResourcePersons = $resourcePersons->sortDesc()->take(10);
        
        // 6. Venue Analysis
        $venueDistribution = $trainingPrograms->groupBy('venue')->map->count();
        
        // 7. Participant Analysis
        $participants = FFSParticipant::all();
        
        // Gender distribution
        $participantGender = $participants->groupBy('gender')->map->count();
        
        // Age group analysis
        $youthParticipants = $participants->where('youth', 'yes')->count();
        $adultParticipants = $participants->where('youth', 'no')->count();
        
        // Average age
        $avgAge = $participants->whereNotNull('age')->avg('age');
        
        // 8. Training Program Performance Metrics
        $avgParticipantsPerProgram = $totalTrainingPrograms > 0 ? round($totalParticipants / $totalTrainingPrograms, 1) : 0;
        $avgCostPerProgram = $totalTrainingPrograms > 0 ? round($totalTrainingCost / $totalTrainingPrograms, 2) : 0;
        $avgCostPerParticipant = $totalParticipants > 0 ? round($totalTrainingCost / $totalParticipants, 2) : 0;
        
        // 9. Time-based Analysis
        $monthlyTrainingDistribution = $trainingPrograms->groupBy(function($program) {
            try {
                return \Carbon\Carbon::parse($program->date)->format('Y-m');
            } catch (\Exception $e) {
                return 'Unknown';
            }
        })->map->count();
        
        // 10. Program Number Analysis
        $programNumbers = $trainingPrograms->pluck('program_number')->filter()->unique()->count();
        
        // 11. Agrarian Service Center Analysis
        $asCenterDistribution = $trainingPrograms->groupBy('as_center')->map->count();
        
        // 12. Designation Analysis (from participants)
        $designationDistribution = $participants->groupBy('designation')->map->count();
        
        // 13. Contact Analysis
        $participantsWithContact = $participants->whereNotNull('contact_number')->count();
        $contactCoverage = $totalParticipants > 0 ? round(($participantsWithContact / $totalParticipants) * 100, 1) : 0;
        
        // 14. Performance Indicators
        $performanceIndicators = [
            'training_program_completion_rate' => 100, // Assuming all programs are completed
            'participant_retention_rate' => 100, // Would need additional data to calculate
            'cost_efficiency_score' => $avgCostPerParticipant > 0 ? round(100 - min($avgCostPerParticipant / 1000, 1) * 100, 1) : 0,
            'geographic_coverage_score' => $provinceDistribution->count() > 0 ? round(($provinceDistribution->count() / 9) * 100, 1) : 0, // Assuming 9 provinces
            'contact_coverage_rate' => $contactCoverage,
        ];
        
        // 15. Integration with Other Modules
        $integratedStats = [
            'beneficiaries_with_ffs_training' => FFSParticipant::distinct('nic')->count(),
            'unique_training_programs' => $programNumbers,
            'total_beneficiaries_reached' => FFSParticipant::distinct('nic')->count(),
        ];
        
        // 16. Financial Summary
        $financialSummary = [
            'total_program_cost' => (float) $totalProgramCost,
            'total_resource_person_payment' => (float) $totalResourcePersonPayment,
            'total_training_cost' => (float) $totalTrainingCost,
            'avg_cost_per_program' => $avgCostPerProgram,
            'avg_cost_per_participant' => $avgCostPerParticipant,
        ];
        
        // 17. Demographics Summary
        $demographicsSummary = [
            'total_participants' => $totalParticipants,
            'male_participants' => $participantGender['male'] ?? 0,
            'female_participants' => $participantGender['female'] ?? 0,
            'youth_participants' => $youthParticipants,
            'adult_participants' => $adultParticipants,
            'avg_participant_age' => $avgAge ? round($avgAge, 1) : 0,
        ];
        
        // 18. Top Performing Areas
        $topPerformingAreas = [
            'top_provinces' => $provinceDistribution->sortDesc()->take(5),
            'top_districts' => $districtDistribution->sortDesc()->take(5),
            'top_crops' => $cropDistribution->sortDesc()->take(5),
            'top_venues' => $venueDistribution->sortDesc()->take(5),
            'top_resource_persons' => $topResourcePersons,
        ];
        
        return [
            // Basic counts
            'total_training_programs' => $totalTrainingPrograms,
            'total_participants' => $totalParticipants,
            'unique_program_numbers' => $programNumbers,
            
            // Financial metrics
            'financial_summary' => $financialSummary,
            
            // Demographics
            'demographics_summary' => $demographicsSummary,
            
            // Performance metrics
            'avg_participants_per_program' => $avgParticipantsPerProgram,
            'performance_indicators' => $performanceIndicators,
            
            // Geographic distribution
            'province_distribution' => $provinceDistribution,
            'district_distribution' => $districtDistribution,
            'ds_division_distribution' => $dsDivisionDistribution,
            'as_center_distribution' => $asCenterDistribution,
            
            // Content analysis
            'crop_distribution' => $cropDistribution,
            'designation_distribution' => $designationDistribution,
            
            // Resource analysis
            'resource_persons' => $resourcePersons,
            'top_resource_persons' => $topResourcePersons,
            'venue_distribution' => $venueDistribution,
            
            // Time analysis
            'monthly_training_distribution' => $monthlyTrainingDistribution,
            
            // Top performing areas
            'top_performing_areas' => $topPerformingAreas,
            
            // Integration stats
            'integrated_stats' => $integratedStats,
        ];
    }

    private function calculateNutritionStats()
    {
        // 1. Basic Nutrition Training Program Statistics
        $totalNutritionPrograms = Nutrition::count();
        $totalTrainees = NutritionTrainee::count();
        
        // 2. Financial Analysis
        $nutritionPrograms = Nutrition::all();
        
        // Total costs
        $totalProgramCost = $nutritionPrograms->sum(function($program) {
            return is_numeric($program->cost_of_training_program) ? (float) $program->cost_of_training_program : 0;
        });
        
        $avgCostPerProgram = $totalNutritionPrograms > 0 ? round($totalProgramCost / $totalNutritionPrograms, 2) : 0;
        $avgCostPerTrainee = $totalTrainees > 0 ? round($totalProgramCost / $totalTrainees, 2) : 0;
        
        // 3. Geographic Distribution
        $provinceDistribution = $nutritionPrograms->groupBy('province_name')->map->count();
        $districtDistribution = $nutritionPrograms->groupBy('district_name')->map->count();
        $dsDivisionDistribution = $nutritionPrograms->groupBy('ds_division_name')->map->count();
        $ascDistribution = $nutritionPrograms->groupBy('asc_name')->map->count();
        
        // 4. Program Type Analysis
        $programTypeDistribution = $nutritionPrograms->groupBy('program_type')->map->count();
        
        // 5. Program Conductor Analysis
        $conductors = $nutritionPrograms->groupBy('program_conductor')->map->count();
        $topConductors = $conductors->sortDesc()->take(10);
        
        // 6. Location Analysis
        $locationDistribution = $nutritionPrograms->groupBy('location')->map->count();
        
        // 7. Trainee Analysis
        $trainees = NutritionTrainee::all();
        
        // Gender distribution
        $traineeGender = $trainees->groupBy('gender')->map->count();
        
        // Age group analysis
        $ageGroups = [
            'youth' => $trainees->filter(function($trainee) {
                $age = is_numeric($trainee->age) ? (int) $trainee->age : 0;
                return $age >= 18 && $age < 30;
            })->count(),
            'adult' => $trainees->filter(function($trainee) {
                $age = is_numeric($trainee->age) ? (int) $trainee->age : 0;
                return $age >= 30 && $age < 60;
            })->count(),
            'senior' => $trainees->filter(function($trainee) {
                $age = is_numeric($trainee->age) ? (int) $trainee->age : 0;
                return $age >= 60;
            })->count(),
        ];
        
        // Average age
        $avgAge = $trainees->whereNotNull('age')->filter(function($trainee) {
            return is_numeric($trainee->age);
        })->avg(function($trainee) {
            return (float) $trainee->age;
        });
        
        // 8. Education Level Analysis
        $educationDistribution = $trainees->groupBy('education_level')->map->count();
        
        // 9. Income Level Analysis
        $incomeDistribution = $trainees->groupBy('income_level')->map->count();
        
        // 10. Performance Metrics
        $avgTraineesPerProgram = $totalNutritionPrograms > 0 ? round($totalTrainees / $totalNutritionPrograms, 1) : 0;
        
        // 11. Time-based Analysis
        $monthlyProgramDistribution = $nutritionPrograms->groupBy(function($program) {
            try {
                return \Carbon\Carbon::parse($program->date)->format('Y-m');
            } catch (\Exception $e) {
                return 'Unknown';
            }
        })->map->count();
        
        // 12. Contact Analysis
        $traineesWithContact = $trainees->whereNotNull('mobile_number')->count();
        $contactCoverage = $totalTrainees > 0 ? round(($traineesWithContact / $totalTrainees) * 100, 1) : 0;
        
        // 13. Special Remarks Analysis
        $traineesWithRemarks = $trainees->whereNotNull('special_remark')->count();
        $remarksCoverage = $totalTrainees > 0 ? round(($traineesWithRemarks / $totalTrainees) * 100, 1) : 0;
        
        // 14. Performance Indicators
        $performanceIndicators = [
            'program_completion_rate' => 100, // Assuming all programs are completed
            'trainee_retention_rate' => 100, // Would need additional data to calculate
            'cost_efficiency_score' => $avgCostPerTrainee > 0 ? round(100 - min($avgCostPerTrainee / 1000, 1) * 100, 1) : 0,
            'geographic_coverage_score' => $provinceDistribution->count() > 0 ? round(($provinceDistribution->count() / 9) * 100, 1) : 0, // Assuming 9 provinces
            'contact_coverage_rate' => $contactCoverage,
            'remarks_coverage_rate' => $remarksCoverage,
        ];
        
        // 15. Integration with Other Modules
        $integratedStats = [
            'beneficiaries_with_nutrition_training' => NutritionTrainee::distinct('nic')->count(),
            'unique_program_types' => $programTypeDistribution->count(),
            'total_beneficiaries_reached' => NutritionTrainee::distinct('nic')->count(),
        ];
        
        // 16. Financial Summary
        $financialSummary = [
            'total_program_cost' => (float) $totalProgramCost,
            'avg_cost_per_program' => $avgCostPerProgram,
            'avg_cost_per_trainee' => $avgCostPerTrainee,
        ];
        
        // 17. Demographics Summary
        $demographicsSummary = [
            'total_trainees' => $totalTrainees,
            'male_trainees' => $traineeGender['male'] ?? 0,
            'female_trainees' => $traineeGender['female'] ?? 0,
            'youth_trainees' => $ageGroups['youth'],
            'adult_trainees' => $ageGroups['adult'],
            'senior_trainees' => $ageGroups['senior'],
            'avg_trainee_age' => $avgAge ? round($avgAge, 1) : 0,
        ];
        
        // 18. Top Performing Areas
        $topPerformingAreas = [
            'top_provinces' => $provinceDistribution->sortDesc()->take(5),
            'top_districts' => $districtDistribution->sortDesc()->take(5),
            'top_program_types' => $programTypeDistribution->sortDesc()->take(5),
            'top_locations' => $locationDistribution->sortDesc()->take(5),
            'top_conductors' => $topConductors,
        ];
        
        return [
            // Basic counts
            'total_nutrition_programs' => $totalNutritionPrograms,
            'total_trainees' => $totalTrainees,
            'unique_program_types' => $programTypeDistribution->count(),
            
            // Financial metrics
            'financial_summary' => $financialSummary,
            
            // Demographics
            'demographics_summary' => $demographicsSummary,
            
            // Performance metrics
            'avg_trainees_per_program' => $avgTraineesPerProgram,
            'performance_indicators' => $performanceIndicators,
            
            // Geographic distribution
            'province_distribution' => $provinceDistribution,
            'district_distribution' => $districtDistribution,
            'ds_division_distribution' => $dsDivisionDistribution,
            'asc_distribution' => $ascDistribution,
            
            // Content analysis
            'program_type_distribution' => $programTypeDistribution,
            'education_distribution' => $educationDistribution,
            'income_distribution' => $incomeDistribution,
            
            // Resource analysis
            'conductors' => $conductors,
            'top_conductors' => $topConductors,
            'location_distribution' => $locationDistribution,
            
            // Time analysis
            'monthly_program_distribution' => $monthlyProgramDistribution,
            
            // Top performing areas
            'top_performing_areas' => $topPerformingAreas,
            
            // Integration stats
            'integrated_stats' => $integratedStats,
        ];
    }
}