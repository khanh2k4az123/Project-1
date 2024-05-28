<?php include_once 'v_admin_header.php'; $getOrderDetails = $data['getOrderDetails'] ?>
<div class="main-content ">
    <h3 class="title-page">
        Chỉnh sửa đơn hàng
    </h3>
    <div class="card chart tableadmin"> 
        <form class="editOrder" action="" method="post" enctype="multipart/form-data" class="">
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-primary mb-2"  value="Lưu">
            </div>
            
            <div class="form-group">
                <label for="name">Họ tên:</label>
                <input type="text" class="form-control" name="HoTen" value="<?=$getOrderDetails['HoTen']?>" >
            </div>
            
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" class="form-control" name="Email" value="<?=$getOrderDetails['Email']?>" >
            </div>
            
            <div class="form-group">
                <label for="name">Số điện thoại:</label>
                <input type="text" class="form-control" name="SoDienThoai" value="<?=$getOrderDetails['SoDienThoai']?>" >
            </div>
            
            <div class="form-group">
                <label for="name">Địa chỉ:</label>
                <textarea class="form-control" name="DiaChi"><?=$getOrderDetails['DiaChi']?></textarea>
            </div>
            
            <div class="form-group">
                <label for="name">Ghi chú:</label>
                <textarea class="form-control" name="GhiChu"><?=$getOrderDetails['GhiChu']?></textarea>
            </div>
            
            <div class="form-group">
                <label for="name">Tổng tiền:</label>
                <input type="text" class="form-control" name="TongTien" value="<?=$getOrderDetails['TongTien']?>" >
            </div>
            
            <div class="form-group">
                <label for="name">Phương thức thanh toán:</label>
                <select class="form-control" name="PhuongThucTT" class="admin__select">
                    <option value="1" <?=($getOrderDetails['PhuongThucTT'] == 1) ? "selected" : "" ?>>Trả tiền mặt khi nhận hàng</option>
                    <option value="2" <?=($getOrderDetails['PhuongThucTT'] == 2) ? "selected" : "" ?>>Thanh toán bằng VNPAY</option>
                    <option value="3" <?=($getOrderDetails['PhuongThucTT'] == 3) ? "selected" : "" ?>>Thanh toan vi momo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="name">Trạng thái:</label>
                <select class="form-control" name="TrangThai" id="" class="admin__select">
                    <option value="0" <?=($getOrderDetails['TrangThai'] == 0) ? "selected" : "" ?>>Đơn hàng mới</option>
                    <option value="1" <?=($getOrderDetails['TrangThai'] == 1) ? "selected" : "" ?> >Đang xử lý</option>
                    <option value="2" <?=($getOrderDetails['TrangThai'] == 2) ? "selected" : "" ?> >Xác nhận đơn hàng</option>
                    <option value="3" <?=($getOrderDetails['TrangThai'] == 3) ? "selected" : "" ?> >Đang giao hàng</option>
                    <option value="4" <?=($getOrderDetails['TrangThai'] == 4) ? "selected" : "" ?> >Đã giao</option>
                    <option value="5" <?=($getOrderDetails['TrangThai'] == 5) ? "selected" : "" ?> >Đã hủy</option>
                    <option value="6" <?=($getOrderDetails['TrangThai'] == 6) ? "selected" : "" ?> >Giao hàng thất bại</option>
                </select>
            </div>
            
            
        </form>
    </div>
</div>
<?php include_once 'v_admin_footer.php' ?>