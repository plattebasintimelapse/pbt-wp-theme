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

				<div class="col-sm-4" style="background-color: #F4F4F4; padding: 10px 20px;">

					<div class="row">
						<div class="col-xs-12">
							<h4>Time:</h4>
							<p><?php the_field('time_to_complete'); ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<h4>Grade Level:</h4>
							<p><?php the_field('grade_level'); ?></p>
						</div>
					</div>

					<?php if( get_field('downloads') ): ?>
						<div class="row">
							<div class="col-xs-12">
								<h4>Lesson Plan:</h4>
								<p>
									<a href="<?php the_field('downloads'); ?>" download="<?php the_field('download_title'); ?>"><i class="fa fa-file-text-o fa-2x"></i></a>
								</p>
							</div>
						</div>
					<?php endif; ?>

					<div class="row">
						<div class="col-xs-12">
							<h4>Standards:</h4>
							<?php
								$postid = get_the_ID();
								$sep = ', ';
								$standards = '';
								if ( is_object_in_term( $post->ID , 'education_standard' ) ) { //check to see if post has basin category

									$terms = get_the_terms( $post->ID , 'education_standard' );

									foreach ( $terms as $term ) {
										$standards .=  $term->name . $sep;
									}

									echo trim($standards, $sep);
								}
							?>
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

					<div class="row row-some-padding-top">
						<div class="col-xs-12">
							<!-- <h4>Lesson:</h4> -->
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
										<p>
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
			</div>

		<?php endwhile; ?>

	</article>

<?php get_footer('minimal'); ?>