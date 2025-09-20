<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Database\Factories\BranchFactory;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Branch::factory()->count(3)->create();

        User::create([
            'name' => 'Admin1',
            'role' => 'Staff',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin123'),
            'staff_branch_id' => 1
        ]);
        User::create([
            'name' => 'Admin2',
            'role' => 'Staff',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin123'),
            'staff_branch_id' => 2
        ]);
        User::create([
            'name' => 'Admin3',
            'role' => 'Staff',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('admin123'),
            'staff_branch_id' => 3
        ]);
    }
}
