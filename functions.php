<?php
//拆分url
function parsePath($path, $name, $plus=0){
	$value='';
	if(strpos($path, "?")) $path = substr($path, 0, strpos($path, "?"));
	$array=explode('/', trim($path, "/"));
	if(!in_array($name, $array)) return $value;
	for($x=0; $x<(count($array)-1); $x++){
		if($array[$x]==$name){
			return $array[$x+1+$plus];
		}
	}
	return $value;
}
//search只搜索post
function SearchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}	
	return $query;
}
add_filter('pre_get_posts','SearchFilter');
//Enqueue scripts and styles.
function add_styles_and_scripts() {

	wp_enqueue_style( 'layui-style', get_template_directory_uri() . '/layui/css/layui.css', array(), '2.0.2', 'all' );
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	//wp_enqueue_style( 'select2bs-css', get_template_directory_uri() . '/css/select2-bootstrap.min.css', array('select2-css'), '0.1.0', 'all' );
	//wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/css/select2.min.css', array(), '4.0.3', 'all' );
	wp_enqueue_style( 'easylife-style', get_stylesheet_uri(), array(), '1.0.1', 'all');	

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	//wp_enqueue_script( 'select2-js', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '4.0.3', true );
	//wp_enqueue_script( 'select2-js-cn', get_template_directory_uri() . '/js/i18n/zh-CN.js', array('select2-js'), '4.0.3', true );
	wp_enqueue_script( 'layui-js', get_template_directory_uri() . '/layui/layui.js', array(), '2.0.2', true );
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/js/myjs.js', array('jquery','layui-js'), '1.0.1', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/**
	* Add Respond.js for IE
	*/
	if( !function_exists('ie_scripts')) {
		function ie_scripts() {
			echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
			echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
			echo ' <!--[if lt IE 9]>';
			echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
			echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
			echo ' <![endif]-->';
		}
		add_action('wp_head', 'ie_scripts');
	} // end if
}
add_action( 'wp_enqueue_scripts', 'add_styles_and_scripts' );

add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'title-tag' );

//remove version mark
remove_action('wp_head', 'wp_generator');

//filter posts by geolocations (lat and long) within 60km-far
add_filter( 'posts_clauses', 'add_geo_filter', 10, 2 );
function add_geo_filter( $clauses, $query_object ){
	if(isset($_GET['lat'])&&isset($_GET['long'])){
		$lat=$_GET['lat'];
		$long=$_GET['long'];
		if($lat&&$long){
			$join = &$clauses['join'];
			if (! empty( $join ) ) $join .= ' ';
			$join .= "JOIN wp_places_locator PL ON PL.post_id = wp_posts.ID";
		
			$fields = &$clauses['fields'];
			$fields .= ", ROUND( 6371 * acos( cos( radians( {$lat} ) ) * cos( radians( PL.lat ) ) * cos( radians( PL.long ) - radians( {$long} ) ) + sin( radians( {$lat} ) ) * sin( radians( PL.lat) ) ),1 ) AS distance";
			
			$where = &$clauses['where'];
			$where .= " AND (PL.lat != 0.000000 && PL.long != 0.000000)";
			//$where .= " AND distance <= '60'";

			$orderby = &$clauses['orderby'];
			if (! empty( $orderby ) ) $orderby = ' ' . $orderby;
			$orderby = "distance";

			$groupby = &$clauses['groupby'];
			if (! empty( $groupby ) ) $groupby = ' ' . $groupby; 
			$groupby = "wp_posts.ID HAVING distance <= '60' OR distance IS NULL";
		}
	}
	return $clauses;
}

//根据用户角色向后台添加文件
// function load_custom_wp_admin_style($hook) {
// 	if(wp_get_current_user()->roles[0]==''); //add adminjs.js 
// 	return;
// }
// add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//excerpt: 280 English characters or 140 Chinese characters
function chinese_excerpt($text,$lenth=286) {
    return mb_strimwidth($text,0,$lenth,'...','utf-8'); //6 prefix, en * 1, ch * 2
}
add_filter('the_excerpt', 'chinese_excerpt');