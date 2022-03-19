<?php
session_start();
require_once("header.php");
require_once("sidebar.php");
require_once("navbar.php");
$halaman = 'tambahuser';
?>
<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah User</h3>
                </div>

                <form action="simpan_user.php" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Anda" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Password</label>
                            <div class="col-sm-8">
                                <input name="password" type="password" class="form-control" placeholder="Nomor Kamar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">level</label>
                            <div class="col-sm-8">
                                <select name="level" class="form-control" required>
                                    <option value="">--Pilih Level--</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>

                                <!-- <input name="level" type="number" class="form-control" value="0" required> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Foto</label>
                            <div class="col-sm-8">
                                <input style="font-size: 12px;" name="foto" type="file" class="form-control" placeholder="Nomor Kamar" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-2">
                                <button name="simpan" style="width: 100%;" type="submit" class="btn btn-danger">Simpan</button>
                            </div>
                            <div class="col-sm-6">
                                <button style="width: 100%;" type="reset" class="btn btn-outline-secondary">Reset</button>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </section>
    </div>
</div>


<?php require_once("footer.php"); ?>