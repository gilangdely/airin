<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meteran>
 */
class MeteranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_meteran' => $this->faker->numerify('##########'),
            'id_pelanggan' => Pelanggan::factory(),
            'id_layanan' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'lokasi_pemasangan' => $this->faker->address(),
            'tanggal_pemasangan' => $this->faker->date(),
            'status' => true,
            'chip_kartu' => $this->faker->numerify('##########'),
        ];
    }
}
