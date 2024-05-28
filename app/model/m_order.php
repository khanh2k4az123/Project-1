<?php
    namespace App\model;
    class m_order{
        private $data;

        function __construct(){
            $this->data = new m_pdo; //một đối tượng của lớp m_pdo được tạo và gán cho thuộc tính $data  //cho phép lớp m_product sử dụng các phương thức của lớp m_pdo để truy vấn cơ sở dữ liệu
        }

        function TaoDonHang($MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$PhuongThucTT,$MaDHRandom){
            return $this->data->pdo_last_insert_id("INSERT INTO donhang (`MaTK`,`TongTien`,`HoTen`,`DiaChi`,`SoDienThoai`,`Email`,`GhiChu`,`PhuongThucTT`,`MaDHRandom`) VALUES (?,?,?,?,?,?,?,?,?)",$MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$PhuongThucTT,$MaDHRandom);
        }

        function addOrder($iddh,$MaSP,$GiaSP,$SoLuong){
            $this->data->pdo_execute("INSERT INTO chitietdonhang (`MaDH`,`MaSP`,`GiaSP`,`SoLuong`) VALUES (?,?,?,?)",$iddh,$MaSP,$GiaSP,$SoLuong);
        }

        function order_soluong($MaDH,$MaSP){
            $this->data->pdo_execute("UPDATE chitietdonhang SET SoLuong = SoLuong + 1 WHERE MaDH = ? AND MaSP = ?", $MaDH ,$MaSP);
        }
    
        function get_order($MaDH){
            return $this->data->pdo_query("SELECT * FROM donhang WHERE MaDH = ?",$MaDH);
        }
    
        function get_productOrder($MaDH){
            return $this->data->pdo_query("SELECT * FROM chitietdonhang ctdh INNER JOIN sanpham sp ON ctdh.MaSP = sp.MaSP INNER JOIN donhang dh ON ctdh.MaDH=dh.MaDH WHERE ctdh.MaDH = ? ",$MaDH);
        } // dh.TrangThai != 5 : làm cho đơn hàng đã hủy không show ra trong đơn hàng của tôi
    }
    
    // function TaoDonHang($MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$MaDHRandom){
    //     return pdo_last_insert_id("INSERT INTO donhang (`MaTK`,`TongTien`,`HoTen`,`DiaChi`,`SoDienThoai`,`Email`,`GhiChu`,`MaDHRandom`) VALUES (?,?,?,?,?,?,?,?)",$MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$MaDHRandom);
    // }
    
    // function get_luotmuaOrder(){
    //     return pdo_query("SELECT * FROM chitietdonhang ctdh INNER JOIN sanpham sp ON ctdh.MaSP = sp.MaSP WHERE SoLuong >= 5 ORDER BY SoLuong DESC LIMIT 4");
    // }
    
   
    
    
?>