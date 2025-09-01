<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_db = "pengkor";

$koneksi = mysqli_connect("localhost","root","","pengkor");

if ( !$koneksi ) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>