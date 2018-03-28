<div class="widget-top">
    <h6>文章推荐</h6>
</div>
<div id="app-article-list">
    <div class="linkToAuliving" v-for="result in results"  v-cloak>
        <a v-bind:href="result.link" target="_blank" rel="nofollow">{{ decodeHtml(result.title.rendered) }}</a>
        <hr>
    </div>
</div>
<div class="widget-bottom">
    <a href="https://www.auliving.com.au/">更多精彩&nbsp;&nbsp;<i class="ion-ios-arrow-forward"></i></a>
</div>
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