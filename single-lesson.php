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
					<div class="col-sm-6">
						<?php the_excerpt(); ?>
					</div>
					<!-- <div class="col-sm-offset-2 col-sm-4 text-right">
						<h4>Learning Objects</h4>
						<a href="#" class="btn btn-default btn-sm">Water</a>
					</div> -->
				</div>
			</div>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<div class="container-fluid" style="background-color: #F4F4F4; padding: 20px; margin-top:-40px;">
				<div class="row">
					<div class="col-xs-2 col-xs-offset-2">
						<h4 class="text-right">Resources:</h4>
					</div>
					<div class="col-xs-1 ">
						<!-- <h5 class="text-center">Lesson Guide</h5> -->
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-text-o fa-3x"></i></a>
						</h6>
					</div>
					<div class="col-xs-1">
						<!-- <h5 class="text-center">Vocabulary</h5> -->
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-text-o fa-3x"></i></a>
						</h6>
					</div>
					<div class="col-xs-1">
						<!-- <a class="btn btn-primary btn-ghost btn-sm btn-block btn-max-width" role="button" href="#"><h6>Nebraska Standards</h6></a> -->
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-o fa-3x"></i></a>
						</h6>
					</div>
					<div class="col-xs-1">
						<!-- <a class="btn btn-primary btn-ghost btn-sm btn-block btn-max-width" role="button" href="#"><h6>Next Gen Standards</h6></a> -->
						<h6 class="text-center">
							<a href="#" download="#"><i class="fa fa-file-pdf-o fa-3x"></i></a>
						</h6>
					</div>
				</div>
			</div>

		<div class="container">

			<?php
				$learning_objects_list = get_field('learning_objects_list');

				if( $learning_objects_list ):
					foreach( $learning_objects_list as $learning_object ):

						$has_lesson = get_field('has_lesson', $learning_object->ID);

						set_query_var( 'lo_id', $learning_object->ID );
						set_query_var( 'has_lesson', $has_lesson );
						get_template_part( 'partials/learning-objects/lo', get_field('learning_object_format', $learning_object->ID) ); ?>

						<?php if( get_field( 'has_lesson', $learning_object->ID ) ) { ?>
							<a class="btn btn-primary btn-ghost btn-sm" role="button" rel="bookmark" title="Permanent Link to <?php echo get_the_title( $learning_object->ID ); ?> " href="<?php echo get_permalink( $learning_object->ID ); ?>"><h6><i class="fa fa-book"></i> Learn More </h6></a>
						<?php } ?>

					<?php endforeach; endif;
						wp_reset_postdata();
					?>

		</div>

	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>