<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blog-web
 */

// Custom image.
global $header_image, $header_style, $breadcrumb_bg_image,$breadcrumb_bg_style;
$header_image = get_header_image();


if( $header_image ){
    $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
} else{

    echo $header_style = '';
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
  if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
    }
    else { do_action( 'wp_body_open' ); }

    ?>   

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e( 'Skip to content', 'blog-web' ); ?> </a>

    <div class="home-top-section">
        <div class="welcome-banner"<?php echo $header_style; ?>">
    </div>
    <!--welcome-banner-->

    <header id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

                    <!--page-logo-->
                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </header>
    <!--main-header-->
</div>
<!--home-top-section-->
<div id="main-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav class="navbar navbar-page-custom">
                    <?php wp_nav_menu(array(
                        'container'       =>  '',
                        'theme_location'	=> 'primary',
                        'menu_class'		  =>  'navbar-nav'
                    ));
                    ?>
                    <?php endif; ?>
                    <!--navbar-nav-->
                    <div class="navbar-component social-links">
                        
                         <div class="menu-social-container">
                                     <?php if ( has_nav_menu( 'social' ) ) : ?>
                                  
                                           <?php wp_nav_menu( array(
                                                'theme_location' => 'social',
                                                'menu_id'        => 'social',
                                                'menu_class'     => 'social-info list-inline',
                                            ) ); 
                                         
                                            ?>
                 
               
                                    <?php endif; ?>

                            </div>
                           <div class="search ">
                            <div class="search-open">

                                <a href="#" data-toggle="modal" id ="search_popup" data-target="#modalSearch"><i class="fas fa-search"></i></a>
                            </div>


                           
                        </div>
                        <!--search-->

                        <a href="#" class="menu-toggle" id="btn-rollover">
                        	<span class="menu-humburger">
                          </span>
                        </a><!--menu-toggle-->
                    </div>
                    <!--navbar-component-->
                </nav>
                <!--navbar-->
            </div>
            <!--col-md-12-->
        </div>
        <!--row-->
    </div>
    <!--container-->
</div>
<!--main-nav-->
<!--seach overlay-->
<div class="modal search-overlay" id="modalSearch">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="search-box-wrap">
                    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="text" id="popup_search" placeholder="<?php echo esc_attr_x( 'Search Here &hellip;', 'placeholder', 'blog-web' ); ?>" value="<?php echo get_search_query(); ?>" name="s" class="search-input">
                        <button type="submit" class="search-btn">
                            <i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="close" data-dismiss="modal"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/close-icon.svg" alt=""></button>
</div>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <div class="overlay-body-nav"></div>
    <nav class="navbar navbar-moblie-custom" id ="navbar-mobile-custom">
        
        <?php
            wp_nav_menu(array(
                'container'       =>  '',
                'theme_location'	=> 'primary',
                'menu_class'		  =>  'navbar-nav-mobile',
            ));
        ?>
        <a href="#" class="menu-close-mobile">
            <i class="fas fa-times"></i>
        </a>
    </nav>
<?php endif; ?>
