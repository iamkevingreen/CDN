
  <article <?php post_class(); ?>>
		<div id="content">
		    <?php
		$new_query = new WP_Query();
		$new_query->query('post_type=boogers&orderby=rand&showposts=1'.'&paged='.$paged);
		?>

		<?php while ($new_query->have_posts()) : $new_query->the_post(); ?>

		<?php the_title(); ?>
		<div class="booger">
			<img src="<?php the_field('booger_image'); ?>" alt="<?php the_title(); ?>" />
		</div>
		<?php if(function_exists('the_ratings')) { the_ratings(); } ?>

		<?php endwhile; ?>
		    <div id="pagination">
		    <?php next_posts_link('&laquo; Older Entries', $new_query->max_num_pages) ?>
		    <?php previous_posts_link('Newer Entries &raquo;') ?>
		    </div>
		</div><!-- #content -->
</article>


<script>
jQuery(function($) {
    $('#content').on('click', '#pagination a', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        $('#content').fadeOut(500, function(){
            $(this).load(link + ' #content', function() {
                $(this).fadeIn(500);
            });
        });
    });
});
</script>