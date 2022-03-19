<?php

include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $wkt = date('h:i:s');
    $tgl = date('Y:m:d');

    $qry = mysqli_query($con, "SELECT bayar FROM daftar WHERE id='$id'");

    if ($qry === false) {
        die(mysqli_error());
    }
    while ($r = mysqli_fetch_array($qry)) {
        $n = $r['bayar'];

        if ($n == 1) {
            $sv = mysqli_query($con, "UPDATE daftar SET bayar=0 WHERE id='$id' ");


            if ($sv == true) {
                header('location:daftar.php');
            } else {
                echo "Data Gagal di Simpan";
            }
        } else {

            $sv = mysqli_query($con, "UPDATE `daftar` SET `bayar` = 1, `waktu` = '$wkt', `tanggal` = '$tgl' WHERE id = '$id'; ");

            if ($sv == true) {
                header('location:daftar.php');
            } else {
                echo "Data Gagal di Simpan";
            }
        }
    }
}
