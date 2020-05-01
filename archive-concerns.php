<?php get_header()?>
<section class="foldimage">
  <?php get_template_part('template-parts/banner/full-width'); ?>

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
    <!-- Begin Row -->
    <div class="row">
      <?php
        if (have_posts()) {
          while (have_posts()) {
            the_post();

            get_template_part( 'template-parts/content/excerpt');

          }
        } else {
          get_template_part( 'template-parts/content/no-content' );
        }
      ?>
    </div>
    <!-- End Row -->
  </div>
</div>

<?php get_footer()?>
