
  <article <?php post_class(); ?>>

  		<div class="header">
  			<img src="<?php bloginfo('template_directory'); ?>/assets/img/boo-boo.png" alt="Boo Boos and Boogers" />
  		</div>
		<div id="content">
		    <?php
		$new_query = new WP_Query();
		$new_query->query('post_type=boogers&orderby=rand&showposts=1'.'&paged='.$paged);
		?>

		<?php while ($new_query->have_posts()) : $new_query->the_post(); ?>

		<div class="booger">
			<img src="<?php the_field('booger_image'); ?>" alt="<?php the_title(); ?>" />
			<h2>Rating: 
			<?php $rating = get_post_meta($post->ID, 'ratings_average', true); 
				if ($rating != ' ') {
					echo $rating;
				} else {
					echo '#???';
				}
			?> 
			</h2>
		</div>
		<div class="ranking">
			<h4>Rate this Booger!</h4>
			<p>Rate each photo to reveal its rank, and submit yours to become a legend of gross.</p>
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
		</div>

		<?php endwhile; ?>
		    <div id="pagination">
		    <?php next_posts_link('<div class="old icon-arrow-right"></div>', $new_query->max_num_pages) ?>
		    <?php previous_posts_link('<div class="new icon-arrow-left"></div>') ?>
		    </div>
		</div><!-- #content -->

</article>


<script>
jQuery(function($) {
    $('#content').on('click', '#pagination a', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        $('#content').fadeOut(100, function(){
            $(this).load(link + ' #content', function() {
                $(this).fadeIn(100);
            });
        });
    });
});
</script>