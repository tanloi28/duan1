<?php include "./view/home/sideheader.php";

?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <?php if ($_SESSION['user1']['vai_tro'] ==2){ ?>
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Trang Chủ</h3>

            </div>
        </div><!-- Page Heading End -->

        <!-- Page Button Group Start -->
        <div class="col-12 col-lg-auto mb-20">
            <h1 id="real-time-clock"></h1>
        </div><!-- Page Button Group End -->

    </div><!-- Page Headings End -->

    <!-- Top Report Wrap Start -->
    <div class="row">
        <!-- Top Report Start -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng doanh thu</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tong as $t){
                        extract($t);
                        echo ' <h2>'.number_format($tong_doanh_thu).' VNĐ</h2>';
                    } ?>

                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->

        <!-- Top Report Start -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng vé đã bán</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tong as $t){
                        extract($t);
                        echo ' <h2>'.$tong_so_luong_ve_dat.' VÉ</h2>';
                    } ?>
                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->

        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng doanh thu hôm nay</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tong_day as $t){
                        extract($t);
                        echo ' <h2>'.number_format($tong_doanh_thu).' VNĐ</h2>';
                    } ?>

                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng doanh thu tuần này</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tong_tuan as $t){
                        extract($t);
                        echo ' <h2>'.number_format($tong_doanh_thu).' VNĐ</h2>';
                    } ?>

                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng doanh thu tháng này</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tong_thang as $t){
                        extract($t);
                        echo ' <h2>'.number_format($tong_doanh_thu).' VNĐ</h2>';
                    } ?>

                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng Phim Đang Chiếu</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tpdc as $t){
                        extract($t);
                        echo ' <h2>'.$total_phim.' Phim</h2>';
                    } ?>
                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Tổng Phim Sắp Chiếu</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($tpsc as $t){
                        extract($t);
                        echo ' <h2>'.$total_phim.' Phim</h2>';
                    } ?>
                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->
        <div class="col-xlg-6 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Combo được đặt nhiều nhất</h4>
                    <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                </div>

                <!-- Content -->
                <div class="content">
                    <?php foreach ($best_combo as $t){
                        extract($t);
                        echo ' <h2>Đã có '.$so_luong_dat.' '.$combo.' được đặt</h2>';
                    } ?>

                </div>

                <!-- Footer -->

            </div>
        </div><!-- Top Report End -->

        <?php }else{
            echo '<h1>Chào mừng '.$_SESSION['user1']['name'].' đến với trang làm việc của CinePass</h1>';
        } ?>
    </div><!-- Top Report Wrap End -->

</div><!-- Content Body End -->
<script>
    function updateClock() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Thêm số 0 đằng trước nếu giờ, phút hoặc giây chỉ có một chữ số
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Hiển thị thời gian trong thẻ h1 có id là "real-time-clock"
        document.getElementById('real-time-clock').innerText = hours + ":" + minutes + ":" + seconds;

        // Cập nhật thời gian mỗi giây
        setTimeout(updateClock, 1000);
    }

    // Bắt đầu cập nhật thời gian khi trang web được tải
    updateClock();
</script>
