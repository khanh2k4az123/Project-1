<?php
    
    $idpro = $_POST['idpro'];
    $soluong_new = $_POST['soluong_new'];$TongTien = 0; // Khởi tạo biến tổng tiền
    if(count($_SESSION['mygiohang']) > 0){
        $_SESSION['mygiohang'][$idpro]['SoLuong'] = $soluong_new;
    }
    $html_cart = '
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table">
                <table>
                    <thead>
                        <tr>
                            <th class="shoping__product">Sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
    if(isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])) {
        $id = 0; // dùng để xác định vị trí để xóa trong mảng
        $ThanhTien = 0;$TongTien = 0;
        foreach($_SESSION['mygiohang'] as $item) {
            $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
            $TongTien += $ThanhTien;
            $linkdel = APPURL . "cart/deleteId/" . $id;
            $html_cart .= '
            <tr>
                <td class="shoping__cart__item">
                    <img src="' . APPURL . 'public/img/traicay/' . $item['HinhAnh'] . '" alt="">
                    <h5>' . $item['TenSP'] . '</h5>
                </td>
                <td class="shoping__cart__price" id="GiaSP">
                    ' . number_format($item['GiaSP'], 0, ",", ".") . ' đ
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <span class="dec qtybtn" onclick="giamSL(this)">-</span>
                            <input type="text" onkeyup="kiemtrasoluong(this)" value="' . $item['SoLuong'] . '">
                            <span class="inc qtybtn" onclick="tangSL(this)">+</span>
                            <input type="hidden" value="' . $item['MaSP'] . '">
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    ' . number_format($ThanhTien, 0, ",", ".") . ' đ
                </td>
                <td class="shoping__cart__item__close">
                    <a href="' . $linkdel . '">x</a>
                </td>
            </tr>';
            $id++;
        }
    }
    $html_cart .= '
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__btns">
                <a href="index.php?mod=page&act=home" class="primary-btn cart-btn">TIẾP TỤC MUA SẮM</a>
                <a href="Index.php?mod=product&act=delateall" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>XÓA RỖNG GIỎ HÀNG</a>
            </div>
        </div>
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <div class="shoping__checkout">
                <h5>Tổng tiền giỏ hàng</h5>';
   
        $html_cart .= '
                <ul>
                    <li>Thành tiền <span>' . number_format($TongTien, 0, ",", ".") . ' đ</span></li>
                    <li>Tổng tiền <span>' . number_format($TongTien, 0, ",", ".") . ' đ</span></li>
                </ul>';
    
    $html_cart .= '
                <a href="' . APPURL . 'product/checkout" class="primary-btn">TIẾN HÀNH KIỂM TRA</a>
            </div>
        </div>
    </div>';
    echo $html_cart;
?>
