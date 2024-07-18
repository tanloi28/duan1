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
                        <h3 class="title">Quản Lý Khung Giờ Chiếu<span>/ Khung Giờ Chiếu</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->
            <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p  style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?> 
            <div class="col-12 mb-30">
            <div class="news-item">
                <div class="content">
                <div class="categories"><a href="index.php?act=themthoigian" class="product">Thêm khung giờ chiếu</a></div></div></div>

                <!--Order List Start-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Phim</th>
                                    <th>Phòng chiếu</th>
                                    <th>Ngày Chiếu</th>
                                    <th>Giờ chiếu</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($loadkgc as $gio){
                                    extract($gio);
                                    $linksua = "index.php?act=suathoigian&ids=".$id;
                                    $linkxoa = "index.php?act=xoathoigian&idxoa=".$id;
                                    echo '<tr>
                                    <td>#'.$id.'</td>
                                    <td>'.$gio['tieu_de'].'</td>
                                    <td>'.$gio['name'].'</td>
                                    <td>'.$gio['ngay_chieu'].'</td>
                                    <td>'.$thoi_gian_chieu.'</td>
                                    <td class="action h4">
                                        <div class="table-action-buttons">
                                            <a class="edit button button-box button-xs button-info" href="'.$linksua.'"><i class="zmdi zmdi-edit"></i></a>
                                            <a class="delete button button-box button-xs button-danger" href="'.$linkxoa.'"><i class="zmdi zmdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>';
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Order List End-->

            </div>
     
        </div><!-- Content Body End -->

        