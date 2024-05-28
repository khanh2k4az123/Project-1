<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Bài Viết
    </h3>
    <div class="row">
        <div class="col-md-6">
            <div class="blog__sidebar__search">
                <form action="index.php?mod=admin&act=admin_post" method="post">
                    <input type="text" name="keyword" placeholder="Search...">
                    <button type="submit" name="search_product"><i class="fa-solid fa-magnifying-glass" style="color: #69cc05;"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
            <a href="<?=APPURL?>admin/blogAdd" class="btn btn-primary mb-2">Thêm bài viết mới</a>
            </div>
        </div>
    </div>
    
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã bài viết</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Hình ảnh chi tiết</th>
                            <th>Mô tả ngắn</th>
                            <th>Mô tả</th>
                            <th>Ngày viết</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $baivietall = $data['baivietall'];
                            $stt = 1; 
                            foreach($baivietall as $post):
                        ?>
                        <tr>
                            <td><?=$stt?></td>
                            <td><?=$post['MaBV']?></td>
                            <td><?=$post['TieuDe']?></td>
                            <td><img src="<?=APPURL?>public/img/baiviet/<?=$post['HinhAnh']?>" alt="" style="width:80px; height:80px; object-fit:cover;"></td>
                            <td><img src="<?=APPURL?>public/img/baiviet/<?=$post['HinhAnhDetail']?>" alt="" style="width:80px; height:80px; object-fit:cover;"></td>
                            <td><?=$post['MoTaNgan']?></td>
                            <td class="post_admin" data-content=""><?= $post['MoTa'] ?></td>
                            <td><?=$post['NgayViet']?></td>
                            <td>
                                <a href="<?=APPURL?>admin/blogEdit/<?=$post['MaBV']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="<?=APPURL?>admin/blogDelete/<?=$post['MaBV']?>" class="btn btn-danger" onclick="delete_post(<?=$post['MaBV']?>),event"><i class="fa-solid fa-trash"></i> Xóa</a>
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
                <a class="page-link" href="<?=APPURL?>admin/blog?page=<?=($data['page']-1)?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php 
            $SoTrang = $data['SoTrang']; 
            for($i=1; $i <= $SoTrang ; $i++): ?>
                <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                    <a class="page-link" href="<?=APPURL?>admin/blog?page=<?=$i?>"><?=$i?></a>
                </li>
            <?php endfor;  ?>
            <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
            <a class="page-link" href="<?= APPURL?>admin/blog?page=<?= ($data['page'] + 1) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
</div> 
<script>
    function delete_post(MaBV){
        var kq = confirm("Bạn có chắc chắn muốn xóa bài viết này không");
        if(kq){
            window.location = '<?=APPURL?>admin/blogDelete/'+MaBV;
        }
        event.preventDefault();//sử dụng nó để ngăn chặn hành động mặc định
    }
</script>
<?php include_once 'v_admin_footer.php' ?>