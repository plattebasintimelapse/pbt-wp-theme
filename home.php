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
				<h4>The Platte River is a major watershed in the heart of the Great Plains. The Platte waters crops and cattle, hosts resident and migrant wildlife, delights fisherman and boaters, fuels power generators and supplies thirsty cities.</h4>
				<h3>These are stories of our most precious resource: water</h3>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<!-- THE STORY PAGE FEED OF POSTS -->
			<?php
				$story_page_query_args = array(
					'post_type' => 'post',
					'orderby' => 'title',
					'order'   => 'ASC',
				);

				$the_query = new WP_Query( $story_page_query_args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-3'); ?>>

					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?><?php the_title(); ?></a>

				</div><!-- #post-## -->

			<?php
				endwhile; endif;
				wp_reset_postdata();
			?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<a href="/stories"><button class="btn btn-default">More Stories</button></a>
			</div>
		</div>
	</div>

<?php get_footer(); ?>