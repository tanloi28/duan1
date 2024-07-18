
   <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>

                        <li><a href="index.php?act=home"><i class="fa fa-institution"></i> <span>Trang chủ</span></a></li>
                        <li><a href="index.php?act=QLloaiphim"><i class="fa fa-window-restore" ></i> <span>Quản Lý Loại Phim</span></a></li>
                        <li><a href="index.php?act=QLphim"><i class="fa fa-film"></i> <span>Quản Lý Phim</span></a></li>
                        <li><a href="index.php?act=phong"><i class="zmdi zmdi-local-movies zmdi-hc-fw"></i> <span>Quản Lý Phòng</span></a></li>
                       
                        <li><a href="#"><i class="fa fa-user"></i> <span>Quản Lý Tài Khoản</span></a>
                            <ul class="side-header-sub-menu">
                                <?php if ($_SESSION['user1']['vai_tro'] ==2){ ?>
                                <li><a href="index.php?act=QTvien"><i class="ti-shopping-cart"></i> <span>Nhân Viên</span></a></li>
                                <?php } ?>
                                <li><a href="index.php?act=QTkh"><i class="ti-shopping-cart"></i> <span>Khách Hàng</span></a></li>

                            </ul>
                        </li>

                        <?php if ($_SESSION['user1']['vai_tro'] ==2){ ?>
                            <li class="has-sub-menu"><a href="#"><i class="fa fa-line-chart" ></i> <span>Theo Dõi Danh Thu</span></a>
                                <ul class="side-header-sub-menu">
                                    <li><a href="index.php?act=DTdh&&trang=1"><i class="fa fa-line-chart" ></i><span>Danh Thu Phim</span></a></li>
                                    <li><a href="index.php?act=DTngay&&trang=1"><i class="fa fa-line-chart" ></i><span>Danh Thu Theo Ngày</span></a></li>
                                    <li><a href="index.php?act=DTtuan&&trang=1"><i class="fa fa-line-chart" ></i><span>Danh Thu Theo Tuần</span></a></li>
                                    <li><a href="index.php?act=DTthang&&trang=1"><i class="fa fa-line-chart" ></i><span>Danh Thu Theo Tháng</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                       
                        <li class="has-sub-menu"><a href="#"><i class="ti-shopping-cart"></i> <span>Quản Lý Vé Xem Phim</span></a>
                            <ul class="side-header-sub-menu">
                              
                                <li><a href="index.php?act=ve"><i class="ti-shopping-cart"></i> <span>Vé</span></a></li>
                             
                                
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="zmdi zmdi-tv-alt-play zmdi-hc-fw"></i> <span>Quản Lý Suất Chiếu</span></a>
                            <ul class="side-header-sub-menu">

                                <li><a href="index.php?act=QLsuatchieu"><i class="zmdi zmdi-tv-alt-play zmdi-hc-fw"></i><span>Suất Chiếu</span></a></li>
                                <li><a href="index.php?act=thoigian"><i class="zmdi zmdi-tv-alt-play zmdi-hc-fw"></i><span>Khung Giờ Chiếu </span></a></li>

                            </ul>
                        </li>
                         <li ><a href="index.php?act=QLfeed&&sotrang=1"><i class="fa fa-comments" ></i> <span>Quản Lý Feedback</span></a>
                           
                        </li>
                        
                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->