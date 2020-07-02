<br>
<div class='alert alert-warning' role='alert'>
Catatan Harap di Ingat :
<br>1. Lakukan Cetak Pakta Integritas
<br>2. Lakukan Pengisian Daftar Ulang
</div>
<table>
  <tr>
    <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="logout.php">Keluar</a></td>
    <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-info btn-md" href="cetak-form.php?nik=<?php echo $d['nik'] ?>">Cetak Pakta Integritas</a></td>
    <!-- <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-info btn-md" href="https://docs.google.com/forms/d/e/1FAIpQLSeQhRdEHyXJ3xF1nTUFareJZjobxz8sb1EgnjlmiilCiqAiKA/viewform">Form Dapodik</a></td> -->
    <!-- <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-info btn-md" href="../download/SURAT-UNTUK-ORANGTUA-SISWA.pdf">Surat Untuk Orang Tua Siswa</a></td> -->
<?php
$cek_fakta = $d['pdf_fakta'];
if ($cek_fakta == '') {
    ?>
    <td><a style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-warning btn-md" href="du.php?nik=<?php echo $d['nik']; ?>">Input Daftar Ulang</a></td>
<?php
} else {
        ?>
        <td><a style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-success btn-md" href="cetak-daftar-ulang.php?nik=<?php echo $d['nik']; ?>">Cetak Bukti Daftar Ulang</a></td>

  <?php
    } ?>
  </tr>
</table>

<h3>Catatan Operator : <?php echo $d['catatan']; ?></h3>
<h3></h3>

<table class="table table-bordered">


  <tr>
    <td>Tanggal Daftar Ulang</td>
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
    <td>Nomor HP Siswa</td>
    <td><?php echo $d['no_hp_siswa']; ?></td>
  </tr>
  <tr>
    <td>Nomor HP Orang Tua</td>
    <td><?php echo $d['no_hp_org_tua']; ?></td>
  </tr>
  <tr>
    <td>NIK</td>
    <td><?php echo $d['nik']; ?></td>
  </tr>
  <tr>
    <td>Standar Kompetensi Lulusan (SKL) Asli</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_skl.pdf" type="button" class="btn btn-primary btn-md" name="button">SKL</a>
    </td>
  </tr>
  <tr>
    <td>Swa Photo Pakta Integritas</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_swa_fakta.pdf" type="button" class="btn btn-primary btn-md" name="button">Swa Photo Pakta Integritas</a>
    </td>
  </tr>
  <tr>
    <td>Pakta Integritas</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_fakta.pdf" type="button" class="btn btn-primary btn-md" name="button">Pakta Integritas</a>
    </td>
  </tr>
  <tr>
    <td>Akta Kelahiran</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_akta.pdf" type="button" class="btn btn-primary btn-md" name="button">Akta Kelahiran</a>
    </td>
  </tr>
  <tr>
    <td>Kartu Keluarga</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_kk.pdf" type="button" class="btn btn-primary btn-md" name="button">Kartu Kelurga</a>
    </td>
  </tr>
  <tr>
    <td>Photo Background Merah</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_photo.pdf" type="button" class="btn btn-primary btn-md" name="button">Photo</a>
    </td>
  </tr>
  <tr>
    <td>Surat Sehat dan Keterangan Buta Warna dari Puskesmas</td>
    <td>
      <a href="file/<?php echo $d['nik'] ?>-pdf_surat_dokter.pdf" type="button" class="btn btn-primary btn-md" name="button">Surat Sehat dan Buta Warna</a>
    </td>
  </tr>
