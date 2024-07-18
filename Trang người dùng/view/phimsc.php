<?php include "view/search.php"?>



<!-- Main content -->
<section class="container">
    <div class="col-sm-12">
        <h2 class="page-heading">Danh sách phim  /
            <span >Phim Sắp Chiếu </span></h2>



        <!-- Movie preview item -->
            <?php foreach($psc as $phim):{
                extract($phim);
                $hinhpath="imgavt/" . $img;
                $linkp = "index.php?act=ctphim&id=".$id;
                $book1 = "index.php?act=datve&id=".$id;
            }?>
                <div class="movie movie--preview movie--full comments">
                    <div class="col-sm-3 col-md-2 col-lg-2">
                        <div class="movie__images">
                            <img src="<?=$hinhpath?>" alt="lỗi" style="width: 260.3px;height: 250px">
                        </div>

                    </div>

                    <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                        <a href="<?=$linkp?>" class="movie__title link--huge"><?= $phim['tieu_de']?></a>

                        <p class="movie__time"><?=$phim['thoi_luong_phim']?>phút</p>
                        <p class="movie__option"><strong>Quốc gia: </strong><a href="#"><?=$phim['quoc_gia']?></a></p>
                        <p class="movie__option"><strong>Thể loại: </strong><a href="#"><?=$phim['name']?></a></p>
                        <p class="movie__option"><strong>Ngày phát hành: </strong><?=$phim['date_phat_hanh']?></p>
                        <p class="movie__option"><strong>Đạo diễn: </strong><a href="#"><?=$phim['daodien']?></a></p>
                        <p class="movie__option"><strong>Diễn viên: </strong><a href="#"><?=$phim['dienvien']?></a>, <a href="#">...</a></p>
                        <p class="movie__option"><strong>Giới hạn độ tuổi: </strong><a href="#"><?=$phim['gia_han_tuoi']?></a></p>
                        <div class="movie__btns">
                            <a href="<?=$book1?>" class="btn btn-md btn--warning">Đặt Vé <span class="hidden-sm">Xem Phim</span></a>
                        </div>

                        <div class="preview-footer">
                            <div class="movie__rate"><div ><i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                    <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                    <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                    <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                    <i class="fa-solid fa-star" style="color: #fbff00;"></i></div><span class="movie__rate-number">30 LIKE</span> <span class="movie__rating">5.0</span></div>


                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            <?php endforeach ?>
        <!-- end movie preview item -->



    </div>

</section>

<div class="clearfix"></div>
