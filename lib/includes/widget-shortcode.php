<?php
// shortcode in widgets
    if ( !is_admin() ){
        add_filter('widget_text', 'do_shortcode', 11);
    }

 ?>
