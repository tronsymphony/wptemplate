<?php

	$args = array(
		'orderby' => 'title' ,
		'order' => 'DESC',
		'post_status' => 'publish',
		'post_type' => 'location',
		'posts_per_page' => -1,
	);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {

		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			if ( has_post_thumbnail( $post->ID ) ){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb' );
				$thumb = $thumb[0];
			} else {
				$thumb = get_bloginfo('wpurl') . '/images/placeholder.png';
			}
			echo '<li>' . get_the_title() . '</li>';
		}
	} else {
		echo '<p>No locations</p>';
	}
	/* Restore original Post Data */
	wp_reset_postdata();
?>
