<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Avhan Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= strtoupper($_SESSION['username']); ?></span>
    </a>

    <!-- Sidebar -->


    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a href="dashboard.php" class="d-block"><?= strtoupper($_SESSION['username']); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <div class="tempo" id="berakhir"></div>
        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <?php if ($_SESSION['level'] == 'admin') { ?>
                    <li class="nav-item ">
                        <a href="dashboard.php" class="nav-link <?php if ($halaman == 'dashboard') {
                                                                    echo 'active';
                                                                } else {
                                                                    echo '';
                                                                } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="daftar.php" class="nav-link <?php if ($halaman == 'daftar') {
                                                                    echo 'active';
                                                                } else {
                                                                    echo '';
                                                                } ?>">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Daftar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="kelengkapan.php" class="nav-link <?php if ($halaman == 'kelengkapan') {
                                                                        echo 'active';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Kelengkapan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="aturan.php" class="nav-link <?php if ($halaman == 'aturan') {
                                                                    echo 'active';
                                                                } else {
                                                                    echo '';
                                                                } ?>">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Aturan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="user.php" class="nav-link <?php if ($halaman == 'user') {
                                                                echo 'active';
                                                            } else {
                                                                echo '';
                                                            } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>

                <?php } elseif ($_SESSION['level'] == 'user') { ?>
                    <li class="nav-item ">
                        <a href="dashboard.php" class="nav-link <?php if ($halaman == 'dashboard') {
                                                                    echo 'active';
                                                                } else {
                                                                    echo '';
                                                                } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard

                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="kelengkapan.php" class="nav-link <?php if ($halaman == 'kelengkapan') {
                                                                        echo 'active';
                                                                    } else {
                                                                        echo '';
                                                                    } ?>">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Kelengkapan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>