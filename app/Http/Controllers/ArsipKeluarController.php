<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat\SuratKetTidakMampu as Surat;

class ArsipKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $month = date('m');
        $year = date('Y');
        $surat = Surat::where("status_arsip", "Y")->whereMonth("tgl_surat", $month)->whereYear("tgl_surat", $year)->get()->sortByDesc("id");

        return view('vArsip.keluar.index', [
            'surat' => $surat,
            'bulan' => $month,
            'tahun' => $year,
        ]);
    }

    public function search(Request $request)
    {
        $text = $request->get('search');

        $cari = Surat::where("status_arsip", "Y")
            ->where(function ($query) use ($text) {
                $query->where("no_surat", "like", "%$text%")
                    ->orWhere("nama_pemohon", "like", "%$text%")
                    ->orWhere("perihal", "like", "%$text%")
                    ->orWhere("jenis_surat", "like", "%$text%");
            })->get();

        return view('vArsip.keluar.index', [
            'surat' => $cari,
            'text' => $text,
        ]);
    }

    public function filter(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        $filter = Surat::where("status_arsip", "Y")
            ->whereMonth("tgl_surat", $bulan)
            ->whereYear("tgl_surat", $tahun)
            ->get();

        return view('vArsip.keluar.index', [
            'surat' => $filter,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }
}
