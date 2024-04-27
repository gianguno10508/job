<?php include('View/custom/header.php'); ?>
<div class="container add-job">
    <h2>Thêm công việc mới của bạn</h2>
    <form method="post">
        <div class="name">
            <label for="name">
                <p>Tên công việc:</p>
                <input type="text" name="name" id="name" required>
            </label>
        </div>
        <div class="description">
            <label for="description">
                <p>Mô tả về công việc:</p>
                <textarea name="description" id="description" cols="69" rows="2"></textarea>
            </label>
        </div>
        <div class="locate">
            <label for="locate">
                <p>Địa điểm:</p>
                <input type="text" name="locate" id="locate" required>
            </label>
        </div>
        <div class="price">
            <label for="price">
                <p>Mức lương:</p>
                <input type="number" name="price" id="price" required>
            </label>
        </div>
        <div class="phone_number">
            <label for="phone_number">
                <p>Số điện thoại:</p>
                <input type="number" name="phone_number" id="phone_number" required>
            </label>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['username']; ?>">
        <div class="category">
            <p>Loại công việc:</p>
            <select name="category">
                <?php
                foreach ($categories as $key => $category) {
                    # code...
                    ?>
                    <option value="<?php echo $category['id'] ?> ">
                        <?php echo $category['title']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="button-link">
            <input type="submit" value="Thêm" name="add_job">
        </div>
    </form>
</div>
<?php include('View/custom/footer-home.php'); ?>