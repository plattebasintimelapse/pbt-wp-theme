<?php

require_once('inc/theme_setup.php');
require_once('inc/filters.php');
require_once('inc/shortcodes.php');
require_once('inc/custom_post_types.php');
require_once('inc/user_fields.php');
require_once('inc/login.php');
require_once('inc/capabilities.php');
require_once('inc/pagination.php');
require_once('inc/helpers.php');

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

    add_image_size( 'story-featured', 1600, false );

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
	add_theme_support( 'post-formats', array( 'link', 'audio' ) );

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
 * Add a link to the theme docs in the admin header
 */
function pbt_docs_admin_link( $wp_admin_bar ) {
	$args = array(
		'id'		=> 'pbt-docs',
		'title' 	=> 'PBT Docs',
		'href'  	=> 'https://github.com/plattebasintimelapse/pbt-wp-theme/blob/master/docs/docs.md',
		'meta'  	=> array( 'target' => '_blank' ),
	);
	$wp_admin_bar->add_node( $args );
}

add_action( 'admin_bar_menu', 'pbt_docs_admin_link', 999 );
