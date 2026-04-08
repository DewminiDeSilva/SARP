<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Demo account: view-only access across all permission modules.
 * Keep module list in sync with App\Http\Controllers\Admin\UserPermissionController::edit().
 *
 * Run: php artisan db:seed --class=ViewOnlyDemoUserSeeder
 */
class ViewOnlyDemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            'staff_profile', 'beneficiary', 'family', 'training', 'livestock', 'agri', 'nutrition', 'nutrition_trainee',
            'ffs-training', 'ffs-participants', 'cdf', 'cdfmembers', 'farmerorganization', 'farmermember',
            'asc_registration', 'grievances', 'officer', 'tank_rehabilitation', 'feeder_road_development', 'fingerling', 'infrastructure',
            'gallery', 'agro', 'shareholder', 'bene_form', 'nrm', 'nrm_participants', 'youth_training', 'youth_training_participants', 'awpb',
            'costtab', 'projectdesignreport', 'vegitable', 'fruit', 'goat', 'dairy', 'poultary',
            'aquaculture', 'homegarden', 'other_crops', 'agriculture', 'livestocks',
            'expressions', 'nutrient_rich_home_garden', 'fourp_training', 'fourp_training_participants', 'tank_training', 'tank_training_participants', 'livestock_training', 'agriculture_training', 'agriculture_training_participants', 'livestock_training_participants',
        ];

        $user = User::updateOrCreate(
            ['email' => 'sarp@sarp.lk'],
            [
                'name' => 'View-only demo',
                'password' => 'sarp123',
                'role' => 'user',
                'profile_photo' => 'profile_photos/farmer_demo.png',
            ]
        );

        $permissionIds = [];
        foreach ($modules as $module) {
            $permissionIds[] = Permission::firstOrCreate(
                ['module' => $module, 'action' => 'view'],
            )->id;
        }

        $user->permissions()->sync($permissionIds);
    }
}
