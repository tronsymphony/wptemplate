<?php 
  $alt_text;

  if ( has_post_thumbnail( $post->ID ) ){
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-medium' );
    $image = $image[0];
    $alt_text = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);

  } else {
    $image = IMG . '/block-placeholder.jpg';
  } 

  if(empty($alt_text)){
    $alt_text =  get_the_title();
  }
?>

<div class="col-lg-4 col-sm-6 pb-4 p-md-4">
  <div class="card h-100">
    <a href="<?php the_permalink() ?>" class="d-block"><img src="<?php echo $image; ?>" alt="<?php echo $alt_text; ?>" class="card-img-top"></a>
    <div class="card-body text-center d-flex flex-column justify-content-around align-items-center">
      <h4 class="card-title reveal-2"><?php echo wp_trim_words( get_the_title(), 4 ); // post title ?></h4>
      <p class="card-text reveal-2"><?php echo wp_trim_words( get_the_excerpt(), 20 ); // post excerpt?></p>
      <a href="<?php the_permalink(); ?>" class="ui-btn ui-btn-main">LEARN MORE</a>
    </div>
  </div>
</div>
