<?php

 $tampil_kondisi = $d['kondisi'];
if ($tampil_kondisi == "Data Sesuai") {
    echo "<button type='button' class='btn btn-success btn-sm' disabled><b>Data Sesuai</b></a>";
} elseif ($tampil_kondisi == "Data Tidak Sesuai") {
    echo "<button type='button' class='btn btn-danger btn-sm' disabled><b>Data Tidak Sesuai</b></a>";
    echo "<br>";
} else {
    echo "";
}
