<?php

if ( ! function_exists( 'pbt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 */
function pbt_setup() {
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	// add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add image sizes to be used in theme
	 */
	update_option( 'thumbnail_size_w', 400, true );
	update_option( 'thumbnail_size_h', 200, true );
	update_option( 'large_size_w', 1200, true );
	update_option( 'large_size_h', 500, true );

	add_image_size( 'pano-header', 1200, 400, true );

	/**
	 * Enable support for Custom Headers
	 */
	add_theme_support( 'custom-header' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus(
		array(
			'primary' => 'Primary Menu',
			'secondary' => 'Secondary Menu'
		)
	);

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'audio' ) );
}
endif;
add_action( 'after_setup_theme', 'pbt_setup' );

/**
 * Adding script from assets directory in theme root.
 * The main.min.js file is generated in the local Gruntfile.js after uglification and concatenation.
 */
function pbt_scripts() {
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/scripts/main.min.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'pbt_scripts' );

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}



function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Stories';
    $submenu['edit.php'][5][0] = 'Stories';
    $submenu['edit.php'][10][0] = 'Add Story';
    $submenu['edit.php'][16][0] = 'Story Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Stories';
    $labels->singular_name = 'Story';
    $labels->add_new = 'Add Story';
    $labels->add_new_item = 'Add Story';
    $labels->edit_item = 'Edit Story';
    $labels->new_item = 'Story';
    $labels->view_item = 'View Story';
    $labels->search_items = 'Search Story';
    $labels->not_found = 'No Stories found';
    $labels->not_found_in_trash = 'No Stories found in Trash';
    $labels->all_items = 'All Stories';
    $labels->menu_name = 'Story';
    $labels->name_admin_bar = 'Story';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


/**
 * Add styles to login page.
 */
function login_page_styles() { ?>

	<style type="text/css">
		body.login {
			background-image: url('<?php header_image(); ?>');
			background-repeat: no-repeat;
			background-attachment: scroll;
			background-position: center center;
			background-size: cover;
		}
		.login h1 a {
			display: none;
		}
		.login form {
			font-weight: 100;
			padding: 26px 24px 6px;
			background:none;
			box-shadow: none;
		}
		.login form .input, .login form input[type=checkbox], .login input[type=text] {
		 	background: #fbfbfb;
		  	border-radius: 20px;
		  	padding: 4px 16px;
  			font-size: 18px;
		}
		.login #backtoblog a, .login #nav a {
			color: white;
		}
		.login label {
			color: white;
			text-shadow: 2px 2px 2px black;
		}
    </style>

<?php }
add_action( 'login_enqueue_scripts', 'login_page_styles' );

?>

