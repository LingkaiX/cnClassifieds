<?php get_header(); ?>
<style>
    #primary {
        border-left: 1px solid lightgray;
        border-right: 1px solid lightgray;
        padding-bottom: 9999px;
        margin-bottom: -9999px;
    }
    .site-content{
        overflow:hidden;
    }
    #primary .site-main {
        width: 60%;
        margin: 35px auto;
    }
    @media (max-width: 1199px) {
        #primary .site-main {
            width: 70%;
        }
    }
    @media (max-width: 991px) {
        #primary .site-main {
            width: 80%;
        }
    }
    @media (max-width: 767px) {
        #primary .site-main {
            width: 100%;
            margin: 10px auto;
        }
    }
    @media (max-width: 767px) {
        #primary .site-main {
            width: 100%;
            margin: 10px auto;
        }
    }
    #primary .site-main strong {
        font-size: large;
        color: #ff6363;
        margin-bottom: 20px;
    }
</style> 
<div id="primary" class="container">
  <main id="main" class="site-main row" role="main">
    <div class="col-md-12 content-area">
    <?php
        while ( have_posts() ) : the_post();
        the_content();
        endwhile;
    ?>
    </div>
  </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
