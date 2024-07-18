<?php
session_start();
require "../model/pdo.php";
require "../model/binhluan.php";
$id_phim = $_REQUEST['id_phim'];
date_default_timezone_set("Asia/Ho_Chi_Minh");

if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
    $noidung = $_POST['noi_dung'];
    $id_user = $_SESSION['user']['id'];
    $id_phim = $_POST['id_phim'];
    $timebl = date('h:i:a d-m-Y');
    binh_luan_insert($noidung, $id_user, $id_phim, $timebl);
    header("location:" . $_SERVER['HTTP_REFERER']);
}
$dem_bl = dem_bl($id_phim);
$listbl = binh_luan_select_all($id_phim);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .comment form .form-ctphim-1 span a {
            text-decoration: none;
            background-color: #ff953f;
            padding: 10px;
            border-radius: 5px;
        }
        .comment-form__text {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Style khi input được focus */
        .comment-form__text:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

    </style>
</head>

<body>
<?php foreach ($dem_bl as $bl) {
    extract($bl);
    echo '<h2 class="page-heading">Số bình luận : ' . $so_binh_luan . '</h2>';
         } ?>
<div class="comment-wrapper">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
        if (isset($_SESSION['user']) && ($_SESSION['user']  != "")) { ?>
        <input type="hidden" name="id_phim" value="<?= $id_phim ?>">
            <input type="text" name="noi_dung" class="comment-form__text" placeholder="Nhập nội dung muốn gửi">
            <input type="submit" name="guibinhluan" value="Gửi bình luận" class="btn btn-md btn--danger comment-form__btn">
        <?php } else { ?>
            <span>Để bình luận hãy <a href="index.php?act=dangnhap">Đăng nhập</a></span>
        <?php } ?>
    </form>

    <div class="comment-sets">
      <?php foreach ($listbl as $bl){
          extract($bl);
          echo "<div class='comment'>
            <div class='comment__images'>
                <img alt='' src='images/comment/avatar.jpg'>
            </div>

            <a href='#' class='comment__author'><span class='social-used '></span>$name</a>
            <p class='comment__date'>$ngaybinhluan</p>
            <p class='comment__message'>$noidung</p>
        </div>";
      } ?>




    </div>
</div>