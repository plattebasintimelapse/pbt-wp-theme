<?php
/**
 * The template for displaying a single post.
 */

get_header();

	while ( have_posts() ) : the_post();

		$post_thumbnail_id = get_post_thumbnail_id();
		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

		<section class="featured hero-image hero-image-behind" style="background-image: url(<?php echo $post_thumbnail_url ?>); background-position: <?php the_field( 'horizontal_weight' ) ?> <?php the_field( 'vertical_weight' )  ?>;">
			<div class="container-fluid">

				<h2 class="post-title"><?php the_title(); ?></h2>

				<?php if( get_field( 'featured_image_caption' ) ): ?>
					<h6 class="hero-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
				<?php endif; ?>

			</div>
		</section>

		<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content'); ?> role="main">

			<div class="container">

				<?php get_template_part( 'partials/content', get_post_format() ); ?>

			</div>

			<div class="container">

				<?php if ( comments_open() && !is_preview() ) : // Check if comments are allowed per post ?>
				
					<div class="row row-padding">
						<button class="btn btn-primary btn-ghost btn-sm btn-block btn-sm-max-width toggle-plus-minus" type="button" data-toggle="collapse" href="#comments-<?php the_ID(); ?>" aria-expanded="false" aria-controls="comments-<?php the_ID(); ?>"><h6><i class="fa fa-plus"></i> Comments</h6></button>
					</div>

				<?php endif; ?>

				<div class="post-meta-bylines font-size-small">
					<?php pbt_secondary_bylines(); ?>
				</div>

				<div class="post-meta font-size-small">
					<?php
						if ( pbt_has_categories($post) ) :
							echo '<i class="fa fa-tag"></i>';
							pbt_the_badged_categories($post);
						endif;
						echo '<span class="post-date font-size-small pull-right"><em>Posted on ' . get_the_date( 'F j, Y' ) . '</em></span>';
					?>
				</div>

				<div class="row row-padding">
					<?php edit_post_link('Edit This Post', '<button class="btn btn-primary btn-ghost btn-sm btn-block btn-sm-max-width" type="button"><h6>', '</h6></button>'); ?>
				</div>

				<?php if ( comments_open() && !is_preview() ) : // Check if comments are allowed per post ?>
					
					<div class="collapse" id="comments-<?php the_ID(); ?>">
						<div class="row row-padding">
							<div class="col-xs-12">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>

				<?php endif; ?>
			</div>

		</article>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>