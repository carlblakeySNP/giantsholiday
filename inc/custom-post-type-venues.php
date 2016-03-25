<?php
add_action( 'init', 'create_post_type_venues' );
function create_post_type_venues() {
	register_post_type( 'venue',
		array(
			'labels' => array(
				'name' => __( 'Venues' ),
				'singular_name' => __( 'Venue' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Venue' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Venue' ),
				'new_item' => __( 'New Venue' ),
				'view' => __( 'View Venue' ),
				'view_item' => __( 'View Venue' ),
				'search_items' => __( 'Search Venues' ),
				'not_found' => __( 'No Venues found' ),
				'not_found_in_trash' => __( 'No Venues found in Trash' ),
				'parent' => __( 'Parent Venue' )
			),
		'description' => __( 'A Venue is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.' ),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'menu_position' => 11,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'taxonomies' => array(), // this is IMPORTANT
		)
	);
}

// hook into the init action and call create_book_taxonomies() when it fires
add_action( 'init', 'create_addon_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_addon_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Addons', 'Addon general name' ),
		'singular_name' => _x( 'Addon', 'Addon singular name' ),
		'search_items' =>  __( 'Search Addons' ),
		'all_items' => __( 'All Addons' ),
		'parent_item' => __( 'Parent Addon' ),
		'parent_item_colon' => __( 'Parent Addon:' ),
		'edit_item' => __( 'Edit Addon' ),
		'update_item' => __( 'Update Addon' ),
		'add_new_item' => __( 'Add New Addon' ),
		'new_item_name' => __( 'New Addon Name' ),
	); 	

	register_taxonomy( 'addon', array( 'venue' ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'type' ),
	));

}


// hook in admin head styles
add_action('admin_head', 'post_type_icon_venue');

// override post type icons for the admin menu
function post_type_icon_venue() {
	echo '<style type="text/css">
			#menu-posts-venue div.wp-menu-image:before {
				content: "\f19c" !important;
				font-family: "FontAwesome" !important;
 				font-size: 18px !important;
			}
		</style>';
}

?>