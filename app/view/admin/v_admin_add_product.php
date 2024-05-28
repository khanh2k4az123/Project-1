<?php include_once 'v_admin_header.php' ?><div class="card chart tableadmin"> 
<form class="addPro" action="" method="post" enctype="multipart/form-data">
    <div class="main-content">
        <h3 class="title-page">
            Thêm  sản phẩm mới
        </h3>
        <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-primary mb-2" value="Lưu" onclick="return sanpham_checkadd()">
</div>

<section class="row">
    <div class="col-sm-12 col-md-12 col xl-12">
        
            
            <div class="form-group">
                <label for="TenSP">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="TenSP" id="TenSP" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="GiaSP">Giá sản phẩm:</label>
                <input type="text" class="form-control" name="GiaSP" id="GiaSP" placeholder="Nhập giá sản phẩm">
            </div>

            <div class="form-group">
                <label for="Discount">Giảm giá:</label>
                <input type="text" class="form-control" name="GiaGiam" placeholder="Nhập giảm giá sản phẩm">
            </div>

            <div class="form-group">
                <label for="TieuDe">Tiêu đề:</label>
                <input type="text" class="form-control" name="TieuDe" placeholder="Nhập tiêu đề sản phẩm">
            </div>

            <div class="form-group">
                <label for="MoTa">Mô tả:</label>
                <textarea class="form-control" name="MoTa" placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>

            <div class="form-group">
                <label for="Discount">view</label>
                <input type="text" class="form-control" name="LuotXem" placeholder="">
            </div>
            <div class="form-group">
                <label for="HinhAnh" class="label_admin">Hình ảnh:
                <div class="custom-file">
                    <input type="file" name="HinhAnh" id="HinhAnh">
                    <div id="preview"></div>
                </div>
            </label>
            </div>

            <select name="MaDM" id="MaDM" class="admin__select">
                <option value="0">Chọn danh mục của sản phẩm</option>
                <?php $danhmucall = $data['admin_danhmucall']; foreach($danhmucall as $dm): ?>
                    <option value="<?=$dm['MaDM']?>"><?=$dm['TenDM']?></option>
                <?php endforeach; ?>
            </select>

        </div>
    </div>
</section>
    
</form>
</div> 
<script>
    function sanpham_checkadd(){
        var TenSP = document.getElementById("TenSP");
        if(TenSP.value==""){
            alert("Vui lòng nhập tên sản phẩm trước khi lưu!");
            TenSP.focus();
            return false;
        }

        var GiaSP = document.getElementById("GiaSP");
        if(GiaSP.value==""){
            alert("Vui lòng nhập giá sản phẩm trước khi lưu!");
            GiaSP.focus();
            return false;
        }

        var HinhAnh = document.getElementById("HinhAnh");
        if(HinhAnh.value==0){
            alert("Vui lòng chọn ảnh của sản phẩm trước khi lưu!");
            HinhAnh.focus();
            return false;
        }

        var MaDM = document.getElementById("MaDM");
        if(MaDM.value==0){
            alert("Vui lòng chọn danh mục của sản phẩm trước khi lưu!");
            MaDM.focus();
            return false;
        }
    }
</script>
    
<?php include_once 'v_admin_footer.php' ?>
