<?php
session_start();
if ($_SESSION['status']!="admin" && $_SESSION['status']!="siswa-tpm") {
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
          <center>
            <h3>Daftar Ulang Peserta Didik SMK Negeri 1 Kragilan</h3>
          </center>
          <center>
            <h3>Kompetensi Keahlian Teknik Pemesinan</h3>
          </center>
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
      tgl_daftar_ulang,
      kondisi,
      no_pendaftaran
       from du_tpm where nik='$nik'");
      while ($d = mysqli_fetch_array($data)) {
          $cek_pdf_fakta = $d['pdf_fakta'];
          $cek_nik = $d['nik'];
          if (!empty($cek_pdf_fakta)) {
              ?>
        <a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="lihat.php?nik=<?php echo $d['nik']; ?>">Kembali</a>

        <?php
         exit;
          } else {
              // echo "kosong";
          } ?>


        <br><br><br>
        <table>
          <tr>
            <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="lihat.php?nik=<?php echo $d['nik']; ?>">Kembali</a></td>
            <!-- <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-info btn-md" href="cetak-form.php?nik=<?php echo $d['nik'] ?>">Cetak Formulir</a></td> -->
          </tr>
        </table>

        <form class="form-horizontal" action="upload.php" name="input" method="POST" enctype="multipart/form-data" onSubmit="return validasi()">
          <table class="table table-bordered">

            <tr>
              <td>Sudah Daftar Ulang?</td>
              <td><?php echo $d['no_pendaftaran']; ?></td>
            </tr>
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
              <td>NIK</td>
              <td><?php echo $d['nik']; ?></td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td><?php echo $d['no_hp']; ?></td>
            </tr>
            <tr>
              <td>Nomor HP Siswa</td>
              <td>
                <input type="number" name="no_hp_siswa" value="" class="form-control">
              </td>
            </tr>
            <tr>
              <td>Nomor HP Orang Tua</td>
              <td>
                <input type="number" name="no_hp_org_tua" value="" class="form-control">
              </td>
            </tr>
            <tr>
              <td>Standar Kompetensi Lulusan (SKL) Asli</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_skl" accept="application/pdf" class="form-control-file" id="pdf_skl" required>
              </td>
            </tr>
            <tr>
              <td>Swa Photo Pakta Integritas</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="hidden" name="nik" value="<?php echo $d['nik']; ?>">
                <input type="hidden" name="nisn" value="<?php echo $d['nisn']; ?>">
                <input type="file" name="pdf_swa_fakta" accept="application/pdf" class="form-control-file" id="pdf_swa_fakta" required>
              </td>
            </tr>
            <tr>
              <td>Scan Pakta Integritas</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_fakta" accept="application/pdf" class="form-control-file" id="pdf_fakta" required>
              </td>
            </tr>
            <tr>
              <td>Akta Asli</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_akta" accept="application/pdf" class="form-control-file" id="pdf_fakta" required>
              </td>
            </tr>
            <tr>
              <td>Kartu Keluarga Asli</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_kk" accept="application/pdf" class="form-control-file" id="pdf_fakta" required>
              </td>
            </tr>
            <tr>
              <td>Photo dengan Seragam Sekolah Background Merah</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_photo" accept="application/pdf" class="form-control-file" id="pdf_fakta" required>
              </td>
            </tr>
            <tr>
              <td>Surat Sehat dan Keterangan Buta Warna dari Puskesmas</td>
              <td>
                <p>File Harus PDF dan Maksimal 500kb</p>
                <input type="file" name="pdf_surat_dokter" accept="application/pdf" class="form-control-file" id="pdf_fakta" required>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <center><input type="submit" style="margin-top: 25px; " class="btn btn-success" name="upload" value="upload"></center>
              </td>
            </tr>
        </form>
      </table><br><br><br>
      <?php
      } ?>

    </div>
  </div>
  </div>
  </div>

</body>

</html>
