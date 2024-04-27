<?php include ('View/custom/header.php'); ?>
<div class="page-account">
    <div class="container">
        <div id="main-content" class="main-content">
            <div id="primary" class="content-area">
                <div id="content" class="site-content">
                    <article class="page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="row">
                                <div class="col-left col-md-3">
                                    <ul>
                                        <li><a href="?action=account&dashboard_user">Dashboard</a></li>
                                        <?php if ($_SESSION['role'] == 2) {
                                            ?>
                                            <li><a href="?action=account&jobs">Công việc</a></li>
                                            <?php
                                        } else {
                                            ?>
                                            <li><a href="?action=account&cvs">My CV</a></li>
                                            <li><a href="?action=account&infor_ntv">Thông tin cá nhân</a></li>
                                            <?php
                                        } ?>

                                        <li><a href="?action=account&changepass">Đổi mật khẩu</a></li>
                                        <li><a href="?action=logout">Đăng xuất</a></li>
                                    </ul>
                                </div>
                                <div class="col-right col-md-9">
                                    <?php
                                    if (isset($_GET['dashboard_user'])) {
                                        ?>
                                        <h2>Hello
                                            <?php echo $_SESSION['username']; ?>
                                        </h2>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, asperiores?
                                            Magni aspernatur nemo accusantium quas, maxime debitis impedit alias
                                            blanditiis omnis excepturi ducimus ipsa atque. Hic nobis ab itaque minus!
                                        </p>
                                        <?php
                                    } elseif (isset($_GET['jobs'])) {
                                        ?>
                                        <div class="main-action">
                                            <h5>Công việc của tôi</h5>
                                            <a class="add-job-action" href="?action=account&add-job">Thêm công việc mới</a>
                                        </div>
                                        <table border="1px">
                                            <thead>
                                                <th>STT</th>
                                                <th>Tên việc</th>
                                                <th>Mô tả</th>
                                                <th>Ngày đăng</th>
                                                <th>Địa chỉ</th>
                                                <th>Mức lương</th>
                                                <th>Tên danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>CV</th>
                                                <th>Hành động</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 0;

                                                # code...
                                                foreach ($jobs as $key => $job) {
                                                    # code...
                                                    if ($_SESSION['username'] == $job['user']) {
                                                        foreach ($categories as $key => $category) {
                                                            # code...
                                                            if ($category['id'] == $job['id_category']) {
                                                                foreach ($statusJob as $key => $status) {
                                                                    # code...
                                                                    if ($status['id'] == $job['id_status']) {
                                                                        $i++;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <?php echo $i; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $job['title']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $job['descrip']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $job['date_post']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $job['loca']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $job['price']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $category['title']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $status['title']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <ul>
                                                                                    <?php
                                                                                    if (is_array($cvs)) {
                                                                                        foreach ($cvs as $key => $cv) {
                                                                                            # code...
                                                                                            if ($cv['id_job'] == $job['id']) {
                                                                                                ?>
                                                                                                <li>
                                                                                                    <a
                                                                                                        href="?action=account&download&cv_id=<?php echo $cv['id']; ?>"><?php echo $cv['data_cv']; ?></a>
                                                                                                </li>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </td>
                                                                            <td>
                                                                                <a onclick="return confirm('Bạn có chắc chắn muốn sửa?')"
                                                                                    href="?action=account&update_job&id=<?php echo $job['id']; ?>">Sửa</a>
                                                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                                    href="?action=account&delete_job&id=<?php echo $job['id']; ?>">Xóa</a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } elseif (isset($_GET['changepass'])) {
                                        ?>
                                        <div class="message" style="text-align: center;">
                                            <?php if (isset($check)): ?>
                                                <?php if ($check == 2): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu cũ
                                                        không khớp!!</p>
                                                <?php elseif ($check == -1): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Hai mật khẩu
                                                        không khớp!!</p>
                                                <?php elseif ($check == 1): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu lớn hơn
                                                        hoặc bằng 8 kí tự!!</p>
                                                <?php elseif ($check == 3): ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu mới
                                                        trùng mật khẩu cũ!!</p>
                                                <?php else: ?>
                                                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Đổi mật khẩu
                                                        thành công!</p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="content-form">
                                            <form method="post" class='form'>
                                                <div class="passold">
                                                    <label for="passwordold">
                                                        <p>Mật khẩu cũ*:</p>
                                                        <input type="password" name="passwordold" id="passwordold" required>
                                                    </label>
                                                </div>
                                                <div class="passnew">
                                                    <label for="passwordnew">
                                                        <p>Mật khẩu mới*:</p>
                                                        <input type="password" name="passwordnew" id="passwordnew" required>
                                                    </label>
                                                </div>
                                                <div class="repassnew">
                                                    <label for="repasswordnew">
                                                        <p>Nhập lại mật khẩu mới*:</p>
                                                        <input type="password" name="repasswordnew" id="repasswordnew"
                                                            required>
                                                    </label>
                                                </div>
                                                <div class="button-link">
                                                    <input type="submit" name="changepass" value="OK">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    } elseif (isset($_GET['cvs'])) {
                                        ?>
                                        <div class="main-action">
                                            <h5>CV của tôi</h5>
                                        </div>
                                        <table border="1px">
                                            <thead>
                                                <th>STT</th>
                                                <th>Tên việc</th>
                                                <th>Mức lương</th>
                                                <th>Địa điểm</th>
                                                <th>Số điện thoại</th>
                                                <th>CV đã nộp</th>
                                                <th>Hành động</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                # code...
                                                if (is_array($dataCVer)) {
                                                    $i = 1;
                                                    foreach ($dataCVer as $key => $cv) {
                                                        # code...
                                                        if ($_SESSION['username'] == $cv['cver']) {
                                                            foreach ($jobs as $key => $job) {
                                                                # code...
                                                                if ($cv['id_job'] == $job['id']) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $i; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $job['title']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $job['price']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $job['loca']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $job['phone_number']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a
                                                                                href="?action=account&download&cv_id=<?php echo $cv['id']; ?>"><?php echo $cv['data_cv']; ?></a>
                                                                        </td>
                                                                        <td>
                                                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                                                href="?action=account&delete_cv&id=<?php echo $cv['id']; ?>">Xóa</a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } elseif (isset($_GET['infor_ntv'])) {
                                        ?>
                                        <div class="message" style="text-align: center;">
                                        </div>
                                        <h2>Hello
                                            <?php echo $_SESSION['username']; ?>
                                        </h2>
                                        <div class="content-form">
                                            <form method="post" class='form'>
                                                <div class="email">
                                                    <label for="email">
                                                        <p>Email:</p>
                                                        <input type="email" value="<?php echo $dataUserDetail['email'] ?>"
                                                            name="email" id="email" disabled required>
                                                    </label>
                                                </div>
                                                <div class="phone_number">
                                                    <label for="phone_number">
                                                        <p>Số điện thoại*:</p>
                                                        <input type="number" name="phone_number"
                                                            value="<?php echo $dataUserDetail['phone_number'] ?>"
                                                            id="phone_number" required>
                                                    </label>
                                                </div>
                                                <div class="company">
                                                    <label for="company">
                                                        <p>Công ty:</p>
                                                        <input type="text" name="company" id="company"
                                                            value="<?php echo $dataUserDetail['company'] ?>">
                                                    </label>
                                                </div>
                                                <div class="address">
                                                    <label for="address">
                                                        <p>Địa chỉ*:</p>
                                                        <input type="text" name="address" id="address"
                                                            value="<?php echo $dataUserDetail['address'] ?>">
                                                    </label>
                                                </div>
                                                <div class="button-link">
                                                    <input type="submit" name="update_infor" value="Update">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('View/custom/footer-home.php'); ?>