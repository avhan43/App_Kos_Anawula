<?php

require_once("header.php");
// require_once("sidebar.php");
require_once("navbar.php");

if (isset($_GET['pesan'])) {
    echo "<script>
   alert('User Sudah ada Dalam Database')
</script>";
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Input Data</h3>
                    
                </div>

                <form action="simpan_data.php" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nomor Kamar</label>
                            <div class="col-sm-8">
                                <input name="no_kamar" type="text" class="form-control" placeholder="Nomor Kamar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Jumlah Orang</label>
                            <div class="col-sm-8">
                                <input name="jml_org" type="number" class="form-control" value="0" required>
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
                                    <input name="laptop" type="number" class="form-control" value="0" required>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-6 col-form-label text-center">Rice Cooker</label>
                                <div class="col-sm-6">
                                    <input name="rc" type="number" class="form-control" value="0" required>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-4 col-form-label text-center">Kipas</label>
                                <div class="col-sm-4">
                                    <input name="kipas" type="number" class="form-control" value="0" required>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <label class="col-sm-4 col-form-label text-center">Tv</label>
                                <div class="col-sm-4">
                                    <input name="tv" type="number" class="form-control" value="0" required>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-2">
                                <button name="kirim" style="width: 100%;" type="submit" class="btn btn-danger">Kirim</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="login.php" style="width: 100%;" type="button" class="btn btn-warning">Login</a>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
</div>


<?php require_once("footer.php"); ?>