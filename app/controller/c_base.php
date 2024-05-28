<?php
        namespace App\controller;

    class c_base{
        protected $data = []; // Một mảng dữ liệu được sử dụng để truyền dữ liệu từ controller đến view.
        protected $titlepage = "";

        //Hàm renderView này giúp quản lý quá trình hiển thị trang view trong mô hình MVC 
        function renderView($viewpage, $titlepage ,$data){
            $viewfile = 'app/view/' . $viewpage . '.php';
            if(is_file($viewfile)) { //Hàm is_file được sử dụng để kiểm tra xem một đường dẫn tới một tập tin có tồn tại hay không
                include $viewfile;
            }else{
                echo 'Trang không tồn tại';
            }
        }

        
    }

?>