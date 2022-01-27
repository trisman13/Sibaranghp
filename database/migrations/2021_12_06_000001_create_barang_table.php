<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_surat_bukti_penindakan');
            $table->string('nama');
            $table->string('jenis');
            $table->string('kategori')->nullable();
            $table->string('jenis_lain')->nullable();
            $table->float('jumlah', 15, 2);
            $table->string('satuan');
            $table->string('merk')->nullable();
            $table->string('pemilik');
            $table->string('status');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
