<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cek = mysqli_query($con, "SELECT * FROM aturan WHERE id_aturan='$id' ");

    if ($cek == true) {
        mysqli_query($con, "DELETE FROM aturan WHERE id_aturan='$id' ");
        header("location:aturan.php");
    } else {
        echo "Gagal Menghapus Data";
    }
}
