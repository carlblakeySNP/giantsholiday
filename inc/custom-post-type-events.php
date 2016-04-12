<?php
add_action( 'init', 'create_post_type_events' );
function create_post_type_events() {
	register_post_type( 'gevent',
		array(
			'labels' => array(
				'name' => __( 'Events' ),
				'singular_name' => __( 'Event' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Event' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Event' ),
				'new_item' => __( 'New Event' ),
				'view' => __( 'View Event' ),
				'view_item' => __( 'View Event' ),
				'search_items' => __( 'Search Events' ),
				'not_found' => __( 'No Events found' ),
				'not_found_in_trash' => __( 'No Events found in Trash' ),
				'parent' => __( 'Parent Event' )
			),
		'description' => __( 'A Event is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.' ),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'menu_position' => 11,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail'),
		'taxonomies' => array(), // this is IMPORTANT
		)
	);
}

// hook into the init action and call create_book_taxonomies() when it fires
add_action( 'init', 'create_year_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_year_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Year', 'Year general name' ),
		'singular_name' => _x( 'Year', 'Addon singular name' ),
		'search_items' =>  __( 'Search Years' ),
		'all_items' => __( 'All Years' ),
		'parent_item' => __( 'Parent Year' ),
		'parent_item_colon' => __( 'Parent Year:' ),
		'edit_item' => __( 'Edit Year' ),
		'update_item' => __( 'Update Year' ),
		'add_new_item' => __( 'Add New Year' ),
		'new_item_name' => __( 'New Year Name' ),
	); 	

	register_taxonomy( 'eventyear', array( 'gevent' ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
		'query_var' => true,
		//'rewrite' => array( 'slug' => 'type' ),
	));

}




// hook in admin head styles
add_action('admin_head', 'post_type_icon_event');

// override post type icons for the admin menu
function post_type_icon_event() {
	echo '<style type="text/css">
			#menu-posts-gevent div.wp-menu-image:before {
				content: "\f073" !important;
				font-family: "FontAwesome" !important;
 				font-size: 18px !important;
			}
		</style>';
}

?>