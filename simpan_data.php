<?php
include "config.php";
require_once("header.php");

if (isset($_POST['kirim'])) {

    $nama = $_POST['nama'];
    $no_kamar = $_POST['no_kamar'];
    $jml_org = $_POST['jml_org'];
    $laptop = $_POST['laptop'];
    $rc = $_POST['rc'];
    $kipas = $_POST['kipas'];
    $tv = $_POST['tv'];

    $cek = mysqli_query($con, "SELECT * FROM kelengkapan WHERE no_kamar='$no_kamar' ");
    if (mysqli_num_rows($cek) > 0) {
        header('location:index.php?pesan');
    } else {
        $foto = 'avatar2.png';
        $qry2 = mysqli_query($con, "INSERT INTO user VALUES (NULL,'$nama','12345','user','$foto')");
        $qry3 = mysqli_query($con, "SELECT * FROM user WHERE nama='$nama' ");
        if(mysqli_num_rows($qry3) > 0){
            $row = mysqli_fetch_assoc($qry3);
            $id = $row['id'];
            $qry = mysqli_query($con, "INSERT INTO kelengkapan VALUES ('$id', '$nama', '$no_kamar','$jml_org','$laptop','$rc','$kipas','$tv' ) ");
            $qry4 = mysqli_query($con, "INSERT INTO daftar VALUES (NULL,'$id','0','0','00:00:00','00:00:00')");
                
        }
        // $sql = mysqli_query($con, "SELECT * FROM user WHERE id ORDER BY id");
        // while ($d = mysqli_fetch_array($sql)) {
        //     $id = $d['id'];

        //     $qr = mysqli_query($con, "SELECT * FROM aturan");
        //     while ($r = mysqli_fetch_array($qr)) {
        //         $listrik = $r['listrik'];
        //         $air = $r['air'];

        //         $t_laptop = $laptop * 10000;
        //         $t_rc     = $rc * 10000;
        //         $t_kipas  = $kipas * 6000;
        //         $t_tv     = $tv * 6000;

        //         $t_listrik = 1 * $listrik;
        //         $t_air     = $jml_org * $air;

        //         $total = $t_laptop + $t_rc + $t_kipas + $t_tv + $t_listrik + $t_air;

        //     }
        //     $qry2 = mysqli_query($con, "INSERT INTO daftar VALUES(NULL,'$id','0','0','00:00:00','00:00:00')");
        //     $foto = 'avatar2.png';
        //     $simpan = mysqli_query($con, "INSERT INTO user VALUES (NULL, '$nama','12345','user','$foto')");
        }


        header('location:login.php');
    
}
