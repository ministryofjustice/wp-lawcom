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
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword">
      </div>
      <div class="form-group">
        <label for="lccp">LC/CP</label>
        <input type="text" class="form-control" id="lccp" name="lccp" placeholder="Enter LC/CP">
      </div>
      <label for="lccp">Publication Date</label>
      <div class="input-daterange input-group form-group">
        <input type="text" class="input-sm form-control" name="start" />
        <span class="input-group-addon">to</span>
        <input type="text" class="input-sm form-control" name="end" />
      </div>
      <?php $areas = get_terms('areas_of_law'); if(!empty($areas)): ?>
      <div class="form-group">
        <label for="area-of-law">Area of Law</label>
        <select name="area-of-law" id="area-of-law" class="form-control">
          <option value=""></option>
          <?php foreach($areas as $area): ?>
            <option value="<?= $area->term_id ?>"><?= $area->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <?php endif; ?>
      <?php $teams = get_terms('team'); if(!empty($team)): ?>
      <div class="form-group">
        <label for="team">Team</label>
        <select name="team" id="team" class="form-control">
          <option value=""></option>
          <?php foreach($teams as $team): ?>
            <option value="<?= $team->term_id ?>"><?= $team->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <?php endif; ?>
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