<?php include_once 'v_admin_header.php'; $getuserById = $data['getuserById']; ?>
<form class="editUser" action="" method="post"> 
    <div class="main-content">
        <h3 class="title-page">
            Chỉnh sửa thông tin thành viên
        </h3>
        <div class="d-flex justify-content-end">
        <input type="submit" class="btn btn-primary mb-2" value="Lưu">
        </div>

        <?php if(isset($_SESSION['canhbaoSDT'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['canhbaoSDT']?>
            </div>
        <?php endif; unset($_SESSION['canhbaoSDT']); ?>
        

        <section class="row">
            <div class="col-sm-12 col-md-12 col xl-12">
                <div class="card chart">
                    
                        <div class="form-group">
                            <label for="hoTen">Họ tên:</label>
                            <input type="text" class="form-control" name="HoTen" value="<?= $getuserById['HoTen'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="userName">UserName:</label>
                            <input type="text" class="form-control" name="UserName" value="<?= $getuserById['UserName'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="Email" value="<?= $getuserById['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="matKhau">Mật khẩu:</label>
                            <input type="text" class="form-control" name="MatKhau" value="<?= $getuserById['MatKhau'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Địa chỉ:</label>
                            <input type="text" class="form-control" name="DiaChi" value="<?= $getuserById['DiaChi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="gioiTinh">Giới tính (1 Nữ | 0 Nam):</label>
                            <select  class="admin__select" name="GioiTinh">
                                <option value="0" <?= ($getuserById['GioiTinh'] == 0) ? 'selected' : '' ?>>Nam</option>
                                <option value="1" <?= ($getuserById['GioiTinh'] == 1) ? 'selected' : '' ?>>Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="soDienThoai">Số điện thoại:</label>
                            <input type="tel" class="form-control" name="SoDienThoai" value="<?= $getuserById['SoDienThoai'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="quyen">Quyền (1 admin | 0 user):</label>
                            <select class="admin__select" name="Quyen" >
                                <option value="0"  <?=($getuserById['Quyen'] == 0) ? 'selected' : ''?>>User</option>
                                <option value="1" <?=($getuserById['Quyen'] == 1) ? 'selected' : ''?>>Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HoatDong">Trạng thái hoạt động của tài khoản</label>
                            <select class="admin__select" name="HoatDong" >
                                <option value="0"  <?=($getuserById['HoatDong'] == 0) ? 'selected' : ''?>>Hoạt động</option>
                                <option value="1" <?=($getuserById['HoatDong'] == 1) ? 'selected' : ''?>>Vô hiệu hóa</option>
                            </select>
                        </div>

                        
                </div>
            </div>
        </section>
    </div>
</form>

<?php include_once 'v_admin_footer.php' ?>