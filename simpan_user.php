<?php
include "config.php";

if (isset($_POST['simpan'])) {

    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    $level = $_POST['level'];
    $foto  = $_POST['foto'];

    $simpan = mysqli_query($con, "INSERT INTO user VALUES (NULL, '$user','$pass','$level','$foto')");
    $sql = mysqli_query($con, "SELECT * FROM user ORDER BY id DESC limit 1");
    $data = mysqli_fetch_array($sql);
    $id = $data['id'];
    $_SESSION['id'] = $id;
    header('location:user.php');
}


if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    $level = $_POST['level'];
    $foto  = $_POST['foto'];

   $simpan = mysqli_query($con, "UPDATE user SET nama='$user',password='$pass',level='$level',foto='$foto' WHERE id='$id' ");
   $sql = mysqli_query($con, "SELECT * FROM user ORDER BY id DESC limit 1");
    $data = mysqli_fetch_array($sql);
    $id = $data['id'];
    $_SESSION['id'] = $id;
    header('location:user.php');
}