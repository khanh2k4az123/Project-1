<?php 
    include_once 'v_header.php';
    
?>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="view/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Chi tiết thanh toán</h4>
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <?php if(isset($_SESSION['user']) && is_array($_SESSION['user'])) ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ tên<span>*</span></p>
                                        <input type="text" name="HoTen" value="<?=$_SESSION['user']['HoTen']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="DiaChi" value="<?=$_SESSION['user']['DiaChi']?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" name="SoDienThoai" value="<?=$_SESSION['user']['SoDienThoai']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="Email" value="<?=$_SESSION['user']['Email']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Gửi đến một địa chỉ khác?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú đặt hàng*<span>*</span></p>
                                <input type="text"
                                    placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng." name="GhiChu">
                            </div>
                            <div class="checkout__input_pttt">

                                <p>Phương thức thanh toán*<span>*</span></p>
                                <select name="PhuongThucTT" id="paymentMethod">
                                    <option value="">Chọn phương thức thanh toán</option>
                                    <option value="1">Trả tiền mặt khi nhận hàng</option>
                                    <option value="2" >Thanh toán bằng VNPAY</option>
                                    <option value="3" >Thanh toán bằng MoMo</option>
                                </select>
                                <!-- dùng để mở vnpay -->
                                <input type="hidden" name="redirect" value="true">
                            </div>
                        </div>

                        <?php 
                            if(isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])){
                                $TongTien = 0;
                                foreach($_SESSION['mygiohang'] as $item){
                                    $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
                                    $TongTien += $ThanhTien;
                                }
                            }
                            
                        ?>
                        
                        <input type="hidden" name="TongTien" value="<?=$TongTien?>">
                    
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàn
                                    g của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Giá tiền</span></div>
                                <ul>
                                    <?php foreach($_SESSION['mygiohang'] as $item): ?>
                                        <li><?=$item['TenSP']?> <span><?=number_format($item['GiaSP'],"0",",",".")?> đ</span></li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="checkout__order__subtotal">Thành tiền <span><?=number_format($TongTien,"0",",",".")?> đ</span></div>
                                <div class="checkout__order__total">Tổng tiền <span><?=number_format($TongTien,"0",",",".")?> đ</span></div>
                                <input type="submit"  class="site-btn" value="Đặt hàng" onclick="return submitPay();">                                 
                                <!-- <input type="submit" name="payUrl"  class="site-btn submitmomo" value="Thanh toán MoMo">  -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <script>
        
        function submitPay(){
        var paymentMethod = document.querySelector("#paymentMethod").value;
        if (paymentMethod === "") {
            alert('Vui lòng chọn phương thức thanh toán trước khi đặt hàng.');
            return false;
        }
    }

        
    </script>

<?php include_once 'v_footer.php'; ?>
