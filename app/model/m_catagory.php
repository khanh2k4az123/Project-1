<?php
            namespace App\model;

    class m_catagory{
        private $data;

        function __construct(){
            $this->data = new m_pdo;
        }
        
        function danhmuc_getAll(){
            return $this->data->pdo_query("SELECT * FROM danhmuc WHERE TrangThai = 0 ORDER BY MaDM DESC");
        }

        function danhmucproduct_getAll($page=1){
            $BatDau = ($page - 1) * 9;
            return $this->data->pdo_query("SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT $BatDau,9");
        }

        function danhmuc_getbyiddetail($MaDM,$page=1){
            $BatDau = ($page - 1) * 9;//tính toán vị trí bắt đầu : ví dụ bạn ở trang 2 ($page=2) //thì sản phẩm sẽ bắt đầu từ sản phẩm số 6
            return $this->data->pdo_query("SELECT * FROM sanpham WHERE MaDM = ? LIMIT $BatDau,9",$MaDM);
        }

        function catagory_phantrang($MaDM){
            return $this->data->pdo_query_value("SELECT COUNT(*) FROM sanpham WHERE MaDM = ?", $MaDM);
        }
    
        function catagoryall_phantrang(){
            return $this->data->pdo_query_value("SELECT COUNT(*) FROM sanpham ");
        }
    }

     

    
    

     //dem so luong san pham theo danh muc
    function get_count_sp($MaDM){ //cái $madm nó không liên quan tới id ở ngoài kia 
        $returnsp = pdo_query("SELECT * FROM sanpham WHERE MaDM = ? ",$MaDM);
        return count($returnsp);
    }
   

?>