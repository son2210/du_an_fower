<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blog-web
 */
$sidebar_class = blog_web_get_option( 'blog_web_sidebar' );
get_header();
?>
    <div id="blog-main">
        <div class="container">
            <div class="row <?php if ( $sidebar_class == "left-sidebar" ) { echo "flex-row-reverse"; } ?> ">
                <div class="col-md-8 col-width-70">
                    <div class="blog-post-list">
                        <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <h1 class="page-title">
                                    <?php
                                    /* translators: %s: search query. */
                                    printf( esc_html__( 'Search Results for: %s', 'blog-web' ), '<span>' . get_search_query() . '</span>' );
                                    ?>
                                </h1>
                            </header><!-- .page-header -->

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/post/content', 'search' );

                            endwhile;?>

                             <ul class="pagination pagination-lg">
                            <?php the_posts_pagination(); ?>
                        </ul>

                    <?php    else :

                            get_template_part( 'template-parts/post/content', 'none' );

                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-width-30">
                    <aside class="sidebar-main">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div>
        </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
