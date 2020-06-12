<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calon Siswa sudah Mendaftar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/jquery-latest.js"></script>
  <script type="text/javascript" src="../../js/jquery.tablesorter.min.js"></script>
  <script type="text/javascript" src="../0-chartjs/Chart.js"></script>

</head>

<body>



  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <center><img style="margin-top: 25px;" src="../../images/logo-banten.png" />
      </div>
      <div class="col-md-6">
        <center>
          <h2 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h2>
        </center>
        <center>
          <h4><b>Daftar Calon Peserta Didik yang sudah Mendaftar</b></h4>
        </center>
        <center>
          <h4><b>Calon Peserta Didik Baru</b></h4>
        </center>
        <center>
          <h5><b>Tahun Pelajaran 2020/2021</b></h4>
        </center>
        <center>
          <h4><b>Program Studi Akuntansi Keuangan Lembaga</b></h4>
        </center><br>
        <!-- font ganti jenis -->
      </div>
      <div class="col-md-3">
        <center><img style="margin-bottom:  80px; margin-top:  25px;" class="img-fluid" alt="Bootstrap Image Preview" src="../../images/logo-smkn1.png" />
      </div>
    </div>

    <?php
    include '../../koneksi.php';
    ?>

    <div style="width: 800px;margin: 0px auto;">
      <canvas id="myChart"></canvas>
    </div>

    <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Siswa Bisa Seleksi",
          "Siswa Belum Seleksi",
          "Data Sudah di Periksa",
          "siswa blm seleksi"],
          datasets: [{
            label: '',
            data: [
            <?php
            $akl_semua = mysqli_query($koneksi, "SELECT tgl_pendaftaran FROM f_siswa_akl ");
            echo mysqli_num_rows($akl_semua);
            ?>,
            <?php
            $akl_blm = mysqli_query($koneksi, "SELECT tgl_pendaftaran FROM f_siswa_akl WHERE tgl_pendaftaran = ''");
            echo mysqli_num_rows($akl_blm);
            ?>,
            <?php
            $akl_cek = mysqli_query($koneksi, "SELECT tgl_pendaftaran FROM f_siswa_akl WHERE kondisi = ''");
            echo mysqli_num_rows($akl_cek);
            ?>,
            <?php
            $akl_semua_cek = mysqli_num_rows($akl_semua);
            $akl_blm_cek = mysqli_num_rows($akl_blm);
            echo $akl_semua_cek - $akl_blm_cek;
            ?>
            ],
            backgroundColor: [
            'rgba(0, 101, 153, 1.00)',
            'rgba(125, 106, 172, 1.00)',
            'rgba(255, 127, 66, 1.00)',
            'rgba(248, 161, 28, 1.00)',
            'rgba(73, 179, 165, 1.00)',
            'rgba(133, 198, 202, 1.00)',
            ],
            borderColor: [
            'rgba(0, 101, 153, 1.00)',
            'rgba(125, 106, 172, 1.00)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
    </script>

  </div>
</body>

</html>
