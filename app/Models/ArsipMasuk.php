<?php

namespace App\Models;

use App\Models\User;
use App\Models\SuratMasukModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArsipMasuk extends Model
{
    use HasFactory;
    protected $table = 'tbl_arsip_masuk';

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }

    public function suratMasuk()
    {
        return $this->hasOne(SuratMasukModel::class, 'id_suratmasuk', 'id_suratmasuk');
    }
}
