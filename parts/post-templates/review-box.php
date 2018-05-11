<style>
    #review-box{
        padding: 30px;
    }
    #review-box ol{
        padding-left: 0;
        display: flex;
    }
    #review-box ul{
        background-color: gray;
        color: white;
        margin: 0 10px;
        font-weight: 600;
        margin-bottom: 10px;
        padding: 15px;
        flex: 1;
        border-radius: 100px;
    }
    @media (max-width: 991px){
        #review-box ul{
            width: 200px;
        }
    }
    #review-box .r-title{
        text-align:center;
    }
    #review-box .selected{
        background-color: #ff6363 !important;
    }
    #review-box .r-item{
        padding-top: 10px;
        font-size: 14px;
        margin-bottom: 20px;
      
    }
    .shadow-border{
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
    }
</style>
<div id="review-box" class="reviews shadow-border"><div v-cloak>
    <ol class="hidden-xs">
        <ul v-bind:class="{ selected: showId==index }" v-for="(item, index) in reviews" v-on:click="showId=index" class="btn">{{item.title }}</ul>
    </ol>
    <div v-for="(item, index) in reviews">
        <div class="hidden-sm hidden-md hidden-lg r-title" v-on:click="showId=index">
            <ul class="btn" v-bind:class="{ selected: showId==index }">{{item.title }}</ul>
        </div>
        <div class="r-item"  v-show="showId==index" v-html="item.content"></div>
    </div>
</div></div>

<script>
    var reviewBox
    jQuery(document).ready(function($){
        var reviewBox = new Vue({
            el: '#review-box',
            data: {
                reviews: <?php echo json_encode($reviews); ?>,
                showId: 0
            }
        })
    })
</script>