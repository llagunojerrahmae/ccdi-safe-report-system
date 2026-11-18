<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestAccountsSeeder extends Seeder
{
    public function run(): void
    {
        // Test faculty (pre-approved, naka-link sa roster na FAC-0111)
        User::updateOrCreate(
            ['email' => 'testfaculty@ccdi.edu.ph'],
            [
                'name' => 'Test Faculty',
                'password' => Hash::make('TestFaculty123'),
                'role' => 'faculty',
                'status' => 'approved',
                'faculty_id' => 'FAC-0111',
                'department' => 'Test Department', // palitan ayon sa mga department ninyo
            ]
        );

        // Admin
        User::updateOrCreate(
            ['email' => 'testadmin@ccdi.edu.ph'], // o ang email na ginagamit mo na sa admin login
            [
                'name' => 'Test Admin',
                'password' => Hash::make('TestAdmin123'), // palitan kung gusto mo
                'role' => 'admin',
                'status' => 'approved',
            ]
        );
    }
}