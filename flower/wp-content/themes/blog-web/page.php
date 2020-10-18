<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blog-web
 */
$breadcrumb_type    =   blog_web_get_option( 'breadcrumb_type' );
$sidebar_class = blog_web_get_option( 'blog_web_sidebar' );
$breadcrumb_bg_image= blog_web_get_option( 'blog_web_breadcrumb_bg_image' );

  if( $breadcrumb_bg_image ){

      $breadcrumb_bg_style = 'style="background-image: url('.esc_url( $breadcrumb_bg_image ).');background-size: cover;"';

  } else{

      echo $breadcrumb_bg_style = '';
  }

get_header();
?>

<div id="page-header" class="page-header-lg" <?php echo $breadcrumb_bg_style; ?>>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="content-wrap">
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
        <!--container-->
    </div>


    <div id="detail-page" class="main-body">
        <div class="container">
            <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?>">
                <div id="primary" class="col-md-8 col-width-70">

                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/page/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="col-md-4 col-width-30" id="secondary">
                    
                        <?php get_sidebar(); ?>
                    
                </div>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
