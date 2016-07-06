<?php
/**
 * @package Image Upload Widget
 */
/*
Plugin Name: Image Upload Widget
Plugin URI: http://www.wordpressmaker.com/
Description: Image Upload Widget is a simple widget to upload an image.
Version: 1.0
Author: Arun S Chandran
Author URI: http://www.wordpressmaker.com/
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class layout_widget extends WP_Widget {
 
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'layout_widget', // Base ID
			'Layout Widget', // Name
 
			array( 'description' => __( 'A widget to layout grid content', 'iuw' ), ) // Args
		);
	}
 
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$main_title = apply_filters( 'widget_name', $instance['main_title'] );
		$main = apply_filters( 'widget_name', $instance['main'] );
		$second_title = apply_filters( 'widget_name', $instance['second_title'] );
		$second = apply_filters( 'widget_name', $instance['second'] );
		//$image_uri = apply_filters( 'widget_image_uri', $instance['image_uri'] );
		//echo $before_widget;
		echo '<div class="grid"><div class="block-6"><h1 class="entry-title">'.$main_title.'</h1>'.$main.'</div><div class="block-2"><h3>'.$second_title.'</h3>'.$second.'</div></div>';
		?>
        
    <?php
		//echo $after_widget;
	}
 
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['main_title'] = ( ! empty( $new_instance['main_title'] ) ) ? $new_instance['main_title'] : '';
		$instance['main'] = ( ! empty( $new_instance['main'] ) ) ? $new_instance['main'] : '';
		$instance['second_title'] = ( ! empty( $new_instance['second_title'] ) ) ? $new_instance['second_title'] : '';
		$instance['second'] = ( ! empty( $new_instance['second'] ) ) ? $new_instance['second'] : '';
		//$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
		return $instance;
	}
 
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
  //       if ( isset( $instance[ 'image_uri' ] ) ) {
		// 	$image_uri = $instance[ 'image_uri' ];
		// }
		// else {
		// 	$image_uri = __( '', 'iuw' );
		// }
		if ( isset( $instance[ 'main_title' ] ) ) {
			$main_title = $instance[ 'main_title' ];
		}else {
			$main_title = __( '', 'iuw' );
		}
		if ( isset( $instance[ 'main' ] ) ) {
			$main = $instance[ 'main' ];
		}else {
			$main = __( '', 'iuw' );
		}
		if ( isset( $instance[ 'second_title' ] ) ) {
			$second_title = $instance[ 'second_title' ];
		}else {
			$second_title = __( '', 'iuw' );
		}
		if ( isset( $instance[ 'second' ] ) ) {
			$second = $instance[ 'second' ];
		}else {
			$second = __( '', 'iuw' );
		}
		
		?>
	<p>
      <label for="<?php echo $this->get_field_id('main_title'); ?>"><?php _e('Main Title', 'iuw'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('main_title'); ?>" id="<?php echo $this->get_field_id('main_title'); ?>" value="<?php echo $main_title; ?>" class="widfat" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('main'); ?>"><?php _e('Main Content', 'iuw'); ?></label><br />
      <textarea rows="10" name="<?php echo $this->get_field_name('main'); ?>" id="<?php echo $this->get_field_id('main'); ?>" class="widefat"><?php echo $main; ?></textarea>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('second_title'); ?>"><?php _e('Second Title', 'iuw'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('second_title'); ?>" id="<?php echo $this->get_field_id('second_title'); ?>" value="<?php echo $second_title; ?>" class="widfat" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('second'); ?>"><?php _e('Second Content', 'iuw'); ?></label><br />
      <textarea rows="10" name="<?php echo $this->get_field_name('second'); ?>" id="<?php echo $this->get_field_id('second'); ?>" class="widefat"><?php echo $second; ?></textarea>
    </p>
    
		<?php 
	}
	
}
add_action( 'widgets_init', create_function( '', 'register_widget( "layout_widget" );' ) );
// function iuw_wdScript(){
//   wp_enqueue_media();
//   wp_enqueue_script('adsScript', get_template_directory_uri().'/js/image-upload-widget.js');
// }
// add_action('admin_enqueue_scripts', 'iuw_wdScript');