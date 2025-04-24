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
            'staff_profile', 'beneficiary', 'family', 'training', 'livestock', 'nutrition', 'nutrition_trainee',
            'ffs_training', 'ffs_participants', 'cdf', 'cdfmembers', 'farmerorganization', 'farmermember',
            'asc_registration', 'grievances', 'officer', 'tank_rehabilitation', 'fingerling', 'infrastructure',
            'gallery', 'agro', 'shareholder', 'bene_form', 'nrm', 'nrm_participants', 'awpb',
            'costtab', 'projectdesignreport', 'vegitable', 'fruit', 'goat', 'dairy', 'poultary',
            'aquaculture', 'homegarden', 'other_crops', 'agriculture', 'livestocks', 'expressions'
        ];


        $actions = ['view', 'edit', 'delete', 'upload_csv'];

        return view('admin.user_permissions', compact('user', 'modules', 'actions'));
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
