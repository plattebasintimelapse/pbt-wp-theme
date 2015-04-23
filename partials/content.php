<?php
/**
 * The main content file
 */
?>

	<?php
		/**
		 * This block of code gets the About page URL: $about_url, the total number of
		 * authors: $num_authors, and then builds arrays of the byline constructors: $authors and $author_credit.
		 * Currently, these arrays are hard coded to only have 3 authors.
		 */

		$about_url = esc_url( get_permalink( get_page_by_title( 'About' ) ) );
		$num_authors = get_field('num_of_authors');

		$authors = array( get_field('first_user'), get_field('second_user'), get_field('third_user') );
		$author_credit = array( get_field('first_author_credit'), get_field('second_author_credit'), get_field('third_author_credit') );

		echo '<div class="bylines">';

		for ($x = 0; $x < $num_authors; $x++) {
			echo '<h4 class="byline">' . $author_credit[$x] . ' <a href="' . $about_url . '#' . $authors[$x]['user_nicename'] . '">' . $authors[$x]['display_name'] . '</a></h4>';
		}

		echo '</div>';
	?>



	<?php the_content(); ?>

	<aside class="social-media"></aside>
