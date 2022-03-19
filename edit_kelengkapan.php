<?php
include "config.php";
// session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = mysqli_query($con, "SELECT * FROM kelengkapan WHERE id='$id' ");
}
require_once("header.php");
// require_once("sidebar.php");
require_once("navbar.php");
?>
<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Input Data</h3>
                </div>
                <?php while ($r = mysqli_fetch_array($data)) { ?>
                    <form action="simpan_kelengkapan.php" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nama</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                    <input type="text" name="nama" class="form-control" value="<?= $r['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Nomor Kamar</label>
                                <div class="col-sm-8">
                                    <input name="no_kamar" type="text" class="form-control" value="<?= $r['no_kamar']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-right">Jumlah Orang</label>
                                <div class="col-sm-8">
                                    <input name="jml_org" type="number" class="form-control" value="<?= $r['jml_orang']; ?>">
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="form-group row mb-0">
                                <label class="col-sm-12 col-form-label text-center text-red">Kelengkapan</label>
                            </div>
                            <hr class="m-0">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="col-sm-4 col-form-label text-center">Laptop</label>
                                    <div class="col-sm-4">
                                        <input name="laptop" type="number" class="form-control" value="<?= $r['laptop']; ?>">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-6 col-form-label text-center">Rice Cooker</label>
                                    <div class="col-sm-6">
                                        <input name="rc" type="number" class="form-control" value="<?= $r['rice_cooker']; ?>">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-4 col-form-label text-center">Kipas</label>
                                    <div class="col-sm-4">
                                        <input name="kipas" type="number" class="form-control" value="<?= $r['kipas']; ?>">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-4 col-form-label text-center">Tv</label>
                                    <div class="col-sm-4">
                                        <input name="tv" type="number" class="form-control" value="<?= $r['tv']; ?>">
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mb-2">
                                    <button name="kirim" style="width: 100%;" type="submit" class="btn btn-danger">Kirim</button>
                                </div>
                                <div class="col-sm-6">
                                    <button style="width: 100%;" type="reset" class="btn btn-outline-secondary">Reset</button>

                                </div>
                            </div>
                        </div>
                    </form>
                <?php }; ?>

            </div>
        </section>
    </div>
</div>


<?php require_once("footer.php"); ?>