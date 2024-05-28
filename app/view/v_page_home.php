    
    <?php include_once 'v_header.php'; 
    $page_home = new \App\model\m_page;
    
    ?>
    <!-- Categories Section Begin -->
    <section class="categories" >
        <div class="container">
            <div class="row">
                <?php 
                    //$html_pcata = danhsach_slidedanhmuc($getdanhmucpage);
                ?>
            </div>
        </div>
    </section>
    
    <!-- Categories Section End -->
    
    <section class="" >
        <div class="container">
            <div class="row featured__filter" id="searchresult">
            </div>
        </div>
    </section>

    <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Đã thêm sản phẩm vào giỏ hàng</p>
    </div>
    </div>


    
    <!--Sản phẩm mới Section Begin -->
    <section class="featured spad" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter" >
                <?php 
                    $html_product_new = $page_home->showsp_home($getproNew = $data['new_product']);
                    echo $html_product_new;
                ?>
            </div>
            
        </div>
    </section>
    <!-- Sản phẩm mới Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <?php 
                        $bannerHeader = $data['banner_header']; foreach($bannerHeader as $item): 
                        if($item['ViTri'] == 2):
                ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="public/img/banner/<?=$item['HinhAnh']?>" alt="">
                        </div>
                    </div>
                <?php 
                    endif; 
                    endforeach; 
                ?>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!--Sản phẩm khuyến mãi Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm khuyến mãi</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                    $html_product_giamgia = $page_home->showsp_home_sale($getDiscount = $data['sale_product']);
                    echo $html_product_giamgia;
                ?>
            </div>
        </div>
    </section>
    <!-- Sản phẩm khuyến mãi Section End -->
    
    <!--Sản phẩm mua nhiều Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm mua nhiều</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                    $getLuotMua = $data['buy_product'];
                    foreach($getLuotMua as $item):
                        $StatusProduct = "";
                        $price="";

                        if($item['GiaSP'] >=1){
                            $price = '<h5>'.number_format($item['GiaSP'],"0",",",".").' đ</h5>';
                        }else{
                            $price = "<h5>Đang cập nhật</h5>";
                        }
            
                        if($item['SoLuong']){
                            $MuaHang = '<h6>Số lượt mua<strong>('.$item['SoLuong'].')</strong></h6>';
                        }else{
                            $MuaHang = '';
                        }

                        if($item['StatusProduct'] >=1){
                            $StatusProduct = '<h5>Hết hàng</h5>';
                        }else{
                            $StatusProduct = "";
                        }
            
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="public/img/traicay/<?=$item['HinhAnh']?>">
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?=APPURL?>product/detail/<?=$item['MaSP']?>"><?=$item['TenSP']?></a></h6>
                            <?php if(empty($StatusProduct)): ?>
                                <?=$price?>
                                <div class="featured__item__text_MX"><?=$MuaHang?></div>
                                <form action="<?=APPURL?>product/cart" method="post">
                                    <input type="hidden" name="MaSP" value="<?=$item['MaSP']?>">
                                    <input type="hidden" name="HinhAnh" value="<?=$item['HinhAnh']?>">
                                    <input type="hidden" name="GiaSP" value="<?=$item['GiaSP']?>">
                                    <input type="hidden" name="TenSP" value="<?=$item['TenSP']?>">
                                    <input type="hidden" name="SoLuong" value="1">
                                    <div class="intro">
                                        <input type="submit" value="Thêm vào giỏ" >
                                    </div>
                                </form> 
                            <?php else: ?>
                                <?=$StatusProduct?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach; 
                ?>
            </div>
        </div>
    </section>
    <!-- Sản phẩm mua nhiều Section End -->

    <!--Sản phẩm nhiều lượt xem Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nhiều lượt xem</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                    $html_product_view = $page_home->showsp_home_luotxem($getLuotXem = $data['view_product']);
                    echo $html_product_view;
                ?>
            </div>
        </div>
    </section>
    <!-- Sản phẩm nhiều lượt xem Section End -->

    

    <!--Sản phẩm danh mục Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row featured__filter">
                <?php 
                    $danhmuchomeUuTien = $data['getall_category'];
                    $TenDanhMuc = null;
                    foreach($danhmuchomeUuTien as $item):
                        $StatusProduct = "";
                        $price="";

                        if ($TenDanhMuc !== $item['TenDM']) {
                            if ($TenDanhMuc !== null) {
                                echo '</div>'; 
                            }
                            //Cập nhật lại danh mục để chứa tên của danh mục hiện tại.
                            $TenDanhMuc = $item['TenDM'];

                            echo '
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>'.$TenDanhMuc.'</h2>
                                    </div>
                                </div>
                            </div>'
                            ;
                            // Mở 1 hộp box để chứa danh sách sản phẩm của danh mục hiện tại
                            echo '<div class="row featured__filter">';
                        }
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
                        
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="public/img/traicay/<?=$item['HinhAnh']?>">
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?=APPURL?>product/detail/<?=$item['MaSP']?>"><?=$item['TenSP']?></a></h6>
                            <?php if(empty($StatusProduct)): ?>
                            <?=$price?>
                        
                            <form action="<?=APPURL?>product/cart" method="post">
                                <input type="hidden" name="MaSP" value="<?=$item['MaSP']?>">
                                <input type="hidden" name="HinhAnh" value="<?=$item['HinhAnh']?>">
                                <input type="hidden" name="GiaSP" value="<?=$item['GiaSP']?>">
                                <input type="hidden" name="TenSP" value="<?=$item['TenSP']?>">
                                <input type="hidden" name="SoLuong" value="1">
                                <div class="intro">
                                    <input type="submit" value="Thêm vào giỏ " >
                                </div>
                            </form> 
                            <?php else: ?>
                                <?=$StatusProduct?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach; 
                ?>
            </div>
        </div>
    </section>
    <!-- Sản phẩm danh mục Section End -->
    
    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài viết về sản phẩm</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $html_blog = $page_home->show_home_blog($getbaiviet = $data['getall_blog']) ;
                    echo $html_blog;
                ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
   <script>

document.addEventListener("DOMContentLoaded", function() {
        // Lấy phần modal
        var modal = document.getElementById("myModal");

        // Lấy nút đóng
        var span = document.getElementsByClassName("close")[0];

        // Khi người dùng nhấp vào nút đóng, đóng modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // Hiển thị modal khi người dùng thêm sản phẩm vào giỏ hàng
        var addedToCart = <?php echo isset($_SESSION['added_to_cart']) && $_SESSION['added_to_cart'] ? 'true' : 'false'; ?>;
        if (addedToCart) {
            modal.style.display = "block";
            // Sau khi hiển thị modal, đặt lại giá trị session 'added_to_cart' thành false để không hiển thị lại modal khi trang được tải lại
            <?php $_SESSION['added_to_cart'] = false; ?>
        }
    });
   </script>

<?php include_once 'v_footer.php' ?>