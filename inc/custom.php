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


?>