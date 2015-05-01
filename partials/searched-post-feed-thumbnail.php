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

				<h4 class="blog-post-author font-size-small"><small>A Notebook entry by</small> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h4>

			<?php } else if ( get_post_type() === 'post' ) { ?>

				<h4 class="post-category font-size-small"><small>A Story filed under</small> <?php pbt_the_categories( $post,  ' | ' ) ?></h4>

			<?php } else if ( get_post_type() === 'page' ) { ?>

				<h4 class="post-category"><small>The page</small></h4>

			<?php } ?>

			<?php
				$title = get_the_title();
				$short_title = substr($title,0,50);
			?>

			<a href="<?php the_permalink() ?>">
				<h1 class="post-title">
					<?php echo $short_title;
						if( $short_title != $title) { echo "..."; } ?>
				</h1>
			</a>

			<h5 class="post-meta">
				<small class="font-size-extra-small">Posted on <?php the_date('F j Y');
					if ( get_post_type() !== 'blog_post' ) { ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a><?php } ?>
				</small>
			</h5>
		</div>
	</div>

