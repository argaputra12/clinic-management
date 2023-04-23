<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medis>
 */
class MedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pasien_id' => Pasien::factory()->create()->id,
            'no_rm' => Pasien::factory()->create()->no_rm,
            'tanggal_kunjungan' => $this->faker->date(),
            'nama_pasien' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'tensi' => $this->faker->randomElement(['110/70', '120/80', '130/90']),
            'keluhan' => $this->faker->text(),
            'diagnosa' => $this->faker->text(),
            'tindakan' => $this->faker->text(),
            'nama_dokter' => Dokter::factory()->create()->nama_dokter,
        ];
    }
}
