<?php
/**
 * The template for displaying Archive pages.
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
					<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-7'); ?>>
						<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
					</div>
					<div class="col-md-5">
						<div class="excerpt">
							<?php the_excerpt(); ?>
							<a class="btn btn-primary btn-sm btn-block" role="button" href="<?php the_permalink() ?>"><h6>Read On</h6></a>
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