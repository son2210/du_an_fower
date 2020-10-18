<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blog-web
 */
$sidebar_class = blog_web_get_option( 'blog_web_sidebar' );
get_header();
?>
    <div id="blog-main">
    <div class="container">
        <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?>">
            <div class="col-md-8 col-width-70">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blog-web' ); ?></h1>
                            </header><!-- .page-header -->

                            <div class="page-content">
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blog-web' ); ?></p>

                                <?php
                                get_search_form();
                                ?>

                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->
                    </main><!-- #main -->
                </div>
            </div>
            <div class="col-md-4 col-width-30">
                <aside class="sidebar-main">
                    <?php get_sidebar(); ?>
                </aside>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
