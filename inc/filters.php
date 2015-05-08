<?php



/**
 *  Strip out the p tags wrapping images in the_content
 */
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

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
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Type and press enter"/>
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'pbt_search_form' );

/**
 *  Limit 10 posts per archive pages and author page
 */
function pbt_archive_query( $query ){
    if( ! is_admin() && $query->is_archive( ) && $query->is_main_query() ){
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'pbt_archive_query' );

/**
 *  Add blog posts to author query
 */
function pbt_author_query( $query ){
    if( ! is_admin() && $query->is_author( ) && $query->is_main_query() ){
        $query->set( 'post_type', array('post', 'blog_post', ) );
        // $query->set( 'meta_key', 'second_user' );
        // $query->set( 'meta_value', the_author() );
    }
}
add_action( 'pre_get_posts', 'pbt_author_query' );


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

/**
 * Hack the title tag to show Home when at site.
 */
function pbt_hack_wp_title_for_home( $title ) {
  	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    	return 'Home' . ' | ' . get_bloginfo( 'description' );
  	}
  	return $title;
}
add_filter( 'wp_title', 'pbt_hack_wp_title_for_home' );