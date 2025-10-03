<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(["name" => "admin"]);
        $teacherRole = Role::firstOrCreate(["name" => "teacher"]);
        $studentRole = Role::firstOrCreate(["name" => "student"]);

        // Create an admin user
        $admin = User::firstOrCreate(
            ["email" => "admin@example.com"],
            [
                "name" => "Admin User",
                "password" => Hash::make("password"),
            ]
        );
        $admin->assignRole($adminRole);

        // Create a teacher user
        $teacher = User::firstOrCreate(
            ["email" => "teacher@example.com"],
            [
                "name" => "Teacher User",
                "password" => Hash::make("password"),
            ]
        );
        $teacher->assignRole($teacherRole);

        // Create a student user
        $student = User::firstOrCreate(
            ["email" => "student@example.com"],
            [
                "name" => "Student User",
                "password" => Hash::make("password"),
            ]
        );
        $student->assignRole($studentRole);
    }
}

