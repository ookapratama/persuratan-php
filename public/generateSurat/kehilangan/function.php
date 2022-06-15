<?php

class pdf extends FPDF
{

    function kop($teks1, $teks2, $teks3, $teks4)
    {
        $this->Cell(93);
        $this->SetFont('Times', 'B', 14);
        $this->Cell(1, 5, $teks1, 0, 1, 'C');
        $this->Ln(1.5);

        $this->Cell(93);
        $this->SetFont('Times', 'B', 16);
        $this->Cell(1, 5, $teks2, 0, 1, 'C');
        $this->Ln(1.5);

        $this->Cell(93);
        $this->SetFont('Times', 'B', 16);
        $this->Cell(1, 5, $teks3, 0, 1, 'C');

        $this->Cell(93);
        $this->SetFont('Times', '', 10);
        $this->Cell(1, 5, $teks4, 0, 1, 'C');
    }

    function logo($gambar)
    {
        $this->Image($gambar, 20, 10, 17, 20);
    }

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        $pecah = explode('-', $tanggal);
        return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    }

    function content1(
        $teks1,
        $teks2,
        $teks3,
        $teks4
    ) {
        $this->Ln(7);
        $this->Cell(125);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks1, 0, 1, 'L');
        $this->Ln(2);

        $this->Cell(125);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks2, 0, 1, 'L');
        $this->Ln(2);

        $this->Cell(125);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks3, 0, 1, 'L');
        $this->Ln(2);

        $this->Cell(125);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks4, 0, 1, 'L');
        $this->Ln(2);
    }

    function content2(
        $teks1,
        $td1,
        $teks2,
        $teks3,
        $td2,
        $teks4,
        $teks5,
        $td3,
        $teks6
    ) {
        $this->Ln(-21);
        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks1, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(28);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td1, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks2, 0, 1, 'L');
        $this->Ln(2);

        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks3, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(28);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td2, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks4, 0, 1, 'L');
        $this->Ln(2);

        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks5, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(28);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td3, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(30);
        $this->SetFont('Times', 'BU', 12);
        $this->Cell(1, 5, $teks6, 0, 1, 'L');
        $this->Ln(2);
    }

    function content3($teks1)
    {
        $this->Ln(11);
        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(0, 7, $teks1, 0, 1, '');
    }

    function content4(
        $teks1,
        $td1,
        $teks2,
        $teks3,
        $td2,
        $teks4,
        $teks5,
        $td3,
        $teks6,
        $teks7,
        $td4,
        $teks8,
        $teks9,
        $td5,
        $teks10,
        $teks11,
        $td6,
        $teks12,
        $teks13,
        $td7,
        $teks14
    ) {
        $this->Ln(5);
        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks1, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td1, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(1, 5, $teks2, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks3, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td2, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks4, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks5, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td3, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks6, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks7, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td4, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks8, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks9, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td5, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks10, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks11, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td6, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks12, 0, 1, 'L');
        $this->Ln(3);

        $this->Cell(30);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks13, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(68);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $td7, 0, 1, 'L');
        $this->Ln(2);

        $this->Ln(-7);
        $this->Cell(70);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks14, 0, 1, 'L');
        $this->Ln(3);
    }

    function content5($teks1, $teks2)
    {
        $this->Ln(4);
        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(0, 7, $teks1, 0, 1, '');
        $this->Ln(1);

        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->Cell(0, 7, $teks2, 0, 1, '');
    }

    function content6($teks1, $teks2, $teks3)
    {
        $this->Ln(8);
        $this->Cell(150);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks1, 0, 1, 'C');

        $this->Cell(150);
        $this->SetFont('Times', '', 12);
        $this->Cell(1, 5, $teks2, 0, 1, 'C');
        $this->Ln(20);

        $this->Cell(150);
        $this->SetFont('Times', 'BU', 12);
        $this->Cell(1, 5, $teks3, 0, 1, 'C');
    }

    function ttd($gambar)
    {
        $this->Image($gambar, 135, 202, 50, 30);
    }
}
