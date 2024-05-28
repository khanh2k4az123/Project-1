
    

    <?php
        include_once 'v_header.php';
        $detail_product = $data['detail_product_byID'];

        if (isset($_SESSION['success_thongbao'])) {
            echo "<script>alert('{$_SESSION['success_thongbao']}');</script>";
            unset($_SESSION['success_thongbao']);
        }

        
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
    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chi tiết sản phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=APPURL?>">Home</a>
                            <span><?=$detail_product['TenSP']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $bannerItem = $data['banner_header_item']; foreach($bannerItem as $key => $item): 
            if($item['ViTriItem'] > 0):
        ?>
            <img src="<?=APPURL?>public/img/<?=$item['HinhAnh']?>" alt="">
        <?php endif; endforeach; ?>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?=APPURL?>public/img/traicay/<?=$detail_product['HinhAnh']?>" alt="<?=$detail_product['TenSP']?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$detail_product['TenSP']?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><?=number_format($detail_product['GiaSP'],"0",",",".")?></div>
                        <p><?=$detail_product['TieuDe']?></p>
                        <?php if(empty($detail_product['StatusProduct']) ): ?>
                            <div class="product_detail_three">

                                <form action="index.php?mod=product&act=addtocart" method="post">
                                    <div class="product__details__quantity">
                                        <div class="quantity">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn" onclick="decrementQuantity()">-</span>
                                            <input type="text" name="SoLuong" id="quantityInput" value="1" readonly>
                                            <span class="inc qtybtn" onclick="incrementQuantity()">+</span>
                                        </div>
                                        </div>
                                    </div>
                                    <input type="hidden"  name="MaSP" value="<?=$detail_product['MaSP']?>">
                                    <input type="hidden" name="HinhAnh" value="<?=$detail_product['HinhAnh']?>">
                                    <input type="hidden" name="GiaSP" value="<?=$detail_product['GiaSP']?>">
                                    <input type="hidden" name="TenSP" value="<?=$detail_product['TenSP']?>">
                                    <input type="submit" value="Thêm vào giỏ hàng" name="submitaddtocart" class="primary-btn">
                                </form>
                                <?php if(isset($_SESSION['user']['MaTK'])): ?>
                                    <form id="loveform" action="" method="post">
                                    <input type="hidden" name="MaTK" value="<?=$_SESSION['user']['MaTK']?>">
                                    <input type="hidden" name="MaSP" value="<?=$detail_product['MaSP']?>">
                                    <input type="hidden" name="YeuThich" value="1">
                                        <button type="submit" id="loveButton" class="heart-icon" <?= isset($_SESSION['wishlist_active'][$detail_product['MaSP']]) ? $_SESSION['wishlist_active'][$detail_product['MaSP']] : '' ?>  onclick="addlove()"> 
                                            <span class="icon_heart_alt"><i class="fa-solid fa-heart"></i></span>
                                        </button>
                                    </form>
                                
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <h4 class="soldout_detail">Hết hàng</h4>
                        <?php endif; ?>
                        <ul>
                            <li><b>Số lượt xem</b> <span><?=$detail_product['LuotXem']?> Lượt xem</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả</a>
                            </li>
                            
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p><?= $detail_product['MoTa']?></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <section class="related-product"> 
        <div class="container">
        <div class="section-title related__product__title">
            <h2>Cảm nghĩ bạn về sản phẩm:</h2>
        </div>
            <?php $loadcomment = $data['product_comment']; foreach($loadcomment as $dsbl): ?>
            <div class="row"><!--  mỗi bình luận sẽ là một row -->
                <div class="col-md-6">
                    <table >
                        <tr>
                            <th >Người bình luận</th>
                            <th style="padding-left: 100px;">Thời gian</th>
                        </tr>
                        <tbody >
                            <tr>
                                <td><?=$dsbl['HoTen']?></td>
                                <td style="padding-left: 100px;"><?=$dsbl['NgayBL']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="tablebinhluan">
                        <tr>
                            <th>Nội dung bình luận</th>
                        </tr>
                        <tbody class="binhluandetail">
                            <tr>
                                <td>
                                    <p><?= $dsbl['NoiDung']?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <?php endforeach; ?>
            <!-- Nếu nó tồn tại session['user'] thì mình mới cho nó quyền ĐƯỢC BÌNH LUẬN -->
            <?php if(isset($_SESSION['user'])):?>
                <form  action="<?=APPURL?>product/comment" method="POST"> <!-- vi minh lam doc loc -->
                    <input type="hidden" name="MaSP" value="<?=$detail_product['MaSP']?>">
                    <div class="form-detail">
                        <label for="">Nhận xét của bạn</label><br>
                        <input type="text" name="NoiDung" class="Noidungcmt">
                    </div>
                    <div class="form-detail">
                        <button type="submit" class="btn btn-success" >Gửi bình luận</button>
                    </div>
                </form>
            <?php endif;?>
            <!-- END -->
    </div>
    </section>
    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $lienquan_product = $data['productRelate'];
                    foreach($lienquan_product as $item){

                        if($item['GiaSP'] >=1){
                            $price = '<h5>'.number_format($item['GiaSP'],"0",",",".").' đ</h5>';
                        }else{
                            $price = "<h5>Đang cập nhật</h5>";
                        }

                        if($item['StatusProduct'] >=1){
                            $StatusProduct = '<h5>Hết hàng</h5>';
                        }else{
                            $StatusProduct = "";
                        }
            
                        
                        echo '
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="'.APPURL.'public/img/traicay/'.$item['HinhAnh'].'">
                                        
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="'.APPURL.'product/detail/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
                        ';
                                    if(empty($StatusProduct)){
                                        echo $price;
                                        echo ' 
                                            <form action="index.php?mod=product&act=addtocart" method="post">
                                                <input type="hidden" name="MaSP" value="'.$item['MaSP'].'">
                                                <input type="hidden" name="HinhAnh" value="'.$item['HinhAnh'].'">
                                                <input type="hidden" name="GiaSP" value="'.$item['GiaSP'].'">
                                                <input type="hidden" name="TenSP" value="'.$item['TenSP'].'">
                                                <input type="hidden" name="SoLuong" value="1">
                                                <div class="intro">
                                                    <input type="submit" value="Thêm vào giỏ " name="submitaddtocart">
                                                </div>
                                            </form> 
                                        ';
            
                                    }else{
                                        echo $StatusProduct;
                                    }
            
                        echo '
                                    </div>
                                </div>
                            </div>
                        ';

                        }
                    ?>
            </div>
        </div>
    </section>

    <script>
        
        function incrementQuantity() {
            var quantityInput = document.getElementById('quantityInput');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById('quantityInput');
            //Nếu giá trị hiện tại của trường nhập liệu lớn hơn 1
            if (parseInt(quantityInput.value) > 1) {
                //thì giá trị đó sẽ được giảm đi 1 -> làm cho sản phẩm không bao giờ nhỏ hơn 1 đucợ
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        function addlove(){
            var loveButton = document.getElementById("loveButton");
            loveButton.classList.toggle('wishlist-active');

            document.getElementById("loveform").submit();
        }
    </script>

    <?php include_once 'v_footer.php'; ?>