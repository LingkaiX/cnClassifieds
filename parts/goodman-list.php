<style>
    .goodman-list{
        padding: 30px 0;
    }
    .goodman-title h3{
        margin-top: 30px;
        margin-bottom: 0;
        font-weight: 600;
    }
    .goodman-title span{
        width: 110px;
        display: inline-block;
        border: 1px solid #f96f12;
    }
    .gm-item{
        box-shadow: 1px 1px 10px lightgrey;
        border-radius: 0 0 5px 5px;
        background-color: white;
    }
    .gm-img{
        position: relative;
        padding-top: 75%;
        margin-bottom: 20px;
    }
    .gm-img img {
        position: absolute;
        top: 0;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .gm-img .decoration-left{
        position: absolute;
        height: 40px;
        top: 5%;
        left: -17px;
    }
    .gm-img .decoration-left img{
        position: absolute;
        top: 0;
        left: 0;
        width: auto !important;
        height: 40px;
    }
    .gm-img .decoration-left span{
        position: absolute;
        top: 8px;
        left: 20px;
        color: white;
        width: 50px;
        display: inline-block;
    }
    .gm-img .decoration-bottom{
        position: absolute;
        top: unset;
        right: 10%;
        width: 40px !important;
        height: auto;
        bottom: -32px;
    }
    .gm-item h5{
        font-size: 18px;
        color: #5F6D74;
        letter-spacing: 0;
        line-height: 24px;
        padding-left: 20px;
        margin-top: 30px;
        margin-bottom: 0px;
        font-weight: 600;
    }
    .gm-text{
        padding: 20px;
        font-size: 16px;
        color: #5F6D74;
        letter-spacing: 0;
        text-align: justify;
    }
</style>
<?php
    $gm_query = get_posts(array( 'post_type' => 'goodman', "posts_per_page" => 6, "orderby" => "rand"));
    //get_posts(array( 'post_type' => 'goodman', 'post_status' => 'publish', "posts_per_page" => 3, "orderby" => "rand"));
    if($gm_query!=null){
        echo '<div class="center-content goodman-title"><h3>商家推荐</h3><span></span></div>';
        echo '<div class="goodman-list owl-carousel owl-theme" id="goodmanlist">';
        foreach($gm_query as $key => $post){
            echo '<div style="padding:10px;"><div class="gm-item" id="gm-item-'.$key.'">';
                echo '<div class="gm-img">';
                    echo get_the_post_thumbnail( $post->ID, 'full', null );
                    echo '<div class="decoration-left"><img alt="img" src="'.get_template_directory_uri().'/img/decoration-left.svg"><span>'.get_field('cate').'</span></div>';
                    echo '<img class="decoration-bottom" alt="img" src="'.get_template_directory_uri().'/img/reward.svg">';
                echo '</div>';
                if(get_field('has-link')){
                    echo '<a target="_blank" rel="noopener" href="'.get_field('link').'"><h5>'.$post->post_title.'</h5></a>';
                }else{ 
                    echo '<h5>'.$post->post_title.'</h5>';
                }
                echo '<div class="gm-text">'. $post->post_content . "</div>";
            echo '</div></div>';
        }
        echo '</div>';
    }
    wp_reset_postdata();
?>
<script>
    var owlGoodman
    jQuery(document).ready(function($){
        owlGoodman=jQuery('#goodmanlist');
        owlGoodman.owlCarousel({
            loop:true,
            margin:40,
            //dots:false,
            center:false,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:2
                },
                992:{
                    items:3
                }
            }
        })
        setInterval(function(){ 
            owlGoodman.trigger('next.owl.carousel');
                }, 5000);    });
</script>