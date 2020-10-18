<?php
/**
 * blogWeb Theme Customizer
 *
 * @package blog-web
 */




if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Blog_Web_Customize_Category_Dropdown_Control' )):

    /**
     * Custom Control for category dropdown
     * @package blog-web
     * @subpackage blog-web
     * @since 1.0.0
     *
     */
    class Blog_Web_Customize_Category_Dropdown_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'category_dropdown';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content()
        {
            $Blog_Web_customizer_name = 'Blog_Web_customizer_dropdown_categories_' . $this->id;
            $Blog_Web_dropdown_categories = wp_dropdown_categories(
                array(
                    'name'              => $Blog_Web_customizer_name,
                    'echo'              => 0,
                    'show_option_none'  =>__('Select Slider Category','blog-web'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
           $Blog_Web_dropdown_final = str_replace( '<select', '<select ' . $this->get_link(),$Blog_Web_dropdown_categories );
            printf(
                '<label><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $Blog_Web_dropdown_final
            );
        }
    }
    endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function blog_web_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog_web_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog_web_customize_partial_blogdescription',
		) );

	/**
	 * Theme options.
	 */
	 $default = blog_web_default_theme_options();
	 
	 $wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'blog-web' ),
			'priority'   => 30,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Header Section.
	$wp_customize->add_section( 'section_header',
		array(
			'title'      => esc_html__( 'Header Options', 'blog-web' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	/*Settings sidebar on front page*/
    $wp_customize->add_setting( 'blog_web_sidebar', array(
        'capability'        => 'edit_theme_options',
        'default'           => $default['blog_web_sidebar'],
        'sanitize_callback' => 'blog_web_sanitize_select'
    ) );
    $wp_customize->add_control( 'blog_web_sidebar', array(
        'choices' => array(
                'right-sidebar' => __('Right Sidebar','blog-web'),
                'left-sidebar'  => __('Left Sidebar','blog-web'),
               
            ),
        'label'         => __( 'Select Sidebar Options', 'blog-web' ),
        'section'       => 'blog_web_new_section_post',
        'settings'      => 'blog_web_sidebar',
        'type'          => 'select',
        'priority'	    => 0
    ) );

	// Breadcrumb Section.
	$wp_customize->add_section( 'section_breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'blog-web' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);



/**
         * Upload image control for section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'blog_web_breadcrumb_bg_image',
                array(
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                )
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'blog_web_breadcrumb_bg_image',
                array(
                    'label'      => esc_html__( 'Breadcrumb Background Image', 'blog-web' ),
                    'section'    => 'section_breadcrumb',
                    'priority' => 6
                )
            )
        );



	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'breadcrumb_type',
		array(
			'default'           => $default['breadcrumb_type'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'blog_web_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'breadcrumb_type',
		array(
			'label'       => esc_html__( 'Breadcrumb Type', 'blog-web' ),
			'description' => sprintf( esc_html__( 'Advanced: Choose any Plugin %1$sBreadcrumb NavXT%2$s plugin','blog-web'), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
			'section'     => 'section_breadcrumb',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'normal'    => esc_html__( 'Theme Default','blog-web'),
	            'advanced'  => esc_html__( 'Advanced : Breadcrumb NavXT','blog-web'),
	            'rank-math' => esc_html__( 'Rank Math : Breadcrumb','blog-web'),
	            'yoast-seo' => esc_html__( 'Yoast Seo : Breadcrumb','blog-web'),
	            'disable'   => esc_html__( 'Disable','blog-web'),
				'disable' => esc_html__( 'Disable', 'blog-web' ),
				
			),
		)
	);



	// Layout Section.
	$wp_customize->add_section( 'blog_web_new_section_general' , array(
   		'title'      => esc_html__('Layout/Slider Settings','blog-web'),
   		'description'=> '',
   		'priority'   => 10,
		'capability' => 'edit_theme_options',
	    'panel'      => 'theme_option_panel',
	) );


/* Home Page Slider cat selection */
	$wp_customize->add_setting( 'blog-web-feature-cat',
	 array(
	            'capability'		=> 'edit_theme_options',
	            'default'			=> $default['blog-web-feature-cat'],
	            'sanitize_callback' => 'absint',
	      ) );


	$wp_customize->add_control(
	    new Blog_Web_Customize_Category_Dropdown_Control(
	        $wp_customize,
	        'blog-web-feature-cat',
	        array(
	                'label'		=> __( 'Select Category', 'blog-web' ),
	                'section'   => 'blog_web_new_section_general',
	                'settings'  => 'blog-web-feature-cat',
	                'type'	  	=> 'category_dropdown',
	                'priority'  => 0
	             )
	    )
	);
   
    /*Set number of slider */

 $wp_customize->add_setting( 'blog-web-slider-number', array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => 3,
				'sanitize_callback' => 'absint'
				) );
				$wp_customize->add_control( 'blog-web-slider-number', array(
				'label'             => __( 'Number of Slides ', 'blog-web' ),
				'description'       => __('Select the number of slide', 'blog-web'),
				'section'           => 'blog_web_new_section_general',
				'settings'          => 'blog-web-slider-number',
				'type'              => 'number',
				'priority'          => 0,
				'input_attrs'       => array(
				'min'               => '3',
				'max'               => '10',
				'step'              => '1',
				),
        ) );


  // Excerpt Length.
	$wp_customize->add_setting( 'slider_excerpt_length',
		array(
			'default'           => $default['slider_excerpt_length'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		)
	);
	
	$wp_customize->add_control( 'slider_excerpt_length',
		array(
			'label'    => esc_html__( 'Enter Excerpt Length', 'blog-web' ),
			'section'  => 'blog_web_new_section_general',
			'type'     => 'number',
			'priority' => 0,
		)
	);


/* Hide Meta On Slider */

 $wp_customize->add_setting( 'blog-web-slider-meta-options', array(
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
            'default'           => 0,
            'sanitize_callback' => 'blog_web_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'blog-web-slider-meta-options', array(
            'label'       => __( 'Hide Meta On Slider ', 'blog-web' ),
            'description' => __('Check to hide meta options', 'blog-web'),
            'section'     => 'blog_web_new_section_general',
            'settings'    => 'blog-web-slider-meta-options',
            'type'        => 'checkbox',
            'priority'    => 0
        ) );

   


	    $wp_customize->add_setting(
	        'homepage_slider_option',
	        array(
	            'default'           => false,
				'sanitize_callback' => 'blog_web_sanitize_checkbox',
	        )
	    );


	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'homepage_slider_option',
				array(
					'label'      => 'Disable Slider on Homepage',
					'section'    => 'blog_web_new_section_general',
					'settings'   => 'homepage_slider_option',
					'type'		 => 'checkbox',
					'priority'	 => 0
				)
			)
		);
   



	// Setting Layout.
	$wp_customize->add_setting(
	        'home_style',
	        array(
	            'default'           => esc_html__('Simple','blog-web'),
				'sanitize_callback' => 'blog_web_sanitize_select',
			
	        )
	    );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'home_layout',
			array(
				'label'       => esc_html__('Home Style Layout','blog-web'),
				'section'     => 'blog_web_new_section_general',
				'settings'    => 'home_style',
				'type'        => 'radio',
				'priority'	  => 3,
				'choices'     => array(
					'Simple'  => esc_html__('Simple Style Layout','blog-web'),
					'Grid'    => esc_html__('Grid Style Layout  [Premium Version]','blog-web'),
					'List'    => esc_html__('List Style Layout [Premium Version]','blog-web'),
					
				)
			)
		)
	);



