<?php include_once 'v_myaccount_header.php' ?>

<div class="title_myacount">
    <h4>Đơn hàng đã hủy</h4>
</div>
<table class="table table-borderless ">
    <thead>
        <tr class="listproduct_title_shadow">
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">SĐT </th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $stt = 1;
            $canceledOrders = $data['canceledOrders'];
            foreach($canceledOrders as $item):
        ?>
        <tr class="listproduct_shadow">
            <th ><?=$stt?></th>
            <td><?=$item['HoTen']?></td>
            <td><?=$item['SoDienThoai']?></td>
            <td><?=$item['DiaChi']?></td>
            <td><?=$item['NgayDat']?></td>
            <td>
                <?php
                    switch ($item['TrangThai']) {
                        case '0':
                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #F08080;">Đơn hàng mới</p>';
                            break;
                        case '1':
                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #FFD700;">Đang xử lý</p>';
                            break;
                        case '2':
                            echo '<p  style="text-align: center; color:#fff; padding:5px 5px; background-color: #21d2e2;">Xác nhận đơn hàng</p>';
                            break;
                        case '3':
                            echo '<p  style="text-align: center; color:#fff; padding:5px 5px; background-color: #21d2e2;">Đang giao hàng</p>';
                            break;
                        case '4':
                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #00982d;">Đã giao</p>';
                            break;
                        case '5':
                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #e22121;">Đã hủy</p>';
                            break;
                        case '6':
                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #000000;">Giao hàng thất bại</p>';
                            break;
                        default:

                            break;
                    }
                ?>
            </td>
            <td><a href="<?=APPURL?>user/orderUnsetDetail/<?=$item['MaDH']?>" class="a_linkdetail">Xem chi tiết</a></td>
        </tr>
        <?php
                $stt++;
            endforeach;
        ?>
    </tbody>
</table>
<?php include_once 'v_myaccount_footer.php' ?>