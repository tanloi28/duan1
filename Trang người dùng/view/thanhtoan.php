<?php

include 'view/search.php';
if (isset($_SESSION['tong'][4]) && is_numeric($_SESSION['tong'][4])) {
    $gia = number_format($_SESSION['tong'][4]);
} else {
    $gia = number_format($_SESSION['tong'][2]);
}

?>
<!-- Main content -->

<section class="container">
    <div class="order-container">
        <div class="order">
            <img class="order__images" alt='' src="images/tickets.png">
            <p class="order__title">Book a ticket <br><span class="order__descript">Tận Hưởng Thời Gian Xem Phim Vui Vẻ</span></p>
        </div>
    </div>
    <div class="order-step-area">
        <div class="order-step first--step order-step--disable ">1. Lịch Chiếu &amp; Thời gian</div>
        <div class="order-step second--step order-step--disable">2. Chọn ghế</div>
        <div class="order-step third--step">3. Thanh Toán </div>
    </div>
    <form action="" method="post">
    <div class="col-sm-12">
        <div class="checkout-wrapper">
            <h2 class="page-heading">Thông tin</h2>
            <ul class="book-result">
                <li class="book-result__item">Phim: <span class="book-result__count booking-cost"><?php echo $_SESSION['tong']['tieu_de'] ?></span></li>

                <li class="book-result__item">Ngày chiếu: <span class="book-result__count booking-cost"><?php echo $_SESSION['tong']['ngay_chieu'] ?></span></li>
                <li class="book-result__item">Khung giờ chiếu: <span class="book-result__count booking-cost"><?php echo $_SESSION['tong']['thoi_gian_chieu'] ?></span></li>
                <br>
                <hr>
                <li class="book-result__item">Số ghế: <span class="book-result__count booking-cost"><?php
                        if (isset($ten_ghe['ghe'])) {
                            $ghes = $ten_ghe['ghe'];
                            echo '<span class="choosen-plac">' . implode(', ', $ghes) . '</span>';

                            foreach ($ghes as $ghe) {
                                echo '<input type="hidden" name="ten_ghe[]" value="' . $ghe . '">';
                            }
                        }
                        ?>
</span></li>
                <li class="book-result__item">Combo:</span> <span class="book-result__count booking-cost"><span class="check-doan"> <?php
                            if (isset($ten_doan['doan'])) {
                                foreach ($ten_doan['doan'] as $doan) {
                                    echo  '<span class="check-doan">' . $doan . '</span>';

                                }
                            } else {
                            } ?></span>
</span></li><br>
                <hr>
                <li class="book-result__item">Tổng tiền: <span class="book-result__count booking-cost"><span class="checked-result" ><?php echo $gia ?></span>VND</span></li>
            </ul>

            <h2 class="page-heading">Chọn hình thức thanh toán :</h2>
            <div class="payment">
                <ul >
                    <li>  <a href="view/momo/xuly_momo_atm.php" class="payment__item">
                    <img alt='' src="images/payment/momo.jpg" style="width: 70px; border-radius: 8px;";>
                  <label for="" class="tt">MOMO ATM</label> </li>
                </a>
                </ul>
            </div>

        </div>

    </div>

</section>

</form>
<div class="clearfix"></div>


<div class="clearfix"></div>

