<?php

namespace App\Http\Controllers;

use App\Models\Disposisi as Surat;


use Illuminate\Http\Request;

class ArsipMasukController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $surat = Surat::where("status_arsip", "Y")->get();

        return view('vArsip.masuk.index', [
            'surat'=>$surat,
        ]);
    }
}
