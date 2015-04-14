<?php
/**
 * The main content file
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">

		<section class="container">
			<h5 class="story-byline">By <?php the_author_posts_link(); ?></h5>
			<?php the_content(); ?>
		</section>

		<aside class="social-media"></aside>

	</article>
