<?php include "view/search.php"?>


<!-- Main content -->
<section class="container">
    <h2 class="page-heading heading--outcontainer">Liên hệ </h2>
    <div class="contact">
        <p class="contact__title">Bạn có thắc mắc hoặc cần trợ giúp, <br><span class="contact__describe">đừng ngại ngùng và liên hệ với chúng tôi</span></p>
        <span class="contact__mail">support@amovie.com</span>
        <span class="contact__tel">support@amovie.com</span>
    </div>
</section>

<div class="contact-form-wrapper">
    <div class="container">
        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <form id='contact-form' class="form row" method='post' novalidate="" action="https://amovie.gozha.net/send.php">
                <p class="form__title">Drop us a line</p>
                <div class="col-sm-6">
                    <input type='text' placeholder='Your name' name='user-name' class="form__name">
                </div>
                <div class="col-sm-6">
                    <input type='email' placeholder='Your email' name='user-email' class="form__mail">
                </div>
                <div class="col-sm-12">
                    <textarea placeholder="Your message" name="user-message" class="form__message"></textarea>
                </div>
                <button type="submit" class='btn btn-md btn--danger'>send message</button>
            </form>
        </div>
    </div>
</div>

<section class="container">
    <div class="contact">
        <p class="contact__title">Trying to find our location? <br> <span class="contact__describe">we are here</span></p>
    </div>
</section>

<div id='location-map' class="map"></div>

<div class="clearfix"></div>

