<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Model;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SuratKetMatiController extends Controller
{
    public function create()
    {
        $data = User::all()->where('level_id', 2);

        return view('surat/surat_ket_mati/v_create', ['user_approve' => $data]);
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
            'nik' => 'required|max:20',
            'no_kk' => 'required|max:20',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'warga_negara' => 'required',
            'agama' => 'required',
            'status_kawin' => 'required',
            'pekerjaan' => 'required|max:100',
            'alamat' => 'required|max:100',
            'hari_mati' => 'required',
            'tgl_mati' => 'required',
            'tempat_mati' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sebab_mati' => 'required',
            'tgl_surat' => 'required',
            'user_approve' => 'required',
            'is_antar' => 'required'
        ]);

        $data = new Model();

        $data->no_surat = $request->get('no_surat');
        $data->nama_pemohon = $request->get('nama_pemohon');
        $data->nik = $request->get('nik');
        $data->no_kk = $request->get('no_kk');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->warga_negara = $request->get('warga_negara');
        $data->agama = $request->get('agama');
        $data->status_kawin = $request->get('status_kawin');
        $data->pekerjaan = $request->get('pekerjaan');
        $data->alamat = $request->get('alamat');
        $data->hari_mati = $request->get('hari_mati');
        $data->tgl_mati = $request->get('tgl_mati');
        $data->tempat_mati = $request->get('tempat_mati');
        $data->kecamatan = $request->get('kecamatan');
        $data->kabupaten = $request->get('kabupaten');
        $data->provinsi = $request->get('provinsi');
        $data->sebab_mati = $request->get('sebab_mati');
        $data->tgl_surat = $request->get('tgl_surat');
        $data->user_approve = $request->get('user_approve');
        $data->is_antar = $request->get('is_antar');
        $data->jenis_surat = "Surat Keterangan Kematian";
        $data->save();

        return redirect()->route('surat_index')->with($notif);
    }

    public function show($id)
    {

        $surat = Model::where('id', $id)->with('approve_by')->first();
        $data = [
            'matiShow' => $surat,
        ];
        return view('surat.surat_ket_mati.v_show', $data);
    }

    public function edit($id)
    {
        $surat = Model::where('id', $id)->with('approve_by')->first();
        $data = [
            'matiEdit' => $surat,
        ];
        $data2 = User::all()->where('level_id', 2);
        return view('surat.surat_ket_mati.v_edit', $data, ['user_approve' => $data2]);
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
            'nik' => 'required|max:20',
            'no_kk' => 'required|max:20',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'warga_negara' => 'required',
            'agama' => 'required',
            'status_kawin' => 'required',
            'pekerjaan' => 'required|max:100',
            'alamat' => 'required|max:100',
            'hari_mati' => 'required',
            'tgl_mati' => 'required',
            'tempat_mati' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'sebab_mati' => 'required',
            'tgl_surat' => 'required',
            'user_approve' => 'required',
            'is_antar' => 'required'
        ]);

        $data->no_surat = $request->get('no_surat');
        $data->nama_pemohon = $request->get('nama_pemohon');
        $data->nik = $request->get('nik');
        $data->no_kk = $request->get('no_kk');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tgl_lahir = $request->get('tgl_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->warga_negara = $request->get('warga_negara');
        $data->agama = $request->get('agama');
        $data->status_kawin = $request->get('status_kawin');
        $data->pekerjaan = $request->get('pekerjaan');
        $data->alamat = $request->get('alamat');
        $data->hari_mati = $request->get('hari_mati');
        $data->tgl_mati = $request->get('tgl_mati');
        $data->tempat_mati = $request->get('tempat_mati');
        $data->kecamatan = $request->get('kecamatan');
        $data->kabupaten = $request->get('kabupaten');
        $data->provinsi = $request->get('provinsi');
        $data->sebab_mati = $request->get('sebab_mati');
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
