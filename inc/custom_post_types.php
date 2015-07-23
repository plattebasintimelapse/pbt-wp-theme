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

function pbt_rename_default_category() {
    global $wp_taxonomies;

    $cat = $wp_taxonomies['category'];
    $cat->label                     = 'Story Themes';
    $cat->labels->name              = 'Story Themes';
    $cat->labels->singular_name     = 'Story Theme';
    $cat->labels->search_items      = 'Search Story Themes';
    $cat->labels->all_items         = 'All Story Themes';
    $cat->labels->parent_item       = 'Parent Story Theme';
    $cat->labels->parent_item_colon = 'Parent Story Theme:';
    $cat->labels->edit_item         = 'Edit Story Theme';
    $cat->labels->update_item       = 'Update Story Theme';
    $cat->labels->add_new_item      = 'Add New Story Theme';
    $cat->labels->new_item_name     = 'New Story Theme';
    $cat->labels->menu_name         = 'Story Themes';
}
add_action('init', 'pbt_rename_default_category');

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
       'public' 		        => true,
       'show_ui' 				=> true,
       'show_in_menu' 			=> true,
       'menu_position' 			=> 5,
       'capability_type' 		=> 'post',
       'hierarchical' 			=> false,
       'publicly_queryable' 	=> true,
       'rewrite' 				=> false,
       'query_var' 				=> true,
       'has_archive' 			=> true,
       'supports' 				=> array('title','editor','excerpt','revisions','thumbnail','author','comments'),
    ));

    global $wp_rewrite;
	$blog_post_structure = '/notebook/%year%/%monthnum%/%blog_post%';
	$wp_rewrite->add_rewrite_tag("%blog_post%", '([^/]+)', "blog_post=");
	$wp_rewrite->add_permastruct('blog_post', $blog_post_structure, false);
}

add_action('init', 'pbt_blog_post_type');

/**
 * Blog Post Category Taxonomy Registration
 */
