<?php 
/**
 * Adds Project_Widget widget.
 */
class Project_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'project_widget', // Base ID
			__( 'Project Search', 'text_domain' ), // Name
			array( 'description' => __( 'Project Search', 'text_domain' ), ) // Args
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
		<h3>Search Projects</h3>
		<form>
  		<div class="form-group">
        <label for="title">Title</label>
        <select name="title" id="title" class="form-control">
          <option value="">--- Choose Project ---</option>
          <?php $pages = get_posts('numberposts=10&post_type=project'); ?>
          <?php foreach($pages as $page): ?>
            <option value="<?= $page->ID ?>"<?php if(get_query_var('title') == $page->ID) { echo ' selected="selected"'; } ?>><?= $page->post_title ?></option>
          <?php endforeach; ?>
        </select>
      </div>
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
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword" value="<?= get_query_var('keyword'); ?>">
      </div>
      <input type="submit" value="Search" class="btn btn-primary">
      <input type="reset" value="Clear" class="btn btn-default">	
		</form>
		  
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

} // class Project_Widget

// register Project_Widget widget
function register_project_widget() {
    register_widget( 'Project_Widget' );
}
add_action( 'widgets_init', 'register_project_widget' );