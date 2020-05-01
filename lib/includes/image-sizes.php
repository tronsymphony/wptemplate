<?php

// thumbnails
add_action( 'after_setup_theme', 'setup' );
function setup() {
  // ...
  add_theme_support( 'post-thumbnails' );
  add_image_size( $name = 'headerimg', 1400, 400, $crop = true );
  add_image_size( $name = 'banner', 1170, 380, $crop = true );
  add_image_size( $name = 'post-medium', 500, 360, $crop = true );
  add_image_size( $name = 'post', 300, 300, $crop = true );
  add_image_size( $name = 'tiny', 50, 50, $crop = true );
  // ...
}

?>
