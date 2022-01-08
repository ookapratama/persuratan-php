<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SuratKeluar;

class Antar extends Model
{
    use HasFactory;
    protected $table = 'tbl_antar';

    public function kurir()
    {
        return $this->hasOne(User::class, 'id', 'id_kurir');
    }

    public function suratKeluar()
    {
        return $this->hasOne(SuratKeluar::class, 'id_suratkeluar', 'id_suratkeluar');
    }
}
