<?php
    include_once 'v_myaccount_header.php';
    if(isset($_SESSION['user']) && is_array($_SESSION['user']));
?>
<div class="title_myacount">
    <h4>Cập nhật thông tin tài khoản</h4>
</div>
<form action="" method="post" enctype="multipart/form-data" >
    <div class="" style="margin-bottom: 40px;">    
        <input type="hidden" name="MaTK" value="<?=$_SESSION['user']['MaTK']?>">   

        <div class="form-group myaccount_image update__user_myac">
            <img src="<?=APPURL?>public/img/avatar/<?=$_SESSION['user']['HinhAnh']?>" alt="">
            <input type="file" class="form-control" name="HinhAnh" value="" >
        </div>
        <div class="form-group">
            <label for="TenSP">Họ tên:</label>
            <input type="text" class="form-control" name="HoTen" value="<?=$_SESSION['user']['HoTen']?>" >
        </div>
        <div class="form-group">
            <label for="TenSP">UserName:</label>
            <input type="text" class="form-control" name="UserName" value="<?=$_SESSION['user']['UserName']?>" >
        </div>
        <div class="form-group">
            <label for="TenSP">Email:</label>
            <input type="text" class="form-control" name="Email" value="<?=$_SESSION['user']['Email']?>" >
        </div>
        <div class="form-group">
            <label for="TenSP">Mật khẩu:</label>
            <input type="text" class="form-control" name="MatKhau" value="<?=$_SESSION['user']['MatKhau']?>" >
        </div>
        <div class="form-group">
            <label for="TenSP">Địa chỉ:</label>
            <input type="text" class="form-control" name="DiaChi" value="<?=$_SESSION['user']['DiaChi']?>" >
        </div>
        <div class="form-group">
            <label for="TenSP">Giới tính: (0: là nam | 1: là nữ)</label>
            <select class="form-control" name="GioiTinh" >
                <option value="0" <?=  ($_SESSION['user']['GioiTinh']  == 0) ? 'selected' : ''; ?>>Nam</option>
                <option value="1" <?=  ($_SESSION['user']['GioiTinh']  == 1) ? 'selected' : ''; ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="TenSP">Sô điện thoại:</label>
            <input type="text" class="form-control" name="SoDienThoai" value="<?=$_SESSION['user']['SoDienThoai']?>" >
        </div>

        <input type="submit" class="btn btn-success" name="submit" value="Lưu thông tin" >
    </div>
</form>

<?php
    include_once 'v_myaccount_footer.php';
?>