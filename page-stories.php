<?php
/**
 * The template for the stories page.
 * Description: This is the template that displays all stories curently published.
 * It excludes the post featured on the story page.
 */

get_header(); ?>

		<!-- THE STORY PAGE FEATURED POST -->
		<?php
			$story_page_featured_query_args = array(
				'post_type' => 'post',
				'meta_key'=> 'featured_post_story_page',
				'meta_value' => true,
				'orderby' => 'title',
				'order'   => 'ASC',
				'posts_per_page' => 1,
			);

			$the_query = new WP_Query( $story_page_featured_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

		?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

				<div class="featured-story-info-box">

					<h5>Featured Story</h5>
					<a href="<?php the_permalink() ?>"><h2><?php the_title(); ?></h2></a>
					<?php the_excerpt(); ?>
					<a class="btn btn-default" role="button" href="<?php the_permalink() ?>"><h6>Read More</h6></a>

				</div>
			</div><!-- #post-## -->

		<?php
			endwhile; endif;
			wp_reset_postdata();
		?>

	</div><!-- .container-fluid -->
</section> <!-- .featured -->

<article id="post-<?php the_ID(); ?>" <?php post_class('main story-feed'); ?> role="main">
	<div class="container">

		<!-- THE STORY PAGE FEED OF POSTS -->
		<?php
			$story_page_query_args = array(
				'post_type' => 'post',
				'orderby' => 'title',
				'order'   => 'ASC',
			);

			$the_query = new WP_Query( $story_page_query_args );
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
