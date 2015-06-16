<?php
/**
 * The template for displaying a curriculum page.
 */

get_header();

	while ( have_posts() ) : the_post(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">
			<?php the_post_thumbnail( ); ?>

			<div class="container">
				<div class="row underlined underlined-light">
					<div class="col-xs-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="row row-little-padding">
					<div class="col-sm-8">
						<?php the_excerpt(); ?>
					</div>
					<div class="col-sm-offset-2 col-sm-2 text-right">
						<h5>Teacher Guide</h5>
						<p class="font-size-ex-small">
							<a href="#">View</a> / <a href="#" download="#">Download <i class="fa fa-file-text-o fa-lg"></i></a>
						</p>
					</div>
				</div>
			</div>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<div class="container-fluid info-box under-hero-image">
				<div class="row">
					<!-- <div class="col-xs-2 col-xs-offset-2">
						<h4 class="text-right">Resources:</h4>
					</div> -->
					<div class="col-xs-2 col-xs-offset-4">
						<h5 class="text-center">Lesson Plan</h5>
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-text-o fa-3x"></i></a>
						</h6>
						<p class="font-size-ex-small text-center">
							<a href="#">View</a> / <a href="#" download="#">Download</a>
						</p>
					</div>
					<div class="col-xs-2">
						<h5 class="text-center">Vocabulary</h5>
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-text-o fa-3x"></i></a>
						</h6>
						<p class="font-size-ex-small text-center">
							<a href="#">View</a> / <a href="#" download="#">Download</a>
						</p>
					</div>
					<!-- <div class="col-xs-2">
						<a class="btn btn-primary btn-ghost btn-sm btn-block btn-max-width" role="button" href="#"><h6>Nebraska Standards</h6></a>
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-o fa-3x"></i></a>
						</h6>
					</div>
					<div class="col-xs-2">
						<a class="btn btn-primary btn-ghost btn-sm btn-block btn-max-width" role="button" href="#"><h6>Next Gen Standards</h6></a>
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-pdf-o fa-3x"></i></a>
						</h6>
					</div> -->
				</div>
			</div>

		<div class="container">

			<?php
				$learning_objects_list = get_field('learning_objects_list');

				if( $learning_objects_list ):
					foreach( $learning_objects_list as $learning_object ):

						$has_lesson = get_field('has_lesson', $learning_object->ID);
						$has_more = get_field('has_more', $learning_object->ID);

						set_query_var( 'lo_id', $learning_object->ID );
						set_query_var( 'has_lesson', $has_lesson );
						set_query_var( 'has_more', $has_more );
						get_template_part( 'partials/learning-objects/lo', get_field('learning_object_format', $learning_object->ID) ); ?>

					<?php endforeach; endif;
						wp_reset_postdata();
					?>

		</div>

	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>