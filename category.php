<?php
/**
 * The template for displaying story category pages.
 */

get_header(); ?>

<section class="featured hero-image">
	<div class="container-fluid">

		<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

		<h1 class="post-title"><?php single_cat_title( '', true ); ?></h1>
	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article class="main category story-feed" role="main">
	<div class="container">

		<?php if ( category_description() ) {
			echo category_description();
		} ?>

		<!-- THE CATEGORY PAGE FEED OF POSTS -->
		<?php
			$archive_page_query_args = array(
				'post_type' => 'post',
				'cat' => 5,
				'orderby' => 'title',
				'order'   => 'ASC',
			);

			$the_query = new WP_Query( $archive_page_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
				<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
			</div>

		<?php endwhile; endif;
			wp_reset_postdata();
		?>

	</div>
</article>


<?php get_footer(); ?>