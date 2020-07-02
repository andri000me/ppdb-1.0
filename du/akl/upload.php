<?php
session_start();
if ($_SESSION['status']!="siswa-akl") {
    header("location:index.php?pesan=belum_login");
}

include '../../koneksi.php';
$nik = $_POST['nik'];
$nisn = $_POST['nisn'];
$no_hp_siswa = $_POST['no_hp_siswa'];
$no_hp_org_tua = $_POST['no_hp_org_tua'];

// pdf_skl
if ($_POST['upload']) {
    $ekstensi_diperbolehkan = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_skl_up = "pdf_skl";
    $pdf_skl = $_FILES['pdf_skl']['name'];
    $x = explode('.', $pdf_skl);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_skl']['size'];
    $file_tmp = $_FILES['pdf_skl']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_skl_up.'.pdf');
        } else {
            echo 'pdf_skl';
            echo '<br>';
            echo ' UKURAN FILE TERLALU BESAR';
            exit;
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        echo ' EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        // header("location:gagal-upload.php");
        exit;
    }
}

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
            echo '<br>';
            echo ' UKURAN FILE TERLALU BESAR';
            exit;
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        echo ' EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        // header("location:gagal-upload.php");
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

// pdf_akta
if ($_POST['upload']) {
    $ekstensi_diperbolehkan    = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_akta_up = "pdf_akta";
    $pdf_akta = $_FILES['pdf_akta']['name'];
    $x = explode('.', $pdf_akta);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_akta']['size'];
    $file_tmp = $_FILES['pdf_akta']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_akta_up.'.pdf');
        } else {
            echo 'pdf_akta';
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


// pdf_kk
if ($_POST['upload']) {
    $ekstensi_diperbolehkan    = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_kk_up = "pdf_kk";
    $pdf_kk = $_FILES['pdf_kk']['name'];
    $x = explode('.', $pdf_kk);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_kk']['size'];
    $file_tmp = $_FILES['pdf_kk']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_kk_up.'.pdf');
        } else {
            echo 'pdf_kk';
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
    $pdf_photo_up = "pdf_photo";
    $pdf_photo = $_FILES['pdf_photo']['name'];
    $x = explode('.', $pdf_photo);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_photo']['size'];
    $file_tmp = $_FILES['pdf_photo']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_photo_up.'.pdf');
        } else {
            echo 'pdf_photo';
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


// pdf_surat_dokter
if ($_POST['upload']) {
    $ekstensi_diperbolehkan    = array('pdf');
    $waktu = date('d-m-Y');
    $pdf_surat_dokter_up = "pdf_surat_dokter";
    $pdf_surat_dokter = $_FILES['pdf_surat_dokter']['name'];
    $x = explode('.', $pdf_surat_dokter);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_surat_dokter']['size'];
    $file_tmp = $_FILES['pdf_surat_dokter']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'file/'.$nisn.'-'.$pdf_surat_dokter_up.'.pdf');
        } else {
            echo 'pdf_surat_dokter';
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

mysqli_query($koneksi, "UPDATE du_akl SET
             tgl_daftar_ulang='$waktu',
             pdf_swa_fakta='$nisn-$pdf_swa_fakta_up.pdf',
             pdf_fakta='$nisn-$pdf_fakta_up.pdf',
             pdf_akta='$nisn-$pdf_akta_up.pdf',
             pdf_kk='$nisn-$pdf_kk_up.pdf',
             pdf_photo='$nisn-$pdf_photo_up.pdf',
             pdf_surat_dokter='$nisn-$pdf_surat_dokter_up.pdf',
             pdf_skl='$nisn-$pdf_skl_up.pdf',
             no_hp_siswa='$no_hp_siswa',
             no_hp_org_tua='$no_hp_org_tua'
             where nik='$nik'
             ")
             or die(mysqli_error($koneksi));




// node_id=<?php echo $d['node_id'];
header("location:cetak-daftar-ulang.php?nik=$nik");
