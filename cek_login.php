<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
// belum mengunakan MD5
$nisn = addslashes(trim($_POST['nisn']));
// $nisn = $_POST['nisn'];
$nik = ($_POST['nik']);

// menyeleksi data admin dengan nisn dan nik yang sesuai
$data = mysqli_query($koneksi, "select * from f_siswa where nisn='$nisn' and nik='$nik'");

$cek_id = mysqli_query($koneksi, "SELECT id FROM f_siswa");
while ($row = mysqli_fetch_array($cek_id)) {
    $dapat_id = $row['id'];
}

$dapat_id;

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login['nisn']=="$nisn") {
        $_SESSION['username'] = $nik;
        $_SESSION['nisn'] = "nisn";
        echo "cek";
        header("location:siswa/akl/edit-siswa.php?id=$dapat_id");
        // header("location:siswa/index.php");
    } elseif ($login['level']=="operator") {
        $_SESSION['nisn'] = $nisn;
        $_SESSION['status'] = "login";
        header("location:d/index.php");
    } else {
        echo "gagal1";
        // header("location:index.php?pesan=gagal1");
    }
} else {
    echo "gagal2";

    // header("location:index.php?pesan=gagal");
}
