<?php
// koneksi database
include '../../../../koneksi.php';


session_start();
if ($_SESSION['status']!="tkr") {
    header("location:../../index.php?pesan=belum_login");
} else {
    $nik = $_POST['nik'];
    $catatan = $_POST['catatan'];
    $kondisi = $_POST['kondisi'];


    mysqli_query($koneksi, "UPDATE du_tkr SET
               nik='$nik',
               catatan='$catatan',
               kondisi='$kondisi'
               where nik='$nik'
               ");

    header("location:index.php");
}
