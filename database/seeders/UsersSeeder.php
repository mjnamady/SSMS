<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@user.com',
                'phone' => '0801234',
                'role' => 'Admin',
                'status' => 'active',
                'password' => Hash::make('1234')
            ],
             // Teacher
             [
                'first_name' => 'Teacher',
                'last_name' => 'User',
                'email' => 'teacher@user.com',
                'phone' => '0901234',
                'role' => 'Teacher',
                'status' => 'active',
                'password' => Hash::make('1234')
             ],
              // Student
            [
                'first_name' => 'Student',
                'last_name' => 'User',
                'email' => 'student@user.com',
                'phone' => '0701234',
                'role' => 'Student',
                'status' => 'active',
                'password' => Hash::make('1234')
            ],
             // Admin
             [
                'first_name' => 'Parent',
                'last_name' => 'User',
                'email' => 'parent@user.com',
                'phone' => '0811234',
                'role' => 'Parent',
                'status' => 'active',
                'password' => Hash::make('1234')
            ]
        ]);    
        
    }
}
