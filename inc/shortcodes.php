<?php


/**
 * Improves the caption shortcode with HTML5 figure & figcaption; microdata & wai-aria attributes
 *
 * @param  string $val     Empty
 * @param  array  $attr    Shortcode attributes
 * @param  string $content Shortcode content
 * @return string          Shortcode output
 */
function pbt_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'      => '',
        'class'   => '',
        'align'   => 'aligncenter',
        'width'   => '',
        'caption' => ''
    ), $attr));

    // No caption, no dice... But why width?
    // if ( 1 > (int) $width )
    //     return $val;

    if ( $id )
        $id = esc_attr( $id );

    return '<figure class="image ' . $align . ' ' . $class . '" id="' . $id . '" aria-describedby="figcaption_' . $id . '" class="img-caption ' . esc_attr($align) .'">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="caption-text" itemprop="description">' . $caption . '</figcaption></figure>';
}
add_filter( 'img_caption_shortcode', 'pbt_img_caption_shortcode_filter', 10, 3 );

/**
 * Adds a shortcode for displaying responsive iFrames in a content post.
 * Option of passing in a video ID or an entire src. May set 16x9 or 3x2 with video/timelapse.
 * May also set a caption.
 *
 * @param  string $val     Empty
 * @param  array  $attr    Shortcode attributes
 * @return string          Shortcode output
 */
function pbt_video_embed_shortcode( $atts ) {
    extract( shortcode_atts(
        array(
            'src'               => '',
            'size'              => 'featured',
            'vimeo_id'          => '',
            'aspect_ratio'      => 'video',
            'caption'           => '',
        ), $atts )
    );

    if ( !empty($vimeo_id) ) { $src = 'https://player.vimeo.com/video/' . $vimeo_id . '?title=0&byline=0&portrait=0'; }

    $embed = '<div class="' . $size . '-video">
                <figure class="' . $aspect_ratio . '-wrapper">
                    <iframe src="' . $src . '" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </figure>';

    // If there is a caption
    if ( !empty($caption) ) { $embed = $embed . '<figcaption class="caption-text">' . $caption . '</figcaption></div>'; } else {
        $embed = $embed . '</div>';
    }

    return $embed;

}
add_shortcode( 'embed_video', 'pbt_video_embed_shortcode' );