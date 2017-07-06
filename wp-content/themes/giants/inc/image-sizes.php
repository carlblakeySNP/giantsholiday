<?php
add_action( 'after_setup_theme', 'giants_image_sizes' );
function giants_image_sizes() {
  add_image_size('slideshow', 1375, 1000, false);
  add_image_size('6-column', 640);
  add_image_size('services-slideshow', 960, 600, true);
}
