<?php
// Removes Private and Protected verbiage on such pages
function the_title_trim($title) {
$title = esc_attr($title);
$findthese = array(
    '#Protected:#',
    '#Private:#'
);
$replacewith = array(
    '', // What to replace "Protected:" with
    '' // What to replace "Private:" with
);
$title = preg_replace($findthese, $replacewith, $title);
return $title;
}

add_filter('the_title', 'the_title_trim');
 ?>
