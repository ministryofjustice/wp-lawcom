<?php
	add_filter('manage_page_posts_columns', function($columns) {
		$offset = array_search('title', array_keys($columns));
		return array_merge(array_slice($columns, 0, $offset), ['welsh' => __('', 'roots')], array_slice($columns, $offset, null));
	});
	
	add_action('manage_pages_custom_column', function($column_key, $post_id) {
		if ($column_key == 'welsh') {
			$welsh = get_post_meta($post_id, 'welsh', true);
			if ($welsh) {
				echo '<span style="font-size:200%;" aria-label="'.__('This page is in Welsh', 'roots').'">🏴󠁧󠁢󠁷󠁬󠁳󠁿</span>';
			}
		}
	}, 10, 2);

	add_action('admin_head', 'column_style');
	function column_style() {
		echo '<style>';
		echo '.table-view-list.pages .column-welsh { padding:5px 0; width:2em; text-align:center;}';
		echo '</style>';
	}
?>