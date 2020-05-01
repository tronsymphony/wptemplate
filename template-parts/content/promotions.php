
<?php $promotions = array( 
    'post_type' => 'promotions', 
    'posts_per_page' => 1, 
    'order' => 'DESC'
);
$loop = new WP_Query( $promotions  );
if($loop->have_posts()): ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); 
    $start_date = get_post_meta(get_the_ID(), 'promotions_start_date', true);
    $end_date = get_post_meta(get_the_ID(), 'promotions_end_date', true);
    $time_start = get_post_meta(get_the_ID(), 'promotions_start_time', true);
    $time_end = get_post_meta(get_the_ID(), 'promotions_end_time', true);
    $content = get_the_content();
?>


<a href="<?php the_permalink() ?>" class="topbar-link color-dark">
    <?php echo get_the_title(); ?>
</a>

<?php endwhile; ?>

<?php wp_reset_postdata(); endif; ?>