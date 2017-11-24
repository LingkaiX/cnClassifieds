<div id="hp-banner" style="position:fixed; top:0; left:0; right:0; min-height:50px; background-color:dimgray; display:none;z-index:999; text-align:center;">
    <span > 联系我们 <i class="fa fa-phone" aria-hidden="true"></i> 1300 638 939 或 <a href="https://auads.com.au/publish-busines">免费发布信息</a></span>
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