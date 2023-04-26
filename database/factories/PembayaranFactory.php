<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_bayar' => $this->faker->randomDigitNotZero(),
            'pasien_id' => Pasien::factory()->create()->id,
            'no_rm' => Pasien::factory()->create()->no_rm,
            'tindakan' => $this->faker->text(),
            'alat_medis' => $this->faker->text(),
            'administrasi' => $this->faker->randomDigitNotZero(),
            'total_bayar' => $this->faker->randomDigit(),
            'metode_pembayaran' => $this->faker->randomElement(['Cash', 'Debit', 'Kredit']),
        ];
    }
}