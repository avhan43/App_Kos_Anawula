<?php
session_start();
include_once('config.php');
require_once("header.php");
require_once("sidebar.php");
require_once("navbar.php");
$halaman = 'edituser';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = mysqli_query($con, "SELECT * FROM user WHERE id=$id");
}
?>
<div class="content-wrapper">
    <div class="content-header">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit User</h3>
                </div>

                <?php while($r = mysqli_fetch_array($data)): ?>
                <form action="simpan_user.php" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Nama</label>
                            <div class="col-sm-8">
                            <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                <input type="text" name="username" class="form-control" value="<?= $r['nama'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Password</label>
                            <div class="col-sm-8">
                                <input name="password" type="password" class="form-control" value="<?= $r['password']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">level</label>
                            <div class="col-sm-8">
                                <select name="level" class="form-control" required>
                                    <option value="<?= $r['level']; ?>"><?= $r['level']; ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>

                                <!-- <input name="level" type="number" class="form-control" value="0" required> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">Foto</label>
                            <div class="col-sm-8">
                                <input style="font-size: 12px;" name="foto" type="file" class="form-control" value="<?= $r['foto']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-2">
                                <button name="edit" style="width: 100%;" type="submit" class="btn btn-danger">Simpan</button>
                            </div>
                            <div class="col-sm-6">
                                <button style="width: 100%;" type="reset" class="btn btn-outline-secondary">Reset</button>

                            </div>
                        </div>

                    </div>
                </form>
                <?php endwhile; ?>

            </div>
        </section>
    </div>
</div>


<?php require_once("footer.php"); ?>