<?php
/**
 * The main template file.
 * This file is only used for fallbacks. Home.php is the main page. If that is deleted, this gets used.
 */

get_header(); ?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php header_image(); ?>)">
		<div class="container-fluid">

			<div class="featured-meta-box">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>

			</div>
		</div>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>


		<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">
			<div class="container">

				<?php the_content(); ?>
			</div>
		</article><!-- #post-## -->

	<?php endwhile; ?>

<?php get_footer(); ?>