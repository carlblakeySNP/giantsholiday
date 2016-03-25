<?php
add_action( 'init', 'create_post_type_services' );
function create_post_type_services() {
	register_post_type( 'service',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Service' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Service' ),
				'new_item' => __( 'New Service' ),
				'view' => __( 'View Service' ),
				'view_item' => __( 'View Service' ),
				'search_items' => __( 'Search Services' ),
				'not_found' => __( 'No Services found' ),
				'not_found_in_trash' => __( 'No Services found in Trash' ),
				'parent' => __( 'Parent Service' )
			),
		'description' => __( 'A Service is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.' ),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'menu_position' => 11,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'taxonomies' => array(), // this is IMPORTANT
		)
	);
}


// hook in admin head styles
add_action('admin_head', 'post_type_icon_service');

// override post type icons for the admin menu
function post_type_icon_service() {
	echo '<style type="text/css">
			#menu-posts-service div.wp-menu-image:before {
				content: "\f0fc" !important;
				font-family: "FontAwesome" !important;
 				font-size: 18px !important;
			}
		</style>';
}

?>