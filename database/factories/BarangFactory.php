<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SuratBuktiPenindakan as SBP;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $SBPId = SBP::all()->random()->id;
        return [
            'id_surat_bukti_penindakan' => $SBPId,
            'nama' => $this->faker->name(),
            'jenis' => $this->faker->randomElement(['BKC', 'Lainnya']),
            'kategori' => $this->faker->randomElement(['MMEA', 'HT', 'EA', null]),
            'jenis_lain' => $this->faker->randomElement(['X', null]),
            'jumlah' => $this->faker->randomFloat(2, 1, 100),
            'satuan' => $this->faker->randomElement(['Pack', 'Botol', 'Dos']),
            'merk' => $this->faker->randomElement(['Merk X', 'Merk Y', null]),
            'pemilik' => $this->faker->company(),
            'status' => $this->faker->randomElement(['Dimusnahkan', 'BDN', 'BMN']),
        ];
    }
}
