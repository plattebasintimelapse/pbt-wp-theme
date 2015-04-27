<?php
/**
 * The template for displaying a single story.
 */

get_header();

	while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
		<div class="container-fluid">

				<h2 class="post-title"><?php the_title(); ?></h2>

				<?php if( get_field( 'featured_image_caption' ) ): ?>
    				<h6 class="hero-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
				<?php endif; ?>

			</div>
		</section>

		<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content'); ?> role="main">

			<div class="container">

				<?php

					get_template_part( 'partials/content', get_post_format() );

					edit_post_link('edit', '<p class="edit-post-link">', '</p>'); ?>

			</div>

			<?php if ( comments_open() && !is_preview() ) { // Check if comments are allowed per post ?>
				<div class="container container-little-padding-top">
					<?php comments_template(); ?>
				</div>
			<?php } ?>

		</article>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>