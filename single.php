<?php
/**
 * The template for displaying a single story.
 */

get_header(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">

			<?php get_template_part( 'templates/top_nav_bar' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

				<?php the_post_thumbnail( 'pano-header' ); ?>

				<h2 class="post-title"><?php the_title(); ?></h2>

				<?php if( get_field( 'featured_image_caption' ) ): ?>
    				<h6 class="featured-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
				<?php endif; ?>

			</div>
		</section>

		<?php get_template_part( 'partials/content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>