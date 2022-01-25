<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratBuktiPenindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_bukti_penindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_surat_kep_bdn')->nullable();
            $table->string('nomor_surat',30);
            $table->date('tanggal_keluar_surat');
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
        Schema::dropIfExists('surat_bukti_penindakan');
    }
}
