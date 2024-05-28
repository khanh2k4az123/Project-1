<?php include_once 'v_admin_header.php' ?>
<div class="main-content">
    <h3 class="title-page">
        Thành viên đã đăng ký 
    </h3>
    <div class="row">
        <div class="col-md-6">
            <div class="blog__sidebar__search">
                <form action="index.php?mod=admin&act=admin_user" method="post">
                    <input type="text" name="keyword" placeholder="Search...">
                    <button type="submit" name="search_product"><i class="fa-solid fa-magnifying-glass" style="color: #69cc05;"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end">
                <a href="<?=APPURL?>admin/userAdd" class="btn btn-primary mb-2">Thêm thành viên mới </a>
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
                            <th>Mã TK </th>
                            <th>Họ tên </th>
                            <th>UserName</th>
                            <th>Email </th>
                            <th>Mật Khẩu </th>
                            <th>Địa Chỉ </th>
                            <th>Giới tính </th>
                            <th>SĐT </th>
                            <th>Quyền</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $userall = $data['userall'];
                            $stt = 1; 
                            foreach($userall as $user):
                        ?>
                        <tr>
                            <td><?=$stt?></td>
                            <td><?=$user['MaTK']?></td>
                            <td><?=$user['HoTen']?></td>
                            <td><?=$user['UserName']?></td>
                            <td><?=$user['Email']?></td>
                            <td style="width:30px;"><?=$user['MatKhau']?></td>
                            <td><?=$user['DiaChi']?></td>
                            <td>
                                <?php
                                    switch ($user['GioiTinh']) {
                                        case '0':
                                            echo '<p class="GioiTinhproduct"><i class="fa-solid fa-mars"></i></p>';
                                            break;
                                        case '1':
                                            echo '<p class="GioiTinhproduct"><i class="fa-solid fa-venus"></i></p>';
                                            break;
                                        
                                        default:

                                            break;
                                    }
                                ?>
                            </td>
                            <td><?=$user['SoDienThoai']?></td>
                            <td>
                                <?php
                                    switch ($user['Quyen']) {
                                        case '0':
                                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #00982d;border-radius: 10px;">User</p>';
                                            break;
                                        case '1':
                                            echo '<p style="text-align: center; color:#fff; padding:5px 5px; background-color: #e22121;border-radius: 10px;">Admin</p>';
                                            break;
                                        
                                        default:

                                            break;
                                    }
                                ?>
                            </td>
                            <td><?=$user['NgayTao']?></td>
                        
                            <td>
                                <a href="<?=APPURL?>admin/userEdit/<?=$user['MaTK']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            </td>
                            <td>
                                <?php
                                    switch ($user['HoatDong']) {
                                        case '0':
                                            echo '<p class="statusproduct_1"><i class="fa-solid fa-toggle-on" style="green"></i></p>';
                                            break;
                                        case '1':
                                            echo '<p class="statusproduct_1"><i class="fa-solid fa-eye-slash"></i></p>';
                                            break;
                                        
                                        default:
                                            # code...
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

    
</div> 

<div class="admin__pagein">
    <ul class="pagination">
        <li class="page-item <?= ($data['page'] <= 1) ? "disabled" : ""?>">
            <a class="page-link" href="<?=APPURL?>admin/user?page=<?=($data['page']-1)?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php 
        $SoTrang = $data['SoTrang']; 
        for($i=1; $i <= $SoTrang ; $i++): ?>
            <li class="page-item <?= ($page==$i) ? 'active' : '' ?>">
                <a class="page-link" href="<?=APPURL?>admin/user?page=<?=$i?>"><?=$i?></a>
            </li>
        <?php endfor;  ?>
        <li class="page-item <?=  ($page >= $SoTrang) ? "disabled" : ""?>">
        <a class="page-link" href="<?= APPURL?>admin/user?page=<?= ($data['page'] + 1) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    </div>
<script>
    function delete_user(MaTK){
        var kq = confirm("Bạn có chắc chắn muốn xóa thành viên này không");
        if(kq){
            window.location = 'index.php?mod=admin&act=admin_delete_user&MaTK='+MaTK;
        }
        event.preventDefault();//sử dụng nó để ngăn chặn hành động mặc định
    }
</script>
<?php include_once 'v_admin_footer.php' ?>