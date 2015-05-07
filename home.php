<?php
/**
 * The template for displaying the front page.
 */

get_header();

	$num_stories 		= 4; 			// How many stories to appear on the home page
	$num_blogs 			= 4; 			// How many blogs to appear on the home page
	$blog_page_title 	= 'Notebook'; 	// Title of Blog Page used to populate the blog post section on the home page.


	?>

	<section class="featured hero-image hero-image-behind" style="background-image: url(<?php header_image(); ?>)">
		<div class="container-fluid">

		<!-- 	<video class="wp-video-shortcode" id="video-245-1" width="930" height="523" preload="metadata" autoplay loop src="http://pbt.dev/wp-content/uploads/2015/05/intro-2-10-16-14.mp4?_=1" style="width: 100%; height: 100%;">
				<source type="video/mp4" src="http://pbt.dev/wp-content/uploads/2015/05/intro-2-10-16-14.mp4">
			</video> -->

			<!-- <div class="overlay"></div> -->

			<div class="featured-meta-box">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>
	</section>

	<section class="main" role="main">

		<div class="container container-large container-padding">
			<div class="row">
				<div class="col-md-5">
					<?php dynamic_sidebar( 'pbt-home-main' ); ?>
				</div>

				<div class="col-md-7">
					<div id="map" style="height: 550px; width: 100%;"></div>
				</div>
			</div>
		</div>

		<div class="container-fluid container-fluid-no-padding container-padding story-post-feature">
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

					<div class="featured-post-thumbnail">
							<?php the_post_thumbnail( 'pbt-pano-header' ); ?>

							<div class="featured-post-meta-box">
								<h5 class="post-category font-size-small">

									<?php pbt_the_categories($post, ' | ' ); ?>

								</h5>

								<a href="<?php the_permalink() ?>">
									<h1 class="post-title"><?php the_title(); ?></h1>
								</a>
								<?php the_excerpt(); ?>
								<a class="btn btn-default btn-block btn-lg btn-lg-max-width" role="button" href="<?php the_permalink() ?>"><h4>Explore This Story</h4></a>
							</div>
					</div>

				</div><!-- #post-## -->

			<?php
				endwhile; endif;
				wp_reset_postdata();
			?>
		</div>

		<div class="container container-padding story-post-feed">
			<div class="row">

				<?php
					$query_args = array(
						'post_type' 		=> 'post',
						'orderby' 			=> 'date',
						'posts_per_page' 	=> $num_stories,
						'meta_key'	 		=> 'home_page_feed',
						'meta_value' 		=> true,
					);

					$the_query = new WP_Query( $query_args );

					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) :
							$the_query->the_post(); ?>

							<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-12 col-md-6'); ?>>
								<?php get_template_part( 'partials/post-feed-thumbnail' ); ?>
							</div>

					<?php
					endwhile;
				endif;
				wp_reset_postdata(); ?>
			</div>

			<div class="row row-padding-top">
				<div class="col-xs-10 col-xs-offset-1 col-md-offset-4 col-md-4">
					<a href="/stories"><button class="btn btn-primary btn-ghost btn-lg btn-block"><h4>See All Stories</h4></button></a>
				</div>
			</div>

		</div>

		<div class="container-fluid container-fluid-no-padding container-little-padding-top blog-post-feature">

			<?php
				$blog_page_id = get_ID_by_page_name( $blog_page_title );
				$blog_page = get_post( $blog_page_id );
			?>

			<div class="featured">
				<?php echo get_the_post_thumbnail( $blog_page_id, 'pbt-pano-header' ); ?>

				<div class="featured-post-meta-box">
					<h1 class="post-title"><?php echo $blog_page_title; ?></h1>
					<p><?php echo apply_filters('the_content', $blog_page->post_content); ?></p>
					<a class="btn btn-default btn-lg btn-block btn-max-width" role="button" href="/notebook"><h6>See All Posts</h6></a>
				</div>
			</div>

		</div>

		<div class="container container-large container-padding blog-post-feed">
			<div class="row row-padding-top">
				<?php
					$query_args = array(
						'post_type' => 'blog_post',
						'orderby' => 'date',
						'posts_per_page' => $num_blogs,
					);

					$the_query = new WP_Query( $query_args );

					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) :
							$the_query->the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-8 col-xs-offset-2 col-md-offset-0 col-md-6 col-lg-3'); ?>>

						<div class="post-thumbnail">

							<a href="<?php the_permalink() ?>">

								<?php the_post_thumbnail( 'pbt-post-thumbnail' );  ?>

								<div class="post-meta-box-small">

									<a href="<?php the_permalink() ?>">
										<h4 class="post-tile"><?php the_title( );  ?></h4>
									</a>

								</div>
							</a>
						</div>
					</div><!-- #post-## -->

				<?php
					endwhile; endif;
					wp_reset_postdata();
				?>
			</div>
		</div>

	</section>

<?php get_footer(); ?>