<?php 

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);	
}

function add_slug_body_class( $classes ) {

	global $post;
	$gallery = get_field('gallery_shortcode');
	if ( $gallery != '' ) {
		$classes[] = 'gallery';
	}
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );

function remove_autop( $content )
{
    # edit the post type here
    remove_filter( 'the_content', 'wpautop' );
    return $content;
}

// include custom jQuery
function include_custom_jquery() {

    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/src/js/plugins/slick.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-simplemodal', get_stylesheet_directory_uri() . '/src/js/plugins/jquery.simplemodal-1.4.4.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_stylesheet_directory_uri().'/build/js/main.min.js', array('jquery'), null, true);


}
add_action('wp_enqueue_scripts', 'include_custom_jquery');


?>