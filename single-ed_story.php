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
					<!-- <div class="col-sm-offset-2 col-sm-2 text-right">
						<h5>Teacher Guide</h5>
						<p class="font-size-ex-small">
							<a href="#">View</a> / <a href="#" download="#">Download <i class="fa fa-file-text-o fa-lg"></i></a>
						</p>
					</div> -->
				</div>
			</div>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<div class="container-fluid info-box under-hero-image color-special">
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
<!-- 
				<div class="col-xs-2 col-xs-offset-4">
					<a class="btn btn-primary btn-ghost active" id="chapter-view-btn">
						<h5 class="text-center">View Chapters <i class="fa fa-book"></i></h5>
					</a>
				</div>
				<div class="col-xs-2">
					<a class="btn btn-primary btn-ghost" id="learning-object-view-btn">
						<h5 class="text-center">View Learning Objects <i class="fa fa-gear"></i></h5>
					</a>
				</div> -->
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

			
				
		<?php 
		$list = get_field('chapter_list');
	
		if( $list ): ?>

			<div id="chapter-view" class="">
				<div class="container">

					<?php 
					$i = 0;
					foreach( $list as $post ):
						setup_postdata($post);
						$i++;		
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