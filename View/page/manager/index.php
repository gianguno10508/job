<?php include('View/custom/header.php'); ?>

<div class="container manager">
    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
        ?>
        <div class="row">
            <div class="left-list">
                <h4>List quản lí</h4>
                <ul>
                    <li>
                        <a href="?action=manager&categories_manager">
                            <i class="fas fa-hand-point-right"></i> Danh mục
                        </a>
                    </li>
                    <li>
                        <a href="?action=manager&jobs_manager">
                            <i class="fas fa-hand-point-right"></i> Công việc
                        </a>
                    </li>
                    <li>
                        <a href="?action=manager&users_manager">
                            <i class="fas fa-hand-point-right"></i> Người dùng
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-10 col-md-10 col-xs-10 col-10 content">
                <h4 class="hello">Xin chào,
                    <?php echo $_SESSION['username']; ?>
                </h4>
                <div class="action">
                    <a href="http://localhost/Job">Trang chủ</a>
                    <a href="?action=logout">Đăng xuất</a>
                </div>
                <?php
                if (isset($_GET['categories_manager'])) {
                    ?>
                    <div class="categories-manage">
                        <h3>Quản lí danh mục</h3>
                        <div class="action">
                            <a href="?action=manager&add_categories">Thêm danh mục mới</a>
                        </div>
                        <table border="1px">
                            <thead>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên danh mục</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($categories as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td class='thumb'><img src="uploads/<?php echo $value['img'] ?>"></td>
                                        <td>
                                            <?php echo $value['title']; ?>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn sửa?')"
                                                href="?action=manager&update_categories&id=<?php echo $value['id']; ?>">
                                                Sửa
                                            </a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                href="?action=manager&delete_categories&id=<?php echo $value['id']; ?>">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                } elseif (isset($_GET['jobs_manager'])) {
                    ?>
                    <h3>Công việc</h3>
                    <table border="1px" class="jobs-table">
                        <thead>
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
                                        <a href="?action=manager&jobs_manager&accecss_job&id=<?php echo $value['id']; ?>">Chấp
                                            nhận</a>
                                        <a href="?action=manager&jobs_manager&deny_job&id=<?php echo $value['id']; ?>">Hủy</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } elseif (isset($_GET['users_manager'])) {
                    ?>
                    <div class="user-manage">
                        <h3>Quản lí tài khoản</h3>
                        <table border="1px">
                            <thead>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Chức vụ</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($dataUser as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['username'] ?>
                                        </td>
                                        <?php
                                        foreach ($dataUserRole as $key => $role) {
                                            if ($value['id_role'] == $role['id']) {
                                                ?>
                                                <td>
                                                    <?php echo $role['role']; ?>
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <h4>Bạn không đủ quyền truy cập!!!</h4>
        <?php
        die;
    }
    ?>
</div>
<?php include('View/custom/footer-admin.php'); ?>