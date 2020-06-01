<?php
session_start();

include '../../koneksi.php';
$id = $_GET['id'];

$cek_id = mysqli_query($koneksi, "SELECT id FROM f_siswa_tkj where id='$id'");
while ($row = mysqli_fetch_array($cek_id)) {
    $dapat_id = $row['id'];
}

if ($_SESSION['id']!="$dapat_id") {
    header("location:../../index.php?pesan=belum_login");
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


  <!-- <link href="../0-datepicker/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"> -->
</head>
<body>

<div class="container">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <center><img style="margin-top: 25px;" src="../../images/logo-banten.png" />
      </div>
      <div class="col-md-6">
        <center>
          <h2 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h2>
        </center>
        <center>
          <h4><b>Form Pendaftaran</b></h4>
        </center>
        <center>
          <h4><b>Calon Peserta Didik Baru</b></h4>
        </center>
        <center>
          <h5><b>Tahun Pelajaran 2020/2021</b></h4>
        </center>
        <center>
          <h4><b>Program Studi Teknik Komputer Jaringan</b></h4>
        </center><br>
        <!-- font ganti jenis -->
      </div>
      <div class="col-md-3">
        <center><img style="margin-bottom:  80px; margin-top:  25px;" class="img-fluid" alt="Bootstrap Image Preview" src="../../images/logo-smkn1.png" />
      </div>
    </div>
  </div>


  <form class="form-horizontal" action="update-siswa.php" name="input" method="POST"  enctype="multipart/form-data" onSubmit="return validasi()">

    <?php
      include '../../koneksi.php';
      $id = $_GET['id'];
      $data = mysqli_query($koneksi, "select * from f_siswa_tkj where id='$id'");
      while ($d = mysqli_fetch_array($data)) {
          $cek_npsn = $d['npsn_sekolah'];
          if (!empty($cek_npsn)) {
              header("location:tkj-lihat.php?id=$id");
          } ?>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nomor Pendaftaran :</label>
      <div class="col-sm-6">
        <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>
        <input type="text" class="form-control" name="no_p" value="<?php echo $d['no_p']; ?>" id="no_p" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Tanggal Pendaftaran :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="tgl_pendfataran" value="<?php echo date('d-m-Y'); ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kompetensi Keahlian :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="kompetensi_keahlian" value="<?php echo $d['kompetensi_keahlian']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kompetensi Keahlian Ke-2 :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="kompetensi_keahlian_2" value="<?php echo $d['kompetensi_keahlian_2']; ?>" readonly>
      </div>
    </div>

    <br><h4>A. DATA ASAL SEKOLAH CALON PESERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nama Asal Sekolah :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nama Asal Sekolah" name="asal_sekolah" id="asal_sekolah" value="<?php echo $d['asal_sekolah']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">NPSN Sekolah Asal :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="NPSN Sekolah Asal" name="npsn_sekolah" value="" required>
      </div>
    </div>

    <br><h4>B. IDENTITAS CALON PESERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">NISN :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="NISN" name="nisn" value="<?php echo $d['nisn']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nama Calon Peserta Didik :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Nama" name="nama_siswa" value="<?php echo $d['nama_siswa']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Jenis Kelamin :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Nama" name="jenis_kelamin" value="<?php echo $d['jenis_kelamin']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Tempat Lahir :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $d['tempat_lahir']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Tanggal Lahir :</label>
      <div class="col-sm-3">
        <input type="text" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>"  class="form-control datepicker"  readonly/>
      </div>
      (Bulan/Tanggal/Tahun)
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Tahun lulus :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="Tahun lulus" name="tahun_lulus" value="<?php echo $d['tahun_lulus']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nomor WhatsApp :</label>
      <div class="col-sm-3">
        <input type="number" class="form-control" name="no_hp" placeholder="Nomor WhatsApp" required>
      </div>
    </div>

    <br><h4>C. KEPENDUDUKAN CALON PESERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">NIK :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="NIK siswa dari KK" name="nik" value="<?php echo $d['nik']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nomor Kartu keluarga (KK) :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="Nomor KK" name="no_kk" value="<?php echo $d['no_kk']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Tanggal Diterbitkan KK :</label>
      <div class="col-sm-3">
        <input type="text" name="tgl_kk" class="form-control datepicker" required/>
      </div>
      (Bulan/Tanggal/Tahun)
    </div>

    <br><h4>D. DATA ALAMAT TEMPAT TINGGAL SESUAI KK CALON PESERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kabupaten/Kota :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Kabupaten/Kota" name="kota" value="<?php echo $d['kota']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kecamatan :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Kecamatan" name="kecamatan" value="<?php echo $d['kecamatan']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kelurahan/Desa :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Kelurahan/Desa" name="kelurahan" value="<?php echo $d['kelurahan']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kode POS :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="Kode POS" name="kode_pos" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Alamat :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Alamat" name="alamat" value="<?php echo $d['alamat']; ?>" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">RT :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="RT" name="rt" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">RW :</label>
      <div class="col-sm-6">
        <input type="number" class="form-control"   placeholder="RW" name="rw" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Jarak Alamat Siswa ke Sekolah :</label><b>Meter</b>
      <div class="col-sm-4">
        <input type="number" class="form-control"   placeholder="Jarak Rumah ke Sekolah" name="jarak_kesekolah" value="<?php echo $d['jarak_kesekolah']; ?>" required>
      </div>
    </div>

    <br><h4>D. DATA ORANG TUA/WALI CALON PSERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nama Orang Tua/Wali :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Nama Orang Tua" name="nama_org_tua" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Pekerjaan Orang Tua/Wali :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="Pekerjaan Orang Tua" name="pekerjaan_org_tua" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">PKH/KKS/KIP/Jamsosda<br>(Diisi jika memiliki) :</label>
      <div class="col-sm-6">
        <input type="text" class="form-control"   placeholder="PKH/KKS/KIP/Jamsosda" name="kip" value="">
      </div>
    </div><br>

    <h4>F. INPUT SCAN BERKAS CALON PESERTA DIDIK</h4>

    <div class="form-group">
      <label class="control-label col-sm-2">SKHUN atau Surat Keterangan Lulus</label>
      <div class="col-sm-6">
        <input type="file" name="pdf_skhun" accept="application/pdf" class="form-control-file" id="cek_skhu" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Surat Sehat dari Dokter Pemerintah</label>
      <div class="col-sm-6">
        <input type="file" name="pdf_surat_dokter" accept="application/pdf" class="form-control-file" id="cek_surat_dokter" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Kartu Keluarga (KK) </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_kk" accept="application/pdf" class="form-control-file" id="cek_kk" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Akta Kelahiran </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_akta" accept="application/pdf" class="form-control-file" id="cek_akta" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Photo </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_photo" accept="application/pdf" class="form-control-file" id="cek_photo" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Swafoto memegang KK Sedang diukur tinggi badan </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_swa_kk" accept="application/pdf" class="form-control-file" id="cek_swa_kk" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Piagam 1 </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_piagam1" accept="application/pdf" class="form-control-file" id="cek_piagam1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Piagam 2</label>
      <div class="col-sm-6">
        <input type="file" name="pdf_piagam2" accept="application/pdf" class="form-control-file" id="cek_piagam2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Piagam 3 </label>
      <div class="col-sm-6">
        <input type="file" name="pdf_piagam3" accept="application/pdf" class="form-control-file" id="cek_piagam3">
      </div>
    </div>
    <h6><b>Informasi :</h6>
    <h6>1. File harus dengan format <b>.pdf</b> dengan ukuran maksimal <b>500 kb</b></h6>
    <h6>2. Dokumen yang di <b>Scan Harus Asli (bukan Photo Copy)</b></h6>
    <h6>3. Piagam boleh dikosongkan</h6>
    <h6>4. Piagam hasil perlombaan dan/atau penghargaan di bidang akademik maupun non akademik</h6>
    <h6>5. Contoh swa photo dapat dilihat di link berikut(belum di kerjakan)</h6>
    <h6>6. Surat sehat harus ditandatangani oleh dokter pemerintah.</h6>

    <br><h4>F. INPUT NILAI UJIAN NASIONAL PESERTA DIDIK</h4>
    <div class="form-group">
      <label class="control-label col-sm-2" >Nilai Bahasa Indonesia </label>
      <div class="col-sm-3">
        <input type="number" class="form-control"   placeholder="Nilai Bahasa Indonesia" name="un_bind" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nilai Bahasa Inggris </label>
      <div class="col-sm-3">
        <input type="number" class="form-control"   placeholder="Nilai Bahasa Inggris" name="un_bing" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nilai Matematika </label>
      <div class="col-sm-3">
        <input type="number" class="form-control"   placeholder="Nilai Matematika" name="un_mtk" value="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Nilai IPA </label>
      <div class="col-sm-3">
        <input type="number" class="form-control"   placeholder="Nilai IPA" name="un_ipa" value="" required>
      </div>
    </div>
    <br><h4>H. KONDISI FISIK DAN KEBIASAAN</h4>
      <div class="form-group">
        <label class="control-label col-sm-2" >Apakah anda bertindik (bagi laki-laki) </label>
        <div class="col-sm-2">
          <select name="bertindik" class="form-control" required>
            <option value="">Pilihan Anda</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
                <option value="Perempuan">Saya Perempuan</option>
            </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >Apakah anda Perokok </label>
        <div class="col-sm-2">
          <select name="perokok" class="form-control" value="<?php echo $d['perokok']; ?>" required>
            <option value="">Pilihan Anda</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
          </select>
       </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >Apakah anda pemakai Psikotropika<br>(Narkoba, Ganja dan sejenisnya) </label>
        <div class="col-sm-2">
          <select name="psikotropika" class="form-control" required>
            <option value="">Pilihan Anda</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
          </select>
       </div>
      </div>
    <div class="form-group">
     <label class="control-label col-sm-2" >Apakah anda bertato </label>
     <div class="col-sm-2">
       <select name="bertato" class="form-control" required>
         <option value="">Pilihan Anda</option>
             <option value="Ya">Ya</option>
             <option value="Tidak">Tidak</option>
         </select>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" >Apakah anda peminum-minuman keras </label>
     <div class="col-sm-2">
       <select name="peminum" class="form-control" required>
         <option value="">Pilihan Anda</option>
             <option value="Ya">Ya</option>
             <option value="Tidak">Tidak</option>
         </select>
      </div>
    </div>
    <div class="form-group">
     <label class="control-label col-sm-2" >Apakah anda Buta Warna </label>
     <div class="col-sm-2">
       <select name="buta_warna" class="form-control" required>
         <option value="">Pilihan Anda</option>
             <option value="Ya">Ya</option>
             <option value="Tidak">Tidak</option>
         </select>
      </div>
    </div>
    <br><h4>I. PERSYARATAN KHUSUS KOMPETENSI KEAHLIAN TEKNIK KOMPUTER JARINGAN</h4>
    <div class="form-group">
     <label class="control-label col-sm-2" >Kesanggupan mempunyai laptop pribadi </label>
     <div class="col-sm-2">
       <select name="laptop" class="form-control" required>
         <option value="">Pilihan Anda</option>
             <option value="Ya">Ya</option>
             <option value="Tidak">Tidak</option>
         </select>
      </div>
    </div>

<?php
      } ?>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="upload" value="upload" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

<?php  ?>
    <script src="../../../siswa/0-datepicker/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../../../siswa/0-datepicker/js/custom.js"></script>

    <script>
    $(document).ready(function(){
        setDatePicker()
        setDateRangePicker(".startdate", ".enddate")
        setMonthPicker()
        setYearPicker()
        setYearRangePicker(".startyear", ".endyear")
    })
    </script>

  </body>
</html>
