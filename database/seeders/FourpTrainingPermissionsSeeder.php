<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class FourpTrainingPermissionsSeeder extends Seeder
{
    /**
     * Create fourp_training and fourp_training_participants permissions.
     * Run: php artisan db:seed --class=FourpTrainingPermissionsSeeder
     */
    public function run(): void
    {
        $permissions = [
            ['module' => 'fourp_training', 'action' => 'view'],
            ['module' => 'fourp_training', 'action' => 'add'],
            ['module' => 'fourp_training', 'action' => 'edit'],
            ['module' => 'fourp_training', 'action' => 'delete'],
            ['module' => 'fourp_training', 'action' => 'upload_csv'],
            ['module' => 'fourp_training_participants', 'action' => 'view'],
            ['module' => 'fourp_training_participants', 'action' => 'add'],
            ['module' => 'fourp_training_participants', 'action' => 'delete'],
            ['module' => 'fourp_training_participants', 'action' => 'upload_csv'],
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(
                ['module' => $p['module'], 'action' => $p['action']],
                $p
            );
        }
    }
}
