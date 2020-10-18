<?php

$orig_post = $post;
global $post;

$categories        = get_the_category($post->ID);

$related_post_text = blog_web_get_option( 'you_may_like_text' );

if ($categories) {

  $category_ids = array();

  foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
  
  $args = array(
    'category__in'       => $category_ids,
    'post__not_in'       => array($post->ID),
    'posts_per_page'     => 3, // Number of related posts that will be shown.
    'ignore_sticky_posts'=> 1,
    'orderby'            => 'rand'
  );

  $my_query = new wp_query( $args );
  if( $my_query->have_posts() ) {

 ?>

<div class="row">
 <div class="col-md-12 text-center">
    <h3 class="mb-4"><?php echo esc_html($related_post_text); ?></h3>
 </div>
</div>
<div class="row">
  <?php while( $my_query->have_posts() ) {
      $my_query->the_post();?>

 <div class="col-md-4">

  
    <article class="post-content-row">
      <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>

       <figure class="post-thumbnail">

          <a href="<?php echo esc_url( get_permalink() ) ?>">
            <?php the_post_thumbnail('full'); ?></a>
      <?php endif; ?>

       </figure>

       <div class="post-content">
          <div class="entry-content text-center">
             <h6><a href="<?php echo esc_url( get_permalink() ) ?>">
             <?php the_title(); ?></a></h6>
             <time class="text-secondary"><?php echo get_the_date('F j, Y'); ?></time>
          </div>
       </div>
    </article>
  </div>
 
    <?php
    }
    echo '</div>';
  }  
}
  wp_reset_postdata();

?> 
  