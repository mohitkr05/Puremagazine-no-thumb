
<?php function bizz_archives() { ?>

<?php global $post; ?>

<?php if (is_paged()) $is_paged = true; ?>

<div class="container_12 clearfix">

    <div class="grid_8 archive-spot">
							
		<?php if (is_category()) { ?>
	    <h2><span><?php echo get_option('bizzthemes_browsing_category'); ?> &raquo;<?php echo single_cat_title(); ?>&laquo;</span></h2>  

		<?php } elseif (is_day()) { ?>
		<h2><span><?php echo get_option('bizzthemes_browsing_day'); ?> &raquo;<?php the_time('F jS, Y'); ?>&laquo;</span></h2>

		<?php } elseif (is_month()) { ?>
		<h2><span><?php echo get_option('bizzthemes_browsing_month'); ?> &raquo;<?php the_time('F, Y'); ?>&laquo;</span></h2>

		<?php } elseif (is_year()) { ?>
		<h2><span><?php echo get_option('bizzthemes_browsing_year'); ?> &raquo;<?php the_time('Y'); ?>&laquo;</span></h2>
							
		<?php } elseif (is_tag()) { ?>
		<h2><span><?php echo get_option('bizzthemes_browsing_tag'); ?> &raquo;<?php echo single_tag_title('', true); ?>&laquo;</span></h2>
			
		<?php } ?>
													
	<?php if (have_posts()) : $count = 0; ?>

	<?php while (have_posts()) : the_post(); $postcount++;?>
                        		
		<div class="post clearfix">
								
			<h2><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
			<div class="clearfix meta">
				
			    <span class="date_bg"><?php the_time('F j, Y'); ?></span> &rarr;
						
				<?php if ( get_option( 'bizzthemes_commentcount' )) { ?> 
					
					<span class="feat-comment"><?php comments_popup_link(''.get_option('bizzthemes_comment_responsesa_name').'', ''.get_option('bizzthemes_comment_responsesb_name').'', ''.get_option('bizzthemes_comment_responsesc_name').''); ?></span>
						
			    <?php } ?>
				
		    </div><!-- /meta -->
				
			<?php if (( get_post_meta($post->ID,'image', true) ) && (get_option('bizzthemes_show_img_archives'))) { ?>
                
                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php echo get_option('bizzthemes_iauto_h'); ?>&amp;w=<?php echo get_option('bizzthemes_iauto_w'); ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>          	
                
		    <?php } ?>
																                
			<p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
				
        </div><!-- /post -->
					    
	<?php endwhile; ?>
					
	<?php endif; ?>
		
	    <div class="pagination">
			
            <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
						
        </div>
	
	</div><!-- /archive-spot -->

    <div class="grid_4 clearfix sidebar"><?php get_sidebar(); ?></div>
	
</div><!-- /featured-post -->

<?php } ?>