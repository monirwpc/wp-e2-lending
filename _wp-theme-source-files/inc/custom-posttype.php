<?php 

// register leadership post type
add_action( 'init' , 'register_leadership_post' );
function register_leadership_post() {
	$arg = array(
		'label'           => __( 'Leadership' , 'e2lending' ),
		'singular_label'  => 'leadership',
		'public'          => true,
		'hierarchical'    => false,
		'capability_type' => 'post',
		'has_archive'     => true,
		'show_ui'         => true,
		'menu_position'   => 4,
		'rewrite'         => array( 'slug' => 'cpt_leadership' ),
		'menu_icon'       => 'dashicons-groups',
		'supports'        => array( 'title', 'editor', 'thumbnail', 'revision', 'author' ),
		'labels'          => array(
			'add_new'               => __( 'Add New Leadership', 'e2lending' ),
	        'add_new_item'          => __( 'Add New Leadership', 'e2lending' ),
	        'new_item'              => __( 'New Leadership', 'e2lending' ),
	        'edit_item'             => __( 'Edit Leadership', 'e2lending' ),
	        'view_item'             => __( 'View Leaderships', 'e2lending' ),
	        'all_items'             => __( 'All Leaderships', 'e2lending' ),
	        'search_items'          => __( 'Search Leadership', 'e2lending' ),
	        'not_found'             => __( 'No Leadership found.', 'e2lending' ),
	        'featured_image'        => __( 'Leadership Thumbnail', 'e2lending' ),
	        'set_featured_image'    => __( 'Set Leadership Thumbnail - 540x540 px', 'e2lending' ),
	        'remove_featured_image' => __( 'Remove Leadership Thumbnail', 'e2lending' ),
		),
	);
	register_post_type( 'leadership' , $arg );
}


// register loan-programs post type
add_action( 'init' , 'register_loanprograms_post' );
function register_loanprograms_post() {
	$arg = array(
		'label'           => __( 'Loan Programs' , 'e2lending' ),
		'singular_label'  => 'loan_program',
		'public'          => true,
		'hierarchical'    => false,
		'capability_type' => 'post',
		'has_archive'     => true,
		'show_ui'         => true,
		'menu_position'   => 5,
		'rewrite'         => array( 'slug' => 'cpt_loan_program' ),
		'menu_icon'       => 'dashicons-money-alt',
		'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revision', 'author' ),
		'labels'          => array(
			'add_new'               => __( 'Add New Loan Program', 'e2lending' ),
	        'add_new_item'          => __( 'Add New Loan Program', 'e2lending' ),
	        'new_item'              => __( 'New Loan Program', 'e2lending' ),
	        'edit_item'             => __( 'Edit Loan Program', 'e2lending' ),
	        'view_item'             => __( 'View Loan Programs', 'e2lending' ),
	        'all_items'             => __( 'All Loan Programs', 'e2lending' ),
	        'search_items'          => __( 'Search Loan Program', 'e2lending' ),
	        'not_found'             => __( 'No Loan Program found.', 'e2lending' ),
	        'featured_image'        => __( 'Loan Program Thumbnail', 'e2lending' ),
	        'set_featured_image'    => __( 'Set Loan Program Thumbnail - 555x200 px', 'e2lending' ),
	        'remove_featured_image' => __( 'Remove Loan Program Thumbnail', 'e2lending' ),
		),
	);
	register_post_type( 'loan_program' , $arg );
}


// register features post type
add_action( 'init' , 'register_features_post' );
function register_features_post() {
	$arg = array(
		'label'           => __( 'Features' , 'e2lending' ),
		'singular_label'  => 'features',
		'public'          => true,
		'hierarchical'    => false,
		'capability_type' => 'post',
		'has_archive'     => true,
		'show_ui'         => true,
		'menu_position'   => 6,
		'rewrite'         => array( 'slug' => 'cpt_features' ),
		'menu_icon'       => 'dashicons-insert',
		'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revision', 'author' ),
		'labels'          => array(
			'add_new'               => __( 'Add New Features', 'e2lending' ),
	        'add_new_item'          => __( 'Add New Features', 'e2lending' ),
	        'new_item'              => __( 'New Features', 'e2lending' ),
	        'edit_item'             => __( 'Edit Features', 'e2lending' ),
	        'view_item'             => __( 'View Features', 'e2lending' ),
	        'all_items'             => __( 'All Features', 'e2lending' ),
	        'search_items'          => __( 'Search Features', 'e2lending' ),
	        'not_found'             => __( 'No Features found.', 'e2lending' ),
	        'featured_image'        => __( 'Features Thumbnail', 'e2lending' ),
	        'set_featured_image'    => __( 'Set Features Thumbnail - 555x200 px', 'e2lending' ),
	        'remove_featured_image' => __( 'Remove Features Thumbnail', 'e2lending' ),
		),
	);
	register_post_type( 'features' , $arg );
}


// register how_to post type
add_action( 'init' , 'register_how_to_post' );
function register_how_to_post() {
	$arg = array(		
		'labels'          => array(
			'name'        => esc_html__('How to', 'e2lending'),
			'all_items'   => esc_html__( 'All How tos', 'e2lending' ),
			'add_new_item'=> esc_html__('Add New How to', 'e2lending'),
		),
		'public'          => true,
		'hierarchical'    => false,
		'menu_position'   => 10,
		'menu_icon'       => 'dashicons-welcome-learn-more',
		'show_ui'         => true,
		'supports'        => array('title'),
	);
	register_post_type( 'e2_how_to' , $arg );
}


// register e2_documents post type
add_action( 'init' , 'register_documents_post' );
function register_documents_post() {
	$arg = array(		
		'labels'          => array(
			'name'        => esc_html__('Documents', 'e2lending'),
			'all_items'   => esc_html__( 'All Documents', 'e2lending' ),
			'add_new_item'=> esc_html__('Add New Document', 'e2lending'),
		),
		'public'          => true,
		'hierarchical'    => false,
		'menu_position'   => 11,
		'menu_icon'       => 'dashicons-media-document',
		'show_ui'         => true,
		'supports'        => array('title'),
	);
	register_post_type( 'e2_documents' , $arg );
}


// register e2_forms post type
add_action( 'init' , 'register_forms_post' );
function register_forms_post() {
	$arg = array(		
		'labels'          => array(
			'name'        => esc_html__('Forms', 'e2lending'),
			'all_items'   => esc_html__( 'All Forms', 'e2lending' ),
			'add_new_item'=> esc_html__('Add New Form', 'e2lending'),
		),
		'public'          => true,
		'hierarchical'    => false,
		'menu_position'   => 12,
		'menu_icon'       => 'dashicons-forms',
		'show_ui'         => true,
		'supports'        => array('title'),
	);
	register_post_type( 'e2_forms' , $arg );
}