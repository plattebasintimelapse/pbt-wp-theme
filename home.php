<?php
/**
 * The template for displaying the front page.
 *
 * The home page basically has two <section>s: the hero and main.
 * Hero is video or image fall back.
 * Main is a collection of sub-sections that link to important content on our site: featured story, all stories
 * blog posts, special series (Voices of the Platte), and education. These sections are pulled from pages.
 */

get_header();

	$num_stories 		= 4; 			// How many stories to appear on the home page
	$num_blogs 			= 4; 			// How many blogs to appear on the home page
	$blog_page_title 	= 'Notebook'; 	// Title of Blog Page used to populate the blog post section on the home page.
	$votp_page_title 	= 'Voices of the Platte'; 	// Title of Voices of the Platte Page used to populate the blog post section on the home page.
	$learn_page_title 	= 'Learn'; 	// Title of Voices of the Platte Page used to populate the blog post section on the home page.

	?>

	<!-- Hero Section -->

	<section class="featured hero-image">
		<div class="container-fluid">

			<div class="hidden" id="intro-video-wrapper">
				<video id="intro-video" preload="auto" loop style="width: 100%; height: 100%;">
					<source type="video/mp4" src="http://projects.plattebasintimelapse.com/assets/static/video/intro-2.mp4" />
					<source type="video/webm" src="http://projects.plattebasintimelapse.com/assets/static/video/intro-2.webm" />
					<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/intro.jpg" title="Your browser does not support the <video> tag" />
				</video>
			</div>

			<div class="overlay"></div>

			<div id="intro-image-wrapper">
				<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/intro.jpg" title="Your browser does not support the <video> tag" />
			</div>

			<div class="featured-meta-box">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h2><?php bloginfo( 'description' ); ?></h2>
				<a id="intro-arrow" style="opacity: 0;" class="btn btn-default btn-sm btn-no-border btn-block btn-xs-max-width" href="#main"><i class="fa fa-angle-down fa-3x"></i></a>
			</div>
		</div>
	</section>

	<!-- Main Section -->

	<section class="main" role="main">

		<a name="main"></a>
		<div class="container container-padding">
			<div class="row">
				<div class="col-md-12">
					<?php dynamic_sidebar( 'pbt-home-main' ); ?>
				</div>
			</div>
		</div>

		<!-- Featured Story Sub-Section -->

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
									<h1 class="post-title"><?php pbt_short_title(); ?></h1>
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

		<!-- Story Feed Sub-Section -->

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
					<a class="btn btn-primary btn-ghost btn-lg btn-block" title="Link to See All Stories" href="/stories"><h4>See All Stories</h4></a>
				</div>
			</div>

		</div>

		<!-- Map Sub-Section -->

		<a name="map"></a>
		<div class="container-fluid container-fluid-no-padding container-padding">
			<div id="map"></div>
			<div class="timelapse-content"></div>
		</div>

		<!-- Call to Action for Images Sub-Section -->

		<div class="container container-little-padding-top">
			<?php dynamic_sidebar( 'pbt-home-map' ); ?>
			<div class="row row-padding">
				<div class="col-xs-10 col-xs-offset-1 col-md-offset-4 col-md-4">
					<a class="btn btn-primary btn-ghost btn-lg btn-block" title="Link to Explore All Images" href="http://images.plattebasintimelapse.com"><h4>Explore All Images</h4></a>
				</div>
			</div>
		</div>

		<!-- Voices of the Platte Sub-Section -->

		<?php $votp_page = get_page_by_title( $votp_page_title );

		if ( $votp_page->post_status == 'publish' ) : ?>

			<a name="votp"></a>
			<div class="container-fluid container-fluid-no-padding container-little-padding-top votp-feature">
				<div class="featured">
					<?php echo get_the_post_thumbnail( $votp_page->ID, 'pbt-pano-header' ); ?>

					<div class="featured-post-meta-box">
						<h4>Featured Series</h4>
						<h1 class="post-title"><?php echo $votp_page_title; ?></h1>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="row row-padding-top">
						<div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-md-8 text-center">
							<?php echo apply_filters('the_content', $votp_page->post_content); ?>
						</div>
					</div>
					<div class="row row-padding">
						<div class="col-xs-10 col-xs-offset-1 col-md-offset-4 col-md-4">
							<a class="btn btn-primary btn-ghost btn-lg btn-block" title="Link to Voices of the Platte Stories" href="<?php echo get_post_permalink( $votp_page->ID ); ?>"><h4>Listen to Voices of the Platte</h4></a>
						</div>
					</div>
				</div>

			</div>

		<?php endif; ?>

		<!-- Learn Sub-Section -->

		<?php $learn_page = get_page_by_title( $learn_page_title );

		if ( $learn_page->post_status == 'publish' ) : ?>

			<a name="learn"></a>
			<div class="container-fluid container-fluid-no-padding container-little-padding-top learn-feature">
				<div class="featured">
					<?php echo get_the_post_thumbnail( $learn_page->ID, 'pbt-pano-header' ); ?>

					<div class="featured-post-meta-box">
						<h1 class="post-title"><?php echo $learn_page_title; ?></h1>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="row row-padding-top">
						<div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-md-8 text-center">
							<?php echo apply_filters('the_content', $learn_page->post_content); ?>
						</div>
					</div>
					<div class="row row-padding">
						<div class="col-xs-10 col-xs-offset-1 col-md-offset-4 col-md-4">
							<a class="btn btn-primary btn-ghost btn-lg btn-block" title="Link to Education Content Producted by PBT" href="<?php echo get_post_permalink( $learn_page->ID ); ?>"><h4>Learn More</h4></a>
						</div>
					</div>
				</div>

			</div>

		<?php endif; ?>

		<!-- Blog Feed Sub-Section -->

		<?php $blog_page = get_page_by_title( $blog_page_title );

		if ( $blog_page->post_status == 'publish' ): ?>

			<a name="blog"></a>
			<div class="container-fluid container-fluid-no-padding container-little-padding-top blog-post-feature">
				<div class="featured">
					<?php echo get_the_post_thumbnail( $blog_page->ID, 'pbt-pano-header' ); ?>

					<div class="featured-post-meta-box">
						<h1 class="post-title"><?php echo $blog_page_title; ?></h1>
						<p><?php echo apply_filters('the_content', $blog_page->post_content); ?></p>
						<a class="btn btn-default btn-lg btn-block btn-max-width" role="button" title="Link to See All Blog Posts" href="<?php echo get_post_permalink( $blog_page->ID ); ?>"><h6>See All Posts</h6></a>
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

						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-offset-2 col-xs-8 col-sm-offset-0 col-sm-6 col-md-3'); ?>>

							<div class="post-thumbnail">

								<?php the_post_thumbnail( 'pbt-post-thumbnail' );  ?>

								<div class="post-meta-box post-meta-box-sm">

									<a href="<?php the_permalink() ?>">
										<h4 class="post-title"><?php pbt_short_title(); ?></h4>
									</a>
									<a class="btn btn-default read-more-btn btn-block btn-max-width btn-sm" role="button" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><h6>Read More</h6></a>

								</div>
							</div>
						</div>

					<?php
						endwhile; endif;
						wp_reset_postdata();
					?>
				</div>
			</div>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>