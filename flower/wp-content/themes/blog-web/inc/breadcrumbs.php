<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeMiles
 * @subpackage Blog Web
 */

if (!function_exists('blog_web_breadcrumb')) :

    function blog_web_breadcrumb($post_id)
    {
    
      $breadcrumb_type = blog_web_get_option( 'breadcrumb_type');  
      
        
      $breadcrumb_bg_image= blog_web_get_option( 'blog_web_breadcrumb_bg_image' );

      if( $breadcrumb_bg_image ){

          $breadcrumb_bg_style = 'style="background-image: url('.esc_url( $breadcrumb_bg_image ).');background-size: cover;"';

      } else{

          echo $breadcrumb_bg_style = '';
      }

    if(!is_single()){ 
?>         
          
         <div id="page-header" class="page-header-lg" <?php echo $breadcrumb_bg_style; ?>>
         <?php } ?> 
             <div class="container">
                      
                        <!--page-title-->
                        <?php
                          if(is_archive() )
                          {
                            the_archive_title( '  <div class="page-title"><h2>', '</h2></div>' );
                          }
                        

                       elseif(is_search() )
                         
                          { ?>
                           
                            <div class="page-title">  <h2>
                               <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'blog-web' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                           
                            </h2></div>
                    
                      <?php }
                       
                         elseif(is_page() )
                         { ?>
                          
                           <div class="page-title">  <h2><?php the_title(); ?></h2></div>
                       
                       <?php  }
                      
                       if(  $breadcrumb_type == 'normal' )
                           {
                        ?>
                           
                              <?php  blog_web_breadcrumb_trail(); ?>
                          

                      <?php }
                        elseif ( (function_exists('bcn_display')) && ($breadcrumb_type=="advanced")) {
                         ?>
                        <div class="breadcrumb bnc">
                               <?php  bcn_display(); ?>
                        </div>
                     <?php }
                      elseif ( function_exists('rank_math_the_breadcrumbs') && ( $breadcrumb_type=="rank-math")) { ?>

                       <div class="breadcrumb">
                               <?php  rank_math_the_breadcrumbs(); ?>
                        </div>
                    
                     <?php }

                     elseif ( (function_exists('yoast_breadcrumb')) && ($breadcrumb_type=="yoast-seo")) { ?>

                       <div class="breadcrumb">
                               <?php  yoast_breadcrumb(); ?>
                        </div>
                    
                     <?php }


                     ?>  
        </div>
        <!--container-->
  <?php if(!is_single()){  ?></div>
   <?php  
        }
    }
endif;

add_action('blog_web_breadcrumb_trail', 'blog_web_breadcrumb', 10, 1);    