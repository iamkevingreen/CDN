
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

			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			<img class="rateimg" src="<?php the_field('booger_image'); ?>" alt="<?php the_title(); ?>" />
			
			<div class="dino">
				<h4>Got what it takes?<br /><a href="mailto:address@gmail.com">Submit Yours!</a></h4>
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/dino.png" alt="submit yours">
			</div>
		</div>
		<div class="ranking">
			<h4>Rate this Booger!</h4>
			<p>Rate each photo to reveal its rank, and submit yours to become a legend of gross.</p>
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

		<?php endwhile; ?>
		    <div id="pagination">
		    <div class="next"><?php next_posts_link('<div class="old icon-arrow-right"></div>', $new_query->max_num_pages) ?></div>
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
    /*
    $('#content').on('click', '.post-ratings', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        $('#content').fadeOut(100, function(){
            $(this).load(link + ' #content', function() {
                $(this).fadeIn(100);
            });
        });
    });
*/
});

</script>