<?php

require_once('inc/shortcodes.php');
require_once('inc/custom_post_types.php');

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
 * Adding script from assets directory in theme root.
 * The main.min.js file is generated in the local Gruntfile.js after uglification and concatenation.
 */
function pbt_scripts() {
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/assets/scripts/main.min.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'pbt_scripts' );

/**
 * Load typekit stylesheet stuff
 */
function pbt_typekit() { ?>
	<script type="text/javascript" src="//use.typekit.net/dlv3qjg.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php
}
add_action( 'wp_head', 'pbt_typekit' );


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
function pbt_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'story-featured' => __( 'Featured Image' ),
    ) );
}
add_filter( 'image_size_names_choose', 'pbt_custom_image_sizes' );







/**
 * Adds additional fields to the User Page.
 * These fields are used on the when displaying author information.
 */
function pbt_modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = __('Twitter Username');
	$profile_fields['instagram'] = __('Instagram Username');
	$profile_fields['flickr'] = __('Flickr Username');
	$profile_fields['github'] = __('Github Username');

	return $profile_fields;
}
add_filter('user_contactmethods', 'pbt_modify_contact_methods');

add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

function add_extra_social_links( $user ) {
    ?>
        <h3>User Role</h3>

        <table class="form-table">
            <tr>
                <th><label for="user_pbt_role">PBT Role</label></th>
                <td><input type="text" name="user_pbt_role" value="<?php echo esc_attr(get_the_author_meta( 'user_pbt_role', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
    <?php
}

add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );

function save_extra_social_links( $user_id ) {
    update_user_meta( $user_id,'user_pbt_role', sanitize_text_field( $_POST['user_pbt_role'] ) );
}




/**
 * Parse post link and replace it with meta value.
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


