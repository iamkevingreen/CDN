<?php
/**
 * Custom functions
 */


/* create custom post types */
function create_post_types() {
    // Videos
    register_post_type( 'videos',
        array(
            'labels' => array(
                'name' => __( 'Video' ),
                'singular_name' => __( 'Video' ),
                'add_new' => __( 'Add New Video' ),
                'add_new_item' => __( 'Add New Video' ),
                'edit_item' => __( 'Edit Video' ),
                'new_item' => __( 'Add New Video' ),
                'view_item' => __( 'View Video' ),
                'search_items' => __( 'Search Videos' ),
                'not_found' => __( 'No Videos found' ),
                'not_found_in_trash' => __( 'No Videos found in trash')
            ),
            'public' => true,
            'rewrite' => array('slug' => 'videos'),
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );

    // Boo Boo Boogers
    register_post_type( 'boogers',
        array(
            'labels' => array(
                'name' => __( 'Booger' ),
                'singular_name' => __( 'Booger' ),
                'add_new' => __( 'Add New Booger' ),
                'add_new_item' => __( 'Add New Booger' ),
                'edit_item' => __( 'Edit Booger' ),
                'new_item' => __( 'Add New Booger' ),
                'view_item' => __( 'View Booger' ),
                'search_items' => __( 'Search Boogers' ),
                'not_found' => __( 'No Boogers found' ),
                'not_found_in_trash' => __( 'No Boogers found in trash')
            ),
            'public' => true,
            'rewrite' => array('slug' => 'boogers'),
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
    
    // Modals
    register_post_type( 'modals',
        array(
            'labels' => array(
                'name' => __( 'Modal' ),
                'singular_name' => __( 'Modal' ),
                'add_new' => __( 'Add New Modal' ),
                'add_new_item' => __( 'Add New Modal' ),
                'edit_item' => __( 'Edit Modal' ),
                'new_item' => __( 'Add New Modal' ),
                'view_item' => __( 'View Modal' ),
                'search_items' => __( 'Search Modals' ),
                'not_found' => __( 'No Modals found' ),
                'not_found_in_trash' => __( 'No Modals found in trash')
            ),
            'public' => true,
            'rewrite' => array('slug' => 'boogers'),
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );


    // Placeholder Images
    register_post_type( 'placeholder-images',
        array(
            'labels' => array(
                'name' => __( 'Placeholder Graphic' ),
                'singular_name' => __( 'Placeholder Graphic' ),
                'add_new' => __( 'Add New Placeholder Graphic' ),
                'add_new_item' => __( 'Add New Placeholder Graphic' ),
                'edit_item' => __( 'Edit Placeholder Graphic' ),
                'new_item' => __( 'Add New Placeholder Graphic' ),
                'view_item' => __( 'View Placeholder Graphic' ),
                'search_items' => __( 'Search Placeholder Graphics' ),
                'not_found' => __( 'No Placeholder Graphics found' ),
                'not_found_in_trash' => __( 'No Placeholder Graphics found in trash')
            ),
            'public' => true,
            'rewrite' => array('slug' => 'placeholder-images'),
            'publicly_queryable' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );
}

add_action('init', 'create_post_types');

function get_feed($post_a){
    $the_array = $post_a;
    $args = array(
        'post_type' => array('videos', 'posts', 'placeholder-images', 'modals', 'pages'),
        'numberposts'   => '-1',
        'post__in' => $the_array,
        'orderby' => 'post__in',
        'order' => 'DESC',
        //'post_status'     => 'publish',
    );
    $posts = get_posts($args);
    foreach ($posts as $post) {
        $post_type = get_post_type($post->ID);
          
        $post_test = get_field('placeholder_graphic', $post->ID);
        $html .= '
            <li class="'.$post->ID.'"><h4>'.$post->post_title . $post_test . '</h4></li>
        ';
    }
    return $html;
}

