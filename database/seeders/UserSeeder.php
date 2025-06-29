<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@formautomation.com',
            'password' => Hash::make('password190303'),
        ]);

        User::create([
            'name' => 'Demo User',
            'email' => 'demo@formautomation.com',
            'password' => Hash::make('demo190303'),
        ]);
    }
}
