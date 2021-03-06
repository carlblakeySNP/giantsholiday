<?php
add_action( 'init', 'create_post_type_slides' );
function create_post_type_slides() {
	register_post_type( 'slide',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'slide' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Slide' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Slide' ),
				'new_item' => __( 'New Slide' ),
				'view' => __( 'View Slide' ),
				'view_item' => __( 'View Slide' ),
				'search_items' => __( 'Search Slides' ),
				'not_found' => __( 'No Slides found' ),
				'not_found_in_trash' => __( 'No Slides found in Trash' ),
				'parent' => __( 'Parent Slide' )
			),
		'description' => __( 'A Slide is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.' ),
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'menu_position' => 11,
		'show_in_nav_menus' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' => array(), // this is IMPORTANT
		)
	);
}

// hook into the init action and call create_book_taxonomies() when it fires
add_action( 'init', 'create_group_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_group_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Groups', 'group general name' ),
		'singular_name' => _x( 'Group', 'group singular name' ),
		'search_items' =>  __( 'Search Groups' ),
		'all_items' => __( 'All Groups' ),
		'parent_item' => __( 'Parent Group' ),
		'parent_item_colon' => __( 'Parent Group:' ),
		'edit_item' => __( 'Edit Group' ),
		'update_item' => __( 'Update Group' ),
		'add_new_item' => __( 'Add New Group' ),
		'new_item_name' => __( 'New Group Name' ),
	); 	

	register_taxonomy( 'group', array( 'slide' ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
		'query_var' => true,
		//'rewrite' => array( 'slug' => 'slide' ),
	));

}

// Redo Admin Columns
function add_new_slide_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = _x('Gallery Name', 'column name');
    $new_columns['images'] = __('Image');     
    $new_columns['group'] = __('Group');
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

// Add to admin_init function
add_filter('manage_edit-slide_columns', 'add_new_slide_columns');

// Cycle through columns 
function manage_slide_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
	    case 'images':
	        // Get number of images in gallery
	        echo the_post_thumbnail( 'thumbnail' );
	        break;
	    case 'group':
	    	$terms = get_the_terms( $post_id, 'group' );
	    	if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'group' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'group', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Group' );
			}

	    	break;
	    default:
	        break;
    } // end switch
}   
add_action('manage_slide_posts_custom_column', 'manage_slide_columns', 10, 2);


// hook in admin head styles
add_action('admin_head', 'post_type_icon_slide');

// override post type icons for the admin menu
function post_type_icon_slide() {
	echo '<style type="text/css">
			#menu-posts-slide div.wp-menu-image:before {
				content: "\f00a" !important;
				font-family: "FontAwesome" !important;
 				font-size: 18px !important;
			}
		</style>';
}

?>