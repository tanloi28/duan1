

<?php
include "view/search.php";


    extract($load_ve_tt);
    ?>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Cảm ơn <br><span class="order__descript">bạn đã mua vé thành công</span></p>
            </div>

            <div class="ticket">
                <div class="ticket-position">
                    <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">CinePass</div> </div>
                    <div class="ticket__inner">
                        <div class="ticket-secondary">
                            <span class="ticket__item">Mã vé: <strong class="ticket__number"><?= $id ?></strong></span>
                            <span class="ticket__item ticket__date"><?= $ngay_chieu ?></span>
                            <span class="ticket__item ticket__time"><?= $thoi_gian_chieu ?></span>
                            <span class="ticket__item">Phòng: <strong class="ticket__number"><?= $tenphong ?></strong></span>
                            <span class="ticket__item">Rạp : <span class="ticket__cinema">CinePass Hà Đông</span></span>
                            <span class="ticket__item ticket__price">Giá: <strong class="ticket__cost"><?= number_format($thanh_tien) ?> vnđ</strong></span>
                        </div>

                        <div class="ticket-primery">
                            <span class="ticket__item ticket__item--primery ticket__film" style="display= flex">Phim: <br><strong class="ticket__movie"><?= $tieu_de ?></strong></span>
                            <span class="ticket__item ticket__time">Ghế : <?= $ghe ?></span>
                            <span class="ticket__item ticket__time">Combo : <?= $combo ?></span>
                        </div>
                    </div>
                    <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">CinePass</div></div>
                </div>
            </div>
        </div>
    </section>
