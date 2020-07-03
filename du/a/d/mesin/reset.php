<?php
// koneksi database
include '../../../../koneksi.php';


session_start();
if ($_SESSION['status']!="mesin") {
    header("location:../../index.php?pesan=belum_login");
} else {
    $nik = $_GET['nik'];

    mysqli_query($koneksi, "UPDATE du_tpm SET
               nik='$nik',
               pdf_fakta='',
               pdf_swa_fakta='',
               pdf_akta='',
               pdf_kk='',
               pdf_photo='',
               pdf_surat_dokter='',
               pdf_skl='',
               tgl_daftar_ulang='',
               kondisi=''
               where nik='$nik'
               ") or die(mysqli_error($koneksi));
    ;

    header("location:tampil.php?nik=$nik");
}
