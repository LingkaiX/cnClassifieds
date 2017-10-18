<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php include 'parts/cate-list.php';?>
		</div>
		<main class="col-md-7 col-sm-9 col-xs-12"> <!-- listing box-->
			<?php
				//print_r($wp_query); 
				if ( have_posts() ) : 
					while ( have_posts() ) : 
						the_post();
						include 'parts/listed-item.php';
					endwhile;
				endif; 
			?>
		</main>
		<div class="col-md-3 col-sm-3 col-xs-12 cate-ad-container">
			<div class="widget-top">
				<h6>文章推荐</h6>
				<div class="stripe-line"></div>
			</div>
			<div id="app">

				<div class="linkToAuliving" v-for="result in results"  v-cloak>
					<a v-bind:href="result.link" target="_blank" rel="nofollow">{{ decodeHtml(result.title.rendered) }}</a>
				</div>
			</div>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- cate page ad -->
			<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-9173929910659094"
				data-ad-slot="8848782100"
				data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<div class="clearfix"></div>
		<div class="listing-pagination col-md-12 col-xs-12">
			<?php 
				the_posts_pagination( array(
					'mid_size' => 1,
					'prev_text' => __( '<', 'Prev' ),
					'next_text' => __( '>', 'Next' ),
					'screen_reader_text' => '这你也能找到？',
				)); 
			?> 
		</div>
	</div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.1/vue.min.js"></script>
<script>
(function(window){
	window.htmlentities = {
		/**
		 * Converts a string to its html characters completely.
		 *
		 * @param {String} str String with unescaped HTML characters
		 **/
		encode : function(str) {
			var buf = [];
			
			for (var i=str.length-1;i>=0;i--) {
				buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
			}
			
			return buf.join('');
		},
		/**
		 * Converts an html characterSet into its original character.
		 *
		 * @param {String} str htmlSet entities
		 **/
		decode : function(str) {
			return str.replace(/&#(\d+);/g, function(match, dec) {
				return String.fromCharCode(dec);
			});
		}
	};
})(window);

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
			encode: function(str) {
				var buf = [];				
				for (var i=str.length-1;i>=0;i--) {
					buf.unshift(['&#', str[i].charCodeAt(), ';'].join(''));
				}				
				return buf.join('');
			},
			decode: function(str) {
				return str.replace(/&#(\d+);/g, function(match, dec) { return String.fromCharCode(dec);});
			}
		},
		mounted() {
			axios.get("https://www.auliving.com.au/wp-json/wp/v2/posts?per_page=5")
			.then(response => {this.results =response.data})
			//.then(response => {this.results = JSON.parse(htmlentities.decode(JSON.stringify(response.data)))})
			
		}

	});
</script>

<?php get_footer(); ?>
