<div id="hp-banner">
    <span class="top-banner-info"> 联系我们 : &nbsp <i class="fa fa-phone" aria-hidden="true"></i> 1300 638 939 或 <a href="https://auads.com.au/publish-busines" class="free-send-info">免费发布信息</a></span>
</div>
<script>
    //pasted from http://www.howtocreate.co.uk/tutorials/javascript/browserwindow
    function getScrollXY() {
        var scrOfX = 0, scrOfY = 0;
        if( typeof( window.pageYOffset ) == 'number' ) {
            //Netscape compliant 
            scrOfY = window.pageYOffset;
            scrOfX = window.pageXOffset;
        } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
            //DOM compliant
            scrOfY = document.body.scrollTop;
            scrOfX = document.body.scrollLeft;
        } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
            //IE6 standards compliant mode
            scrOfY = document.documentElement.scrollTop;
            scrOfX = document.documentElement.scrollLeft;
        }
        return scrOfY;
    }

    jQuery(document).ready(function($){
        var headerHeight=jQuery("#index-header").outerHeight();
        jQuery(window).scroll(function(){
            if(headerHeight<getScrollXY()){
                jQuery("#hp-banner").show();
            }else{
                jQuery("#hp-banner").hide();
            }
            //console.log(getScrollXY());
        });
    });
</script>