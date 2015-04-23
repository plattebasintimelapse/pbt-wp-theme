<?php
/**
 * Template Name: About Page
 * Description: This is the template that displays the about page.
 */

get_header();

	$user_per_row = 4; ?>

			<?php while ( have_posts() ) : the_post(); ?>


			<?php the_post_thumbnail( 'pbt-pano-header' ); ?>
			<h2 class="post-title"><?php the_title(); ?></h2>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main about'); ?> role="main">
		<div class="container">
			<div class="col-xs-12">
				<?php the_content(); ?>
			</div>
		</div>

		<div class="container container-padding-top">
			<a name="platte"></a>
			<div class="feed-team">

				<div class="row">
					<?php
						$author_args = array(
							// 'role' => 'Administrator',
							'exclude' => array( 1, 14 ), // Exclude Platte Admin and full-team user
							'orderby' => 'display_name',
						);

						$user_query = new WP_User_Query( $author_args );
						$i = 2;
						$column_width = 12 / $user_per_row;

						echo '<div class="col-md-' . $column_width * 2 . '"><div class="col-md-lead-in">';
							the_field('about_the_team');
						echo '</div></div>';

						foreach ( $user_query->results as $user ) { ?>

							<?php if( ( $i % $user_per_row ) == 0) { echo '<div class="row">'; } $i++; ?>

							<a name="<?php echo $user->user_nicename; ?>"></a>
							<div class="col-sm-6 col-extra-padding col-md-<?php echo $column_width; ?> user user-<?php echo $user->ID; ?>">

								<h4><?php echo $user->display_name ?></h4>
								<h6> <?php echo $user->user_pbt_role ?> <i class="btn fa fa-plus-circle" data-toggle="collapse" data-target="#userCollapse<?php echo $user->ID ?>" aria-expanded="false" aria-controls="collapseExample"></i></h6>

									<?php
										$userID = $user->ID;
										echo get_avatar( $userID, 30 );
									?>

								<div class="collapse" id="userCollapse<?php echo $user->ID ?>">
								  	<div class="well">
								  		<div class="author-links">

											<?php if( $user->instagram !== '' ) { ?>
												<div class="author-link"><a target="_blank" href="http://www.instagram.com/<?php echo $user->instagram ?>"><i class="fa fa-instagram"></i></a></div>
											<?php }

											if( $user->twitter !== '' ) { ?>
												<div class="author-link"><a target="_blank" href="http://www.twitter.com/<?php echo $user->twitter ?>"><i class="fa fa-twitter"></i></a></div>
											<?php }

											if( $user->github !== '' ) { ?>
												<div class="author-link"><a target="_blank" href="http://www.github.com/<?php echo $user->github ?>"><i class="fa fa-github"></i></a></div>
											<?php }

											if( $user->flickr !== '' ) { ?>
												<div class="author-link"><a target="_blank" href="http://www.flickr.com/<?php echo $user->flickr ?>"><i class="fa fa-flickr"></i></a></div>
											<?php }

											if( $user->user_url !== '' ) { ?>
												<div class="author-link"><a target="_blank" href="<?php echo $user->user_url ?>"><i class="fa fa-laptop"></i></a></div>
											<?php }

											if( $user->user_email !== '' ) { ?>
												<div class="author-link"><a href="mailto:<?php echo $user->user_email ?>"><i class="fa fa-envelope-o"></i> <small><?php echo $user->user_email ?></small></a></div>
											<?php } ?>

										</div>

										<p><?php echo $user->description ?></p>
								  	</div>
								</div>
							</div> <!-- .user -->

							<?php if( ( $i % $user_per_row ) == 0) { echo '</div> <!--.row -->'; }

						} // END FOR EACH LOOP ?>
				</div>
			</div>
		</div>

		<div class="container container-padding-top">

			<?php

				echo '<div class="col-xs-6"><div class="col-sm-lead-in">';
					the_field('project_partners');
				echo '</div></div>';

				$project_credits_query_args = array(
					'post_type' 		=> 'project_credit',
					'meta_key'			=> 'support_level',
					'meta_value' 		=> array( 'partner', 'funder'),
					'posts_per_page'	=> -1,
				    'orderby' 			=> 'title',
					'order'   			=> 'ASC',
				);

				$the_query = new WP_Query( $project_credits_query_args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			?>

			<div class="col-xs-6 col-sm-3">

				<div class="credit-wrapper">
					<a target="_blank" href="<?php the_field( 'credit_url' ) ?>"> <?php the_post_thumbnail( ); ?> </a>
				</div>
			</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="container container-little-padding-top">
			<div class="cooperator-feed">

					<?php

						$project_cooperators_query_args = array(
							'post_type' 		=> 'project_credit',
							'meta_key'			=> 'support_level',
							'meta_value' 		=> 'cooperator',
							'posts_per_page'	=> -1,
						    'orderby' 			=> 'title',
							'order'   			=> 'ASC',
						);

						$the_query = new WP_Query( $project_cooperators_query_args );
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

						if( ( $i % 2 ) === 0) {
							echo '<div class="row"><div class="col-xs-offset-0 col-sm-offset-1 col-xs-6 col-sm-5">';
						} else {
							echo '<div class="col-xs-6 col-sm-5">';
						} $i++;
					?>

						<div class="text-center font-size-small">
							<a class="link-color-dark" target="_blank" href="<?php the_field( 'credit_url' ) ?>">
								<?php the_title(); ?>
							</a>
						</div>
					</div>

				<?php if( ( $i % 2 ) === 0) { echo '</div> <!--.row -->'; }

				endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="container container-padding-top">
			<?php the_field('project_history'); ?>
		</div>
	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>
