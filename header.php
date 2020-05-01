<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="<?php wp_title(); ?>">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="shortcut icon" type="image/ico" href="<?php echo IMG; ?>/favicon.ico">
  
  <!-- WPHEAD -->
  <?php wp_head(); ?>
  <!-- WPHEAD -->
  
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/public/frontend.css">

<?php $client = new Urge\Urge(); ?>
<?php 
// get_template_part( 'data/analytics' ) ?>
<?php 
// get_template_part( 'data/schema/schema' ) ?>
<?php //get_template_part( 'data/tag-manager' ) ?>
<?php //get_template_part( 'data/fb-pixel' ) ?>
</head>

<body <?php if(!is_front_page()){$sub = "subpage";} ?>  <?php body_class($sub); ?> id="top" itemscope itemtype="http://schema.org/WebPage">

 <!-- HEADER -->
 <header id="header-container">
        <!-- Top Bar -->
        <section class="top-bar">
           <div class="container">
                <nav class="tb-links">
                   <div class="btn-container">
                    <a href="<?php echo get_site_url(); ?>/promotions" class="ui-btn ui-header">Promotions</a>        
                    <a href="<?php echo get_site_url(); ?>/events" class="ui-btn ui-header">Events</a>  
                    <a href="<?php echo get_site_url(); ?>/blog" class="ui-btn ui-header">Blog</a>   
                    <a href="<?php echo TELLINKPHONE; ?>" class="ui-btn ui-header"><span class="b"><?php echo PHONE; ?></span></a>  
                   </div>
                </nav>
           </div>
        </section>

        <section class="nav-container">
            
            <div class="logonav">
                <a href="<?php echo get_site_url(); ?>" class="nav-logo">
                    Logo
                </a>
            </div>

            <nav class="navdiv">
                <span class="closebutton">
                    <div class="bars">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </span>

                <div class="navbaritems">
                    <?php
                        wp_nav_menu( array(
                            'menu'           => 'Main Menu', 
                            'fallback_cb'    => false,
                            'items_wrap' => '<ul id="%1$s" class="%2$s items">%3$s</ul>', 
                            'theme_location' => 'sidebar_right_menu', 
                            'walker' => new SH_Nav_Menu_Walker
                        ) );
                    ?>
                </div>
            </nav>
        </section>
    </header>
    <!-- HEADER -->