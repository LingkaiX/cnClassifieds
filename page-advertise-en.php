<?php
    if(isset($_GET['var'])){
        $var = $_GET['var'];    
    }else{
        $var = 1;
    }
?>
<?php get_header(); ?>
<script>
if (document.documentElement.clientWidth < 769) { 
  document.querySelector("meta[name=viewport]").setAttribute(
        'content', 
        'width=1140, initial-scale=1.0, user-scalable=yes');
}
</script>
<style>
    body{
        min-width: 1140px;
    }
    .sect-2{
        margin-top: 250px;
        padding-left: 115px;
        margin-bottom: 70px;
    }
    .sect-3{
        padding-left: 115px;
        background-color: #F6F6F6;
        padding-bottom: 50px;
    }
    .sect-4{
        padding-left: 115px;
        background-color: rgba(23,192,169,0.7);
    }
    .background{
        padding-left: 115px;
        padding-top: 36px;
        background-color: rgba(249, 111, 18,0.9); 
        min-width:100%; 
        height:613px;
    }
    .container{
        padding-left: 30px;
    }
    @media (max-width:991px) {
        .container{
            width: 970px;
        }
    }
    .butt{
        display: inline-block; 
        width: 240px; 
        padding: 12px; 
        color: rgba(249, 111, 18,0.9); 
        text-align: center;
        background: #FFFFFF;
        border-radius: 10px;
        transition: background-color 0.3s ease;
    }
    .butt:visited {
        color: rgba(249, 111, 18,0.9);
    }
    .butt:hover {
        color: white;
        background: rgba(249, 111, 18,1);
        transition: background-color 0.3s ease;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
    }
    .butt2{
        display: inline-block; 
        width: 240px; 
        padding: 12px; 
        color: rgba(23,192,169,0.7); 
        background: white;
        text-align: center;
        transition: background-color 0.3s ease;
        border-radius: 10px; 
    }
    .butt2:visited {
        color:rgba(23,192,169,0.7);
    }
    .butt2:hover { 
        color: white;
        background: rgba(23,192,169,1);
        transition: background-color 0.3s ease;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
    }
    .list-potion {
        border: none; 
        background: rgba(249,111,18,0);
        font-size: 18px; 
        letter-spacing: 3px; 
        font-family:PingFangTC-Light; 
        color: #FFFFFF;
        transition: background-color 0.5s ease;
    }
    .list-potion:hover {
        font-size: 19px;
        font-weight: 500;
        background: rgba(249,111,18,0.5); 
        transition: background-color 0.5s ease;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
    }
    .selected {
        font-size: 19px;
        font-weight: 500;
        background: rgba(249,111,18,0.5); 
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
    }
    .scrollable{
        overflow: overlay;
        float:left; 
        width: 560px; 
        height: 680px;
        padding-right:0px; 
        padding-left: 0px; 
        margin-top: 40px;
        margin-right: 110px;
        position: relative;
    }
    .solid-border{
        border-style : Solid;
        border-color : #E7E7E7;
        border-width : 15px;
        border-radius: 15px;
    }
    /*.visibility{
        visibility: hidden;
        -webkit-transition: opacity 600ms, visibility 600ms;
        transition: opacity 600ms, visibility 600ms;
    }
    /*.img{
        visibility: visible;
        opacity: 1;
    }*/
    P{
        padding-left: 3px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    /* 
    ::-webkit-scrollbar-track-piece{
        background-color: transparent;
        -webkit-border-radius: 6px;
    }*/
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
        background-color: white;
    }
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #A9A9A9;
        border-radius: 20px;
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(169,0,0,1);
    }
    @media (min-width:769px) {
            .headsup{
                display: none;
            }
        }
