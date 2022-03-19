<?php
include "config.php";
include "cek_user.php";

$data = mysqli_query($con, "SELECT * FROM daftar d, kelengkapan k WHERE d.id_user=k.id");


$qry = mysqli_query($con, "SELECT id_user FROM daftar ");
$jml = mysqli_num_rows($qry);

$membayar = mysqli_query($con, "SELECT bayar FROM daftar WHERE bayar=1 ");
$tlh_byr = mysqli_num_rows($membayar);

$belum_bayar = mysqli_query($con, "SELECT bayar FROM daftar WHERE bayar=0");
$blm_bayar = mysqli_num_rows($belum_bayar);

$belum_isi = mysqli_query($con, "SELECT * from daftar");
$blm_isi = mysqli_num_rows($belum_isi);
$blm_isi2 = 18 - $blm_isi;

$halaman = 'dashboard';
// session_start();

?>


<?php require_once('header.php'); ?>

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require_once('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content-Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <?php
                    // $denda = "Rp. 20.000,-";
                    $qry = mysqli_query($con, "SELECT * FROM aturan WHERE jatuh_tempo");
                    $row = mysqli_fetch_array($qry);
                    if(mysqli_num_rows($qry)>0){
                        $batas = $row['jatuh_tempo'];
                    }else{
                        $batas = "";
                    }

                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal_now = strtotime(date('Y-m-d'));
                    $jatuh_tempo = strtotime($batas);
                    // $jatuh_tempo = mktime(0, 0, 0, date('m'), date('d') + 60, date('Y'));

                    $beda = $jatuh_tempo - $tanggal_now;

                    $bedahari = ($beda / 24 / 60 / 60);
                    if ($beda > 0) {
                        if ($bedahari < 10) {
                            echo "
                            <marquee style='color:#fff;
                            margin-top: -15px;' scrolldelay='100' behavior='alternate' direction='left'>Waktunya ditagih!!!. Jatuh tempo dalam <strong style='font-size:20px'>$bedahari</strong> hari.</marquee>";
                        } else {
                            echo "
                            <marquee style='color:#fff;
                            margin-top: -15px;' scrolldelay='100' behavior='alternate' direction='left'>Masih lama. Nagihnya <strong style='font-size:20px'>$bedahari</strong> hari lagi.</marquee>";
                        }
                    } else {
                        echo "
                        <marquee style='color:#fff;
                            margin-top: -15px;' scrolldelay='100' behavior='alternate' direction='left'><strong style='font-size:20px'>Tanggal Jatuh Tempo Belum Di Setting</strong> </marquee>";;
                    }
                    ?>

                </div><!-- /.container-fluid -->
            </div>
            <!-- End COntent Header -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid" id="jarak">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= $jml; ?></h3>
                                    <p>Jumlah Orang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $tlh_byr; ?><sup style="font-size: 20px"> Orang</sup></h3>

                                    <p>Telah Membayar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= $blm_bayar; ?> <sup style="font-size: 20px"> Orang</sup></h3>

                                    <p>Belum Bayar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $blm_isi2; ?></h3>

                                    <p>Belum Mengisi Form</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable ui-sortable">
                            <!-- TO DO List -->
                            <div class="card">
                                <div class="card-header ui-sortable-handle">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        Daftar Nama
                                        <?php 
                                    if($qryy = mysqli_query($con, "SELECT * FROM aturan WHERE jatuh_tempo")){
                                        $row = mysqli_fetch_array($qryy);
                                        if(mysqli_num_rows($qryy)>0){
                                            $batas = $row['jatuh_tempo'];
                                        }else{
                                            echo "<br>";
                                            echo "<p class='btn btn-sm btn-danger'><i class='fas fa-exclamation-circle mr-1'></i> Jumlah Pembayaran Belum Pastikan | Setelah Tanggal Di Tetapkan Jumlah Pembayaran Pasti </p>";
                                        }
                                    }
                                    ?>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    $no = 1;
                                    function rp($data)
                                    {
                                        $hasil_rp = "Rp. " . number_format($data, 0, ',', '.');
                                        return $hasil_rp;
                                    }
                                    $qr = mysqli_query($con, "SELECT * FROM aturan");
                                    if(mysqli_num_rows($qr)>0){
                                        while ($d = mysqli_fetch_array($qr)) {
                                            $listrik = $d['listrik'];
                                            $air = $d['air'];
                                        }
                                    }else{
                                        $listrik = 0;
                                        $air = 0;
                                    }
                                    while ($r = mysqli_fetch_array($data)) {
                                        $jml_org = $r['jml_orang'];
                                        $laptop = $r['laptop'] * 10000;
                                        $rc = $r['rice_cooker'] * 10000;
                                        $kipas = $r['kipas'] * 6000;
                                        $tv = $r['tv'] * 6000;

                                        $t_listrik = 1 * $listrik;
                                        $t_air = $jml_org * $air;
                                        $total = $laptop + $rc + $kipas + $tv + $t_listrik + $t_air;
                                    ?>
                                        <ul class="todo-list ui-sortable" data-widget="todo-list">
                                            <li>
                                                <!-- drag handle -->
                                                <span class="handle ui-sortable-handle">
                                                    <?= $no++; ?>.
                                                </span>
                                                <!-- checkbox -->
                                                <div class="icheck-primary d-inline ml-2">
                                                    <?php

                                                    if ($r['bayar'] == 1) {
                                                        echo '<input type="checkbox" value="" name="todo1" id="todoCheck1" disabled="" checked>';
                                                    } else {

                                                        echo '<input type="checkbox" value="" name="todo1" disabled="" id="todoCheck1">';
                                                    }
                                                    ?>
                                                </div>
                                                <!-- todo text -->

                                                <!-- // $data2 = mysqli_query($con, "SELECT * FROM daftar d, kelengkapan k WHERE d.id_user=k.id and month(tanggal) = " . date('m') . " "); -->


                                                <span class="text"><?= $r['nama']; ?></span>

                                                <?php

                                                if ($beda < 1) {
                                                    // $denda = 20000;
                                                    $total_j = $laptop + $rc + $kipas + $tv + $t_listrik + $t_air;
                                                    echo '<span class="text">' . rp($total_j) . '</span>';
                                                } else {
                                                    echo '<span class="text">' . rp($total) . '</span>';
                                                }

                                                ?>


                                                <!-- Emphasis label -->

                                                <?php
                                                $jam = date('H:i:s');
                                                if ($r['bayar'] == 1) {
                                                    echo '<small class="badge badge-danger"><i class="far fa-clock"></i> ' . $r['waktu'] . '</small>
                                                    <small class="badge badge-info"><i class="far fa-date"></i> ' . $r['tanggal'] . '</small>';
                                                    echo '<small class="badge badge-warning"><i class="fas fa-chxeck"></i> Sudah Membayar</small>';
                                                } else {
                                                    echo '<small class="badge badge-warning"><i class="fas fa-times"></i> Belum Membayar</small>';
                                                    echo '<small class="badge badge-danger"><i class="far fa-clock"></i> 00:00:00</small>';
                                                }
                                                ?>


                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable ui-sortable">


                            <!-- /.card -->



                    </div>
                    <!-- /.card -->
            </section>
            <!-- right col -->
        </div>
        <!-- ./row -->



        <!-- /.content -->

        <!-- /.content-wrapper -->

        <?php require_once('footer.php'); ?>