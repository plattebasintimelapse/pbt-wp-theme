<?php
/**
 * This block of code gets the total number of authors: $num_authors,
 * and then builds arrays of the byline constructors: $authors and $author_credit.
 * Then echo the array of byline information.
 * Currently, these arrays are hard coded to only have 3 authors.
 */
function pbt_bylines() {
	$num_authors = get_field('num_of_authors');

	$authors_nicename 		= array( get_the_author_meta('nicename'), 		get_field('second_user')['user_nicename'], 	get_field('third_user')['user_nicename'],	get_field('fourth_user')['user_nicename'] );
	$authors_displayname 	= array( get_the_author_meta('display_name'), 	get_field('second_user')['display_name'], 	get_field('third_user')['display_name'],	get_field('fourth_user')['display_name'] );
	$authors_id 			= array( get_the_author_meta( 'ID' ), 			get_field('second_user')['ID'], 			get_field('third_user')['ID'],				get_field('fourth_user')['ID'] );
	$authors_credit 		= array( get_field('first_author_credit'), 		get_field('second_author_credit'), 			get_field('third_author_credit'),			get_field('third_author_credit') );

	$bylines = '<div class="bylines">';

	for ($x = 0; $x < $num_authors; $x++) {
		$bylines = $bylines . '<h6 class="byline">' . $authors_credit[$x] . ' <a href="' . get_author_posts_url( $authors_id[$x] ) . '">' . $authors_displayname[$x] . '</a></h6>';
	}

	$bylines = $bylines . '</div>';

	echo $bylines;
}

/**
 * Simliar to above but returns only secondary authors.
 */
function pbt_secondary_bylines() {
	$num_authors = get_field('num_of_authors') - 1;

	$authors_nicename 		= array( get_field('second_user')['user_nicename'], 	get_field('third_user')['user_nicename'],	get_field('fourth_user')['user_nicename'] );
	$authors_displayname 	= array( get_field('second_user')['display_name'], 		get_field('third_user')['display_name'],	get_field('fourth_user')['display_name'] );
	$authors_id 			= array( get_field('second_user')['ID'], 				get_field('third_user')['ID'],				get_field('fourth_user')['ID'] );
	$authors_credit 		= array( get_field('second_author_credit'), 			get_field('third_author_credit'),			get_field('third_author_credit') );

	$bylines = '<div class="bylines">';

	for ($x = 0; $x < $num_authors; $x++) {
		$bylines = $bylines . '<h6 class="byline">' . $authors_credit[$x] . ' <a href="' . get_author_posts_url( $authors_id[$x] ) . '">' . $authors_displayname[$x] . '</a></h6>';
	}

	$bylines = $bylines . '</div>';

	echo $bylines;
}

/**
 * This block of code echos a formated byline for the top of the single.php page
 */
function pbt_byline() {
	$author_credit = get_field('first_author_credit');

	$byline = '<div class="bylines"><h4 class="byline">' . $author_credit . '  <a href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '">' . get_the_author() . '</a></h4></div>';

	echo $byline;
}


/**
 * Print out all the author meta stuff like Instagram links, email, etc.
 */
function pbt_author_meta($curauth) {
	if( $curauth->instagram !== '' ) {
		echo '<div class="author-link"><a target="_blank" href="http://www.instagram.com/' . $curauth->instagram . '"><i class="fa fa-instagram"></i></a></div>';
	}

	if( $curauth->twitter !== '' ) {
		echo '<div class="author-link"><a target="_blank" href="http://www.twitter.com/' . $curauth->twitter . '"><i class="fa fa-twitter"></i></a></div>';
	}

	if( $curauth->github !== '' ) {
		echo '<div class="author-link"><a target="_blank" href="http://www.github.com/' . $curauth->github . '"><i class="fa fa-github"></i></a></div>';
	}

	if( $curauth->flickr !== '' ) {
		echo '<div class="author-link"><a target="_blank" href="http://www.flickr.com/' . $curauth->flickr . '"><i class="fa fa-flickr"></i></a></div>';
	}

	if( $curauth->user_url !== '' ) {
		echo '<div class="author-link"><a target="_blank" href="' . $curauth->user_url . '"><i class="fa fa-laptop"></i></a></div>';
	}

	if( $curauth->public_email !== '' ) {
		echo '<div class="author-link"><a href="mailto:' . $curauth->public_email . '"><i class="fa fa-envelope-o"></i> <small>' . $curauth->public_email . '</small></a></div>';
	}
}

/**
 * This function returns the content for a learning object to be displayed
 * on the lesson page. It checks it is a complete learning object, then display the
 * pre_learn_more field, otherwise display entire content.
 *
 * @param  boolean   $has_lesson    A complete lesson with link
 * @param  boolean   $has_more    	A lesson with more to read
 * @param  interger	 $lo_id    		The ID of learning object
 */
function pbt_get_learning_object_lessoned_content($has_lesson, $has_more, $lo_id) {
	if ($has_lesson) {
        the_field('pre_learn_more', $lo_id );
        return '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $lo_id ) . '" href="' . get_permalink( $lo_id ) . '"><i class="fa fa-pencil"></i> Do Activity </a></h6>';
    } elseif ($has_more) {
        the_field('pre_learn_more', $lo_id );
        return '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $lo_id ) . '" href="' . get_permalink( $lo_id ) . '"><i class="fa fa-book"></i> Read More </a></h6>';
    } else {
        return get_the_content_by_id( $lo_id );
    }
}

function pbt_short_title() {
	$title = get_the_title();
	$short_title = substr($title,0,50);
	echo $short_title;
	if( $short_title != $title) { echo "..."; }
}

function get_the_content_by_id($post_id) {
	$page_data = get_page($post_id);
	if ($page_data) {
		return $page_data->post_content;
	}
		else return false;
}


/**
 * This function gets the post categories for the given story.
 * It rolls through each type of taxonomy that post type might have, checks if it's tagged,
 * then echos that cateogry, with link, for display.
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
 * This function checks to see if the given post has any tags, of all taxonomies.
 *
 * @param  post   $post    	The post object
 */
function pbt_has_categories($post) {
	$total = 0;
	$story_categories = '';

	if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

		$terms = get_the_terms( $post->ID , 'basin' );

		foreach ( $terms as $term ) {
			$total = $total + 1;
		}
	}

	$categories = get_the_category();
	$cat_output = '';
	if($categories){
		foreach($categories as $category) {
			$total = $total + 1;
		}
	}

	$tags = get_the_tags();
	$output = '';
	if($tags){
		foreach($tags as $tag) {
			$total = $total + 1;
		}
	}
	if ($total >= 1):
		return True;
	else:
		return False;
	endif;
}

/**
 * This function gets the post categories for the given story.
 * It rolls through each type of taxonomy that post type might have, checks if it's tagged,
 * then echos that cateogry, with link, for display.
 *
 * @param  post   $post    	The post object
 * @param  string $sep    	The category separator
 */
function pbt_the_badged_categories($post, $sep = ' ') {

	$story_categories = '';

	echo ' ';

	if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

		$terms = get_the_terms( $post->ID , 'basin' );

		foreach ( $terms as $term ) {
			echo '<a href="' . get_term_link( $term ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ) . '"><span class="badge font-size-ex-small">' . $term->name . '</span></a> '. $sep;
		}
	}

	if ( is_object_in_term( $post->ID , 'series' ) ) { //check to see if post has series category

		$terms = get_the_terms( $post->ID , 'series' );

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