<?php
/**
 * The template for displaying a learning object
 */

get_header(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="container">
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>

		</div>

		<?php endwhile; ?>

	</article>

<?php get_footer('minimal'); ?>