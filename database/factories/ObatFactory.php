<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_obat' => $this->faker->name,
            'satuan' => $this->faker->randomElement(['mg', 'ml', 'gram', 'pcs']),
            'harga' => $this->faker->numberBetween(1000, 5000)
        ];
    }
}