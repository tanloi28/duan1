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
<div class="content-body" xmlns="http://www.w3.org/1999/html">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Quản Lý Vé Xem Phim</h3>
            </div>
        </div><!-- Page Heading End -->
        <form action="index.php?act=ve" method="post">
            <div class="otk"><input type="text" class="tki" name="ten" placeholder="tìm kiếm người dùng">
                <input type="text" class="tki1" name="tieude" placeholder="tìm kiếm phim">
                <input type="text" class="tki2" name="id_ve" placeholder="tìm kiếm id vé">
                <input type="submit" class="tkim" name="tk" value="Tìm Kiếm"></div>
    </div><!-- Page Headings End -->
    <form action="index.php?act=capnhat_tt_ve" method="post">
        <input type="submit" class="cap" value="Cập nhật vé hết hạn" name="capnhat">
    <div class="row">

        <!--Order List Start-->
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-vertical-middle">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Phim</th>
                        <th>Giá Vé</th>
                        <th>Ngày Đặt </th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày Chiếu</th>
                        <th>Khung Giờ Chiếu</th>
                        <th>Trạng Thái Vé</th>
                        <th>Quản Lý</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($loadvephim as $ve):?>
                        <?php extract($ve)?>
                        <?php $linksua="index.php?act=suavephim&idsua=".$id;
                        $linkct = "index.php?act=ctve&id=".$id;?>
                        <tr>
                            <td>#<?=$ve['id']?></td>
                            <td><?=$ve['tieu_de']?></td>
                            <td><?=number_format($price)?> VNĐ</td>
                            <td><?=$ve['ngay_dat']?></td>
                            <td><?=$ve['name']?></td>
                            <td><?=$ve['ngay_chieu']?></td>
                            <td><?=$ve['thoi_gian_chieu']?></td>
                            <td>
                                <?php
                                switch ($ve['trang_thai']) {
                                    case '0':
                                        echo '<span class="badge badge-danger">Chưa Thanh Toán</span>';
                                        break;
                                    case '1':
                                        echo '<span class="badge badge-success">Đã thanh toán</span>';
                                        break;
                                    case '2':
                                        echo '<span class="badge badge-info">Đã Dùng</span>';
                                        break;
                                    case '3':
                                        echo '<span class="badge badge-info">Hủy</span>';
                                        break;
                                    case '4':
                                        echo '<span class="badge badge-info">Hết Hạn</span>';
                                        break;
                                    default:
                                        echo '<span class="badge badge-secondary">Trạng Thái Không Xác Định</span>';
                                }
                                ?>
                            </td>
                            <td class="action h4">
                                <div class="table-action-buttons">
                                    <a class="edit button button-box button-xs button-info" href="<?='index.php?act=suavephim&idsua='.$id?>"><i class="zmdi zmdi-edit"></i></a>
                                    <?php if ($trang_thai != 0) : ?>
                                        <a href="<?=$linkct?>" class="edit button button-box button-xs button-info">
                                            <i class="zmdi zmdi-info"></i>
                                        </a>
                                    <?php endif; ?>



                                </div>
                            </td>
                        </tr
                    <?php endforeach?>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Order List End-->
    </form>
    </div>

</div><!-- Content Body End -->


