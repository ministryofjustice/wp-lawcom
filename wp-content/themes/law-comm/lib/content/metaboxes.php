<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_homepage',
		'title' => 'Homepage',
		'fields' => array (
			array (
				'key' => 'field_54d478954a62c',
				'label' => 'Welcome title',
				'name' => 'welcome_title',
				'type' => 'text',
				'instructions' => 'Main heading on home page',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d47a544a62d',
				'label' => 'Welcome text',
				'name' => 'welcome_text',
				'type' => 'textarea',
				'instructions' => 'Text under main heading',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54d47af70a3ef',
				'label' => 'Aims item 1',
				'name' => 'aims_item_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d47cfa0a3f0',
				'label' => 'Aims item 2',
				'name' => 'aims_item_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d47d1a0a3f1',
				'label' => 'Aims item 3',
				'name' => 'aims_item_3',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d47d230a3f2',
				'label' => 'Aims item 4',
				'name' => 'aims_item_4',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d48775854aa',
				'label' => 'Youtube link',
				'name' => 'youtube_link',
				'type' => 'text',
				'instructions' => 'Paste URL of Youtube video here',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '6',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_lectures-talks',
		'title' => 'Lectures & Talks',
		'fields' => array (
			array (
				'key' => 'field_553e9173db1fb',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_553e9161db1f9',
				'label' => 'Title',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_553e916adb1fa',
				'label' => 'Content',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_553e974d647e1',
				'label' => 'Speaker',
				'name' => 'speaker',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_553e9755647e2',
				'label' => 'Date',
				'name' => 'date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_553e98191e3d6',
				'label' => 'Topic',
				'name' => 'topic',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_553e9888b2b03',
				'label' => 'Files',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_553e9891b2b04',
				'label' => 'Transcript',
				'name' => 'transcript',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_553e98a1b2b05',
				'label' => 'Embedable Video',
				'name' => 'video',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_553e98bdb2b06',
				'label' => 'External Audio / Video',
				'name' => 'external_audio_/_video',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'lecture',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_project',
		'title' => 'Project',
		'fields' => array (
			array (
				'key' => 'field_54d4939fd8aec',
				'label' => 'Content',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d493a7d8aed',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d4950c50af6',
				'label' => 'Parent Project',
				'name' => 'parent_project',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'project',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d493acd8aee',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_54ef392a7a751',
				'label' => 'Youtube video',
				'name' => 'youtube_video',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Paste Youtube link here',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54ef3ce837e20',
				'label' => 'Video description',
				'name' => 'video_description',
				'type' => 'textarea',
				'instructions' => 'Description of video, if required',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54d4984200fb3',
				'label' => 'Options',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d4985400fb4',
				'label' => 'Areas of Law',
				'name' => 'areas_of_law',
				'type' => 'taxonomy',
				'taxonomy' => 'areas_of_law',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d4987700fb5',
				'label' => 'Commissioners',
				'name' => 'commissioners',
				'type' => 'taxonomy',
				'taxonomy' => 'commissioner',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d4989a00fb6',
				'label' => 'Team',
				'name' => 'team',
				'type' => 'taxonomy',
				'taxonomy' => 'team',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d496d5ac376',
				'label' => 'Status',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d496e3ac377',
				'label' => 'Status',
				'name' => 'status',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d496eaac378',
				'label' => 'Implementation Status',
				'name' => 'implementation_status',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_555203ee7279b',
							'operator' => '!=',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'Pre-project' => 'Pre-project',
					'Pre-consultation' => 'Pre-consultation',
					'Consultation' => 'Consultation',
					'Analysis of responses' => 'Analysis of responses',
					'Complete' => 'Complete',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_555203ee7279b',
				'label' => 'Disable Implementation Status',
				'name' => 'disable_implementation_status',
				'type' => 'true_false',
				'instructions' => 'Disable the implementation status graphic for projects that don\'t require it',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_54db35cfaa0ea',
				'label' => 'Search',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54db35deaa0eb',
				'label' => 'Keywords',
				'name' => 'keywords',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'project',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_publication',
		'title' => 'Publication',
		'fields' => array (
			array (
				'key' => 'field_54d364c4697fc',
				'label' => 'Content',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d364a4697fa',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d49143e9930',
				'label' => 'Reference Number',
				'name' => 'reference_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d491c0e9933',
				'label' => 'Publication Date',
				'name' => 'publication_date',
				'type' => 'date_picker',
				'date_format' => 'yy-mm-dd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_54d491d1e9934',
				'label' => 'Response Date',
				'name' => 'response_date',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5548dbbc4bd49',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'instructions' => 'Description field for corporate documents (annual reports etc)',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_54d36479697f7',
				'label' => 'Options',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d37be93594e',
				'label' => 'Project',
				'name' => 'project',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'project',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d36485697f8',
				'label' => 'Type',
				'name' => 'Type',
				'type' => 'taxonomy',
				'taxonomy' => 'document_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_54d364d1697fd',
				'label' => 'Files / Links',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d364e9697fe',
				'label' => 'Files',
				'name' => 'files',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54d49177e9931',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => 30,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54d364ee697ff',
						'label' => 'File',
						'name' => 'file',
						'type' => 'file',
						'column_width' => 30,
						'save_format' => 'url',
						'library' => 'all',
					),
					array (
						'key' => 'field_554898f85c2a5',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'instructions' => 'Optional descriptive text for, e.g. annual reports',
						'column_width' => 40,
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_54d364f769800',
				'label' => 'Links',
				'name' => 'links',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54d49180e9932',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54d3650469801',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5549d5083283f',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'instructions' => 'Optional descriptive text for external links',
						'column_width' => 40,
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_54db7210e5fde',
				'label' => 'Search',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54db721ae5fdf',
				'label' => 'Keywords',
				'name' => 'keywords',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54d37487ca2f9',
				'label' => 'Report',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d3749a584ba',
				'label' => 'Consultation',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d4925dd3d43',
				'label' => 'Open Date',
				'name' => 'open_date',
				'type' => 'date_picker',
				'date_format' => 'dd/mm/yy',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_54d4926ad3d44',
				'label' => 'Close Date',
				'name' => 'close_date',
				'type' => 'date_picker',
				'date_format' => 'dd/mm/yy',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_54d374b0584bb',
				'label' => 'Other Project Documents and Downloads',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d374c4584bc',
				'label' => 'Project Related Documents and Downloads',
				'name' => '',
				'type' => 'tab',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'document',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

