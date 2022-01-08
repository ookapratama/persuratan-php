<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAntar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_antar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kurir');
            $table->bigInteger('id_suratkeluar');
            $table->date('tgl_antar');
            $table->date('tgl_sampai');
            $table->enum('status_antar', ['Y','N'])->default('N');
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
