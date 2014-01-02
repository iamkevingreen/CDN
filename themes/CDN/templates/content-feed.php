<div id="feed" style="background: <?php the_field('bottom_color'); ?>">
  <div class="wrapper">
    <div class="about">
      <h4>About <?php the_title(); ?></h4>
      <?php the_content(); ?>  
    </div>
    <div class="other-ep">
        <h4>Other Episodes</h4>
        <div id="video-feed" class="flexslider">
          <?php 
            $post_title = get_the_title();
            $rows = get_field('episode');
            if($rows)
            {
              echo '<ul class="slides">';
             
              foreach($rows as $row)
              {
                echo '<li>
                  <div class="slide-img"><img src="' . $row['video_thumbnail'] . '" alt="" /></div>' 
                . '<h4 class="title">' . $post_title . ': ' . $row['episode_title'] .'</h4>' .
                '<div class="meta">' . $row['episode_meta'] . '</div></li>';
              }
             
              echo '</ul>';
            } ?>


        </div>
      </div>
    </div>
  </div>
</div>