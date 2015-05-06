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

						<?php if( $curauth->instagram !== '' ) { ?>
							<div class="author-link"><a target="_blank" href="http://www.instagram.com/<?php echo $curauth->instagram ?>"><i class="fa fa-instagram"></i></a></div>
						<?php }

						if( $curauth->twitter !== '' ) { ?>
							<div class="author-link"><a target="_blank" href="http://www.twitter.com/<?php echo $curauth->twitter ?>"><i class="fa fa-twitter"></i></a></div>
						<?php }

						if( $curauth->github !== '' ) { ?>
							<div class="author-link"><a target="_blank" href="http://www.github.com/<?php echo $curauth->github ?>"><i class="fa fa-github"></i></a></div>
						<?php }

						if( $curauth->flickr !== '' ) { ?>
							<div class="author-link"><a target="_blank" href="http://www.flickr.com/<?php echo $curauth->flickr ?>"><i class="fa fa-flickr"></i></a></div>
						<?php }

						if( $curauth->user_url !== '' ) { ?>
							<div class="author-link"><a target="_blank" href="<?php echo $curauth->user_url ?>"><i class="fa fa-laptop"></i></a></div>
						<?php }

						if( $curauth->user_email !== '' ) { ?>
							<div class="author-link"><a href="mailto:<?php echo $curauth->user_email ?>"><i class="fa fa-envelope-o"></i> <small><?php echo $curauth->user_email ?></small></a></div>
						<?php } ?>

					</div>

					<p><?php echo $curauth->description; ?></p>

				</div>
			</div>

		</div>

		<div class="container container-little-padding-top">
		<?php
			if ( have_posts() ) :
				echo '<h3 class="text-center">' . $curauth->first_name . "'s Credits</h3>";
				while ( have_posts() ) :
					the_post(); ?>

						<div class="row row-some-padding">
							<div class="col-md-6">
								<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
							</div>
							<div class="col-md-6">
								<div class="excerpt">
									<?php the_excerpt(); ?>
									<a class="btn btn-primary btn-sm btn-block" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
								</div>
							</div>
						</div>

				<?php endwhile; ?>

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













