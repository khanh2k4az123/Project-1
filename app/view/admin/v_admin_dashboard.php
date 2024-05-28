<?php include_once 'v_admin_header.php' ?>

<div class="main-content">
                <h3 class="title-page">
                    Dashboards
                </h3>
                <section class="statistics row">
                    <div class="col-sm-12 col-md-6 col-xl-2 ">
                        <a href="<?=APPURL?>admin/product" >
                            <div class="card mb-3 widget-chart " style="border: none;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold " >
                                    <h5>
                                        Tổng sản phẩm
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?= $countProduct = $data['countProduct']?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/user">
                            <div class="card mb-3 widget-chart " style="border: none; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">

                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countUser = $data['countUser'] ?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/post">
                            <div class="card mb-3 widget-chart " style="border: none; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng bài viết
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countBlog = $data['countBlog']?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/catagory">
                            <div class="card mb-3 widget-chart " style="border: none; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng danh mục
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countCatagory = $data['countCatagory']?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/order">
                            <div class="card mb-3 widget-chart " style="border: none; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng đơn hàng
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countOrder = $data['countOrder']?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/comment">
                            <div class="card mb-3 widget-chart " style="border: none;background-color:# ;color: #; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng bình luận
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countCmt = $data['countCmt']?></span>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="index.php?mod=admin&act=phanhoi">
                            <div class="card mb-3 widget-chart " style="border: none;;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng phản hồi
                                    </h5>
                                </div>
                                <span class="widget-numbers"></span>
                            </div>
                        </a>
                    </div> -->
                    <div class="col-sm-12 col-md-6 col-xl-2">
                        <a href="<?=APPURL?>admin/love">
                            <div class="card mb-3 widget-chart " style="border: none;;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10  font-weight-bold">
                                    <h5>
                                        Tổng yêu thích
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$countlove = $data['countlove']?></span>
                            </div>
                        </a>
                    </div>
                </section>
                <section class="row">
                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div class="card chart">
                            <div id="myChart" style="height:400px"></div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-start">Chủ đề</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $thongkeggchart = $data['thongkeggchart']; foreach($thongkeggchart as $item): ?>
                                    <tr>
                                        <td class="text-start"><?=$item['TenDM']?></td>
                                        <td><?=$item['SoLuong']?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card chart">
                            
                        </div>
                    </div>
                    
                </section>
            </div> 

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Your Function
    function drawChart() {
        
        // Set Data
        const data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng sản phẩm'], //Tên, đơn vị số liệu
        <?php foreach($thongkeggchart as $item){
            echo "['".$item['TenDM']."',".$item['SoLuong']."],";
        } 
        ?>
        
        ]);

        // Set Options
        const options = {
        title:'Biểu đồ thống kê sản phẩm theo danh mục',
        is3D: true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>


<?php include_once 'v_admin_footer.php' ?>