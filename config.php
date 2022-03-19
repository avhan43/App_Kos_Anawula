<?php

$local = "localhost";
$user = "root";
$pass = "";
$db = "kos";

$con = mysqli_connect($local, $user, $pass, $db);

if (!$con) {
    echo "Database Gagal Terkoneksi";
}
