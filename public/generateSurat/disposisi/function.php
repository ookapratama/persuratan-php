<?php 

    class pdf extends FPDF {
            
        function kop($teks1) {
            $this->Cell(85);
            $this->SetFont('Times','B',16);
            $this->Cell(1,5,$teks1,0,1,'C');
            $this->Ln(5);
        }

        function tgl_indo($tanggal) {

            $bulan = array(
                1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            );
    
            $pecah = explode('-', $tanggal);
            return $pecah[2].' '.$bulan[(int)$pecah[1]].' '.$pecah[0];
        }

        function ttd($gambar) {
            $this->Image($gambar,120,178,50,30);
        }

    }


?>