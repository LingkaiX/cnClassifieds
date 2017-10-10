<?php
/**
 * @author Sophia???
 */
get_header(); ?>
<main id="main" class="site-main container" role="main">
    <?php while (have_posts()) : the_post(); ?>
        <section class="row company-name box-round-shadow">
            <?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo', 'title' => 'Logo'] );?>
            <?php
                the_title( '<h3 class="title">', '</h3>' ); 
                $enTitle=get_post_meta($post->ID,'title-en',true);
                if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>';  
            ?>
            <div class="tag">
                <i class="fa fa-tags icon" aria-hidden="true"></i>
                <?php 
                    foreach(get_the_category() as $cate){
                        echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                    }
                ?>
            </div>
            <div class="abstract">
                <?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
            </div>
            <?php include 'parts/enquiry-form.php'; ?>
        </section>
        <section class="row contact-info ad-contact box-round-shadow">
            <div class="ad-contact-small">
                <?php
                    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
                    if($mypost!=null){
                        if(!empty($mypost->phone)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="fa fa-phone icon-small" aria-hidden="true"></i><span>'.$mypost->phone.'</span></label>';
                        if(!empty($mypost->email)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="fa fa-globe icon-small" aria-hidden="true"></i><a href="mailto:#"><span>'
                            .$mypost->email.'</span></a></label>';
                        if(!empty($mypost->website)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="fa fa-globe icon-small" aria-hidden="true"></i><a target="_blank" href="'
                            .$mypost->website.'"><span>'.$mypost->website.'</span></a></label>';
                        if(!empty($mypost->address)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="fa fa-map-marker icon-small" aria-hidden="true"></i><span>'.$mypost->address
                            .'</span><a style="margin-left:10px;" target="_blank" href="https://www.google.com/maps?daddr='
                            .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></label>';
                    }
                ?>
            </div>
        </section>
        <article class="row information ad-information box-round-shadow">
            <?php the_content(); ?>
        </article>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 single-page-ad-container">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- single page bottom ad -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-9173929910659094"
                    data-ad-slot="3923311372"
                    data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <?php endwhile; ?>
</main>
<?php
//get_sidebar();
get_footer();