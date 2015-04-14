<?php
/**
 * The template for the stories page.
 * Description: This is the template that displays all stories curently published.
 * It excludes the post featured on the story page.
 */

get_header(); ?>

<section class="featured hero-image">
	<div class="container-fluid">
		<h1>Notebook</h1>
	</div>
</section>

<section class="main story-feed" role="main">
	<div class="container">

		<!-- THE STORY PAGE FEED OF POSTS -->
		<?php
			$notebook_page_query_args = array(
				'post_type' => 'blog_post',
				'orderby' => 'title',
				'order'   => 'ASC',
			);

			$the_query = new WP_Query( $notebook_page_query_args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

		?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-6'); ?>>

				<div class="story-thumbnail">
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail( 'thumbnail' ); ?>

						<div class="story-info-box">
							<h5 class="post-category"><?php the_category( ' - ' ) ?></h5>
							<a href="<?php the_permalink() ?>"><h3 class="post-title"><?php the_title(); ?></h3></a>
						</div>

					</a>
				</div>

			</div><!-- #post-## -->

		<?php
			endwhile; endif;
			wp_reset_postdata();
		?>

	</div>
</section>



<?php get_footer(); ?>
