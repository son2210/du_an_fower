<?php
/**
 * Displays footer site info
 *
 * @package blog-web
 * @version 1.0.0
 */
?>
<footer id="footer-main">
    <div class="container">
        <div class="row align-items-center">
            <!--col-md-12-->
            <div class="col-md-12">
                <div class="copyright">
                    <?php $copyright_text = blog_web_get_option( 'copyright_text' );

                    if ( ! empty( $copyright_text ) ) : ?>

                        <?php echo wp_kses_data( $copyright_text ); ?>

                    <?php endif; ?>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blog-web' ) ); ?>">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf( esc_html__( 'Proudly Powered by %s', 'blog-web' ), 'WordPress' );
                        ?>
                    </a>
                    <span class="sep"><?php esc_html_e('|','blog-web') ?></span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'blog-web' ), 'Blog Web', '
                        <a href="'.esc_url('https://www.thememiles.com)').'">ThemeMiles</a>' );
                    ?>
                </div>
                <!--copyright-->
            </div>
            <!--col-md-12-->
        </div>
        <!--row-->
    </div>
    <!--container-->

    <?php $back_to_top_type = blog_web_get_option( 'back_to_top_type' );

    if($back_to_top_type == 'enable') : ?>

        <a href="#" id="return-to-top"><i class="fas fa-angle-up"></i></a>

    <?php endif; ?>

</footer>
<!--footer-main-->