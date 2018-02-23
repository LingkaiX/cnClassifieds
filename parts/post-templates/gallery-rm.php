<style>
    .g-wrap {
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 0;
    }

    .gallery {
        width: 100%;
        font-size: 0;
        transition: transform 400ms ease, opacity 400ms ease;
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
        top: 40%;
        background-color: rgba(255, 255, 255, 1);
        z-index: 99;
        border: none;
        font-size: 30px;
        opacity: 0.7;
    }
    .nav-last{
        left: 15px;
        padding-right: 10px;
        padding-top: 4px;
        padding-left: 7px;
    }
    .nav-next {
        right: 15px;
        padding-left: 10px;
        padding-top: 4px;
        padding-right: 7px;
    }
    .ion-chevron-left, .ion-chevron-right{
        padding-top: 5px;
    }
</style>
<?php // NEND DATA: $images ?>
<div class="g-wrap">
    <button class="nav-last" onclick="gLast()"><i class="ionicon ion-chevron-left" aria-hidden="true"></i></button>
    <div class="gallery owl-carousel owl-theme" id='gallery'>
    <?php foreach( $images as $image ): ?>          
        <a href="<?php echo $image['url']; ?>" data-fancybox class="item">
            <img data-src="<?php echo $image['sizes']['large']; ?>"
                alt="<?php echo $image['alt'];?>" title="<?php echo $image['caption']; ?>" 
                class="lazyload" src="<?php echo $loadingUrl; ?>"/>
        </a>                
    <?php endforeach; ?>
    </div>
    <button class="nav-next" onclick="gNext()"><i class="ionicon ion-chevron-right" aria-hidden="true"></i></button>
</div>

<script>
//     var imgCount= parseInt(<?php echo sizeof($images); ?>);
    
//     var endOffset = jQuery('.g-wrap').width() - imgCount * 210;
//     //console.log(endOffset, 'off')
//     var pos=0, posTemp;
//     if(endOffset>=0) {
//         jQuery('.nav-last').hide();
//         jQuery('.nav-next').hide();
//     }
//     function go(gogo) {
//         pos = pos + gogo;
//         if (pos > 0) pos = endOffset;
//         if (pos+210 < endOffset) pos = 0;
//         jQuery('.gallery').css('transform', 'translate(' + pos + 'px)')
//     }
//     // jQuery(function () {
//     //     var $gallery = jQuery('.gallery a').simpleLightbox({
//     //         // 'captionPosition':'outside',
//     //         // 'nav': false,
//     //         'widthRatio' : 1
//     //     });
//     // });
var owl;
function gLast(){
    owl.trigger('prev.owl.carousel');
}
function gNext(){
    owl.trigger('next.owl.carousel');
}
jQuery(document).ready(function($){
//     var myElement = document.getElementById('gallery');
//     var mc = new Hammer(myElement);

//     mc.on("panstart", function(ev) {
//         posTemp=pos;
//         //console.log(posTemp, 's')
//     });
//     mc.on("panend", function(ev) {
//         pos=posTemp;
//         //console.log(posTemp, 'e')
//     });
//     mc.on("panright panleft panup pandown", function(ev) {
//         posTemp = pos + ev.deltaX*2;
//         if (posTemp > 0) posTemp = 0;
//         if (posTemp < endOffset) posTemp = endOffset; 
//         //console.log(posTemp)
//         jQuery('.gallery').css('transform', 'translate(' + posTemp + 'px)')
//     });
    owl=jQuery('#gallery');
    owl.owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
});
</script>