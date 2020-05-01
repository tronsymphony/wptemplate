<?php

    $startDate 		= get_post_meta($post->ID, 'event_start_date', true);
    $startTime 		= get_post_meta($post->ID, 'event_start_time', true);
    $endDate 		= get_post_meta($post->ID, 'event_end_date', true);
    $endTime 		= get_post_meta($post->ID, 'event_end_time', true);

    $eventAddress 	= get_post_meta($post->ID, 'event_address', true);
    $display_map 	= get_post_meta($post->ID, 'event_display_map', true);

    $eventLocations = get_post_meta($post->ID, 'event_locations', true);


?>
<div>
    <em>Join us on <?= $startDate ? date('F jS', $startDate):'';?> at <?= $startTime ? $startTime :''; ?> for...</em>
    <h2><?php echo get_the_title(); ?></h2>
    <a href="<?php echo get_post_permalink(); ?>?" class="btn btn-white hvr-grow-shadow">Learn More</a>
</div>
