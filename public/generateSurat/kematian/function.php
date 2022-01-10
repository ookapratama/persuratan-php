<?php 

    class pdf extends FPDF {
            
        function kop($teks1, $teks2, $teks3, $teks4) {
            $this->Cell(93);
            $this->SetFont('Times','B',14);
            $this->Cell(1,5,$teks1,0,1,'C');
            $this->Ln(1.5);

            $this->Cell(93);
            $this->SetFont('Times','B',16);
            $this->Cell(1,5,$teks2,0,1,'C');
            $this->Ln(1.5);

            $this->Cell(93);
            $this->SetFont('Times','B',16);
            $this->Cell(1,5,$teks3,0,1,'C');

            $this->Cell(93);
            $this->SetFont('Times','',10);
            $this->Cell(1,5,$teks4,0,1,'C');
        }

        function logo($gambar) {
            $this->Image($gambar,20,10,17,20);
        }

        function content1(
            $teks1, $teks2
        )
        {
            $this->Ln(10);
            $this->Cell(93);
            $this->SetFont('Times','BU',12);
            $this->Cell(1,5,$teks1,0,1,'C');

            $this->Cell(93);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks2,0,1,'C');
            $this->Ln(2);
        }

        function content2($teks1)
        {
            $this->Ln(2);
            $this->Cell(10);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,7,$teks1,0,1,'');
        }

        function content3(
            $teks1, $td1, $teks2, $teks3, $td2, $teks4, $teks5, $td3, $teks6,
            $teks7, $td4, $teks8, $teks9, $td5, $teks10, $teks11, $td6, $teks12,
            $teks13, $td7, $teks14, $teks15, $td8, $teks16, $teks17, $td9, $teks18,
            $teks19, $td10, $teks20
        )
        {
            $this->Ln(2);
            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks1,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td1,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','B',12);
            $this->Cell(1,5,$teks2,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks3,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td2,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks4,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks5,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td3,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks6,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks7,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td4,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks8,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks9,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td5,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks10,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks11,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td6,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks12,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks13,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td7,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks14,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks15,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td8,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks16,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks17,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td9,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks18,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks19,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td10,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks20,0,1,'L');
            $this->Ln(1.5);
        }

        function content4($teks1)
        {
            $this->Ln(1.5);
            $this->Cell(10);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,7,$teks1,0,1,'');
        }

        function content5(
            $teks1, $td1, $teks2, $teks3, $td2, $teks4, $teks5, $td3, $teks6,
            $teks7, $td4, $teks8, $teks9, $td5, $teks10, $teks11, $td6, $teks12,
            $teks13, $td7, $teks14, $teks15, $td8, $teks16
        )
        {
            $this->Ln(3);
            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks1,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td1,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks2,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks3,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td2,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks4,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks5,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td3,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks6,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks7,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td4,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks8,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks9,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td5,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks10,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks11,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td6,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks12,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks13,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td7,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks14,0,1,'L');
            $this->Ln(1.5);

            $this->Cell(30);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks15,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(78);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$td8,0,1,'L');
            $this->Ln(2);

            $this->Ln(-7);
            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks16,0,1,'L');
            $this->Ln(1.5);
        }

        function content6($teks1)
        {
            $this->Ln(1.5);
            $this->Cell(10);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,7,$teks1,0,1,'');
        }

        function content7($teks1, $teks2, $teks3)
        {
            $this->Ln(8);
            $this->Cell(150);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks1,0,1,'C');

            $this->Cell(150);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks2,0,1,'C');
            $this->Ln(20);

            $this->Cell(150);
            $this->SetFont('Times','BU',12);
            $this->Cell(1,5,$teks3,0,1,'C');
            
        }
    }


?>