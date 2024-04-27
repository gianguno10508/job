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
            <section class="featured-job-area">
                <div class="container">
                    <?php
                    if (is_array($jobByIdCate)) {
                        foreach ($jobByIdCate as $key => $job) {
                            foreach ($categories as $k => $category) {
                                $ran_img = rand(1, 4);
                                if ($category['id'] == $job['id_job']) {
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
</main>
<?php include('View/custom/footer-home.php'); ?>