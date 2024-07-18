<style>


    .tki,
    .tki1,
    .tki2,
    .tkim {
        padding: 10px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        width: 200px;
    }

    .tkim {
        padding: 10px 20px;
        background-color: #555; /* Màu nền của nút tìm kiếm */
        color: #fff; /* Màu chữ trắng của nút tìm kiếm */
        cursor: pointer;
    }

    .tkim:hover {
        background-color: #777; /* Màu nền khi di chuột qua nút tìm kiếm */
    }

    ::placeholder {
        color: #999; /* Màu chữ mờ khi chưa nhập vào input */
    }
    .cap {
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50; /* Màu nền xanh lá cây */
        color: #fff; /* Màu chữ trắng */
        cursor: pointer;
    }

    .cap:hover {
        background-color: #45a049; /* Màu nền xanh lá cây khi di chuột qua */
    }

</style>
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
                        <h3>Quản Lý Phim  <span>/ Danh Sách Phim</span></h3>
                    </div>
                </div><!-- Page Heading End -->
                <form action="index.php?act=QLphim" method="post">
            <div class="otk"><input type="text" class="tki" name="ten" placeholder="tìm kiếm tên phim">
                <input type="text" class="tki1" name="loai" placeholder="tìm kiếm loại phim">
                <input type="submit" class="tkim" name="tk1" value="Tìm Kiếm"></div>
            </div><!-- Page Headings End -->
            <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p  style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?> 
            <div class="row mbn-30">
                <form action="" method="post"  enctype="multipart/form-data">
                <!--Alert Start-->

                <!--Alert End-->

                <!-- Invoice List Start -->
                <div class="col-12 mb-30">
                <div class="news-item">
                <div class="content">
                <div class="categories"><a href="index.php?act=themphim" class="product">Thêm Phim</a></div></div></div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                       
                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th>Mã Phim</th>
                                    <th>Tên Phim</th>
                                    <th>Hình Ảnh</th>
                                    <th>Thời Gian Chiếu</th>
                                    <th>Ngày Phát Hành</th>
                                    <th>Loại Phim</th>
                                    <th>Quản Lý</th>
                                </tr>
                            </thead><!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                            <?php foreach ($loadphim as $phim){
                            extract($phim);
                            $linksua = "index.php?act=suaphim&idsua=".$id;
                            $linkxoa = "index.php?act=xoaphim&idxoa=".$id;
                            $hinhpath="../Trang người dùng/imgavt/".$img;
                            if(is_file($hinhpath)){
                            $img="<img src='".$hinhpath."' height='100' >";
                            }else{
                            $img="no Img";
                            }
              
                            echo '<tr> <td>#'.$id.'</td>
                                       <td>'.$tieu_de.'</td>
                                       <td>'.$img.'</td>
                                       <td>'.$thoi_luong_phim.'</td>
                                       <td>'.$date_phat_hanh.'</td>
                                       <td>'.$phim['name'].'</td>
                                       
                        <td>
                            <div class="table-action-buttons">
                                <a class="edit button button-box button-xs button-info" href="'.$linksua.'"><i class="zmdi zmdi-edit"></i></a>
                                <a class="delete button button-box button-xs button-danger" href="'.$linkxoa.'" onclick="return confirm(\'xóa ko\')"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        </td>
                        </tr>';
                        } ?>
                            
                               
                            </tbody><!-- Table Body End -->

                        </table>
                    </div></form>
                    </form>
                </div><!-- Invoice List End -->

            </div>

        </div><!-- Content Body End -->

        