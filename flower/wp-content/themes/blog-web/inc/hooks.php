<?php


//=============================================================
// Home Page Slider Style1
//=============================================================
if ( ! function_exists( 'blog_web_slider_style1_action' ) ) :
    
    function blog_web_slider_style1_action() { 
    
    $hide_slider       = blog_web_get_option( 'homepage_slider_option' );
    
    $slider_cat_id     = blog_web_get_option( 'blog-web-feature-cat' );
    
    $category_name     = get_cat_name($slider_cat_id);
    
    $category_link     = get_category_link($slider_cat_id);
    
    $no_of_slider      = blog_web_get_option('blog-web-slider-number');
    
    $hide_meta         = blog_web_get_option('blog-web-slider-meta-options');
    
    $readmore          = blog_web_get_option( 'readmore_text' );
    
    $excerpt_length    = blog_web_get_option( 'slider_excerpt_length' );
    
      $args = array( 'cat' =>$slider_cat_id , 'posts_per_page' => $no_of_slider );

    $query = new WP_Query($args);

    if($query->have_posts()):?>

       <!--feature-post-top-->
      <div id="feature-carousel">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="feature-carousel-slider">
                         
                        <?php
                     
                           while($query->have_posts()):

                                   $query->the_post();
                                 
                                   if(has_post_thumbnail())
                                   
                                      {

                                       $image_id = get_post_thumbnail_id();
                                       $image_url = wp_get_attachment_image_src($image_id,'blog-web-home-slider1',true);
                         ?>
                    
                                     <div class="fe-carousel-item">
                                        <div class="d-md-flex align-items-stretch feature-slider-wrap">
                                           <div class="feature-slider-img" style="background-image: url(<?php echo esc_url($image_url[0]); ?>);">
                                           </div>
                                           <!--feature-slider-img-->
                                           <div class="content-description d-flex align-items-center">
                                              <div class="post-content feature-slider-content">
                                                 <header class="entry-header">
                                                    <span class="title-tag color-red-light">
                                                    <a href="<?php echo esc_url($category_link); ?>"><span class="tagline"><?php echo esc_html($category_name); ?></span></a>
                                                    </span><!--title-tag-->
                                                    <h2 class=" color-white"><?php the_title(); ?></h2>
                                                     <?php if( $hide_meta != 1 ) { ?>

                                                      <div class="post-meta">
                                                         <ul>
                                                            <li>
                                                               <span><?php esc_html_e('by','blog-web'); ?></span>
                                                               <i class="circle-sm background-red"></i>
                                                               <span class="color-red-light"><?php echo get_the_author();?></span>
                                                            </li>
                                                            <li>
                                                               <time> <?php echo esc_html( date_i18n( ' M j, Y' ) ); ?> </time>
                                                            </li>
                                                            <li>
                                                              <a href="<?php get_comments_link() ?>"> <span><?php comments_number( '0', '1', '% ' ); ?><?php esc_html_e('Comments:','blog-web')?></span></a>
                                                            </li>
                                                         </ul>
                                                      </div>

                                                    <?php } ?>  
                                                    <!--post-meta-->
                                                 </header>
                                                 <!--entry-header-->
                                                 <div class="entry-content">
                                                    <p><?php echo wp_trim_words(get_the_content(), $excerpt_length );?> </p>
                                                    <a href="<?php the_permalink(); ?>" class=" btn btn-bg-red btn-btn-arrow"><?php echo esc_html($readmore); ?><i class="fas fa-arrow-right"></i></a>
                                                 </div>
                                                 <!--entry-content-->
                                              </div>
                                              <!--feature-slider-content-->
                                           </div>
                                           <!--content-description-->
                                        </div>
                                        <!--feature-slider-wrap-->
                                     </div>
                                     <!--fe-carousel-item-->
                                <?php } endwhile; ?>
                   
                  </div>
                  <!--feature-carousel-slider-->
               </div>
               <!--col-md-12-->
            </div>
            <!--row-->
         </div>
         <!--container-->
      </div>
      <!--feature-carousel-->
          
    <?php endif; wp_reset_postdata();
    }
endif;

add_action('blog_web_slider_style1', 'blog_web_slider_style1_action');


