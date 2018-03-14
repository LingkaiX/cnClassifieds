<?php
    $gm_query = get_posts(array( 'post_type' => 'goodman', "posts_per_page" => 3, "orderby" => "rand"));
    //get_posts(array( 'post_type' => 'goodman', 'post_status' => 'publish', "posts_per_page" => 3, "orderby" => "rand"));
    foreach($gm_query as $post)
	{
      echo "<h1>" . $post->post_title . "</h1><br>";
      echo "<p>" . $post->post_excerpt . "</p><br>";
	  echo "<p>" . $post->post_content . "</p><br>";
	} 
    wp_reset_postdata();
?>