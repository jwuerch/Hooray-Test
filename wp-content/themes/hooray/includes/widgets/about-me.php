<?php
add_action( 'widgets_init', 'bd_aboutme_widget' );
function bd_aboutme_widget() {
    register_widget( 'bd_aboutme_widget' );
}

class bd_aboutme_widget extends WP_Widget {

    function bd_aboutme_widget() {
        $widget_ops     = array( 'classname' => 'bd-aboutme-widget', 'description' => 'About me widget' );
        $control_ops    = array( 'width' => 250, 'height' => 350, 'id_base' => 'bd-aboutme-widget' );
        parent::__construct( 'bd-aboutme-widget', '.: Bdaia - About me' , $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {

        extract( $args );
        $title      = apply_filters( 'widget_title', $instance['title'] );
        $me_text    = $instance['me_text'];
        $me_image    = $instance['me_image'];

        echo $before_widget;
        if($title) {
            echo $before_title.$title.$after_title;
        }

        ?>

        <?php if( $me_image ){ ?>
            <div class="about-me-img">
                <figure class="featured-thumbnail thumbnail large">
                    <img src="<?php echo $me_image ?>" alt="" />
                </figure>
            </div><br>
        <?php } ?>

        <?php if( $me_text ){ ?>
            <div class="about-me-text"><?php echo $me_text ?></div>
        <?php } ?>

        <?php
        echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['me_image']   = $new_instance['me_image'];
        $instance['me_text']   = $new_instance['me_text'];

        return $instance;
    }
    function form( $instance ) {

        wp_enqueue_media();

        $defaults = array( 'title' =>__( 'About Me' , LANG ));
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', LANG ) ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'me_image' ); ?>"><?php _e( 'Upload Image', LANG ) ?></label>

            <input style="width: 100% !important; margin-bottom: 5px !important;" id="<?php echo $this->get_field_id( 'me_image' ); ?>" name="<?php echo $this->get_field_name( 'me_image' ); ?>" value="<?php echo $instance['me_image']; ?>" class="widefat img-path upload-url bd-upload-url" type="text" />
            <input id="upload_<?php echo $this->get_field_id( 'me_image' ); ?>_button" type="button" class="button button-primary widget-control-save" value="<?php _e( 'Upload', LANG )  ?>" />

            <script>
            bd_set_uploader( '<?php echo $this->get_field_id( 'me_image' ); ?>' );
            </script>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'me_text' ); ?>"><?php _e( 'About Yourself', LANG ) ?></label>
            <textarea rows="15" id="<?php echo $this->get_field_id( 'me_text' ); ?>" name="<?php echo $this->get_field_name( 'me_text' ); ?>" class="widefat" ><?php echo $instance['me_text']; ?></textarea>
        </p>
    <?php
    }

}
?>