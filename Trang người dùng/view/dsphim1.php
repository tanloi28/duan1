<?php include "view/search.php";
$tong =count($loadphim);
$sotrang = ceil($tong/2);
?>

<style>
    ul.phantrang {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
    }

    ul.phantrang li {
        margin: 0 1px; /* Khoảng cách giữa các mục */
        font-size: 16px; /* Kích thước chữ cho mục trang */
    }

    ul.phantrang a {
        display: block;
        padding: 8px 12px;
        text-decoration: none;
        color: darkgray;
        border: 1px solid darkgray;
        border-radius: 4px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    ul.phantrang a:hover {
        background-color: darkgray;
        color: white;
    }

</style>



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
                    <div class="movie__images" >
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
                 
            <nav aria-label="Page navigation example">
  <ul  style=" display: flex;
    justify-content: center;
    flex-wrap: nowrap;">

      <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
      <?php
      $isActive = ($_GET['sotrang'] == $i);
      $style = 'padding: 10px 2vw; 
              font-size: 1.5vw; 
              border: darkgray 0.5px solid; 
              border-radius: 10px; 
              margin: 10px 2vw; 
              max-width: 100px;';

      if ($isActive) {
          $style .= 'background-color: #ffd564; color: #4c4145;';
      } else {
          $style .= 'background-color: white; color: darkgray;';
      }
      ?>

      <li>
          <a href="index.php?act=dsphim1&&sotrang=<?= $i ?>" class="tab-pane<?= $isActive ? ' active' : '' ?>" id="comment<?= $i ?>" style="<?= $style ?>">
              Trang <?= $i ?>
          </a>
      </li>
      <?php endfor; ?>

    
    <li >
      </a>
    </li>
  </ul>
</nav>

             </div>
        </div>

    </div>

</section>

<div class="clearfix"></div>
