<?php
/**
 * The Learning Object format for a video
 */

    $video = get_field( 'video' );
    $align = get_field( 'col_align' );
    $size = get_field( 'col_size' );
    $video_col_size = '6';
    $content_col_size = '6';

    if ($size == 'large') { $video_col_size = '8'; $content_col_size = '4'; }
    else if ( $size == 'small' ) { $video_col_size = '4'; $content_col_size = '8'; }
    else { $video_col_size = '6'; $content_col_size = '6'; }
?>

<section id="lo-<?php the_ID(); ?>" <?php post_class('row row-padding'); ?>>

	<?php if( $align == 'left' ) { ?>

        <div class="col col-sm-<?php echo $video_col_size; ?>">
            <?php echo do_shortcode('[embed_video vimeo_id=' . $video . ']'); ?>
        </div>

        <div class="col col-sm-<?php echo $content_col_size; ?>">
            <?php the_content(); ?>
        </div>

    <?php } else { ?>

        <div class="col col-sm-<?php echo $content_col_size; ?>">
            <?php the_content(); ?>
        </div>

        <div class="col col-sm-<?php echo $video_col_size; ?>">
            <?php echo do_shortcode('[embed_video vimeo_id=' . $video . ']'); ?>
        </div>

    <?php } ?>

</section>