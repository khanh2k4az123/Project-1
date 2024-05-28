<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Bình luận từ thành viên
    </h3>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th>Mã Bình Luận</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Họ tên</th>
                            <th>Nội Dung</th>
                            <th>Ngày Bình Luận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cmtall = $data['cmtall'];
                            foreach($cmtall as $comment):
                        ?>
                        <tr>
                            <td><?=$comment['MaBL']?></td>
                            <td><?=$comment['TenSP']?></td>
                            <td><img src="<?=APPURL?>public/img/traicay/<?=$comment['HinhAnh']?>" style="width:80px; height:80px; object-fit:cover;" alt=""></td>
                            <td><?=$comment['HoTen']?></td>
                            <td><?=$comment['NoiDung']?></td>
                            <td><?=$comment['NgayBL']?></td>
                            <td>
                            <td>
                                <a href="<?=APPURL?>admin/deletecomment/<?=$comment['MaBL']?>" class="btn btn-danger" onclick="delete_cmt(<?=$comment['MaBL']?>),event"><i class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                            </td>
                        </tr>
                        <?php 
                            
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
            <a class="page-link" href="<?=APPURL?>admin/comment?page=<?=($data['page']-1)?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php 
        $SoTrang = $data['SoTrang']; 
        for($i=1; $i <= $SoTrang ; $i++): ?>
            <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                <a class="page-link" href="<?=APPURL?>admin/comment?page=<?=$i?>"><?=$i?></a>
            </li>
        <?php endfor;  ?>
        <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
        <a class="page-link" href="<?= APPURL?>admin/comment?page=<?= ($data['page'] + 1) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    </div>
</div> 
<script>
    function delete_cmt(MaBL){
        var kq = confirm("Bạn có chắc chắn muốn xóa bình luận này không");
        if(kq){
            window.location = '<?=APPURL?>admin/deletecomment/'+MaBL;
        }
        event.preventDefault();//sử dụng nó để ngăn chặn hành động mặc định
    }
</script>

<?php include_once 'v_admin_footer.php' ?>