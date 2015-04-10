<?php
/**
 * The template for displaying a single story.
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>