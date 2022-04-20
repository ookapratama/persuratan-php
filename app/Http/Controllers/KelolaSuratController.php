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
        $surat = Surat::where("status_arsip", "N")->get();
    
        return view('surat.index', [
            'surat'=>$surat,
        ]);
    }

    public function generate($id) {

        $surat = Surat::find($id);
        $surat->is_generate = 'Y';
        $surat->save();
        return redirect()->route('surat_index');
    }

    public function arsip($id) {
        
        $notif = array(
            'pesan' => 'Surat diarsipkan !',
            'alert' => 'success',
        );

        $surat = Surat::find($id);
        $surat->status_arsip = 'Y';
        $surat->save();
        return redirect()->route('surat_index')->with($notif);
    }

    public function viewUpload($id) {
        $data = [
            'file' => Surat::find($id),
        ];
        return view('vArsip.keluar.uploadFile', $data);
    }

    public function uploadFile(Request $request, $id) {

    }
}