function pbt_post_taxonomies() {
    $labels = array(
        'name'              => _x( 'Basins', 'taxonomy general name' ),
        'singular_name'     => _x( 'Basin', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Basins' ),
        'all_items'         => __( 'All Basins' ),
        'parent_item'       => __( 'Parent Basin' ),
        'parent_item_colon' => __( 'Parent Basin:' ),
        'edit_item'         => __( 'Edit Basin' ),
        'update_item'       => __( 'Update Basin' ),
        'add_new_item'      => __( 'Add New Basin' ),
        'new_item_name'     => __( 'New Basin' ),
        'menu_name'         => __( 'Basins' ),
    );
    $args = array(
        'labels'            => $labels,
        'rewrite'           => array( 'slug' => 'basin'),
        'hierarchical'      => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'basin', 'post', $args );
}
add_action( 'init', 'pbt_post_taxonomies', 0 );

/**
 * Post Category Taxonomy Registration
 */
function pbt_special_post_taxonomies() {
    $labels = array(
        'name'              => _x( 'Series', 'taxonomy general name' ),
        'singular_name'     => _x( 'Series', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Series' ),
        'all_items'         => __( 'All Series' ),
        'parent_item'       => __( 'Parent Series' ),
        'parent_item_colon' => __( 'Parent Series:' ),
        'edit_item'         => __( 'Edit Series' ),
        'update_item'       => __( 'Update Series' ),
        'add_new_item'      => __( 'Add New Series' ),
        'new_item_name'     => __( 'New Series' ),
        'menu_name'         => __( 'Series' ),
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'rewrite'           => array( 'slug' => 'series'),
        'show_in_quick_edit' => false,
        'hierarchical'      => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'series', 'post', $args );
}
add_action( 'init', 'pbt_special_post_taxonomies', 0 );


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
        'rewrite'           => array( 'slug' => 'category'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
    );
    register_taxonomy( 'blog_post_category', 'blog_post', $args );
}
add_action( 'init', 'pbt_blog_post_taxonomies', 0 );

/**
 * Create Project Credits Custom Post Type
 */
function pbt_project_credits_post_type() {
    register_post_type('project_credit', array(
       'label'                  => 'Project Credits',
       'description'            => 'Credits to appear on the About Page',
       'public'                 => false,
       'show_ui'                => true,
       'show_in_menu'           => true,
       'menu_position'          => 26,
       'capability_type'        => 'post',
       'hierarchical'           => false,
       'publicly_queryable'     => false,
       'rewrite'                => false,
       'query_var'              => true,
       'has_archive'            => false,
       'supports'               => array('title','thumbnail'),
    ));
}

add_action('init', 'pbt_project_credits_post_type');


/**
 * Blog Post Category Taxonomy Registration
 */
function pbt_project_credit_taxonomies() {
  $labels = array(
    'name'              => _x( 'Support Levels', 'taxonomy general name' ),
    'singular_name'     => _x( 'Support Level', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Support Levels' ),
    'all_items'         => __( 'All Support Levels' ),
    'parent_item'       => __( 'Parent Support Level' ),
    'parent_item_colon' => __( 'Parent Support Level' ),
    'edit_item'         => __( 'Edit Support Level' ),
    'update_item'       => __( 'Update Support Level' ),
    'add_new_item'      => __( 'Add New Support Level' ),
    'new_item_name'     => __( 'New Support Level' ),
    'menu_name'         => __( 'Support Levels' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => false,
  );
  register_taxonomy( 'support_level', 'project_credit', $args );
}
add_action( 'init', 'pbt_project_credit_taxonomies', 0 );


/**
 * Create Lesson Post Type
 */
function pbt_ed_story_post_type() {
    $labels = array(
        'name'                => _x( 'Ed Stories', 'Post Type General Name' ),
        'singular_name'       => _x( 'Lesson', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Ed Stories' ),
        'parent_item_colon'   => __( 'Parent Ed Story' ),
        'all_items'           => __( 'All Ed Stories' ),
        'view_item'           => __( 'View Ed Story' ),
        'add_new_item'        => __( 'Add New Ed Story' ),
        'add_new'             => __( 'Add New Ed Story' ),
        'edit_item'           => __( 'Edit Ed Story' ),
        'update_item'         => __( 'Update Ed Story' ),
        'search_items'        => __( 'Search Ed Stories' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type('ed_story', array(
       'labels'                 => $labels,
       'description'            => 'A collection of ed stories, displayed in a textbook fashion',
       'public'                 => true,
       'exclude_from_search'    => true,
       'show_ui'                => true,
       'show_in_menu'           => true,
       'menu_position'          => 28,
       'menu_icon'              => 'dashicons-category',
       'capability_type'        => 'post',
       'rewrite'                => array( 'slug' => 'learn'),
       'query_var'              => true,
       'has_archive'            => false,
       'supports'               => array('title','thumbnail','excerpt','revisions'),
    ));
}

add_action('init', 'pbt_ed_story_post_type');

/**
 * Create Ed Chapter Post Type
 */
function pbt_ed_chapter_post_type() {
    $labels = array(
        'name'                => _x( 'Ed Chapters', 'Post Type General Name' ),
        'singular_name'       => _x( 'Ed Chapter', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Ed Chapters' ),
        'parent_item_colon'   => __( 'Parent Ed Chapter' ),
        'all_items'           => __( 'All Ed Chapters' ),
        'view_item'           => __( 'View Ed Chapter' ),
        'add_new_item'        => __( 'Add New Ed Chapter' ),
        'add_new'             => __( 'Add New Ed Chapter' ),
        'edit_item'           => __( 'Edit Ed Chapter' ),
        'update_item'         => __( 'Update Ed Chapter' ),
        'search_items'        => __( 'Search Ed Chapters' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type('ed_chapter', array(
       'labels'                 => $labels,
       'description'            => 'A education chapter that appears on ed stories page',
       'public'                 => true,
       'exclude_from_search'    => true,
       'show_ui'                => true,
       'show_in_menu'           => true,
       'menu_position'          => 9.483,
       'menu_icon'              => 'dashicons-welcome-learn-more',
       'capability_type'        => 'post',
       'rewrite'                => array( 'slug' => 'ed/chapter'),
       'query_var'              => true,
       'has_archive'            => false,
       'supports'               => array('title','thumbnail','editor','excerpt','revisions'),
    ));
}

add_action('init', 'pbt_ed_chapter_post_type');

/**
 * Create Learning Object Post Type
 */
function pbt_ed_learning_object_post_type() {
    $labels = array(
        'name'                => _x( 'Learning Objects', 'Post Type General Name' ),
        'singular_name'       => _x( 'Learning Object', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Learning Objects' ),
        'parent_item_colon'   => __( 'Parent Learning Object' ),
        'all_items'           => __( 'All Learning Objects' ),
        'view_item'           => __( 'View Learning Object' ),
        'add_new_item'        => __( 'Add New Learning Object' ),
        'add_new'             => __( 'Add New Learning Object' ),
        'edit_item'           => __( 'Edit Learning Object' ),
        'update_item'         => __( 'Update Learning Object' ),
        'search_items'        => __( 'Search Learning Objects' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
    register_post_type('learning_object', array(
       'labels'                 => $labels,
       'description'            => 'A learning object to be displayed on a lesson or story',
       'public'                 => true,
       'exclude_from_search'    => true,
       'show_ui'                => true,
       'show_in_menu'           => true,
       'menu_position'          => 29,
       'menu_icon'              => 'dashicons-welcome-learn-more',
       'capability_type'        => 'post',
       'rewrite'                => array( 'slug' => 'ed/learning'),
       'query_var'              => true,
       'has_archive'            => false,
       'supports'               => array('title','thumbnail','editor','excerpt','revisions'),
    ));
}

add_action('init', 'pbt_ed_learning_object_post_type');

/**
 * Learning Object Education Standard Taxonomy Registration
 */
function pbt_ed_learning_object_taxonomies() {
    $labels = array(
        'name'              => _x( 'Next Gen Standards', 'taxonomy general name' ),
        'singular_name'     => _x( 'Next Gen Standard', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Next Gen Standards' ),
        'all_items'         => __( 'All Next Gen Standards' ),
        'parent_item'       => __( 'Parent Next Gen Standard' ),
        'parent_item_colon' => __( 'Parent Next Gen Standard:' ),
        'edit_item'         => __( 'Edit Next Gen Standard' ),
        'update_item'       => __( 'Update Next Gen Standard' ),
        'add_new_item'      => __( 'Add New Next Gen Standard' ),
        'new_item_name'     => __( 'New Next Gen Standard' ),
        'menu_name'         => __( 'Next Gen Standards' ),
    );
    $args = array(
        'labels' => $labels,
        'rewrite'           => array( 'slug' => 'standard'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
    );
    register_taxonomy( 'next_gen_standard', 'learning_object', $args );

    $labels = array(
        'name'              => _x( 'State Standards', 'taxonomy general name' ),
        'singular_name'     => _x( 'State Standard', 'taxonomy singular name' ),
        'search_items'      => __( 'Search State Standards' ),
        'all_items'         => __( 'All State Standards' ),
        'parent_item'       => __( 'Parent State Standard' ),
        'parent_item_colon' => __( 'Parent State Standard:' ),
        'edit_item'         => __( 'Edit State Standard' ),
        'update_item'       => __( 'Update State Standard' ),
        'add_new_item'      => __( 'Add New State Standard' ),
        'new_item_name'     => __( 'New State Standard' ),
        'menu_name'         => __( 'State Standards' ),
    );
    $args = array(
        'labels' => $labels,
        'rewrite'           => array( 'slug' => 'standard'),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
    );
    register_taxonomy( 'state_standard', 'learning_object', $args );
}
add_action( 'init', 'pbt_ed_learning_object_taxonomies', 0 );

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