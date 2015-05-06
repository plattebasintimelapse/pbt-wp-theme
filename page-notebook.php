<?php
/**
 * The template for the notebook page.
 * Description: This is the template that displays all notebook entries curently published.
 */

get_header();

	while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php echo $post_thumbnail_url ?>)">

		<h4 class="post-title"><?php the_content(); ?></h4>

	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article id="post-<?php the_ID(); ?>" <?php post_class('main notebook-feed'); ?> role="main">
	<div class="container">

		<!-- THE NOTEBOOK PAGE FEED OF POSTS -->
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$notebook_page_query_args = array(
				'post_type' => 'blog_post',
				'orderby' => 'date',
				'order'   => 'DESC',
				'posts_per_page' => 10,
				'paged' => $paged,
			);

			$the_query = new WP_Query( $notebook_page_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
				<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
			</div>

		<?php endwhile; ?>
	</div>

	<div class="container">
		<?php if ( function_exists("wp_bs_pagination") ) wp_bs_pagination($the_query->max_num_pages); ?>
	</div>

	<?php  endif;
		wp_reset_postdata();
	?>
</article>

<?php endwhile; ?>



<?php get_footer(); ?>
