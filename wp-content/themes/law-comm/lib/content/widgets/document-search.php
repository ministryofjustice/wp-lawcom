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
		<h3>Search Documents</h3>
		<form action="/document" method="get">
  		<div class="form-group">
        <label for="title">Project Title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= test_input(get_query_var( 'title' )); ?>">
      </div>

      <div class="form-group">
        <label for="title">Document Title</label>
        <input type="text" name="doc-title" id="doc-title" class="form-control" value="<?= test_input(get_query_var( 'doc-title' )); ?>">
      </div>

      <?php $areas = get_terms('team', 'hide_empty=0'); if(!empty($areas)): ?>
      <div class="form-group">
        <label for="publication">Team</label>
        <?php
          wp_dropdown_categories(array(
            'show_option_all' => '--- Choose Team ---',
            'taxonomy' => 'team',
            'hide_empty' => 0,
            'hierarchical' => 1,
            'class' => 'form-control',
            'name' => 'teams',
            'selected' => test_input(get_query_var( 'teams' ))
          ));
        ?>
      </div>
      <?php endif; ?>

      <?php $areas = get_terms('document_type', 'hide_empty=0'); if(!empty($areas)): ?>
      <div class="form-group">
        <label for="publication">Document Type</label>
        <?php
          wp_dropdown_categories(array(
            'show_option_all' => '--- Choose Type ---',
            'taxonomy' => 'document_type',
            'hide_empty' => 0,
            'hierarchical' => 1,
            'class' => 'form-control',
            'name' => 'publication',
            'selected' => test_input(get_query_var( 'publication' ))
          ));
        ?>
      </div>
      <?php endif; ?>

      <?php $areas = get_terms('areas_of_law'); if(!empty($areas)): ?>
      <div class="form-group">
        <label for="area_of_law">Area of Law</label>
        <select name="area_of_law" id="area_of_law" class="form-control">
          <option value=""></option>
          <?php foreach($areas as $area): ?>
            <option value="<?= $area->term_id ?>"<?php if(get_query_var('area_of_law') == $area->term_id) { echo ' selected="selected"'; } ?>><?= $area->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <?php endif; ?>
      <label for="start">Publication Date</label>
      <div class="input-daterange input-group form-group">
        <input type="text" class="input-sm form-control" name="start" value="<?= test_input(get_query_var( 'start' )); ?>" />
        <span class="input-group-addon">to</span>
        <input type="text" class="input-sm form-control" name="end" value="<?= test_input(get_query_var( 'end' )); ?>" />
      </div>
      <div class="form-group">
        <label for="lccp">LC/CP Number</label>
        <input type="text" class="form-control" id="lccp" name="lccp" placeholder="Enter LC/CP" value="<?= test_input(get_query_var('lccp')); ?>">
      </div>
      <input type="submit" value="Search" class="btn btn-primary">
      <input type="reset" value="Clear" class="btn btn-default">
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
