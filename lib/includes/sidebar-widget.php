<?php
// Custom widget
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'sidebar-general',
		    'id'              =>   'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
));

?>
