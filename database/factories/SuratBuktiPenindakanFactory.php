<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratBuktiPenindakanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_surat_kep_bdn' => null,
            'nomor_surat' => $this->faker->unique()->randomNumber(6),
            'tanggal_keluar_surat' => $this->faker->dateTimeBetween('-1 years', '+1 years')->format('Y-m-d'),
        ];
    }
}
