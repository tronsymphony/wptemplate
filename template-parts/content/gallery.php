<?php
$images = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post');
$image = $images[0];
?>

<div class="col-12 col-sm-6 col-md-6 col-lg-6 ui-gallery">
  <div class="slider-gallery" style="background: url(<?php echo $image ?>);background-size:cover;background-position:center;">
    <div class="overlay"></div>

    <a href="<?php the_permalink() ?>">
      <h3 class="text-center gallery-title"><?php the_title(); ?></h3>
      <img src="<?php echo $image ?>" class="featured-image" style="display:none;">
    </a>
  </div>
</div>

