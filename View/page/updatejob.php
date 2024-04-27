<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ocipicut-Tìm kiếm công việc của bạn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/custom-mobile.css">
    <link rel="stylesheet" href="View/styles.css">
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
                                <a href="http://localhost/Job">Ocipicut</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="http://localhost/Job">Trang chủ</a></li>
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
                                                    <li class="d-lg-none mobile-button-sign"><a href="?action=account" class="btn head-btn2">Tài khoản</a></li>
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
                                    <a href="?action=account" class="btn head-btn2">Tài khoản</a>
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
    <div class="container add-job">
        <h2>Sửa bài đăng</h2>
        <form method="post">
            <div class="name">
                <label for="name">
                    Tên công việc:
                    <input type="text" name="name" value="<?php echo $dataJobId['title']; ?>" id="name" required>
                </label>
            </div>
            <div class="description">
                <label for="description">
                    Mô tả về công việc:
                    <textarea name="description" id="description" placeholder="<?php echo $dataJobId['descrip']; ?>" cols="30" rows="2"></textarea>
                </label>
            </div>
            <div class="locate">
                <label for="locate">
                    Địa điểm:
                    <input type="text" name="locate" value="<?php echo $dataJobId['loca']; ?>" id="locate" required>
                </label>
            </div>
            <div class="price">
                <label for="price">
                    Giá:
                    <input type="text" name="price" value="<?php echo $dataJobId['price']; ?>" id="price" required>
                </label>
            </div>
            <div class="phone_number">
                <label for="phone_number">
                    Số điện thoại:
                    <input type="text" name="phone_number" value="<?php echo $dataJobId['phone_number']; ?>" id="phone_number" required>
                </label>
            </div>
            <input type="hidden" name="id_status" value="<?php echo $dataJobId['id_status']; ?>">
            <input type="hidden" name="date_post" value="<?php echo $dataJobId['date_post']; ?>">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['username']; ?>">
            <div class="category">
                <p>Loại công việc:</p>
                <select name="category">
                    <?php
                    foreach ($categories as $key => $category) {
                        # code...
                    ?>
                    <option value="<?php echo $category['id']?> ">
                        <?php echo $category['title']; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="button-link">
                <input type="submit" value="Sửa" name="update_job">
            </div>
        </form>
    </div>



    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="https://kit.fontawesome.com/45a3cadf75.js" crossorigin="anonymous"></script>
</body>

</html>