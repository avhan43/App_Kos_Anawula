<?php
include "config.php";

$qry = mysqli_query($con, "SELECT * FROM aturan WHERE jatuh_tempo");
$row = mysqli_fetch_array($qry);
$batas = $row['jatuh_tempo'];

date_default_timezone_set('Asia/Jakarta');
$tanggal_now = strtotime(date('Y-m-d'));
$jatuh_tempo = strtotime($batas);
// $jatuh_tempo = mktime(0, 0, 0, date('m'), date('d') + 60, date('Y'));

$beda = $jatuh_tempo - $tanggal_now;

$bedahari = ($beda / 24 / 60 / 60);

if ($beda > 0) {
    if ($bedahari < 10) {
        echo "<script>alert('Waktunya ditagih!!!. Jatuh tempo dalam $bedahari hari.')</script>";
    } else {
        echo "
        <script>
        alert('
        Masih lama. Nagihnya $bedahari hari lagi.');
        </script>
        ";
    }
} else {
    echo "hasilnya kok minus?";
}

// $hasil = $jatuh_tempo - $tanggal_now;
// echo $bedahari;
