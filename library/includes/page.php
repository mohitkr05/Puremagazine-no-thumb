
<?php function bizz_page() { ?>

<?php global $post; ?>

<div class="container_12 clearfix">

    <div class="grid_8 clearfix archive-spot">
													
	<?php if (have_posts()) : $count = 0; ?>

	<?php while (have_posts()) : the_post(); $postcount++;?>
                        		
		<div class="single clearfix">
								
			<h2 class="title"><?php the_title(); ?></h2>
																                
			<?php the_content(); ?>
				
        </div><!-- /post -->
					    
	<?php endwhile; ?>
					
	<?php endif; ?>
	
	</div><!-- /archive-spot -->

    <div class="grid_4 clearfix sidebar"><?php get_sidebar(); ?></div>
	
</div><!-- /featured-post -->

<?php } ?>