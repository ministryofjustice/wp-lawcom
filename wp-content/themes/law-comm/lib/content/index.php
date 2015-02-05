<?php
  
$cpts = scandir( get_template_directory() . "/lib/content/cpt/" );
foreach ( $cpts as $cpt ) {
	if ( $cpt[0] != "." )
		require get_template_directory() . '/lib/content/cpt/' . $cpt;
}

$taxonomies = scandir( get_template_directory() . "/lib/content/taxonomies/" );
foreach ( $taxonomies as $taxonomy ) {
	if ( $taxonomy[0] != "." )
		require get_template_directory() . '/lib/content/taxonomies/' . $taxonomy;
}

$widgets = scandir( get_template_directory() . "/lib/content/widgets/" );
foreach ( $widgets as $widget ) {
	if ( $widget[0] != "." )
		require get_template_directory() . '/lib/content/widgets/' . $widget;
}

$queries = scandir( get_template_directory() . "/lib/content/custom-queries/" );
foreach ( $queries as $query ) {
	if ( $query[0] != "." )
		require get_template_directory() . '/lib/content/custom-queries/' . $query;
}

require( trailingslashit( get_template_directory() ) . 'advanced-custom-fields/acf.php' );
require( trailingslashit( get_template_directory() ) . 'acf-gallery/acf-gallery.php' );
require( trailingslashit( get_template_directory() ) . 'acf-options-page/acf-options-page.php' );
require( trailingslashit( get_template_directory() ) . 'acf-repeater/acf-repeater.php' );
require( trailingslashit( get_template_directory() ) . 'lib/content/metaboxes.php' );

/**
 * Hide editor on homepage.
 *
 */
add_action('init', 'remove_editor_init');
function remove_editor_init() {
    // if post not set, just return 
    // fix when post not set, throws PHP's undefined index warning
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    } else {
        return;
    }
    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
    if ($template_file == 'page-home.php') {
        remove_post_type_support('page', 'editor');
    }
}

/**
 * change_title function.
 * 
 * @access public
 * @param mixed $post_id
 * @param mixed $post
 * @param mixed $update
 * @return void
 */
function change_title($post_id, $post, $update) {
  if ($post->post_type == 'document' ) {   
    $title = get_field('title',$post_id);
    $content = get_field('description',$post_id);
    remove_action('save_post', 'change_title');
    wp_update_post(array('ID' => $post_id, 'post_title' => $title, 'post_content' => $content));
    add_action('save_post', 'change_title');
  }
}
add_action('save_post', 'change_title', 10, 3);

/**
 * remove_document_meta function.
 * 
 * @access public
 * @return void
 */
function remove_document_meta() {
	remove_meta_box( 'document_typediv','document', 'side' );
}
add_action( 'admin_menu' , 'remove_document_meta' );

/**
 * my_acf_admin_head function.
 * 
 * @access public
 * @return void
 */
function my_acf_admin_head()
{
	?>
	<script type="text/javascript">
	(function($){
		
		function hide_fields()
		{
			$('li a[data-key=field_54d37487ca2f9], li a[data-key=field_54d374b0584bb], li a[data-key=field_54d3749a584ba], li a[data-key=field_54d374c4584bc]').hide();
		}
				
		$(document).live('acf/setup_fields', function(e, postbox){	
      
      $('#acf-field-primary option').each(function(idx, el){
        
        var $el = $(el), text;
        
        text = $el.text();
        
        if(text.indexOf('—') === -1){
          $el.addClass('parent');
        }
        
      });
      
      $('select').trigger('change');
      
		});
		
		
		/*
		*  Hero Type change
		*/
		
		$('#acf-field-primary').live('change', function(){
  		
			parentCheck = $(this).find("option:selected").hasClass('parent')
      child = $(this).find("option:selected").prevAll('.parent').first().text();
      parent = $(this).find("option:selected").text();
      
			hide_fields();

      if((parentCheck && parent == "Consultation") || (!parentCheck && child == "Consultation") )
			{
				$('li a[data-key=field_54d3749a584ba]').show();
			} else if((parentCheck && parent == "Other Project documents and downloads") || (!parentCheck && child == "Other Project documents and downloads" ))
			{
				$('li a[data-key=field_54d374b0584bb]').show();
			} else if((parentCheck && parent == "Project related documents and downloads") || (!parentCheck && child == "Project related documents and downloads" ))
			{
				$('li a[data-key=field_54d374c4584bc]').show();
			} else if((parentCheck && parent == "Report") || (!parentCheck && child == "Report" ))
			{
				$('li a[data-key=field_54d37487ca2f9]').show();
			}
			
		});
		
	
	})(jQuery);
	</script>
	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');