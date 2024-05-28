<?php include_once 'v_myaccount_header.php' ?>
<div class="title_myacount">
    <h4>Đơn hàng giao thành công</h4>
</div>
<table class="table table-borderless ">
    <thead>
        <tr class="listproduct_title_shadow">
        <th scope="col">STT</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Họ tên</th>
        <th scope="col">Ngày đặt</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Thông tin</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_SESSION['iddh']) && ($_SESSION['iddh'])>0):
            $stt = 1;
            $viewhistoryorder = $data['viewhistoryorder'];
            foreach($viewhistoryorder as $item):
        ?>
        <tr class="listproduct_shadow">
            <th ><?=$stt?></th>
            <td><?=$item['MaDHRandom']?></td>
            <td><?=$item['HoTen']?></td>
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
            <td><a href="<?=APPURL?>user/orderSuccessDetail/<?=$item['MaDH']?>" class="a_linkdetail">Xem chi tiết</a></td>
        </tr>
        <?php
                $stt++;
            endforeach;
        endif;
        ?>
    </tbody>
</table>

    <div class="admin__pagein">
    <ul class="pagination">
    <li class="page-item <?= ($data['page'] <= 1) ? "disabled" : ""?>">
            <a class="page-link" href="<?=APPURL?>user/orderSuccess?page=<?=($data['page']-1)?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php 
        $SoTrang = $data['SoTrang']; 
        for($i=1; $i <= $SoTrang ; $i++): ?>
            <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                <a class="page-link" href="<?=APPURL?>user/orderSuccess?page=<?=$i?>"><?=$i?></a>
            </li>
        <?php endfor;  ?>
        <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
        <a class="page-link" href="<?= APPURL?>user/orderSuccess?page=<?= ($data['page'] + 1) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</div>
    <?php include_once 'v_myaccount_footer.php' ?>