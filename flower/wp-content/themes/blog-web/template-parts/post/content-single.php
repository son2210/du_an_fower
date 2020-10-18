<?php
/**
 * Template part for displaying posts
 * @package blog-web
 * @version 1.0.0
 */

$hide_tags  =   blog_web_get_option( 'article_tags' );
?>

<figure class="post-thumbnail post-992-feature-img mb-5">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
    <?php endif; ?>
</figure>

<article class="post-992 post-992-space-left">
    <div class="entry-content">
        <div class="post-intro">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
    if($hide_tags != 1) {

        $before = '';
        $seperator = ''; // blank instead of comma
        $after = '';
        ?>
        <?php if(has_tag()): ?>
            <div class="tagcloud"><?php the_tags( $before, $seperator, $after ); ?></div>
        <?php endif; ?>
    <?php } ?>
</article>



