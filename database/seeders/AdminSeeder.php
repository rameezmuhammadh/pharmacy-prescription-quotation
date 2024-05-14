<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'address' => 'Admin Address',
            'contact_no' => '9876543210',
            'dob' => '1990-01-01',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ])->assignRole('admin');
    }
}
