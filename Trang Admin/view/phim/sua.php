<?php
include "./view/home/sideheader.php";
if (is_array($loadone_phim)) {
    extract($loadone_phim);

}
$hinhpath="../Trang người dùng/imgavt/".$img;
if(is_file($hinhpath)){
    $img="<img src='".$hinhpath."' height='100' >";
}else{
    $img="no Img";
}
?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3> Phim <span>/ Sửa Phim</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->

    </div><!-- Page Headings End -->
    <?php 
    ?>
    <!-- Add or Edit Product Start -->
    <form action="index.php?act=updatephim" method="POST" enctype="multipart/form-data">
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">

                <h4 class="title">Sửa phim</h4>

                <div class="row">
                    <input  type="hidden" name="id" value="<?= $id ?>">

                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Tên Phim </span><br>
                        <input class="form-control" type="text"  name="tieu_de" value="<?= $tieu_de ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Đạo Diễn </span><br>
                        <input class="form-control" type="text"  name="daodien" value="<?= $daodien ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Diễn Viên</span><br>
                        <input class="form-control" type="text"  name="dienvien" value="<?= $dienvien ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">

                        <span class="title">Quốc Gia</span><br>
                        <input class="form-control" type="text"  name="quoc_gia" value="<?= $quoc_gia ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Giới Hạn tuổi </span><br>
                        <input class="form-control" type="number_format"  name="gia_han_tuoi" value="<?= $gia_han_tuoi ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Ngày Phát Hành</span><br>
                        <input class="form-control" type="date"  name="date" value="<?= $date_phat_hanh ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Thời lượng Phim </span><br>
                        <input class="form-control" type="number_format"  name="thoiluong" value="<?= $thoi_luong_phim ?>"></div><br>
                    <div class="col-lg-6 col-12 mb-10">
                        <span class="title">Danh Mục Phim </span><br>
                        <select name="id_loai" class="form-control">
                            <!--                    <option value="0">chọn</option>-->
                            <?php foreach ($loadloai as $loai) {
                                extract($loai);

                                echo '<option value="' . $id . '" selected>' . $name . '</option> ';
                            } ?>
                        </select>
                    </div><div class="col-lg-6 col-12 mb-30">
                        <span class="title">Mô tả </span><br><textarea class="form-control" name="mo_ta"><?php echo $mo_ta ?></textarea></div>

                    <div class="col-lg-6 col-12 mb-30">
                        <span class="title">Hình Ảnh Phim </span><br>
                        <input class="form-control" type="file" name="anh">
                        <?= $hinhpath ?>
                    </div>


                </div>

                <h4 class="title">Thao tác</h4>

                <div class="product-upload-gallery row flex-wrap">


                    <!-- Button Group Start -->
                    <div class="row">
                        <div class="d-flex flex-wrap justify-content-end col mbn-10">
                            <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" name="capnhat">Cập Nhật</button>
                            <a href="index.php?act=QLphim"><button class="button button-outline button-info mb-10 ml-10 mr-0">Danh sách</button></a>
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
