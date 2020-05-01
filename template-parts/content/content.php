<?php if ( has_post_thumbnail( $post->ID ) ){
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
  $image = $image[0];
} ?>

<!-- <h1><?php the_title() ?></h1> -->
<?php if($image) : ?>
<!-- <img src="<?php echo $image; ?>" class="d-block float-md-right featured-img mb-3 ml-md-3" alt="<?php the_title() ?>"> -->
<?php endif; ?>
<?php the_content(); ?>
