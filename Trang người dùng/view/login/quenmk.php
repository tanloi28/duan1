
<!-- Form without bootstrap -->
<div class="auth-wrapper">
    <div class="auth-container" style="margin-top: 100px">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Quên mật khẩu
                </h2>
                <div class="auth-external-container">
                </div>
                <form class="login-form" method="post" action="index.php?act=quenmk">
                    <input type="email" class="auth-form-input" placeholder="Nhập email đã đăng ký để nhận mật khẩu" name="email">
                    <div class="footer-action">
                        <input type="submit" value="Gửi" class="auth-submit" name="guiemail">
                        <input type="reset" value="Nhập Lại" class="auth-submit">
                        <a href="index.php?act=dangnhap" class="auth-btn-direct">Đăng nhập</a>
                    </div>
                    <?php if (isset($sendMailMess) && $sendMailMess != '') {
                        echo $sendMailMess;
                    } ?>
                    <?php if(isset($error)&&$error !=""){
                echo '<p  style="color: red; "
                > '.$error.' </p>';
            } ?>
                </form>
            </div>
        </div>
        <div class="auth-action-right">
            <div class="auth-image">
                <img src="login-ui2/login-ui2/assets/Rạp chiếu phim Xanh dương  Áp phích Hội thảo.png" alt="login">
            </div>
        </div>
    </div>
</div>

