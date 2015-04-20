<?php
/**
 * The main content file
 */
?>

<?php 	$about_url = esc_url( get_permalink( get_page_by_title( 'About' ) ) );
		$user_nicename = get_the_author_meta( 'user_nicename' ); ?>

	<h5 class="story-byline">By <a href="<?php echo $about_url . '#' . $user_nicename ?>"><?php the_author(); ?></a></h5>


	<?php the_content(); ?>


	<aside class="social-media"></aside>
