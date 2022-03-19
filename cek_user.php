<?php
session_start();

if ($_SESSION['username'] == '' || $_SESSION['level'] == '') {
    header('location:login.php');
}