<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user with role admin
        User::factory()->create([
            'email' => 'user@user.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
    }
}