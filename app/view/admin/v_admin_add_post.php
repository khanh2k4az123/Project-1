<?php include_once 'v_admin_header.php' ?>
<form class="addPro" action="" method="post" enctype="multipart/form-data">
    <div class="main-content">
        <h3 class="title-page">
            Thêm bài viết mới
        </h3>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary mb-2" name="submitblog" value="Lưu" onclick="return post_checkadd()">
        </div>

        <section class="row">
            <div class="col-sm-12 col-md-12 col xl-12">
                <div class="card chart">
                    <input type="hidden" name="MaBV">
                    <div class="form-group">
                        <label for="name">Tiêu đề:</label>
                        <input type="text" class="form-control" name="TieuDe" id="TieuDe" placeholder="Nhập tiêu đề">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputFile" class="label_admin">Hình ảnh:
                        <div class="custom-file">
                            <input type="file" name="HinhAnh" id="HinhAnh">
                            <div id="preview"></div>
                        </div></label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile" class="label_admin">Hỉnh ảnh chi tiết
                        <div class="custom-file">
                            <input type="file" name="HinhAnhDetail" id="HinhAnhDetail">
                        </div></label>
                    </div>

                    <div class="form-group">
                        <label for="name">Mô tả ngắn:</label>
                        <input type="text" class="form-control" name="MoTaNgan" id="MoTaNgan" placeholder="Nhập mô tả ngắn">
                    </div>

                    <div class="form-group">
                        <label for="name">Mô tả:</label>
                        <input type="text" class="form-control mota" name="MoTa" id="MoTa" placeholder="Nhập mô tả">
                    </div>

                    <div class="form-group">
                        <label for="name">Ngày viết:</label>
                        <input type="datetime-local" class="form-control" name="NgayViet" id="NgayViet" placeholder="Chọn ngày viết">
                    </div> 

                  
                    
                </div>
            </div>
        </section>

    </div>
</form>

<script>
    function post_checkadd(){

        var TieuDe = document.getElementById("TieuDe");
        if(TieuDe.value==""){
            alert("Vui lòng nhập tiêu đề bài viết trước khi lưu!");
            TieuDe.focus();
            return false;
        }

        var HinhAnh = document.getElementById("HinhAnh");
        if(HinhAnh.value==0){
            alert("Vui lòng chọn ảnh của bài viết trước khi lưu!");
            HinhAnh.focus();
            return false;
        }

        var MoTaNgan = document.getElementById("MoTaNgan");
        if(MoTaNgan.value==""){
            alert("Vui lòng nhập mô tả ngắn của bài viết trước khi lưu!");
            MoTaNgan.focus();
            return false;
        }

        var MoTa = document.getElementById("MoTa");
        if(MoTa.value==""){
            alert("Vui lòng nhập mô tả của bài viết trước khi lưu!");
            MoTa.focus();
            return false;
        }

        var NgayViet = document.getElementById("NgayViet");
        if(NgayViet.value==""){
            alert("Vui lòng chọn ngày viết của bài viết trước khi lưu!");
            NgayViet.focus();
            return false;
        }

        var HinhAnhDetail = document.getElementById("HinhAnhDetail");
        if(HinhAnhDetail.value==0){
            alert("Vui lòng chọn ảnh của bài viết trước khi lưu!");
            HinhAnhDetail.focus();
            return false;
        }

    }
</script>

<?php include_once 'v_admin_footer.php' ?>