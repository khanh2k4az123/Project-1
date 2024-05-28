
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
                                <?php $getdanhmucHeader = $data['getall_danhmuc_header']; foreach($getdanhmucHeader as $dm):?>
                                        <li><a href="<?=APPURL?>catagory/product/<?=$dm['MaDM']?>"><?=$dm['TenDM']?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
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
                </section>
            <!-- Hero Section End -->
            <!-- Breadcrumb Section Begin -->
            <section class="breadcrumb-section set-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb__text">
                                <h2>Danh mục sản phẩm</h2>
                                <div class="breadcrumb__option">
                                    <a href="<?=APPURL?>">Home</a>
                                    <span>Danh mục</span>
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
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục Organic</h4>
                            <ul> 
                            <?php 
                                $getdanhmuc = $data['getall_danhmuc']; 
                                foreach($getdanhmuc as $dm): 
                            ?>
                                <li><a href="<?=APPURL?>catagory/product/<?=$dm['MaDM']?>"><?=$dm['TenDM']?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <?php 
                                $MaDM = $data['MaDM'];
                                if(isset($MaDM[1])  ):  
                        ?>
                            <?php 
                                $danhmuc_getbyid = $data['danhmucbyId'];
                                foreach($danhmuc_getbyid as $item){
                                    $price = "";
                                    $StatusProduct = "";
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
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured__item">
                                                <div class="featured__item__pic set-bg" data-setbg="'.APPURL.'public/img/traicay/'.$item['HinhAnh'].'">
                                                    
                                                </div>
                                                <div class="featured__item__text">
                                                    <h6><a href="'.APPURL.'catagory/product/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
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
                                
                        <?php else: ?>
                            <?php 
                                $getdanhmucproduct = $data['getdanhmuc'];
                                foreach($getdanhmucproduct as $item){
                                    $price = "";
                                    $StatusProduct = "";
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
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured__item">
                                                <div class="featured__item__pic set-bg" data-setbg="'.APPURL.'public/img/traicay/'.$item['HinhAnh'].'">
                                                    
                                                </div>
                                                <div class="featured__item__text">
                                                    <h6><a href="'.APPURL.'catagory/product/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
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
                        <?php endif;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
            $MaDM = $data['MaDM'];
            if(isset($MaDM[1])): 

    ?>
        <div class="admin__pagein">
            <ul class="pagination">
                <li class="page-item <?= ($page <= 1) ? "disabled" : ""?>">
                <a class="page-link" href="<?=APPURL?>catagory/product/<?=$MaDM?>/&page=<?=$page-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php $SoTrang = $data['PhanTrang']; for($i=1; $i < $SoTrang ; $i++): ?>
                    <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                    <a class="page-link" href="<?=APPURL?>catagory/product/<?=$MaDM?>/&page=<?=$i?>"><?=$i?></a>
                    </li>
                <?php endfor; ?>
                    <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
                    <a class="page-link" href="<?=APPURL?>catagory/product/<?=$MaDM?>/&page=<?=$page+1?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    <?php else: ?>
        <div class="admin__pagein">
        <ul class="pagination">
            <li class="page-item <?= ($page <= 1) ? "disabled" : ""?>">
            <a class="page-link" href="<?=APPURL?>catagory/product/&page=<?=$page-1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php $SoTrang = $data['PhanTrang']; for($i=1; $i < $SoTrang ; $i++): ?>
                <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                <a class="page-link" href="<?=APPURL?>catagory/product/&page=<?=$i?>"><?=$i?></a>
                </li>
            <?php endfor; ?>
                <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
                <a class="page-link" href="<?=APPURL?>catagory/product/&page=<?=$page+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
        </div>
    <?php endif; ?>


<?php include_once 'v_footer.php' ?>










   