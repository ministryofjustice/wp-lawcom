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
		echo $args['before_widget'];
  ?>
		<h3>Search Documents</h3>
		<form>
  		<div class="form-group">
        <label for="title">Project Title</label>
        <select name="title" id="title" class="form-control">
          <option value="">--- Choose Project ---</option>
          <?php $pages = get_posts('numberposts=10&post_type=project'); ?>
          <?php foreach($pages as $page): ?>
            <option value="<?= $page->ID ?>"<?php if(get_query_var('project') == $page->ID) { echo ' selected="selected"'; } ?>><?= $page->post_title ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="title">Document Title</label>
        <select name="doc-title" id="doc-title" class="form-control">
          <option value="">--- Choose Document ---</option>
          <?php $pages = get_posts('numberposts=10&post_type=document'); ?>
          <?php foreach($pages as $page): ?>
            <option value="<?= $page->ID ?>"<?php if(get_query_var('document') == $page->ID) { echo ' selected="selected"'; } ?>><?= $page->post_title ?></option>
          <?php endforeach; ?>
        </select>
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
            'name' => 'teams'
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
            'name' => 'publication'
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
      <label for="start">Publication Date</label>
      <div class="input-daterange input-group form-group">
        <input type="text" class="input-sm form-control" name="start" />
        <span class="input-group-addon">to</span>
        <input type="text" class="input-sm form-control" name="end" />
      </div>      
      <div class="form-group">
        <label for="lccp">LC/CP Number</label>
        <input type="text" class="form-control" id="lccp" name="lccp" placeholder="Enter LC/CP" value="<?= get_query_var('lccp'); ?>">
      </div>
      <div class="form-group">
        <label for="keyword">Keyword</label>
        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword" value="<?= get_query_var('keyword'); ?>">
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

} // class Document_Widget

// register Document_Widget widget
function register_document_widget() {
    register_widget( 'Document_Widget' );
}
add_action( 'widgets_init', 'register_Document_widget' );