<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Sản phẩm
    </h3>
    <div class="row">
        <div class="col-md-6">
            <div class="blog__sidebar__search">
                <form action="" method="post">
                    <input type="text" name="keyword" placeholder="Search...">
                    <button type="submit" name="search_product"><i class="fa-solid fa-magnifying-glass" style="color: #69cc05;"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <a href="<?=APPURL?>admin/productAdd" class="btn btn-primary mb-2">Thêm sản phẩm mới</a>
            </div>
        </div>
    </div>
    
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã SP</th>
                            <th>Tên SP</th>
                            <th>Giá SP</th>
                            <th>Giá giảm</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Tên DM</th>
                            <th>View</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sanphamall = $data['sanphamall'];
                            $stt = 1; 
                            foreach($sanphamall as $product):
                        ?>
                        <tr>
                            <td><?=$stt?></td>
                            <td><?=$product['MaSP']?></td>
                            <td><?=$product['TenSP']?></td>
                            <td><?=number_format($product['GiaSP'],"0",",",".")?></td>
                            <td><?=number_format($product['GiaGiam'],"0",",",".")?></td>
                            <td class="limited-width"><?=$product['TieuDe']?></td>
                            <td class="limited-width"><?=$product['MoTa']?></td>
                            <td><img src="<?=APPURL?><?=FILE_UPLOAD?><?=$product['HinhAnh']?>" alt="" style="width:80px; height:80px; object-fit:cover;"></td>
                            <td><?=$product['TenDM']?></td>
                            <td><?=$product['LuotXem']?></td>
                            <td>
                                <a href="<?=APPURL?>admin/productEdit/<?=$product['MaSP']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            </td>
                            <td >
                                <?php
                                    switch ($product['StatusProduct']) {
                                        case '0':
                                            echo '<p class="statusproduct_1">Còn hàng</p>';
                                            break;
                                        case '1':
                                            echo '<p class="statusproduct_2">Hết hàng</p>';
                                            break;
                                        
                                        default:
                                            
                                            break;
                                    }
                                ?>
                            </td>
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

    
<div class="admin__pagein">
    <ul class="pagination">
        <li class="page-item <?= ($data['page'] <= 1) ? "disabled" : ""?>">
            <a class="page-link" href="<?=APPURL?>admin/product?page=<?=($data['page']-1)?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php 
        $SoTrang = $data['SoTrang']; 
        for($i=1; $i <= $SoTrang ; $i++): ?>
            <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                <a class="page-link" href="<?=APPURL?>admin/product?page=<?=$i?>"><?=$i?></a>
            </li>
        <?php endfor;  ?>
        <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
        <a class="page-link" href="<?= APPURL?>admin/product?page=<?= ($data['page'] + 1) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</div>
</div> 
</div> 
<?php include_once 'v_admin_footer.php' ?>


