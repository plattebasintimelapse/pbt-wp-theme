<?php
/**
 * The template for displaying a learning object
 */

get_header(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content narrow education'); ?> role="main" >

		<?php while ( have_posts() ) : the_post(); ?>



		<div class="container" style="position: relative;">
			<div class="col-sm-12">
				<?php the_content(); ?>
			</div>
			<aside style="position: absolute; top: 100px; left: 100%; background-color: gray; width: 200px; padding: 15px; ">
				<p>Some stuff about this learning object</p>
			</aside>
		</div>

		<?php endwhile; ?>

	</article>

<?php get_footer('minimal'); ?>