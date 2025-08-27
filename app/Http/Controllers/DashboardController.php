<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\TankRehabilitation; 

class DashboardController extends Controller
{
    public function index()
    {
        // load all tanks (id + name)
        $tanks = Tank::select('id', 'tank_name')->orderBy('tank_name')->get();

         $totalTanks = $tanks->count();
    $completedCount = TankRehabilitation::whereRaw('LOWER(status) = ?', ['completed'])->count();
    $ongoingCount = TankRehabilitation::where('status', 'On Going')->count();
    $startedCount   = TankRehabilitation::whereRaw('LOWER(status) = ?', ['started'])->count();

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
    return view('dashboard', compact('tanks','totalTanks','completedCount','ongoingCount','startedCount', 'modules', 'moduleLabels'));
}
}