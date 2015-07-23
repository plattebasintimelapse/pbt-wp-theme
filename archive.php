<?php
/**
 * The template for displaying Archive pages.
 * Used for cateogry pages, tags pages, date pages, etc.
 */

get_header();

	if ( has_post_thumbnail() ) {
		$post_thumbnail_id = get_post_thumbnail_id($post->ID);
		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	} else {
		$post_thumbnail_url = get_header_image();
	}
	$countPosts = $wp_the_query->post_count;
	?>

<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>)">
	<div class="container-fluid">


		<div class="featured-meta-box">
			<h2><?php single_cat_title( '', true ); ?> <small class="font-size-small"><?php echo $countPosts; if ($countPosts == 1) { echo ' result'; } else { echo ' results'; }?></small></h2>

			<?php if ( is_year() ) {
				echo '<p>In the year ' . get_the_date('Y') . ', we published these stories and blog posts.';

			} else if ( is_month() ) {
				echo '<p>In ' . get_the_date('F') . ' of ' . get_the_date('Y') . ', we published these stories and blog posts.';

			} else {
				the_archive_description();

			} ?>
		</div>

		<?php if( get_field( 'featured_image_caption' ) ): ?>
			<h6 class="hero-image-caption"><?php the_field( 'featured_image_caption' ); ?></h6>
		<?php endif; ?>
	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article class="main category story-feed" role="main">
	<div class="container">

		<!-- THE ARCHIVE PAGE FEED OF POSTS -->
		<?php if ( have_posts() ) { ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="row row-some-padding">

					<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-v-little-padding'); ?>>
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

			<?php endwhile; ?>

			<div class="container">
				<?php if ( function_exists("wp_bs_pagination") ) wp_bs_pagination(); ?>
			</div>

		<?php } else {

			get_template_part( 'partials/no-results', 'search' );

		} ?>

	</div>
</article>


<?php get_footer(); ?>