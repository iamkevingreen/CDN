<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <ul>
      	<li class="about" data-hash="learn-all-about-us">About<br />Contact</li>
      	<li class="signup" data-hash="sign-up-to-receive-rad-updates">Sign Up<br />To recieve the<br />Latest Updates!</li>
      	<li class="feedback" data-hash="tell-us-what-you-think">Tell Us<br />What you Think!</li>
      </ul>
      <div class="foot-wrap">
        <p class="floatleft upper">&copy; <?php echo date('Y'); ?> Children&#39;s Documentary Network</p>
        <p class="floatright">Site by <a href="http://ryuisland.com" target="_blank">RYU ISLAND</a></p>
      </div>
    </div>
  </div>
</footer>


<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=1&post_type=page&page_id=4'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
  $post_title = get_the_title();

  $post_array = get_field('front_page_links');
  echo page_cache($post_array);
  endwhile; ?>


<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_footer(); ?>
