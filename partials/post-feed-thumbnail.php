<?php
/**
 * The template partial used to display the post link thumbnail.
 * This partial is used to show a link to the post. It is used for both
 * the story posts and the blog post content type.
 * It is used on the home page, story page, blog post page, and category pages.
 */

?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'pbt-post-thumbnail' );  ?>

		<div class="post-meta-box post-meta-box-lg">

			<?php if ( get_post_type() === 'blog_post' ) { ?>

				<h5 class="blog-post-author font-size-small">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h5>

			<?php } else if ( get_post_type() === 'post' ) { ?>

				<h5 class="post-category font-size-small">

					<?php pbt_the_categories($post, ' | ' ); ?>

				</h5>

			<?php } else if ( get_post_type() === 'page' ) { ?>

				<h5 class="post-category">page</h5>

			<?php } ?>

			<a href="<?php the_permalink() ?>">
				<h1 class="post-title">
					<?php pbt_short_title(); ?>
				</h1>
			</a>

			<a class="btn btn-default read-more-btn btn-block btn-max-width" role="button" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><h5>Read More</h5></a>
		</div>
	</div>

