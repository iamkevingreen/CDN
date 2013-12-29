<?php get_template_part('templates/content', 'single'); ?>


<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=1&post_type=page&page_id=4'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
  $post_title = get_the_title();

  $post_array = get_field('front_page_links');
  echo get_feed($post_array);
  endwhile; ?>


<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>