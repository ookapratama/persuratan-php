<?php

namespace App\Http\Controllers;
use App\Models\Disposisi as Surat;

use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $surat = Surat::where("status_setuju", "N")->where("status_disposisi", "Y")->get();

        return view('vPersetujuan.index', [
            'disposisi' => $surat,
        ]);
    }

    public function accepted($id) {

        $notif = array(
            'pesan' => 'Surat disetujui',
            'alert' => 'success',
        );

        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->status_setuju = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('index_setuju')->with($notif);
    }

    public function indexSetuju() {
        $surat = Surat::where("status_setuju", "Y")->where("status_arsip", "N")->get();

        return view('vPersetujuan.indexSetuju', [
            'surat'=>$surat,
        ]);
    }

    public function arsip($id) {

        $notif = array(
            'pesan' => 'Surat di Arsipkan !',
            'alert' => 'info',
        );

        //cari suratnya 
        $surat = Surat::find($id);
        //ubah status
        $surat->status_arsip = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('index_setujuSurat')->with($notif);
    }

    public function delete($id){
        $data = Surat::find($id);
        $data->delete();

        return redirect()->back()->with('pesan', 'Surat dihapus (ditolak) !');
    }

}
