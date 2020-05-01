
<ul>
<?php
// The Query
$eventargs = array(
    'post_type' => 'events',
    'posts_per_page' => 2
);

$events = new WP_Query( $eventargs );

// The Loop
if ( $events->have_posts() ) {
    while ( $events->have_posts() ) {
      $events->the_post(); ?>

      <?php

          $startDate 		= get_post_meta($post->ID, 'event_start_date', true);
          $startTime 		= get_post_meta($post->ID, 'event_start_time', true);
          $endDate 		= get_post_meta($post->ID, 'event_end_date', true);
          $endTime 		= get_post_meta($post->ID, 'event_end_time', true);

          $eventAddress 	= get_post_meta($post->ID, 'event_address', true);
          $display_map 	= get_post_meta($post->ID, 'event_display_map', true);

          $eventLocations = get_post_meta($post->ID, 'event_locations', true);


      ?>

      <li>
          <em>Join us on <?= $startDate ? date('F jS', $startDate):'';?> at <?= $startTime ? $startTime :''; ?> for...</em>
          <a href="<?php echo get_post_permalink(); ?>?" class="gold"><?php echo get_the_title(); ?></a>
      </li>


  <?php}
} else {
  echo '<p>No events at this time</p>';
} ?>
</ul>
