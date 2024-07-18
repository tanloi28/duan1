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
                <h3>Phim <span>/ Thêm Phim</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->

    </div><!-- Page Headings End -->
    <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p  style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?> 
    <!-- Add or Edit Product Start -->
    <form action="index.php?act=themphim" method="post"  enctype="multipart/form-data">
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">

                    <h4 class="title">Thêm  phim</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Tên Phim" name="tieu_de"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Đạo Diễn" name="daodien"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Diễn Viên" name="dienvien"></div>
                        
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Quốc Gia" name="quoc_gia"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Giới Hạn Tuổi" name="gia_han_tuoi"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="date" placeholder="Ngày Phát Hành" name="date"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="number" placeholder="Thời Lượng" name="thoiluong"></div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="file" placeholder="Hình Ảnh" name="anh"></div>
                        <div class="col-lg-6 col-12 mb-30"><textarea class="form-control" t placeholder="Mô Tả" name="mo_ta"></textarea></div>
                        <div class="col-lg-6 col-12 mb-30">
                            <select name="id_loai" id="" class="form-control">
                                <option value="0">Chọn Thể Loại Phim</option>
                                <?php foreach ($loadloai as $loai){
                                    extract($loai);
                                    echo "<option value='.$id.'>$name</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Link trailer" name="link"></div>
                    </div>

                    <h4 class="title">Thao tác</h4>

                    <div class="product-upload-gallery row flex-wrap">


                        <!-- Button Group Start -->
                        <div class="row">
                            <div class="d-flex flex-wrap justify-content-end col mbn-10">
                                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name="gui">Thêm</button>
                                <button class="button button-outline button-primary mb-10 ml-10 mr-0" ><a href="index.php?act=QLphim">Quản Trị Phim</a></button>
                            </div>
                        </div><!-- Button Group End -->

            </div>

        </div><!-- Add or Edit Product End -->
        <?php if(isset($error)&&$error !=""){
                echo '<p  style="color: red; text-align: center;"
                > '.$error.' </p>';
            } ?>
        </div>
    </form>
</div><!-- Content Body End -->