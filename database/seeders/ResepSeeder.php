<?php

namespace Database\Seeders;

use App\Models\Medis;
use App\Models\Resep;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medis = Resep::factory(Medis::class)->create();

        Resep::factory()->create([
            'rekam_medis_id' => $medis->id,
        ]);
    }
}
