<?php
/**
 * The Learning Object format for an image
 */

    $align = get_field( 'col_align', $lo_id  );
    $size = get_field( 'col_size', $lo_id  );
    $image_col_size = '6';
    $content_col_size = '6';

    if ($size == 'large') { $image_col_size = '8'; $content_col_size = '4'; }
    else if ( $size == 'small' ) { $image_col_size = '4'; $content_col_size = '8'; }
    else { $image_col_size = '6'; $content_col_size = '6'; }
?>

<section id="lo-<?php echo $lo_id ?>" <?php post_class('row row-padding'); ?>>

	<?php if( $align == 'left' ) { ?>

        <div class="col-sm-<?php echo $image_col_size; ?>">
            <?php echo get_the_post_thumbnail( $lo_id ); ?>
        </div>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php echo '<h3>Chapter ' . $i . ': ' . get_the_title() . '</h3>'; ?>
            <?php echo pbt_get_learning_object_lessoned_content($has_lesson, $has_more, $lo_id); ?>
        </div>

    <?php } else { ?>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php echo '<h3>Chapter ' . $i . ': ' . get_the_title($lo_id) . '</h3>'; ?>
            <?php echo pbt_get_learning_object_lessoned_content($has_lesson, $has_more, $lo_id); ?>
        </div>

        <div class="col-sm-<?php echo $image_col_size; ?>">
            <?php echo get_the_post_thumbnail( $lo_id ); ?>
        </div>

    <?php } ?>

</section>