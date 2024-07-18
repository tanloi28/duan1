<?php include "view/search.php"?>



<!-- Main content -->
<section class="container">
    <div class="col-sm-12">
        <h2 class="page-heading">Danh sách phim  /
            <span ><?=$ten_loai?> </span></h2>



        <!-- Movie preview item -->
        <?php foreach($dsp as $phim):{
            extract($phim);
            $hinhpath="imgavt/" . $img;
            $linkp = "index.php?act=ctphim&id=".$id;
            $book1 = "index.php?act=datve&id=".$id;
        }?>
            <div class="movie movie--preview movie--full comments">
                <div class="col-sm-3 col-md-2 col-lg-2">
                    <div class="movie__images">
                        <img src="<?=$hinhpath?>" alt="lỗi">
                    </div>
                    <div class="movie__feature">
                        <a href="#" class="movie__feature-item movie__feature--comment">23</a>
                        <a href="#" class="movie__feature-item movie__feature--video">2</a>
                        <a href="#" class="movie__feature-item movie__feature--photo">85</a>
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

                <!-- Time table (choose film start time)-->
                <div class="time-select">
                    <div class="time-select__group group--first">
                        <div class="col-sm-4">
                            <p class="time-select__place">Cineworld</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='09:40'>09:40</li>
                            <li class="time-select__item" data-time='13:45'>13:45</li>
                            <li class="time-select__item active" data-time='15:45'>15:45</li>
                            <li class="time-select__item" data-time='19:50'>19:50</li>
                            <li class="time-select__item" data-time='21:50'>21:50</li>
                        </ul>
                    </div>

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Empire</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='10:45'>10:45</li>
                            <li class="time-select__item" data-time='16:00'>16:00</li>
                            <li class="time-select__item" data-time='19:00'>19:00</li>
                            <li class="time-select__item" data-time='21:15'>21:15</li>
                            <li class="time-select__item" data-time='23:00'>23:00</li>
                        </ul>
                    </div>

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Curzon</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='09:00'>09:00</li>
                            <li class="time-select__item" data-time='11:00'>11:00</li>
                            <li class="time-select__item" data-time='13:00'>13:00</li>
                            <li class="time-select__item" data-time='15:00'>15:00</li>
                            <li class="time-select__item" data-time='17:00'>17:00</li>
                            <li class="time-select__item" data-time='19:0'>19:00</li>
                            <li class="time-select__item" data-time='21:0'>21:00</li>
                            <li class="time-select__item" data-time='23:0'>23:00</li>
                            <li class="time-select__item" data-time='01:0'>01:00</li>
                        </ul>
                    </div>

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Odeon</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='10:45'>10:45</li>
                            <li class="time-select__item" data-time='16:00'>16:00</li>
                            <li class="time-select__item" data-time='19:00'>19:00</li>
                            <li class="time-select__item" data-time='21:15'>21:15</li>
                            <li class="time-select__item" data-time='23:00'>23:00</li>
                        </ul>
                    </div>

                    <div class="time-select__group group--last">
                        <div class="col-sm-4">
                            <p class="time-select__place">Picturehouse</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='17:45'>17:45</li>
                            <li class="time-select__item" data-time='21:30'>21:30</li>
                            <li class="time-select__item" data-time='02:20'>02:20</li>
                        </ul>
                    </div>
                </div>
                <!-- end time table-->
            </div>
        <?php endforeach ?>
        <!-- end movie preview item -->


        <div class="coloum-wrapper">
            <div class="pagination paginatioon--full">
                <a href='#' class="pagination__prev">prev</a>
                <a href='#' class="pagination__next">next</a>
            </div>
        </div>

    </div>

</section>

<div class="clearfix"></div>