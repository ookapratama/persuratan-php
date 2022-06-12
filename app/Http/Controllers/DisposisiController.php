<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disposisi as Disposisi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class DisposisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function disposisi($id)
    {

        $notif = array(
            'pesan' => 'Data surat sudah masuk ke halaman Persetujuan !',
            'alert' => 'info',
        );

        //cari suratnya 
        $surat = Disposisi::find($id);
        //ubah status
        $surat->status_disposisi = 'Y';
        //save
        $surat->save();
        //redirect ke daftr yang telah di setujui
        return redirect()->route('disposisi')->with($notif);
    }

    public function index()
    {
        // $disposisi = Disposisi::all();
        $disposisi = Disposisi::where("status_setuju", "N")->where("status_disposisi", "N")->get();
        $data = [
            'disposisi' => $disposisi,
        ];
        return view('vDisposisi.index', $data);
    }

    public function show($id)
    {

        $disposisi = Disposisi::where('id', $id)->first();
        $data = [
            'disposisi' => $disposisi,
        ];
        return view('vDisposisi.show', $data);
    }

    public function add()
    {
        $data = User::all()->where('level_id', 2);
        return view('vDisposisi.create', ['user_approve' => $data]);
    }

    public function insert(Request $request)
    {

        // ddd($request);

        $notif = array(
            'pesan' => 'Surat berhasil ditambah !',
            'alert' => 'success',
        );

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
            'file_surat' => 'required|mimes:pdf|file|max:2048',
        ]);

        // $request->file('file_surat')->store('public');
        $request->file('file_surat')->store('file-suratMasuk');

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

        return redirect()->route('disposisi')->with($notif);
    }

    public function edit($id)
    {
        $data = [
            'disposisi' => Disposisi::where('id', $id)->first(),
        ];

        $data2 = User::all()->where('level_id', 2);
        return view('vDisposisi.edit', $data, ['user_approve' => $data2]);
    }

    public function update(Request $request, $id)
    {


        $notif = array(
            'pesan' => 'Surat berhasil diupdate !',
            'alert' => 'success',
        );

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
            'file_surat' => 'mimes:pdf|file|max:2048',
        ]);


        if ($request->file('file_surat')) {
            if ($request->oldFile) {
                Storage::delete("file-suratMasuk/" . $request->oldFile);
            }
            $request->file('file_surat')->store('file-suratMasuk');

            $file = $request->file('file_surat')->hashName();
            $data->file_surat = $file;
        }

        // $request->file('file_surat')->store('file-suratMasuk');

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
        $data->save();

        return redirect()->route('disposisi')->with($notif);
    }

    public function delete(Request $request)
    {

        $notif = array(
            'pesan' => 'Surat dihapus !',
            'alert' => 'error',
        );

        $id = $request->id;
        $data = Disposisi::find($id);
        if ($data->file_surat) {
            Storage::delete("file-suratMasuk/" . $data->file_surat);
        }
        $data->delete();

        return redirect()->back()->with($notif);
    }

    public function viewUpload($id)
    {
        $data = [
            'disposisi' => Disposisi::find($id),
        ];
        // dd($data);
        return view('vArsip.masuk.uploadfile', $data);
    }

    public function uploadFile(Request $request, $id)
    {

        $notif = array(
            'pesan' => 'File berhasil ditambah !',
            'alert' => 'success',
        );

        $data = Disposisi::findOrFail($id);

        $request->validate([

            'file_disposisi' => 'mimes:pdf|file|max:2048',
        ]);

        if ($request->file('file_disposisi')) {
            if ($request->oldFile) {
                Storage::delete("file-suratDisposisi/" . $request->oldFile);
            }
            $request->file('file_disposisi')->store('file-suratDisposisi');
        }

        $data->file_disposisi = $request->file('file_disposisi')->hashName();
        $data->save();

        return redirect()->route('arsip_masuk')->with($notif);
    }
}
