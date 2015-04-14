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

			<h1>Meet the PBT Team</h1>
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

			<h1>Partners</h1>
			<?php
				$project_credits_query_args = array(
					'post_type' => 'project_credit',
					'support_level' => 'partners',
					'orderby' => 'title',
					'order'   => 'ASC',
				);

				$the_query = new WP_Query( $project_credits_query_args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-6 col-sm-3'); ?>>

				<div class="">
					<a target="_blank" href="<?php the_field( 'credit_url' ) ?>">
						<?php the_post_thumbnail( ); ?>
					</a>
				</div>

			</div><!-- #post-## -->

			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div>
	</section>

<?php get_footer(); ?>
