<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blog-web
 */

$breadcrumb_type	= 	blog_web_get_option( 'breadcrumb_type' );
$author_name    	=   blog_web_get_option( 'article_author' );
$hide_date			=	blog_web_get_option( 'article_date_area' );
$hide_category		=	blog_web_get_option( 'post_categories' );
$hide_comment		=	blog_web_get_option('article_comment_link');
$sidebar_class      = blog_web_get_option( 'blog_web_sidebar' );
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
                        <div class="post-content post-content-banner text-center">
                            <?php
                            while ( have_posts() ) :
                            the_post();

                            $the_cat = get_the_category();
                            if(!empty($the_cat))
                            {
                                $category_name = $the_cat[0]->cat_name;
                                $category_description = $the_cat[0]->category_description;
                                $category_link = get_category_link( $the_cat[0]->cat_ID );
                                ?>
                                <header class="entry-header">
                                    <?php
                                    if($hide_category != 1) {
                                        ?>
                                        <span class="title-tag">
        	                      	<a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name);?></a>
        	                      </span><!--title-tag-->
                                    <?php } ?>

                                    <?php the_title( '<h2>', '</h2>' ); ?>
                                    <div class="post-meta">
                                        <ul class="justify-content-center">
                                            <?php
                                            if ($author_name != 1) {
                                                ?>
                                                <li>
                                                    <span><?php echo esc_html__( 'by','blog-web' ); ?></span>
                                                    <i class="circle-sm background-red"></i>
                                                    <span class="color-red-light">
		                        	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
		                        		<?php echo esc_html( get_the_author(), 'blog-web' ); ?>
		                        			
		                        	</a>
		                        </span>
                                                </li>
                                            <?php } ?>
                                            <?php
                                            if($hide_date != 1) {
                                                ?>
                                                <li>
                                                    <time><?php echo get_the_date ('F j, Y');?></time>
                                                </li>
                                            <?php } ?>
                                            <li>
		                        <span>
		                        	<?php if($hide_comment !=  1) {?>
                                        <a href="<?php comment_link(); ?>"><?php echo get_comments_number(); ?>
                                            <?php echo esc_html__( 'Comments','blog-web' ); ?>
									</a>
                                    <?php } ?>
								</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--post-meta-->
                                </header>
                            <?php } ?>
                            <!--entry-header-->
                        </div>
                        <!--post-content-banner-->
                        <?php
                        do_action( 'blog_web_breadcrumb_trail' );

                        endwhile;
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
    <!--page-header-->

    <div id="detail-page" class="main-body">
        <div class="container">
            <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?>">
                <div id="primary" class="col-md-8 col-width-70">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/post/content', 'single' );

                        if(!get_theme_mod('article_next_post')) :?>

                            <div class="next-previous">

                                <?php the_post_navigation( array(
                                    'prev_text' => '<span class="prev-post">%title</span>',
                                    'next_text' => '<span class="next-post">%title</span>',
                                ));
                                ?>

                            </div>

                        <?php

                        endif;

                        if(!get_theme_mod('article_related_post')) :
                            get_template_part('inc/related_post');
                        endif;

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
