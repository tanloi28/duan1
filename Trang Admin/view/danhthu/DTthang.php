<?php
include "./view/home/sideheader.php";
$tong = count($dtt1);
$trang = ceil($tong/4);
?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Theo Dõi Danh Thu <span>/ Danh Thu Theo Tháng</span></h3>
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
                            <th>Tháng</th>
                            <th>Số lượng vé đặt</th>
                            <th>Doanh thu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dtt as $list){
                            extract($list);

                            // Kiểm tra nếu số lượng vé đặt không phải là 0
                                echo '<tr>
                                               <td>'.$id.'</td>
                                         <td>'.$tieu_de.'</td>
                                         <td>'.$ten_loaiphim.'</td>
                                         <td>'.$thang.'</td>
                                         <td>'.$so_luong_ve_dat.'</td>
                                         <td>'.$sum_thanhtien.'</td>
                                         </tr>';

                        } ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Phim</th>
                            <th>Thể loại</th>
                            <th>Tháng</th>
                            <th>Số lượng vé đặt</th>
                            <th>Doanh thu</th>
                        </tr>
                        </tfoot>
                    </table>
                    <ul class="pagination">

<?php for($i=1 ; $i<=$trang ; $i++):?>
     <?php if($_GET['trang']==$i){
 echo'<li class="page-item active" >
 <a class="page-link" href="index.php?act=DTthang&&trang='.$i.'">'.$i.'</a>
</li>';
}else{
echo' <li class="page-item"><a class="page-link" href="index.php?act=DTthang&&trang='.$i.'">'.$i.'</a></li>';}
?>
<?php endfor?>

</ul>
</nav>
                </div>
            </div>
        </div>
        <!--Default Data Table End-->


        <!--How To Use Start-->
        <!--How To Use End-->

    </div>

</div><!-- Content Body End -->


