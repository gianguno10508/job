<?php include('View/custom/header-manager.php'); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh mục</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh mục</h4>
                        <a href="?action=manager&categories_manager&add_categories">Thêm danh mục mới</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên danh mục</th>
                                        <th>Hành động</th>
                                    </tr>
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
                                                    href="?action=manager&categories_manager&update_categories&id=<?php echo $value['id']; ?>">
                                                    Sửa
                                                </a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    href="?action=manager&categories_manager&delete_categories&id=<?php echo $value['id']; ?>">Xóa</a>
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