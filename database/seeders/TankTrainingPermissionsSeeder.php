<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class TankTrainingPermissionsSeeder extends Seeder
{
    /**
     * Create tank_training and tank_training_participants permissions.
     * Run: php artisan db:seed --class=TankTrainingPermissionsSeeder
     */
    public function run(): void
    {
        $permissions = [
            ['module' => 'tank_training', 'action' => 'view'],
            ['module' => 'tank_training', 'action' => 'add'],
            ['module' => 'tank_training', 'action' => 'edit'],
            ['module' => 'tank_training', 'action' => 'delete'],
            ['module' => 'tank_training', 'action' => 'upload_csv'],
            ['module' => 'tank_training_participants', 'action' => 'view'],
            ['module' => 'tank_training_participants', 'action' => 'add'],
            ['module' => 'tank_training_participants', 'action' => 'delete'],
            ['module' => 'tank_training_participants', 'action' => 'upload_csv'],
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(
                ['module' => $p['module'], 'action' => $p['action']],
                $p
            );
        }
    }
}
