@extends('layout.v_template')
@section('title', 'PDF')
@section('titleNav', 'PDF')

@section('content')

    <table border="1" align="center">
        <tr>
            <td width="100px"><img src="{{asset('gambar')}}/logo-lutim.png" width="75" height="100" title="logo-lutim" align="left"></td>
            <td></td>
            <td>
                <center>
                    <font size = "5", face="Times New Roman", line-height="1.4">PEMERINTAH KABUPATEN LUWU TIMUR</font><br>
                    <font size = "5", face="Times New Roman"><strong>KECAMATAN WOTU</strong></font><br>
                    <font size = "5", face="Times New Roman"><strong>DESA LAMPENAI</strong></font><br>
                    <font size = "3", face="Times New Roman"><i>Alamat : Jl. Batara Guru No. 08 Wotu (92971)</i></font><br>
                    
                </center>
            </td>
            <td width="100px"></td>
        </tr>
    </table>

@endsection