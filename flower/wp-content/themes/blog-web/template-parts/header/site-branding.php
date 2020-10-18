<?php
/**
 * Displays header site branding
 * @package blog-web
 * @version 1.0.0
 */
?>

<div class="page-logo d-flex align-items-center">

	<?php if( has_custom_logo() || display_header_text()==false ) { ?>

		<div class="site-branding-text">
			<h1 class="site-logo">
				<?php the_custom_logo(); ?>

			</h1>
			
	    </div>
       
	<?php } else {
  
	 ?>
	<div class="site-branding-text">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
	</div>
   <?php } ?>
</div>