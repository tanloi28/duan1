<?php
include "./view/home/sideheader.php";

?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Theo Dõi Danh Thu <span>/ Danh Thu </span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row">

        <!--Default Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Default Table</h3>
                </div>
                <div class="box-body">

                    <table class="table table-bordered data-table data-table-default">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Phim</th>
                            <th>Thể loại</th>
                            <th>Số lượng vé đặt</th>
                            <th>Doanh thu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dt as $list){
                            extract($list);

                            // Kiểm tra nếu số lượng vé đặt không phải là 0
                            echo '<tr>
                                               <td>'.$id.'</td>
                                         <td>'.$tieu_de.'</td>
                                         <td>'.$ten_loaiphim.'</td>
                                         <td>'.$so_luong_ve_dat.'</td>
                                         <td>' . (isset($sum_thanhtien) ? number_format($sum_thanhtien) : 0) . ' VNĐ</td>
                                         </tr>';

                        } ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Phim</th>
                            <th>Thể loại</th>
                            <th>Số lượng vé đặt</th>
                            <th>Doanh thu</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
        <!--Default Data Table End-->

        <!--Export Data Table Start-->
        <div class="col-12 mb-30">

            <div class="row2">
                <div class="row2 font_title">
                    <h1>Biểu đồ </h1>
                </div>
                <div class="row2 form_content ">
                    <div
                            id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
                    </div>

                    <script>
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

// Set Data
                            const data = google.visualization.arrayToDataTable([
                                ['PHIM', 'VÉ ĐÃ BÁN'],
                                <?php
                                foreach ($dt as $list) {
                                    extract($list);
                                    echo "['$tieu_de', $so_luong_ve_dat],";
                                }
                                ?>
                            ]);

// Set Options
                            const options = {
                                title:'BIỂU ĐỒ SỐ LƯỢNG VÉ CỦA PHIM',
                                is3D:true
                            };

// Draw
                            const chart = new google.visualization.BarChart(document.getElementById('myChart'));
                            chart.draw(data, options);

                        }
                    </script>

                </div>
            </div>
        </div>
        <!--Export Data Table End-->

        <!--How To Use Start-->
        <!--How To Use End-->

    </div>

</div><!-- Content Body End -->

      