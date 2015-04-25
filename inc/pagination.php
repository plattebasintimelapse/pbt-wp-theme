<?php
/**
 * Pagination rules throughout the site
 */


/**
 *  Limit 6 posts per archive pages
 */
function pbt_archive_query( $query ){
    if( ! is_admin() && $query->is_archive( ) && $query->is_main_query() ){
        $query->set( 'posts_per_page', 6 );
    }
}
add_filter( 'pre_get_posts', 'pbt_archive_query' );


/**
 *  Add blog posts to home page main query
 *  The number of posts is set in the Settings/Reading page
 */
function pbt_home_posts( $query ) {
	if ( ! is_admin() && is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'blog_post' ) );

	return $query;
}
add_filter( 'pre_get_posts', 'pbt_home_posts' );

/**
 *  A custom function that displays a bootstrap 
 *  version of pagiation
 */
function wp_bs_pagination($pages = '', $range = 1) {  
 
    $showitems = ($range * 2) + 1;  
	global $paged;

	if( empty($paged) ) $paged = 1;

	if($pages == ''){
		global $wp_query; 
	 	$pages = $wp_query->max_num_pages;
 
    	if(!$pages) {
 			$pages = 1;
 		}
 	}   
 
 	if(1 != $pages) {
 
        echo '<nav class="text-center" role="navigation"><ul class="pagination pagination-sm">';
 
       	if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
 
       	if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
 
 		for ($i=1; $i <= $pages; $i++) {
 
        	if ( 1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ) ) {
 
               	echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>
 
    			</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
           	}
 		}

 		if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";  
 		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
 
		echo "</ul></nav>";
    }
}