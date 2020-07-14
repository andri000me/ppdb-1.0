<?php
session_start();
if ($_SESSION['status']!="siswa-otkp" && $_SESSION['status']!="admin" && $_SESSION['status']!="otkp") {
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
<body>

<div class="container">

  <div class="container-fluid">
    <table>
      <tr>
        <td>
          <center><img style="margin-bottom:  80px; margin-top:  25px; margin-right: 90px" src="../../images/logo-banten-cetak.png" />
        </td>
        <td>
          <center><h4 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h5></center>
          <center><h4><b>Bukti Daftar Ulang</b></h6></center>
          <center><h4><b>Tahun Pelajaran 2020/2021</b></h6></center>
          <center><h5><b>Program Studi Otomatisasi dan Tata Kelola Perkantoran</b></h6></center><br>
        </td>
        <td>
          <center><img style="margin-bottom:  80px; margin-top:  25px; margin-left: 90px" src="../../images/logo-smkn1-cetak.png" />
        </td>
      </tr>
    </table>

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
      tgl_daftar_ulang,
      kondisi,
      no_pendaftaran
       from du_otkp where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          ?>

    <table class="table table-bordered">

      <tr>
        <td>Tanggal Daftar Ulang</td>
        <td><?php echo $d['tgl_daftar_ulang']; ?></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td><?php echo $d['nik']; ?></td>
      </tr>
      <tr>
        <td>Nama Lengkap</td>
        <td><?php echo $d['nama']; ?></td>
      </tr>
      <tr>
        <td>NISN</td>
        <td><?php echo $d['nisn']; ?></td>
      </tr>
      <tr>
        <td>Sekolah Asal</td>
        <td><?php echo $d['asal_sekolah']; ?></td>
      </tr>
      <tr>
        <td>NPSN Sekolah Asal</td>
        <td><?php echo $d['npsn_sekolah']; ?></td>
      </tr>
      <!-- <tr>
        <td>Kota/Kabupaten</td>
        <td><?php echo $d['kota']; ?></td>
      </tr>
      <tr>
        <td>Kecamatan</td>
        <td><?php echo $d['kecamatan']; ?></td>
      </tr>
      <tr>
        <td>Kelurahan</td>
        <td><?php echo $d['kelurahan']; ?></td>
      </tr>
      <tr>
        <td>Nomor Handphone</td>
        <td><?php echo $d['no_hp']; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?php echo $d['alamat']; ?></td>
      </tr>
      <tr>
        <td>RT</td>
        <td><?php echo $d['rt']; ?></td>
      </tr>
      <tr>
        <td>RW</td>
        <td><?php echo $d['rw']; ?></td>
      </tr> -->


      <tr>
        <td>Dokumen Kartu Keluarga</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>Dokumen Akta Kelahiran</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>Dokumen Keterangan Sehat dan Buta Warna</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>Dokumen Pas Photo</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>Dokumen Pakta Integritas</td>
        <td>OK</td>
      </tr>
      <tr>
        <td>Dokumen Swa Photo Memegang Fakta Integritas</td>
        <td>OK</td>
      </tr>
      <tr>
        <td colspan="2">
          <p>
            <b>Informasi :</b>
            <ol>
              <li>Pelaksanaan daftar ulang mulai tanggal 1 sd 10 juli 2020.</li>
              <li>Calon peserta didik yang dinyatakan diterima dan tidak melakukan daftar ulang dianggap mengundurkan diri.</li>
              <li>Bukti daftar ulang wajib dicetak sebagai bukti telah daftar ulang</li>
              <li>Calon peserta didik wajib melihat informasi data yang telah diupload sudah sesuai atau belum, untuk menghindari kesalahan data.</li>
              <li>Jika terdapat pemalsuan dokumen maka siswa akan di diskualifikasi/dianggap gugur.</li>
            </ol>
          </p>
        </td>
      </tr>
    </table>
    <img width="200px" align="right" src="../../images/stampel.png" style="margin-right:  80px;"/>

    <center>
  <?php
      } ?>
<br><br><br>

      </div>
    </div>
</div>
</div>

<script>
    window.print();
  </script>


  </body>
</html>
