<?php
/**
 * The template for displaying a single story.
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="featured hero-image">
			<div class="container-fluid">
				<?php the_post_thumbnail( ); ?>
				<h2 class="post-title"><?php the_title(); ?></h2>

				<?php if( get_field( 'featured_image_caption' ) ): ?>
    				<h6 class="hero-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
				<?php endif; ?>

			</div>
		</section>

		<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">

			<div class="container">

				<?php get_template_part( 'partials/content', get_post_format() ); ?>

				<?php edit_post_link('edit', '<p class="edit-post-link">', '</p>'); ?>

			</div>

		</article>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>