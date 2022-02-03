<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SuratBuktiPenindakan::factory(10)->create();
        \App\Models\Barang::factory(10)->create();
        \App\Models\Satuan::factory(3)->create();
    }
}
