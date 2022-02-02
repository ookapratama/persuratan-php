<?php

namespace App\Http\Controllers;
use App\Models\Surat\SuratKetTidakMampu as Surat;

use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $surat = Surat::where("status_setuju", "N")->where("is_generate", "Y")->get();

        return view('vPersetujuan.index', [
            'surat'=>$surat,
        ]);
    }

    public function accepted($id) {
        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->status_setuju = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('index_setuju');
    }

    public function indexAdmin() {
        $surat = Surat::where("status_setuju", "Y")->get();

        return view('vPersetujuan.indexSetuju', [
            'surat'=>$surat,
        ]);
    }

    public function delete($id){
        $data = Surat::find($id);
        $data->delete();

        return redirect()->back()->with('pesan', 'Surat dihapus (ditolak) !');
    }

}
