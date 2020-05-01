<?php if ( has_post_thumbnail( $post->ID ) ){
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-medium' );
  $image = $image[0];
} else {
  $image = IMG . '/placeholder.jpg';
} ?>

<div class="col-lg-4 col-sm-6 pb-4 p-md-4">
  <div class="card services h-100">
    <!-- <a href="<?php the_permalink() ?>" class="d-block"><img src="<?php echo $image; ?>" alt="" class="card-img-top"></a> -->
    <div class="card-body text-center d-flex flex-column justify-content-around align-items-center">
      <h4 class="card-title reveal-2"><?php the_title(); ?></h4>
      <p class="card-text reveal-2"><?php echo get_the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>" class="ui-btn ui-btn-main">LEARN MORE</a>
    </div>
  </div>
</div>