</style>
<div class="headsup alert alert-info alert-dismissible" style="width: 100vw;" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong></strong>Please use a bigger screen or zoom out for a better view.
</div>
<div class="sect-1">
    <div class="background" >
        <div class="container" style="">
            <p id="1" style="font-size: 44px;font-family: PingFangTC-Semibold;margin-bottom: 0; color: #FFFFFF;">ADVERTISE</p>
            <p style="font-size: 18px;font-family: PingFangTC-Regular; margin-bottom: 0; color: #FFFFFF;">Access to highly targeted AUADS audience</p>
            <div>
                <div id="scrollable" class="scrollable">
                    <img id="img-1" alt="sample" style= "display: none;" src="<?php echo get_template_directory_uri();?>/img/assets/basic listing sample.png"></img>
                    <img id="img-2" alt="sample" style= "display: none;  width: 530px;" src="<?php echo get_template_directory_uri();?>/img/assets/Premium listing.png"></img>
                    <img id="img-3" alt="sample" style= "display: none;  width: 530px;" src="<?php echo get_template_directory_uri();?>/img/assets/Professional.png"></img>
                </div> 
                <div class="col-xs-1 "style=" width: 250px; padding-left: 0px; padding-right:0px; padding-top: 30px;" >
                    <h3 class="right" style="font-size: 36px; letter-spacing: 3px;font-family: PingFangTC-Regular; margin-bottom: 0; color: #FFFFFF;">List Options</h3></br></br>
                    <span id="line-1" style="display: none; font-size: 25px; letter-spacing: 3px;font-family:PingFangTC-Medium; color: #FFFFFF;">|</span>
                    <button id="b1" class="list-potion" onclick="Click(1)" style="margin-bottom: 15px;">BASIC LISTING</button>
                    </br><span id="line-2" style="display: none; font-size: 25px; letter-spacing: 3px;font-family:PingFangTC-Medium; color: #FFFFFF;">|</span>
                    <button id="b2" class="list-potion" onclick="Click(2)" style="margin-bottom: 15px;">PREMIUM LISTING</button>
                    </br><span id="line-3" style="display: none; font-size: 25px; letter-spacing: 3px;font-family:PingFangTC-Medium; color: #FFFFFF;">|</span>
                    <button id="b3" class="list-potion" onclick="Click(3)" style="margin-bottom: 15px;">PROFESSIONAL</button>
                    <a class="butt" target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist#<?php echo 1; ?>">Get Free Ad</a>
                </div>  
            </div>
        </div>
    </div>
</div>
<script>
    function Click(i){
        if(i==1){
            document.getElementById("line-1").style.display = "initial";
            document.getElementById("line-2").style.display = "none";
            document.getElementById("line-3").style.display = "none";
            document.getElementById("img-1").style.display = "initial";
            document.getElementById("img-2").style.display = "none";
            document.getElementById("img-3").style.display = "none";
            jQuery("#scrollable").removeClass("solid-border");
            jQuery("#b1").addClass("selected");
            jQuery("#b2").removeClass("selected");
            jQuery("#b3").removeClass("selected");
        }
        else if (i==2){
            document.getElementById("line-1").style.display = "none";
            document.getElementById("line-2").style.display = "initial";
            document.getElementById("line-3").style.display = "none";
            document.getElementById("img-1").style.display = "none";
            document.getElementById("img-2").style.display = "initial";
            document.getElementById("img-3").style.display = "none";
            jQuery("#scrollable").addClass("solid-border");
            jQuery("#b1").removeClass("selected");
            jQuery("#b2").addClass("selected");
            jQuery("#b3").removeClass("selected");
        }
        else if (i==3){
            document.getElementById("line-1").style.display = "none";
            document.getElementById("line-2").style.display = "none";
            document.getElementById("line-3").style.display = "initial";
            document.getElementById("img-1").style.display = "none";
            document.getElementById("img-2").style.display = "none";
            document.getElementById("img-3").style.display = "initial";
            jQuery("#scrollable").addClass("solid-border");
            jQuery("#b1").removeClass("selected");
            jQuery("#b2").removeClass("selected");
            jQuery("#b3").addClass("selected");
        }
    }
</script>
<?php if($var==1):?>
    <script>
        if(window.location.hash.substr(1)==1){
            document.getElementById("line-1").style.display = "initial";
            document.getElementById("img-1").style.display = "initial";
            jQuery("#scrollable").removeClass("solid-border");
            jQuery("#b1").addClass("selected");
        }
        else if(window.location.hash.substr(1)==2){
            document.getElementById("line-2").style.display = "initial";
            document.getElementById("img-2").style.display = "initial";
            jQuery("#scrollable").addClass("solid-border");
            jQuery("#b2").addClass("selected");
        }
        else if(window.location.hash.substr(1)==2){
            jQuery(".outerbox").css('height', '520px');
            jQuery(".ranks").addClass("selected");
            jQuery(".rank-to-top").addClass("pricelistsshow");
        }
        else if(window.location.hash.substr(1)==3){
            document.getElementById("line-3").style.display = "initial";
            document.getElementById("img-3").style.display = "initial";
            jQuery("#scrollable").addClass("solid-border");
            jQuery("#b3").addClass("selected");
        }
        else{
            document.getElementById("line-1").style.display = "initial";
            document.getElementById("img-1").style.display = "initial";
            jQuery("#scrollable").removeClass("solid-border");
            jQuery("#b1").addClass("selected");
        }
    </script>
    <?php elseif($var==2):?>
        <script>
            
        </script>
    <?php elseif($var==3):?>
        <script>
            
        </script>
    <?php else:?>
        <script>
            //document.getElementById("line-1").style.display = "initial";
            //document.getElementById("img-1").style.display = "initial";
            //jQuery("#scrollable").removeClass("solid-border");
            //jQuery("#b1").addClass("selected");
        </script>
