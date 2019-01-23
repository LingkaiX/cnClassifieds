<style>
   #slide{
	    width:100%;
        height:100%;
        margin: auto;
	}
    *{box-sizing: border-box}
    .mySlides {
        display: none;
        width: 100%;
        height:100%;
        padding-top: 60%;
        position: relative;
        vertical-align: middle;
        display: inline-block;
    }
    .slideshow-container {
        width: 100%;
        height: 100%;
        margin: auto;

    }
    /* Next & previous buttons */
    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: #f96f12;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
    }
    /* Position the "next button" to the right */
    .next {
        right: 15px;
        border-radius: 3px 0 0 3px;
    }
    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.3);
    }
    /* Caption text */
    .text {
        color: #f96f12;
        font-size: 15px;
        padding: 0px 12px;
        position: absolute;
        bottom: 5px;
        width: 100%;
        text-align: right;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 13px;
        width: 13px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }
    .active, .dot:hover {
        background-color: #717171;
    }
    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 420px) {
        .text {font-size: 11px}
    }
    .mySlides img {
        transition: all 1s;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        max-width: 100%;
        max-height: 100%;
        margin: auto;
        vertical-align: middle;
    }
</style>

<div id="slide">
    <div class="slideshow-container">
        <?php foreach($slider as $key => $img){
            echo'
                
                    <div id="'.$key.'" class="mySlides">
                        <div class="slidesBackground" style="opacity: 0.4; position: absolute; left:0; top: 0;height: 100%; width: 100%; filter: blur(10px); -webkit-filter: blur(10px); background-image: url('.$img['url'].'); background-position: center; background-repeat: no-repeat;background-size: cover;"></div>
                        <img data-fancybox="cover-imgs" data-src="'.$img['url'].'" alt="'.$img['alt'].'" id="slider-img-'.$key.'" class="lazyload" src="'.$loadingUrl.'" itemprop="image">
                        <span class="text">'.($key + 1).'/'.sizeof($slider).'<span>
                    </div>
                
            ';
        }?>
        <?php if(count($slider)>1): ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a> <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <?php endif; ?>
    </div>
</div>
<div style="display:none; text-align:center"> 
    <?php foreach($slider as $key => $img){
        echo '<span class="dot" onclick="currentSlide('.$key.')"></span>';
    }?>
</div>

<script>
    var slideIndex = 0;
    showSlides();
    var slides,dots;

    function showSlides() {
        var i;
        slides = document.getElementsByClassName("mySlides");
        dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }

    function plusSlides(position) {
        slideIndex +=position;
        if (slideIndex> slides.length) {slideIndex = 1}
        else if(slideIndex<1){slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }

    function currentSlide(index) {
        if (index> slides.length) {index = 1}
        else if(index<1){index = slides.length}
        for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[index-1].style.display = "block";  
        dots[index-1].className += " active";
    }
</script>
