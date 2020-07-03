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
          <center>
            <h3 style="margin-top: 50px;">Daftar Ulang Peserta Didik SMK Negeri 1 Kragilan</h3>
          </center>
          <center>
            <h3></h3>
          </center>
          <center>
            <h3>Kompetensi Keahlian Akuntansi Keuangan Lembaga</h3>
          </center>
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
      no_hp_siswa,
      no_hp_org_tua,
      nik,
      pdf_swa_fakta,
      pdf_fakta,
      pdf_akta,
      pdf_kk,
      pdf_skl,
      pdf_photo,
      pdf_surat_dokter,
      tgl_daftar_ulang,
      kondisi,
      catatan,
      no_pendaftaran
       from du_akl where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          ?>

        <br><br><br>
        <table>
          <tr>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="index.php">Kembali</a></td>
          </tr>
        </table>

        <table class="table table-bordered">
          <form class="" action="update-edit.php" method="post">

            <tr>
              <td>Nama Siswa</td>
              <td>
                <input class="form-control" type="text" name="nama" value="<?php echo $d['nama'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Kompetensi Keahlian</td>
              <td>
                <input class="form-control" type="text" class="" name="kompetensi_keahlian" value="<?php echo $d['kompetensi_keahlian'] ?>" readonly>
              </td>
            </tr>
            <tr>
              <td>Asal Sekolah</td>
              <td>
                <input class="form-control" type="text" name="asal_sekolah" value="<?php echo $d['asal_sekolah'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>NPSN Sekolah SMP</td>
              <td>
                <input class="form-control" type="text" name="npsn_sekolah" value="<?php echo $d['npsn_sekolah'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>
                <input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>RT</td>
              <td>
                <input class="form-control" type="text" name="rt" value="<?php echo $d['rt'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>RW</td>
              <td>
                <input class="form-control" type="text" name="rw" value="<?php echo $d['rw'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td>
                <input class="form-control" type="text" name="kelurahan" value="<?php echo $d['kelurahan'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Kecamatan</td>
              <td>
                <input class="form-control" type="text" name="kecamatan" value="<?php echo $d['kecamatan'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Kota</td>
              <td>
                <input class="form-control" type="text" name="kota" value="<?php echo $d['kota'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>NIK</td>
              <td>
                <input class="form-control" type="text" name="nik" value="<?php echo $d['nik'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>
                <input class="form-control" type="text" name="no_hp" value="<?php echo $d['no_hp'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Nomor HP Siswa</td>
              <td>
                <input class="form-control" type="text" name="no_hp" value="<?php echo $d['no_hp_siswa'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Nomor HP Orang Tua</td>
              <td>
                <input class="form-control" type="text" name="no_hp" value="<?php echo $d['no_hp_org_tua'] ?>" required>
              </td>
            </tr>
            <tr>
              <td>Swa Photo Pakta Integritas</td>
              <td>
                <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
                <embed src="../../../akl/file/<?php echo $d['pdf_swa_fakta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Pakta Integritas</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_fakta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>SKL</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_skl']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Akta Kelahiran</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_akta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Kartu Keluarga</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_kk']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Photo Background Merah</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_photo']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Surat Dokter</td>
              <td>
                <embed src="../../../akl/file/<?php echo $d['pdf_surat_dokter']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Catatan Untuk Siswa Jika Ada Kesalahan Data</td>
              <td>
                <input type="text" name="catatan" class="form-control" value="<?php echo $d['catatan']; ?>">
              </td>
            </tr>
        </table>

        <center>
          <input style="margin-bottom: 50px" type="submit" class="btn btn-success" name="" value="Submit">
        </center>

        </form>

        <br>
        <?php
      } ?>

    </div>
  </div>
  </div>
  </div>

</body>

</html>
