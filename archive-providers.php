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
          <?php if ( is_post_type_archive() ) { ?>
    <h1>
      <?php post_type_archive_title(); ?>
    </h1>
    <?php } else { ?>
      <h1>
        <?php single_cat_title();?>
      </h1>
    <?php } ?>
      </div>
    </div>
  </section>

</section>
 

<div class="interior-bg pagesection fade-up-stop">
 <div class="container">
    <div class="row">
      <main class="col-md-12">
        <div class="row justify-content-center">
          <?php
            $providers = array(
              'post_type' => 'providers',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'orderby' => 'menu_order'
            );
            $loop = new WP_Query( $providers  );
            if($loop->have_posts()){
              while ( $loop->have_posts() ):
                $loop->the_post();
                ?>
                <?php 
                  $alt_text;

                  if ( has_post_thumbnail( $post->ID ) ){
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-large' );
                    $image = $image[0];
                    $alt_text = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);

                  } else {
                    $image = IMG . '/placeholder.jpg';
                  } 

                    if(empty($alt_text)){
                      $alt_text =  get_the_title();
                    }
                  ?>

                  <div class="col-lg-4 col-sm-6 pb-4 p-md-4">
                    <div class="card h-100">
                      <a href="<?php the_permalink() ?>" class="d-block"><img src="<?php echo $image; ?>" alt="<?php echo $alt_text; ?>" class="card-img-top"></a>
                      <div class="card-body text-center d-flex flex-column justify-content-around align-items-center">
                        <h4 class="card-title reveal-2"><?php the_title(); ?></h4>
                        <p class="card-text reveal-2"><?php echo get_the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="ui-btn ui-btn-main">LEARN MORE</a>
                      </div>
                    </div>
                  </div>

                <?php
              endwhile;
              wp_reset_postdata();
            }
            else {
              get_template_part( 'template-parts/content/no-content' );
            }
          ?>
        </div>

        <?php $post_count = wp_count_posts('providers')->publish;
        if ($post_count > 12 ) : ?>
        <div class="col-md-12 text-center bluebg">
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
        <?php endif; ?>
      </main>
    </div>
  </div>
</div>

<?php get_footer()?>
