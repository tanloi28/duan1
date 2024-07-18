<?php include "view/search.php";

?>

<!-- Main content -->
<section class="container">
    <div class="col-sm-12">
        <div class="movie">


            <?php
            extract($phim);
            $hinh = "imgavt/".$img;
            $book1 = "index.php?act=datve&id=".$id;
            ?>
            <h2 class="page-heading">Chi tiết phim</h2>
            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating">5.0</span>
                        <img alt='' src="<?php echo $hinh?>"  style="width: 260.3px;height: 350px">

                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <p class="movie__option"> <a href="#"class="heading" style="font-size: 1.5vw ;"><?php echo $tieu_de?></a></p>
                    <p class="movie__time"><?php echo $thoi_luong_phim?> Phút</p>
                    <p class="movie__option"><strong>Quốc Gia: </strong><a href="#"></a> <a href="#"><?php echo $quoc_gia?></a></p>
                    <p class="movie__option"><strong>Năm: </strong><a href="#">2023</a></p>
                    <p class="movie__option"><strong>Thể Loại: </strong><a href="#"><?php echo $name?></a></p>
                    <p class="movie__option"><strong>Ngày Phát Hành: </strong><?php echo $date_phat_hanh ?></</p>
                    <p class="movie__option"><strong>Đạo Diễn: </strong><a href="#"><?php echo $daodien ?></</a></p>
                    <p class="movie__option"><strong>Diễn Viên: </strong><a href="#"><?php echo $dienvien ?></</a>, <a href="#">...</a></p>
                    <p class="movie__option"><strong>Thời Lượng Phim: </strong><a href="#"><?php echo $thoi_luong_phim?> phút</a></p>
                    <p class="movie__option"><strong>Giới Hạn độ tuổi: </strong><a href="#"><?php echo $gia_han_tuoi?>+</a></p>

                    <div class="movie__btns movie__btns--full">
                        <a href="<?=$book1?>" class="btn btn-md btn--warning">Đặt ngay</a>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>

            <h2 class="page-heading">Mô Tả Phim</h2>

            <p class="movie__describe"><?=$mo_ta?></p>

            <h2 class="page-heading">Trailer</h2>

            <div class="movie__media">
                <div class="-switcmovie__mediah">
                    <a href="#"><?=$link_trailer?></a>
                </div>

            </div>


            <div class="binhluannew" id="binhluannew" > </div>
            </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#binhluannew").load("view/binhluan.php", {
                    id_phim: <?= $phim['id'] ?>

                });
            });
        </script>

        </div>
    </div>

</section>

<div class="clearfix"></div>




