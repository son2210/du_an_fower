<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blog-web
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
    </figure>
   
    <?php
    the_content();
    wp_link_pages( array(
        'before' => '<div class="description">' . __( 'Pages:', 'blog-web' ),
        'after'  => '</div>',
    ) );
    ?>
</article><!-- #post-## -->		
