<?php
        include_once 'v_header.php';
        $getyeuthich= $data['getyeuthich'];
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
    <section class="breadcrumb-section set-bg" data-setbg="<?=APPURL?>public/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản phẩm yêu thích</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <?php if(!empty($getyeuthich)): ?>
                            <table> 
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Yêu thích</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $stt=1; foreach($getyeuthich as $item): ?>
                                        <tr>
                                            <td><?=$stt?></td>
                                            <td class="shoping__cart__item">
                                                <a href="index.php?mod=product&act=detail&MaSP=<?=$item['MaSP']?>"><img src="<?=APPURL?>public/img/traicay/<?=$item['HinhAnh']?>" alt=""></a>
                                                <h5><a href="index.php?mod=product&act=detail&MaSP=<?=$item['MaSP']?>" style="color:#000;"><?=$item['TenSP']?></a></h5>
                                            </td>
                                            <td><a href=""><span class="icon_heart_alt" style="color:red;"></span></a></td>
                                            <td><a href="index.php?mod=product&act=yeuthichdelete&MaSP=<?=$item['MaSP']?>"><i class="fa-solid fa-trash" style="color:red"></i></a></td>
                                        </tr>
                                        <?php $stt++; endforeach; ?>
                                </tbody>
                            </table> 
                        <?php else: ?>
                            <img src="<?=APPURL?>public/img/love.png" alt="" style="width:70%;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?=APPURL?>" class="primary-btn cart-btn">QUAY LẠI TRANG CHỦ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'v_footer.php'; ?>s