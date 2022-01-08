<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasukModel as SuratMasukModel;

class SuratMasukController extends Controller
{
    public function __construct() {
        $this->SuratMasukModel = new SuratMasukModel();
        $this->middleware('auth');
    }

    public function index() {
        $suratMasuk = SuratMasukModel::all();
        $data = [
            // 'suratmasuk' => $this->SuratMasukModel->allData(),
            'suratmasuk' => $suratMasuk,
        ];
        return view('v_suratmasuk', $data);
    }

    public function detail($id_suratmasuk) {
        if(!$this->SuratMasukModel->detailData($id_suratmasuk)) {
            abort(404);
        }

        $data = [
            'suratmasuk' => $this->SuratMasukModel->detailData($id_suratmasuk),
        ];
        return view('v_detailsuratmasuk', $data);
    }

    public function add() {
        return view('v_addsuratmasuk');
    }

    public function insert() {
        Request()->validate([
            'tgl_terima' => 'required|min:4|max:15',
            'asal_surat' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required|min:4|max:15',
            'perihal' => 'required',
            'kode_surat' => 'required',
            'file_surat' => 'required',
        ],[
            'tgl_terima.required' => 'wajib diisi !',
            'tgl_terima.min' => 'Min 4 Karakter',
            'tgl_terima.max' => 'Max 15 Karakter',

            'asal_surat.required' => 'wajib diisi !',
            'no_surat.required' => 'wajib diisi !',

            'tgl_surat.required' => 'wajib diisi !',
            'tgl_surat.min' => 'Min 4 Karakter',
            'tgl_surat.max' => 'Max 15 Karakter',

            'perihal.required' => 'wajib diisi !',
            'kode_surat.required' => 'wajib diisi !',
            'file_surat.required' => 'wajib diisi !',
        ]);

        $data = [
            'tgl_terima' => Request()->tgl_terima,
            'asal_surat' => Request()->asal_surat,
            'no_surat' => Request()->no_surat,
            'tgl_surat' => Request()->tgl_surat,
            'perihal' => Request()->perihal,
            'kode_surat' => Request()->kode_surat,
            'file_surat' => Request()->file_surat,
        ];

        $this->SuratMasukModel->addData($data);
        return redirect()->route('smasuk')
        ->with('pesan', 'Data berhasil ditambah !');
    }

    public function edit($id_suratmasuk) {
        if(!$this->SuratMasukModel->detailData($id_suratmasuk)) {
            abort(404);
        }
        $data = [
            'suratmasuk' => $this->SuratMasukModel->detailData($id_suratmasuk),
        ];
        return view('v_editsuratmasuk', $data);
    }

    public function update($id_suratmasuk) {
        Request()->validate([
            'tgl_terima' => 'required|min:4|max:15',
            'asal_surat' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required|min:4|max:15',
            'perihal' => 'required',
            'kode_surat' => 'required',
            'file_surat' => 'required',
        ],[
            'tgl_terima.required' => 'wajib diisi !',
            'tgl_terima.min' => 'Min 4 Karakter',
            'tgl_terima.max' => 'Max 15 Karakter',

            'asal_surat.required' => 'wajib diisi !',
            'no_surat.required' => 'wajib diisi !',

            'tgl_surat.required' => 'wajib diisi !',
            'tgl_surat.min' => 'Min 4 Karakter',
            'tgl_surat.max' => 'Max 15 Karakter',

            'perihal.required' => 'wajib diisi !',
            'kode_surat.required' => 'wajib diisi !',
            'file_surat.required' => 'wajib diisi !',
        ]);

        $data = [
            'tgl_terima' => Request()->tgl_terima,
            'asal_surat' => Request()->asal_surat,
            'no_surat' => Request()->no_surat,
            'tgl_surat' => Request()->tgl_surat,
            'perihal' => Request()->perihal,
            'kode_surat' => Request()->kode_surat,
            'file_surat' => Request()->file_surat,
        ];
        $this->SuratMasukModel->editData($id_suratmasuk, $data);
        return redirect()->route('smasuk')
        ->with('pesan', 'Data berhasil di Update !');
    }

    public function delete($id_suratmasuk) {
        $this->SuratMasukModel->deleteData($id_suratmasuk);
        return redirect()->route('smasuk')
        ->with('pesan', 'Data berhasil di Hapus !');
    }
}
