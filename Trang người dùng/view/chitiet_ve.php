<!-- Main content -->
<?php include "view/search.php"; ?>
<form action="index.php?act=huy_ve" method="post">
    <section class="container">
        <div class="order-container">
            <?php if (isset($loadone_ve)) {
                echo "<h2>CHI TIẾT VÉ</h2>";
                    extract($loadone_ve);
                    switch ($trang_thai) {
                        case 1:
                            $thong_bao = 'Đã thanh toán';
                            $huy_ve_style = '';
                            break;
                        case 2:
                            $thong_bao = 'Đã sử dụng';
                            $huy_ve_style = 'style="display:none;"';
                            break;
                        case 3:
                            $thong_bao = 'Đã hủy';
                            $huy_ve_style = 'style="display:none;"';
                            break;
                        case 4:
                            $thong_bao = 'Hết hạn';
                            $huy_ve_style = 'style="display:none;"';
                            break;
                        default:
                            $thong_bao = 'Trạng thái không xác định';
                            $huy_ve_style = '';
                    }
                    echo '
                       <div class="ticket">
                        <div class="ticket-position">
                            <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">CinePass</div> </div>
                            <div class="ticket__inner">
                                <div class="ticket-secondary">
                                    <span class="ticket__item">Mã vé <strong class="ticket__number">' . $id . '</strong></span>
                                    <span class="ticket__item ticket__date">' . $ngay_chieu . '</span>
                                    <span class="ticket__item ticket__time">' . $thoi_gian_chieu . '</span>
                                    <span class="ticket__item">Rạp : <span class="ticket__cinema">CinePass Hà Đông</span></span>
                                    <span class="ticket__item">Phòng : <strong class="ticket__number">' . $tenphong . '</strong></span>
                                    <span class="ticket__item">Người đặt: <span class="ticket__cinema">' . $name . '</span></span>
                                    <span class="ticket__item">Thời gian đặt: <span class="ticket__hall">' . $ngay_dat . '</span></span>
                                    <span class="ticket__item ticket__price" style="margin-top: 5px">Giá: <strong class="ticket__cost">' . number_format($price) . ' vnđ</strong></span>
                                </div>

                                <div class="ticket-primery">
<span class="ticket__item ticket__item--primery ticket__film" style="display:flex;> <strong class="ticket__movie" >PHIM : ' . $tieu_de . '</strong></span>                                    <span class="ticket__item ticket__item--primery">Ghế: <span class="ticket__place">' . $ghe . '</span></span>
                                    <span class="ticket__item ticket__item--primery">Combo: <span class="ticket__place">' . $combo . '</span></span>
                                </div>
                            </div>
                            <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">CinePass</div></div>
                        </div>
                        <div>
                        <input type="hidden" name="id" value="'.$id.'">
                         <input type="submit" name="capnhat" value="Hủy vé" ' . $huy_ve_style . ' onclick="return confirm(\'Hủy nhá\')">
                         
                        <span>Trạng thái : '.$thong_bao.'</span>
                        </div>
                    </div>
                     ';
            ?>
        </div>
    </section>
</form>

<?php
} else {
    // Nếu không tồn tại, in ra thông báo "Bạn chưa thanh toán"
    ?>
    <section class="container">
        <p>Bạn chưa thanh toán vé.</p>
    </section>
    <?php
}
?>