<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class YouthTrainingPermissionsSeeder extends Seeder
{
    /**
     * Create youth_training and youth_training_participants permissions.
     * Run: php artisan db:seed --class=YouthTrainingPermissionsSeeder
     */
    public function run(): void
    {
        $permissions = [
            ['module' => 'youth_training', 'action' => 'view'],
            ['module' => 'youth_training', 'action' => 'add'],
            ['module' => 'youth_training', 'action' => 'edit'],
            ['module' => 'youth_training', 'action' => 'delete'],
            ['module' => 'youth_training', 'action' => 'upload_csv'],
            ['module' => 'youth_training_participants', 'action' => 'view'],
            ['module' => 'youth_training_participants', 'action' => 'add'],
            ['module' => 'youth_training_participants', 'action' => 'delete'],
            ['module' => 'youth_training_participants', 'action' => 'upload_csv'],
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(
                ['module' => $p['module'], 'action' => $p['action']],
                $p
            );
        }
    }
}
