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
					<div class="row">
						<div class="col-xs-12">
							<h4>Time:</h4>
							<p><?php the_field('time_to_complete'); ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<h4>Downloads:</h4>
							<p>
								<a href="<?php the_field('download'); ?>"><i class="fa fa-file-text-o fa-3x"></i></a>
								<i class="fa fa-file-text-o fa-3x"></i>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<h4>Standards:</h4>
							<p>Life Science, Earth Science</p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<h4>Additional Links:</h4>
							<p><a class="link-color-dark" href="#">National Audubon Society</a></p>
						</div>
					</div>

					<div class="row row-little-padding">
						<div class="col-xs-12">
							<a class="btn btn-primary btn-ghost btn-sm" role="button" href="#"><h6>Nebraska Standards</h6></a>
						</div>
					</div>

					<div class="row row-little-padding">
						<div class="col-xs-12">
							<a class="btn btn-primary btn-ghost btn-sm" role="button" href="#"><h6>Next Gen Standards</h6></a>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</article>

<?php get_footer('minimal'); ?>