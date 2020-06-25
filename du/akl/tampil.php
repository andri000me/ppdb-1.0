<br><br><br>
<table>
  <tr>
    <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-danger btn-md" href="logout.php">Keluar</a></td>
    <td><a type="button" style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-warning btn-md" href="cetak-form.php?nik=<?php echo $d['nik'] ?>">Cetak Formulir</a></td>
    <td><a style="margin-right: 10px; margin-bottom: 25px;" class="btn btn-primary btn-md" href="du.php?nik=<?php echo $d['nik']; ?>">Input Daftar Ulang</a></td>
  </tr>
</table>

<table class="table table-bordered">

  <tr>
    <td>Sudah Daftar Ulang?</td>
    <td><?php echo $d['no_pendaftaran']; ?></td>
  </tr>
  <tr>
    <td>Catatan Operator</td>
    <td><?php echo $d['catatan']; ?></td>
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
    <td>alamat</td>
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
      <a href="" type="button" class="btn btn-primary btn-md" name="button">Swa Photo Fakta Integritas</a>
    </td>
  </tr>
  <tr>
    <td>Fakta Integritas</td>
    <td>
      <a href="" type="button" class="btn btn-primary btn-md" name="button">Fakta Integritas</a>
    </td>
  </tr>
