<?php
            namespace App\model;
            class m_user{

        private $data;

        function __construct(){
            $this->data = new m_pdo;
        }

        //Login
        function user_getLogin($Email,$MatKhau){
            return $this->data->pdo_query_one("SELECT * FROM taikhoan WHERE Email = ? AND MatKhau = ?",$Email,$MatKhau);
        }

        //Register
        function user_register($HoTen,$UserName,$Email,$MatKhau,$DiaChi,$GioiTinh,$SoDienThoai,$HinhAnh){
            $this->data->pdo_execute("INSERT INTO taikhoan (`HoTen`,`UserName`,`Email`,`MatKhau`,`DiaChi`,`GioiTinh`,`SoDienThoai`,`HinhAnh`) VALUES(?,?,?,?,?,?,?,?)",$HoTen,$UserName,$Email,$MatKhau,$DiaChi,$GioiTinh,$SoDienThoai,$HinhAnh);
        }

        //check trùng email
        function user_checkRegister($Email){
            return $this->data->pdo_query_one("SELECT * FROM taikhoan WHERE Email = ?", $Email);
        }

        //check trùng sdt
        function user_checksdtRegister($SoDienThoai){
            return $this->data->pdo_query_one("SELECT * FROM taikhoan WHERE SoDienThoai = ?", $SoDienThoai);
        }
    }












    

    
    
?>