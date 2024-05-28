<?php 

    include_once 'v_admin_header.php' ;
    $getpostId = $data['getpostId'];
?>

<div class="main-content">
    <h3 class="title-page">
        Chỉnh sửa bài viết
    </h3>

    <form class="editPro" action="" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary mb-2" value="Lưu">
        </div>
        <div class="form-group">
            <label for="name">Tiêu đề:</label>
            <input type="text" class="form-control" name="TieuDe" value="<?= $getpostId['TieuDe'] ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="label_admin">Hình ảnh:
            <div class="custom-file">
                <input type="file" name="HinhAnh">
                <img src="<?=APPURL?>public/img/baiviet/<?= $getpostId['HinhAnh'] ?>" alt=""
                    style="width:80px; height:80px; object-fit:cover;">
            </div></label>
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="label_admin">Hỉnh ảnh chi tiết
            <div class="custom-file">
                <input type="file" name="HinhAnhDetail">
                <img src="<?=APPURL?>public/img/baiviet/<?= $getpostId['HinhAnhDetail'] ?>" alt=""
                    style="width:80px; height:80px; object-fit:cover;">
            </div></label>
        </div>

        <div class="form-group">
            <label for="name">Mô tả ngắn:</label>
            <textarea class="form-control" name="MoTaNgan"><?= $getpostId['MoTaNgan'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="name">Mô tả:</label>
            <input type="text" class="form-control mota" name="MoTa" value="<?= $getpostId['MoTa'] ?>">
        </div>

    </form>

</div>

<?php include_once 'v_admin_footer.php' ?>