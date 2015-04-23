<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

				<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>
			</div> <!-- .container-fluid -->
		</section> <!-- .featured -->


		<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">
			<div class="container">
				<?php the_title(); ?>

				<?php the_content(); ?>
			</div>
		</article><!-- #post-## -->

	<?php endwhile; ?>

<?php get_footer(); ?>
