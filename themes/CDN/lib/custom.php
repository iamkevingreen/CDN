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

function get_video_feed($exclude){
    $exclude_ids = array($exclude);
    $args = array(
        'post_type' => array('videos'),
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'post__not_in' => $exclude_ids,
        'posts_per_page' => 50
    );
    $posts = get_posts($args);
    $html = '<ul class="industry-solutions">';
    foreach ($posts as $post) {
        $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $img = !empty($img) ? sprintf('<img src="%s" alt="%s" />', $img, $post->post_title) : '';
        $html .= sprintf('<li><a class="noborder" href="%s">%s</a></li>', get_permalink($post->ID), $img.$post->post_title);
    }
    $html .= '</ul>';
    return $html;
}


