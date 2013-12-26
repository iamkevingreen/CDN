<div id="feed">
  <div class="wrapper">
    <div class="about">
      <h4>About the Terribles</h4>
      <p>This is an interactive documentary series, presented by a cast of journalist puppets. In each episode the puppets are sent on assignment to an exotic location where they get into all sorts of trouble while investigating their story. Their assignments cover a wide range of topics, including current environmental issues and unique cultural celebrations.</p>
    </div>
    <div class="other-ep">
        <h4>Other Episodes</h4>
        <div class="other-ep-slides">
          <div class="slide"><img src="http://placehold.it/350x150&text=FooBar1"></div>
          <div class="slide"><img src="http://placehold.it/350x150&text=FooBar2"></div>
          <div class="slide"><img src="http://placehold.it/350x150&text=FooBar3"></div>
          <div class="slide"><img src="http://placehold.it/350x150&text=FooBar4"></div>
        </div>

        <?php 
        $postid = get_the_ID();
        echo get_video_feed($postid); ?>
  </div>
</div>