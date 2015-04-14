<?php
/**
 * Template Name: Full-Width IFrame
 * This template is used to display an external URL, full-width and full-height.
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<iframe height="800px" width="100%" src="<?php the_field('iframe_url'); ?>" frameborder="0"></iframe>

	<?php endwhile; ?>

 <?php /* get_footer();*/ ?>
