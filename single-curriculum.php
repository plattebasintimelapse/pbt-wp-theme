<?php
/**
 * The template for displaying a curriculum page.
 */

get_header(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">
			<?php the_post_thumbnail( ); ?>

			<div class="container">
				<div class="row underlined underlined-light">
					<div class="col-xs-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="row row-little-padding">
					<div class="col-sm-6">
						<?php the_excerpt(); ?>
					</div>
					<div class="col-sm-offset-2 col-sm-4 text-right">
						<h4>Learning Objects</h4>
						<a href="#" class="btn btn-default btn-sm">Water</a>
					</div>
				</div>
			</div>

		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main">

		<div class="container">

		<?php
			$args = array(
				'post_type' => 'learning_object',
				'post_status' => 'publish',
				'orderby'   => 'menu_order',
              	'order'     => 'ASC',
			);

			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) :
					$the_query->the_post();


			get_template_part( 'partials/learning-objects/lo', get_field('learning_object_format') );

			endwhile; endif;
			wp_reset_postdata();
		?>

		</div>

	</article>

<?php get_footer(); ?>