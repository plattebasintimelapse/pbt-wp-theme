<?php
/**
 * The Learning Object format for an image
 */

?>

<section <?php post_class('row row-padding'); ?>>

	<?php if( $i % 2 == 0 ) { ?>

        <div class="col-sm-6 hidden-xs">
            <?php echo get_the_post_thumbnail( $post_id ); ?>
        </div>

        <div class="col-sm-6">
            <?php echo the_excerpt(); ?>
            <?php echo '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $post_id ) . '" href="' . get_permalink( $post_id ) . '"><i class="fa fa-book"></i> Learn More </a></h6>'; ?>
        </div>

    <?php } else { ?>

        <div class="col-sm-6">
            <?php echo the_excerpt(); ?>
            <?php echo '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $post_id ) . '" href="' . get_permalink( $post_id ) . '"><i class="fa fa-book"></i> Learn More </a></h6>'; ?>
        </div>

        <div class="col-sm-6 hidden-xs">
            <?php echo get_the_post_thumbnail( $post_id ); ?>
        </div>

    <?php } ?>

</section>