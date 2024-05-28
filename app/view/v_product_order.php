<?php include_once 'v_header.php'; ?>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
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
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <section class="infor__user">
        <div class="container">
            <h4>THÔNG TIN NGƯỜI ĐẶT HÀNG</h4>
            <div class="row">
                <div class="col-md-12">
                    
                    <?php 
                        $viewdonhang = $data['viewdonhang'];
                        foreach($viewdonhang as $order):
                    ?>
                    <div class="infor__order">
                        <div class="img__order">
                            <img src="<?=APPURL?>public/img/banner/order.png" alt="">
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Ngày đặt hàng:</strong></P> 
                            <h6><?=$order['NgayDat']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Mã đơn hàng:</strong></P> 
                            <h6><?=$order['MaDHRandom']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Họ tên:</strong></P> 
                            <h6><?=$order['HoTen']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Email:</strong></P> 
                            <h6><?=$order['Email']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Số điện thoại:</strong></P> 
                            <h6><?=$order['SoDienThoai']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Địa chỉ:</strong></P> 
                            <h6><?=$order['DiaChi']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Ghi chú:</strong></P> 
                            <h6><?=$order['GhiChu']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Tổng tiền:</strong></P> 
                            <h6><?=$order['TongTien']?></h6>
                        </div>
                        <div class="infor__order__item">
                            <P><strong>Phương thức thanh toán:</strong></P> 
                            <?php 
                                switch ($order['PhuongThucTT']) {
                                    case '1':
                                        $pttt = "Trả tiền mặt khi nhận hàng";
                                        break;
                                    case '2':
                                        $pttt = "Thanh toán bằng VNPAY";
                                        break;
                                    case '3':
                                        $pttt = "Thanh toan vi momo";
                                        break;
                                    default:
                                        $pttt = "Quý khách chưa chọn phuong thức thanh toán";
                                        break;
                                }
                            ?>
                            <h6 class="infor__order__item__pttt"><?=$pttt?></h6>
                        </div>
                        
                        
                    </div>
                    <?php
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="infor_product">
        <div class="container">
        <h4>THÔNG TIN ĐƠN HÀNG</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="order__product">
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                <th scope="col">STT</th>
                                <th scope="col">sản phẩm</th>
                                <th scope="col">Giá tiền </th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $stt = 1;
                                    $TongTien = 0;
                                    $viewsanphamorder = $data['viewsanphamorder'];
                                    foreach($viewsanphamorder as $item):
                                        $TongTien = $item['SoLuong']*$item['GiaSP'];
                                ?>
                                <tr>
                                    <th ><?=$stt?></th>
                                    <td><img src="<?=APPURL?>public/img/traicay/<?=$item['HinhAnh']?>" alt="" style="width:100px;"><?=$item['TenSP']?></td>
                                    <td><?=number_format($item['GiaSP'],"0",",",".")?></td>
                                    <td><?=$item['SoLuong']?></td>
                                    <td><?=number_format($TongTien,"0",",",".")?></td>
                                </tr>
                                <?php
                                        $stt++;
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="backorder_home">
            <button class="button type1">
                <a href="index.php?mod=page&act=home" class="btn-txt">Tiếp tục mua sắm</a>
            </button>
            </div>
        </div>
    </div>

    <?php include_once 'v_footer.php'; ?>