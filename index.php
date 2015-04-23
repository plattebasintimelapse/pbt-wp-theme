<?php
/**
 * The main template file.
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

				<img src="<?php header_image(); ?>" alt="" />

				<h1 class="post-title"><?php the_title(); ?></h1>
			</div> <!-- .container-fluid -->
		</section> <!-- .featured -->


		<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">
			<div class="container">

				<?php the_content(); ?>
			</div>
		</article><!-- #post-## -->

	<?php endwhile; ?>

<?php get_footer(); ?>