<?php

namespace App\Http\Controllers;
use App\Models\Surat\SuratKetTidakMampu as Surat;

use Illuminate\Http\Request;

class AntarSuratController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
        $surat = Surat::where("is_antar", "Y")->get();

        return view('vAntar.index', [
            'antar' => $surat,
        ]);
    }

    public function antar($id) {
        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->status_antar = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('index_antar');
    }
}
