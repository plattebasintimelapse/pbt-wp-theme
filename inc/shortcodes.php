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
        'behind'  => 'false',
        'width'   => '',
        'caption' => ''
    ), $attr));

    if ( $id )
        $id = esc_attr( $id );

    $figure = '';
    $computed_style = '';

    if ( $width > 1601 and $behind === 'true' ) {
        $class = 'behind';
        $figure = '</div><div class="full-image container-fluid container-fluid-no-padding"><figure class="image ' . $class . '" id="' . $id . '" aria-describedby="figcaption_' . $id . '">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="caption-text" itemprop="description">' . $caption . '</figcaption></figure></div><div class="container">';
    } else if ( $width > 1601 ) {
        $class = 'full';
        $figure = '</div><div class="full-image container-fluid container-fluid-no-padding"><figure class="image ' . $class . '" id="' . $id . '" aria-describedby="figcaption_' . $id . '">' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="caption-text" itemprop="description">' . $caption . '</figcaption></figure></div><div class="container">';
    } else {
        if ( $width >= 960 ) {
            $class = 'featured';
        } else if ( $width < 960 ) {
            $class = 'aside';
            $computed_style = 'style="width:' . $width . 'px;"';
        }
        $figure = '<figure class="image ' . esc_attr($align) . ' ' . $class . '" id="' . $id . '" aria-describedby="figcaption_' . $id . '" ' . $computed_style . '>' . do_shortcode( $content ) . '<figcaption id="figcaption_'. $id . '" class="caption-text" itemprop="description">' . $caption . '</figcaption></figure>';
    }

    return $figure;
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
            'side'              => '',
            'vimeo_id'          => '',
            'aspect_ratio'      => 'video',
            'caption'           => '',
        ), $atts )
    );

    if ( !empty($vimeo_id) ) { $src = 'https://player.vimeo.com/video/' . $vimeo_id . '?title=0&byline=0&portrait=0'; }

    $iframe_class = 'video';
    if ( !empty($side) )
        $iframe_class .= ' video-' . $side;
    $iframe_class .= ' video-' . $size;

    $embed = '<div class="' . $iframe_class . '">
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


/**
 * Adds a shortcode for displaying responsive iFrames in a content post.
 * Uses nprapp Pym.js
 *
 * @param  string $val     Empty
 * @param  array  $attr    Shortcode attributes
 * @return string          Shortcode output
 */
function pbt_responsive_iframe_shortcode( $atts ) {
    extract( shortcode_atts(
        array(
            'src'               => '',
            'id'                => 'example',
            'size'              => 'featured',
            'side'              => '',
        ), $atts )
    );

    $iframe_class = 'responsive-iframe';
    if ( !empty($side) )
        $iframe_class .= ' responsive-frame-' . $side;
    $iframe_class .= ' responsive-frame-' . $size;

    $iframe =   '<div class="' . $iframe_class . '" id="' . $id . '"></div>
                <script type="text/javascript" src="' . get_template_directory_uri() . '/assets/scripts/lib/pym.min.js"></script>
                <script type="text/javascript">
                    var pymParent = new pym.Parent("' . $id . '", "' . $src . '", {});
                </script>';

    return $iframe;

}
add_shortcode( 'embed_iframe', 'pbt_responsive_iframe_shortcode' );

/**
 * Adds a shortcode for displaying custom post types - like learning objects
 *
 * @param  array  $attr    Shortcode attributes
 * @return string          Shortcode output
 */
function pbt_lo_shortcode( $atts ) {
    extract( shortcode_atts(
        array(
            'slug'              => '',
            'src'               => '',
            'icon'              => 'graduation-cap',
            'activity'          => 'Activity',
            'float'             => 'left',
        ), $atts )
    );

    $args = array(
        'name'        => $slug,
        'post_type'   => 'learning_object',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $posts = get_posts($args);
    $embed = '';
    if( $posts ) :
        $post_id = $posts[0]->ID;
        $embed .= '<div class="info-box pull-' . $float . '">';
        $embed .= '<h3><a href="' . get_post_permalink($post_id) . '"><i class="fa fa-lg fa-' . $icon . '"></i> ' . $posts[0]->post_title . '</a></h3>';
        $embed .= '</div>';
    endif;

    return $embed;

}
add_shortcode( 'learning', 'pbt_lo_shortcode' );



