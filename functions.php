<?php

require_once('inc/theme_setup.php');
require_once('inc/shortcodes.php');
require_once('inc/custom_post_types.php');
require_once('inc/user_fields.php');
require_once('inc/login.php');

if ( ! function_exists( 'pbt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook.
 *
 */
function pbt_setup() {

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add image sizes to be used in theme
	 */
	update_option( 'thumbnail_size_w', 300, true );
	update_option( 'thumbnail_size_h', 300, true );
    update_option( 'medium_size_w', 600, true );
    update_option( 'medium_size_h', 400, true );
	update_option( 'large_size_w', 1000, true );
	update_option( 'large_size_h', 500, true );

    add_image_size( 'pbt-post-thumbnail', 400, 200, true );
	add_image_size( 'pbt-pano-header', 1200, 400, true );

    add_image_size( 'story-featured', 1600, 800, false );

	/**
	 * Enable support for Custom Headers
	 */
	add_theme_support( 'custom-header' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus(
		array(
			'primary'    => 'Primary Menu',
			'secondary'  => 'Secondary Menu',
            'footer'     => 'Footer Menu',
		)
	);

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'link' ) );

	/**
	 * Register sidebars
	 */
	register_sidebar( array(
		'name' 			=> 'PBT Homepage Sidebar',
		'description' 	=> 'A widget area on the homepage',
		'id' 			=> 'pbt-home-main',
		'class'         => '',
		'before_widget' => '<div class="main-widgeted-text">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<p class="underlined underlined-dark font-size-large">',
		'after_title' 	=> '</p>'
	) );

    register_sidebar( array(
        'name'          => 'PBT Footer Main',
        'description'   => 'A sidebar area on the footer of every page.',
        'id'            => 'pbt-footer-main',
        'class'         => '',
        'before_widget' => '<div class="footer-widgeted-text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>'
    ) );
    register_sidebar( array(
        'name'          => 'PBT Footer Secondary - Right',
        'description'   => 'A secondary sidebar area on the footer of every page.',
        'id'            => 'pbt-footer-secondary-right',
        'class'         => '',
        'before_widget' => '<div class="footer-widgeted-text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>'
    ) );
    register_sidebar( array(
        'name'          => 'PBT Footer Secondary - Left',
        'description'   => 'A secondary sidebar area on the footer of every page.',
        'id'            => 'pbt-footer-secondary-left',
        'class'         => '',
        'before_widget' => '<div class="footer-widgeted-text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6>',
        'after_title'   => '</h6>'
    ) );
}
endif;
add_action( 'after_setup_theme', 'pbt_setup' );




/**
 * Hack the title tag to show Home when at site.
 */
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return 'Home' . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}


/**
 * Add custom image sizes to Admin Media select box
 */
function pbt_admin_choose_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'story-featured' => __( 'Featured Image' ),
    ) );
}
add_filter( 'image_size_names_choose', 'pbt_admin_choose_image_sizes' );



/**
 * Search Form function, hooked to get_search_form function
 */
function pbt_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<input class="btn btn-info" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'pbt_search_form' );

/**
 * Parse post link and replace it with meta value, or the 'external_url' field.
 * This is used for the WP post type Link.
 *
 * @wp-hook post_link
 * @param   string $link
 * @param   object $post
 * @return  string
 */
function pbt_external_permalink( $link, $post ) {
    $meta = get_post_meta( $post->ID, 'external_url', TRUE );
    $url  = esc_url( filter_var( $meta, FILTER_VALIDATE_URL ) );

    return $url ? $url : $link;
}
add_filter( 'post_link', 'pbt_external_permalink', 10, 2 );




