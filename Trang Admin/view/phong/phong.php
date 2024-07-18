
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
                        <h3>quản lý phòng  <span>/ phòng chiếu</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->
            <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p  style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?> 
            <div class="row">
 <div class="col-12 mb-30">
                <div class="news-item">
                <div class="content">
                <div class="categories"><a href="index.php?act=themphong" class="product">Thêm Phòng</a></div></div></div>
                <!--Order List Start-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên phòng</th>
                                    <th>Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($loadphong as $pc){
                                    extract($pc);
                                    $linksua = "index.php?act=suaphong&ids=".$id;
                                    $linkxoa = "index.php?act=xoaphong&idxoa=".$id;

                                    echo '<tr>
                                    <td>'.$id.'</td>
                                    <td>'.$pc['name'].'</td>
                                  
                              
                                    <td >
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
            </div>

        </div><!-- Content Body End -->

       