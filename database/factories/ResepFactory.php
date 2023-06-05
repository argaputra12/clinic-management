<?php

namespace Database\Factories;

use App\Models\Medis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resep>
 */
class ResepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rekam_medis_id' => Medis::factory()->create()->id,
            'total_harga' => $this->faker->numberBetween(5000, 10000),
        ];
    }
}