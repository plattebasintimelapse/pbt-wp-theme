<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">
			<img src="<?php header_image(); ?>" alt="" />

			<div class="featured-story-info-box">
				<h1>Oh no!</h1>
				<h2>That's not here. How embarrassing...</h2>
				<?php get_search_form( ); ?>

			</div>
		</div>
	</section>

<?php get_footer(); ?>