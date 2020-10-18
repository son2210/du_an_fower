<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blog-web
 */

$author_name	= 	blog_web_get_option( 'article_author' );
$hide_date		=	blog_web_get_option( 'article_date_area' );
$hide_category	=	blog_web_get_option( 'post_categories' );
$hide_comment	=	blog_web_get_option('article_comment_link');
$readmore_text	=	blog_web_get_option( 'readmore_text' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article class="page-feature-article">
        <figure class="post-thumbnail">
            <?php if ( has_post_thumbnail() ) : ?>
               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <?php endif; ?>
        </figure>
        <!--post-thumbnail-->
        <div class="post-content page-feature-post-content">
            <?php
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
                    <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

                    <div class="post-meta">
                        <ul>
                            <?php
                            if ($author_name != 1) {
                                ?>
                                <li>
                                    <span><?php echo esc_html__( 'by','blog-web' ); ?></span>
                                    <i class="circle-sm background-red"></i>
                                    <span class="color-red-light">
			            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
		                <?php the_author(); ?>
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
		            <span><?php if($hide_comment !=  1) {?>
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
                <!--entry-header-->
            <?php } ?>
            <div class="entry-content">
               <p><?php  echo wp_kses_post( wp_trim_words(get_the_content(), 60,' ') ); ?></p>
                <?php if ( ! empty( $readmore_text ) ) : ?>
                    <a href="<?php the_permalink(); ?>" class="btn-btn-1 btn">
                        <?php echo esc_html($readmore_text); ?></a>
                <?php endif; ?>
            </div>
            <!--entry-content-->
        </div>
        <!--main-post-content-->
    </article>

