<?php
/**
 * Recommended plugins
 *
 * @package blog-web
 * @version 1.0.0
 */
if ( ! function_exists( 'blog_web_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function blog_web_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'Thememiles Toolset', 'blog-web' ),
				'slug'     => 'thememiles-toolset',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'Getwid – Gutenberg Blocks', 'blog-web' ),
				'slug'     => 'getwid',
				'required' => false,
			),
				

		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'blog_web_recommended_plugins' );
