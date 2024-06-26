<?php include('View/custom/header-home.php'); ?>
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Ocipicut</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <!-- Featured_job_start -->
            <section class="featured-job-area">
                <div class="container">
                    <?php
                    $jobs_reverse = array_reverse($jobs);
                    foreach ($jobs_reverse as $key => $job) {
                        foreach ($categories as $k => $category) {
                            $ran_img = rand(1, 4);
                            if ($category['id'] == $job['id_category']) {
                                if ($job['id_status'] == 1) {
                                    ?>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-30">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="?action=job_detail&id=<?php echo $job['id']; ?>"><img
                                                        src="assets/img/icon/job-list<?php echo $ran_img; ?>.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="?action=job_detail&id=<?php echo $job['id']; ?>">
                                                    <h4>
                                                        <?php echo $job['title']; ?>
                                                    </h4>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <?php echo $category['title']; ?>
                                                    </li>
                                                    <li><i class="fas fa-map-marker-alt"></i>
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
                                        <div class="items-link items-link2 f-right">
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
                    ?>
                </div>
            </section>
            <!-- Featured_job_end -->
        </div>
        <!-- </div> -->
    </div>
    </div>
    <!-- Job List Area End -->
    <!--Pagination Start  -->
    <!-- <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!--Pagination End  -->

</main>
<?php include('View/custom/footer-home.php'); ?>