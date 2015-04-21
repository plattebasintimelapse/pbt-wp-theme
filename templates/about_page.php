<?php
/**
 * Template Name: About Page
 * Description: This is the template that displays the about page.
 */

get_header();

	$user_per_row = 4; ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">

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

						echo '<div class="col-md-' . $column_width * 2 . '">';
							the_field('about_the_team');
						echo '</div>';

						// User Loop
						// if ( ! empty( $user_query->results ) ) {

							foreach ( $user_query->results as $user ) { ?>

								<?php if( ( $i % $user_per_row ) == 0) { echo '<div class="row"> <!--.row -->'; } $i++; ?>

								<a name="<?php echo $user->user_nicename; ?>"></a>
								<div class="col-little-padding col-sm-6 col-md-<?php echo $column_width; ?> user user-<?php echo $user->ID; ?>">

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
				$project_credits_query_args = array(
					'post_type' 	=> 'project_credit',
				    'orderby' => 'rand',
				);

				$the_query = new WP_Query( $project_credits_query_args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
			?>

			<div class="col-little-padding col-sm-2 credit">

				<!-- <div class="panel"> -->
					<a target="_blank" href="<?php the_field( 'credit_url' ) ?>">
						<?php the_post_thumbnail( ); ?>
					</a>
				<!-- </div> -->
			</div>

			<?php endwhile; endif; wp_reset_postdata(); ?>
		</div>

		<div class="container">
			<?php the_field('project_history'); ?>
		</div>
	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>
