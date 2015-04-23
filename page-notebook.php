<?php
/**
 * The template for the stories page.
 * Description: This is the template that displays all stories curently published.
 * It excludes the post featured on the story page.
 */

get_header(); ?>

<section class="featured hero-image">
	<div class="container-fluid">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php the_post_thumbnail( 'pbt-pano-header' ); ?>
		<h3 class="post-title"><?php the_content(); ?></h3>
	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article id="post-<?php the_ID(); ?>" <?php post_class('main notebook-feed'); ?> role="main">
	<div class="container">

		<!-- THE NOTEBOOK PAGE FEED OF POSTS -->
		<?php
			$notebook_page_query_args = array(
				'post_type' => 'blog_post',
				'orderby' => 'title',
				'order'   => 'ASC',
			);

			$the_query = new WP_Query( $notebook_page_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
				<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
			</div>

		<?php endwhile; endif;
			wp_reset_postdata();wp_reset_postdata();
		?>

	</div>
</article>

<?php endwhile; ?>



<?php get_footer(); ?>
