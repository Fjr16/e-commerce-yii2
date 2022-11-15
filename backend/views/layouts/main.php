<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Atlanta Sport</title>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <!--            <div class="sidebar-brand-icon rotate-n-15">-->
            <!--                <i class="fas fa-laugh-wink"></i>-->
            <!--            </div>-->
            <div class="sidebar-brand-text mx-3">Atlanta Sport</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- ADMIN BEGIN-->
        <?php if(Yii::$app->user->identity->level == 'Admin') :?>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::$app->homeUrl ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/product/index']) ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Produk</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/kategori-produk/index']) ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Kategori Produk</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/order/index']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Daftar Pesanan</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/ongkir/index']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Kategori Ongkir</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/costumer']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Pelanggan</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/karyawan']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Karyawan</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/owner']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Owner</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/user']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>User</span>
            </a>
            </li>

        <?php endif;?>
        <!-- ADMIN END-->

        <!-- OWNER BEGIN-->
        <?php if(Yii::$app->user->identity->level == 'Owner') :?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::$app->homeUrl ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/product/index']) ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Produk</span>
            </a>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/order/index']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Daftar Pesanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/karyawan']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/costumer']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Pelanggan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/order/export-pdf']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Laporan Transaksi Bulanan</span>
            </a>
        </li>
        <?php endif;?>
        <!-- OWNER END-->

        <!-- KARYAWAN BEGIN-->
        <?php if(Yii::$app->user->identity->level == 'Karyawan') :?>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::$app->homeUrl ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/product/index']) ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Produk</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/order/index']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Daftar Pesanan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['/order/export-pdf']) ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Laporan Data Transaksi</span>
            </a>
            </li>
            
        <?php endif;?>
        <!-- KARYAWAN END-->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo Yii::$app->user->identity->getDisplayName() ?>
                            </span>
                            <img class="img-profile rounded-circle"
                                 src="/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a> -->
                            <a class="dropdown-item" href="#logoutModal" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <!-- <div class="dropdown-divider"></div> -->
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <div class="p-4">
                <?php echo $content ?>
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="row copyright">
                    <div class="col">
                        &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                    </div>

                    <div class="col text-right">
                        Created by <a href="" target="_blank">NiaIrmaELtiana</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol logout dibawah jika anda ingin keluar dari halaman ini</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a data-method="post"
                   class="btn btn-primary"
                   href="<?php echo \yii\helpers\Url::to(['/site/logout']) ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
<?php echo $this->blocks['bodyEndScript'] ?? '' ?>
</body>
</html>
<?php $this->endPage() ?>

