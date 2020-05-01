<?php
add_filter( 'post_gallery', 'bootstrap_gallery', 10, 3 );

function bootstrap_gallery( $output = '', $atts, $instance )
{
  $atts = array_merge(array('columns' => 3), $atts);

  $columns = $atts['columns'];
  $images = explode(',', $atts['ids']);

  if ($columns == 1) { $col_class = 'col-md-12';}
  else if ($columns == 2) { $col_class = 'col-md-6'; }
  else if ($columns == 3) { $col_class = 'col-md-4'; }
  else if ($columns == 4) { $col_class = 'col-lg-3 col-md-6'; }
  else if ($columns == 5) { $col_class = 'col-md-2'; }
  else if ($columns == 6) { $col_class = 'col-lg-2 col-md-3'; }
  // other column counts

  $return = '<div class="row gallery">';

  $i = 0;

  foreach ($images as $key => $value) {

    if ($i%$columns == 0 && $i > 0) {
      $return .= '</div><div class="row gallery">';
    }

    $image_attributes = wp_get_attachment_image_src($value, 'large');
    $gallery_img = get_post($value);
    $image_caption = $gallery_img->post_excerpt;
    $alt_tag = get_post_meta( $value, '_wp_attachment_image_alt', true);

    $return .= '
            <div class="'.$col_class.'">

                    <img src="'.$image_attributes[0].'" class="img-fluid" alt="'.$alt_tag.'">
                    <p>'.$image_caption.'</p>
            </div>';

    $i++;
  }

  $return .= '</div>';

  return $return;
}
?>
