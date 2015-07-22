<?php
/**
 * The template for the Education portal page.
 * Description: This is the template that displays all educational stories curently published.
 */

get_header();

	while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-medium" style="background-image: url(<?php echo $post_thumbnail_url ?>)">

		<div class="featured-meta-box">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
		</div>

	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article id="post-<?php the_ID(); ?>" <?php post_class('main education'); ?> role="main">
	<div class="container">

		<!-- THE NOTEBOOK PAGE FEED OF POSTS -->
		<?php
			$i = 1;
			$args = array(
				'post_type' => 'ed_story',
				'orderby' => 'date',
				'order'   => 'DESC',
				'posts_per_page' => -1,
			);

			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 

			$post_id = get_the_id();
			$i++;

			if( $i % 2 == 0 ) { ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('row row-some-padding'); ?>>
					<div class="col-sm-6 hidden-xs">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( );  ?></a>
					</div>
					
					<div class="col-sm-6">
						<h3> 
							<a class="link-color-dark" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h3>
						
						<?php the_excerpt(); ?>
						<a class="btn btn-primary btn-ghost btn-lg btn-block btn-sm-max-width" role="button" href="<?php the_permalink() ?>"><h5>Learn More</h5></a>
					</div>
				</div>

			<?php } else { ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('row row-some-padding'); ?>>
					<div class="col-sm-6 text-right">
						<h3> 
							<a class="link-color-dark" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h3>
						
						<?php the_excerpt(); ?>
						<a class="btn btn-primary btn-ghost btn-lg btn-block btn-sm-max-width" role="button" href="<?php the_permalink() ?>"><h5>Learn More</h5></a>
					</div>

					<div class="col-sm-6 hidden-xs">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( );  ?></a>
					</div>
				</div>

			<?php } ?>

		<?php endwhile; ?>
	</div>

	<?php  endif;
		wp_reset_postdata();
	?>
</article>

<?php endwhile; ?>



<?php get_footer(); ?>
