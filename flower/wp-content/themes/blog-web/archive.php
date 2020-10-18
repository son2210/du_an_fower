<?php
/**
 * The template for displaying archive pages
 * @package blog-web
 * @version 1.0.0
 */

$breadcrumb_type	= 	blog_web_get_option( 'breadcrumb_type' );
$sidebar_class = blog_web_get_option( 'blog_web_sidebar' );
$breadcrumb_bg_image= blog_web_get_option( 'blog_web_breadcrumb_bg_image' );

  if( $breadcrumb_bg_image ){

      $breadcrumb_bg_style = 'style="background-image: url('.esc_url( $breadcrumb_bg_image ).');background-size: cover;"';

  } else{

      echo $breadcrumb_bg_style = '';
  }

get_header();



?>
<div id="page-header" class="page-header-lg" <?php echo ($breadcrumb_bg_style); ?>>
<div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="content-wrap">
                        <!--post-content-banner-->
                        <?php
                        do_action( 'blog_web_breadcrumb_trail' );
                        ?>
                    </div>
                    <!--content-wrap-->
                </div>
                <!--col-sm-12-->
            </div>
            <!--row-->
        </div>
    </div>
    

    <div id="blog-main">
        <div class="container">
            <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?>">
                <div id="primary" class="col-md-8 col-width-70 left-block">
                    <div class="blog-post-list">
                        <?php
                        if ( have_posts() ) :

                            if ( is_home() && ! is_front_page() ) :
                                ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php
                            endif;

                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/post/content', get_post_type() );

                            endwhile; ?>
                            <ul class="pagination pagination-lg">
                                <?php the_posts_pagination(); ?>
                            </ul>

                        <?php else :

                            get_template_part( 'template-parts/post/content', 'none' );

                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-width-30" id="secondary">
                    
                        <?php get_sidebar(); ?>
                    
                </div>
            </div>
        </div>
    </div><!-- #primary -->
<?php
get_footer();
