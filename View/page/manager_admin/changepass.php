<?php include('View/custom/header-manager.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container changepass">
        <h3>Xin chào,
            <?php echo $_SESSION['username']; ?>
        </h3>
        <div class="action">
            <a href="?action=account">Quay lại</a>
        </div>
        <div class="message" style="text-align: center;">
            <?php if (isset($check)): ?>
                <?php if ($check == 2): ?>
                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu cũ không khớp!!</p>
                <?php elseif ($check == -1): ?>
                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Hai mật khẩu không khớp!!</p>
                <?php elseif ($check == 1): ?>
                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu lớn hơn hoặc bằng 8 kí tự!!</p>
                <?php elseif ($check == 3): ?>
                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Mật khẩu mới trùng mật khẩu cũ!!</p>
                <?php else: ?>
                    <p style="font-size: 18px; font-weight: 700; margin-top: 10px;">Đổi mật khẩu thành công!</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="content-form">
            <form action="#" method="post" class='form'>
                <div class="passold">
                    <label for="passwordold">
                        <p>Mật khẩu cũ:</p>
                        <input type="password" name="passwordold" id="passwordold" required>
                    </label>
                </div>
                <div class="passnew">
                    <label for="passwordnew">
                        <p>Mật khẩu mới:</p>
                        <input type="password" name="passwordnew" id="passwordnew" required>
                    </label>
                </div>
                <div class="repassnew">
                    <label for="repasswordnew">
                        <p>Nhập lại mật khẩu mới:</p>
                        <input type="password" name="repasswordnew" id="repasswordnew" required>
                    </label>
                </div>
                <div class="button-link">
                    <input type="submit" name="changepass" value="OK">
                </div>
            </form>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php include('View/custom/footer-manager.php'); ?>