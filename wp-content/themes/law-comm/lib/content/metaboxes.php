<?php 
  
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_publication',
		'title' => 'Publication',
		'fields' => array (
			array (
				'key' => 'field_54d36479697f7',
				'label' => 'Type',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_54d37be93594e',
				'label' => 'Project',
				'name' => 'project',
				'type' => 'relationship',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'project',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_54d36485697f8',
				'label' => 'Primary',
				'name' => 'primary',
				'type' => 'taxonomy',
				'taxonomy' => 'document_type',
				'field_type' => 'select',
				'allow_null' => 1,
				'load_save_terms' => 1,
				'return_format' => 'id',
				'multiple' => 0,
			),
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
				'key' => 'field_54d364ba697fb',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
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
						'key' => 'field_54d364ee697ff',
						'label' => 'File',
						'name' => 'file',
						'type' => 'file',
						'column_width' => '',
						'save_format' => 'object',
						'library' => 'all',
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
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
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
