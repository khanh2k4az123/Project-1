<?php include_once 'v_myaccount_header.php' ?>
<section>
    <div class="">
        <h4>Tài khoản của bạn</h4>
    </div>
    <div class="row myaccout mt-3">
        <div class="col-md-4">
            <div class="myaccount_image">
                <img src="<?=APPURL?>public/img/avatar/<?=$_SESSION['user']['HinhAnh']?>" alt="">
            </div>
            
        </div>
        <div class="col-md-8">
            <div class="information__myaccount">
                <div class="information__myaccount__item">
                    <h5>Họ tên: <?=$_SESSION['user']['HoTen']?></h5>
                </div>
                <div class="information__myaccount__item">
                    <h5>Email: <?=$_SESSION['user']['Email']?></h5>
                </div>
                <div class="information__myaccount__item">
                    <h5>Số điện thoại: <?=$_SESSION['user']['SoDienThoai']?></h5>
                </div>
                <div class="information__myaccount__item">
                    <h5>Địa chỉ: <?=$_SESSION['user']['DiaChi']?></h5>
                </div>
                <div class="information__myaccount__item">
                    <h5>Giới tính: 
                        <?php
                            switch ($_SESSION['user']['GioiTinh']) {
                                case '0':
                                    echo 'Nam';
                                    break;
                                case '1':
                                    echo 'Nữ';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'v_myaccount_footer.php' ?>
