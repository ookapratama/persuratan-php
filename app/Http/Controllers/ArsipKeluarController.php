<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Surat;

class ArsipKeluarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $surat = Surat::where("status_arsip", "Y")->get();

        return view('vArsip.keluar.index', [
            'arsip'=>$surat,
        ]);
    }

    public function edit($id) {
        

        return view('vArsip.keluar.edit');
    }



}
