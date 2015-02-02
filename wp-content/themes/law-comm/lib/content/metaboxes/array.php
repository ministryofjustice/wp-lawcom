<?php
$meta_boxes = array();

$meta_boxes[] = array(
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
  		'id' => 'law_commission_reference',
  		'label' => 'Law Commission Reference',
  		'type' => 'text',
  		'desc' => 'The Law Commission Reference'
  	),
  	array(
  		'id' => 'publication_date',
  		'label' => 'Publication date',
  		'type' => 'date_picker',
  		'desc' => 'The publication date of the project (yyyy-mm-dd)'
  	),
  	array(
  		'id' => 'response-date',
  		'label' => 'Responses due by date',
  		'type' => 'date_picker',
  		'desc' => 'The responses due by date of the project (yyyy-mm-dd)'
  	),
  	array(
  		'id' => 'description',
  		'label' => 'Project description',
  		'type' => 'textarea',
  		'desc' => 'A brief description of the document'
  	),
  	array(
  		'id' => 'project',
  		'label' => 'Project',
  		'type' => 'custom-post-type-select',
  		'post_type' => 'project',
  		'desc' => 'This is the project that the document belongs to'
  	),
  	array(
  		'id' => 'pdf-tab',
  		'label' => 'PDF',
  		'type' => 'tab'
  	),
  	array(
      'id'          => 'pdf',
      'label'       => __( 'Main PDF' ),
      'desc'        => ('Add the Main PDF'),
      'type'        => 'upload',
    ),
  	array(
      'id'          => 'welsh_translation',
      'label'       => __( 'Welsh Translation' ),
      'desc'        => ('Add the Welsh Translation PDF'),
      'type'        => 'upload',
    ),
    array(
      'id'          => 'executive_summary',
      'label'       => __( 'Executive Summary'),
      'desc'        => ('Add the Executive Summary PDF'),
      'type'        => 'upload',
    ),
    array(
      'id'          => 'easyread',
      'label'       => __( 'Easy Read'),
      'desc'        => ('Add the Easy Read PDF'),
      'type'        => 'upload',
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
  		'desc' => 'A list of keywords to aid in discovering this document via search (comma seperated)'
  	)
  )
);

$meta_boxes[] = array(
  'id' => 'event_meta_box',
  'title' => 'Event Options',
  'pages' => array( 'event' ),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
  	array(
  		'id' => 'general-tab',
  		'label' => 'General',
  		'type' => 'tab'
  	),
  	array(
  		'id' => 'date',
  		'label' => 'Date',
  		'type' => 'date-time-picker',
  		'desc' => 'Date and time of event (yyyy-mm-dd hh:mm)'
  	),
  	array(
  		'id' => 'advertise-date',
  		'label' => 'Advertise Date',
  		'type' => 'date-picker',
  		'desc' => 'The date to advertise the event from (yyyy-mm-dd)'
  	),
  	array(
  		'id' => 'venue',
  		'label' => 'Venue',
  		'type' => 'text',
  		'desc' => 'Venue of the event'
  	),
  	array(
  		'id' => 'tickets',
  		'label' => 'Ticket URL',
  		'type' => 'text',
  		'desc' => 'Evenbrite.com Ticket URL'
  	),
  	array(
  		'id' => 'purpose',
  		'label' => 'Purpose',
  		'type' => 'textarea',
  		'desc' => 'Purpose of the event'
  	),
  	array(
  		'id' => 'relationships-tab',
  		'label' => 'Relationships',
  		'type' => 'tab'
  	),
  	array(
  		'id' => 'project',
  		'label' => 'Project',
  		'type' => 'custom-post-type-select',
  		'post_type' => 'project',
  		'desc' => 'This is the project that the event belongs to'
  	),
  	array(
      'id'          => 'related_documents',
      'label'       => __( 'Related Documents' ),
      'desc'        => ("This is the related documents for this event"),
      'type'        => 'list-item',
      'settings'    => array( 
        array(
    			'id' => 'document',
    			'label' => 'Document',
    			'type' => 'custom-post-type-select',
    			'post_type' => 'document',
    			'desc' => 'This is the document that the event belongs to'
    		),
      )
    ),
  )
);

$meta_boxes[] = array(
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
      'id'          => 'government_response_received',
      'label'       => 'Government response received',
      'desc'        => 'Has the government response been received?',
      'type'        => 'checkbox',
      'choices'     => array( 
        array(
          'value'       => '1',
          'label'       => 'Yes',
          'src'         => ''
        ),
        array(
          'value'       => '0',
          'label'       => 'No',
          'src'         => ''
        ),
      )
    ),
    array(
      'id'          => 'implemented',
      'label'       => 'Implemented or part implemented',
      'desc'        => 'Has this project been implemented or part implemented?',
      'type'        => 'checkbox',
      'choices'     => array( 
        array(
          'value'       => '1',
          'label'       => 'Implemented',
          'src'         => ''
        ),
        array(
          'value'       => '0',
          'label'       => 'Part Implemented',
          'src'         => ''
        ),
      )
    ),
		array(
      'id' => 'project_status',
			'label' => 'Project status',
      'desc' => 'The status of the project',
      'type'        => 'select',
      'choices'     => array( 
        array(
          'value'       => '',
          'label'       => __( '-- Choose One --', 'theme-text-domain' ),
          'src'         => ''
        ),
        array(
          'value'       => '1',
          'label'       => '???',
          'src'         => ''
        ),
      )
    ),
		array(
      'id'          => 'implementation_status',
      'label'       => 'Implementation status',
      'desc'        => 'The status of project implementation',
      'type'        => 'select',
      'choices'     => array( 
        array(
          'value'       => '',
          'label'       => __( '-- Choose One --', 'theme-text-domain' ),
          'src'         => ''
        ),
        array(
          'value'       => '1',
          'label'       => 'Pre-project',
          'src'         => ''
        ),
        array(
          'value'       => '2',
          'label'       => 'Pre-consultation',
          'src'         => ''
        ),
        array(
          'value'       => '3',
          'label'       => 'Consultation',
          'src'         => ''
        ),
        array(
          'value'       => '4',
          'label'       => 'Post-consultation / Analysis of responses',
          'src'         => ''
        ),
        array(
          'value'       => '5',
          'label'       => 'Project complete',
          'src'         => ''
        ),
      )
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
);