<?php 
    extract($loadtk);
 ?>
<body>
<!-- Form without bootstrap -->
<div class="auth-wrapper" >
    <div class="auth-container" style="margin-top: 100px">
        <div class="auth-action-left">
            <div class="auth-form-outer">
                <h2 class="auth-form-title">
                    Sửa tài khoản

                </h2>
                <div class="auth-external-container">

                </div>
                <form class="login-form" method="post" action="index.php?act=updatetk">
                    <input type="text" class="auth-form-input" placeholder="User" name="user" value="<?=$user?>">
                    <input type="text" class="auth-form-input" placeholder="Phone" name="phone" value="<?=$phone?>">
                    <input type="email" class="auth-form-input" placeholder="Email" name="email" value="<?=$email?>">
                    <input type="text" class="auth-form-input" placeholder="Địa chỉ" name="dia_chi" value="<?=$dia_chi?>">
                    <div class="footer-action">
                        <input type="hidden" class="auth-form-input" placeholder="Name" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập Nhật" class="auth-submit" name="capnhat">
                    </div>
                </form>
                <?php if(isset($thongbao)&&$thongbao !=""){
                echo '<p  style="color: red; "
                > '.$thongbao.' </p>';
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