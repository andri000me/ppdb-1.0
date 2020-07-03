<?php
// koneksi database
include '../../../../koneksi.php';


session_start();
if ($_SESSION['status']!="otkp") {
    header("location:../../index.php?pesan=belum_login");
} else {
    $nama = $_POST['nama'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $npsn_sekolah = $_POST['npsn_sekolah'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $nik = $_POST['nik'];
    $no_hp = $_POST['no_hp'];
    $no_hp_siswa = $_POST['no_hp_siswa'];
    $no_hp_org_tua = $_POST['no_hp_org_tua'];



    mysqli_query($koneksi, "UPDATE du_otkp SET
              nama='$nama',
              asal_sekolah='$asal_sekolah',
              npsn_sekolah='$npsn_sekolah',
              alamat='$alamat',
              rt='$rt',
              rw='$rw',
              kelurahan='$kelurahan',
              kecamatan='$kecamatan',
              kota='$kota',
              nik='$nik',
              no_hp='$no_hp',
              no_hp_siswa='$no_hp_siswa',
              no_hp_org_tua='$no_hp_org_tua'
               where nik='$nik'
               ");

    header("location:tampil.php?nik=$nik");
}
