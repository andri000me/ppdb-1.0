<?php
session_start();
if ($_SESSION['status']!="admin" && $_SESSION['status']!="tkr") {
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
            <h3>Kompetensi Keahlian Teknik Kendaraan Ringan Otomoitf</h3>
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
      pdf_photo,
      pdf_skl,
      pdf_surat_dokter,
      tgl_daftar_ulang,
      kondisi,
      catatan,
      no_pendaftaran
       from du_tkr where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          ?>

        <br><br><br>
        <table>
          <tr>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="index.php">Kembali</a></td>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-warning btn-md"
              href="reset.php?nik=<?php echo $d['nik']; ?>" onclick="return confirm('Anda yakin Mereset data <?php echo $d['nama']; ?> ?')">Reset Data</a></td>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-warning btn-md"
              href="edit.php?nik=<?php echo $d['nik']; ?>">Edit</a></td>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;"
              class="btn btn-info btn-md" href="../../../tkr/cetak-daftar-ulang.php?nik=<?php echo $d['nik']; ?>">Cetak Bukti Daftar Ulang</a></td>
          </tr>
        </table>

        <table class="table table-bordered">
          <form class="" action="proses.php" method="post">


            <tr>
              <td>Tanggal Pendaftaran</td>
              <td><?php echo $d['tgl_daftar_ulang']; ?></td>
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
              <td>NIK</td>
              <td><?php echo $d['nik']; ?></td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td><?php echo $d['no_hp']; ?></td>
            </tr>
            <tr>
              <td>Nomor HP Siswa</td>
              <td><?php echo $d['no_hp_siswa']; ?></td>
            </tr>
            <tr>
              <td>Nomor HP Orang Tua</td>
              <td><?php echo $d['no_hp_org_tua']; ?></td>
            </tr>
            <tr>
              <td>Swa Photo Pakta Integritas</td>
              <td>
                <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
                <embed src="../../../tkr/file/<?php echo $d['pdf_swa_fakta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Pakta Integritas</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_fakta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>SKL</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_skl']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Akta Kelahiran</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_akta']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Kartu Keluarga</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_kk']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Photo Background Merah</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_photo']; ?>" type="application/pdf" width="100%" height="500px">
              </td>
            </tr>
            <tr>
              <td>Surat Dokter</td>
              <td>
                <embed src="../../../tkr/file/<?php echo $d['pdf_surat_dokter']; ?>" type="application/pdf" width="100%" height="500px">
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
          <select style="margin-top: 25px;  width: 30%; margin-bottom: 20px" class="form-control" name="kondisi" required>
            <option value="<?php echo $d['kondisi']; ?>">Kondisi Awal(<?php echo $d['kondisi']; ?>)</option>
            <option value="Data Sesuai">Data Sesuai</option>
            <option value="Data Tidak Sesuai">Data Tidak Sesuai</option>
          </select>

          <input style="margin-bottom: 50px" type="submit" class="btn btn-success" name="" value="Submit">

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
