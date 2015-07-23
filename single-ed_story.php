<?php
/**
 * The template for displaying a education story page.
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
				<div class="row row-little-padding hidden-xs">
					<div class="col-sm-10">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<!-- Only show this bar if there is a lesson plan or vocab PDF -->
		<?php if( get_field('lesson_plan_pdf') or get_field('vocabulary_pdf') ): ?>

			<div class="container-fluid info-box under-hero-image color-special">
				<div class="row">
					<?php if( get_field('lesson_plan_pdf') ): ?>
						<div class="col-sm-2 col-sm-offset-4 col-xs-6">
							<h5 class="text-center">Lesson Plans</h5>
							<h6 class="text-center">
								<a href="<?php the_field('lesson_plan_pdf'); ?>" download="<?php the_field('lesson_plan_pdf_title'); ?>"><i class="fa fa-file-text-o fa-2x"></i></a>
							</h6>
							<p class="font-size-ex-small text-center">
								<a href="<?php the_field('lesson_plan_pdf'); ?>">View</a> / <a href="<?php the_field('lesson_plan_pdf'); ?>" download="<?php the_field('lesson_plan_pdf_title'); ?>">Download</a>
							</p>
						</div>
					<?php endif; ?>

					<?php if( get_field('vocabulary_pdf') ): ?>
						<div class="col-sm-2 col-xs-6">
							<h5 class="text-center">Vocabulary</h5>
							<h6 class="text-center">
								<a href="<?php the_field('vocabulary_pdf'); ?>" download="<?php the_field('vocabulary_pdf_title'); ?>"><i class="fa fa-file-text-o fa-2x"></i></a>
							</h6>
							<p class="font-size-ex-small text-center">
								<a href="<?php the_field('vocabulary_pdf'); ?>">View</a> / <a href="<?php the_field('vocabulary_pdf'); ?>" download="<?php the_field('vocabulary_pdf_title'); ?>">Download</a>
							</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

			
				
		<?php 
		// Get all the chapters associated with this education story, then display them.
		$list = get_field('chapter_list');
	
		if( $list ): ?>

			<div id="chapter-view" class="">
				<div class="container">

					<?php 
					$i = 0;
					foreach( $list as $post ):
						setup_postdata($post);
						$i++;
						// Have to send these variables into the loop for display and logic
						set_query_var( 'post_id', $post->ID );
						set_query_var( 'i', $i ); ?>

						<?php 
						get_template_part( 'partials/ed-chapter-excerpt' ); 

					endforeach;?>
		
				</div>
			</div>


		<?php endif;
			wp_reset_postdata();
		?>
	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>