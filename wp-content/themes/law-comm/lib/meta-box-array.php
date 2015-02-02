<?php

// Array hold all meta-boxes - slug param is custom to control which page it appears on
$meta_boxes = array(
	array(
		'id' => 'homepage_meta_box',
		'title' => 'Homepage Options',
		'slug' => 'home',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'id' => 'Welcome-tab',
				'label' => 'Welcome title and text',
				'type' => 'tab'
			),
			array(
				'id' => 'welcome-title',
				'label' => 'Welcome title',
				'type' => 'text',
				'desc' => 'Main title on homepage, underneath banner'
			),
			array(
				'id' => 'welcome-text',
				'label' => 'Welcome text',
				'type' => 'textarea-simple',
				'desc' => 'Intro text on homepage, underneath main title'
			),
			array(
				'id' => 'commission-aims-tab',
				'label' => 'Aims list',
				'type' => 'tab'
			),
			array(
				'id' => 'commission-aim-1',
				'label' => 'Commission Aim 1',
				'type' => 'text',
				'desc' => 'First item in list of commission aims'
			),
			array(
				'id' => 'commission-aim-2',
				'label' => 'Commission Aim 2',
				'type' => 'text',
				'desc' => 'Second item in list of commission aims'
			),
			array(
				'id' => 'commission-aim-3',
				'label' => 'Commission Aim 3',
				'type' => 'text',
				'desc' => 'Third item in list of commission aims'
			),
			array(
				'id' => 'commission-aim-4',
				'label' => 'Commission Aim 4',
				'type' => 'text',
				'desc' => 'Fourth item in list of commission aims'
			),
			array(
				'id' => 'quick-links-tab',
				'label' => 'Quick links',
				'type' => 'tab'
			),
			array(
				'id' => 'quick-link-1',
				'label' => 'Quick link 1 text',
				'type' => 'text',
				'desc' => 'Text to display for the first quick link'
			),
			array(
				'id' => 'quick-link-1-page',
				'label' => 'Quick link 1 destination',
				'type' => 'page-select',
				'desc' => 'Please select the destination page for the first link'
			),
			array(
				'id' => 'quick-link-2',
				'label' => 'Quick link 2 text',
				'type' => 'text',
				'desc' => 'Text to display for the second quick link'
			),
			array(
				'id' => 'quick-link-2-page',
				'label' => 'Quick link 2 destination',
				'type' => 'page-select',
				'desc' => 'Please select the destination page for the second link'
			),
			array(
				'id' => 'quick-link-3',
				'label' => 'Quick link 3 text',
				'type' => 'text',
				'desc' => 'Text to display for the third quick link'
			),
			array(
				'id' => 'quick-link-3-page',
				'label' => 'Quick link 3 destination',
				'type' => 'page-select',
				'desc' => 'Please select the destination page for the third link'
			),
			array(
				'id' => 'youtube-video',
				'label' => 'Youtube video',
				'type' => 'tab'
			),
			array(
				'id' => 'video-embed',
				'label' => 'Video embed code',
				'type' => 'textarea',
				'desc' => 'Youtube embed code for latest media'
			)
		)
	)
);
