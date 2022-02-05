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
        $surat = Surat::where("status_setuju", "N")->where("is_print", "N")->get();
    
        return view('surat.index', [
            'surat'=>$surat,
        ]);
    }

    // public function edit($id) {

    //     $surat = Surat::where('id',$id)->first();
        
    
    //     return view('surat.index', [
    //         'surat'=>$surat,
    //     ]);
    // }



    public function generate($id) {
        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->is_print = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('surat_index');
    }
}
