<?php // NEND DATA: $images ?>
<style>
    .g-wrap {
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 0;
    }

    .gallery {
        width: 100%;
    }

    .gallery a {
        width: 200px;
        height: 200px;
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        padding: 0;
    }

    .gallery a img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .nav-last, .nav-next{
        position: absolute;
        top: 35%;
        background-color: rgba(255, 255, 255, 1);
        z-index: 99;
        border: none;
        font-size: 30px;
        opacity: 0.7;
    }
    .nav-last{
        left: 15px;
        padding-right: 15px;
        padding-top: 5px;
        padding-left: 10px;
        padding-bottom: 5px;
    }
    .nav-next {
        right: 15px;
        padding-left: 15px;
        padding-top: 5px;
        padding-right: 10px;
        padding-bottom: 5px;
    }
    .ion-chevron-left, .ion-chevron-right{
        padding-top: 5px;
    }
    </style>
    <div class="g-wrap">
        <button class="nav-last" onclick="gLast()"><i class="ionicon ion-chevron-left" aria-hidden="true"></i></button>
        <div class="gallery owl-carousel owl-theme" id='gallery'itemscope itemtype="http://schema.org/LocalBusiness">
        <?php foreach( $images as $image ): ?>          
            <a href="<?php echo $image['url']; ?>" data-fancybox="JGJFGJHFJ" class="item" itemprop="image">
                <img itemprop="image" data-src="<?php echo $image['sizes']['large']; ?>"
                    alt="<?php echo $image['alt'];?>" title="<?php echo $image['caption']; ?>" 
                    class="lazyload" src="<?php echo $loadingUrl; ?>"/>
            </a>                
        <?php endforeach; ?>
        </div>
        <button class="nav-next" onclick="gNext()"><i class="ionicon ion-chevron-right" aria-hidden="true"></i></button>
    </div>
    <script>
        var owlGallery;
        function gLast(){
            owlGallery.trigger('prev.owl.carousel');
        }
        function gNext(){
            owlGallery.trigger('next.owl.carousel');
        }
        jQuery(document).ready(function($){

            owlGallery=jQuery('#gallery');
            owlGallery.owlCarousel({
                loop:true,
                margin:10,
                dots:false,
                center:false,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    992:{
                        items:5
                    },
                    1200:{
                        items:6
                    }
                }
            })
        });
    </script>