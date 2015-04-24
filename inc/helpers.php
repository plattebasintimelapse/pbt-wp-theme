<?php

/**
 * This block of code gets the About page URL: $about_url, the total number of
 * authors: $num_authors, and then builds arrays of the byline constructors: $authors and $author_credit.
 * Then echo the array of byline information.
 * Currently, these arrays are hard coded to only have 3 authors.
 */
function pbt_bylines() {
	$about_url = esc_url( get_permalink( get_page_by_title( 'About' ) ) );
	$num_authors = get_field('num_of_authors');

	$authors_nicename 		= array( get_the_author_meta('nicename'), get_field('second_user')['user_nicename'], get_field('third_user')['user_nicename'] );
	$authors_displayname 	= array( get_the_author_meta('display_name'), get_field('second_user')['display_name'], get_field('third_user')['display_name'] );
	$author_credit 			= array( get_field('first_author_credit'), get_field('second_author_credit'), get_field('third_author_credit') );

	$bylines = '<div class="bylines">';

	for ($x = 0; $x < $num_authors; $x++) {
		$bylines = $bylines . '<h4 class="byline">' . $author_credit[$x] . ' <a href="' . $about_url . '#' . $authors_nicename[$x] . '">' . $authors_displayname[$x] . '</a></h4>';
	}

	$bylines = $bylines . '</div>';

	echo $bylines;
}