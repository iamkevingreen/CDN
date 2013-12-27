<?php
/*
Template Name: Front-Page Template
*/
?>


<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>

bagel
<?php
 
/*
*  View array data (for debugging)
*/
the_field('front_page_links');
$post_array = get_field('front_page_links');
echo get_feed($post_array);
$posts = get_field('front_page_links');

if( $posts ): ?>
  <div class="row-fluid">
  <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php 
        setup_postdata($post); 
          $post_type = get_post_type(get_the_ID()); 
          switch($post_type) {
            case 'placeholder-images':
              echo 'placehold';
              ?> 
                      <img src="<?php the_field('placeholder_graphic'); ?>" alt="" />
              <?php
              break;
            case 'modals':
              ?>
                <div class="span2">
                  <a href="<?php the_permalink(); ?>"><div class="modal-border">
                    <h3><?php the_title() ?></h3>
                    <div class="icon-arrow-right"></div>
                  </div></a>
                </div>
              <?php
              break;
            case 'videos':
              ?>
              <div class="span4">
                  <div class="home-image">
                    <a href="<?php the_permalink(); ?>">
                      <img src="<?php the_field("static_graphic"); ?>" alt="" />
                      video
                    </a>
                  </div>
              </div>
              <?
              break;
          }
        ?>
        <?php the_field('placeholder_graphic'); ?>
  <?php endforeach; ?>
  </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>



<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
