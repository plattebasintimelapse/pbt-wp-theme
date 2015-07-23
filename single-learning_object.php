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

			<div class="container" style="position: relative;">
				<aside class="col-md-4 col-md-push-8 col-sm-12">

					<div class="info-box aside-info-box affix-top-offset no-affix-sm no-affix-xs" data-spy="affix" data-offset-top="440" data-offset-bottom="20">
						<div class="row">

							<?php if( get_field('time_to_complete') ): ?>
								<div class="col-sm-6 col-md-12">
									<h4>Time:</h4>
									<p><?php the_field('time_to_complete'); ?></p>
								</div>
							<?php endif; ?>

							<?php if( get_field('materials') ): ?>
								<div class="col-sm-6 col-md-12">
									<h4>Materials:</h4>
									<p><?php the_field('materials'); ?></p>
								</div>
							<?php endif; ?>

							<?php if( get_field('grade_level') ): ?>
								<div class="col-sm-6 col-md-12">
									<h4>Grade Level:</h4>
									<p><?php the_field('grade_level'); ?></p>
								</div>
							<?php endif; ?>

							<?php if( get_field('content_area') ): ?>
								<div class="col-sm-6 col-md-12">
									<h4>Content Area:</h4>
									<p><?php the_field('content_area'); ?></p>
								</div>
							<?php endif; ?>

							<?php
								$postid = get_the_ID();
								$sep = ', ';
								$standards = '';
								$state_standards = '';

							if ( is_object_in_term( $post->ID , 'next_gen_standard' ) ) : //check to see if post has basin category ?>

								<div class="col-sm-6 col-md-12">
									<h4>Next Generation Science Standards:</h4>

								<?php $terms = get_the_terms( $post->ID , 'next_gen_standard' );

								foreach ( $terms as $term ) {
									$standards .=  $term->name . $sep;
								}

								echo trim($standards, $sep); ?>

								</div>
							<?php endif;

							if ( is_object_in_term( $post->ID , 'state_standard' ) ) : //check to see if post has basin category ?>

								<div class="col-sm-6 col-md-12">
									<h4>Nebraska State Standards:</h4>

								<?php $terms = get_the_terms( $post->ID , 'state_standard' );

								foreach ( $terms as $term ) {
									$state_standards .=  $term->name . $sep;
								}

								echo trim($state_standards, $sep); ?>

								</div>
							<?php endif; ?>

						</div>
					</div>
				</aside>

				<div class="col-md-8 col-md-pull-4 col-sm-12">

					<h2><?php the_title(); ?></h2>

					<?php if( get_field('learning_outcomes') ): ?>
						<div class="info-box row-some-margin">
							<h4>Learning Outcomes</h4>
							<?php the_field('learning_outcomes'); ?>
						</div>
					<?php endif; ?>
					
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; ?>

	</article>

<?php get_footer(); ?>