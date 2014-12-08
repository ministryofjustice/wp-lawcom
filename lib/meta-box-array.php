<?php

// Array hold all meta-boxes - slug param is custom to control which page it appears on
$meta_boxes = array(
	array(
		'id' => 'project_meta_box',
		'title' => 'Project Options',
		'pages' => array( 'project' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'general-tab',
				'label' => 'General',
				'type' => 'tab'
			),
			array(
				'id' => 'start-date',
				'label' => 'Start date',
				'type' => 'date_picker',
				'desc' => 'The start date of the project (yyyy-mm-dd)'
			),
			array(
				'id' => 'end-date',
				'label' => 'End date',
				'type' => 'date_picker',
				'desc' => 'The end date of the project (yyyy-mm-dd)'
			),
			array(
				'id' => 'description',
				'label' => 'Project description',
				'type' => 'textarea',
				'desc' => 'A brief description of the project'
			),
			array(
				'id' => 'status-tab',
				'label' => 'Statuses',
				'type' => 'tab'
			),
			array(
				'id' => 'project_status',
				'label' => 'Project status',
				'type' => 'textarea',
				'desc' => 'The status of the project'
			),
			array(
				'id' => 'implementation_status',
				'label' => 'Implementation status',
				'type' => 'textarea',
				'desc' => 'The status of project implementation'
			),
			array(
				'id' => 'search-tab',
				'label' => 'Search',
				'type' => 'tab'
			),
			array(
				'id' => 'keywords',
				'label' => 'Search keywords',
				'type' => 'textarea',
				'desc' => 'A list of keywords to aid in discovering this project via search (comma seperated)'
			)
		)
	), //project_meta_box
	array(
		'id' => 'document_meta_box',
		'title' => 'Document Options',
		'pages' => array( 'document' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'general-tab',
				'label' => 'General',
				'type' => 'tab'
			),
			array(
				'id' => 'document-type',
				'label' => 'Document type',
				'type' => 'custom-post-type-select',
				'post_type' => 'document_type',
				// 'top_level_only' => true,
				'desc' => 'The primary document type. Altering this will change the subtypes available to select'
			)
		)
	)
);
