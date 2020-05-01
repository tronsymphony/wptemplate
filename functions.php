<?php
// These allow for shorter relative paths when loading assets
define("THEME",     get_template_directory_uri()); // wp-content/themes/this_theme_directory
define("IMG",     get_template_directory_uri()."/img"); // wp-content/themes/this_theme_directory/img
define("PHONE", "(409) 300-1620");
define("TELLINKPHONE", "tel:409-300-1620");

// Remove jQuery Migrate
function atulhost_optimize_scripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');
}
add_action('wp_enqueue_scripts', 'atulhost_optimize_scripts');

// This allows for the content association to be displayed and cached as an object on the server
require_once __DIR__ . '/lib/vendor/autoload.php';

// This controls the CSS and JS assets being loaded
require_once __DIR__ . '/lib/enqueue.php';

// This allows you to use the WP Menu Builder to Create a Menu, css can be found in css/src/partials/menu.scss
require_once __DIR__ . '/lib/wp-bootstrap-navwalker.php';

// This includes the plethora of core overrides in a UI built theme
require_once __DIR__ . '/lib/overrides.php';

// Where any custom shortcode definitions should resides
require_once __DIR__ . '/lib/shortcodes.php';

// Where the form handler resides
require_once __DIR__ . '/lib/ui-ajax.php';

// Initializes the Urge Content Object for the UI Options post types and field meta
$client = new Urge\Urge();

// Registers a specific menu for the nav-walker to work on
register_nav_menus( array( 'primary' => __( 'Main Nav', 'ui_client' ),) );

// Gutenberg support filters
add_theme_support('editor-styles');
add_theme_support( 'align-wide' );
add_theme_support( 'align-full' );
add_theme_support( 'responsive-embeds' );
// wp-admin only
add_editor_style( 'gutenberg.css' ); 


// existing functionality
function ui_front_concerns_form() {
    wp_safe_redirect( $_POST['concerns'] );
}
add_action( 'admin_post_nopriv_concerns_form', 'ui_front_concerns_form');
add_action( 'admin_post_concerns_form', 'ui_front_concerns_form');

// existing functionality
function show_all_custom_posts($query) {
  //check if on backend admin page or if not in main query
  if( is_admin() || ! $query->is_main_query()) {
    return;
  }

    if( is_post_type_archive( array('treatments', 'concerns')) || is_tax()){
    $query->set( 'posts_per_page', -1 );
    $query->set( 'order', 'ASC' );
    $query->set( 'orderby', 'title' );
    return;
  }
}

add_action('pre_get_posts', 'show_all_custom_posts', 1);

//add excerpts to pages (will not need to do this on UI Options post types)
add_post_type_support( 'page', 'excerpt' );


add_filter( 'body_class', 'my_neat_body_class');

function my_neat_body_class( $classes ) {
    if (!is_front_page()) {
          $classes[] = 'subpage';
	}
	return $classes; 
}




add_filter( 'wp_nav_menu_objects', 'add_has_children_to_nav_items' );

function add_has_children_to_nav_items( $items )
{
    $parents = wp_list_pluck( $items, 'menu_item_parent');

    foreach ( $items as $item )
        in_array( $item->ID, $parents ) && $item->classes[] = 'hasdropdown';

    return $items;
}




