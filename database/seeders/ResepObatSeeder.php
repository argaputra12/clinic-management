<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Resep;
use App\Models\ResepObat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResepObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resep = ResepObat::factory(Resep::class)->create();
        $obat = ResepObat::factory(Obat::class)->create();

        ResepObat::factory()->create([
            'resep_id' => $resep->id,
            'obat_id' => $obat->id,
        ]);
    }
}