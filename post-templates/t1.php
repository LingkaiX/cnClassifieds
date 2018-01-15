<?php 
/*
Template Name: Template 1
Template Post Type: post 
*/
get_header();?>
<link href='<?php echo get_template_directory_uri();?>./css/simplelightbox.css' rel='stylesheet'/>
<style>
    .main-company-information{
        width:100%
    }
    .responsive-tabs li, .tabcontent {
        border-radius: 10px !important;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2) !important;
    }
</style>
<main id="main-t1" class="site-main container" role="main">
    <div class="main-company-information">
    <?php while (have_posts()) : the_post(); ?>
        <section class="row company-name box-round-shadow">
            <?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo', 'title' => 'Logo'] );?>
            <?php
                $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                the_title( '<h3 class="title">', '&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small></h3>' );
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
            <?php include dirname(__DIR__).'/parts/enquiry-form.php'; ?>
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
                            .$mypost->website.'"><span>'.removeScheme($mypost->website).'</span></a></label>';
                        if(!empty($mypost->address)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="fa fa-map-marker icon-small" aria-hidden="true"></i><span>'.$mypost->address
                            .'</span><a style="margin-left:10px;" target="_blank" href="https://www.google.com/maps?daddr='
                            .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></label>';
                    }
                ?>
            </div>
        </section>
        <article class="row">
            <?php the_content(); ?>
        </article>
        <?php include dirname(__DIR__).'/parts/t1/gallery.php'; ?>
        <?php //include dirname(__DIR__).'/parts/disqus.php'; ?>
        <?php endwhile; ?>
    </div>
</main>
<script src="<?php echo get_template_directory_uri();?>./js/simple-lightbox.js"></script>
<script type="text/javascript" src="http://hammerjs.github.io/dist/hammer.min.js"></script>
<?php
//get_sidebar();
get_footer();