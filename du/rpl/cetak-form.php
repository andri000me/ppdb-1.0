<?php
session_start();
if ($_SESSION['status']!="siswa-otkp" && $_SESSION['status']!="admin" && $_SESSION['status']!="rpl") {
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
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <center>
            <h3>PAKTA INTEGRITAS</h3>
          </center>
          <center>
            <h3>SISWA SMK NEGERI 1 KRAGILAN</h3>
          </center>
        </div>
        <div class="col-md-3">
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
      tgl_daftar_ulang,
      kondisi,
      no_pendaftaran
       from du_rpl where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          ?>


        <table class="table table-bordered">
          <tr>
            <td>Nama Siswa</td>
            <td><?php echo $d['nama']; ?></td>
          </tr>
          <tr>
            <td>NISN</td>
            <td><?php echo $d['nisn']; ?></td>
          </tr>
          <tr>
            <td>Asal Sekolah</td>
            <td><?php echo $d['asal_sekolah']; ?></td>
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
          </tr>
          <tr>
            <td>Kelurahan</td>
            <td><?php echo $d['kelurahan']; ?></td>
          </tr>
          <tr>
            <td>Kecamatan</td>
            <td><?php echo $d['kecamatan']; ?></td>
          </tr>
          <tr>
            <td>Kota</td>
            <td><?php echo $d['kota']; ?></td>
          </tr>
          <tr>
            <td>Nomor HP</td>
            <td><?php echo $d['no_hp']; ?></td>
          </tr>
          <tr>
            <td colspan="2">
              <h5>
                <center>MENYATAKAN</center>
              </h5>
              <ol>
                <li>Bahwa saya akan bertakwa kepada Tuhan Yang Maha Esa.</li>
                <li>Bahwa saya akan mematuhi dan mentaati peraturan dan tata tertib sekolah.</li>
                <li>Bahwa saya akan menghormati, ta’at dan patuh terhadap Guru dan Orang Tua.</li>
                <li>Bahwa saya akan belajar dengan rajin dan sungguh-sungguh.</li>
                <li>Apabila dikemudian hari terbukti pernyataan saya tersebut tidak ditepati, maka saya bersedia dikenakan sanksi/hukuman menurut ketentuan peraturan yang berlaku.</li>
              </ol>
              <p>Demikian surat pernyataan ini saya buat dalam keadaan sadar, tanpa paksaan, dan dibuat dengan sebenar-benarnya</p>
            </td>
          </tr>

        </table>

        <br>
        <img width="700px" align="center" src="../../images/fakta3.png" style="margin-right:  80px;" />

        <?php
      } ?>

    </div>
  </div>
  </div>
  </div>

  <script>
      window.print();
    </script>
</body>

</html>
