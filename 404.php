<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php header_image(); ?>)">
		<div class="container-fluid">
			<h1 class="post-title">Oh no!</h1>
		</div>
	</section>

	<article class="main" role="main">
		<div class="container">
			<h3 class="text-center">That's not here. How embarrassing...</h2>
				
			<h2>Try searching for something.</h2>
			<?php get_search_form( ); ?>


			<h2>Or browsing our archives.</h2>

			<div class="row">
				<div class="col-sm-6">
					<h3>Archives by Month:</h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div>
				<div class="col-sm-6">
					<h3>Archives by Category:</h3>
					<ul>
						<?php wp_list_categories(); ?>
					</ul>
				</div>
			</div>

		</div>
	</article>

<?php get_footer(); ?>