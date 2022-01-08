<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSuratKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_surat_keluar', function (Blueprint $table) {
            $table->id('id_suratkeluar');
            $table->bigInteger('id_admin');
            $table->date('tgl_keluar');
            $table->string('tujuan_surat');
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('kode_surat');
            $table->string('file_surat');
            $table->string('kd_surat');
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
