<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qry = mysqli_query($con, "DELETE FROM user WHERE id='$id' ");
    // Delete daftar
    $qry = mysqli_query($con, "DELETE FROM daftar WHERE id_user='$id' ");
    // Delete Kelengkapan
    $qry = mysqli_query($con, "DELETE FROM kelengkapan WHERE id='$id' ");
    // $qry2= mysqli_query($con, "DELETE FROM daftar WHERE id_user='$id' ");
    // $qry3 = mysqli_query($con, "DELETE FROM kelengkapan WHERE id='$id' ");

    header('location:user.php');
}
