<?php

// Define Posts2Posts connections

function my_connection_types() {
	// Project to project
	p2p_register_connection_type( array(
		'name' => 'projects_to_projects',
		'from' => 'project',
		'to' => 'project',
		'cardinality' => 'one-to-many',
		'title' => array(
			'from' => 'Parent project',
			'to' => 'Child projects'
		),
		'admin_box' => array(
			'show' => 'any'
		),
		'admin_column' => 'from',
		'admin_dropdown' => 'from'
	) );

	// Document to document_type
	p2p_register_connection_type( array(
		'name' => 'document_to_document_type',
		'from' => 'document',
		'to' => 'document_type',
		'cardinality' => 'many-to-many',
		'title' => array(
			'from' => 'Document type',
			'to' => 'Documents'
		),
		'admin_box' => array(
			'show' => 'none'
		),
		'admin_column' => 'from',
		'admin_dropdown' => 'from'
	) );
	
	// Document_type to document_type
	p2p_register_connection_type( array(
		'name' => 'document_type_to_document_type',
		'from' => 'document_type',
		'to' => 'document_type',
		'cardinality' => 'many-to-one',
		'title' => array(
			'from' => 'Parent document type',
			'to' => 'Child document types'
		)
	) );
}

add_action( 'p2p_init', 'my_connection_types' );
