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
 

<!-- <section class="entry-content"> -->
<div class="interior-bg pagesection ">
 <div class="container">
    <div class="row">
      <main class="col-md-12 archive gallery-archive">
        <div class="row justify-content-center">
          <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();

              get_template_part( 'template-parts/content/gallery');

            }
          } else {
            get_template_part( 'template-parts/content/no-content' );
          }
          ?>
        </div>
      </main>
    </div>
  </div>
</div>
<!-- </section> -->
<style>
  /* Portfolio Page */
  .gallery-box{margin-bottom: 30px;}
  .gallery-box img{
    width: auto;
    height: 100%;
  }
  .gallery-archive {
    height:auto;
  }
  .gallery-archive .featured-image {max-width:100%;height:auto;}
  .slider-gallery {height:200px;width:100%;overflow-y: hidden;position:relative;}
  .slider-gallery a {
    position:absolute;
    height:100%;
    width:100%;
  }

  .slider-gallery .overlay:before {opacity:0;background-color:rgba(0, 0, 0, 0.5);transition: all 0.5s ease;}
  .gallery-title {
    font-size:120%;
  }

  /* hover style - overlay and title are set to opacity 0 initially*/
  .slider-gallery:hover .overlay:before {opacity:1;}

  /* Lightbox */
  .lg-backdrop, .lg-outer .lg-thumb-outer {background-color:white;}
  .lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover {border-color:#0b1f2c;}
  .lg-actions .lg-next, .lg-actions .lg-prev, .lg-outer .lg-toogle-thumb, .lg-toolbar .lg-icon, .lg-sub-html, .lg-toolbar {background-color:transparent;color:black;}
  .lg-actions .lg-next:hover, .lg-actions .lg-prev:hover, .lg-outer .lg-toogle-thumb:hover, .lg-toolbar .lg-icon:hover, .lg-toolbar:hover  {color:#999}
  .portfolio-title {padding:30px;margin-bottom:0px;}
  .lg-outer .lg-image {vertical-align:top;}
  .lg-outer .lg-img-wrap {height:calc(100% - 193px);}
  .lg-outer .lg-inner { top: 93px; }
  /*lightbox controls */
  .lg-actions .lg-next:before {
    content: "\f105";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    font-size: 36px;
    padding-right: 1em;
    position: absolute;
    top: 10px;
    left: 0;
  }
  .lg-actions .lg-prev:after {
    content: "\f104";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    font-size: 36px;
    padding-right: 1em;
    position: absolute;
    top: 10px;
    left: 0;
  }
  @media (min-width: 768px) and (max-width: 991px) {
    .gallery-archive {float:none;}
  }
  @media (max-width: 767px) {
    /* Portofolio page*/
    .slider-gallery {height:600px;max-height:100%;}
    .gallery-title {font-size:120%;top:50%;}
  }
  @media (max-width: 480px) {
    .slider-gallery {
      height:400px;
    }
  }
</style>
<?php get_footer()?>
