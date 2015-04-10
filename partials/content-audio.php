<?php
/**
 * The content template for displaying audio posts
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

	<section class="audio-container">
		<h1>Audio Player</h1>
	</section>

</article>