<?php endif;?> 
<div class="sect-2">
    <div class="container" style=" padding-top: 50px;" >
        <p style="font-size: 24px; font-weight: 550; font-family: PingFangTC-Medium; margin-bottom: 15px; color: #A90000;">Promote your business using AUADS templates</p>
        <div class="col-md-6 col-sm-6 col-xs-12 " style="float:left; width: 340px; padding-right:0px; padding-left: 0px; padding-top: 40px;">
            <P style="font-size: 18px;  font-family: PingFangTC-Regular; margin-bottom: 20px; color: #4A4A4A;">
            AUADS provides basic templates for easy-to-use digital promotion for your business. Choose the most suitable for you and customise your own web page. 
            This is the fastest and most efficient way to make your mark on the world wide web.</P>
            <P style="font-size: 18px;  font-family: PingFangTC-Regular; margin-bottom: 20px; color: #4A4A4A;">Make your business more reputable.</P>
            <P style="font-size: 18px;  font-family: PingFangTC-Regular; margin-bottom: 20px; color: #4A4A4A;">
            Further customised options available so you have your own unique website.</P>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 "style=" width: 580px; padding-left: 90px; padding-top: 40px;" >
            <img alt="img" style ="padding-left: 20px;" src="<?php echo get_template_directory_uri();?>/img/assets/Cards en.png"></img>
        </div>
    </div>
</div>
<div id="s3" class="sect-3">
    <div class="container" style=" padding-top: 50px;">
        <p style="font-size: 36px; font-family: PingFangTC-Regular; margin-bottom: 30px; color: #A90000;">Homepage List</p>
        <P style="font-size: 18px;  font-family: PingFangTC-Regular; margin-bottom: 50px; color: #333333 ;">
        Become the recommended business on the home page to increase your exposure.</P>
        <img alt="Homepage list" style ="padding-left: 50px;" src="<?php echo get_template_directory_uri();?>/img/assets/Homepage list sample.png"></img>
    </div>
</div>
<div id="s4" class="sect-4">
    <div class="container" style=" padding-top: 50px;">
        <p style="font-size: 36px; font-family: PingFangTC-Regular; margin-bottom: 10px; color: white;">Rank to Top</p>
        <P style="font-size: 18px;  font-family: PingFangTC-Regular; margin-bottom: 45px; color: white ;">
        Maximise exposure to your targeted audience</P>
        <div class="col-md-6 col-sm-6 col-xs-12 " style="float:left; width: 340px; padding-right:0px; padding-left: 0px; padding-top: 0px;">
            <P style="font-size: 18px; letter-spacing: 0.72px; font-family: PingFangTC-Regular; margin-bottom: 30px; line-height: 30px; color: #FFFFFF;">
            AUADS can help your business to be always ranked on top within the category pages or header page.</P>
            <P style="font-size: 18px; letter-spacing: 0.72px; font-family: PingFangTC-Medium; margin-bottom: 15px; color: #FFFFFF;">What's included:</P>
            <P style="font-size: 18px; letter-spacing: 0.72px; font-family: PingFangTC-Regular; margin-bottom: 10px; color:#FFFFFF;">   &nbsp&nbsp• 	Category page top position</P>
            <P style="font-size: 18px; letter-spacing: 0.72px; font-family: PingFangTC-Regular; margin-bottom: 15px; color:#FFFFFF;">   &nbsp&nbsp• 	Multiple impressions</P>
            <a class="butt2" target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist#<?php echo 2; ?>">Start Your Ad</a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 "style=" width: 580px; padding-left: 90px; padding-top: 85px;" >
            <img alt="Rank to top" style ="padding-left: 20px;" src="<?php echo get_template_directory_uri();?>/img/assets/Rank to top sample.png"></img>
        </div>
    </div>
</div>
<?php get_footer(); ?>