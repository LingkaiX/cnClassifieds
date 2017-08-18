<footer id="colophon" class="site-footer" role="contentinfo" style="background-color: #F26522;">
	<div class="container">
		<div class="row center-content">
			<div class="col-md-3 col-xs-12" style="margin:10px 0;">
				<a href=<?php echo get_site_url();?>>
					<img src="<?php echo get_template_directory_uri();?>/img/Logo_White.svg" style="height:50px;"></img>
				</a>
			</div>
			<div class="col-md-6 col-xs-12" style="margin:10px 0;">
				<a class="col-md-4 col-xs-4" href="#"><span>关于我们</span></a>
				<a class="col-md-4 col-xs-4" href="#"><span>免责声明</span></a>
				<a class="col-md-4 col-xs-4" href="#"><span>联系我们</span></a>
				<a class="col-md-4 col-xs-4" href="#"><span>版权声明</span></a>
				<a class="col-md-4 col-xs-4" href="#"><span>商家服务</span></a>
				<a class="col-md-4 col-xs-4" href="#"><span>CONTACT US</span></a>
			</div>
			<div class="col-md-3 col-xs-12" style="margin:10px 0;">
				<a class="col-md-3 col-xs-3" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Facebook_White.svg" style="max-height:40px;"></img></a>
				<a class="col-md-3 col-xs-3" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Google_White.svg" style="max-height:40px;"></img></a>
				<a class="col-md-3 col-xs-3" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Youtube_White.svg" style="max-height:40px;"></img></a>
				<a class="col-md-3 col-xs-3" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Twitter_White.svg" style="max-height:40px;"></img></a>
			</div>
			<p class="text-center col-md-12 col-xs-12" style="">cnclassifieds.com.au © 2017</p>
		</div>
	</div>
</footer><!-- #colophon -->
<script src=<?php echo get_template_directory_uri() .'/js/myjs.js' ?>></script>
<!-- 由于Geo WP 插件加载了：
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQWClP6rOf55if8uN7jXIs_K2gheMECSw&libraries=places&callback=initMap&language=en-us" async defer></script>-->
<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-104883243-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- Google Analytics -->
<?php wp_footer(); ?>
</body>
</html>
