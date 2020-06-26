<?php
// koneksi database
include '../../../../koneksi.php';


session_start();
if ($_SESSION['status']!="akl") {
    header("location:../../index.php?pesan=belum_login");
} else {
    $nik = $_POST['nik'];
    $kondisi = $_POST['kondisi'];


    mysqli_query($koneksi, "UPDATE daftar_ulang SET
               nik='$nik',
               kondisi='$kondisi'
               where nik='$nik'
               ");

    header("location:index.php");
}
