<?php
/**
 * The template for the about page.
 * Description: This is the template that displays the about page.
 */

get_header(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">

			<?php the_post_thumbnail( 'pano-header' ); ?>
			<h2 class="post-title"><?php the_title(); ?></h2>

		</div>
	</section>

	<section class="main" role="main">
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
	</section>

<?php get_footer(); ?>
