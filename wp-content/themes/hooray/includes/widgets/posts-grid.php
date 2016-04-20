<?php
add_action( 'widgets_init', 'bdayh_posts_grid' );
function bdayh_posts_grid() {
	register_widget( 'bdayh_posts_grid' );
}

class bdayh_posts_grid extends WP_Widget
{
	function bdayh_posts_grid()
	{
		$widget_ops = array( 'classname' => 'bd-posts-grid', 'description' => 'Widget display Posts order by : Best Reviews Or Recent Posts Or Random Posts Or Last Modified Or Post Name Or Popular Posts / Comments Or Popular Posts / Views' );
		$control_ops = array( 'id_base' => 'bd-posts-grid' );
		parent::__construct( 'bd-posts-grid', '.: Bdaia - Posts grid', $widget_ops, $control_ops );
	}

	function widget( $args, $instance )
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
		$offset = $instance['offset'];
		$posts_order = $instance['posts_order'];

		echo $before_widget;
		if($title) {
			echo $before_title.$title.$after_title;
		}

		## Widget Posts grid
		bdayh_widget_posts_grid( $number, $args['widget_id'], $offset, $posts_order, '' );

		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['offset'] = strip_tags( $new_instance['offset'] );
		$instance['posts_order']   = strip_tags( $new_instance['posts_order'] );
		return $instance;
	}

	function form( $instance )
	{
		$defaults = array( 'title' =>__( 'Recent Posts' , LANG ), 'number' => '5' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', LANG )?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>

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
				<option value="date" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Most recent', LANG ); ?></option>
				<option value="rand" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Random Posts', LANG ); ?></option>
				<option value="modified" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'modified' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Last Modified', LANG ); ?></option>
				<option value="name" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'name' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Post Name', LANG ); ?></option>
				<option value="popular" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'popular' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Popular / Comments', LANG ); ?></option>
				<option value="views" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'views' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Popular / Views', LANG ); ?></option>
				<option value="best" <?php if( !empty( $instance['posts_order'] ) && $instance['posts_order'] == 'best' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Best Reviews', LANG ); ?></option>
			</select>
		</p>
		<?php
	}
}
?>