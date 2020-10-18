<?php
/**
 * The main template file
 * @package blog-web
 * @version 1.0.0
 */
get_header();

$sidebar_class          = blog_web_get_option( 'blog_web_sidebar' );
$newsletter_title       = blog_web_get_option( 'newsletter_title' );
$newsletter_description = blog_web_get_option( 'newsletter_description' );
$newsletter_shortcode   = blog_web_get_option( 'newsletter_shortcode' );
$hide_slider            = blog_web_get_option('homepage_slider_option' );
$slider_cat_id          = blog_web_get_option('blog-web-feature-cat' );
?>

<div id="content" class="site-content">

<?php
if(is_home() && $hide_slider!=1 && $slider_cat_id!="" )
{

  do_action( 'blog_web_slider_style1' );

}

if(!empty($newsletter_shortcode))
{
?>
  
   <div id="newsletter-subscribe">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="newsletter-wrap newsletter-wrap-body">
                     <div class="content-holder">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="newsletter-heading">
                                 <h4><i class="far fa-envelope"></i><?php echo esc_html($newsletter_title); ?></h4>
                                 <p><?php echo esc_html($newsletter_description); ?></p>
                              </div>
                              <!--newsletter-heading-->
                           </div>
                           <!--col-md-5-->
                           <div class="col-md-7">
                              <div class="newsletter-content">
                                 <?php echo do_shortcode($newsletter_shortcode); ?>
                              </div>
                              <!--newsletter-content-->
                           </div>
                           <!--col-md-7-->
                        </div>
                        <!--row-->
                     </div>
                     <!--content-holder-->
                  </div>
                  <!--newsletter-wrap-->
               </div>
               <!--col-md-12-->
            </div>
            <!--row-->
         </div>
         <!--container-->
   </div>
<?php } ?>
    <div id="blog-main">
    <div class="container">
        <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?>">
            <div class="col-md-8 col-width-70 left-block">
                <div id="primary" class="blog-post-list">
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

                            get_template_part( 'template-parts/post/content');

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
    </div><!-- #primary -->
</div>
<?php
get_footer();
