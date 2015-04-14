<?php
/**
 * The template for displaying the front page.
 */

get_header(); ?>

	<section class="featured hero-image">
		<div class="container-fluid">

			<header class="navbar">
		  		<div class="container-fluid">
		    		<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/logo.png" alt=""></a>
		    		</div>

		  			<a class="btn btn-prim pull-right" data-toggle="collapse" href="#navbarCollapse" aria-expanded="false" aria-controls="navbarCollapse">
						<span class="sr-only">Toggle navigation</span>
				    	<i class="fa fa-bars fa-2x"></i>
					</a>

		  		</div>
			</header>

			<img src="<?php header_image(); ?>" alt="" />

			<div class="featured-story-info-box">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<h3><?php bloginfo( 'description' ); ?></h3>

			</div>
		</div>
	</section>

	<section class="main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<h4>The Platte River is a major watershed in the heart of the Great Plains. The Platte waters crops and cattle, hosts resident and migrant wildlife, delights fisherman and boaters, fuels power generators and supplies thirsty cities.</h4>
					<h3>These are stories of our most precious resource: water</h3>

				</div>
			</div>
		</div>

			<div class="container-fluid">
				<div class="row row-padding">

					<?php
						$story_page_query_args = array(
							'post_type' => 'post',
							'orderby' => 'title',
							'order'   => 'ASC',
							'posts_per_page' => 3,
						);

						$the_query = new WP_Query( $story_page_query_args );
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();

					?>

						<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-4'); ?>>

							<div class="story-thumbnail">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail( 'thumbnail' ); ?>

									<div class="story-info-box">
										<h5 class="post-category"><?php the_category( ' - ' ) ?></h5>
										<a href="<?php the_permalink() ?>"><h3 class="post-title"><?php the_title(); ?></h3></a>
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

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-offset-4 col-sm-4">
					<a href="/stories"><button class="btn btn-primary btn-lg btn-block">More Stories</button></a>
				</div>
			</div>

		</div>
	</section>

<?php get_footer(); ?>