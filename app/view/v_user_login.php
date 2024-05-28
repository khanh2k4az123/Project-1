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
    
    <form action="" method="post">
        <div class="boxcenter">
                <?php if(isset($_SESSION['canhbao'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['canhbao']?>
                    </div>
                <?php endif; unset($_SESSION['canhbao']); ?>
                <h1><a href="">Đăng Nhập</a></h1>
                    <div class="form-input">
                        <div class="form__login">
                            <input type="text" name="Email" id="Email" placeholder="Nhập email của bạn!"><i class="fa-regular fa-envelope" style="color: #7FAD39;"></i>
                        </div>
                        <div class="form__login">
                            <input type="password" name="MatKhau" id="MatKhau" placeholder="Nhập mật khẩu"><i class="fa-solid fa-lock" style="color: #7FAD39;"></i>
                        </div>
                        
                    <input type="submit"  onclick="return kiemtra_dn()" value="Đăng nhập" class="submit">
                    </div>
                <div id="alert-login" class="baoloi_dangky" ></div>
                <div class="form-bot-1">
                    <a href="">Quên mật khẩu</a>
                </div>
                <div class="form-bot-2">
                    <a href="index.php?route=register" class="chtk">Chưa có tài khoản?</a><a href="index.php?route=registe">Đăng kí tại khoản</a>
                </div>
                <?php if(isset($_SESSION['loi'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_SESSION['loi']?>
                    </div>
                <?php endif; unset($_SESSION['loi']); ?>
        </div>
    </form>
    
    <?php include_once 'v_footer.php' ?>