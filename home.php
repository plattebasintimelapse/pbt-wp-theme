<?php
/**
 * The template for displaying the front page.
 */

get_header(); ?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php header_image(); ?>)">
		<div class="container-fluid">

			<div class="featured-meta-box">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>

			</div>
		</div>
	</section>

	<section class="main" role="main">
		<div class="container">
			<div class="row row-ex-padding">
				<div class="col-xs-12">
					<?php dynamic_sidebar( 'pbt-home-main' ); ?>
				</div>
			</div>
		</div>

		<div class="container-fluid container-fluid-no-padding">
			<!-- <div class="row"> -->
					<?php
						$home_page_featured_query_args = array(
							'post_type' => 'post',
							'orderby' => 'date',
							'meta_key'=> 'featured_post_home_page',
							'meta_value' => true,
							'posts_per_page' => 1,
						);

						$the_query = new WP_Query( $home_page_featured_query_args );
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

					?>

						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12 col-no-padding featured-story'); ?>>

							<div class="post-thumbnail">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

									<div class="post-meta-box">
										<h5 class="post-category font-size-small">

											<?php if ( is_object_in_term( $post->ID , 'basin' ) ) { //check to see if post has basin category

												$terms = get_the_terms( $post->ID , 'basin' );

												foreach ( $terms as $term ) {
													echo '<a href="' . get_term_link( $term ) . '">' . $term->name . '</a> | ';
												}
											}

											the_category( ' | ' ); ?>

										</h5>

										<a href="<?php the_permalink() ?>">
											<h1 class="post-title"><?php the_title(); ?></h1>
										</a>
										<?php the_excerpt(); ?>
									</div>

									<!-- <div class="ribbon-wrapper-featured">
										<div class="ribbon-featured">NEW</div>
									</div>
 -->
								</a>
							</div>

						</div><!-- #post-## -->

					<?php
						endwhile; endif;
						wp_reset_postdata();
					?>
			<!-- </div> -->
		</div>

		<div class="container">
			<div class="row">

				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post(); ?>

							<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
								<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
							</div>

					<?php
					endwhile;
				endif;
				wp_reset_postdata(); ?>
			</div>

		</div>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-offset-4 col-md-4">
					<a href="/stories"><button class="btn btn-primary btn-lg btn-block"><h4>More Stories</h4></button></a>
				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>