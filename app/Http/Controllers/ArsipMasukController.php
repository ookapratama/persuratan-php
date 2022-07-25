<?php

namespace App\Http\Controllers;

use App\Models\Disposisi as Surat;


use Illuminate\Http\Request;

class ArsipMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $month = date('m');
        $year = date('Y');
        $surat = Surat::where("status_arsip", "Y")->whereMonth("tgl_disposisi", $month)->whereYear("tgl_disposisi", $year)->get()->sortByDesc("id");

        return view('vArsip.masuk.index', [
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
                    ->orWhere("perihal", "like", "%$text%")
                    ->orWhere("asal_surat", "like", "%$text%");
            })->get();

        return view('vArsip.masuk.index', [
            'surat' => $cari,
            'text' => $text,
        ]);
    }

    public function filter(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        $filter = Surat::where("status_arsip", "Y")
            ->whereMonth("tgl_disposisi", $bulan)
            ->whereYear("tgl_disposisi", $tahun)
            ->get();

        return view('vArsip.masuk.index', [
            'surat' => $filter,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }

    //filter data by keyword
    //Disposisi::where('no_surat','like', '%rem%')->get()

    // Disposisi::where('no_surat','like', '%rem%')->orWhere('perihal'
    // ,'like','%rem%')->get()


    // Disposisi::whereMonth('tgl_surat','08')->whereYear('tgl_surat',
    // '2013')->get()
}
