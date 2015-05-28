<?php
/**
 * The Learning Object format for a video
 */

    $video = get_field( 'video', $lo_id );
    $align = get_field( 'col_align', $lo_id );
    $size = get_field( 'col_size', $lo_id );
    $video_col_size = '6';
    $content_col_size = '6';

    if ($size == 'large') { $video_col_size = '8'; $content_col_size = '4'; }
    else if ( $size == 'small' ) { $video_col_size = '4'; $content_col_size = '8'; }
    else { $video_col_size = '6'; $content_col_size = '6'; }
?>

<section id="lo-<?php echo $lo_id?>" <?php post_class('row row-padding'); ?>>

	<?php if( $align == 'left' ) { ?>

        <div class="col-sm-<?php echo $video_col_size; ?>">
            <?php echo do_shortcode('[embed_video vimeo_id=' . $video . ']'); ?>
        </div>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php echo pbt_get_learning_object_lessoned_content($has_lesson, $lo_id); ?>
        </div>

    <?php } else { ?>

        <div class="col-sm-<?php echo $content_col_size; ?>">
            <?php echo pbt_get_learning_object_lessoned_content($has_lesson, $lo_id); ?>
        </div>

        <div class="col-sm-<?php echo $video_col_size; ?>">
            <?php echo do_shortcode('[embed_video size="" vimeo_id=' . $video . ']'); ?>
        </div>

    <?php } ?>

</section>