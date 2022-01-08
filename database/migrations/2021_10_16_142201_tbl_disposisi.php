<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDisposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_disposisi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_admin');
            $table->bigInteger('id_pimpinan');
            $table->bigInteger('id_suratmasuk');
            $table->date('tgl_disposisi');
            $table->string('catatan');
            $table->enum('status_disposisi', ['Y','N'])->default('N');
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
