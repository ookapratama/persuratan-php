<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Model;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SuratKetUsahaController extends Controller
{
    public function create()
    {
        $data = User::all()->where('level_id', 2);

        return view('surat/surat_ket_usaha/v_create', ['user_approve' => $data]);
    }

    public function store(Request $request)
    {
        $notif = array(
            'pesan' => 'Surat berhasil ditambah !',
            'alert' => 'success',
        );

        $request->validate([
            'no_surat' => 'required|max:100',
            'nama_pemohon' => 'required|max:100',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required|max:100',
            'alamat' => 'required|max:100',
            'nik' => 'required|max:20',
            'jenis_usaha' => 'required',
            'alamat_usaha' => 'required',
            'tahun_usaha' => 'required',
            'tgl_surat' => 'required',
            'user_approve' => 'required',
            'is_antar' => 'required'
        ]);

        $data = new Model();

        $data->no_surat = $request->get('no_surat');
        $data->nama_pemohon = $request->get('nama_pemohon');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->pekerjaan = $request->get('pekerjaan');
        $data->alamat = $request->get('alamat');
        $data->nik = $request->get('nik');
        $data->jenis_usaha = $request->get('jenis_usaha');
        $data->alamat_usaha = $request->get('alamat_usaha');
        $data->tahun_usaha = $request->get('tahun_usaha');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->user_approve = $request->get('user_approve');
        $data->is_antar = $request->get('is_antar');
        $data->jenis_surat = "Surat Keterangan Usaha";
        $data->save();

        return redirect()->route('surat_index')->with($notif);
    }

    public function show($id)
    {

        $surat = Model::where('id', $id)->with('approve_by')->first();
        $data = [
            'usahaShow' => $surat,
        ];
        return view('surat.surat_ket_usaha.v_show', $data);
    }

    public function edit($id)
    {
        $surat = Model::where('id', $id)->with('approve_by')->first();
        $data = [
            'usahaEdit' => $surat,
        ];
        $data2 = User::all()->where('level_id', 2);
        return view('surat.surat_ket_usaha.v_edit', $data, ['user_approve' => $data2]);
    }

    public function update(Request $request, $id)
    {

        $notif = array(
            'pesan' => 'Surat berhasil diupdate !',
            'alert' => 'success',
        );

        $data = Model::findOrFail($id);

        $request->validate([
            'no_surat' => 'required|max:100',
            'nama_pemohon' => 'required|max:100',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required|max:100',
            'alamat' => 'required|max:100',
            'nik' => 'required|max:20',
            'jenis_usaha' => 'required',
            'alamat_usaha' => 'required',
            'tahun_usaha' => 'required',
            'tgl_surat' => 'required',
            'user_approve' => 'required',
            'is_antar' => 'required'
        ]);

        $data->no_surat = $request->get('no_surat');
        $data->nama_pemohon = $request->get('nama_pemohon');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->pekerjaan = $request->get('pekerjaan');
        $data->alamat = $request->get('alamat');
        $data->nik = $request->get('nik');
        $data->jenis_usaha = $request->get('jenis_usaha');
        $data->alamat_usaha = $request->get('alamat_usaha');
        $data->tahun_usaha = $request->get('tahun_usaha');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->user_approve = $request->get('user_approve');
        $data->is_antar = $request->get('is_antar');
        $data->save();

        return redirect()->route('surat_index')->with($notif);
    }

    public function delete(Request $request)
    {
        $notif = array(
            'pesan' => 'Surat dihapus !',
            'alert' => 'error',
        );

        $id = $request->id;
        $data = Model::find($id);
        if ($data->file_surat) {
            Storage::delete("file-suratKeluar/" . $data->file_surat);
        }
        $data->delete();

        return redirect()->back()->with($notif);
    }
}
