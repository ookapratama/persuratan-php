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

        function content(
            $teks1, $teks2, $teks3, $teks4, $teks5, $teks6, $teks7, $teks8, $teks9, $teks10,
            $teks11, $teks12, $teks13, $teks14, $teks15, $teks16, $teks17, $teks18, $teks19,
            $teks20, $teks21, $teks22, $teks23, $td1, $td2, $td3, $td4, $td5, $td6, $td7
        )
        {
            $this->Ln(9);
            $this->Cell(93);
            $this->SetFont('Times','BU',12);
            $this->Cell(1,5,$teks1,0,1,'C');
            $this->Ln(0.1);

            $this->Cell(93);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks2,0,1,'C');
            $this->Ln(12);

            $this->Cell(20);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks3,0,1,'L');
            $this->Ln(5);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks4,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td1,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','B',12);
            $this->Cell(0,-17,$teks5,0,1,'L');
            $this->Ln(17);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks6,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td2,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','',12);
            $this->Cell(0,-17,$teks7,0,1,'L');
            $this->Ln(17);

            $this->Cell(20);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks8,0,1,'L');
            $this->Ln(5);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks9,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td3,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','B',12);
            $this->Cell(0,-17,$teks10,0,1,'L');
            $this->Ln(17);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks11,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td4,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','',12);
            $this->Cell(0,-17,$teks12,0,1,'L');
            $this->Ln(17);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks13,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td5,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','',12);
            $this->Cell(0,-17,$teks14,0,1,'L');
            $this->Ln(17);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks15,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td6,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','',12);
            $this->Cell(0,-17,$teks16,0,1,'L');
            $this->Ln(17);

            $this->Cell(35);
            $this->SetFont('Times','',12);
            $this->Cell(1,5,$teks17,0,1,'L');
            $this->Ln(1);

            $this->Cell(80);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$td7,0,1,'L');
            $this->Ln(12);

            $this->Cell(82);
            $this->SetFont('Times','',12);
            $this->Cell(0,-17,$teks18,0,1,'L');
            $this->Ln(17);

            $this->Cell(10);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,7,$teks19,0,1,'');
            $this->Ln(0.5);

            $this->Cell(10);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,7,$teks20,0,1,'');
            $this->Ln(18);

            $this->Cell(150);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$teks21,0,1,'C');
            $this->Ln(12);

            $this->Cell(150);
            $this->SetFont('Times','',12);
            $this->Cell(1,-7,$teks22,0,1,'C');
            $this->Ln(35);

            $this->Cell(150);
            $this->SetFont('Times','BU',12);
            $this->Cell(1,-7,$teks23,0,1,'C');
            $this->Ln(12);
        }
    }


?>