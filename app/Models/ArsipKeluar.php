<?php

namespace App\Models;

use App\Models\User;
use App\Models\SuratKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArsipKeluar extends Model
{
    use HasFactory;
    protected $table = 'tbl_arsip_keluar';

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }

    public function suratKeluar()
    {
        return $this->hasOne(SuratKeluar::class, 'id_suratkeluar', 'id_suratkeluar');
    }
}
