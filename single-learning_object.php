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

								<div class="col-sm-6 col-md-12">
									<h4>Time:</h4>
									<p><?php the_field('time_to_complete'); ?></p>
								</div>

								<div class="col-sm-6 col-md-12">
									<h4>Grade Level:</h4>
									<p><?php the_field('grade_level'); ?></p>
								</div>

								<?php if( get_field('materials') ): ?>
									<div class="col-sm-6 col-md-12">
										<h4>Materials:</h4>
										<p><?php the_field('materials'); ?></p>
									</div>
								<?php endif; ?>

								<?php if( get_field('key_ideas') ): ?>
									<div class="col-sm-6 col-md-12">
										<h4>Key Ideas:</h4>
										<p><?php the_field('key_ideas'); ?></p>
									</div>
								<?php endif; ?>

								<?php if( get_field('downloads') ): ?>
									<div class="col-sm-6 col-md-12">
										<h4>Lesson Plan:</h4>
										<p class="font-size-ex-small">
											<?php the_field('download_title'); ?>
											<a href="<?php the_field('downloads'); ?>">View</a> / <a href="<?php the_field('downloads'); ?>" download="<?php the_field('download_title'); ?>">Download <i class="fa fa-file-text-o fa-lg"></i></a>
										</p>
									</div>
								<?php endif; ?>

								<?php if( get_field('notes_links') ): ?>
									<div class="col-sm-6 col-md-12">
										<h4>Links:</h4>
										<?php the_field('notes_links'); ?>
									</div>
								<?php endif; ?>

								<?php if( get_field('next_gen_standards') ): ?>
									<div class="col-sm-6 col-md-12">
										<h4>Next Generation Standards:</h4>
										<?php the_field('next_gen_standards'); ?>
									</div>
								<?php endif; ?>

								<?php
									$postid = get_the_ID();
									$sep = ', ';
									$standards = '';

									if ( is_object_in_term( $post->ID , 'education_standard' ) ) { //check to see if post has basin category ?>

										<div class="col-sm-6 col-md-12">
											<h4>Nebraska Standards:</h4>

										<?php $terms = get_the_terms( $post->ID , 'education_standard' );

										foreach ( $terms as $term ) {
											$standards .=  $term->name . $sep;
										}

										echo trim($standards, $sep); ?>

										</div>
									<?php } ?>

								<div class="col-sm-6 col-md-12">
									<h4>Next Gen Standards:</h4>
									<p>A Link Here</p>
								</div>

							<div class="col-xs-12 col-v-some-padding">
								<?php
									$lessons = get_posts(array(
										'post_type' => 'lesson',
										'meta_query' => array(
											array(
												'key' => 'learning_objects_list',
												'value' => '"' . get_the_ID() . '"',
												'compare' => 'LIKE',
											)
										)
									));
									if( $lessons ):
										foreach( $lessons as $lesson ): ?>
											<p class="no-margins text-center font-size-ex-small">
												<a class="link-clor-dark" href="<?php echo get_permalink( $lesson->ID ); ?>">
													<i class="fa fa-arrow-left"></i> Return to <?php echo get_the_title( $lesson->ID ); ?>
												</a>
											</p>
										<?php endforeach;
									endif;
								?>
							</div>
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

<?php get_footer('minimal'); ?>