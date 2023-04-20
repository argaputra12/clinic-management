<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rm' => $this->faker->unique()->randomNumber(9),
            'tanggal_kunjungan' => $this->faker->date(),
            'nama_pasien' => $this->faker->name(),
            'tanggal_lahir' => $this->faker->date(),
            'umur' => $this->faker->numberBetween(1, 100),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'no_telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'keluhan' => $this->faker->text(),
        ];
    }
}