<?php
include "config.php";
include "cek_user.php";
$data = mysqli_query($con, "SELECT * FROM kelengkapan k, daftar d WHERE k.id=d.id_user");

$halaman = "kelengkapan";

require_once("header.php");
// session_start();
if (isset($_GET['psn'])) {
    echo "<script>
    Swal.fire('Silahkan Tambahkan Kelengkapan Anda',
        '',
        'info');
    
    </script>";
}

?>

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">
        <!-- Navbar  -->
        <?php require_once("navbar.php"); ?>
        <!-- ./Navbar -->
        <!-- Sidebar -->
        <?php require_once("sidebar.php"); ?>
        <!-- ./Sidebar -->

        <div class="content-wrapper">
            <!-- content header -->
            <div class="content-header">
                <!-- Content_header -->
                <div class="container-fluid">
                    <!-- content fluid -->
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Daftar Kelengkapan</h1>
                            <div class="swlDefaultSuccess"></div>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active"><a href="kelengkapan.php">Daftar Kelengkapan</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
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
                <!-- ./Content-fluid -->
            </div>
            <!-- ./content header -->
            <!-- Section Content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <?php if ($_SESSION['level'] == 'admin') { ?>
                            <a href="index.php" class="btn btn-primary card-title"><i class="fas fa-plus"></i> Tambah Kelengkapan</a>
                        <?php } elseif ($_SESSION['level'] == 'user') {
                            if (isset($_GET['psn'])) {
                                echo '
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus"></i> Tambah Kelengkapan
                              </button>
                                ';
                            } else {
                                echo '<h3 class="card-title">Daftar Kelengkapan</h3>';
                            }
                        ?>

                        <?php } ?>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <div id="jsGrid1" class="jsgrid" style="position: relative; height:100%; width:100%">
                                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                    <table class="jsgrid-table">
                                        <tr class="jsgrid-header-row">
                                            <th class="jsgrid-header-cell jsgrid-align-center" style="width: 40px;">No</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Nama</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">No Kamar</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Jumlah Orang</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Laptop</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Rice Cooker</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Kipas</th>
                                            <th class="jsgrid-header-cell jsgrid-align-center">Tv</th>
                                            <?php
                                            if ($_SESSION['level'] == 'admin') {
                                                echo '<th class="jsgrid-header-cell jsgrid-align-center">Aksi</th>';
                                            } else {
                                                echo '';
                                            }
                                            ?>

                                        </tr>
                                    </table>
                                </div>

                                <div class="jsgrid-grid-body">
                                    <table class="jsgrid-table">
                                        <tbody>
                                            <?php
                                            $no = 1;   


                                            while ($d = mysqli_fetch_array($data)) { ?>
                                                <tr class="jsgrid-row">
                                                    <td class="jsgrid-cell js-align-center" style="width: 40px; text-align:center;"><?= $no++; ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['nama'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['no_kamar'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['jml_orang'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['laptop'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['rice_cooker'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['kipas'] ?></td>
                                                    <td class="jsgrid-cell js-align-center" style="text-align: center;"><?= $d['tv'] ?></td>
                                                    <?php
                                                    if ($_SESSION['level'] == 'admin') {
                                                        echo '<td class="jsgrid-cell js-align-center" style="text-align: center;">
                                                        <a href="edit_kelengkapan.php?id=' . $d["id_user"] . '" class="btn btn-info btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>

                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Section Content -->
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once("footer.php"); ?>