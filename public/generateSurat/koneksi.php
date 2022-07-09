<?php
//koneksi ke db
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbnm = "coba_database";

// $host = "103.195.142.83";
// $user = "desalampenai";
// $pass = "@Lampenai2022";
// $dbnm = "desa_lampenai_testing";

$connect = mysqli_connect($host, $user, $pass, $dbnm);
