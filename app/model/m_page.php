<?php
            namespace App\model;
            
            class m_page{
        private $data;

        function __construct(){
            $this->data = new m_pdo; //một đối tượng của lớp m_pdo được tạo và gán cho thuộc tính $data  //cho phép lớp m_product sử dụng các phương thức của lớp m_pdo để truy vấn cơ sở dữ liệu
        }
        
        function page_productNew($keyword){
            return $this->data->pdo_query("SELECT * FROM sanpham WHERE TenSP LIKE '%$keyword%'  ORDER BY MaSP DESC LIMIT 8"); //Vì là sanphammoi nên cái sp nào mới thêm thì nó tự xếp lên đầu tiên, or mình muốn cố định thì dùng NEW
        }

        function page_productDiscount(){
            return $this->data->pdo_query("SELECT * FROM sanpham WHERE GiaGiam > 0 ORDER BY GiaGiam DESC LIMIT 4");
        } 

        function get_luotmuaOrder(){
            return $this->data->pdo_query("SELECT * FROM chitietdonhang ctdh INNER JOIN sanpham sp ON ctdh.MaSP = sp.MaSP WHERE SoLuong >= 5 ORDER BY SoLuong DESC LIMIT 4");
        }

        function page_productLuotXem(){
            return $this->data->pdo_query("SELECT * FROM sanpham WHERE LuotXem > 0 ORDER BY LuotXem DESC LIMIT 8");
        }

        function page_blog(){
            return $this->data->pdo_query("SELECT * FROM baiviet ORDER BY MaBV DESC LIMIT 3");
        }

        function danhmuc_getUuTien(){
            return $this->data->pdo_query("SELECT sp.*, dm.TenDM FROM danhmuc dm INNER JOIN sanpham sp ON dm.MaDM=sp.MaDM WHERE UuTien = 1 ORDER BY SoThuTu ASC");
        }
        
        // Show banner ở trang home
        function load_banner_home(){
            return $this->data->pdo_query("SELECT * FROM banner WHERE UuTien > 0 AND ViTri > 0 AND ViTriItem = 0");
        }

        // Show banner ở trang khác 
        function load_banner_Item(){
            return $this->data->pdo_query("SELECT * FROM banner WHERE UuTien > 0 AND ViTriItem > 0 LIMIT 1");
        }
    
    
// chưa oop
    function renderSearchResults(){
        return pdo_query("SELECT * FROM sanpham LIMIT 8"); //Vì là sanphammoi nên cái sp nào mới thêm thì nó tự xếp lên đầu tiên, or mình muốn cố định thì dùng NEW
    }


    function showsp_home($dssp){
        $page_home = "";
        
        foreach($dssp as $item){
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
                        <div class="featured__item__pic set-bg" data-setbg="'.APPURL.'public/img/traicay/'.$item['HinhAnh'].'">
                            
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="'.APPURL.'product/detail/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
            ';
                        if(empty($StatusProduct)){
                            echo $price;
                            echo ' 
                                <form  action="'.APPURL.'product/cart" method="POST" >
                                    <input type="hidden" name="MaSP" value="'.$item['MaSP'].'">
                                    <input type="hidden" name="HinhAnh" value="'.$item['HinhAnh'].'">
                                    <input type="hidden" name="GiaSP" value="'.$item['GiaSP'].'">
                                    <input type="hidden" name="TenSP" value="'.$item['TenSP'].'">
                                    <div class="intro ">
                                        <input type="submit" value="Thêm vào giỏ " >
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

        return $page_home;
    }

    function showsp_home_sale($dssp){
        $page_home = "";
        foreach($dssp as $item){
            $price = "";
            $StatusProduct = "";

            if($item['GiaSP'] >=1){
                $price = '<h5 style="text-decoration:line-through;color: #919191;font-weight: 400;">'.number_format($item['GiaSP'],"0",",",".").' đ</h5>';
            }else{
                $price = "<h5>Đang cập nhật</h5>";
            }

            if($item['GiaGiam'] >=1){
                $GiaGiamSP = '<h5>'.number_format($item['GiaGiam'],"0",",",".").' đ</h5>';
            }else{
                $GiaGiamSP = "";
            }

            if($item['StatusProduct'] >=1){
                $StatusProduct = '<h5>Hết hàng</h5>';
            }else{
                $StatusProduct = "";
            }
            
            $GiamGia = ceil((($item['GiaSP'] - $item['GiaGiam'])/$item['GiaSP'])*100);
            $GiamGia = '<div class="product__discount__percent_home">'.$GiamGia.'%</div>';
                
                echo '
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="public/img/traicay/'.$item['HinhAnh'].'">
                            '.$GiamGia.'
                        </div>
                        <div class="featured__item__text">
                        <h6><a href="'.APPURL.'product/detail/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
                ';
                        if(empty($StatusProduct)){
                            echo $price . $GiaGiamSP;
                            echo ' 
                                <form id="addtocart" action="'.APPURL.'product/cart" method="post">
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

        return $page_home;
    }

    // function showsp_home_luotmua($dssp){
    //     $page_home = "";
    //     foreach($dssp as $sp){

    //         if($sp['GiaSP'] >=1){
    //             $price = '<h5>'.number_format($sp['GiaSP'],"0",",",".").' đ</h5>';
    //         }else{
    //             $price = "<h5>Đang cập nhật</h5>";
    //         }

    //         if($sp['LuotMua']){
    //             $MuaHang = '<h6>Số lượt mua<strong>('.$sp['LuotMua'].')</strong></h6>';
    //         }else{
    //             $MuaHang = '';
    //         }

            

            
    //         echo '
    //             <div class="col-lg-3 col-md-4  fresh-meat">
    //             <div class="featured__item">
    //                 <div class="featured__item__pic set-bg" data-setbg="public/img/traicay/'.$sp['HinhAnh'].'">
                        
                        
    //                 </div>
    //                 <div class="featured__item__text">
    //                     <h6><a href="'.APPURL.'product/detail/'.$item['MaSP'].'">'.$item['TenSP'].'</a></h6>
    //                     '.$price.'
    //                     <div class="featured__item__text_MX">'.$MuaHang.'</div>
    //                 </div>
    //                 <form action="index.php?mod=product&act=addtocart" method="post">
    //                     <input type="hidden" name="MaSP" value="'.$sp['MaSP'].'">
    //                     <input type="hidden" name="HinhAnh" value="'.$sp['HinhAnh'].'">
    //                     <input type="hidden" name="GiaSP" value="'.$sp['GiaSP'].'">
    //                     <input type="hidden" name="TenSP" value="'.$sp['TenSP'].'">
    //                     <input type="hidden" name="SoLuong" value="1">
    //                     <div class="intro">
    //                         <input type="submit" value="Thêm vào giỏ " name="submitaddtocart">
    //                     </div>
    //                 </form> 
    //             </div>
    //         </div>';
            
    //     }

    //     return $page_home;
    // }

    function showsp_home_luotxem($dssp){
        $page_home = "";
        foreach($dssp as $item){
            $price = "";
            $StatusProduct = "";

            if($item['GiaSP'] >=1){
                $price = '<h5>'.number_format($item['GiaSP'],"0",",",".").' đ</h5>';
            }else{
                $price = "<h5>Đang cập nhật</h5>";
            }

            if($item['LuotXem']){
                $SoView = '<h6> <strong>('.$item['LuotXem'].')</strong> Lượt xem</h6>';
            }else{
                $SoView = '';
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
                                <form  action="'.APPURL.'product/cart" method="POST" >
                                    <input type="hidden" name="MaSP" value="'.$item['MaSP'].'">
                                    <input type="hidden" name="HinhAnh" value="'.$item['HinhAnh'].'">
                                    <input type="hidden" name="GiaSP" value="'.$item['GiaSP'].'">
                                    <input type="hidden" name="TenSP" value="'.$item['TenSP'].'">
                                    <div class="intro ">
                                        <input type="submit" value="Thêm vào giỏ " >
                                    </div>
                                </form> 
                            ';

                        }else{
                            echo $StatusProduct;
                        }

            echo '
            <div class="featured__item__text_MX">'.$SoView.'</div>
                        </div>
                    </div>
                </div>
            ';
                ;
            
        }

        return $page_home;
    }

    

    function page_blogId($MaBV){
        return $this->data->pdo_query_one("SELECT * FROM baiviet WHERE MaBV = ?",$MaBV);
    }

    function page_blogRelate($MaBV){
        return $this->data->pdo_query("SELECT * FROM baiviet WHERE MaBV = ? ORDER BY rand() ",$MaBV);
    }

    function show_home_blog($dsbv){
        $page_home = "";
        foreach($dsbv as $item){
            echo '
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="public/img/baiviet/'.$item['HinhAnh'].'" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> '.$item['NgayViet'].'</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="'.APPURL.'home/blog/'.$item['MaBV'].'">'.$item['TieuDe'].'</a></h5>
                        <p>'.$item['MoTaNgan'].'</p>
                    </div>
                </div>
            </div>
            ';
        }
        return $page_home;
    }

}

    // CONTACT 
        //  add
        function phanhoi_add($HoTen,$Email,$NoiDung){
            pdo_execute("INSERT INTO phanhoi (`HoTen`,`Email`,`NoiDung`) VALUES (?,?,?)",$HoTen,$Email,$NoiDung);
        }

    //
    function danhmucpage_getAll(){
        return pdo_query("SELECT * FROM danhmuc ORDER BY MaDM DESC");
    }

    // function danhsach_slidedanhmuc($dsdm){
    //     $page_home = "";
    //     foreach($dsdm as $item){
    //         echo '<div class="categories__slider owl-carousel">
    //                 <div class="col-lg-3">
    //                     <div class="categories__item set-bg" data-setbg="">
    //                     <img src="../view/img/categories/'. $item['HinhAnh'].'" alt="">
    //                         <h5><a href="#">'.$item['TenDM'].'</a></h5>
    //                     </div>
    //                 </div>
    //             </div>';
    //     }
    //     return $page_home;
    // }
?>