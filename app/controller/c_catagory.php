<?php
        namespace App\controller;
        use App\model\m_catagory;
        use App\model\m_page;

    class c_catagory extends c_base{
        private $htmlCategoryModel;
        private $htmlPageModel;

        function __construct(){
            $this->htmlCategoryModel = new m_catagory;
            $this->htmlPageModel = new m_page;
        }

        function category(){
            
            // Show banner ở trang khác
            $bannerItem = $this->htmlPageModel->load_banner_Item();
            $getdanhmuc = $this->htmlCategoryModel->danhmuc_getAll();
            $danhmuc_getbyid = "";
            $getdanhmucproduct = ""; // để nó ko lỗi

            preg_match('/\/catagory\/product\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            
            if (isset($matches[1])) {
                $MaDM = $matches[1];
                $this->titlepage = "Trang danh mục Organic";

                // if(isset($MaDM)){
                    
                    if(isset($_GET['page']) && ($_GET['page']>=1)){//Nếu truyền rồi
                        $page = $_GET['page'];
                    }else{
                        $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
                    }
                    $SoTrang = ceil($this->htmlCategoryModel->catagory_phantrang($MaDM) / 9); 
                    $danhmuc_getbyid = $this->htmlCategoryModel->danhmuc_getbyiddetail($MaDM,$page=1);
                    
            }else{
                $MaDM = "";
                if(isset($_GET['page']) && ($_GET['page']>=1)){//Nếu truyền rồi
                        $page = $_GET['page'];
                    }else{
                        $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
                    }
                    $SoTrang = ceil($this->htmlCategoryModel->catagoryall_phantrang($MaDM) / 9); 
                    $getdanhmucproduct = $this->htmlCategoryModel->danhmucproduct_getAll($page);
                
            }
            
            //Lưu vào mảng data
            $this->data['banner_header_item'] = $bannerItem;// Show banner ở trang khác
            $this->data['getdanhmuc'] = $getdanhmucproduct;
            $this->data['getall_danhmuc'] = $getdanhmuc;
            $this->data['danhmucbyId'] = $danhmuc_getbyid;
            $this->data['PhanTrang'] = $SoTrang;
            $this->data['PhanTrang'] = $SoTrang;
            $this->data['MaDM'] = $MaDM; // Pass $MaDM to the view
            //gọi phương thức renderView của c_base để hiển thị trang danh mục với dữ liệu đã được chuẩn bị.
            $this->renderView("v_product_catagory", $this->titlepage ,$this->data);
        }
    }





































    //     include_once 'config/config.php';


    // if(isset($_GET['act']) && ($_GET['act']!="")){
    //     switch ($_GET['act']) {
    //         case 'catagory_detail':
                
    //             if(isset($_GET['MaDM']) && ($_GET['MaDM']>0)){
    //                 $MaDM = $_GET['MaDM'];
    //                 if(isset($_GET['page']) && ($_GET['page']>=1)){ //Nếu truyền rồi
    //                     $page = $_GET['page'];
    //                 }else{
    //                     $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
    //                 }
    //                 $getdanhmuc = danhmuc_getAll(); 
    //                 $SoTrang = ceil(catagory_phantrang($MaDM) / 9);                
    //                 $danhmuc_getbyid = danhmuc_getbyiddetail($MaDM,$page);
    //             }else{
    //                 $MaDM = "";
    //                 if(isset($_GET['page']) && ($_GET['page']>=1)){ //Nếu truyền rồi
    //                     $page = $_GET['page'];
    //                 }else{
    //                     $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
    //                 }
    //                 $getdanhmuc = danhmuc_getAll(); 
    //                 $getdanhmucproduct = danhmucproduct_getAll($page); 
    //                 $SoTrang = ceil(catagoryall_phantrang() / 9);
    //             }
                
    //             $view_name = "product_catagory";
    //             break;
            
    //         default:
    //             header("location:index.php?mod=page&act=home");
    //             break;
    //     }
    //     include_once 'view/v_user_layout.php';
    // }else{
    //     header("location:index.php?mod=page&act=home");
    // }
?>