<?php 
    include_once 'v_admin_header.php'; 
    $getproductId = $data['getproductId']; 
?>
<div class="main-content ">
        <h3 class="title-page">
        Chỉnh sửa sản phẩm 
        </h3>
        <div class="card chart tableadmin">
        <form class="editPro" action="" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary mb-2" value="Lưu">
        </div>
    <div class="form-group">
        <label for="name">Tên Sản phẩm:</label>
        <input type="text" class="form-control" name="TenSP" value="<?=$getproductId['TenSP']?>" >
    </div>
    <div class="form-group">
        <label for="name">Giá Sản phẩm:</label>
        <input type="text" class="form-control" name="GiaSP" value="<?=$getproductId['GiaSP']?>" >
    </div>
    <div class="form-group">
        <label for="name">Giá Giảm:</label>
        <input type="text" class="form-control" name="GiaGiam" value="<?=$getproductId['GiaGiam']?>" >
    </div>
    <div class="form-group">
        <label for="name">Tiêu đề:</label>
        <input type="text" class="form-control tieude" name="TieuDe" value="<?=$getproductId['TieuDe']?>" >
    </div>
    <div class="form-group">
        <label for="name">Mô tả:</label>
        <textarea class="form-control mota" name="MoTa"><?=$getproductId['MoTa']?></textarea>
    </div>
    
    <div class="form-group">
        <label for="exampleInputFile" class="label_admin">Ảnh Sản phẩm
        <div class="custom-file">
            <input type="file" name="HinhAnh">
            <img src="<?=APPURL?>public/img/traicay/<?=$getproductId['HinhAnh']?>" alt="" style="width:80px; height:80px; object-fit:cover;">
        </div></label>
    </div>

    <h4 style="padding-top: 20px;">Chọn danh mục cho sản phẩm</h4>
    <select name="MaDM" class="admin__select" >
        <option value="Chọn danh mục cho sản phẩm"></option>
        <?php $admin_danhmucall = $data['admin_danhmucall']; foreach($admin_danhmucall as $dm): ?>
            <option value="<?=$dm['MaDM']?>" <?=($dm['MaDM'] == $getproductId['MaDM']) ? "selected" : "" ?>><?=$dm['TenDM']?></option>
        <?php endforeach; ?>
    </select>

    <h4 style="padding-top: 20px;">Cập nhật trạng thái sản phẩm</h4>
    <select name="StatusProduct" class="admin__select" id="">
        <option value="">Chọn trạng thái đơn hàng</option>
        <option value="0" <?= ($getproductId['StatusProduct'] == 0) ? "selected" : "" ?>>Còn hàng</option>
        <option value="1" <?= ($getproductId['StatusProduct'] == 1) ? "selected" : "" ?> >Hết hàng</option>
    </select>
</form>
</div>
            </div>

            <?php include_once 'v_admin_footer.php' ?>
