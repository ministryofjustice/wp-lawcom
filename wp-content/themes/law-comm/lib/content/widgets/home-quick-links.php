<?php 
/**
 * Adds QuickLinks_Widget widget.
 */
class QuickLinks_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'QuickLinks_Widget', // Base ID
			__( 'Quick Links', 'text_domain' ), // Name
			array( 'description' => __( 'Quick Links', 'text_domain' ), ) // Args
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
		<div class="quick-links">
  		<h2>Quick links</h2>
			<ul>
				<li class="ql1"><a href="<?php echo get_permalink( get_post_meta( 6, "quick-link-1-page", true )); ?>"><?php echo get_post_meta( 6, "quick-link-1", true ); ?> ><p><span>Search to find a project</span></p></a></li>
				<li class="ql2"><a href="<?php echo get_permalink( get_post_meta( 6, "quick-link-2-page", true )); ?>"><?php echo get_post_meta( 6, "quick-link-2", true ); ?> ><p><span>Search to find a consultation</span></p></a></li>
				<li class="ql3"><a href="<?php echo get_permalink( get_post_meta( 6, "quick-link-3-page", true )); ?>"><?php echo get_post_meta( 6, "quick-link-3", true ); ?> ><p><span>Search to find a publication</span></p></a></li>
			</ul>
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

} // class QuickLinks_Widget

// register QuickLinks_Widget widget
function register_quicklinks_Widget() {
    register_widget( 'QuickLinks_Widget' );
}
add_action( 'widgets_init', 'register_quicklinks_Widget' );