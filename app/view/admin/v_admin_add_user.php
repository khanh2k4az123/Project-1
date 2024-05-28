<?php include_once 'v_admin_header.php' ?>

<form class="addPro" action="" method="post" enctype="multipart/form-data">
    <div class="main-content">
        <h3 class="title-page">
            Thêm mới người dùng
        </h3>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary mb-2" value="Lưu" onclick="return user_checkadd()">
        </div>

        <?php if(isset($_SESSION['canhbaoEmail'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['canhbaoEmail']?>
            </div>
        <?php endif; unset($_SESSION['canhbaoEmail']); ?>

        <?php if(isset($_SESSION['canhbaoSDT'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['canhbaoSDT']?>
            </div>
        <?php endif; unset($_SESSION['canhbaoSDT']); ?>

        <section class="row">
            <div class="col-sm-12 col-md-12 col xl-12">
                <div class="card chart">
                    <div class="form-group">
                        <label for="HoTen">Họ tên:</label>
                        <input type="text" class="form-control" name="HoTen" id="HoTen" placeholder="Nhập họ tên">
                    </div>

                    <div class="form-group">
                        <label for="UserName">Tên đăng nhập:</label>
                        <input type="text" class="form-control" name="UserName" id="UserName" placeholder="Nhập tên đăng nhập">
                    </div>

                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Nhập địa chỉ email">
                    </div>

                    <div class="form-group">
                        <label for="DiaChi">Địa chỉ:</label>
                        <input type="text" class="form-control" name="DiaChi" id="DiaChi" placeholder="Nhập địa chỉ">
                    </div>

                    <div class="form-group">
                        <label for="GioiTinh">Giới tính:</label>
                            <select class="form-control" name="GioiTinh" id="GioiTinh" class="admin__select">
                                <option value="3">Chọn giới tính</option>
                                <option value="0" <?= (isset($_POST['GioiTinh']) == 0) ? 'selected' : '' ?>>Nam</option>
                                <option value="1" <?= (isset($_POST['GioiTinh']) == 1) ? 'selected' : '' ?>>Nữ</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="SoDienThoai">Số điện thoại:</label>
                        <input type="text" class="form-control" name="SoDienThoai" id="SoDienThoai" placeholder="Nhập số điện thoại">
                    </div>

                    <div class="form-group">
                        <label for="Quyen">Quyền:</label>
                        <select class="form-control" name="Quyen" id="Quyen" class="admin__select">
                            <option value="3">Chọn quyền</option>
                            <option value="0"  <?= (isset($_POST['Quyen']) == 0) ? 'selected' : ''?>>User</option>
                            <option value="1" <?= (isset($_POST['Quyen']) == 1) ? 'selected' : ''?>>Admin</option>
                        </select>
                    </div>
                    
                </div>
            </div>
        </section>

    </div>
</form>

<script>
    function user_checkadd(){
        var HoTen = document.getElementById("HoTen");
        if(HoTen.value==""){
            alert("Vui lòng nhập họ tên user trước khi lưu!");
            HoTen.focus();
            return false;
        }

        var UserName = document.getElementById("UserName");
        if(UserName.value==""){
            alert("Vui lòng nhập Username user trước khi lưu!");
            UserName.focus();
            return false;
        }

        var Email = document.getElementById("Email");
        if(Email.value==""){
            alert("Vui lòng nhập Email user trước khi lưu!");
            Email.focus();
            return false;
        }

        var DiaChi = document.getElementById("DiaChi");
        if(DiaChi.value==""){
            alert("Vui lòng nhập địa chỉ user trước khi lưu!");
            DiaChi.focus();
            return false;
        }

        var SoDienThoai = document.getElementById("SoDienThoai");
        if(SoDienThoai.value==""){
            alert("Vui lòng nhập số điện thoại user trước khi lưu!");
            SoDienThoai.focus();
            return false;
        }

        var GioiTinh = document.getElementById("GioiTinh");
        if(GioiTinh.value==3){
            alert("Vui lòng chọn giới tính của user trước khi lưu!");
            GioiTinh.focus();
            return false;
        }

        var Quyen = document.getElementById("Quyen");
        if(Quyen.value==3){
            alert("Vui lòng chọn quyền của user trước khi lưu!");
            Quyen.focus();
            return false;
        }
    }
</script>
    
<?php include_once 'v_admin_footer.php' ?>