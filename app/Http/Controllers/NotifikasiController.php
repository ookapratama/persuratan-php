<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Surat;
use App\Models\Disposisi as Disposisi;

class NotifikasiController extends Controller
{
    public function CountUnapprove()
    {
        $count = Disposisi::where("status_setuju", "N")->where("status_disposisi", "Y")->get();
        return $count->count();
    }

    public function CountBelumAntar()
    {
        $count = Surat::where("is_antar", "Y")->where("status_antar", "N")->get();
        return $count->count();
    }
}
