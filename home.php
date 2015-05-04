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
		<div class="container container-padding">
			<div class="row">
				<div class="col-xs-12">
					<?php dynamic_sidebar( 'pbt-home-main' ); ?>
				</div>
			</div>
		</div>

		<div class="container-fluid container-fluid-no-padding container-padding">
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
							<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

							<div class="featured-post-meta-box">
								<h5 class="post-category font-size-small">

									<?php pbt_the_categories($post, ' | ' ); ?>

								</h5>

								<a href="<?php the_permalink() ?>">
									<h1 class="post-title"><?php the_title(); ?></h1>
								</a>
								<?php the_excerpt(); ?>
								<a class="btn btn-default read-more-btn btn-block" role="button" href="<?php the_permalink() ?>"><h6>Explore</h6></a>
							</div>
					</div>

				</div><!-- #post-## -->

			<?php
				endwhile; endif;
				wp_reset_postdata();
			?>
		</div>

		<div class="container container-padding">
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

			<div class="row row-padding-top">
				<div class="col-xs-12 col-md-offset-4 col-md-4">
					<a href="/stories"><button class="btn btn-primary btn-ghost btn-lg btn-block"><h4>More Stories</h4></button></a>
				</div>
			</div>

		</div>

		<div class="featured hero-image container-fluid container-fluid-no-padding container-little-padding-top">

			<?php echo get_the_post_thumbnail( get_ID_by_page_name( 'Notebook'), 'pbt-pano-header' ); ?>

			<div class="post-title">
				<h3>Read notebook entries from the Platte Basin Timelapse team.</h3>
			</div>

		</div>

		<div class="container container-large container-padding">
				<div class="row row-padding-top">
					<?php
						$home_page_featured_query_args = array(
							'post_type' => 'blog_post',
							'orderby' => 'date',
							'posts_per_page' => 4,
						);

						$the_query = new WP_Query( $home_page_featured_query_args );
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

					?>

						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-3'); ?>>

								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail( 'pbt-post-thumbnail' );  ?>
								</a>
								<!-- <h6 class="font-size-ex-small text-center">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a> on <?php the_date('F j Y'); ?></h6> -->
								<h4 class="text-center"><?php the_title( );  ?></h4>

						</div><!-- #post-## -->

					<?php
						endwhile; endif;
						wp_reset_postdata();
					?></div>
			<div class="row row-padding-top">
				<div class="col-xs-12 col-md-offset-4 col-md-4">
					<a href="/notebook"><button class="btn btn-primary btn-ghost btn-lg btn-block"><h4>More Notebook Entries</h4></button></a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>