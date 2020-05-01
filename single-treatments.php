<?php get_header()?>
<?php get_template_part('data/schema/treatment-schema') ?>



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
 


 

<div class="interior-bg pagesection ">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <section class="entry-content">
          <?php
          $treatment     = $client->treatment(get_the_ID());
          $conditions    = $treatment->conditions();
          $locations     = $treatment->locations();
          $providers     = $treatment->providers();
          $videogallery  = $treatment->videogallery();

            if (have_posts()) {
              while (have_posts()) {
                the_post();
                get_template_part( 'template-parts/content/content' );
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
      <?php if ( !empty( $providers ) ) : ?>
      <div class="col-sm-12">
        <hr>
        <h4>Providers specializing in <?php echo $treatment->name ?></h4>
        <ul>
          <?php foreach ( $providers as $provider ) : ?>
          <li>
            <a href="<?php echo $provider->permalink; ?>" class="ui-btn ui-btn-main"><?php echo $provider->name ?></a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
      <?php endif ?>




      <?php if ( !empty( $conditions ) ) : ?>
        <div class="col-sm-12">
          <div id="treated-by" class="associations">
          <h2 class="sec-title">CONDITIONS TREATED</h2>
            <ul class="related-treatments">
                <?php foreach ( $conditions as $conditions ) : ?>
                    <li>
                        <a href="<?php echo $conditions->permalink; ?>" class="ui-btn"><?php echo $conditions->name ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
          </div>
        </div>
      <?php endif ?>



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
