
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
                <h3>Quản Lý Tài Khoản / <span>Tài Khoản Khách Hàng</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->
    <?php if(isset($suatc)&&($suatc)!= ""){
        echo'<p  style="color: red; text-align: center;">' .$suatc. '</p>';
    }
    ?>
    <div class="row">

        <!--Order List Start-->
        <div class="col-12 mb-30">
            <div class="news-item">
                <div class="content">
            <div class="table-responsive">
                <table class="table table-vertical-middle">
                    <thead>
                    <tr>
                        <th># ID</th>
                        <th>Tên khách hàng </th>
                        <th>Tài Khoản </th>
                        <th>Mật khẩu </th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Vai Trò</th>
                        <th>Số Vé Đã Mua</th>
                        <th>Thao Tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($loadall_kh1 as $kh):?>
                        <?= extract($kh);
                        $linksua= "index.php?act=suatk&idsua=".$id;
                        $linkxoa= "index.php?act=xoatk&idxoa=".$id;?>
                        <tr>
                            <td>#<?=$kh['id']?></td>
                            <td><?=$kh['name']?></td>
                            <td><?=$kh['user']?></td>
                            <td><?=$kh['pass']?></td>
                            <td><?=$kh['email']?></td>
                            <td><?=$kh['phone']?></td>
                            <td><?=$kh['dia_chi']?></td>
                            <td>
                                <?php
                                if ($vai_tro == '1') {
                                    echo '<span class="badge badge-danger">Nhân Viên</span>';
                                } elseif ($vai_tro == '2') {
                                    echo '<span class="badge badge-primary">Chủ</span>';
                                } else {
                                    echo '<span class="badge badge-success">Khách Hàng</span>';
                                }
                                ?>
                            </td>

                            <td><?=$so_ve?></td>
                            <td class="action h4">
                                <div class="table-action-buttons">
                                    <a class="edit button button-box button-xs button-info" href="<?=$linksua?>"><i class="zmdi zmdi-edit"></i></a>
                                    <a class="delete button button-box button-xs button-danger" href="<?=$linkxoa?>"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--Order List End-->

    </div>

</div><!-- Content Body End -->

       