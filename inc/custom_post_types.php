<?php

/**
 * Change default WP Post to be called Stories, rather than making a Custom Post Type
 * Anywhere in templating or backend processing, refer to the type as 'post'.
 * On the front-end, the type is called 'stories'
 */
function pbt_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Stories';
    $submenu['edit.php'][5][0] = 'Stories';
    $submenu['edit.php'][10][0] = 'Add Story';
    $submenu['edit.php'][16][0] = 'Story Tags';
    echo '';
}
function pbt_change_post_object() {
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

add_action( 'admin_menu', 'pbt_change_post_label' );
add_action( 'init', 'pbt_change_post_object' );

/**
 * Create Blog Post Custom Post Type
 * On the backend the type is refered to as 'blog_post' and in the Admin Menus as Blog Posts
 * On the frontend of the site, for audiences, they are Notebook entries on the notebook page.
 * I know confusing...
 */
function pbt_blog_post_type() {
    register_post_type('blog_post', array(
       'label' 					=> 'Blog Posts',
       'description' 			=> 'Blog posts from PBT Team members',
       'public' 				=> true,
       'show_ui' 				=> true,
       'show_in_menu' 			=> true,
       'menu_position' 			=> 5,
       'capability_type' 		=> 'post',
       'hierarchical' 			=> false,
       'publicly_queryable' 	=> true,
       'rewrite' 				=> false,
       'query_var' 				=> true,
       'has_archive' 			=> true,
       'supports' 				=> array('title','editor','excerpt','revisions','thumbnail','author'),
    ));

    global $wp_rewrite;
	$blog_post_structure = '/notebook/%year%/%blog_post%';
	$wp_rewrite->add_rewrite_tag("%blog_post%", '([^/]+)', "blog_post=");
	$wp_rewrite->add_permastruct('blog_post', $blog_post_structure, false);
}

add_action('init', 'pbt_blog_post_type');


/**
 * Blog Post Category Taxonomy Registration
 */
function pbt_blog_post_taxonomies() {
  $labels = array(
    'name'              => _x( 'Blog Post Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Blog Post Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Blog Post Categories' ),
    'all_items'         => __( 'All Blog Post Categories' ),
    'parent_item'       => __( 'Parent Blog Post Category' ),
    'parent_item_colon' => __( 'Parent Blog Post Category:' ),
    'edit_item'         => __( 'Edit Blog Post Category' ), 
    'update_item'       => __( 'Update Blog Post Category' ),
    'add_new_item'      => __( 'Add New Blog Post Category' ),
    'new_item_name'     => __( 'New Blog Post Category' ),
    'menu_name'         => __( 'Blog Post Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'blog_post_category', 'blog_post', $args );
}
add_action( 'init', 'pbt_blog_post_taxonomies', 0 );

/**
 * Custom Permalink Structures
 */
add_filter('post_type_link', 'pbt_blog_post_permalink', 10, 3);
function pbt_blog_post_permalink($permalink, $post_id, $leavename) {
    $post = get_post($post_id);
    $rewritecode = array(
        '%year%',
        '%monthnum%',
        '%day%',
        '%hour%',
        '%minute%',
        '%second%',
        $leavename? '' : '%postname%',
        '%post_id%',
        '%category%',
        '%author%',
        $leavename? '' : '%pagename%',
    );

    if ( '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
        $unixtime = strtotime($post->post_date);

        $category = '';
        if ( strpos($permalink, '%category%') !== false ) {
            $cats = get_the_category($post->ID);
            if ( $cats ) {
                usort($cats, '_usort_terms_by_ID'); // order by ID
                $category = $cats[0]->slug;
                if ( $parent = $cats[0]->parent )
                    $category = get_category_parents($parent, false, '/', true) . $category;
            }
            // show default category in permalinks, without
            // having to assign it explicitly
            if ( empty($category) ) {
                $default_category = get_category( get_option( 'default_category' ) );
                $category = is_wp_error( $default_category ) ? '' : $default_category->slug;
            }
        }

        $author = '';
        if ( strpos($permalink, '%author%') !== false ) {
            $authordata = get_userdata($post->post_author);
            $author = $authordata->user_nicename;
        }

        $date = explode(" ",date('Y m d H i s', $unixtime));
        $rewritereplace =
        array(
            $date[0],
            $date[1],
            $date[2],
            $date[3],
            $date[4],
            $date[5],
            $post->post_name,
            $post->ID,
            $category,
            $author,
            $post->post_name,
        );
        $permalink = str_replace($rewritecode, $rewritereplace, $permalink);
    } else { // if they're not using the fancy permalink option
    }
    return $permalink;
}