<?php
/**
 * The template for displaying a learning object
 */

get_header();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>); background-position: <?php the_field( 'horizontal_weight' ) ?> <?php the_field( 'vertical_weight' )  ?>;">
	</section> <!-- .featured -->

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

					<?php if( get_field('downloads') ): ?>
						<div class="row">
							<div class="col-xs-12">
								<h4>Downloads:</h4>
								<p>
									<a href="<?php the_field('downloads'); ?>" download="<?php the_title(); ?> - Worksheet"><i class="fa fa-file-text-o fa-3x"></i></a>
								</p>
							</div>
						</div>
					<?php endif; ?>

					<div class="row">
						<div class="col-xs-12">
							<h4>Standards:</h4>
							<p>Life Science, Earth Science</p>
						</div>
					</div>

					<?php if( get_field('notes_links') ): ?>
						<div class="row">
							<div class="col-xs-12">
								<h4>Additional Notes & Links:</h4>
								<?php the_field('notes_links'); ?>
							</div>
						</div>
					<?php endif; ?>

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