<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\Medis;
use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasien = Medis::factory(Pasien::class)->create();
        $dokter = Medis::factory(Dokter::class)->create();

        Medis::factory()->create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $dokter->id,
        ]);
    }
}