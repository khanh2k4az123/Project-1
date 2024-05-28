<?php
    // include_once 'config/config.php';


    // if(isset($_GET['act']) && ($_GET['act']!="")){
    //     switch ($_GET['act']) {
    //         case 'home':
    //             if(isset($_POST['submit_home']) && $_POST['submit_home'] == true){
    //                 $keyword = $_POST['keyword'];
    //             }else{
    //                 $keyword = "";
    //             }
    //             $getdanhmuc = danhmuc_getAll(); 
    //             $getdanhmucpage = danhmucpage_getAll();
    //             $getproNew = page_productNew($keyword);
                
    //             $getDiscount = page_productDiscount();
    //             $getLuotMua = get_luotmuaOrder();
    //             $getLuotXem = page_productLuotXem();
    //             $danhmuchomeUuTien = danhmuc_getUuTien();
    //             $getbaiviet = page_blog();
    //             $view_name = "page_home";
    //             break;
    //         case 'bloghome':
    //             $getbaiviet = page_blog();
    //             $view_name = "page_homeblog";
    //             break;
    //         case 'blog':
    //             $MaBV = $_GET['MaBV'];
    //             $getbaiviet = page_blog();
    //             $detailblogid = page_blogId($MaBV);
    //             $relateblog = page_blogRelate($detailblogid['MaDM']);
    //             $view_name = "page_blog";
    //             break;
    //         case 'contact':
    //             if(isset($_POST['submit_phanhoi'])){
    //                 phanhoi_add($_POST['HoTen'],$_POST['Email'],$_POST['NoiDung']);
    //                 $_SESSION['thongbao'] = "Đã gửi phản hồi thành công";
    //             }
    //             $view_name = "page_contact";
    //             break;
    //         default:
    //             header("location:index.php?mod=page&act=home");
    //             break;
    //     }
    //     include_once 'apps/view/v_user_layout.php';
    // }else{
    //     header("location:index.php?mod=page&act=home");
    // }
?>