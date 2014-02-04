<?php while (have_posts()) : the_post(); 
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
                          <div class="btn-block share"><span class="icon-share">Share</span></div>
                          <div class="btn-block">
                              <div class="fb-like" data-href="'. $post_url .'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                              ';
                              echo "<a href='https://twitter.com/share' class='twitter-share-button' data-via='watchcdn'>Tweet</a>
                                  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                          </div>
                      </div>
                   </div>
                   </li>";
              }
              echo '</ul>';
            } ?>
      </div>
      <div class="flex-controls"></div>
    </header>
      
  </article>
  <div id="video-share" class="modal-window">
    <div class="modal-container modal-share">
      <div class="modal-bits">
        <p><h1>Share</h1></p>
        <p>
          <a class="btn btn-default" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $post_title; ?>&url=<?php echo $post_url; ?>&via=watchcdn">Twitter</a>
          <a class="btn btn-default" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>">Facebook</a>
          <a class="btn btn-default" target="_blank" href="https://plus.google.com/share?url=<?php echo $post_url; ?>">Google+</a>
          <a class="btn btn-default" target="_blank" href="http://www.tumblr.com/share">tumblr.</a>
          <a class="btn btn-default" target="_blank" href="mailto:?subject=Watch CDN <?php echo $post_title; ?>&amp;body=Watch the <?php echo $post_title; ?> on Watch CDN. <?php echo $post_url; ?>">Email</a>
        </p>
      </div>
    </div>
  </div>

<?php endwhile; ?>

