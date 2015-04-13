<?php
/**
 * The template for displaying the front page.
 */

get_header(); ?>

	<div class="container-fluid hero-image">
		<img src="<?php header_image(); ?>" alt="" />
		<h1 style="position: absolute; right: 50px; top: 20%;"><?php bloginfo( 'name' ); ?></h1>
		<h2 style="position: absolute; right: 50px; top: 30%;"><?php bloginfo( 'description' ); ?></h2>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p>The Platte River is a major watershed in the heart of the Great Plains. The Platte waters crops and cattle, hosts resident and migrant wildlife, delights fisherman and boaters, fuels power generators and supplies thirsty cities.</p>
				<p>These are stories of our most precious resource: water</p>
			</div>
		</div>
	</div>

<?php get_footer(); ?>