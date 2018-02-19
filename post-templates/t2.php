<?php 
/*
Template Name: Template 2
Template Post Type: post 
*/
get_header();?>
<link href='<?php echo get_template_directory_uri();?>/css/simplelightbox.css' rel='stylesheet'/>
<style>
    section, article{
        margin-bottom: 25px
    }
    /*company name*/
    #t2 .company-name-t2 h3{
        margin:30px 10px 20px auto;
        display: inline-block;
    }
    #t2 .company-name-t2 h4 {
        display: inline-block;
    }
    #t2 .company-name-t2:after {
        display: block;
        height: 2px;
        background-color: #F26522;
        content:" ";
        width: 100px;
        margin: 0 auto;
        margin: 0px 0px 15px 15px;
    }
    /*company contact information*/
    .color-block {
        background-color: rgba(242, 101, 34, 0.76);
        height: 50px;
    }
    .company-contact-info {
        background-color: #fff;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
        word-break: break-all;
    }
    .company-logo {
        margin: -25px auto 5px 20px;
        height: 50px;
        max-width: 70%;               
    }
    .company-logo img{
        max-width:100%;
        max-height:50px;
    }
    .contact-icon {
        margin: 6px 10px; 
        color: #F26522;
        font-size: 18px;
    }
    .contact-info {
        font-size: 105%;
    }
    .contact-information-part {
        padding: 0px 15px;
    }
    @media (max-width: 767px) {
        #t2 .company-introduction, #t2 .company-map{
            margin-left: 0;
            margin-right: 0;
        }
        #t2 .company-name-t2 h3 {
            display: block;
            margin:30px 10px 5px auto;
        }
        #t2 .company-name-t2 h4 {
            display: block;
            margin-top: 5px;
        }
        .contact-information-part {
            padding: 5px 15px 10px 15px;
        }
    }

    /* Style the buttons that are used to open and close the accordion t2-panel */
    article p{
        display:none;
    }
    article .t2-panel p{
        display:block;
    }
    .acc-wrap{
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
        margin: 10px 0;
    }
    .company-accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }
    .active, .company-accordion:hover {
        background-color: #ccc;
    }
    .company-accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }
    .active:after {
        content: "\2212";
    }
    .t2-panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
    /* Position the image container (needed to position the left and right arrows) */
    /* DEFAULT: Extra small devices (phones, less than 768px) */
    .company-photoslide{
        width:100%;
        display: inline-block;
        position: relative;
    }
    .company-contact-info{
        width:100%;
        display: inline-block;
    }
    .contact-information-part {
        padding: 0px 15px;
    }
    /* Small devices (tablets, 768px and up) */
    @media (min-width: 768px) { 
        .company-photoslide{
            width:450px;
            height:450px;
            margin-left: -15px;
            margin-right: 10px;
        }
        .company-contact-info{
            width:290px;
            min-height:450px;
            margin-left: 0px;
            margin-right: -15px;
            float: right;
        }
        }
    /* Medium devices (desktops, 992px and up) */
    @media (min-width: 992px) { 
        .company-photoslide{
            width: 600px;
            height: 600px;
        }
        .company-contact-info{
            width: 360px;
            min-height: 600px;
        }
        .contact-information-part {
            padding: 0px 20px;
        }
        }
    /* Large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) { 
        .company-photoslide{
            width:760px;
            height: 760px;
        }
        .company-contact-info{
            width:400px;
            min-height: 760px;
        }
        }
    /* gallery section */
    .gallery{
        position: relative;
        width: 100%;
        padding-top: 100%;
    }
    .a-wrap{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
        transition: all 0.5s ease-in-out;
        text-align: center;
    }
    .a-wrap-show{
        opacity: 1;
        z-index: 3;
        background-color: rgba(255,255,255, 0.7)            }
    .a-wrap img{
        max-width: 98%;
        max-height: 98%;
    }
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: #2c2c2c;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        z-index: 10;
        background: #fff;
        opacity: 0.3;
    }
    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        opacity: 0.7;
    }
