<?php
/**
 * The template for the Voices of the Platte project page.
 * Description: This is the template that displays all voices of the platte stories curently published.
 */

get_header();

	while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-short" style="background-image: url(<?php echo $post_thumbnail_url ?>)">

		<div class="featured-meta-box">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
		</div>

	</div> <!-- .container-fluid -->
</section> <!-- .featured -->

<article id="post-<?php the_ID(); ?>" <?php post_class('main'); ?> role="main">
	<div class="container">

		<!-- THE NOTEBOOK PAGE FEED OF POSTS -->
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'post',
				'tax_query' => array(
					array(
						'taxonomy' => 'series',
						'field'    => 'slug',
						'terms'    => 'voices-of-the-platte',
					),
				),
				'orderby' => 'date',
				'order'   => 'DESC',
				'posts_per_page' => 10,
				'paged' => $paged,
			);

			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-12 col-md-6'); ?>>
				<div class="post-thumbnail">
					<?php the_post_thumbnail( 'pbt-post-thumbnail' );  ?>

					<div class="post-meta-box post-meta-box-lg">

						<?php if ( get_post_type() === 'blog_post' ) { ?>

							<h5 class="blog-post-author font-size-small">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h5>

						<?php } else if ( get_post_type() === 'post' ) { ?>

							<h5 class="post-category font-size-small">

								<?php pbt_the_categories($post, ' | ' ); ?>

							</h5>

						<?php } else if ( get_post_type() === 'page' ) { ?>

							<h5 class="post-category">page</h5>

						<?php } ?>

						<a href="<?php the_permalink() ?>">
							<h1 class="post-title">
								<?php pbt_short_title(); ?>
							</h1>
						</a>

						<a class="btn btn-default read-more-btn btn-block btn-max-width" role="button" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><h5>Read More</h5></a>
					</div>
				</div>
			</div>

				<div class="col-md-6 col-v-little-padding">
					<div class="row">
						<div class="col-xs-12">
							<p><strong>By <a class="link-color-dark" href="<?php echo get_author_posts_url( get_the_author_meta( "ID" ) ) ?>"> <?php echo get_the_author(); ?></a> <small>posted on <?php echo get_the_date( 'F j, Y' ) ?></small></strong></p>
						</div>
					</div>

					<div class="row font-size-small">
						<div class="col-xs-12"><?php the_excerpt(); ?></div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<a class="btn btn-primary btn-ghost btn-block btn-sm-max-width" role="button" href="<?php the_permalink() ?>"><h6>Listen</h6></a>
						</div>
					</div>
				</div>

		<?php endwhile; ?>
	</div>

	<div class="container">
		<?php if ( function_exists("wp_bs_pagination") ) wp_bs_pagination($the_query->max_num_pages); ?>
	</div>

	<?php  endif;
		wp_reset_postdata();
	?>
</article>

<?php endwhile; ?>



<?php get_footer(); ?>
