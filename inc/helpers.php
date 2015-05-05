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

	$authors_nicename 		= array( get_the_author_meta('nicename'), 		get_field('second_user')['user_nicename'], 	get_field('third_user')['user_nicename'] );
	$authors_displayname 	= array( get_the_author_meta('display_name'), 	get_field('second_user')['display_name'], 	get_field('third_user')['display_name'] );
	$authors_id 			= array( get_the_author_meta( 'ID' ), 			get_field('second_user')['ID'], 			get_field('third_user')['ID'] );
	$authors_credit 		= array( get_field('first_author_credit'), 		get_field('second_author_credit'), 			get_field('third_author_credit') );

	$bylines = '<div class="bylines">';

	for ($x = 0; $x < $num_authors; $x++) {
		$bylines = $bylines . '<h6 class="byline">' . $authors_credit[$x] . ' <a href="' . get_author_posts_url( $authors_id[$x] ) . '">' . $authors_displayname[$x] . '</a></h6>';
	}

	$bylines = $bylines . '</div>';

	echo $bylines;
}

/**
 * This block of code gets the About page URL: $about_url, the total number of
 * authors: $num_authors, and then builds arrays of the byline constructors: $authors and $author_credit.
 * Then echo the array of byline information.
 * Currently, these arrays are hard coded to only have 3 authors.
 */
function pbt_byline() {
	$author_credit = get_field('first_author_credit');

	$byline = '<div class="bylines"><h4 class="byline">' . $author_credit . '  <a href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '">' . get_the_author() . '</a></h4></div>';

	echo $byline;
}


/**
 * This function gets the post categories for the given story.
 * It rolls through each type of taxonomy that post type might have, checks if it's tagged,
 * then returns that cateogry, with link, for display.
 *
 * @param  post   $post    	The post object
 * @param  string $sep    	The category separator
 */
function pbt_the_categories($post, $sep = ' ') {

	$story_categories = '';

	if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

		$terms = get_the_terms( $post->ID , 'basin' );

		foreach ( $terms as $term ) {
			echo '<a href="' . get_term_link( $term ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ) . '">' . $term->name . '</a> '. $sep;
		}
	}

	$categories = get_the_category();
	$output = '';
	if($categories){
		foreach($categories as $category) {
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$sep;
		}
	echo trim($output, $sep);
	}
}

/**
 * This function gets the post categories for the given story.
 * It rolls through each type of taxonomy that post type might have, checks if it's tagged,
 * then returns that cateogry, with link, for display.
 *
 * @param  post   $post    	The post object
 * @param  string $sep    	The category separator
 */
function pbt_the_badged_categories($post, $sep = ' ') {

	$story_categories = '';

	if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

		$terms = get_the_terms( $post->ID , 'basin' );

		foreach ( $terms as $term ) {
			echo '<a href="' . get_term_link( $term ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ) . '"><span class="badge font-size-ex-small">' . $term->name . '</span></a> '. $sep;
		}
	}

	$categories = get_the_category();
	$cat_output = '';
	if($categories){
		foreach($categories as $category) {
			$cat_output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '"><span class="badge font-size-ex-small">'.$category->cat_name.'</span></a>'.$sep.$sep;
		}
	echo trim($cat_output, $sep);
	}

	echo ' ';

	$tags = get_the_tags();
	$output = '';
	if($tags){
		foreach($tags as $tag) {
			$output .= '<a href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '"><span class="badge font-size-ex-small">'.$tag->name.'</span></a>'.$sep;
		}
	echo trim($output, $sep);
	}
}

function get_ID_by_page_name($page_name) {
   global $wpdb;
   $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."' AND post_type = 'page'");
   return $page_name_id;
}