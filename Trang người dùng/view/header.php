<!doctype html>
<html>

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>CinePass: Trang bán vé số 1 Việt Nam</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <link rel="shortcut icon" type="image/x-icon" href="../images/movie-img1.jpg">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    <!-- Open Sans -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="login-ui2/login-ui2/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <!-- Mobile menu -->
    <link href="css/gozha-nav.css" rel="stylesheet" />
    <!-- Select -->
    <link href="css/external/jquery.selectbox.css" rel="stylesheet" />

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

    <!-- Custom -->
    <link href="css/style3860.css?v=1" rel="stylesheet" />
    <link rel="stylesheet" href="css/dv.css">
    <!-- Modernizr -->
    <script src="js/external/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <script src="js/custom.js"></script>
    <![endif]-->
</head>

<body>
<div class="wrapper">

    <!-- Header section -->
    <header class="header-wrapper header-wrapper--home">
        <div class="container">
            <!-- Logo link-->
            <a href='index.php' class="logo">
                <img alt='logo' src="imgavt/logo2.png">
            </a>

            <!-- Main website navigation-->
            <nav id="navigation-box">
                <!-- Toggle for mobile menu mode -->
                <a href="#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                            </span>
                        </span>
                </a>
                <ul id="navigation">
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="index.php">Trang chủ</a>

                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="index.php?act=dsphim1&sotrang=1">Phim</a>
                        <ul>
                            <li class="menu__nav-item"><a href="index.php?act=phimdangchieu" >Phim Đang Chiếu</a></li>
                            <li class="menu__nav-item"><a href="index.php?act=phimsapchieu" >Phim Sắp Chiếu</a></li>
                        </ul>
                    </li>

                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="">Thể loại</a>
                        <ul>
                            <?php foreach ($loadloai as $loaip){
                                extract($loaip);
                                $linkloaip = 'index.php?act=theloai&id_loai='.$id;
                                echo '<li class="menu__nav-item"><a href="'.$linkloaip.'" >'.$name.'</a></li>';
                            } ?>

                        </ul>
                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="index.php?act=rapchieu">Rạp chiếu</a>

                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="index.php?act=lienhe">Liên hệ</a>

                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="index.php?act=tintuc">Tin tức</a>

                    </li>
                </ul>
            </nav>
            <div class="control-panel">
                           <?php if (isset($_SESSION['user'])){
                                  extract($_SESSION['user']);
                                  echo '<a href="index.php?act=dangnhap" class="btn btn-md btn--warning btn--book ">'.$name.'</a>';
                                  }else{
                               echo '<a href="index.php?act=dangnhap" class="btn btn-md btn--warning btn--book ">Đăng nhập</a>';
                                  }?>

            </div>

        </div>
    </header>




