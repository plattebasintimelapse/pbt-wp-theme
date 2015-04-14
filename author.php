<?php
/**
 * The template for displaying the author page.
 */

get_header(); ?>

	<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>


		<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">

			<h1><?php echo $curauth->display_name; ?></h1>

		</article><!-- #post-## -->

<?php get_footer(); ?>