<?php
/**
 * The template for displaying the author page.
 */

get_header(); ?>

	<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>

	<section class="featured hero-image">
		<div class="container-fluid">

			<h1><?php echo $curauth->display_name; ?></h1>

		</div>
	</section>

	<section class="main" role="main">
		<div class="container">

			<h1><?php echo $curauth->user_email; ?></h1>
			<p><?php echo $curauth->description; ?></p>

		</div>
	</section>

<?php get_footer(); ?>