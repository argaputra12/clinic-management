<?php

namespace Database\Factories;

use App\Models\Obat;
use App\Models\Resep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResepObat>
 */
class ResepObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resep_id' => Resep::factory()->create()->id,
            'obat_id' => Obat::factory()->create()->id,
            'jumlah' => $this->faker->numberBetween(1, 5),
        ];
    }
}