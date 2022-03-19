<?php

include "config.php";

if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];
    session_start();
    $qry = mysqli_query($con, "SELECT * FROM user WHERE nama='$user' AND password='$pass' ");

    if ($d = mysqli_num_rows($qry)) {
        $data = mysqli_fetch_assoc($qry);
        if ($data['level'] == 'admin') {
            $_SESSION['username'] = $user;
            $_SESSION['level'] = 'admin';
            header("location:dashboard.php");
        } else if ($data['level'] == 'user') {
            $_SESSION['username'] = $user;
            $_SESSION['level'] = 'user';

            $cek_kelengkapan = mysqli_query($con, "SELECT * FROM kelengkapan,daftar WHERE kelengkapan.id=daftar.id_user AND tanggal=date('m')  ");
            if ($cek_kelengkapan > 0) {
                header('location:kelengkapan.php?psn');
            } else {
                echo "<script>
                    alert('Username atau Password Salah');
                    window.location.assign('login.php');
                    </script>";
            }

            // print_r($_SESSION['level']);
            // header('location:dashboard.php');
        }
    } else {
        echo "<script>
        alert('Username atau Password Salah');
        window.location.assign('login.php');
        </script>";
    }
}
