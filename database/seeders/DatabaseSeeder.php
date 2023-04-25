<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // run seeder from UserSeeder
        $this->call(UserSeeder::class);

        // run seeder from AdminSeeder
        $this->call(AdminSeeder::class);


        // run seeder from DokterSeeder
        $this->call(DokterSeeder::class);

        // run seeder from MedisSeeder
        $this->call(MedisSeeder::class);

        // run seeder from PasienSeeder
        $this->call(PasienSeeder::class);
    }
}