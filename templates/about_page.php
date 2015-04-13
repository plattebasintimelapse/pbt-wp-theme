<?php
/**
 * Template Name: About Page
 * Description: This is the template that displays the about page.
 */

get_header(); ?>

	<div class="container-fluid hero-image">

		<?php the_post_thumbnail(); ?>
		<?php the_title(); ?>

	</div>

	<div class="container">

		<!-- THE STORY PAGE FEED OF POSTS -->
		<?php
			$args = array(
				'role' => 'Administrator',
			);

			$user_query = new WP_User_Query( $args );

			// User Loop
			if ( ! empty( $user_query->results ) ) {
				foreach ( $user_query->results as $user ) {
					echo '<p>' . $user->display_name . '</p>';
				}
			} else {
				echo 'No users found.';
			}
		?>

	</div>



<?php get_footer(); ?>
