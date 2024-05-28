<?php include_once 'v_myaccount_header.php' ?>
<div class="main-content">
    
    <div class="title-page">
        <h4>Chi tiết đơn hàng</h4><div class="back_myaccount" style="text-align: right;">
        <a href="<?=APPURL?>user/myaccountOrder">Quay lại đơn hàng</a>
    </div>
    </div>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="">
                <table class="table table-borderless  ">
                    <thead>
                        <tr class="listproduct_title_shadow">
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
                            $detailordermyacount = $data['detailordermyacount'];
                            foreach($detailordermyacount as $item):
                                $TongTien = $item['SoLuong']*$item['GiaSP'];

                        ?>
                        <tr class="listproduct_shadow">
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
<?php include_once 'v_myaccount_footer.php' ?>