<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasien = Pembayaran::factory(Pasien::class)->create();
        $medis = Pembayaran::factory(Medis::class)->create([
            'pasien_id' => $pasien->id,
        ]);

        Pembayaran::factory()->create([
            'pasien_id' => $pasien->id,
            'rekam_medis_id' => $medis->id,
        ]);
    }
}