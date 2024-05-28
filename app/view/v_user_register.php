    <?php include_once 'v_header.php' ?>

        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục Organic</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="" method="GET" >
                                        <input type="text" name="keyword" id="live_search" placeholder="Tìm kiếm sản phẩm tại đây?" value="<?php echo $_GET['keyword'] ?? '' ?>">
                                        <button type="submit" class="site-btn" id="searchBtn">Tìm kiếm</button>
                                    </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+035 312 3771</h5>
                                    <span>Hỗ trợ khách hàng</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    
    <div class="boxcenter">
        <h1><a href="">Đăng Ký</a></h1>
        <form action="" method="post">
            <div class="form-input">
                <div class="form__login">
                    <input type="text" name="HoTen" id="HoTen" placeholder="Hãy nhập họ tên"><i class="fa-regular fa-user" style="color: #7FAD39;"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="UserName" id="UserName" placeholder="Hãy nhập UserName"><i class="fa-solid fa-signature" style="color: #7FAD39;"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="Email" id="Email" placeholder="Hãy nhập Email"><i class="fa-regular fa-envelope" style="color: #7FAD39;"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="MatKhau" id="MatKhau" placeholder="Hãy nhập mật khẩu"><i class="fa-solid fa-lock" style="color: #7FAD39;"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="DiaChi" id="DiaChi" placeholder="Hãy nhập Địa chỉ"><i class="fa-sharp fa-regular fa-location-dot" style="color: #7FAD39;"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="SoDienThoai" id="SoDienThoai" placeholder="Hãy nhập số điện thoại"><i class="fa-solid fa-phone-flip" style="color: #7FAD39;"></i>
                </div>
                <select name="GioiTinh" id="GioiTinh" >
                    <option  >Giới tính</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
                
            <input type="submit"  onclick="return kiemtra_dk()" value="Đăng ký" class="submit">
            <div id="alert-register" class="baoloi_dangky" ></div>
            </div>
        </form>

        <div class="form-bot-2">
            <a href="index.php?route=login" class="chtk">Bạn đã có tài khoản?</a><a href="index.php?route=login">Đăng nhập tại khoản</a>
        </div>

        <?php if(isset($_SESSION['thongbao'])): ?>
            <div class="alert alert-success" role="alert">
                <?=$_SESSION['thongbao']?>
            </div>
        <?php endif; unset($_SESSION['thongbao']); ?>

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

    </div>

    <?php include_once 'v_footer.php' ?>
