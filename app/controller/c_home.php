<?php
        namespace App\controller;
        use App\model\m_page;
        use App\model\m_catagory;

    //c_home là một class con của class c_base : nghĩa là nó sẽ thừa hưởng tất cả các thuộc tính và phương thức có mức truy cập protected hoặc public từ c_base.
    class c_home extends c_base{
        private $homeProductModel;
        private $homeCategoryModel;


        function __construct(){ // hàm tạo
            $this->homeProductModel = new m_page; //m_product được tạo và gán cho thuộc tính $homeProductModel của c_home.
            $this->homeCategoryModel = new m_catagory;
        }

        //Phương thức này thực hiện một số công việc liên quan đến trang chủ

        function index(){
            $this->titlepage = "Trang chủ Organic";
            $keyword=$_GET['keyword'] ?? "";
            
            // Show banner ở trang home
            $bannerHeader = $this->homeProductModel->load_banner_home();
            $getdanhmucHeader = $this->homeCategoryModel->danhmuc_getAll();
            $getproNew = $this->homeProductModel->page_productNew($keyword);
            $getDiscount = $this->homeProductModel->page_productDiscount();
            $getLuotMua = $this->homeProductModel->get_luotmuaOrder();
            $getLuotXem = $this->homeProductModel->page_productLuotXem();
            $danhmuchomeUuTien = $this->homeProductModel->danhmuc_getUuTien();
            $getbaiviet = $this->homeProductModel->page_blog();
            
            //dữ liệu về các sản phẩm mới và các sản phẩm đang giảm giá sẽ được lưu trữ trong mảng $data để sau đó được truyền tới view
            $this->data['banner_header'] = $bannerHeader;// Show banner ở trang home
            
            $this->data['getall_danhmuc_header'] = $getdanhmucHeader;
            $this->data['new_product'] = $getproNew;
            $this->data['sale_product'] = $getDiscount;
            $this->data['buy_product'] = $getLuotMua;
            $this->data['view_product'] = $getLuotXem;
            $this->data['getall_category'] = $danhmuchomeUuTien;
            $this->data['getall_blog'] = $getbaiviet;
            //gọi phương thức renderView của c_base để hiển thị trang chủ với dữ liệu đã được chuẩn bị.
            $this->renderView("v_page_home", $this->titlepage ,$this->data);
        }

        function blogDetail(){
            $this->titlepage = "Trang chi tiết bài viết";
            preg_match('/\/home\/blog\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if (isset($matches[1])) {
                $MaBV = $matches[1];
                $getbaiviet = $this->homeProductModel->page_blog();
                $detailblogid =  $this->homeProductModel->page_blogId($MaBV);
                $relateblog = $this->homeProductModel->page_blogRelate($detailblogid['MaBV']);

                $this->data['getbaiviet'] = $getbaiviet;
                $this->data['detail_blog_byID'] = $detailblogid;
                $this->data['relateblog'] = $relateblog;
            }
            //gọi phương thức renderView của c_base để hiển thị trang chủ với dữ liệu đã được chuẩn bị.
            $this->renderView("v_page_blog", $this->titlepage ,$this->data);
        }

    } 

        

?>