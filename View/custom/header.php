<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/custom-mobile.css">
    <link rel="stylesheet" href="assets/css/homepage.css">


    <link rel="stylesheet" href="View/styles.css">
    <link rel="stylesheet" href="View/page/manager/styles.css">
    <title>Ocipicut</title>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <!-- <img src="assets/img/logo/logo.png" alt=""> -->
                    <p>Ocipicut loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="http://localhost/Job/">Ocipicut</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="http://localhost/Job/">Trang chủ</a></li>
                                            <li><a href="?action=view-all-jobs">Công việc</a></li>
                                            <li><a href="#">Về chúng tôi</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                            <?php
                                            if (isset($_SESSION['username'])) {
                                                if ($_SESSION['role'] == 1) {
                                                    ?>
                                                    <li class="d-lg-none mobile-button-sign"><a href="?action=manager&jobs_manager" class="btn head-btn2">Quản lý</a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="d-lg-none mobile-button-sign"><a href="?action=account&dashboard_user" class="btn head-btn2">Tài khoản</a></li>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-lg-none mobile-button-sign"><a href="?action=signup" class="btn head-btn1">Đăng kí</a></li>
                                                <li class="d-lg-none mobile-button-sign"><a href="?action=login" class="btn head-btn2">Đăng nhập</a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <?php
                                if (isset($_SESSION['username'])) {
                                    if ($_SESSION['role'] == 1) {
                                ?>
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="?action=manager&jobs_manager" class="btn head-btn2">Quản lý</a>
                                </div>
                                <?php
                                    } else {
                                ?>
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="?action=account&dashboard_user" class="btn head-btn2">Tài khoản</a>
                                </div>
                                <?php
                                    }
                                } else {
                                ?>
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="?action=signup" class="btn head-btn1">Đăng kí</a>
                                    <a href="?action=login" class="btn head-btn2">Đăng nhập</a>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>