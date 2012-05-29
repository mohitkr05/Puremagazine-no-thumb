
<?php function bizz_single() { ?>

<?php global $post; ?>

<?php if (is_paged()) $is_paged = true; ?>

<div class="container_12 clearfix">

    <div class="grid_8 clearfix archive-spot">
													
	<?php if (have_posts()) : $count = 0; ?>

	<?php while (have_posts()) : the_post(); $postcount++;?>
                        		
		<div class="single clearfix">
								
			<h2 class="title"><?php the_title(); ?></h2>
			
			<div class="clearfix meta">
				
			    <span class="date_bg"><?php the_time('F j, Y'); ?></span>
				
				@ <?php the_author_posts_link(); ?> &rarr;
						
				<?php if ( comments_open() ) {  ?> 
					
					<span class="feat-comment"><a href="#comments"><?php comments_number(''.get_option('bizzthemes_comment_responsesa_name').'', ''.get_option('bizzthemes_comment_responsesb_name').'', ''.get_option('bizzthemes_comment_responsesc_name').'', 'Comments-link', ''.get_option('bizzthemes_comment_off_name').''); ?></a></span>
						
			    <?php } ?>
				
		    </div><!-- /meta -->
			
			<?php if (( get_post_meta($post->ID,'image', true) ) && (get_option('bizzthemes_show_img_single'))) { ?>
                
                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>          	
                
		    <?php } ?>
																                
			<?php the_content(); ?>
				
        </div><!-- /post -->
					    
	<?php endwhile; ?>
					
	<?php endif; ?>
	
	    <div id="comments">
				
		    <?php comments_template(); ?>
					
		</div>
	
	</div><!-- /archive-spot -->

    <div class="grid_4 clearfix sidebar"><?php get_sidebar(); ?></div>
	
</div><!-- /featured-post -->

<?php } ?>