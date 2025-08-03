<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.user_list', compact('users'));
    }

    // Show the form to assign permissions to a user
    public function edit(User $user)
    {
        // Define the modules and actions
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
    'nrm' => 'Natural Resource Management',
    'nrm_participants' => 'NRM Participants',
    'awpb' => 'Annual Work Plan & Budget (AWPB)',
    'costtab' => 'Cost Tab',
    'projectdesignreport' => 'Project Design Report',
    'vegitable' => 'Vegetables',
    'fruit' => 'Fruits',
    'goat' => 'Goat Rearing',
    'dairy' => 'Dairy Farming',
    'poultary' => 'Poultry',
    'aquaculture' => 'Aquaculture',
    'homegarden' => 'Home Garden',
    'other_crops' => 'Other Crops',
    'agriculture' => 'Agriculture List',
    'livestocks' => 'Livestock List',
    'expressions' => 'Expression of Interest (EOI)',
    'nutrient_rich_home_garden' => 'Nutrient Rich Home Garden'
];


        $actions = ['view', 'add', 'edit', 'delete', 'upload_csv'];

        return view('admin.user_permissions', compact('user', 'modules', 'actions', 'moduleLabels'));
    }

    // Handle permission update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'array',
        ]);

        $permissionIds = [];

        foreach ($request->permissions ?? [] as $permission) {
            [$module, $action] = explode('|', $permission);

            $perm = Permission::firstOrCreate([
                'module' => $module,
                'action' => $action,
            ]);

            $permissionIds[] = $perm->id;
        }

        $user->permissions()->sync($permissionIds);

        return redirect()->back()->with('success', 'Permissions updated successfully for ' . $user->name);
    }
}
