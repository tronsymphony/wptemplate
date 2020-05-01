<?php
// fixes validation for tag links and rel
function remove_category_rel($output)
{
    $output = str_replace(' rel="category tag"', '', $output);
    return $output;
}
add_filter('the_category', 'remove_category_rel');
 ?>
