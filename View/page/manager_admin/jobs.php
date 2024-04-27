<?php include('View/custom/header-manager.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Công việc</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Công việc</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Mô tả</th>
                                        <th>Ngày đăng</th>
                                        <th>Nơi làm</th>
                                        <th>Giá</th>
                                        <th>Số điện thoại</th>
                                        <th>Thể loại</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($jobs as $key => $value) {
                                        # code...
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['descrip']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['date_post']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['loca']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['price']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['phone_number']; ?>
                                            </td>
                                            <?php
                                            foreach ($categories as $key => $cate) {
                                                if ($cate['id'] == $value['id_category']) {
                                                    ?>
                                                    <td>
                                                        <?php echo $cate['title']; ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php
                                            foreach ($statusJob as $key => $status) {
                                                if ($status['id'] == $value['id_status']) {
                                                    ?>
                                                    <td>
                                                        <?php echo $status['title']; ?>
                                                    </td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <td>
                                                <a
                                                    href="?action=manager&jobs_manager&accecss_job&id=<?php echo $value['id']; ?>">Chấp
                                                    nhận</a>
                                                <a
                                                    href="?action=manager&jobs_manager&deny_job&id=<?php echo $value['id']; ?>">Hủy</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php include('View/custom/footer-manager.php'); ?>