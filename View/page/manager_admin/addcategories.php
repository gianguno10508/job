<?php include('View/custom/header-manager.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container add-job">
        <h2>Thêm thể loại mới</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="image">
                Ảnh thể loại:
                <input type="file" name="image" id="image" required>
            </div>
            <div class="titlee">
                <label for="titlee">
                    Tên thể loại:
                    <input type="text" name="title" id="titlee" required>
                </label>
            </div>
            <div class="button-link">
                <input type="submit" value="Thêm" name="add_category">
            </div>
        </form>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php include('View/custom/footer-manager.php'); ?>