<style>
    .info-2 {
        padding: 30px 30px;
        position: relative;
        padding-bottom: 50px;
        height:420px;
        margin-left: 0px;
    }
    @media (max-width:991px) {
        .info-2{
            /* margin-top: 30px; */
            padding-bottom: 80px;
            margin-right: 0;
            height: auto;
        }
    }
    .info-2 a{
        color:rgb(51, 51, 51);
    }
    .info-2 a:hover{
        text-decoration: none;
    }
    .info-2 .with-ion span:last-child{
        vertical-align: middle;
        font-weight: 400;
    }
    .info-2 .with-ion span:before {
        font-family: "Ionicons";
        color: #f05a24;
        font-size: 30px;
        vertical-align: middle;
        font-weight: bolder;
    }
    .info-2 .with-ion .phone:before{
        content: "\f4b8";
        padding-right: 20px;
    }
    .info-2 .with-ion .phone:hover::before{
        content: "\f4b9";
    }
    .info-2 .with-ion .email:before{
        content: "\f422";
        padding-right: 20px;
    }
    .info-2 .with-ion .email:hover::before{
        content: "\f423";
    }
    .info-2 .with-ion .website:before{
        content: "\f4d2";
        padding-right: 19px;
    }
    .info-2 .with-ion .website:hover::before{
        content: "\f4d3";
    }
    .info-2 .with-ion .address:before{
        content: "\f46d";
        padding-right: 19px;
    }
    .info-2 .with-ion .address:hover::before{
        content: "\f46e";
    }
    @media (min-width:992px) {
        .info-2 .btns{
            position: absolute;
            left: 0;
            right: 0;
            bottom: 80px;
        }
    }
    .info-2 .enquiry-btn, .info-2 .goto-google{
        margin: 10px 45px;
        font-size: 20px;
        border-radius: 6px;
        width: 85%;
    }
    .info-2 .enquiry-btn{
        float: left;
    }
    .info-2 .goto-google{
        background-color: #858484;
        color: white !important;
        float: right;
    }
    @media (max-width:991px){
        .info-2 .enquiry-btn, .info-2 .goto-google{
            float: none;
            margin: 10px 0;
            /* width: 100%; */
        }
    }
    .info-2 .qr-code{
        max-width: 200px;
        max-height: 250px;
        text-align: center;
        display: inline-block;
    }
    .info-2 .qr-code-small{
        max-width: 160px;
        max-height: 200px;
    }
    .info-2 .qr-code img{
        max-width:100%;
        max-height: 100%;
    }
    .info-2 .social-box{
        text-align: center;
        font-size: 30px;
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
    }
    .info-2 img.img-social{
        height:30px;
        padding: 0 15px;
    }
</style>
<div class="row info-2 solid-border">
    <div class="col-md-7 col-sm-12">
    <?php
        if($mypost!=null){
            if(!empty($mypost->phone)) echo '<p class="with-ion"><span class="phone"></span><span>'.$mypost->phone.'</span></p>';
            if(!empty($mypost->email)) echo '<p class="with-ion"><a href="mailto:#"><span class="email"></span><span>'
                .$mypost->email.'</span></a></p>';
            if(!empty($mypost->website)) echo '<p class="with-ion"><a target="_blank" href="'
                .$mypost->website.'"><span class="website"></span><span>'.removeScheme($mypost->website).'</span></a></p>';
            if(!empty($mypost->address)) echo '<p class="with-ion"><span class="address"></span><span>'.$mypost->address.'</span></p>';
        }
    ?>
    </div>
    <div class="col-md-5" style="text-align:center;">
        <div class="hidden-sm hidden-xs qr-code"><img src="<?php echo $social['wechat-qr']['url']; ?>" title=""></div>
    </div>
    <div style="margin-top: 20px;" class="row btns">
        <div class="col-md-6 col-sm-12" style="text-align:center;">
            <?php include dirname(__DIR__).'/enquiry-form.php'; ?>
        </div>
        <div class="col-md-6 col-sm-12" style="text-align:center;">
            <a class="btn goto-google" target="_blank" href="<?php echo 'https://www.google.com/maps?daddr='.$mypost->lat.','.$mypost->long; ?>">地图导航</a>   
        </div>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="hidden-md hidden-lg qr-code qr-code-small"><img src="<?php echo $social['wechat-qr']['url']; ?>" title=""></div>
    </div>
    <div class="social-box">
        <?php if($social['has-facebook']): ?>
            <a target="_blank" href="<?php echo $social["facebook"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg"></img></a>
        <?php endif; ?>
        <?php if($social['has-instagram']): ?>
            <a target="_blank" href="<?php echo $social["instagram"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg"></img></a>
        <?php endif; ?>
    </div>
</div>