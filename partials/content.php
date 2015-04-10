<?php
/**
 * The main content file
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="hero-image container-fluid">
		<?php the_post_thumbnail(); ?>
		<?php the_title(); ?>
	</section>

	<aside class="social-media"></aside>

	<section class="container">
		<?php the_author(); ?>
		<?php the_content(); ?>
	</section>

</article>