<?php
/**
 * The template for displaying Search Results pages.
 */

get_header();

	$post_thumbnail_id = get_post_thumbnail_id(1);
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
		<div class="container-fluid">

			<h2 class="post-title">Searching for '<?php the_search_query(); ?>'...</h2>
		</div> <!-- .container-fluid -->
	</section> <!-- .featured -->

<article class="main search-result" role="main">
	<div class="container">

		<?php

			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>

					<div class="row row-some-padding">
						<div class="col-md-6">
							<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
						</div>
						<div class="col-md-6">
							<div class="excerpt">
								<?php the_excerpt(); ?>
								<a class="btn btn-primary btn-sm btn-block btn-max-width" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
							</div>
						</div>
					</div>

				<?php endwhile;

			else :

				get_template_part( 'partials/no-results', 'search' );

			endif;
		?>

	</div>
</article>

<?php get_footer(); ?>