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
        'post_type' => array('videos', 'posts', 'placeholder-images', 'modals', 'page'),
        'numberposts'   => '-1',
        'post__in' => $the_array,
        'orderby' => 'post__in',
        'order' => 'DESC',
        //'post_status'     => 'publish',
    );
    $posts = get_posts($args);
    $html = '<div class="row-fluid">';
    foreach ($posts as $post) {
        $post_type = get_post_type($post->ID);
        $link_out = get_permalink($post->ID);
        $content = get_the_content($post->ID);
        $color = get_field('text_and_modal_color', $post->ID);
        $modal_type = get_field('modal_type', $post->ID);
        if($post_type == 'modals') {
            $html .= '
                <div class="span2 feed modal-block">
                  <a href="#' . $post->post_name . '" style="border-color: '.$color.'; color: '.$color.';">
                  <div class="modal-border">
                    <h4>'.$post->post_title . '</h4>
                    <div class="icon-arrow-right"></div>
                  </div></a>
                </div>
                <div id="'.$post->post_name.'" class="modal-window">
                    <div class="modal-container modal'.$post->ID.'" style="border-color: '.$color.'; color: '.$color.';">
                        <div class="modal-bits">
                            '.$post->post_content;
            if ($modal_type == 'contactform') {
                $html .= do_shortcode( '[contact-form-7 id="8" title="Contact form 1"]' ); 
            }
            $html .= '
                        </div>
                    </div>
                </div>

            ';
        } else if ($post_type == 'placeholder-images') {
            $placeholder = get_field('placeholder_graphic', $post->ID);
            $spansize = get_field('span_size', $post->ID);
            $html .= '
                <div class="' .$spansize. ' feed placeholder">
                    <img src="'. $placeholder . '" alt="" />
                </div>
            ';
        } else if ($post_type == 'videos') {
            $static_graphic = get_field('static_graphic', $post->ID);
            $hover_gif = get_field('hover_gif', $post->ID);
            $hover_note = get_field('hover_callout_graphic', $post->ID);
            $hover_position = get_field('hover_position', $post->ID);
            $callout = get_field('additional_callout_graphic', $post->ID);
            $coming_soon = get_field('coming_soon', $post->ID);
            $link_out = get_permalink($post->ID);
            if ($coming_soon == 'no') {
                $html .= '
                  <a href="' . $link_out . '">';
            }
            $html .= '
                <div class="span4 feed video-item">
                    <img class="hover_note '.$hover_position.'" src="'. $hover_note . '" alt="" />
                    <img class="hover" src="'. $hover_gif . '" alt="" />
                    <img class="callout" src="'. $callout . '" alt="" />
                    <img src="'. $static_graphic . '" alt="" />
                </div>
            ';
             if ($coming_soon == 'no') {
                $html .= '
                  </a>'
            }
        } else  {
            $static_graphic = get_field('static_graphic', $post->ID);
            $hover_gif = get_field('hover_graphic', $post->ID);
            $link_out = get_permalink($post->ID);
            $html .= '
                <a href="' . $link_out . '">
                <div class="span4 feed booger-item">
                    <img class="hover" src="'. $hover_gif . '" alt="" />
                    <img src="'. $static_graphic . '" alt="" />
                </div>
              </a>
            ';
        }
  
    }
    $html .= '</div>';
    return $html;
}

