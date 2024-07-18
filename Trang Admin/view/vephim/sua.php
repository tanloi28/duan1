<?php
include "./view/home/sideheader.php";
if (is_array($loadve)) {
    extract($loadve);

}
?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3> Quản Trị Vé Xem Phim<span>/ Sửa Vé Xem Phim</span></h3>
            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->

    </div><!-- Page Headings End -->

    <!-- Add or Edit Product Start -->
    <form action="index.php?act=updatevephim" method="POST" enctype="multipart/form-data">
        <div class="add-edit-product-wrap col-12">

            <div class="add-edit-product-form">


                <div class="row">
                    <input  type="hidden" name="id" value="<?=$id?>">
                    <div class="col-lg-6 col-12 mb-30">
                        <input class="form-control" type="text" value="<?=$tieu_de?>" name="id_phim" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="number_format"   value="<?=$price?>"  name="gia_ve" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="date" value="<?=$ngay_chieu?>" name="ngay_dat" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="number_format"  value="<?=$ghe?>"  name="ghe" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text"  value="<?=$combo?>"  name="combo" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text"  value="<?=$name?>"  name="name" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="time" value="<?=$thoi_gian_chieu?>"   name="thoi_gian_chieu" disabled></div>
                    <div class="col-lg-6 col-12 mb-30"><input class="form-control" type="text" value="<?= $tenphong ?>"  disabled></div>
                    <div class="col-lg-6 col-12 mb-30">
                        <select class="form-control" name="trang_thai" >
                            <option value="0" <?= ($trang_thai == 0) ? 'selected' : '' ?>>Chưa thanh toán</option>
                            <option value="1" <?= ($trang_thai == 1) ? 'selected' : '' ?>>Đã thanh toán</option>
                            <option value="2" <?= ($trang_thai == 2) ? 'selected' : '' ?>>Đã dùng</option>
                            <option value="3" <?= ($trang_thai == 3) ? 'selected' : '' ?>>Hủy</option>


                        </select>
                    </div>

                </div>




            </div>

            <h4 class="title">Thao tác</h4>

            <div class="product-upload-gallery row flex-wrap">


                <!-- Button Group Start -->
                <div class="row">
                    <div class="d-flex flex-wrap justify-content-end col mbn-10">
                        <button class="button button-outline button-primary mb-10 ml-10 mr-0" type="submit" name="capnhat">Cập Nhật</button>
                        <a href="index.php?act=thoigian"><button class="button button-outline button-info mb-10 ml-10 mr-0">Danh sách</button></a>
                    </div>
                </div><!-- Button Group End -->

            </div>

        </div><!-- Add or Edit Product End -->
</div>
</form>
</div><!-- Content Body End -->
