<?php


function pbt_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'pbt_excerpt_length', 999 );