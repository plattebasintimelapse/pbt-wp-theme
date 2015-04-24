<?php
/**
 * The template for displaying Archive pages.
 */

get_header();

	if ( is_month() || is_year() ) {
		$month = get_query_var('monthnum');
		$year = get_query_var('year');
		$countposts=get_posts("year=$year&monthnum=$month");
	}

?>

<section class="featured hero-image">
	<div class="container-fluid">

		<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

		<h1 class="post-title">
			<?php single_cat_title( '', true );
			if (is_month()){
				echo count($countposts) . ' posts from ' . get_the_date('F') . ' ' . get_the_date('Y');
			}
			if (is_year()){
				echo count($countposts) . ' posts from ' . get_the_time('Y');
			} ?>
		</h1>
	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article class="main category story-feed" role="main">
	<div class="container">

		<h3 class="text-center">
			<?php if ( category_description() ) {
				echo category_description();
			} ?>
		</h3>

		<!-- THE ARCHIVE PAGE FEED OF POSTS -->
		<?php if ( have_posts() ) :

				while ( have_posts() ) : the_post(); ?>

					<div class="row row-some-padding">
						<div class="col-md-6">
							<?php get_template_part( 'partials/searched-post-feed-thumbnail' ); ?>
						</div>
						<div class="col-md-6">
							<div class="excerpt">
								<small class="font-size-small">Posted on: <?php echo get_the_date('F j, Y'); ?></small>
								<?php the_excerpt(); ?>
								<a class="btn btn-primary btn-sm btn-block" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
							</div>
						</div>
					</div>

				<?php endwhile;

			else :

				get_template_part( 'partials/no-results', 'search' );

			endif; ?>

	</div>
</article>


<?php get_footer(); ?>