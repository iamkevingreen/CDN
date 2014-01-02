<header class="banner container" role="banner" style="background: <?php the_field('bottom_color'); ?>">
  <div class="row">
    <div class="col-lg-12">
      <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/CDN_logo.png" alt="Childrens Documentary Network" /></a>
      <nav class="nav-main" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</header>
