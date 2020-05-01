<ul>
<?php
// The Query
$promoargs = array(
    'post_type' => 'promotions',
    'posts_per_page' => 2
);

$promos = new WP_Query( $promoargs );

// The Loop
if ( $promos->have_posts() ) {
    while ( $promos->have_posts() ) {
      $promos->the_post();?>
      <li>
          <a href="<?php echo get_post_permalink(); ?>?" class="gold"><?php echo get_the_title(); ?></a>
      </li>
<?php  }
} else {
  echo '<p>No promotions at this time</p>';
} ?>
</ul>
