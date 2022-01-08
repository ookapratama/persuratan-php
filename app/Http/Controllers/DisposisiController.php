<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi as Disposisi;
use App\Models\User;


class DisposisiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $disposisi = Disposisi::all();
        $data = [
            'disposisi' => $disposisi,
        ];
        return view('v_disposisi', $data);
    }

    public function add() {
        $data = User::all()->where('level_id', 2);
        return view('v_addDisposisi', ['user_approve'=>$data]);
    }

    public function insert(Request $request) {
        $request->validate([
            'perihal' => 'required|max:100',
            'tgl_surat' => 'required',
            'no_surat' => 'required|max:100',
            'kode_surat' => 'required|max:50',
            'asal_surat' => 'required|max:100',
            'tgl_terima' => 'required',
            'tgl_selesai' => 'required',
            'tgl_disposisi' => 'required',
            'isi_disposisi' => 'required',
            'isi_ringkas' => 'required|max:255',
            'file_surat' => 'required',
        ]);

        $request->file('file_surat')->store('public');

        $data = new Disposisi();

        $data->user_approve = $request->get('user_approve');
        $data->perihal = $request->get('perihal');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->no_surat = $request->get('no_surat');
        $data->kode_surat = $request->get('kode_surat');
        $data->asal_surat = $request->get('asal_surat');
        $data->tgl_terima = $request->get('tgl_terima');
        $data->tgl_selesai = $request->get('tgl_selesai');
        $data->tgl_disposisi = $request->get('tgl_disposisi');
        $data->isi_disposisi = $request->get('isi_disposisi');
        $data->isi_ringkas = $request->get('isi_ringkas');
        $data->file_surat = $request->file('file_surat')->hashName(); 
        
        $data->save();
        
        return redirect()->route('disposisi')->with('pesan', 'Surat berhasil ditambah !');
    }

    public function edit($id) {
        $data = [
            'disposisi' => Disposisi::findOrFail($id),
        ];

        $data2 = User::all()->where('level_id', 2);
        return view('v_editDisposisi', $data, ['user_approve'=>$data2]);
    }

    public function update(Request $request, $id) {
        $data = Disposisi::findOrFail($id);

        $request->validate([
            'perihal' => 'required|max:100',
            'tgl_surat' => 'required',
            'no_surat' => 'required|max:100',
            'kode_surat' => 'required|max:50',
            'asal_surat' => 'required|max:100',
            'tgl_terima' => 'required',
            'tgl_selesai' => 'required',
            'tgl_disposisi' => 'required',
            'isi_disposisi' => 'required',
            'isi_ringkas' => 'required|max:255',
            'file_surat' => 'required|mimes:pdf',
        ]);

        $data->user_approve = $request->get('user_approve');
        $data->perihal = $request->get('perihal');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->no_surat = $request->get('no_surat');
        $data->kode_surat = $request->get('kode_surat');
        $data->asal_surat = $request->get('asal_surat');
        $data->tgl_terima = $request->get('tgl_terima');
        $data->tgl_selesai = $request->get('tgl_selesai');
        $data->tgl_disposisi = $request->get('tgl_disposisi');
        $data->isi_disposisi = $request->get('isi_disposisi');
        $data->isi_ringkas = $request->get('isi_ringkas');
        $data->file_surat = $request->get('file_surat');
        $data->save();

        return redirect()->route('disposisi')->with('pesan', 'Surat berhasil di-update !');
        
    }

    public function delete($id) {
        $data = Disposisi::find($id);
        $data->delete();

        return redirect()->back()->with('pesan', 'Data dihapus !');
    }
}
