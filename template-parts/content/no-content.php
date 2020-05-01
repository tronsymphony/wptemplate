<div class="text-center"><?php if ( is_post_type_archive() ) { ?>
    <h2>No <?php post_type_archive_title(); ?> at this time</h2>
    <p class="lead">Please call <a href="<?php echo TELLINKPHONE; ?>" class="link"><?php echo PHONE; ?></a> to find out more.</p>
    <div class="row">
      <div class="col-md-12 mr-auto ml-auto">

        <?php get_template_part('forms/subscribe') ?>

      </div>
    </div>
  <?php } elseif (is_category()) { ?>
    <h2>No <?php single_cat_title();?> Posts Found</h2>
  <?php } else { ?>
    <h2>No Articles at this time</h2>
  <p class="lead">Please call <a href="<?php echo TELLINKPHONE; ?>" class="link"><?php echo PHONE; ?></a> to find out more.</p>
    <div class="row">
      <div class="col-md-12 mr-auto ml-auto">

        <?php get_template_part('forms/subscribe') ?>

      </div>
  </div>
  <?php } ?>
  </div>
