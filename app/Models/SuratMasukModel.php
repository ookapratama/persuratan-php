<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuratMasukModel extends Model
{
    protected $table = 'tbl_surat_masuk';
    
    public function allData() {
        return DB::table('tbl_surat_masuk')->get();
    }

    public function detailData($id_suratmasuk) {
        return DB::table('tbl_surat_masuk')
        ->where('id_suratmasuk', $id_suratmasuk)
        ->first();
    }

    public function addData($data) {
        DB::table('tbl_surat_masuk')
        ->insert($data);
    }

    public function editData($id_suratmasuk, $data) {
        DB::table('tbl_surat_masuk')
        ->where('id_suratmasuk', $id_suratmasuk)
        ->update($data);
    }

    public function deleteData($id_suratmasuk) {
        DB::table('tbl_surat_masuk')
        ->where('id_suratmasuk', $id_suratmasuk)
        ->delete();
    }
}
