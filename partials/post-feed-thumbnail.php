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

		<div class="post-meta-box">

			<?php if ( get_post_type() === 'blog_post' ) { ?>

				<h5 class="blog-post-author">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h5>

			<?php } else if ( get_post_type() === 'post' ) { ?>
				<h5 class="post-category">

					<?php if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

						$terms = get_the_terms( $post->ID , 'basin' );

						foreach ( $terms as $term ) {
							echo '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a> | ';
						}
					}

					the_category( ' | ' ); ?>

				</h5>

			<?php } else if ( get_post_type() === 'page' ) { ?>

				<h5 class="post-category">page</h5>

			<?php } ?>

			<h3 class="post-title"><?php the_title(); ?></h3>
			<a class="btn btn-default read-more-btn" role="button" href="<?php the_permalink() ?>"><h6>Read More</h6></a>
		</div>
	</div>

