<!-- Hero Section Begin -->

<?php 
    include_once 'v_header.php';
    $detailblogid = $data['detail_blog_byID'];
?>
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

<!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?=APPURL?>public/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2><?=$detailblogid['TieuDe']?></h2>
                        <!-- <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                <?php 
                                    $getbaiviet = $data['getbaiviet'];
                                    foreach($getbaiviet as $item):
                                ?>
                                    <a href="#" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="<?=APPURL?>public/img/baiviet/<?=$item['HinhAnh']?>" alt="" style="Width:100px;">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6><?=$item['TieuDe']?></h6>
                                            <span><?=$item['NgayViet']?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <h2><?=$detailblogid['TieuDe']?></h2>
                        <img src="<?=APPURL?>public/img/baiviet/<?=$detailblogid['HinhAnhDetail']?>" alt="">
                        <p><?=$detailblogid['MoTa']?></p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> Food</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Bài viết Liên quan  -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Bài viết liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                $relateblog = $data['relateblog'];
                foreach($relateblog as $item): 
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?=APPURL?>public/img/baiviet/<?=$item['HinhAnh']?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?=$item['NgayViet']?></li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="<?=APPURL?>home/blog/<?=$item['MaBV']?>"><?=$item['TieuDe']?></a></h5>
                                <p><?=$item['MoTaNgan']?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

    
<?php 
    include_once 'v_footer.php';
?>