<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'address' => '123 Main St',
                'contact_no' => '1234567890',
                'dob' => '1990-01-01',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'john@gmail.com',
                'address' => '456 Secondary St',
                'contact_no' => '0987654321',
                'dob' => '1992-02-02',
                'email_verified_at' => now(),
                'password' => bcrypt('87654321'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
