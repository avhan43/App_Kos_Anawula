<?php
$t    = time();
echo ($t . "<br /> Sekarang: ");
echo (date("D, d F Y", $t));
require_once("header.php");
?>
<br /><br />
<?php
$day    = 21;
$month    = 12;
$year    = 2021;


if (isset($_GET['psn'])) {
    echo "<script>
    Swal.fire('Silahkan Tambahkan Kelengkapan Anda',
        '',
        'info');
    
    </script>";
}

$days    = (int)((mktime(0, 0, 0, $month, $day, $year) - time()) / 86400);
echo "Masih ada <b>$days</b> hari lagi, sampai tanggal $day/$month/$year";
require_once("footer.php");
?>