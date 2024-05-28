<?php include_once 'v_admin_header.php'; $getcataId = $data['getcataId']; ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="main-content">
        <h3 class="title-page">
            Chỉnh sửa danh mục 
        </h3>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary mb-2" name="submit" value="Lưu">
        </div>
        <section class="row">
            <div class="col-sm-12 col-md-12 col xl-12">
                <div class="card chart tableadmin">
                    <form class="addPro" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên danh mục:</label>
                            <input type="text" class="form-control" name="TenDM" value="<?=$getcataId['TenDM']?>" >
                        </div>
                        <div class="form-group">
                            <label for="name">Số thứ tự:</label>
                            <input type="text" class="form-control" name="SoThuTu" value="<?=$getcataId['SoThuTu']?>" >
                        </div>
                        <div class="form-group">
                            <label for="name">Uư tiên:</label>
                            <input type="text" class="form-control" name="UuTien" value="<?=$getcataId['UuTien']?>" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="label_admin">Ảnh danh mục
                            <div class="custom-file">
                                <input type="file" name="HinhAnh" >
                                <img  src="<?=APPURL?>public/img/categories/<?=$getcataId['HinhAnh']?>" alt="" style="width:80px; height:80px; object-fit:cover;">
                            </div></label>
                        </div>
                        <div class="form-group">
                            <label for="TrangThai">Trạng thái hoạt động của tài khoản</label>
                            <select class="admin__select" name="TrangThai" >
                                <option value="0"  <?=($getcataId['TrangThai'] == 0) ? 'selected' : ''?>>Hiện danh mục</option>
                                <option value="1" <?=($getcataId['TrangThai'] == 1) ? 'selected' : ''?>>Ẩn danh mục</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            
        </section>
    </div> 
</form>
<?php include_once 'v_admin_footer.php' ?>