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

		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
		<div class="container-fluid">

			<h2 class="post-title"><?php echo $curauth->display_name; ?></h2>

			<?php if( get_field( 'featured_image_caption' ) ): ?>
				<h6 class="hero-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
			<?php endif; ?>

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
				'posts_per_page' 	=> 10,
				'paged' 			=> $paged,
			);

			$the_query = new WP_Query( $author_query_args );
			if ( $the_query->have_posts() ) :
				echo '<h3 class="text-center">' . $curauth->first_name . "'s Work</h3>";
				while ( $the_query->have_posts() ) :
					$the_query->the_post();

					$authors = []; // An array for all authors associated with this post

					array_push($authors, get_the_author_meta('display_name'), get_field('second_user')['display_name'], get_field('third_user')['display_name'], get_field('fourth_user')['display_name']);

					if( in_array($curauth->display_name, $authors ) ) { // Check to see if curauth, the author template currently being viewed, is in the array of post authors ?>

						<div class="row row-some-padding">
							<div class="col-md-6">
								<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
							</div>
							<div class="col-md-6">
								<div class="excerpt">
									<?php the_excerpt(); ?>
									<a class="btn btn-primary btn-sm btn-block btn-max-width" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
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













