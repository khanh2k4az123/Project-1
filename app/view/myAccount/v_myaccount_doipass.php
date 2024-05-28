<?php
    include_once 'v_myaccount_header.php';
    if(isset($_SESSION['user']) && is_array($_SESSION['user']));
?>
<div class="title_myacount">
    <h4>Đổi mật khẩu</h4>
</div>
<form action="index.php?mod=myaccount&act=doi_password" method="post">
    <div class="">
        <!-- MaTK phải đặt value để nó nhận được cái giá trị mà nó update -->
        <input type="hidden" name="MaTK" value="<?= $_SESSION['user']['MaTK']?>">    
        <div class="form-group">
            <label for="TenSP">Nhập số điện thoại:</label>
            <input type="text" class="form-control" name="SoDienThoai" >
        </div>
        <div class="form-group">
            <label for="TenSP">Mật khẩu cũ:</label>
            <input type="text" class="form-control" name="MatKhau" >
        </div>
        <div class="form-group">
            <label for="TenSP">Mật khẩu mới:</label>
            <input type="text" class="form-control" name="MatKhauNew" >
        </div>
        <div class="form-group">
            <label for="TenSP">Xác nhận mật khẩu mới:</label>
            <input type="text" class="form-control" name="AgainMatKhau" >
        </div>
        <input type="submit" class="btn btn-success" name="submit" value="Đổi mật khẩu" >

        <?php if(isset($_SESSION['thongbao'])): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?=$_SESSION['thongbao']?>
            </div>
        <?php endif; unset($_SESSION['thongbao']); ?>

        <?php if(isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?=$_SESSION['loi']?>
            </div>
        <?php endif; unset($_SESSION['loi']); ?>
    </div>
</form>  
    <?php include_once 'v_myaccount_footer.php'; ?>