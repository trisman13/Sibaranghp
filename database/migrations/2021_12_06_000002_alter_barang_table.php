<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->index('id_surat_bukti_penindakan');
            $table->foreign('id_surat_bukti_penindakan')
            ->references('id')->on('surat_bukti_penindakan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign(['id_surat_bukti_penindakan']);
            $table->dropIndex(['id_surat_bukti_penindakan']);
        });
    }
}
