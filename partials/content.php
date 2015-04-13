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
		<h4>By <?php the_author(); ?></h4>		
		<?php the_content(); ?>
	</section>

</article>