<?php
/**
 * The template for displaying a learning object
 */

get_header(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main" >

		<?php while ( have_posts() ) : the_post(); ?>



		<div class="container container-large" style="position: relative;">
			<div class="col-sm-8">
				<?php the_content(); ?>
			</div>
			<div class="col-sm-4">
				<h4>Time:</h4>
				<p>30 minutes</p>
				<h4>Standards:</h4>
				<p>Life Science, Earth Science</p>
				<i class="fa fa-file-text-o fa-3x"></i>
				<i class="fa fa-file-text-o fa-3x"></i>
				<h4>Additional Links:</h4>
				<p>National Audubon Society</p>
			</div>
		</div>

		<?php endwhile; ?>

	</article>

<?php get_footer('minimal'); ?>