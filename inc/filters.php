<?php


function pbt_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'pbt_excerpt_length', 999 );

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');