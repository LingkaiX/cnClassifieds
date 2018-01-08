<div class="widget-top">
    <h6>文章推荐</h6>
    <div class="stripe-line"></div>
</div>
<div id="app">
    <div class="linkToAuliving" v-for="result in results"  v-cloak>
        <a v-bind:href="result.link" target="_blank" rel="nofollow">{{ decodeHtml(result.title.rendered) }}</a>
    </div>
</div>

<script>
jQuery(document).ready(function($){
    var app = new Vue({
        el: '#app',
        data: {
            results: []
        },
        methods: {
            decodeHtml: function (html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            },
            // encode: function(str) {
            // 	var buf = [];				
            // 	for (var i=str.length-1;i>=0;i--) {
            // 		buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
            // 	}				
            // 	return buf.join('');
            // },
            // decode: function(str) {
            // 	return str.replace(/&#(\d+);/g, function(match, dec) { return String.fromCharCode(dec);});
            // }
        },
        mounted() {
            axios.get("https://www.auliving.com.au/wp-json/wp/v2/posts?per_page=5")
            .then(response => {this.results =response.data})
            //.then(response => {this.results = JSON.parse(htmlentities.decode(JSON.stringify(response.data)))})
            
        }

    });
});

// (function(window){
// 	window.htmlentities = {
// 		/**
// 		 * Converts a string to its html characters completely.
// 		 *
// 		 * @param {String} str String with unescaped HTML characters
// 		 **/
// 		encode : function(str) {
// 			var buf = [];
			
// 			for (var i=str.length-1;i>=0;i--) {
// 				buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
// 			}
			
// 			return buf.join('');
// 		},
// 		/**
// 		 * Converts an html characterSet into its original character.
// 		 *
// 		 * @param {String} str htmlSet entities
// 		 **/
// 		decode : function(str) {
// 			return str.replace(/&#(\d+);/g, function(match, dec) {
// 				return String.fromCharCode(dec);
// 			});
// 		}
// 	};
// })(window);
</script>