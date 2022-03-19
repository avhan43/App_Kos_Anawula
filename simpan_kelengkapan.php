<?php
include "config.php";

if (isset($_POST['kirim'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_kamar = $_POST['no_kamar'];
    $jml_org = $_POST['jml_org'];
    $laptop = $_POST['laptop'];
    $rc = $_POST['rc'];
    $kipas = $_POST['kipas'];
    $tv = $_POST['tv'];

    $qry = mysqli_query($con, "UPDATE kelengkapan SET nama='$nama', no_kamar='$no_kamar',jml_orang='$jml_org', laptop='$laptop',rice_cooker='$rc',kipas='$kipas',tv='$tv' WHERE id='$id'  ");

    // echo $id;
    header('location:kelengkapan.php');
}
