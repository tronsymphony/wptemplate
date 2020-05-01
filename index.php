<?php get_header()?>


<section class="foldimage">
  <?php get_template_part('template-parts/banner/full-width') ?>

  <?php 
  if ( function_exists('yoast_breadcrumb') ) { 
    yoast_breadcrumb("<div class=\"breadcrumbs\"><div class=\"crumbscontainer\">","</div></div>" ); 
    } 
  ?>

  <section class="main-title fade-up-stop">
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
  <div class="containerish">
    <div class="row">


        <div class="col-sm-12 col col-md-12">


<div class="row">


            <div class="blogcats">
              <ul class="cats">
              <?php wp_list_categories( array(
                  'orderby' => 'name',
                  'title_li'=>'',
                  'exclude'=>array(14,1),
              ) ); ?> 
              </ul>
            </div>

</div>

      <div class="row">
      <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();

            ?>
            <?php 
            $alt_text;

            if ( has_post_thumbnail( $post->ID ) ){
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-medium' );
              $image = $image[0];
              $alt_text = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);

            } else {
              $image = IMG . '/block-placeholder.jpg';
            } 

              if(empty($alt_text)){
                $alt_text =  get_the_title();
              }
            ?>

            <div class="col-lg-4 col-sm-6 pb-4 p-md-4">
              <div class="card h-100">
                <a href="<?php the_permalink() ?>" class="d-block">
                  <img src="<?php echo $image; ?>" alt="<?php echo $alt_text; ?>" class="card-img-top">
                </a>
                <div class="card-body text-center d-flex flex-column justify-content-around align-items-center">
                  <h4 class="card-title reveal-2"><?php the_title(); ?></h4>
                  <p class="card-text reveal-2"><?php echo get_the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="ui-btn ui-btn-main">LEARN MORE</a>
                </div>
              </div>
            </div>

            <?php

          }
        } else {
          echo '<div class="col-lg-12">';
          get_template_part( 'template-parts/content/no-content' );
          echo '</div>';
        }
      ?>
      </div>

 
        
      </div>

    </div>
    <!-- End Row -->
    <div class="row">
      <!-- Start Col -->
      <div class="col-md-12 text-center">
        <nav class="pagination">
          <?php
              global $wp_query;
              $big = 999999999;
              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
              ) );
            ?>
        </nav>
      </div>
      <!-- End Col -->
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

<?php get_footer()?>
