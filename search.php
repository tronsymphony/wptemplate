<?php
  global $query_string;
  $query_args = explode("&", $query_string);
  $search_query = array();
  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  }

  $search = new WP_Query($search_query);
?>
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
      <div class="col-md-12">
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
      <main class="col-sm-12">
        <div class=" justify-content-center">
          <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
              get_template_part( 'template-parts/content/excerpt');
            }?>
              <?php echo '<div class="col-lg-12">
              <nav class="pagination mx-auto">'?>
                <?php
                global $wp_query;
                $big = 999999999;
                echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $wp_query->max_num_pages
                ) );?>

              <?php echo '</nav>
          </div>'?>
          <?php } else {
            get_template_part( 'template-parts/content/no-results' );
          }
          ?>
        </div>
      </main>

    </div>
  </div>
</div>

<?php get_footer()?>
