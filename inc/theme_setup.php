<?php
/**
 * Basic functions that run in the head of each page.
 */

/**
 * Load Google Analytics into the header of every page.
 * It checks to see if the current user is logged in, then don't do it.
 * No need for tracking logged in users. Am I right, or am I right?
 */
function pbt_google_analytics() {
	if ( !is_user_logged_in() ) : // don't track logged in users ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40570778-1', 'auto');
		  ga('send', 'pageview');

		</script>
	<?php endif;
}
add_action( 'wp_head', 'pbt_google_analytics' );


/**
 * Remove all this extra stuff that Wordpress generates.
 * Keep it clean!
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function pbt_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_template_directory_uri() . '/assets/img/favicon.ico" />';
}
add_action('wp_head', 'pbt_favicon');


/**
 * Adding script from assets directory in theme root.
 * The main.min.js file is generated in the local Gruntfile.js after uglification and concatenation.
 */
function pbt_scripts() {
	wp_register_script('main-scripts', get_template_directory_uri() . '/assets/scripts/main.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'main-scripts' );
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


