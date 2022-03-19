<?php
include "config.php";

if (isset($_POST['simpan'])) {

    $l = $_POST['listrik'];
    $a = $_POST['air'];
    $j = $_POST['jatuh_tempo'];

    $qry = mysqli_query($con, "INSERT INTO aturan VALUES (NULL,'$l','$a','$j') ");

    if ($qry == true) {
        echo "<script>
        alert('Data Berhasil Di Tambahkan');window.location.assign('aturan.php');
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Tambahkan');window.location.assign('aturan.php')";
    }
}
