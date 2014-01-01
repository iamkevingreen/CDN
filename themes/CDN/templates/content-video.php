<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=1&post_type=videos'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
  $post_title = get_the_title();
  $post_url = get_permalink();
?>

  <article <?php post_class(); ?>>
    <header>

      <div id="episodes" class="flexslider episodes">
          <?php 
 
            $rows = get_field('episode');
            if($rows)
            {
              echo '<ul class="slides">';
             
              foreach($rows as $row)
              {
                echo '<li>
                  <div class="video"><iframe src="//player.vimeo.com/video/' . $row['vimeo_id'] . '?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' 
                . '<h1 class="title">' . $post_title . ': ' . $row['episode_title'] .'</h1>' .
                  '<div class="date">' . $row['episode_meta'] . ', released ' . $row['release_date'] . '</div>
                   <div class="info-block">
                      <div class="info">
                          ' . $row['episode_description'] . '
                      </div>
                      <div class="social">
                          <div class="btn-block"><span class="icon-share">Share</span></div>
                          <div class="btn-block">
                              <div class="fb-like" data-href="'. $post_url .'" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>

                          </div>
                      </div>
                   </div>
                   </li>';
              }
             
              echo '</ul>';
            } ?>

    </header>
      
  </article>

<?php endwhile; ?>


<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>