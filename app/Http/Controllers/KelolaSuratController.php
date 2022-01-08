<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Surat;

class KelolaSuratController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $surat = Surat::where("status_setuju", "N")->where("is_generate", "N")->get();
    
            return view('v_surat', [
                'surat'=>$surat,
            ]);
    }

    public function generate($id) {
        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->is_generate = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('surat_index');
    }
}
