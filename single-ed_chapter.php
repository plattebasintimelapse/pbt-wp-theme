<?php
/**
 * The template for displaying a ed chapter
 */



get_header();

while ( have_posts() ) : the_post();

	$post_thumbnail_id = get_post_thumbnail_id();
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

	<section class="featured hero-image hero-image-behind hero-image-behind-medium" style="background-image: url(<?php echo $post_thumbnail_url ?>); background-position: <?php the_field( 'horizontal_weight' ) ?> <?php the_field( 'vertical_weight' )  ?>;">
	</section> <!-- .featured -->

	<article id="post-<?php the_ID(); ?>" <?php post_class('main main-content education'); ?> role="main" >

		<div class="container">

			<?php
				$parents = get_posts(array(
					'post_type' => 'ed_story',
					'meta_query' => array(
						array(
							'key' => 'chapter_list',
							'value' => '"' . get_the_ID() . '"',
							'compare' => 'LIKE',
						)
					)
				));
				if( $parents ):
					foreach( $parents as $parent ): ?>
						<p class="no-margins text-center font-size-ex-small">
							<a class="link-clor-dark" href="<?php echo get_permalink( $parent->ID ); ?>">
								<i class="fa fa-arrow-left"></i> Return to <?php echo get_the_title( $parent->ID ); ?>
							</a>
						</p>
					<?php endforeach;
				endif;
			?>

			<h2><?php the_title(); ?></h2>


			<?php the_content(); ?>

		</div>
	</article>

	<?php endwhile; ?>

<?php get_footer(); ?>