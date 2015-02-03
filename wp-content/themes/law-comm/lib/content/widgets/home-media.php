<?php 
/**
 * Adds Media_Widget widget.
 */
class Media_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Media_Widget', // Base ID
			__( 'Media', 'text_domain' ), // Name
			array( 'description' => __( 'Media', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
  ?>
		<div class="media video-container side-item">
		  <h2>Latest media</h2>
			<div class="videoWrapper">
			  <?php echo get_post_meta( 6, "video-embed", true ); ?>
			</div>
		</div>
		  
	<?php	
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	
	}

} // class Media_Widget

// register Media_Widget widget
function register_media_Widget() {
    register_widget( 'Media_Widget' );
}
add_action( 'widgets_init', 'register_media_Widget' );