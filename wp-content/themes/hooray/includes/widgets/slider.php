<?php
add_action( 'widgets_init', 'bd_slider' );
function bd_slider(){
    register_widget( 'bd_slider' );
}

class bd_slider extends WP_Widget
{
    function bd_slider()
    {
        $widget_ops = array('classname' => 'bd-slider', 'description' => 'Widget display posts in slider');
        $control_ops = array('id_base' => 'bd-slider');
        parent::__construct('bd-slider', '.: Bdaia - Slider', $widget_ops, $control_ops);
    }

    function widget( $args, $instance )
    {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title'] );
        $number = $instance['number'];
        $offset = $instance['offset'];
        $categories = $instance['categories'];
        $posts_order = $instance['posts_order'];

        ## Widget Slider
        bdayh_widget_slider( $number, $categories, $args['widget_id'], $offset, $posts_order );
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = strip_tags( $new_instance['number'] );
        $instance['offset'] = strip_tags( $new_instance['offset'] );
        $instance['posts_order']   = strip_tags( $new_instance['posts_order'] );
        $instance['categories'] = implode(',' , $new_instance['categories']  );
        return $instance;
    }

    function form( $instance )
    {
        $defaults = array( 'title' =>__( 'Slider Posts' , LANG ), 'number' => '5' );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ## GET Categories
        $categories_obj = get_categories();
        $categories = array();
        foreach ($categories_obj as $pn_cat) {
            $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show' , LANG ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'offset' ); ?>"><?php _e( 'Offset - number of posts to pass over' , LANG ); ?></label>
            <input id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" value="<?php echo $instance['offset']; ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'posts_order' ); ?>"><?php _e( 'Posts Order', LANG );?></label>
            <select id="<?php echo $this->get_field_id( 'posts_order' ); ?>" name="<?php echo $this->get_field_name( 'posts_order' ); ?>" >
                <option value="date" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Latest Posts', LANG ); ?></option>
                <option value="rand" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Random Posts', LANG ); ?></option>
                <option value="modified" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'modified' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Last Modified', LANG ); ?></option>
                <option value="name" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'name' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Post Name', LANG ); ?></option>
            </select>
        </p>

        <p>
            <?php $cats_id = explode ( ',' , $instance['categories'] ) ; ?>
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Select Category' , LANG ); ?></label>
            <select multiple="multiple" id="<?php echo $this->get_field_id( 'categories' ); ?>[]" name="<?php echo $this->get_field_name( 'categories' ); ?>[]">
                <?php foreach ($categories as $key => $option) { ?>
                    <option value="<?php echo $key ?>" <?php if ( in_array( $key , $cats_id ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </p>
    <?php
    }
}
?>