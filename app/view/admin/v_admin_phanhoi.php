<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Phản hồi 
    </h3>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã phản hồi </th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th>Ngày gửi</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $phanhoiAll = $data['phanhoiAll'];
                            $stt = 1; 
                            foreach($phanhoiAll as $item):
                        ?>
                        <tr>
                            <td><?=$stt?></td>
                            <td><?=$item['MaPH']?></td>
                            <td><?=$item['HoTen']?></td>
                            <td><?=$item['Email']?></td>
                            <td><?=$item['NoiDung']?></td>
                            <td><?=$item['NgayGui']?></td>
                            <td>
                                <a href="index.php?mod=admin&act=deletephanhoi&MaPH=<?=$item['MaPH']?>" class="btn btn-danger" onclick="delete_phanhoi(<?=$item['MaPH']?>),event"><i class="fa-solid fa-trash"></i> Xóa</a>
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
            <li class="page-item <?= ($page <= 1) ? "disabled" : ""?>">
                <a class="page-link" href="index.php?mod=admin&act=phanhoi&page=<?=$page-1?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for($i=1; $i < $SoTrang ; $i++): ?>
                <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                    <a class="page-link" href="index.php?mod=admin&act=phanhoi&page=<?=$i?>"><?=$i?></a>
                </li>
            <?php endfor; ?>
                <li class="page-item <?= ($page >= $SoTrang) ? "disabled" : ""?>">
                <a class="page-link" href="index.php?mod=admin&act=phanhoi&page=<?=$page+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
</div> 
<script>
    function delete_phanhoi(MaPH){
        var kq = confirm("Bạn có chắc chắn muốn xóa phản hồi này không");
        if(kq){
            window.location = 'index.php?mod=admin&act=deletephanhoi&MaPH='+MaPH;
        }
        event.preventDefault();//sử dụng nó để ngăn chặn hành động mặc định
    }
</script>
<?php include_once 'v_admin_footer.php' ?>