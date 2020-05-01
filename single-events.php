<?php get_header()?>
 
 

<section class="foldimage">
  <?php get_template_part('template-parts/banner/full-width') ?>

  <?php 
  if ( function_exists('yoast_breadcrumb') ) { 
    yoast_breadcrumb("<div class=\"breadcrumbs\"><div class=\"crumbscontainer\">","</div></div>" ); 
    } 
  ?>

  <section class="main-title ">
    <div class="row-r containerish">
      <div class="col-md-12r">
        <h1><?php the_title(); ?></h1>
        <p><?php 
        // if(get_the_excerpt()){ 
        //     // the_excerpt(); 
        //   } 
          ?></p>
      </div>
    </div>
  </section>

        </section>


<div class="interior-bg pagesection fade-up-stop">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <section class="entry-content">
          <?php
          if (have_posts()) {
              while (have_posts()) {
                  the_post();
                  get_template_part( 'template-parts/content/content' );

              }
          } else {
              get_template_part( 'template-parts/content/no-content' );
          }
          ?>
          <?php

              $startDate 		= get_post_meta($post->ID, 'event_start_date', true);
              $startTime 		= get_post_meta($post->ID, 'event_start_time', true);
              $endDate 		= get_post_meta($post->ID, 'event_end_date', true);
              $endTime 		= get_post_meta($post->ID, 'event_end_time', true);

              $eventAddress 	= get_post_meta($post->ID, 'event_address', true);
              $display_map 	= get_post_meta($post->ID, 'event_display_map', true);

              $eventLocations = get_post_meta($post->ID, 'event_locations', true);
          ?>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <hr />
        <!-- <p>* Individual results may vary; not a guarantee.</p> -->
        <?php get_template_part( 'widgets/share' ); ?>
        <?php get_template_part( 'widgets/edit' ); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
