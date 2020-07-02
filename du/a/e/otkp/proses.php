<?php
// koneksi database
include '../../../../koneksi.php';


session_start();
if ($_SESSION['status']!="otkp") {
    header("location:../../index.php?pesan=belum_login");
} else {
    $nik = $_POST['nik'];
    $catatan = $_POST['catatan'];
    $kondisi = $_POST['kondisi'];


    mysqli_query($koneksi, "UPDATE du_otkp SET
               nik='$nik',
               catatan='$catatan',
               kondisi='$kondisi'
               where nik='$nik'
               ");

    header("location:index.php");
}
