
<body>
<!-- Form without bootstrap -->
<div class="auth-wrapper" >
    <div class="auth-container" style="margin-top: 100px">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Đổi mật khẩu
                </h2>
                <div class="auth-external-container">

                </div>
                <form class="login-form" method="post" action="index.php?act=doimk">
                    <input type="text" class="auth-form-input" placeholder="Nhập mật khẩu cũ" name="pass" >
                    <input type="text" class="auth-form-input" placeholder="Nhập mật khẩu mới" name="passmoi" >
                    <div class="input-icon">
                        <input type="password" class="auth-form-input" placeholder="Nhập lại mật khẩu" name="passmoi1" >
                        <i class="fa fa-eye show-password"></i>
                    </div>
                    <div class="footer-action">
                    <input type="hidden" class="auth-form-input" placeholder="Name" name="id" value="<?=$id?>">

                    <input type="submit" value="Gửi" class="auth-submit" name="capnhat">

                        <a href="index.php?act=dangnhap" class="auth-btn-direct">dangnhap</a>
                    </div>
                    <?php if(isset($error)&&$error !=""){
                echo '<p  style="color: red; "
                > '.$error.' </p>';
            } ?>
            </div>
        </div>
        <div class="auth-action-right">
            <div class="auth-image">
                <img src="login-ui2/login-ui2/assets/Rạp chiếu phim Xanh dương  Áp phích Hội thảo.png" alt="login">
            </div>
        </div>
    </div>
</div>
</body>

