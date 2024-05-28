<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titlepage?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=APPURL?>public/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=APPURL?>public/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
   
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=APPURL?>"><img src="<?=APPURL?>public/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?=APPURL?>product/cart"><i class="fa fa-shopping-bag"></i> <span><?= isset($_SESSION['mygiohang']) ? COUNT($_SESSION['mygiohang']) : 0?></span> </a></li>
            </ul>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?=APPURL?>">Home</a></li>
                
                <li><a href="#">Danh mục</a>
                    <ul class="header__menu__dropdown">
                    </ul>
                </li>
                <li><a href="index.php?mod=page&act=bloghome">Bài viết</a></li>
                <li><a href="index.php?mod=page&act=contact">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> 0rganic@gamil.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> organic@gmail.com</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=APPURL?>"><img src="<?=APPURL?>public/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="<?=APPURL?>">Home</a></li>
                            
                            <li><a href="#">Danh mục</a>
                                <ul class="header__menu__dropdown">
                                <?php if (!empty($data['getall_danhmuc_header'])) { $getdanhmucHeader = $data['getall_danhmuc_header']; foreach($getdanhmucHeader as $dm): ?>
                                    <li><a href="<?=APPURL?>catagory/product/<?=$dm['MaDM']?>"><?=$dm['TenDM']?></a></li>
                                    <?php endforeach;} ?>
                                </ul>
                            </li>
                            <li><a href="index.php?mod=page&act=bloghome">Bài viết</a></li>
                            <li><a href="index.php?mod=page&act=contact">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                        <div class="header_cart_ri">

                        
                            <div class="header__cart">
                                <ul>
                                    <li><a href="<?=APPURL?>product/love"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="<?=APPURL?>product/cart"><i class="fa fa-shopping-bag"></i> <span><?= isset($_SESSION['mygiohang']) ? COUNT($_SESSION['mygiohang']) : 0?></span></a></li>
                                </ul>
                            </div>
                            <div class="header__cart__login">
                                <?php  if(isset($_SESSION['user'])): ?>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" >
                                        <?= isset($_SESSION['user']['UserName']) ? $_SESSION['user']['UserName'] : 'User' ?>
                                        </button>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?=APPURL?>user/myaccount">Tài khoản của tôi</a></li>
                                            <li><a class="dropdown-item" href="<?=APPURL?>user/logout">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?=APPURL?>user/login">Đăng nhập</a></li>
                                            <li><a class="dropdown-item" href="<?=APPURL?>user/register">Đăng ký</a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
                
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
        <?php if (!isset($_GET['url'])): ?>
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục Organic</span>
                            </div>
                            <ul>
                                <?php $getdanhmucHeader = $data['getall_danhmuc_header']; foreach($getdanhmucHeader as $dm):?>
                                    <li><a href="<?=APPURL?>catagory/product/<?=$dm['MaDM']?>"><?=$dm['TenDM']?></a></li>
                                <?php endforeach; ?>
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
                        <div class="hero__item set-bg" >
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <?php 
                                    $bannerHeader = $data['banner_header']; foreach($bannerHeader as $key => $item): 
                                    $activeKey = ($key == 0) ? 'active' : ''; // Kiểm tra xem có phải tấm ảnh đầu tiên hay không
                                    if($item['ViTri'] == 1):
                                ?>
                                    <div class="carousel-item <?=$activeKey?>">
                                    <img src="<?=APPURL?>public/img/hero/<?=$item['HinhAnh']?>" class="d-block w-100" alt="...">
                                    </div>
                            <?php endif; endforeach; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php elseif (isset($_GET['url']) && $_GET['url'] == 'index'):?>
            <section class="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="hero__categories">
                                <div class="hero__categories__all">
                                    <i class="fa fa-bars"></i>
                                    <span>Danh mục Organic</span>
                                </div>
                                <ul>
                                    <?php $getdanhmucHeader = $data['getall_danhmuc_header']; foreach($getdanhmucHeader as $dm):?>
                                        <li><a href="<?=APPURL?>catagory/product/<?=$dm['MaDM']?>"><?=$dm['TenDM']?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="hero__search">
                                <div class="hero__search__form">
                                    <form action="" method="GET" >
                                        <input type="text" name="keyword" id="live_search" placeholder="Tìm kiếm sản phẩm tại đây?" value="<?php echo $_GET['keyword'] ?? '' ?>">
                                        <button type="submit" id="searchBtn" class="site-btn">Tìm kiếm</button>
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
                            <div class="hero__item set-bg" >
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                <?php 
                                    $bannerHeader = $data['banner_header']; foreach($bannerHeader as $key => $item): 
                                    $activeKey = ($key == 0) ? 'active' : ''; // Kiểm tra xem có phải tấm ảnh đầu tiên hay không
                                    
                                ?>
                                    <div class="carousel-item <?=$activeKey?>">
                                    <img src="<?=APPURL?>public/img/hero/<?=$item['HinhAnh']?>" class="d-block w-100" alt="...">
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (isset($_GET['url']) && $_GET['url'] == 'catagory/product/(\d+)'):?>
            
        <?php elseif (isset($_GET['url']) && $_GET['url'] == 'product/detail/(\d+)'):?>
            
        <?php endif;?>
        
