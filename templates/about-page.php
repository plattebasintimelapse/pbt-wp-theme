<?php
/**
 * Template Name: About Page
 * Description: This is the template that displays the about page.
 */

get_header();

$user_per_row = 4;

while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
		<div class="container-fluid">

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

					$admins = get_users( array( 'role' => 'administrator' ) );
					$authors = get_users( array( 'role' => 'author' ) );
					$editors = get_users( array( 'role' => 'editor' ) );
					$contributors = get_users( array( 'role' => 'contributor' ) );

					$pbters = array_merge($admins, $authors, $editors, $contributors);

					$pbters_IDs = array();

					foreach( $pbters as $person ) {
					    $pbters_IDs[] = $person->ID;
					}

					$author_args = array(
						'exclude' 	=> array( 1, 14 ), // Exclude Platte Admin and full-team user
						'include'	=> $pbters_IDs,
						'meta_key'	=> 'user_pbt_display_order',
						'orderby' 	=> 'meta_value_num',
					);

					$user_query = new WP_User_Query( $author_args );
					$i = 2; //offset columns for the intro text
					$column_width = 12 / $user_per_row;

					echo '<div class="col-md-' . $column_width * 2 . '"><div class="col-md-lead-in">';
						the_field('about_the_team');
					echo '</div></div>';

					foreach ( $user_query->results as $user ) {

						if( ( $i % $user_per_row ) == 0) { echo '<div class="row">'; }
						$i++;
						$userID = $user->ID; ?>

						<a name="<?php echo $user->user_nicename; ?>"></a>
						<div class="col-sm-6 col-md-<?php echo $column_width; ?> user user-<?php echo $userID; ?>">

							<h4><a class="link-color-dark" href="<?php echo get_author_posts_url( $userID ); ?>"><?php echo $user->display_name ?></a></h4>

							<h6> <?php echo $user->user_pbt_role ?> <i class="toggle-info btn fa fa-lg fa-plus-circle" data-toggle="collapse" data-target="#userCollapse<?php echo $user->ID ?>" data-target="#userImgCollapse<?php echo $user->ID ?>" aria-expanded="false" aria-controls="collapseExample"></i></h6>

							<div class="collapse in" id="userImgCollapse">
								<div class="circle-cropped">
									<a href="<?php echo get_author_posts_url( $userID ); ?>">
										<?php
											echo get_avatar( $userID, 30 );
										?>
									</a>
								</div>
							</div>

							<div class="collapse" id="userCollapse<?php echo $user->ID ?>">
							  	<div class="well">
							  		<div class="author-links text-center">

										<?php pbt_author_meta($user); ?>

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

	<div class="container">
		<div class="feed-team">
			<div class="row">
				<?php

					$author_args = array(
						'role'	=> 'guest',
					);

					$user_query = new WP_User_Query( $author_args );

					foreach ( $user_query->results as $user ) {

						$userID = $user->ID; ?>

						<a name="<?php echo $user->user_nicename; ?>"></a>
						<div class="col-xs-6 col-sm-4 col-md-2 user user-<?php echo $userID; ?>">

							<h4><a class="link-color-dark" href="<?php echo get_author_posts_url( $userID ); ?>"><?php echo $user->display_name ?></a></h4>

							<h6 class="text-center"> <?php echo $user->user_pbt_role; ?></h6>

							<div class="collapse in" id="userImgCollapse">
								<div class="circle-cropped">
									<a href="<?php echo get_author_posts_url( $userID ); ?>">
										<?php
											echo get_avatar( $userID, 30 );
										?>
									</a>
								</div>
							</div>
						</div> <!-- .user -->

					<?php } // END FOR EACH LOOP ?>
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

			$extraCredits = '';

			$the_query = new WP_Query( $project_credits_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

				if ( has_post_thumbnail() ) { ?>

					<div class="col-xs-6 col-sm-3">
						<div class="credit-wrapper">
							<a target="_blank" href="<?php the_field( 'credit_url' ) ?>"> <?php the_post_thumbnail( ); ?> </a>
						</div>
					</div>

				<?php } else {
					$extraCredits = get_the_title();
				}
			endwhile; endif; wp_reset_postdata(); ?>

		<div class="col-xs-12">
			<p class="text-center font-size-small">with additional funding by:</p>
			<p class="text-center"><?php echo $extraCredits; ?>
			</p>
		</div>
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

					$i = 0;

					$the_query = new WP_Query( $project_cooperators_query_args );
					if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

					if( ( $i % 2 ) === 0) {
						echo '<div class="row"><div class="col-xs-offset-2 col-xs-8 col-sm-offset-1 col-sm-5">';
					} else {
						echo '<div class="col-xs-offset-2 col-xs-8 col-sm-offset-1 col-sm-5">';
					}
					$i++;
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

	<div class="container">
		<?php the_field('project_history'); ?>
	</div>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>
