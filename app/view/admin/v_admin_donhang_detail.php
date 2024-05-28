<?php include_once 'v_admin_header.php'; $detaildonhangadmin = $data['detaildonhangadmin']; ?>
<div class="main-content">
    
    <div class="title-page">
        <h4>Chi tiết đơn hàng</h4><div class="back_myaccount" style="text-align: right;">
        <a href="<?=APPURL?>admin/order">Quay lại đơn hàng</a>
    </div>
    </div>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <table class="table  ">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">sản phẩm</th>
                        <th scope="col">Giá tiền </th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 1;
                            $TongTien = 0;
                            foreach($detaildonhangadmin as $item):
                                $TongTien = $item['SoLuong']*$item['GiaSP'];

                        ?>
                        <tr>
                            <th ><?=$stt?></th>
                            <td><img src="<?=APPURL?>public/img/traicay/<?=$item['HinhAnh']?>" alt="" style="width:100px;"><?=$item['TenSP']?></td>
                            <td><?=number_format($item['GiaSP'],"0",",",".")?>đ</td>
                            <td><?=$item['SoLuong']?> sản phẩm</td>
                            <td><?=number_format($TongTien,"0",",",".")?>đ</td>
                        </tr>
                        <?php
                                $stt++;
                            endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php include_once 'v_admin_footer.php' ?>