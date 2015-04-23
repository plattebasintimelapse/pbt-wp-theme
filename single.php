<?php
/**
 * The template for displaying a single story.
 */

get_header(); ?>

	<section class="featured hero-image" style="background-image: url(<?php echo wp_get_attachment_url( 12 ); ?>)">
		<div class="container-fluid">

	<?php while ( have_posts() ) : the_post(); ?>

			

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