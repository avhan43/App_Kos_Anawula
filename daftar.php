<?php include "config.php";
include "cek_user.php";
$data = mysqli_query($con, "SELECT * FROM kelengkapan k, daftar d WHERE k.id=d.id_user ");
// session_start();
$halaman = 'daftar';

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
                            <h1 class="m-0">Daftar Nama</h1>
                            <!-- Pesan -->

                            <div class="swlDefaultSuccess"></div>
                            <!-- ./Pesan -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Nama</li>
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
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pembayaran</h3>
                    </div>
                    <!-- /.card-header -->

                    <form action="ceklis.php" method="POST">

                        <div class="card-body">
                            <!-- <button class="btn btn-success btn-sm mb-2" type="submit" name="save">Save</button> -->

                            <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                    <table class="jsgrid-table">

                                        <tr class="jsgrid-header-row">
                                            <th class="jsgrid-header-cell jsgrid-align-center" style="width: 30px;">No</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 150px;">Nama</th>
                                            <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 70px;">No. Kamar</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center" style="width: 50px;">Jml Orang</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Jumlah</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Bayar</th>
                                        </tr>
                                    </table>
                                </div>

                                <div class="jsgrid-grid-body">
                                    <table class="jsgrid-table">
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $subtotal = 0;
                                            function rp($data)
                                            {
                                                $hasil_rp = "Rp. " . number_format($data, 0, ',', '.');
                                                return $hasil_rp;
                                            }
                                            $qr = mysqli_query($con, "SELECT * FROM aturan");
                                            if(mysqli_num_rows($qr)>0){
                                                while ($r = mysqli_fetch_array($qr)) {
    
                                                    $listrik = $r['listrik'];
                                                    $air = $r['air'];
                                                }
                                            }else{
                                                $listrik = 0;
                                                $air = 0;
                                            }

                                            while ($d = mysqli_fetch_array($data)) {
                                                $jml_org = $d['jml_orang'];
                                                $laptop = $d['laptop'] * 10000;
                                                $rc = $d['rice_cooker'] * 10000;
                                                $kipas = $d['kipas'] * 6000;
                                                $tv = $d['tv'] * 6000;

                                                $t_listrik = 1 * $listrik;
                                                $t_air = $jml_org * $air;
                                                $total = $laptop + $rc + $kipas + $tv + $t_listrik + $t_air;
                                                $subtotal += $total;

                                            ?>


                                                <tr class="jsgrid-row">
                                                    <td class="jsgrid-cell jsgrid-align-center" style="width: 30px;"><?= $no++; ?></td>
                                                    <td class="jsgrid-cell" style="width: 150px;"><?= $d['nama']; ?></td>
                                                    <td class="jsgrid-cell jsgrid-align-center" style="width: 70px;"><?= $d['no_kamar']; ?></td>
                                                    <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><?= $d['jml_orang']; ?></td>
                                                    <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">
                                                        <?= rp($total); ?></td>

                                                    <?php
                                                    if ($d['bayar'] == 1) {
                                                        echo '<td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><a class="btn btn-success btn-xs" href="ceklis.php?id=' . $d['id'] . '"><i class="fas fa-check text-white"></i></a></td>';
                                                    } else {
                                                        echo '<td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><a class="btn btn-danger btn-xs" href="ceklis.php?id=' . $d['id'] . '"><i class="fas fa-times "></i></a></td>';
                                                    }
                                                    ?>

                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr class="jsgrid-header-row">
                                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" colspan="4">Total </th>

                                                <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;"><?= rp($subtotal); ?>
                                                </th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>


                            </div>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php require_once('footer.php'); ?>