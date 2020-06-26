<?php
session_start();
if ($_SESSION['status']!="admin" && $_SESSION['status']!="akl") {
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PPDB SMKN 1 Kragilan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../../css/bootstrap.min.css">

  <script src="../../js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">

  <div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
      <center><h3 style="margin-top: 50px;">Daftar Ulang Peserta Didik SMK Negeri 1 Kragilan</h3></center>
      <center><h3></h3></center>
      <center><h3>Kompetensi Keahlian Akuntansi Keuangan Lembaga</h3></center>
		</div>
		<div class="col-md-2">
		</div>
  </div>

  <table class="table table-bordered">
    <?php
      include '../../../../koneksi.php';
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
      catatan,
      no_pendaftaran
       from daftar_ulang where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          ?>

        <br><br><br>
        <table>
          <tr>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="index.php">Kembali</a></td>
          </tr>
        </table>

        <table class="table table-bordered">
        <form class="" action="proses.php" method="post">


          <tr>
            <td>Nomor Pendaftaran</td>
            <td><?php echo $d['no_pendaftaran']; ?></td>
          </tr>
          <tr>
            <td>Nama Siswa</td>
            <td><?php echo $d['nama']; ?></td>
          </tr>
          <tr>
            <td>Kompetensi Keahlian</td>
            <td><?php echo $d['kompetensi_keahlian']; ?></td>
          </tr>
          <tr>
            <td>Asal Sekolah</td>
            <td><?php echo $d['asal_sekolah']; ?></td>
          </tr>
          <tr>
            <td>NPSN Sekolah SMP</td>
            <td><?php echo $d['npsn_sekolah']; ?></td>
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
            <td>NIK</td>
            <td><?php echo $d['nik']; ?></td>
          </tr>
          <tr>
            <td>Swa Photo Fakta Integritas</td>
            <td>
              <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
              <embed src="../../../akl/file/<?php echo $d['pdf_swa_fakta']; ?>" type="application/pdf" width="100%" height="500px">
            </td>
          </tr>
          <tr>
            <td>Fakta Integritas</td>
            <td>
              <embed src="../../../akl/file/<?php echo $d['pdf_fakta']; ?>" type="application/pdf" width="100%" height="500px">
            </td>
          </tr>
          <tr>
            <td colspan="2"><center>
              <select  class="form-control-lg" name="kondisi" required>
                <option value="<?php echo $d['kondisi']; ?>">Kondisi Awal(<?php echo $d['kondisi']; ?>)</option>
                <option value="Data Sesuai">Data Sesuai</option>
                <option value="Data Tidak Sesuai">Data Tidak Sesuai</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2"><center>
              <input type="submit" class="btn btn-success" name="" value="Submit">
            </td>
          </tr>
        </form>

    </table><br>
    <?php
      } ?>

      </div>
    </div>
</div>
</div>

  </body>
</html>