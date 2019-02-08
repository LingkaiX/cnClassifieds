<style>
.aa-item{
    height: 140px;
}
.aa-img{
    position: absolute;
    left: 20px;
    top: 20px;
}
.aa-img img{
    height: 100px;
    width: 140px;
    object-fit: cover;
}
.aa-title{
    position: absolute;
    left: 180px;
    top: 20px;
    right:15px;
    font-size: 15px;
    font-weight: 600;
}
.aa-link{
    position: absolute;
    left: 180px;
    bottom: 20px;
    padding: 3px 10px 1px;
    border: 1px solid #17C0A9;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
    color: #17C0A9;
}
.aa-link:hover{
    background: #17C0A9;
    color: white;
}
@media (max-width:480px){
    .aa-img img{
        height: 80px;
        width: 112px;
        object-fit: cover;
    }
    .aa-item{
        height: 120px;
    }
    .aa-title{
        top: 15px;
        left: 152px;
    }
    .aa-link{
        left: 152px;
        bottom: 15px;
    }
}
@media (min-width:992px){
    #aa-item-0, #aa-item-1, #aa-item-2{
        border-bottom: 2px solid #ECECEC;
    }
    #aa-item-0, #aa-item-1, #aa-item-3, #aa-item-4{
        border-right: 2px solid #ECECEC;
    }
}
.auart-section h3{
    font-weight: 600;
    color: #333333;
    letter-spacing: 0.92px;
}
.auart-section hr{
    border: 1px solid #f96f12;
    width: 120px;
}
.auart-title{
    margin-top: 60px;
}
.auart-more{
    color: #17C0A9;
    font-weight: 600;
    padding-left:5px;
    margin-top:10px;
    margin-bottom: 40px;
    display: inline-block;
}
@media(max-width:767px){
    .auart-title{
        margin-top: 40px;
    }
    .auart-section h3{
        font-size: 18px;
        letter-spacing: 0.55px;
    }
    .auart-section hr{
        width: 80px;
    }
}
</style>
<?php
    $gm_query = get_posts(array( 'post_type' => 'auart', "posts_per_page" => -1));
    if($gm_query!=null){
        echo '<div id="arts-sec" class="center-content auart-title"><h3>热门文章</h3><span></span></div><hr>';
        echo '<div class="row" id="auartlist">';
        foreach($gm_query as $key => $post){
            echo '<div class="col-md-4 col-sm-6 col-xs-12 aa-item" id="aa-item-'.$key.'">';
                echo '<div class="aa-img">';
                    echo get_the_post_thumbnail( $post->ID, 'thumbnail', null );
                echo '</div>';
                echo '<p class="aa-title"><a target="_blank" rel="noopener" href="'.get_post_permalink($post->ID).'">'.$post->post_title.'</a></p>';
                echo '<a class="aa-link" target="_blank" rel="noopener" href="'.get_post_permalink($post->ID).'">阅读</a>';
            echo '</div>';
        }
        echo '</div>';
        if(sizeof($gm_query)>6){
            echo '<div class="center-content"><a id="more_posts" class="auart-more center-content" onclick="aaLoadMore(6)" rel="noopener">更多文章 ...</a></div>';
        }
    }
    wp_reset_postdata();
?>



<script>
    showAaItem();
    var aaItemIndex=6, aaItem;
    function showAaItem() {
        aaItem = document.getElementsByClassName("aa-item");
        for (i = 6; i < aaItem.length; i++) {
            aaItem[i].style.display = "none";
        }
    }
    function aaLoadMore(num) {
        aaItemIndex += num;
        if (aaItemIndex > aaItem.length) {
            aaItemIndex = aaItem.length;
            document.getElementById("more_posts").innerHTML = "没有更多了";
        }
        for (i = 6; i < aaItemIndex; i++) {
            aaItem[i].style.display = "block";  
        }
    }
</script>