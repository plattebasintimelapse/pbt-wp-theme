<?php
/**
 * Template Name: Story Feed
 *
 * This is the template that displays all stories curently published.
 */

get_header(); ?>

<div class="container-fluid">

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

		<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6'); ?>>
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</div><!-- #post-## -->

	<?php
		endwhile; endif;
		wp_reset_postdata();
	?>

</div>

<div class="container">

	<?php
		$story_page_query_args = array(
			'post_type' => 'post',
			'orderby' => 'title',
			'order'   => 'ASC',
		);

		$the_query = new WP_Query( $story_page_query_args );
		if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

		?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6'); ?>>

			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

		</div><!-- #post-## -->

	<?php
		endwhile; endif;
		wp_reset_postdata();
	?>

</div>



<?php get_footer(); ?>
