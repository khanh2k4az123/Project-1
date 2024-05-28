<?php
    include_once '../config/database.php';
    include_once '../model/m_pdo.php';
    $pdo = new \App\model\m_pdo();
    
                if(isset($_POST['input'])){
                    $input = $_POST['input'];
                    $sql = "SELECT * FROM sanpham WHERE TenSP LIKE '%{$input}%'  ORDER BY MaSP DESC LIMIT 8";
                    $result = $pdo->pdo_query($sql);
                    if (!empty($result)) {
                        echo ' 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Kết quả tìm kiếm</h2>
                                    </div>
                                    
                                </div>
                            </div>
                        ';
                        foreach($result as $item){
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
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" >
                                        <img src="public/img/traicay/'.$item['HinhAnh'].'" alt="">
                                        
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="index.php?mod=product&act=detail&MaSP='.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
                            ';
                                    if(empty($StatusProduct)){
                                        echo $price ;
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
                }else {
                    // Hiển thị thông báo khi không có sản phẩm
                    echo '
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2>Kết quả tìm kiếm</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="text-align: center;font-size: 1.2em;">Không có sản phẩm nào phù hợp.</div>
                    ';
                }
                }
                
?>
