<?php
/**
 * The template partial used to display the post link thumbnail.
 * This partial is used to show a link to the post. It is used for both
 * the story posts and the blog post content type.
 * It is used on the home page, story page, blog post page, and category pages.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-6'); ?>>

	<div class="story-thumbnail">
		<?php the_post_thumbnail( 'pbt-post-thumbnail' ); ?>

		<div class="story-info-box">
			<?php if ( get_post_type() === 'blog_post' ) { ?>
				<h5 class="blog-post-author">By <?php the_author_meta('display_name') ?></h5>
			<?php } else { ?>
				<h5 class="post-category"><?php the_category( ' | ' ) ?></h5>
			<?php } ?>
			<h3 class="post-title"><?php the_title(); ?></h3>
			<a class="btn btn-default read-more-btn" role="button" href="<?php the_permalink() ?>"><h6>Read More</h6></a>
		</div>
	</div>

</div><!-- #post-## -->