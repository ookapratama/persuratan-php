<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF() {

        return view('myPdfDocument');
        // $data = [
        //     'title' => 'Selamat Datang Tessss Ssssssssss',
        //     'author' => 'Baharuddin Kasim'
        // ];

        // $pdf = PDF::loadView('myPdfDocument', $data);

        // return $pdf->download('fileTest.pdf');
    }
}
