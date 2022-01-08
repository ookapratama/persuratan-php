<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_surat_masuk', function (Blueprint $table) {
            $table->id('id_suratmasuk');
            $table->date('tgl_terima');
            $table->string('asal_surat');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->string('kode_surat');
            $table->string('file_surat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
