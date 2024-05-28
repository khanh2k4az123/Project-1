<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Sản phẩm yêu thích 
    </h3>
    
    
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã SP</th>
                            <th>Mã TK</th>
                            <th>Hình ảnh</th>
                            <th>Tên SP</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $admingetyeuthich = $data['admingetyeuthich'];
                            $stt = 1; 
                            foreach($admingetyeuthich as $item):
                        ?>
                        <tr>
                            <td><?=$stt?></td>
                            <td><?=$item['MaSP']?></td>
                            <td><?=$item['MaTK']?></td>
                            <td><img src="<?=APPURL?>public/img/traicay/<?=$item['HinhAnh']?>" alt=""></td>
                            <td><?=$item['TenSP']?></td>
                            
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


