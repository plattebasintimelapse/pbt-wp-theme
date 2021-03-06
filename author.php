<?php
/**
 * The template for displaying the author page.
 */

get_header(); ?>

	<?php

		if ( has_post_thumbnail() ) {
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		} else {
			$post_thumbnail_url = get_header_image();
		}
		// Get the current author so we can display their stuff
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
		<div class="container-fluid">

			<h2 class="post-title"><?php echo $curauth->display_name; ?></h2>

		</div>
	</section>

	<section class="main author" role="main">
		<div class="container">

			<div class="row">
				<div class="col-sm-4">
					<div class="circle-cropped">
						<?php
							$userID = $curauth->ID;
							echo get_avatar( $userID, 30 );
						?>
					</div>
				</div>

				<div class="col-sm-8">

					<div class="author-links text-center">

						<?php pbt_author_meta($curauth); ?>

					</div>

					<p><?php echo $curauth->description; ?></p>

				</div>
			</div>

		</div>

		<div class="container container-little-padding-top">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$author_query_args = array(
				'post_type' 		=> array('post', 'blog_post',),
				'orderby' 			=> 'date',
				'order'   			=> 'DESC',
				'posts_per_page' 	=> -1,
				'paged' 			=> $paged,
			);

			$the_query = new WP_Query( $author_query_args );
			if ( $the_query->have_posts() ) :
				echo '<h3 class="text-center">' . $curauth->first_name . "'s Work</h3>";
				while ( $the_query->have_posts() ) :
					$the_query->the_post();

					$authors = []; // An array for all authors associated with this post

					// Since each story may have multipe authors (photography, video by, etc), I have to check for each field to display on the page
					array_push($authors, get_the_author_meta('ID') );
					array_push($authors, get_field('second_user')['ID'] );
					array_push($authors, get_field('third_user')['ID'] );
					array_push($authors, get_field('fourth_user')['ID'] );

					if( in_array($curauth->ID, $authors ) ) { // Check to see if curauth, the author template currently being viewed, is in the array of post authors ?>

						<div class="row row-some-padding">
							<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-v-little-padding'); ?>>
								<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
							</div>

							<div class="col-md-6 col-v-little-padding">
								<div class="row color-brand-light">
									<div class="col-xs-12">
										<p class="post-date font-size-ex-small"><em>Posted on <?php echo get_the_date( 'F j, Y' ) ?> </em></p>
									</div>
								</div>

								<div class="row font-size-small">
									<div class="col-xs-12"><?php the_excerpt(); ?></div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<a class="btn btn-primary btn-ghost btn-sm btn-block btn-sm-max-width" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
									</div>
								</div>
							</div>
						</div>

				<?php }

				endwhile; ?>

			<div class="container">
				<?php if ( function_exists("wp_bs_pagination") ) wp_bs_pagination(); ?>
			</div>

			<?php else :
				echo '<h3 class="text-center">' . $curauth->first_name . " hasn't posted anything yet!</h3>";
				echo '<h2>Try searching for something.</h2>';

				get_search_form( );
			endif; ?>
		</div>
	</section>

<?php get_footer(); ?>













