<?php
/**
 * The template part for displaying a message that posts cannot be found.
 */
?>

<h3 class="text-center">Sorry! There are no results from '<?php the_search_query(); ?>'</h2>
<h2>Try searching again.</h2>

<?php get_search_form( ); ?>

<h3 class="text-center">Or you can check out some of our most recent posts!</h3>

	<?php
		$story_page_query_args = array(
			'post_type' 		=> array('post', 'blog_post'),
			'orderby' 			=> 'date',
			'order'   			=> 'DESC',
			'posts_per_page' 	=> 2,
		);

		$the_query = new WP_Query( $story_page_query_args );
		if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
			<?php get_template_part( 'partials/searched-post-feed-thumbnail' ); ?>
		</div>

	<?php endwhile; endif;
		wp_reset_postdata();
	?>
