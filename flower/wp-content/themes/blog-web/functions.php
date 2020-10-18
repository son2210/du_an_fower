<?php
/**
 * blogWeb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog-web
 */

if ( ! function_exists( 'blog_web_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function blog_web_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on blogWeb, use a find and replace
         * to change 'blog-web' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'blog-web' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'blog-web' ),
            'social'     => __( 'Social Links Menu', 'blog-web' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'blog_web_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        
        $defaults = array(
            	'default-image'          => '',
            	'width'                  => 1349,
            	'height'                 => 220,
            	'flex-height'            => false,
            	'flex-width'             => false,
            	'uploads'                => true,
            	'random-default'         => false,
            	'header-text'            => true,
            	'default-text-color'     => '',
            	'wp-head-callback'       => '',
            	'admin-head-callback'    => '',
            	'admin-preview-callback' => '',
            );
            add_theme_support( 'custom-header', $defaults );
        
        

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'blog_web_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_web_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'blog_web_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_web_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_web_widgets_init() {
    register_sidebar( array(
        'name'          		=> esc_html__( 'Sidebar', 'blog-web' ),
        'id'            		=> 'sidebar-1',
        'description'   		=> esc_html__( 'Add widgets here.', 'blog-web' ),
        'before_widget' 		=> '<section id="widget-category"><div class="list-category-widget border-bottom %2$s">',
        'after_widget'  		=> '</div></section>',
        'before_title'  		=> '<h4 class="title-bdr color-back"><b>',
        'after_title'   		=> '</b></h4>',
        'before_title_author'	=>	'<h4 class="title-bdr color-white"><b class="color-red-light">',
        'after_title_author'	=>	'</b></h4>',
        'before_title_social'   =>  '<h4 class="title-bdr color-back"><b>',
        'after_title_social'    =>  '</b></h4>',
    ) );
}
add_action( 'widgets_init', 'blog_web_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_web_scripts() {

   /*body  */
    wp_enqueue_style('blog-web-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
  
   wp_enqueue_style( 'blog-web-google-fonts', 'https:///fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap', array(), null);
  
   wp_enqueue_style( 'blog-web-google-fonts2', 'https://fonts.googleapis.com/css?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&display=swap', array(), null);
    

    wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', array(), null);

    //Bootstrap stylesheet.
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

    //Fonts web stylesheet.
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );

    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );

    //Fonts web stylesheet.
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css' );

    // Theme stylesheet.
    wp_enqueue_style( 'blog-web-style', get_stylesheet_uri() );

    /*RTL CSS*/
    wp_style_add_data( 'blog-web-style', 'rtl', 'replace' );

    //Responsive web stylesheet.
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );


    wp_enqueue_script( 'blog-web-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'blog-web-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );


    wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'slick.min', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20151215', true );

     $hide_sticky_sidebar   = blog_web_get_option( 'post_sticky_sidebar' );
    
    if( $hide_sticky_sidebar != 1 )
    {
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), time(), true );
        
        wp_enqueue_script( 'blog-web-sticky-sidebar', get_template_directory_uri() . '/assets/js/sticky-sidebar.js', array('jquery'), time(), true );

        
    }   

    wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'blog_web_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * hooks function.
 */
require get_parent_theme_file_path( '/inc/hooks.php' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Breadcrumb.
 */
require get_parent_theme_file_path( '/template-parts/header/breadcrumb.php' );

/**
 * Widgets.
 */

require( get_template_directory() . '/widgets/recent-post-widget.php' );

require( get_template_directory() . '/widgets/blog-web-author-widget.php' );

/**
 * Load Upgrade to pro
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/*
Function to load admin js
*/
if (!function_exists('blog_web_widgets_backend_enqueue')) :
    function blog_web_widgets_backend_enqueue($hook)
    {
        

        wp_enqueue_style('blog-web-customizer-style', get_template_directory_uri() . '/assets/css/customizer-style.css', array(), true);

        wp_register_script('blog-web-custom-widgets', get_template_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('blog-web-custom-widgets');
    }

    add_action('admin_enqueue_scripts', 'blog_web_widgets_backend_enqueue');
endif;


function new_excerpt_more( $more ) {
    return ' ';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Load Bradcrumb
*/
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load TGM File
*/
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Plugin recommendation using TGM
*/
require get_template_directory() . '/inc/tgm-plugin-activation.php';



