<style>
    .g-section{
        background-color: transparent;
    }
    .g-wrap {
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 0 5px;
    }

    .gallery {
        width: 100%;
        font-size: 0;
        transition: transform 400ms ease, opacity 400ms ease;
    }

    .gallery a {
        width: 160px;
        height: 150px;
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        padding: 0 5px;
    }

    .gallery a img {
        max-width: 150px;
        max-height: 150px
    }

    .nav-last, .nav-next{
        position: absolute;
        top: 40%;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 99;
        border: none;
    }
    .nav-last{
        left: 0;
    }
    .nav-next {
        right: 0;
    }
    .fa-chevron-left, .fa-chevron-right{
        padding-top: 5px;
    }
</style>
<?php
    $images = get_field('t1-g1');
    if( $images ): ?>
    <section class="row g-section">
        <div class="g-wrap">
            <button class="nav-last" onclick="go(160)"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
            <div class="gallery" id='gallery'>
            <?php foreach( $images as $image ): ?>          
                <a href="<?php echo $image['url']; ?>">
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>"
                        alt="<?php echo $image['alt'];?>" title="<?php echo $image['caption']; ?>"/>
                </a>                
            <?php endforeach; ?>
            </div>
            <button class="nav-next" onclick="go(-160)"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
    </section>
<?php endif; ?>
<script>
    var imgCount= parseInt(<?php echo sizeof($images); ?>);
    
    var endOffset = jQuery('.g-wrap').width() - imgCount * 160;
    //console.log(endOffset, 'off')
    var pos=0, posTemp;
    if(endOffset>=0) {
        jQuery('.nav-last').hide();
        jQuery('.nav-next').hide();
    }
    function go(gogo) {
        pos = pos + gogo;
        if (pos > 0) pos = endOffset;
        if (pos+160 < endOffset) pos = 0;
        jQuery('.gallery').css('transform', 'translate(' + pos + 'px)')
    }
    jQuery(function () {
        var $gallery = jQuery('.gallery a').simpleLightbox({
            // 'captionPosition':'outside',
            // 'nav': false,
            'widthRatio' : 1
        });
    });
jQuery(document).ready(function($){
    var myElement = document.getElementById('gallery');
    var mc = new Hammer(myElement);

    mc.on("panstart", function(ev) {
        posTemp=pos;
        //console.log(posTemp, 's')
    });
    mc.on("panend", function(ev) {
        pos=posTemp;
        //console.log(posTemp, 'e')
    });
    mc.on("panright panleft panup pandown", function(ev) {
        posTemp = pos + ev.deltaX*2;
        if (posTemp > 0) posTemp = 0;
        if (posTemp < endOffset) posTemp = endOffset; 
        //console.log(posTemp)
        jQuery('.gallery').css('transform', 'translate(' + posTemp + 'px)')
    });
});
</script>