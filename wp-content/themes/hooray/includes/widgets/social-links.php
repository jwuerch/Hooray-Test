<?php
// Widget Social Links.
add_action( 'widgets_init', 'bd_sociallinks' );
function bd_sociallinks()
{
    register_widget( 'bd_social_links' );
}

class bd_social_links extends WP_Widget
{
    function bd_social_links()
    {
        $widget_ops = array('classname' => 'bd-social-links', 'description' => 'Widget Social links');
        $control_ops = array('id_base' => 'bd-social-links');
        parent::__construct('bd-social-links', '.: Bdaia - Social Links', $widget_ops, $control_ops);
    }

    function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title'] );

        echo $before_widget;
        if($title) {
            echo $before_title.$title.$after_title;
        }

        echo '<div class="widget-social-links">' ."\n";
            echo bd_social('yes', 16, 'ttip');
        echo "\n" .'</div>'. "\n";

        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }

    function form( $instance )
    {
        $defaults = array( 'title' =>__( 'Follow Me' , LANG ) );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ','bd')?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
        <?php
    }

}
?>