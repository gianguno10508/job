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
                            <h2>
                                Ocipicut
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <?php $img = rand(1, 4); ?>
                                <img src="assets/img/icon/job-list<?php echo $img; ?>.png" alt="">
                            </div>
                            <div class="job-tittle">
                                <h4>Công việc:
                                    <?php echo $jobID['title']; ?>
                                </h4>
                                <?php
                                foreach ($categories as $k => $category) {
                                    if ($category['id'] == $jobID['id_category']) {
                                        ?>
                                        <ul>
                                            <li>
                                                <?php echo $category['title']; ?>
                                            </li>
                                            <li><i class="fas fa-map-marker-alt"></i>
                                                <?php echo $jobID['loca']; ?>
                                            </li>
                                            <li>
                                                <?php echo $jobID['price']; ?> VND
                                            </li>
                                        </ul>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Mô tả công việc</h4>
                            </div>
                            <p>
                                <?php echo $jobID['descrip']; ?>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Tổng quan công việc</h4>
                        </div>
                        <ul>
                            <li>Ngày đăng : <span>
                                    <?php echo $jobID['date_post']; ?>
                                </span></li>
                            <li>Địa chỉ : <span>
                                    <?php echo $jobID['loca']; ?>
                                </span></li>
                            <li>Số điện thoại : <span>
                                    <?php echo $jobID['phone_number']; ?>
                                </span></li>
                            <li>Mức lương : <span>
                                    <?php echo $jobID['price']; ?> VND
                                </span></li>
                        </ul>
                        <?php
                        if (isset($_SESSION['role'])) {
                            if(isset($checkCV)){
                                if($checkCV == 1){
                                    echo '<h5>Bạn đã nộp CV thành công!!!</h5>';
                                }elseif($checkCV == 2){
                                    echo '<h5>Bạn chỉ upload được file docx hoặc pdf!!!</h5>';
                                }elseif($checkCV == 3){
                                    echo '<h5>File quá lơn!!!</h5>';
                                }elseif($checkCV == 4){
                                    echo '<h5>Upload file lỗi!!!</h5>';
                                }
                            }
                            if ($_SESSION['role'] == 3) {
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    <input type="file" name="mycv" required>
                                    <input type="submit" name="savecv" value="Nộp CV ứng tuyển ngay">
                                    <!-- <button type="submit" name="save">Nộp CV ứng tuyển ngay</button> -->
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>
<?php include('View/custom/footer-home.php'); ?>