<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Model;
use App\Models\User;


class SuratKetHilangController extends Controller
{
    //

    public function create() {
        $data = User::all()->where('level_id', 2);

        return view('surat/surat_ket_hilang/v_create', ['user_approve'=>$data]);
    }

    public function store(Request $request) {
        $request->validate([
            'no_surat' => 'required|max:100',
            'lampiran' => 'required|max:50',
            'perihal' => 'required|max:100',
            'nama_pemohon' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'nik' => 'required|max:20',
            'status_kawin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required|max:100',
            'alamat' => 'required|max:100',
            'benda_hilang' => 'required|max:100',
            'tgl_surat' => 'required',
            'user_approve' => 'required'
        ]);

        $data = new Model();

        $data->no_surat = $request->get('no_surat');
        $data->lampiran = $request->get('lampiran');
        $data->perihal = $request->get('perihal');
        $data->nama_pemohon = $request->get('nama_pemohon');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->nik = $request->get('nik');
        $data->status_kawin = $request->get('status_kawin');
        $data->agama = $request->get('agama');
        $data->pekerjaan = $request->get('pekerjaan');
        $data->alamat = $request->get('alamat');
        $data->benda_hilang = $request->get('benda_hilang');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->user_approve = $request->get('user_approve');
        $data->jenis_surat = "Surat Keterangan Kehilangan";
        $data->save();

        return redirect()->route('surat_index')->with('pesan', 'Surat berhasil dibuat !');
    }
}
