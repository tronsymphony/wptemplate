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
 

<div class="interior-bg pagesection">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <section class="entry-content">
          <?php
                      if (have_posts()) {
                        while (have_posts()) {
                          the_post();
          get_template_part( 'template-parts/content/content-no-feat');

            }
          } else {
            get_template_part( 'template-parts/content/no-content' );
          }
            ?>
          <?php echo do_shortcode( '[ui_gallery id="'.$post->ID.'"]' ) ?>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <hr />
        <?php if(!is_single( '343' )): ?>
        <!-- <sup>* Individual results may vary; not a guarantee.</sup> -->
        <?php endif; ?>


        
        <?php get_template_part( 'widgets/share' ); ?>
        <?php get_template_part( 'widgets/edit' ); ?>
      </div>
    </div>
  </div>
</div>


<style>
  .gallery-item img {
    margin-bottom: 0;
    max-width: 100%;
    height: auto;
  }

  .gallery-item a {
    position: relative;
    display: block;
    margin-bottom: 15px;
  }

  .gallery-item a.overlay:before {
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.5);
    transition: opacity 0.5s ease;
  }

  .gallery-item h3 {
    position: absolute;
    color: white;
    top: 45%;
    width: 100%;
    text-align: center;
    opacity: 0;
    transition: opacity 0.5s ease;
    font-weight: 300;
  }

  .gallery-item a.overlay:hover:before,
  .gallery-item a.overlay:hover h3 {
    opacity: 1;
  }

  .lg-outer .lg-thumb-item.active,
  .lg-outer .lg-thumb-item:hover {
    border-color: #70657a;
  }

  .lg-outer .lg-thumb {
    margin: 0 auto;
  }

  .portfolio-title {
    padding: 4rem 2rem 2rem;
    margin-bottom: 0;
    text-align: center;
    color: white;
  }
</style>
<?php get_footer()?>