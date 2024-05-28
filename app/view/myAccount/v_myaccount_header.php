<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thiên nhiên Organic</title>

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
    </header>
    <!-- Header Section End -->
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header" style="background: linear-gradient(to right,#176B87, #64CCC5,  #7ED7C1);">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php?mod=page&act=home"><img src="<?=APPURL?>public/img/logo.png" alt=""></a>
                    </div>
                </div>
                
                <div class="col-lg-9">
                        <div class="header_cart_ri">
                            
                            <div class="header__cart__login_myacc">
                                <?php if(isset($_SESSION['user'])): ?>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" style="color: #fff;">
                                        Xin chào, <?= isset($_SESSION['user']['UserName']) ? $_SESSION['user']['UserName'] : 'User' ?>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?=APPURL?>user/logout">Đăng xuất</a></li>
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


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <nav class="sidebar__myaccount">
                    <ul>
                        <li>
                            <a href="<?=APPURL?>user/myaccount"><i class="fa-solid fa-house ico-side"></i>Tài khoản</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>user/myaccountUpdate"><i class="fa-solid fa-pen-to-square ico-side" style="color: #ffffff;"></i>Cập nhật tài khoản</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>user/myaccountPassword"><i class="fa-solid fa-key ico-side" style="color: #ffffff;"></i> Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>user/myaccountOrder"><i class="fa-solid fa-cart-shopping ico-side" style="color: #f5f5f5;"></i>Đơn hàng của tôi</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>user/orderUnset"><i class="fa-solid fa-trash ico-side" style="color: #ffffff;"></i>Đã hủy</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>user/orderSuccess"><i class="fa-solid fa-check ico-sides" style="color: #ffffff;"></i>   Hoàn thành</a>
                        </li>
                        <li>
                            <a href="<?=APPURL?>"><i class="fa-solid fa-right-from-bracket ico-side"></i>  Thoát</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                