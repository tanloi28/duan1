<?php include "view/search.php";
?>

<!-- Main content -->
<section class="container">
    <div class="col-sm-12">
        <h2 class="page-heading">Danh sách phim</h2>


     



        <!-- Movie preview item -->
        <?php foreach($dsp as $phim):{
            extract($phim);
            $hinhpath = "imgavt/" . $img;
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

                    <p class="movie__time"><?= $phim['thoi_luong_phim']?> Phút</p>
                    <p class="movie__option"><strong>Quốc gia: </strong><a href="#"><?=$quoc_gia?></a></p>
                    <p class="movie__option"><strong>Thể loại: </strong><a href="#"><?=$phim['name']?></a></p>
                    <p class="movie__option"><strong>Ngày phát hành: </strong><?=$phim['date_phat_hanh']?></p>
                    <p class="movie__option"><strong>Đạo diễn: </strong><a href="#"><?=$daodien?></a></p>
                    <p class="movie__option"><strong>Diễn viên: </strong><a href="#"><?=$dienvien?></a>,  <a href="#">...</a></p>
                    <p class="movie__option"><strong>Giới hạn độ tuổi: </strong><a href="#"><?=$gia_han_tuoi?></a></p>
                    <div class="movie__btns">
                        <a href="<?=$book1?>" class="btn btn-md btn--warning">Đặt vé <span class="hidden-sm">ngay</span></a>
                    </div>

                   
                </div>

                <div class="clearfix"></div>

             
                
                <!-- end time table-->
            </div>
        <?php endforeach ?>
        <!-- end movie preview item -->


        <div class="coloum-wrapper">
            <div class="pagination paginatioon--full">
                 



             </div>
        </div>

    </div>

</section>

<div class="clearfix"></div>
