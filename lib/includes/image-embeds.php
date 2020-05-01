<?php

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
   return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

?>
