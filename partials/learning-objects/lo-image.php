<?php
/**
 * The Learning Object format for an image
 */

    $align = get_field( 'col_align' );
    $size = get_field( 'col_size' );
    $image_col_size = '6';
    $content_col_size = '6';

    if ($size == 'large') { $image_col_size = '8'; $content_col_size = '4'; }
    else if ( $size == 'small' ) { $image_col_size = '4'; $content_col_size = '8'; }
    else { $image_col_size = '6'; $content_col_size = '6'; }
?>

<section id="lo-<?php the_ID(); ?>" <?php post_class('row row-padding'); ?>>

	<?php if( $align == 'left' ) { ?>

        <div class="col-sm-<?php echo $image_col_size; ?>">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php the_content(); ?>
        </div>

    <?php } else { ?>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php the_content(); ?>
        </div>

        <div class="col-sm-<?php echo $image_col_size; ?>">
            <?php the_post_thumbnail(); ?>
        </div>

    <?php } ?>

</section>