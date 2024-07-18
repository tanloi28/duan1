<?php
include "./view/home/sideheader.php";
if(is_array($loadone_loai)){
    extract($loadone_loai);
}
?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Loại Phim <span>/ Sửa</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->

    </div><!-- Page Headings End -->

    <!-- Add or Edit Product Start -->
    <form action="index.php?act=updateloai" method="POST">
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">

                <h4 class="title">Sửa loại phim</h4>

                <div class="row">
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" placeholder="Nhập loại phim" name="name" value="<?=$name?>"></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" name="id" value="<?=$id?>" ></div>
                </div>

                <h4 class="title">Thao tác</h4>

                <div class="product-upload-gallery row flex-wrap">


                    <!-- Button Group Start -->
                    <div class="row">
                        <div class="d-flex flex-wrap justify-content-end col mbn-10">
                            <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" name="capnhat">Cập Nhật</button>
                            <a href="index.php?act=QLloaiphim"><button class="button button-outline button-info mb-10 ml-10 mr-0">Danh sách</button></a>
                        </div>
                    </div><!-- Button Group End -->

                </div>

            </div><!-- Add or Edit Product End -->

    </form>
    <?php if(isset($error)&&$error !=""){
                echo '<p  style="color: red; text-align: center;"
                > '.$error.' </p>';
            } ?>
</div><!-- Content Body End -->