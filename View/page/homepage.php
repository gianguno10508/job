<?php include('View/custom/header-home.php'); ?>
<main>
    <!-- slider Area Start-->
    <div class="banner-area ">
        <!-- Mobile Menu -->
        <div class="banner-active">
            <div class="banner">
                <!-- <div class="image">
                        <picture>
                            <img src="assets/img/hero/h1_hero.jpg" alt="">
                        </picture>
                    </div> -->
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Tìm công việc phù hợp với bản thân</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Search Box -->
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="#" class="search-box" method="get">
                                    <div class="input-form">
                                        <input type="text" placeholder="Nhập công việc bạn muốn tìm" name="key">
                                    </div>
                                    <!-- <div class="select-form">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">Bắc Giang</option>
                                                    <option value="">Thái Nguyên</option>
                                                    <option value="">Hà Nội</option>
                                                    <option value="">Sài Gòn</option>
                                                </select>
                                            </div>
                                        </div> -->
                                    <div class="search-form">
                                        <input class="search" type="submit" name="search" value="Tìm kiếm" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <?php
    if (isset($dataSearch)) {
        if (is_array($dataSearch)) {
            ?>
            <h3 class="title-search"
                style="text-align: center; color: red; font-weight: 700; font-size: 24px; margin-top: 20px">Kết quả tìm kiếm
            </h3>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <?php
                    $jobs_reverse = array_reverse($dataSearch);
                    foreach ($jobs_reverse as $key => $job) {
                        foreach ($categories as $k => $category) {
                            if ($category['id'] == $job['id_category']) {
                                ?>
                                <!-- single-job-content -->
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="job-tittle">
                                            <a href="?action=job_detail&id=<?php echo $job['id']; ?>">
                                                <h4>
                                                    <?php echo $job['title']; ?>
                                                </h4>
                                            </a>
                                            <ul>
                                                <li>
                                                    <?php echo $category['title']; ?>
                                                </li>
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <?php echo $job['loca']; ?>
                                                </li>
                                                <li>
                                                    <?php echo $job['price']; ?> VND
                                                </li>
                                                <li>
                                                    <i class="fas fa-mobile"></i>
                                                    <?php echo $job['phone_number']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link f-right">
                                        <a href="?action=job_detail&id=<?php echo $job['id']; ?>">Chi tiết</a>
                                        <span>Ngày đăng:
                                            <?php echo $job['date_post']; ?>
                                        </span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h2 class="message-find">Xin lỗi! Không tìm thấy công việc bạn tìm !!!</h2>
            <?php
        }
    } else {
        ?>
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Danh mục công việc nổi bật</span>
                            <h2>Các Danh Mục Hàng Đầu</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <?php
                    foreach ($categories as $key => $category) {
                        # code...
                        $count = 0;
                        foreach ($jobs as $key => $job) {
                            # code...
                            if ($job['id_category'] == $category['id'] && $job['id_status'] == 1) {
                                $count++;
                            }
                        }
                        ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <a class="cate-link" href="?action=view-category&id=<?php echo $category['id']; ?>"></a>
                                <div class="services-ion">
                                    <span class="flaticon">
                                        <img src="uploads/<?php echo $category['img'] ?>">
                                    </span>
                                </div>
                                <div class="services-cap">
                                    <h5>
                                        <?php echo $category['title']; ?>
                                    </h5>
                                    <span>(
                                        <?php echo $count; ?>)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <!-- <span>Recent Job</span> -->
                            <h2>Việc làm mới</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <?php
                        $count = 0;
                        $jobs_reverse = array_reverse($jobs);
                        foreach ($jobs_reverse as $key => $job) {
                            $ran_img = rand(1, 4);
                            foreach ($categories as $k => $category) {
                                if ($category['id'] == $job['id_category']) {
                                    if ($job['id_status'] == 1) {
                                        if ($count <= 5) {
                                            ?>
                                            <!-- single-job-content -->
                                            <div class="single-job-items mb-30">
                                                <div class="job-items">
                                                    <div class="company-img">
                                                        <a href="?action=job_detail&id=<?php echo $job['id']; ?>"><img
                                                                src="assets/img/icon/job-list<?php echo $ran_img; ?>.png" alt=""></a>
                                                    </div>
                                                    <div class="job-tittle">
                                                        <a href="?action=job_detail&id=<?php echo $job['id']; ?>">
                                                            <h4>
                                                                <?php echo $job['title']; ?>
                                                            </h4>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <?php echo $category['title']; ?>
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                <?php echo $job['loca']; ?>
                                                            </li>
                                                            <li>
                                                                <?php echo $job['price']; ?> VND
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-mobile"></i>
                                                                <?php echo $job['phone_number']; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="items-link f-right">
                                                    <a href="?action=job_detail&id=<?php echo $job['id']; ?>">Chi tiết</a>
                                                    <span>Ngày đăng:
                                                        <?php echo $job['date_post']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <?php
    }
    ?>
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Quy trình áp dụng</span>
                        <h2>Cách hoạt động</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Tìm kiếm công việc</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Xin việc</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Nhận công việc của bạn</h5>
                            <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <!-- Testimonial contents -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quisquam
                                        alias error nihil provident perferendis fugit fuga ea. Quia cum commodi
                                        aperiam similique deleniti expedita earum, excepturi cumque libero? Est?”
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus quisquam
                                        alias error nihil provident perferendis fugit fuga ea. Quia cum commodi
                                        aperiam similique deleniti expedita earum, excepturi cumque libero? Est?”
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
                                        nulla aliquid impedit, aut distinctio repellat dolor incidunt ab officia
                                        veritatis in. Facilis, reprehenderit id? Fugiat necessitatibus vitae
                                        veritatis eum dicta!”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include('View/custom/footer-home.php'); ?>