<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Satuan;

class SatuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->randomElement(['Pack', 'Botol', 'Dos']),
            'nama' => $this->faker->randomElement(['Pack', 'Botol', 'Dos']),
        ];
    }
}
