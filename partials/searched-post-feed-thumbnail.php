<?php
/**
 * The template partial used to display the post link thumbnail.
 * This partial is used to show a link to the post. It is used for both
 * the story posts and the blog post content type.
 * It is used on the home page, story page, blog post page, and category pages.
 */
?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'pbt-post-thumbnail' ); ?>

		<div class="post-meta-box">

			<?php if ( get_post_type() === 'blog_post' ) { ?>
				<h4 class="blog-post-author"><small>A Notebook entry by</small> <?php the_author_meta('display_name') ?></h4>
			<?php } else if ( get_post_type() === 'post' ) { ?>
				<h4 class="post-category"><small>A Story filed under</small> <?php the_category( ' | ' ) ?></h4>
			<?php } else if ( get_post_type() === 'page' ) { ?>
				<h4 class="post-category"><small>The page</small></h4>
			<?php } ?>

			<h3 class="post-title"><?php the_title(); ?></h3>
			<a class="btn btn-default read-more-btn" role="button" href="<?php the_permalink() ?>"><h6>Read More</h6></a>
			<h5 class="post-meta"><small class="font-size-small">Posted on <?php the_date('F j, Y'); ?> by <?php  the_author(); ?></h5>
		</div>
	</div>
