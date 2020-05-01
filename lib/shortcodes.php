<?php
// SHORT CODES

function schedule_form( $attr ) {
    ob_start();
    get_template_part( 'forms/schedule' );
    return ob_get_clean();
}
add_shortcode( 'schedule-form', 'schedule_form' );






function consultation_button( $attr ) {
    ob_start();
    echo '<a href="#schedule" class="btn btn-blue">Schedule a Consultation</a>';
    return ob_get_clean();
}
add_shortcode( 'consultation', 'consultation_button' );

function recent_posts_function() {

    $custom_query = new WP_Query(array(
		'orderby' => 'date' ,
		'order' => 'DESC',
		// 'post_status' => 'publish',
		'post_type' => 'promotions',
		'posts_per_page' => 2,
    ));

    $events_query = new WP_Query(array(
		'orderby' => 'date' ,
		'order' => 'DESC',
		// 'post_status' => 'publish',
		'post_type' => 'events',
		'posts_per_page' => 1,
    ));
    wp_reset_query();
    ob_start();
    ?>
    <section class="events">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 section-img">
            <div class="section-info text-right">
              <h2 class="color-dark fade-in-bottom">THE SKIN CORNER</h2>
              <p class="body-copy color-white mt-3 mb-4 fade-in-bottom">
                Committed to educating you on the latest technology and medically directed products.
              </p>
              <a href="#" class="ui-btn ui-btn-dark fade-in-bottom">Learn More</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-12 upcoming-events p-4">
                <h2 class="color-white">EVENTS AT THE CENTER</h2>
        
                <?php 
                if($events_query->have_posts()):
                        while($events_query->have_posts()) : $events_query->the_post(); ?>

                    <a href="<?php echo get_the_permalink(); ?>" class="media-object">
                        <div class="media mt-3">
                            <img src="http://localhost:8000/wp-content/themes/ui_tanghetti/images/promo-1-coolpeel.jpg" class="mr-2">
                            <div class="media-body">
                            <h4 class="mt-0 color-dark"><?php the_title(); ?></h4>
                            <p class="body-copy color-white mt-2">
                                Now’s the time to reveal healthier, younger-looking skin with our new Tetra CO2
                                Cool Peel Device!
                            </p>
                            </div>
                        </div>
                    </a>

                    <?php endwhile; 
                    else:
                        ?>
                                <p class="body-copy color-white mt-3 mb-4">
                                  No Upcoming Events at this time
                                </p>
                        <?php
                        endif;
                ?>
                <?php wp_reset_query(); // reset the query ?>
                <a href="#">View All Events</a>
              </div>
            </div>
            <div class="row h-100">
              <div class="col-12 promotions p-4">
                <h2 class="color-white">PROMOTIONS AT THE SKIN CORNER</h2>
                <?php 
                    while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                    <a href="<?php echo get_the_permalink(); ?>" class="media-object">
                        <div class="media mt-3">
                            <img src="http://localhost:8000/wp-content/themes/ui_tanghetti/images/promo-1-coolpeel.jpg" class="mr-2">
                            <div class="media-body">
                            <h4 class="mt-0 color-dark"><?php echo get_the_title(); ?></h4>
                            <p class="body-copy color-white mt-2">
                                Now’s the time to reveal healthier, younger-looking skin with our new Tetra CO2
                                Cool Peel Device!
                            </p>
                            </div>
                        </div>
                    </a>

                <?php endwhile; ?>
                <?php wp_reset_query(); // reset the query ?>

               

                <a href="#">View All Promotions</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php

    return ob_get_clean();
 }

 function register_shortcodes(){
    add_shortcode('recent-posts', 'recent_posts_function');
 }

 add_action( 'init', 'register_shortcodes');






 function testimonials_function() {


    ob_start();
    ?>
      <!-- testimonials -->
      <section class="testimonials d-flex align-items-center">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 mx-auto text-center">
            <h2 class="color-dark mb-4 fade-in-bottom">
              OUR PATIENTS' EXPERIENCE MATTERS
            </h2>
            <div class="testimonial-slider-wrapper">
              <div class="testimonial-slider">
                <p class="testimonial-copy color-light">
                  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi iure enim voluptatibus
                  et praesentium
                  excepturi illum sed omnis voluptatem recusandae tempora, itaque magni quo officia esse
                  porro est ducimus
                  at.
                </p>
                <p class="testimonial-copy color-light">
                  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi iure enim voluptatibus
                  et
                  praesentium excepturi illum sed omnis voluptatem recusandae tempora, itaque magni quo
                  officia esse porro est ducimus at."
                </p>
                <p class="testimonial-copy color-light">
                  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi iure enim
                  voluptatibus et praesentium excepturi illum sed omnis voluptatem recusandae
                  tempora, itaque magni quo officia esse porro est ducimus at."
                </p>
                <p class="testimonial-copy color-light">
                  "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Commodi iure enim voluptatibus et praesentium excepturi illum
                  sed omnis voluptatem recusandae tempora, itaque magni quo
                  officia esse porro est ducimus at."
                </p>
              </div>
              <div class="testimonial--slider-nav d-none d-md-flex">
                <i class="fas fa-chevron-left testimonial--slider-nav-arrow-left mr-2"></i>
                <!-- dots here -->
                <div class="testi-dots"></div>
                <i class="fas fa-chevron-right testimonial--slider-nav-arrow-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /testimonials -->
    <?php

    return ob_get_clean();
 }

 function testimonials_shortcodes(){
    add_shortcode('testimonials-slider', 'testimonials_function');
 }

 add_action( 'init', 'testimonials_shortcodes');




 function researchfunction( $attr ) {
    ob_start();
    ?>
    <section class="research">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-7">
                <div class="box light db-shadow"></div>
            </div>
            <div class="col-md-5">
                <h2 class="color-dark fade-in-bottom">
                <span class="bar"></span>
                RESEARCH, STUDIES AND PUBLICATIONS
                </h2>
                <p class="body-copy color-dark mt-3 mb-4 fade-in-bottom">
                Dr. Tanghetti has been instrumental to many reasearch projects, studies and published publications in many
                parts of the world.
                </p>
                <a href="#" class="ui-btn ui-btn-dark fade-in-bottom">View All Puplications</a>
            </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'research-publications', 'researchfunction' );

function clinicaltrials( $attr ) {
    ob_start();
    ?>
<section class="clinicals">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 order-2 order-md-1">
            <h2 class="color-dark fade-in-bottom">
              <span class="bar"></span>
              CLINICAL TRIALS
            </h2>
            <p class="body-copy color-dark mt-3 mb-4 fade-in-bottom">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
              et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
              Stet clita kasd gubergren, no sea
            </p>
            <a href="#" class="ui-btn ui-btn-dark fade-in-bottom">View Current Trials</a>
          </div>
          <div class="col-md-7 order-1 order-md-2">
            <div class="box light db-shadow"></div>
          </div>
        </div>
      </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'trials-publications', 'clinicaltrials' );


?>