</style>
<main class="container" id="t2">
<?php while (have_posts()) : the_post(); ?>
    <div class="company-name-t2">
        <?php
            the_title( '<h3><strong>', '</strong></h3>' );
            $enTitle=get_post_meta($post->ID,'title-en',true);
            if($enTitle) echo '<h4><strong>'.$enTitle.'</strong></h4>';
        ?>
    </div>
    <section class="company-photoslide">
        <?php
            $images = get_field('g1');
            if( $images ): ?>
                <div class="gallery" id='gallery'>
                <?php foreach( $images as $key => $image ): ?>          
                    <a href="<?php echo $image['url']; ?>" class="<?php echo $key==0? 'a-wrap a-wrap-show':'a-wrap'; ?> " id="g-item-<?php echo $key ?>">
                    <span class="va-helper"></span>
                        <img src="<?php echo $image['url']; ?>"
                            alt="<?php echo $image['alt'];?>" title="<?php echo $image['caption']; ?>"/>
                    </a>                
                <?php endforeach; ?>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <script>
                var gCount=<?php echo sizeof($images); ?>, gPointer=0;
                function plusSlides(one){
                    console.log('#g-item-'+gPointer);
                    jQuery('#g-item-'+gPointer).removeClass('a-wrap-show');
                    gPointer +=one;
                    if(gPointer>gCount) gPointer = 0;
                    if(gPointer<0) gPointer = gCount;
                    jQuery('#g-item-'+gPointer).addClass('a-wrap-show');
                }
                jQuery(document).ready(function($){
                    var gallery = jQuery('.gallery a').simpleLightbox({
                        'widthRatio' : 1
                    });
                }); 
            </script>
        <?php endif; ?>
    </section>

    <section class="company-contact-info">
        <div class="color-block"></div>
        <div class="company-logo">
            <?php echo get_the_post_thumbnail( null, 'full', ['alt title' => 'Logo'] );?>
        </div>

        <div class="contact-information-part">
        <?php
            $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
            if($mypost!=null){
                if(!empty($mypost->phone)) echo '<p ><i class="ionicon ion-ios-telephone contact-icon" aria-hidden="true"></i><span>'.$mypost->phone.'</span></p>';
                if(!empty($mypost->email)) echo '<p ><i class="ionicon ion-ios-email-outline contact-icon" aria-hidden="true"></i><a href="mailto:#"><span>'
                    .$mypost->email.'</span></a></p>';
                if(!empty($mypost->website)) echo '<p ><i class="ionicon ion-ios-world-outline contact-icon" aria-hidden="true"></i><a target="_blank" href="'
                    .$mypost->website.'"><span>'.removeScheme($mypost->website).'</span></a></p>';
                if(!empty($mypost->address)) echo '<p ><i class="ionicon ion-ios-navigate-outline contact-icon" aria-hidden="true"></i><span>'.$mypost->address
                    .'</span><a target="_blank" style="margin-left:10px;" href="https://www.google.com/maps?daddr='
                    .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></p>';
            }
        ?>
        </div>
    </section>

    <section class="row company-map">
        <div id="map" style="height:200px; width:100%;"></div>
        <script>
            /*google map*/
            jQuery(document).ready(function($){
                var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                var marker = new google.maps.Marker({ position: uluru, map: map });
            }); 
        </script>
    </section>

    <article class="row company-introduction">
        <?php the_content(); ?>
    </article>
<?php endwhile; ?>
<?php //include dirname(__DIR__).'/parts/disqus.php'; ?>
</main>
<?php
    //get_sidebar();
    get_footer();
?>
<script src="<?php echo get_template_directory_uri();?>/js/simple-lightbox.js"></script>
<script>
    /* section about congpany*/
    var acc = document.getElementsByClassName("company-accordion");
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = jQuery(this).parent().children(".t2-panel"); 
            console.log(panel.children().text())
            console.log(panel.css('max-height')=='0px')        
            //var panel = this.nextElementSibling;
            if (panel.css('max-height')=='0px'){                
                panel.css('max-height', panel.prop('scrollHeight'));
            } else {
                panel.css('max-height', '0');
            } 
        });
    }
</script>