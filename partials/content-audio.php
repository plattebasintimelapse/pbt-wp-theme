<?php
/**
 * The content template for displaying audio posts
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">

		<section class="container">
			<h4>By <?php the_author(); ?></h4>
			<?php the_content(); ?>
		</section>

		<aside class="social-media"></aside>

		<section class="audio-container">
			<h1>Audio Player</h1>
		</section>

	</article>