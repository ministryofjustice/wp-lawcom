<?php

require( trailingslashit( get_template_directory() ) . 'lib/content/document_meta_box.php' );
require( trailingslashit( get_template_directory() ) . 'lib/content/custom-queries.php' );

// Hide ACF from the admin menu
add_filter('acf/settings/show_admin', '__return_false');

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

function my_post_object_query( $args, $field, $post )
{
    $args['exclude'] = $post->ID;
    return $args;
}
add_filter('acf/fields/post_object/query/name=parent_project', 'my_post_object_query', 10, 3);

/**
 * remove_editor_init function.
 *
 * @access public
 * @return void
 */
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
add_action('init', 'remove_editor_init');

/**
 * change_title function.
 *
 * @access public
 * @param mixed $post_id
 * @param mixed $post
 * @param mixed $update
 * @return void
 */
function change_title($post_id, $post = null, $update = false) {
  // Sometimes we're only passed a $post_id
  // Not exactly sure why, but it only seems to happen when saving a scheduled update post being managed by TAO Schedule Update.
  if (is_null($post)) {
    $post = get_post($post_id);
  }

  if (!empty($post) && ($post->post_type == 'document' || $post->post_type == 'project' )) {
    $title = get_field('title',$post_id);
    $content = get_field('description',$post_id);
    $new_slug = sanitize_title( $post->post_title );

    if ($title !== false) {
      // Only update title if the ACF 'title' field is not empty
      // This is done to avoid updating the post whilst creating a 'scheduled post' (duplicate) with
      // TAO Schedule Update, but before meta fields have been saved to the post.
      // Hook 'TAO_ScheduleUpdate\\create_publishing_post' is run once the duplication is complete,
      // at which point we'll do this again.
      remove_action('save_post', 'change_title');
      wp_update_post(array('ID' => $post_id, 'post_title' => $title, 'post_content' => $content, 'post_name' => $new_slug));
      add_action('save_post', 'change_title');
    }

    $tax = $post->post_type . '_keyword';
    $terms = get_the_terms($post_id, $tax);
    $id = "";
    if($terms) {
        foreach ( $terms as $term ) {
      		$id .= $term->name . " ";
      	}
      	update_field('keywords', $id, $post_id);
  	}
  }
}
add_action('save_post', 'change_title', 10, 3);

function change_title_after_tao_schedule_post_duplicate($post_id) {
  $post = get_post($post_id);
  change_title($post_id, $post, true);
}
add_action('TAO_ScheduleUpdate\\create_publishing_post', 'change_title_after_tao_schedule_post_duplicate');

/**
 * remove_document_meta function.
 *
 * @access public
 * @return void
 */
function remove_document_meta() {
	remove_meta_box( 'document_typediv','document', 'side' );
	remove_meta_box( 'areas_of_lawdiv','project', 'side' );
	remove_meta_box( 'commissionerdiv','project', 'side' );
	remove_meta_box( 'teamdiv','project', 'side' );
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
			$('li a[data-key=field_54d37487ca2f9], li a[data-key=field_54d374b0584bb], li a[data-key=field_54d3749a584ba], li a[data-key=field_54d374c4584bc], li a[data-key=field_54db7210e5fde]').hide();
		}
    acf.add_action('ready', function( $element ){
      $('#acf-field-Type option').each(function(idx, el){
        var $el = $(el), text;
        text = $el.text();
        if(text.indexOf('—') === -1){
          $el.addClass('parent');
        }
      });
      $('.acf-field-54d36485697f8').trigger('change');
      $('li a[data-key=field_54db35cfaa0ea]').hide();
		});
		$('.acf-field-54d36485697f8').live('change', function(){
			parentCheck = $(this).find("option:selected").hasClass('parent')
      child = $(this).find("option:selected").prevAll('.parent').first().text();
      parent = $(this).find("option:selected").text();
			hide_fields();
      if((parentCheck && parent == "Consultation") || (!parentCheck && child == "Consultation") )		{
				$('li a[data-key=field_54d3749a584ba]').show();
			} else if((parentCheck && parent == "Other Project documents and downloads") || (!parentCheck && child == "Other Project documents and downloads" )) {
				$('li a[data-key=field_54d374b0584bb]').show();
			} else if((parentCheck && parent == "Project related documents and downloads") || (!parentCheck && child == "Project related documents and downloads" )) {
				$('li a[data-key=field_54d374c4584bc]').show();
			} else if((parentCheck && parent == "Report") || (!parentCheck && child == "Report" )) {
				$('li a[data-key=field_54d37487ca2f9]').show();
			}
		});
	})(jQuery);
	</script>
	<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');

function my_acf_admin_head2() {
    ?>
    <script type="text/javascript">
    (function($) {
        $(document).ready(function(){
            if($('.acf-field-553e9161db1f9')) {
              $('.acf-field-553e9161db1f9').append( $('#title') );
              $('#title-prompt-text').hide();
            }

            $('.acf-field-553e916adb1fa').append( $('#postdivrich') );
            $('.acf-field-553e916adb1fa #wp-content-editor-tools').css({
              "background-color": "transparent",
              "padding-top": 0
            });
        });
    })(jQuery);
    </script>
    <style type="text/css">
        .field_type-message #wp-content-editor-tools {
            background: transparent;
            padding-top: 0;
        }
        .acf_postbox .field_type-message p.label {
          display: block !important;
        }
    </style>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head2');
?>
