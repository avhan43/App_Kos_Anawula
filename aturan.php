<?php
include "config.php";
include "cek_user.php";
$halaman = 'aturan';
$data = mysqli_query($con, "SELECT * FROM aturan");
// session_start();
require_once("header.php");
require_once("navbar.php");
require_once("sidebar.php");
?>


<body class="hold-transition sidebar-mini dark-mode dark-mode">
<div class="content-wrapper">
    <div class="content-header">
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
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Aturan</h3>
                        </div>
                        <form action="simpan_aturan.php" method="post" class="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Listrik</label>
                                    <input name="listrik" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Air</label>
                                    <input name="air" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jatuh Tempo</label>
                                    <input name="jatuh_tempo" type="date" class="form-control" required>
                                </div>
                                <button class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Data Aturan</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="40px">No</th>
                                        <th>Listrik</th>
                                        <th>Air</th>
                                        <th>Batas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;

                                    while ($d = mysqli_fetch_array($data)) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d['listrik']; ?></td>
                                            <td><?= $d['air']; ?></td>
                                            <td><?= $d['jatuh_tempo']; ?></td>
                                            <td><a href="aturan_delete.php?id=<?= $d['id_aturan']; ?>"><i class="fas fa-trash" style="color:red;"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<?php require_once("footer.php"); ?>