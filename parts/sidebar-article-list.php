<div class="widget-top">
    <h6>文章推荐</h6>
</div>
<?php
    $art_query = get_posts(array( 'post_type' => 'auart', 'posts_per_page' => 5,'category_name'=>$cate_slug));
    $artID=array();
    foreach($art_query as $key => $post){
        $artID[$key]=$post->ID;
    }
    wp_reset_postdata();
    if(sizeof($art_query)<5){
        $art_query2 = get_posts(array('post__not_in' => $artID, 'post_type' => 'auart', 'posts_per_page' => (5-sizeof($art_query)),'orderby' => 'rand'));
    }?>
    <?php if((sizeof($art_query)+sizeof($art_query2))>=5):?>
        <div id="app-article-list" class="linkToAuliving">
            <?php if($art_query!=null){
                foreach($art_query as $key => $post){
                    echo '<a target="_blank" rel="noopener" href="'.get_post_permalink($post->ID).'">'.$post->post_title.'</a>';
                    echo '<hr>';
                }
                wp_reset_postdata();
            }
            if($art_query2!=null){
                foreach($art_query2 as $key => $post){
                    echo '<a target="_blank" rel="noopener" href="'.get_post_permalink($post->ID).'">'.$post->post_title.'</a>';
                    echo '<hr>';
                }
                wp_reset_postdata();
            }
        ?>
        </div>
        <div class="widget-bottom">
            <a href="<?php echo getBaseUrl()?>#arts-sec">更多精彩&nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i></a>
        </div>
    <?php else:?>
        <div id="app-article-list">
        <div class="linkToAuliving" v-for="result in results"  v-cloak>
            <a v-bind:href="result.link" target="_blank" rel="noopener nofollow">{{ decodeHtml(result.title.rendered) }}</a>
            <hr>
        </div>
        </div>
        <div class="widget-bottom">
            <a href="https://www.auliving.com.au/">更多精彩&nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i></a>
        </div>
        <?php endif;?>
<script>
jQuery(document).ready(function($){
    var appArticleList = new Vue({
        el: '#app-article-list',
        data: {
            results: []
        },
        methods: {
            decodeHtml: function (html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            },
        },
        mounted() {
            axios.get("https://www.auliving.com.au/wp-json/wp/v2/posts?per_page=5").then(response => {this.results =response.data});          
        }
    });
});
</script>