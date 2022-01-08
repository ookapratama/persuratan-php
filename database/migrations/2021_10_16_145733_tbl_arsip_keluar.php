<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblArsipKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_arsip_keluar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_suratkeluar');
            $table->bigInteger('id_admin');
            $table->date('tgl_arsip');
            $table->enum('status_arsip', ['Y','N'])->default('N');
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
