<?php 
/**
 * Adds Signup_Widget widget.
 */
class Signup_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Signup_Widget', // Base ID
			__( 'Signup', 'text_domain' ), // Name
			array( 'description' => __( 'Signup', 'text_domain' ), ) // Args
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
  <div class="signup side-item">
  		<h3>Publication updates</h3>
			<div class="form-group">
		  		<label for="emailSignup">Email address</label>
                <form action="https://public.govdelivery.com/accounts/UKMOJ/subscribers/qualify" method="post">
                  <input type="text" class="form-control" name="emailSignup"  id="emailSignup">
                  <input type="submit" alt="Subscribe" class="btn btn-default" value="Subscribe">
               </form>
               <p>Also gives you access to other government law-related updates.</p>
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

} // class Signup_Widget

// register Signup_Widget widget
function register_signup_Widget() {
    register_widget( 'Signup_Widget' );
}
add_action( 'widgets_init', 'register_signup_Widget' );