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

