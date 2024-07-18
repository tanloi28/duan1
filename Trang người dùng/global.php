<?php

$ghes = [
    'A' => [[1, 10], [2, 10], [3, 10], [4, 10], [5, 10], [6, 10], [7, 10],[8,10],[9,10]],
    'B' => [[1, 10], [2, 10], [3, 10], [4, 10], [5, 10], [6, 10], [7, 10],[8,10],[9,10]],
    'C' => [[1, 10], [2, 10], [3, 10], [4, 10], [5, 10], [6, 10], [7, 10],[8,10],[9,10]],
    'D' => [[1, 10], [2, 20], [3, 20], [4, 20], [5, 20], [6, 20], [7, 20],[8,20],[9,10]],
    'E' => [[1, 10], [2, 20], [3, 20], [4, 20], [5, 20], [6, 20], [7, 20],[8,20],[9,10]],
    'F' => [[1, 10], [2, 20], [3, 20], [4, 20], [5, 20], [6, 20], [7, 20],[8,20],[9,10]],
    'G' => [[1, 10], [2, 30], [3, 30], [4, 30], [5, 30], [6, 30], [7, 30],[8,30],[9,10]],
    'H' => [[1, 10], [2, 30], [3, 30], [4, 30], [5, 30], [6, 30], [7, 30],[8,30],[9,10]],

];
$id_kgc = $_SESSION['tong']['id_gio'];
$id_lc = $_SESSION['tong']['id_lichchieu'];
$id_phim = $_SESSION['tong']['id_phim'];
$khoa_ghe = khoa_ghe($id_kgc, $id_lc, $id_phim);
if (isset($khoa_ghe) && $khoa_ghe != array()) {
    $khoa_ghe_ = [];
    foreach ($khoa_ghe as $sub_array) {
        $khoa_ghe_ = array_merge($khoa_ghe_, $sub_array);
    }
    $khoa_ghe__ = implode(',', $khoa_ghe_);
    $khoa_ghe_all = explode(',', $khoa_ghe__);
} else {
    $khoa_ghe_all = array();
}
?>

<!-- Main content -->
<div class="place-form-area">
    <section class="container">
        <div class="order-container">
        </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">1.   Lịch Chiếu &amp; Thời Gian</div>
            <div class="order-step second--step">2. Chọn ghế </div>
        </div>

        <div class="choose-sits">
            <div class="choose-sits__info choose-sits__info--first">
                <ul>
                    <li class="sits-price marker--none"><strong>Giá </strong></li>
                    <li class="sits-price sits-price--cheap">100.000 VNĐ</li>
                    <li class="sits-price sits-price--middle">200.000 VNĐ</li>
                    <li class="sits-price sits-price--expensive">300.000 VNĐ</li>

                </ul>
            </div>

            <div class="choose-sits__info">
                <ul>
                    <li class="sits-state sits-state--not"> Đã được chọn</li>
                    <li class="sits-state sits-state--your">Lựa chọn của bạn </li>
                </ul>
            </div>
            <div class="ghe12">
                <div class=" col-lg-10 col-lg-offset-1">

                    <div class="sits-anchor">Màn Hình</div>

                    <div class="sits">
                        <aside class="sits__line">
                            <span class="sits__indecator">A</span>
                            <span class="sits__indecator">B</span>
                            <span class="sits__indecator">C</span>
                            <span class="sits__indecator">D</span>
                            <span class="sits__indecator">E</span>
                            <span class="sits__indecator">F</span>
                            <span class="sits__indecator">G</span>
                            <span class="sits__indecator">H</span>

                        </aside> <aside class="sits__right">
                            <span class="sits__indecator">A</span>
                            <span class="sits__indecator">B</span>
                            <span class="sits__indecator">C</span>
                            <span class="sits__indecator">D</span>
                            <span class="sits__indecator">E</span>
                            <span class="sits__indecator">F</span>
                            <span class="sits__indecator">G</span>
                            <span class="sits__indecator">H</span>

                        </aside>

                        <?php foreach ($ghes as $key => $value) : ?>
                            <div class="sits__row">
                                <?php foreach ($value as $o) : ?>
                                    <?php
                                    $place = $key . $o[0];
                                    $price = $o[1];
                                    $class = '';

                                    if (in_array($place, $khoa_ghe_all)) {
                                        $class = 'sits__place sits-price--cheap';
                                    } else {
                                        if ($price == 10) {
                                            $class = 'sits__place sits-price--cheap';
                                        } elseif ($price == 20) {
                                            $class = 'sits__place sits-price--middle';
                                        } elseif ($price == 30) {
                                            $class = 'sits__place sits-price--expensive';
                                        }
                                    }
                                    ?>

                                    <span class="<?= $class ?>  <?php if( in_array( $place ,$khoa_ghe_all)){echo 'sits-state--not';}else{}?>"" data-place='<?= $place ?>' data-price='<?= $price ?>'><?= $place ?></span>

                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?><div class="sits">



                            <footer class="sits__number">
                                <span class="sits__indecator">1</span>
                                <span class="sits__indecator">2</span>
                                <span class="sits__indecator">3</span>
                                <span class="sits__indecator">4</span>
                                <span class="sits__indecator">5</span>
                                <span class="sits__indecator">6</span>
                                <span class="sits__indecator">7</span>
                                <span class="sits__indecator">8</span>
                                <span class="sits__indecator">9</span>

                            </footer>

                        </div>
                    </div></div>
            </div>

        </div>


</div>




