<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Main Admin',
            'email' => 'ravindu.chamara2000@gmail.com', // Replace with your admin email
            'password' => bcrypt('1234'), // Replace with your admin password
            'role' => 'admin', // Admin role
        ]);
    }
}
