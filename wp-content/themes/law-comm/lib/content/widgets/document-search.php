<?php
/**
 * Adds Document_Widget widget.
 */
class Document_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Document_widget', // Base ID
			__( 'Document Search', 'text_domain' ), // Name
			array( 'description' => __( 'Document Search', 'text_domain' ), ) // Args
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
    if(is_post_type_archive( 'document' )):
		echo $args['before_widget'];
  ?>
		<h3>Search Publications and Consultations</h3>
		<form action="/document" method="get">
      <div class="form-group">
        <label for="keywords">Publication Name or Reference</label>
        <input type="text" name="keywords" id="keywords" class="form-control" value="<?= test_input(get_query_var('keywords')); ?>" placeholder="e.g. &quot;adult social care&quot;, or &quot;CP192&quot;">
      </div>

  		<!-- <div class="form-group">
        <label for="project-title">Project Title or Keywords</label>
        <input type="text" name="project-title" id="project-title" class="form-control" value="<?= test_input(get_query_var( 'project-title' )); ?>">
      </div>

      <div class="form-group">
        <label for="title">Document Title</label>
        <input type="text" name="doc-title" id="doc-title" class="form-control" value="<?= test_input(get_query_var( 'doc-title' )); ?>">
      </div> -->

      <div class="form-group">
        <label for="publication">Document Type</label>
        <?php
          wp_dropdown_categories(array(
            'show_option_all' => 'Any document type',
            'taxonomy' => 'document_type',
            'hide_empty' => 0,
            'hierarchical' => 1,
            'class' => 'form-control',
            'name' => 'publication',
            'selected' => test_input(get_query_var( 'publication' ))
          ));
        ?>
      </div>

      <div class="form-group">
        <label for="area_of_law">Area of Law</label>
        <?php
        wp_dropdown_categories(array(
          'show_option_all' => 'Any area of law',
          'taxonomy' => 'areas_of_law',
          'hide_empty' => 0,
          'hierarchical' => 1,
          'class' => 'form-control',
          'name' => 'area_of_law',
          'selected' => test_input(get_query_var( 'area_of_law' ))
        ));
        ?>
      </div>

      <input type="submit" value="Search" class="btn btn-primary btn-block">
		</form>

	<?php
		echo $args['after_widget'];
    endif;
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

} // class Document_Widget

// register Document_Widget widget
function register_document_widget() {
    register_widget( 'Document_Widget' );
}
add_action( 'widgets_init', 'register_Document_widget' );