// Newsletter Section.
	$wp_customize->add_section( 'section_newsletter',
		array(
			'title'      => esc_html__( 'Newsletter Options', 'blog-web' ),
			'priority'   => 90,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting Newsletter Title.
	$wp_customize->add_setting( 'newsletter_title',
		array(
			'default'           => $default['newsletter_title'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'newsletter_title',
		array(
			'label'    => esc_html__( 'Newsletter Title', 'blog-web' ),
			'section'  => 'section_newsletter',
			'type'     => 'text',
			'priority' => 100,
		)
	);


	// Setting Newsletter Description
	$wp_customize->add_setting( 'newsletter_description',
		array(
			'default'           => $default['newsletter_description'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'newsletter_description',
		array(
			'label'    => esc_html__( 'Newsletter Description', 'blog-web' ),
			'section'  => 'section_newsletter',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Setting Newsletter Shortcode
	$wp_customize->add_setting( 'newsletter_shortcode',
		array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'newsletter_shortcode',
		array(
			'label'    => esc_html__( 'Newsletter MailChimp Shortcode', 'blog-web' ),
			'section'  => 'section_newsletter',
			'type'     => 'text',
			'priority' => 100,
		)
	);



	$wp_customize->add_setting(
        'home_sidebar',
        array(
            'default'           => false,
			'sanitize_callback' => 'blog_web_sanitize_checkbox',
        )
    );
	
		
	$wp_customize->add_setting(
        'post_sidebar',
        array(
            'default'           => false,
			'sanitize_callback' => 'blog_web_sanitize_checkbox',
        )
    );

	$wp_customize->add_setting(
        'archive_sidebar',
        array(
            'default'           => false,
			'sanitize_callback' => 'blog_web_sanitize_checkbox',
        )
    );
	
	$wp_customize->add_setting(
        'pages_sidebar',
        array(
            'default'           => false,
			'sanitize_callback' => 'blog_web_sanitize_checkbox',
        )
    );

    

	// Footer Section.
	$wp_customize->add_section( 'section_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'blog-web' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting copyright_text.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'blog-web' ),
			'section'  => 'section_footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Back To Top Section.
	$wp_customize->add_section( 'section_back_to_top',
		array(
			'title'      => esc_html__( 'Back To Top Options', 'blog-web' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'back_to_top_type',
		array(
			'default'           => $default['back_to_top'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'blog_web_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'back_to_top_type',
		array(
			'label'       => esc_html__( 'Active?', 'blog-web' ),
			'section'     => 'section_back_to_top',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'blog-web' ),
				'enable'  => esc_html__( 'Enable', 'blog-web' ),
			),
		)
	);

	// Post Settings
	
	$wp_customize->add_section( 'blog_web_new_section_post' , array(
   		'title'          => esc_html__( 'Post Settings','blog-web' ),
   		'description'    => '',
   		'priority'       => 96,
		'capability'     => 'edit_theme_options',
		'panel'      	 => 'theme_option_panel',
	) );

	// Post Settings
	$wp_customize->add_setting(
        'article_tags',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );

    $wp_customize->add_setting(
        'article_author',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );

     $wp_customize->add_setting(
        'article_sticky_post',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );

	$wp_customize->add_setting(
        'article_related_post',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );
	
	$wp_customize->add_setting(
        'article_next_post',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );
	$wp_customize->add_setting(
        'article_comment_link',
        array(
            'default'          => false,
			'sanitize_callback'=> 'blog_web_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_setting(
	        'article_like_link',
	        array(
	            'default'          => false,
				'sanitize_callback'=> 'blog_web_sanitize_checkbox',
	        )
	    );

    
		$wp_customize->add_setting(
	        'article_date_area',
	        array(
	            'default'          => false,
				'sanitize_callback'=> 'blog_web_sanitize_checkbox',
	        )
	    );
		$wp_customize->add_setting(
	        'post_categories',
	        array(
	            'default'          => false,
				'sanitize_callback'=> 'blog_web_sanitize_checkbox',
	        )
	    );

	    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_cat',
			array(
				'label'      => esc_html__('Hide Category','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'post_categories',
				'type'		 => 'checkbox',
				'priority'	 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_date',
			array(
				'label'      => esc_html__('Hide Date','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_date_area',
				'type'		 => 'checkbox',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_tags',
			array(
				'label'      =>  esc_html__('Hide Tags','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_tags',
				'type'		 => 'checkbox',
				'priority'	 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_share_author',
			array(
				'label'      => esc_html__('Hide Post Nav','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_next_post',
				'type'		 => 'checkbox',
				'priority'	 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_comment_link',
			array(
				'label'      => esc_html__('Hide Comment Link','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_comment_link',
				'type'		 => 'checkbox',
				'priority'	 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_author',
			array(
				'label'      => esc_html__('Hide Author Name','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_author',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_sticky_sidebar',
			array(
				'label'      => esc_html__('Hide Sticky Sidebar','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_sticky_post',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);

	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_related',
			array(
				'label'      => esc_html__('Hide Related Posts Box','blog-web' ),
				'section'    => 'blog_web_new_section_post',
				'settings'   => 'article_related_post',
				'type'		 => 'checkbox',
				'priority'	 => 9
			)
		)
	);

	// Setting Read More Text.
	$wp_customize->add_setting( 'you_may_like_text',
		array(
			'default'           => $default['you_may_like_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'you_may_like_text',
		array(
			'label'    => esc_html__( 'Related Posts Text', 'blog-web' ),
			'section'  => 'blog_web_new_section_post',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	// Setting Read More Text.
	$wp_customize->add_setting( 'readmore_text',
		array(
			'default'           => $default['readmore_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'readmore_text',
		array(
			'label'    => esc_html__( 'Read More Button Text', 'blog-web' ),
			'section'  => 'blog_web_new_section_post',
			'type'     => 'text',
			'priority' => 100,
		)
	);

	}
}
add_action( 'customize_register', 'blog_web_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_web_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_web_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function blog_web_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function blog_web_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if ( ! function_exists( 'blog_web_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function blog_web_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'blog_web_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function blog_web_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'blog_web_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function blog_web_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input   = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'blog_web_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function blog_web_sanitize_select( $input, $setting ) {

        // Ensure input is clean.
        $input   = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;

if ( ! function_exists( 'blog_web_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function blog_web_default_theme_options() {

		$defaults                               = array();
		
		// Post.
		$defaults['readmore_text']              = esc_html__( 'Read More', 'blog-web' );

		$defaults['you_may_like_text']          = esc_html__( 'Related Post', 'blog-web' );

		$defaults['blog_web_sidebar']            ='right-sidebar';

		//Back To Top
		$defaults['newsletter_title']           = esc_html__( 'Keep Updated', 'blog-web' );
		$defaults['newsletter_description']     = esc_html__( 'We can send you love letters, if you will let us', 'blog-web' );


		//Back To Top
		$defaults['back_to_top']                = 'enable';

		// Footer.
		$defaults['copyright_text']             = esc_html__( 'Copyright &copy; All rights reserved.', 'blog-web' );

		// Breadcrumb.
		$defaults['breadcrumb_type']            = 'normal';

		///slider Excerpt Length
		$defaults['slider_excerpt_length']        = 15;
		
		// Home page slider cat selection
		$defaults['blog-web-feature-cat']         = 0;
		
		//slider active
		$defaults['blog-web_feature_post_status']= false;
		
		return $defaults;
	}

endif;

if ( ! function_exists( 'blog_web_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blog_web_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value            = '';

		$default          = blog_web_default_theme_options();

		$default_value    = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;


if ( ! function_exists( 'blog_web_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see blog_web_custom_header_setup().
 */
function blog_web_header_style() { 

$header_text_color = get_header_textcolor();
	if( !empty( $header_text_color ) ): ?>
		<style type="text/css">
			   .site-header a,
			   .site-header p{
					color: #<?php echo esc_attr( $header_text_color ); ?>;
			   }
		</style>
			
		<?php
	endif;
}

endif;


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_web_customize_preview_js() {
	wp_enqueue_script( 'blog-web-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_web_customize_preview_js' );
