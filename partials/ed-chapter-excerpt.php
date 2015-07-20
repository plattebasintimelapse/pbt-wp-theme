<?php
/**
 * The Learning Object format for an image
 */

if ($i % 2 == 0):
    $align = 'left';
else:
    $align = 'right';
endif;
?>

<section <?php post_class('row row-padding'); ?>>

	<?php if( $align == 'left' ) { ?>

        <div class="col-sm-6">
            <?php echo get_the_post_thumbnail( $post_id ); ?>
        </div>

        <div class="col-sm-6">
            <?php echo '<h3>Chapter ' . $i . ': ' . get_the_title() . '</h3>'; ?>
            <?php echo the_excerpt(); ?>
            <?php echo '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $post_id ) . '" href="' . get_permalink( $post_id ) . '"><i class="fa fa-book"></i> Read More </a></h6>'; ?>
        </div>

    <?php } else { ?>

        <div class="col-sm-6">
            <?php echo '<h3>Chapter ' . $i . ': ' . get_the_title($post_id) . '</h3>'; ?>
            <?php echo the_excerpt(); ?>
            <?php echo '<h6><a class="btn btn-primary btn-ghost btn-md" role="button" rel="bookmark" title="Permanent Link to ' . get_the_title( $post_id ) . '" href="' . get_permalink( $post_id ) . '"><i class="fa fa-book"></i> Read More </a></h6>'; ?>
        </div>

        <div class="col-sm-6">
            <?php echo get_the_post_thumbnail( $post_id ); ?>
        </div>

    <?php } ?>

</section>