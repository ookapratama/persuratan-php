<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKetTidakMampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_ket_tidak_mampus', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->integer('user_approve');
            $table->string('nama_pemohon');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('nik');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->boolean('status')->default(false);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_ket_tidak_mampus');
    }
}
