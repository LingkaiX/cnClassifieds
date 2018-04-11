<?php get_header(); ?>
<style>
.sec-1{
  background-image: url(wp-content/themes/cnclassifieds/img/page-marketing/Symbol.svg);
  background-position: bottom;
  background-size: contain;
  background-repeat: no-repeat;
  padding: 60px 0 180px;
  min-height: 30vw;
}
.sec-1 .container{
  padding-left: 32px;
}
@media (min-width:1200px){
  .sec-1{
    padding: 60px 0 15vw;
  }
}
@media (min-width:992px){
}
@media (max-width:480px){
  .sec-1{
    padding: 60px 0 120px;
  }
  .sec-1 .container{
    padding-left: 15px;
  }
}
.sec-2{
  padding: 60px 0 90px;
}
.s-man{
  text-align: center;
}
.s-man img{
    width: 70%;
    max-width: 360px;
}
.s-man p{
    margin-top: 24px;
    color: #FE6466;
    font-size: 24px;
    font-weight: 600;
}
.why p:before{
  content:"\f383";
  color: #25BEA8;
  font-weight: 600;
  font-size: 28px;
  padding-right: 16px;
  position: relative;
  bottom: -4px;
}
.sec-3{
  background:#F6F6F6;
  text-align: center;
  padding: 64px 0;
}
.sec-3 img{
  width:120px;
  min-height: 160px;
}
.sec-3 p{
  max-width:320px;
  margin: 0 auto;
}
.sec-4{
  background:#C1F2DD;
  padding: 64px 0;
}
.sec-5{
  background:#FE6466;
  padding: 48px 0;
  text-align: center;
}
.sec-5 h3{
    color: white;
    padding-bottom: 24px;
}
.sec-5 a{
  width: 260px;
  background-color: white;
  display: inline-block;
  padding: 10px;
  color: black;
  border-radius: 10px;
}
@media (min-width:768px){
  .sec-5 h3{
    font-size: 32px;
  }
  .sec-5 a{
    width: 360px;
  }
}
#show-box{
  position: relative;
  height:600px;
}
#show-1, #show-2{
  position:absolute;
  top:0;
  left:50%;
  width:448px;
  opacity: 0;
  transition: opacity 1s;
  z-index:1;
  transform: translateX(-50%);
}
.show-it{
  opacity: 1 !important;
  z-index:2 !important;
}
@media (max-width:500px){
  #show-box{
    height:300px;
  }
  #show-1, #show-2{
    width:224px;
  }
}
</style>
<div class="sec-1">
  <div class="container" style="">
    <p style="font-size: 42px;font-weight: 800;font-family: Arial;margin-bottom: 0;">Add 
      <span style="font-weight: 800;font-family: Arial;color: #FE6466;">/</span></p>
    <p style="font-size: 42px;font-weight: 800;font-family: Arial;margin-bottom: 0;">Manage</p>
    <p style="font-size: 42px; font-family: Arial; ">Your Business</p>
    <p style="max-width: 420px;">Advertising your business on AUADS. Attract Chinese from around Australia. Ensure success for your Business. To claim your free ad simply click through and Fill in your business details.</p>
    <a style="display: inline-block; width: 240px; padding: 12px; background: #FE6466; color: white; text-align: center;
      border-radius: 5px; margin-top: 24px; " href="https://auads.com.au/publish-business-en">Get Free Ad</a>
  </div>
  <div class="sec-bg"></div>
</div>
<div class="sec-2"><div class="container"><div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12 s-man">
    <img src="<?php echo get_template_directory_uri();?>/img/page-marketing/strong-man.svg"></img>
    <p style="margin-top: 24px; color: #FE6466; font-size: 24px;
    font-weight: 600;">And......we still working on it</p>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12 why">
    <h3 style="font-size: 36px;font-weight: 800;font-family: Arial;margin-bottom: 32px;">Why Choose AUADS?</h3>
    <p>There are 5000+ organizers joined AUADS from all over Australia.</p>
    <p>Reach to thousands of users per day.</p>
    <p>Contact our Account Management and Content team whenever you need help.</p>
  </div>
</div></div></div>
<div class="sec-3"><div class="container">
  <h3 style="font-size: 36px;font-weight: 800;font-family: Arial;margin-bottom: 12px;">What You can get from us?</h3>
  <hr style="border: 3px solid #FF6363; width: 80px;">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 ">
      <img src="<?php echo get_template_directory_uri();?>/img/page-marketing/membership.svg"></img>
      <p style="font-size: 32px;font-weight: 800;font-family: Arial;color: #FE6466; margin-bottom: 12px;">FREE</p>
      <p style="font-size: 36px;margin-bottom: 12px;">Membership</p>
      <p>Join our free Membership, get promotional information and consultancy.</p>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 ">
      <img src="<?php echo get_template_directory_uri();?>/img/page-marketing/promotion.svg"></img>
      <p style="font-size: 32px;font-weight: 800;font-family: Arial;color: #FE6466; margin-bottom: 12px;">FREE</p>
      <p style="font-size: 36px;margin-bottom: 12px;">Promotion</p>
      <p>Enjoy free exposure through our online & offline campaigns and reach your customers with our marketing tools.</p>
    </div>
  </div>
</div></div>
<div class="sec-4"><div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12" id="show-box">
      <img id="show-1" class="show-it" src="<?php echo get_template_directory_uri();?>/img/page-marketing/Batman.jpg"></img>
      <img id="show-2" src="<?php echo get_template_directory_uri();?>/img/page-marketing/Spring.jpg"></img>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12 ">
      <h3 style="font-size: 36px;font-weight: 800;font-family: Arial;margin-bottom: 32px;">Get a professional page with more relevant</h3>
      <p style="color:#FD6568;margin-bottom: 16px;">Spending too much time maintaining your own website?</p>
      <p>AUADS provides easy-to-use digital promotion for your business. Choose the one most suitable for you and customise your own web page. This is the fastest and most efficient way to make your mark on the world wide web.</p>
      <p>Make your business more reputable.</p>
      <p>Further customised options available so you have your own unique website.</p>
    </div>
  </div>
</div></div>
<script>
jQuery(document).ready(function($){
  $('#show-box').click(function(){
    if($('#show-1').hasClass('show-it')){
      $('#show-1').removeClass('show-it')
      $('#show-2').addClass('show-it')
    }else{
      $('#show-2').removeClass('show-it')
      $('#show-1').addClass('show-it')
    }
  });
});
</script>
<div class="sec-5"><div class="container">
<h3>CALL US ON 1300 868 956</h3>
<a href="https://auads.com.au/contact-us-en">Got questions? <br class="hidden-sm hidden-md hidden-lg">We are here to help.</a>
</div></div>
<?php get_footer(); ?>