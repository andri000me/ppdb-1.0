<?php
session_start();
if ($_SESSION['status']!="mesin") {
    header("location:../../index.php?pesan=belum_login");
} else {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Operator PPDB SMKN 1 Kragilan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="../../../css/bootstrap.min.css">

  <script src="../../../js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
  <script type="text/javascript" src="../../../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../../../js/jquery-latest.js"></script>
  <script type="text/javascript" src="../../../../js/jquery.tablesorter.min.js"></script>
</head>

<body>



  <div class="container">
    <center>
      <h2>Halaman Operator Daftar Ulang PPDB SMKN 1 Kragilan</h2>
    </center>
    <center>
      <h3></h3>
    </center>
    <center>
      <h3>Kompetensi Keahlian Teknik Pemesinan</h3>
    </center>

    <br><br><br>

    <div class="form-group">
      <div class="col-sm-7">
        <a href="../../logout.php" type="button" class="btn btn-danger">Logout</a>
        <!-- <a href="../../../../e/akl/akl-lap.php" type="button" class="btn btn-success" -->
        <!-- onclick="return confirm('Download Data PPDB Kompetensi Keahlian Otomatisasi dan Tata Kelola Perkantoran ?')">Download AKL</a> -->
      </div>
      <label class="control-label col-sm-2" for="email">Cari Peserta Calon Peserta Didik :</label>
      <div class="col-sm-3">
        <input type='text' class="form-control" id='input' onkeyup='searchTable()'>
      </div>


    </div>

    <table class="table table-bordered table-hover" id="domainsTable">
      <thead>
        <tr>
          <th>
            <center>No
          </th>
          <th>
            <center>Tanggal Pendaftaran
          </th>
          <th>
            <center>NISN Siswa
          </th>
          <th>
            <center>Nama Siswa
          </th>
          <th>
            <center>Kompetensi Keahlian
          </th>
          <th>
            <center>Asal Sekolah
          </th>
          <th>
            <center>Kondisi
          </th>
          <th>
            <center>Lihat
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
      include '../../../../koneksi.php';
    $halperpage = 500;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
    $result = mysqli_query($koneksi, "SELECT
      no_pendaftaran,
      tgl_daftar_ulang,
      nisn,
      nama,
      kompetensi_keahlian,
      asal_sekolah,
      nik,
      kondisi
         FROM du_tpm where kompetensi_keahlian='Teknik Pemesinan'");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halperpage);

    $data = mysqli_query($koneksi, "SELECT
      no_pendaftaran,
      tgl_daftar_ulang,
      nisn,
      nama,
      kompetensi_keahlian,
      asal_sekolah,
      nik,
      kondisi
        from du_tpm where kompetensi_keahlian='Teknik Pemesinan' LIMIT $mulai, $halperpage ");
    $no = $mulai+1;


    while ($d = mysqli_fetch_array($data)) {
        ?>

        <tr>
          <td>
            <center><?php echo $no++ ?>
          </td>
        
          <td>
            <center><?php echo $d['tgl_daftar_ulang']; ?>
          </td>
          <td>
            <center><?php echo $d['nisn']; ?>
          </td>
          <td>
            <center><?php echo $d['nama']; ?>
          </td>
          <td>
            <center><?php echo $d['kompetensi_keahlian']; ?>
          </td>
          <td>
            <center><?php echo $d['asal_sekolah']; ?>
          </td>
          <td>
            <center>
              <?php
         include('../../validasi.php'); ?>

          </td>
          <td>
            <center>
              <a type="button" class="btn btn-info btn-sm" href="tampil.php?nik=<?php echo $d['nik']; ?>">Lihat</a>
          </td>
        </tr>

        <?php
    } ?>
      </tbody>
    </table>
    <div>
      <?php for ($i=1; $i<=$pages ; $i++) {
        ?>
      <a class="btn btn-info btn-md" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php
    } // database

  ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#domainsTable").tablesorter({
        sortList: [
          [3, 1],
          [2, 0]
        ]
      });
    });

    function searchTable() {
      var input;
      var saring;
      var status;
      var tbody;
      var tr;
      var td;
      var i;
      var j;
      input = document.getElementById("input");
      saring = input.value.toUpperCase();
      tbody = document.getElementsByTagName("tbody")[0];;
      tr = tbody.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
          if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
            status = true;
          }
        }
        if (status) {
          tr[i].style.display = "";
          status = false;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
  <?php
} ?>
</body>

</html>
