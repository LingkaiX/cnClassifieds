<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EasyLife
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            echo '<div class="row">';
                the_title( '<h1 class="col-md-12 entry-title" style="background-color:#347466">', '</h1>' );
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-4">';
                $myrows = $wpdb->get_results( "SELECT * FROM wp_places_locator where post_id=".$post->ID )[0];
                the_post_thumbnail();
                echo '<p></p>';
                echo '<p>地址：'.$myrows->address.'</p>';
                if(!empty($myrows->phone)) echo '<p>联系电话：'.$myrows->phone.'</p>';
                if(!empty($myrows->website)) echo '<p>网站：'.$myrows->website.'</p>';
                if(!empty($myrows->email)) echo '<p>电子邮件：'.$myrows->email.'</p>';
                if(!empty($myrows->fax)) echo '<p>传真：'.$myrows->fax.'</p>';
                $whs=get_post_meta($post->ID,'_wppl_days_hours')[0];
                //print_r($whs);
                if(!empty($whs)){
                    echo '<span>营业时间：</span><ul>';
                    foreach($whs as $wh){
                        if(!empty($wh['days'])) echo '<li>'.$wh['days'].':&nbsp;'.$wh['hours'].';';
                    }
                    echo '</ul>';
                }

            echo '</div>';
            echo '<div class="col-md-8 basic-listing">';
                echo '<span>内容：</span>';
                the_content();
            echo '</div>';
            echo '</div>';
            //get_template_part( 'template-parts/content', get_post_format() );
            //the_post_navigation();
        endwhile; // End of the loop.
        ?>
        </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
print_r($post);