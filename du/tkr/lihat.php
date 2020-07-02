<?php
session_start();
if ($_SESSION['status']!="admin" && $_SESSION['status']!="siswa-otkp") {
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PPDB SMKN 1 Kragilan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">

  <script src="../../js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

  <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
      <center><h3>Daftar Ulang Peserta Didik SMK Negeri 1 Kragilan</h3></center>
      <center><h3></h3></center>
      <center><h3>Kompetensi Keahlian Teknik Kendaraan Ringan Otomotif</h3></center>
		</div>
		<div class="col-md-2">
		</div>
  </div>

  <table class="table table-bordered">
    <?php
      include '../../koneksi.php';
      $nik = isset($_GET['nik']) ? abs((int) $_GET['nik']) : 0;
      $data = mysqli_query($koneksi, "select
      id,
      nisn,
      nama,
      kompetensi_keahlian,
      asal_sekolah,
      npsn_sekolah,
      alamat,
      rt,
      rw,
      kelurahan,
      kecamatan,
      kota,
      no_hp,
      nik,
      pdf_swa_fakta,
      pdf_fakta,
      pdf_kk,
      pdf_akta,
      pdf_surat_dokter,
      pdf_skl,
      tgl_daftar_ulang,
      kondisi,
      catatan,
      no_pendaftaran
       from du_tkr where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          include('tampil.php'); ?>

    </table><br>
    <?php
      } ?>

      </div>
    </div>
</div>
</div>

  </body>
</html>
