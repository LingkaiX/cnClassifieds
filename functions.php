<?php
//拆分url,返回下一（plus+1）个/后的值
//ex: parsePath($_SERVER['REQUEST_URI'],'category');
function parsePath($path, $name, $plus=0){
	$value='';
	if(strpos($path, "?")) $path = substr($path, 0, strpos($path, "?"));
	$array=explode('/', trim($path, "/"));
	if($plus<-1) return $value;
	if($plus==-1) return $array[0];
	if(!in_array($name, $array)) return $value;
	for($x=0; $x<(count($array)-1); $x++){
		if($array[$x]==$name&&((count($array))>($x+1+$plus))){
			return $array[$x+1+$plus];
		}
	}
	return $value;
}
//去掉网址中的http://或https://
function removeScheme($url){
	$pieces = explode("//", $url);
	return count($pieces)>1?$pieces[1]:'';
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

	//wp_enqueue_style( 'layui-style', get_template_directory_uri() . '/layui/css/layui.css', array(), '2.0.2', 'all' );
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	//wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array(), '4.7.0', 'all' );
	//wp_enqueue_style( 'select2bs-css', get_template_directory_uri() . '/css/select2-bootstrap.min.css', array('select2-css'), '0.1.0', 'all' );
	//wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/css/select2.min.css', array(), '4.0.3', 'all' );
	wp_enqueue_style( 'easylife-style', get_stylesheet_uri(), array(), '1.1.2', 'all');	

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	//wp_enqueue_script( 'select2-js', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '4.0.3', true );
	//wp_enqueue_script( 'select2-js-cn', get_template_directory_uri() . '/js/i18n/zh-CN.js', array('select2-js'), '4.0.3', true );
	//wp_enqueue_script( 'layui-js', get_template_directory_uri() . '/layui/layui.js', array(), '2.0.2', true );
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/js/myjs.js', array('jquery'), '1.0.4', true );
	

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
add_theme_support( 'menus' );
//remove version mark
remove_action('wp_head', 'wp_generator');

//filter posts by geolocations (lat and long) within 60km-far
add_filter( 'posts_clauses', 'add_geo_filter', 10, 2 );
function add_geo_filter( $clauses, $query_object ){

if(!is_admin()){
	if((isset($_GET['lat'])&&isset($_GET['long'])) || is_search()){
		$join = &$clauses['join'];
		if (! empty( $join ) ) $join .= ' ';
		$join .= "JOIN wp_places_locator PL ON PL.post_id = wp_posts.ID";	
	}

	//Add en-title and phone into search result
	if(is_search()&&isset($_GET['s'])){
		global $wpdb;
		
		$join = &$clauses['join'];
		if (! empty( $join ) ) $join .= ' ';
		$join .= "JOIN wp_postmeta PM ON PM.post_id = wp_posts.ID";

		$groupby = &$clauses['groupby'];
		if (! empty( $groupby ) ) $groupby = ' ' . $groupby; 
		$groupby = "wp_posts.ID";

		$clauses['where'] = sprintf(
			" AND ( %s OR %s OR %s OR %s) ",
			$wpdb->prepare( "(PM.meta_key='title-en' AND PM.meta_value like '%%%s%%')", $_GET['s']),
			$wpdb->prepare( "(PM.meta_key='ex-words' AND PM.meta_value like '%%%s%%')", $_GET['s']),
			$wpdb->prepare( "(PL.phone like '%%%s%%')", $_GET['s']),
			mb_substr( $clauses['where'], 5, mb_strlen( $clauses['where'] ) )
		);
	}
	if(isset($_GET['lat'])&&isset($_GET['long'])){
		$lat=$_GET['lat'];
		$long=$_GET['long'];
		if($lat&&$long){
		
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
			$groupby = "wp_posts.ID";
			//$groupby = "wp_posts.ID HAVING distance <= '100' OR distance IS NULL";
		}
	}
}
	return $clauses;
}

$role = get_role( 'author' );
$role->remove_cap( 'publish_posts' );
$role->remove_cap( 'delete_published_posts' );
$role->add_cap('edit_published_posts');
//根据用户角色向后台添加文件
//  function load_custom_wp_admin_style($hook) {
// 	 print_r(wp_get_current_user()->roles);
//  	if(wp_get_current_user()->roles[0]=='author'&&$hook=='post.php') wp_enqueue_script( 'customer-admin-script', get_template_directory_uri() . '/js/customer-admin.js' );
// }
// add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
function load_custom_wp_admin_style() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
	if(wp_get_current_user()->roles[0]=='author'){
		wp_register_style( 'custom_wp_author_css', get_template_directory_uri() . '/css/author-style.css', false, '1.0.0' );
		wp_enqueue_style( 'custom_wp_author_css' );
	}
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//excerpt: 200 English characters or Chinese characters
function cutExcerpt($output){
	if(strlen($output)>200){
		return mb_substr($output,0, 200)
			.'<a target="_blank" href="'.get_the_permalink().'" title="'.get_the_title().'"> ... ... </a>'; 
	}else{
		return $output;
	}

}

//wp_nav_menu( array( 'theme_location' => 'header-menu' ) )
function register_my_menus() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu' ),
		'extra-menu' => __( 'Extra Menu' )
	  )
	);
  }
  add_action( 'init', 'register_my_menus' );

function putAbnSignal($hasAbn){
	if($hasAbn){
		return '<abbr title="ABN Checked" style="margin-right:3px;"><img class="img-abn" src="'
		.get_template_directory_uri().'/img/abn-checked.svg"></abbr>';
	}else{
		return null;
	}
}
//判断是否是繁体地址
function isTCN(){
	if (isset($_GET['variant'])) {
		if ($_GET["variant"]=='zh-tw') return true;
	}
	if (parsePath($_SERVER['REQUEST_URI'],'',-1)=='zh-tw') return true;
	return false;
}
function getBaseUrl(){
	$url=get_site_url();
	if (isTCN()){
		return $url.'/zh-tw';
	}else{
		return $url;
	}
}
function switchCN(){
	if (isTCN()){
		return home_url().substr($_SERVER['REQUEST_URI'],6);
	}else{
		return home_url().'/zh-tw'.$_SERVER['REQUEST_URI'];
	}
}
//添加或修改经纬度信息到url
function addGeoToUrl($lat, $long){
	//$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
	$url_parts = parse_url($_SERVER['REQUEST_URI']);
	if(isset($url_parts['query'])) parse_str($url_parts['query'], $params);
	$params['lat'] = $lat; 
	$params['long'] = $long;
	$base_url='//'.$_SERVER['HTTP_HOST'].$url_parts['path'].'?';
	$flag=false;
	foreach ($params as $key => $value) {
		if($flag) $base_url = $base_url.'&';
		$flag=true;
		$base_url = $base_url.$key.'='.$value;
	};
	return $base_url;
}
