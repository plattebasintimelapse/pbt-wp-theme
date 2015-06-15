<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php header_image(); ?>)">
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
						<div class="col-md-6 col-v-little-padding">
							<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
						</div>
						<div class="col-md-6 col-v-little-padding">
							<div class="row color-brand-light">
								<div class="col-xs-12">
									<p class="post-date font-size-ex-small"><em>Posted on <?php echo get_the_date( 'F j, Y' ) ?> </em> by <a class="link-color-brand-light" href="<?php echo get_author_posts_url( get_the_author_meta( "ID" ) ) ?>"> <?php echo get_the_author(); ?></a></p>
								</div>
							</div>

							<div class="row font-size-small">
								<div class="col-xs-12"><?php the_excerpt(); ?></div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<a class="btn btn-primary btn-ghost btn-sm btn-block btn-sm-max-width" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
								</div>
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