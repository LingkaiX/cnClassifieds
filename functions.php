<?php
//拆分url
function parsePath($path, $name, $plus){
	$value='';
	$array=explode('/', trim($path, "/"));
	if(!in_array($name, $array)) return $value;
	for($x=1; $x<count($array); $x++){
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
	wp_enqueue_style( 'easylife-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.2.1', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );

	wp_enqueue_script( 'easylife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'easylife-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

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

