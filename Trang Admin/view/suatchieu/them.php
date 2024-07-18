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
                <h3> Suất Chiếu <span>/ Thêm Suất Chiếu</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->

    </div><!-- Page Headings End -->
           
    <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?> 
    <!-- Add or Edit Product Start -->
    <form action="index.php?act=themlichchieu" method="POST">
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">

                <h4 class="title">Thêm  Xuất Chiếu</h4>

                <div class="row">
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Tên Phim </span><br>
                        <div class="row2 mb10 form_content_container">
                            <select name="id_phim" id="" class="form-control">
                                <option value="0">Chọn Tên Phim</option>
                                <?php foreach ($loadphim as $phim){
                                    extract($phim);
                                    echo "<option value='.$id.'>$tieu_de</option>";
                                } ?>
                            </select>
                        </div>  </div>
                   
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Ngày chiếu</span><br>
                        <input class="form-control" type="date"  name="nc"></div><br>
                    <!-- <div class="col-lg-6 col-12 mb-10">
                        <span class="title">Thời gian chiếu</span><br>
                        <input class="form-control" type="time"  name="tgc" >
                    </div> -->
                </div>

                <h4 class="title">Thao tác</h4>

                <div class="product-upload-gallery row flex-wrap">


                    <!-- Button Group Start -->
                    <div class="row">
                        <div class="d-flex flex-wrap justify-content-end col mbn-10">
                            <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" name="them">Thêm</button>
                            <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" ><a href="index.php?act=QLsuatchieu" style="color: black;">Danh sách</a></button>
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