<select name="concern" id="concern-select" class="form-control" style="width:100%;">
  <option value=""></option>
  <?php

  $args = array(
    'orderby' => 'title' ,
    'order' => 'ASC',
    'post_status' => 'publish',
    'post_type' => 'concerns',
    'posts_per_page' => -1,
  );
  $the_query = new WP_Query( $args );

  // The Loop
  if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $slug = $post->post_name;
      echo '<option value="'.$slug.'">' . get_the_title() . '</option>';
    }
  } else {
    echo '<p>No Conditions</p>';
  }
  ?>
</select>
