<?php
session_start();
if ($_SESSION['status']!="akl") {
    header("location:../../login/akl/index.php?pesan=belum_login");
}

include '../../koneksi.php';
$nik = $_POST['nik'];
$nisn = $_POST['nisn'];

echo "cek";
// pdf_fakta
if ($_POST['upload']) {
    $ekstensi_diperbolehkan = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_fakta_up = "pdf_fakta";
    $pdf_fakta = $_FILES['pdf_fakta']['name'];
    $x = explode('.', $pdf_fakta);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_fakta']['size'];
    $file_tmp = $_FILES['pdf_fakta']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_fakta_up.'.pdf');
        } else {
            echo 'pdf_fakta';
            echo 'UKURAN FILE TERLALU BESAR';
            exit;
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        header("location:gagal-upload.php");
        exit;
    }
}

// pdf_swa_fakta
if ($_POST['upload']) {
    $ekstensi_diperbolehkan    = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_swa_fakta_up = "pdf_swa_fakta";
    $pdf_swa_fakta = $_FILES['pdf_swa_fakta']['name'];
    $x = explode('.', $pdf_swa_fakta);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_swa_fakta']['size'];
    $file_tmp = $_FILES['pdf_swa_fakta']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_swa_fakta_up.'.pdf');
        } else {
            echo 'pdf_swa_fakta';
            echo 'UKURAN FILE TERLALU BESAR';
            exit;
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        header("location:gagal-upload.php");
        exit;
    }
}


// UPDATE `upload` SET `id_file`=[value-1],`nama_file`=[value-2] WHERE 1

mysqli_query($koneksi, "UPDATE daftar_ulang SET
             pdf_swa_fakta='$nisn-$pdf_swa_fakta_up.pdf',
             pdf_fakta='$nisn-$pdf_fakta_up.pdf',
             where nik='$nik'
             ");




// node_id=<?php echo $d['node_id'];
 // header("location:cetak-akl.php?id=$id");
