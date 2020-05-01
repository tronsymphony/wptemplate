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
        <p>
          
        </p>
      </div>
    </div>
  </section>





</section>
 

<div class="interior-bg pagesection ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <section class="entry-content">

          <?php
          $condition = $client->condition(get_the_ID());
          $treatments = $condition->treatments();
          $locations = $condition->locations();

            if (have_posts()) {
              while (have_posts()) {
                the_post();
                get_template_part( 'template-parts/content/content');

              }
            } else {
              get_template_part( 'template-parts/content/no-content' );
            }
          ?>
          <p><small>*Individual results may vary; not a guarantee.</small></p>
        </section>
      </div>
    </div>

    <div class="row py-3">

      <?php if ( !empty( $treatments ) ) : ?>
        <div class="col-sm-12">
          <div id="treated-by" class="associations">
          <h2 class="sec-title">Our Services</h2>
            <ul class="related-treatments">
                <?php foreach ( $treatments as $treatment ) : ?>
                    <li>
                        <a href="<?php echo $treatment->permalink; ?>" class="ui-btn"><?php echo $treatment->name ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
          </div>
        </div>
      <?php endif ?>

 

      <div class="col-sm-12">
        <hr />
        <!-- <p>* Individual results may vary; not a guarantee.</p> -->
        <?php 
        get_template_part( 'widgets/share' ); ?>
        <?php get_template_part( 'widgets/edit' ); ?>
      </div>

    </div>
  </div>
  
  
</div>



 

<?php get_footer(); ?>
