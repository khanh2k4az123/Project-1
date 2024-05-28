
<?php include_once 'v_admin_header.php';  ?>
<div class="main-content adminlogin"><p class="chay">Xin chào thầy Trần Bá Hộ </p>

    <h3 class="title-page">
        Đăng nhập admin
    </h3>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
        <div class="card chart ">
    <form method="post">
                <?php if(isset($_SESSION['canhbao'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['canhbao']?>
                    </div>
                <?php endif; unset($_SESSION['canhbao']); ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Nhập email của bạn!">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="MatKhau" id="MatKhau" placeholder="Nhập mật khẩu">
        </div>
        <input type="submit"  onclick="return kiemtra_dn()" value="Đăng nhập" class="btn btn-primary">
        
        <?php if(isset($_SESSION['loi'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['loi']?>
                    </div>
                <?php endif; unset($_SESSION['loi']); ?>
    </form>
    </div></div>
    </section></div>
    <?php include_once 'v_admin_footer.php' ?>