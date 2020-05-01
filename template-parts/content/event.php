<?php 
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  $image = $image[0];
  $event = array( 
      'post_type' => 'events', 
      'posts_per_page' => 1, 
      'order' => 'DESC'
  );
  $loop = new WP_Query( $event  );
  if($loop->have_posts()): 
    while ( $loop->have_posts() ) : $loop->the_post(); 
      $start_date = get_post_meta(get_the_ID(), 'event_start_date', true);
      $time_start = get_post_meta(get_the_ID(), 'event_start_time', true);
      $time_end = get_post_meta(get_the_ID(), 'event_end_time', true);
      $content = get_the_content();
?>

        <section class="event-sec" item-scope itemtype="http://schema.org/Event">
          <div class="section-cntr">
            <div class="split-sections">
              <div class="event-image"></div>
            </div>
            <div class="split-sections split-textcontn fade-in event-ol">
                <h2 class="section-title event-title color-white" itemprop="name">
                  <?php echo get_the_title(); ?>
                </h2>
                <div class="event-time event-copy color-white" itemprop="time">
                  <?= $start_date ? date('F jS', $start_date):'';?> at <?php echo $time_start?date('g:i A',(int)$time_start):''  ?>
                </div>
                <p >Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                <div class="ui-btn-section-box">
                  <a href="<?php the_permalink() ?>" class="ui-btn ui-btn-mainclr event-btn">RSVP Now!</a>
                </div>
            </div>
          </div>
        </section>

<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>

