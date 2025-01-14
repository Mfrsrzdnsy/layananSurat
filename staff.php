<?php
include 'sesi.php';
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>app-surdes</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="?page=staff">
                        <img src="assets/pattern/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Jenis Surat</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li><a href='?page=suketusaha' title='Suket Usaha'>Suket-Usaha</a></li>
                        <li><a href='?page=sukettmpusaha' title='Suket Tempat Usaha'>Suket-Tempat Usaha</a></li>
                        <li><a href='?page=suketpenghasilan' title='Suket Keterangan Penghasilan'>Suket-Penghasilan</a></li>
                        <li><a href='?page=suketaw' title='Suket Ahli Waris'>Suket-Ahli Waris</a></li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Kependudukan</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li><a href='?page=suketdomisili' title='Suket Domisili'>Suket-Domisili</a></li>
                        <li><a href='?page=sutarpindah' title='Sutar Pindah'>Suket-Pengantar Pindah</a></li>
                        <li><a href='?page=f121' title='Suket Permohonan KTP'>Suket-Permohonan KTP</a></li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Data</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li><a href='?page=penduduk' title='Data Penduduk'>Penduduk</a></li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Staff</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="logout.php">Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href='?page=staff'>
                    <img src="assets/pattern/logo.png" alt="Cool Admin" />
                </a>
            </div>

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!--<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-folder"></i>Laporan</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li><a href='?page=suketusaha' title='Suket Usaha'>Lihat Laporan</a></li>
                                </ul>
                        </li>-->
                       <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Kades</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <!-- <li>
                                    <a href="logout.php">Keluar</a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <!--<input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>-->
                            </form>
                            <?php 
                            $query = mysqli_query ($con, "SELECT count(*) AS jp FROM t_permohonan WHERE status='onprocess' ORDER BY id ASC");
                            while ($r = mysqli_fetch_array($query)){
                            ?>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <!--<div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity"><?php echo $r['jp'];?></span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>Ada <?php echo $r['jp'];?> permohonan surat</p>
                                            </div><?php } ?>
                            <?php 
                            $queryy = mysqli_query ($con, "SELECT * FROM t_permohonan WHERE status='onprocess' ORDER BY id ASC limit 4");
                            while ($rr = mysqli_fetch_array($queryy)){
                            ?>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="fotowarga/<?php echo $rr['foto'];?>" alt="nopic" />
                                                </div>
                                                <div class="content">
                                                    <p><a href="?page=<?php echo $rr['page'];?>"><?php echo $rr['nama'];?></a> <small><span class="date pull pull-right"><?php echo $rr['tgl'];?></span></small>
                                                    <br><?php echo $rr['nmsurat'];?></p>
                                                    
                                                </div>
                                            </div><?php } ?>
                                            
                                            <div class="mess__footer">
                                                <a href="?page=process_permohonan_all">Lihat semua permohonan</a>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!-- <?php 
                            $queryb = mysqli_query ($con, "SELECT count(*) AS jb FROM t_buatsendiri WHERE status='onprocess' ORDER BY id ASC");
                            while ($ry = mysqli_fetch_array($queryb)){
                            ?>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity"><?php echo $ry['jb'];?></span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>Ada <?php echo $ry['jb'];?> Surat yg dibuat sendiri</p>
                                            </div><?php } ?>
                                             <?php 
                            $queryx = mysqli_query ($con, "SELECT * FROM t_buatsendiri WHERE status='onprocess' ORDER BY id ASC limit 4");
                            while ($rx = mysqli_fetch_array($queryx)){
                            ?>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p><a href="?page=acc&amp;id=<?php echo $rx['id'];?>"><?php echo $rx['nama'];?></a> <span class="date pull pull-right"><?php echo $rx['tgl'];?></span><br><?php echo $rx['nmsurat'];?></p>
                                                    
                                                </div>
                                            </div><?php } ?>

                                            <div class="notifi__footer">
                                                <a href="?page=buat_sendiri_all">Semua surat dibuat Warga</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <?php 
                            $adm=$_SESSION['uname'];
                            $queryadm = mysqli_query ($con, "SELECT * FROM t_admin WHERE uname='$adm'");
                            while ($radm = mysqli_fetch_array($queryadm)){
                            ?>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="foto/<?php echo $radm['foto'];?>" alt="nopic" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Kades</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="foto/<?php echo $radm['foto'];?>" alt="nopic" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $radm['uname'];?> (Kades)</a>
                                                    </h5>
                                                    <span class="email"><?php echo $radm['email'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="?page=stafff&amp;id=<?php echo $radm['id'];?>">
                                                        <i class="zmdi zmdi-account"></i>Akun</a>
                                                </div>
                                            </div><?php } ?>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <div class="col-lg-12">
                                        <?php 
                                        include 'load_file_staff.php';
                                        ?>
                            </div>                   

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                <p> © Baiq sri warni <b></b>2024.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery-3.2.1.min.js"></script>--><!-- Tabrakan dengan Jquery panggil data penduduk-->
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
<!-- end document-->
