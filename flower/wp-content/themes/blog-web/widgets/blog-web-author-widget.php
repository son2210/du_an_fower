<?php

class Blog_Web_Author_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'author-widget',
            __( 'TM: Author Widget', 'blog-web' ),
            array( 'description' => __( 'Best displayed in Sidebar.', 'blog-web' ) )
        );
    }

    public function widget( $args, $instance )
    {
        extract( $args );
        if(!empty($instance))
        {
            $facebook      = $instance['facebook'];
            $twitter       = $instance['twitter'];
            $instagram     = $instance['instagram'];
            $linkedin      = $instance['linkedin'];
            $youtube       = $instance['youtube'];
            $image         = $instance['image_uri'];
            $title_social  = $instance['title_social'];
            $title         = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );


            if( !empty($image))
            {
                ?>
                <section id="about-author">
                    <div class="about-us-content">
                        <?php
                        if(!empty($title)) {
                            ?>
                            <?php echo $args['before_title_author'] . $title . $args['after_title_author']; ?>
                        <?php } ?>
                        <figure class="author-image">
                            <img src="<?php echo esc_url( $instance['image_uri'] );?>" alt="about me">
                        </figure>
                        <p><?php echo wp_kses_post( $instance['description'] );?></p>

                    </div>

                    <div class="social-media border-bottom">
                        <?php
                        if(!empty($title_social)) {
                        ?>
                      
                         <?php echo $args['before_title_social'] . $title_social . $args['after_title_social']; ?>
                      
                        <?php } ?>
                        <ul class="list-social-media d-flex">
                            <?php
                            if ( !empty( $facebook ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url( $facebook ); ?>" ><i class="fab fa-facebook-f"></i></a>
                                </li>
                            <?php }
                            if ( !empty( $twitter ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url( $twitter ); ?>" >
                                        <i class="fab fa-twitter"></i></a>
                                </li>
                            <?php }
                            if ( !empty( $linkedin ) ) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( $linkedin ); ?>"><i class="fab fa-linkedin"></i></a>
                                </li>
                                <?php
                            }
                            if ( !empty( $instagram) ) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( $instagram); ?>">
                                        <i class="fab fa-instagram"></i></a>
                                </li>
                                <?php
                            }
                            if ( !empty( $youtube ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url( $youtube ); ?>">
                                        <i class="fab fa-youtube"></i></a>
                                </li>
                                <?php
                            }

                            ?>
                        </ul>
                    </div>
                </section>
                <?php
            }
        }
    }

    public function update( $new_instance, $old_instance ){
        $instance                = $old_instance;
        $instance['title']       = sanitize_text_field( $new_instance['title'] );
        $instance['description'] = wp_kses_post( $new_instance['description'] );
        $instance['title_social']= sanitize_text_field( $new_instance['title_social'] );
        $instance['image_uri']   = esc_url_raw( $new_instance['image_uri'] );
        $instance['facebook']    = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter']     = esc_url_raw( $new_instance['twitter'] );
        $instance['instagram']   = esc_url_raw( $new_instance['instagram'] );
        $instance['linkedin']    = esc_url_raw( $new_instance['linkedin'] );
        $instance['youtube']     = esc_url_raw( $new_instance['youtube'] );
        return $instance;
    }

    public function form($instance ){
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">
                <?php _e( 'Image', 'blog-web' ); ?>
            </label>
            <br />
            <?php
            if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . esc_url( $instance['image_uri'] ) . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php
            if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                echo esc_url( $instance['image_uri'] );
            endif;
            ?>" style="margin-top:5px;">
            <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'blog-web' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','blog-web'); ?>" data-button="<?php esc_attr_e( 'Select Image','blog-web'); ?>"/>
            <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'blog-web' ); ?>" class="button media-image-remove" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php
            if (isset($instance['title']) && $instance['title'] != '' ) :
                echo esc_attr($instance['title']);
            endif;

            ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Description', 'blog-web' ); ?></label><br />
            <textarea  rows="8" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"  class="widefat" ><?php

                if (isset($instance['description']) && $instance['description'] != '' ) :
                    echo esc_textarea( $instance['description'] );
                endif;
                ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title_social'); ?>"><?php _e( 'Title', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo $this->get_field_name('title_social'); ?>" id="<?php echo $this->get_field_id('title_social'); ?>" value="<?php if (isset($instance['title_social']) && $instance['title_social'] != '' ) :
                echo esc_attr($instance['title_social']);
            endif;

            ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>"><?php _e( 'Facebook', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>" id="<?php echo esc_attr( $this->get_field_id('facebook')); ?>" value="<?php
            if (isset($instance['facebook']) && $instance['facebook'] != '' ) :
                echo esc_attr($instance['facebook']);
            endif;

            ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>"><?php _e( 'Twitter', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>" id="<?php echo esc_attr( $this->get_field_id('twitter')); ?>" value="<?php
            if (isset($instance['twitter']) && $instance['twitter'] != '' ) :
                echo esc_attr($instance['twitter']);
            endif;

            ?>" class="widefat" />
        </p>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>"><?php _e( 'Instagram', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('instagram') ); ?>" id="<?php echo esc_attr( $this->get_field_id('instagram')); ?>" value="<?php
            if (isset($instance['instagram']) && $instance['instagram'] != '' ) :
                echo esc_attr($instance['instagram']);
            endif;

            ?>" class="widefat" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>"><?php _e( 'Linkedin', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>" id="<?php echo esc_attr( $this->get_field_id('linkedin')); ?>" value="<?php
            if (isset($instance['linkedin']) && $instance['linkedin'] != '' ) :
                echo esc_attr($instance['linkedin']);
            endif;

            ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>"><?php _e( 'Youtube', 'blog-web' ); ?></label><br />
            <input type="text" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>" id="<?php echo esc_attr( $this->get_field_id('youtube')); ?>" value="<?php
            if (isset($instance['youtube']) && $instance['youtube'] != '' ) :
                echo esc_attr($instance['youtube']);
            endif;

            ?>" class="widefat" />
        </p>
        <?php
    }
}


add_action( 'widgets_init', 'blog_web_author_widget' );
function blog_web_author_widget(){
    register_widget( 'Blog_Web_Author_Widget' );

}






