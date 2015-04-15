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

			<div class="feed-team"><h1>Meet the PBT Team</h1>
				<?php
					$author_args = array(
						// 'role' => 'Administrator',
						'exclude' => array( 1 )
					);

					$user_query = new WP_User_Query( $author_args );
					$i = true;

					// User Loop
					// if ( ! empty( $user_query->results ) ) {

						foreach ( $user_query->results as $user ) { ?>

							<?php if($i) { ?> <div class="row"> <!--.row --> <?php }
							$i = !$i; ?>

							<div class="col-sm-6 user user-<?php echo $user->ID ?>">
								<h4><?php echo $user->display_name ?><small> <?php echo $user->user_pbt_role ?></small></h4>

								<?php
									$userID = $user->ID;
									echo get_avatar( $userID );
								?>

								<div class="author-links">

									<?php if( $user->instagram !== '' ) { ?>
										<div class="author-link"><a target="_blank" href="http://www.instagram.com/<?php echo $user->instagram ?>"><i class="fa fa-instagram"></i></a></div>
									<?php } ?>

									<?php if( $user->twitter !== '' ) { ?>
										<div class="author-link"><a target="_blank" href="http://www.twitter.com/<?php echo $user->twitter ?>"><i class="fa fa-twitter"></i></a></div>
									<?php } ?>

									<?php if( $user->github !== '' ) { ?>
										<div class="author-link"><a target="_blank" href="http://www.github.com/<?php echo $user->github ?>"><i class="fa fa-github"></i></a></div>
									<?php } ?>

									<?php if( $user->flickr !== '' ) { ?>
										<div class="author-link"><a target="_blank" href="http://www.flickr.com/<?php echo $user->flickr ?>"><i class="fa fa-flickr"></i></a></div>
									<?php } ?>

									<?php if( $user->user_url !== '' ) { ?>
										<div class="author-link"><a target="_blank" href="<?php echo $user->user_url ?>"><i class="fa fa-laptop"></i></a></div>
									<?php } ?>

									<?php if( $user->user_email !== '' ) { ?>
										<div class="author-link"><a href="mailto:<?php echo $user->user_email ?>"><i class="fa fa-envelope-o"></i> <span><?php echo $user->user_email ?></span></a></div>
									<?php } ?>

								</div>

								<button class="btn btn-primary btn-xs" type="button" data-toggle="collapse" data-target="#userCollapse<?php echo $user->ID ?>" aria-expanded="false" aria-controls="collapseExample">
								  Read More
								</button>

								<div class="collapse" id="userCollapse<?php echo $user->ID ?>">
								  	<div class="well">
								    	<p><?php echo $user->description ?></p>
								  	</div>
								</div>

								<?php if($i) { ?> </div> <!--.row --> <?php } ?>

							</div>

				<?php
					} // END FOR EACH LOOP
				?>
			</div>

			<h1>Partners</h1>
			<?php
				$project_credits_query_args = array(
					'post_type' 	=> 'project_credit',
					'meta_key'		=> 'support_level',
					'meta_value'	=> 'partner',
					'orderby' 		=> 'title',
					'order'   		=> 'ASC',
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
