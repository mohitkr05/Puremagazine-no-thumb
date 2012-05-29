
<?php function bizz_stepcarousel() { ?>

<div class="container_12 clearfix">

<?php
        
		global $post;
		
        $sticky=get_option('sticky_posts');
		$args=array(
        'post__not_in' => $sticky,
		'cat'=>'-9999999' . get_exc_categories("cat_exclude2_") .'',
		'showposts'=>''.get_option('bizzthemes_stream_number').'',
        'caller_get_posts' => '1',
        );

		query_posts($args);
?>


<div class="featslider clearfix">

    <div class="grid_12">
	
	    <h3><?php echo get_option('bizzthemes_stream_name'); ?></h3>

        <ul id="galleryNav">
					
		    <li id="left"><a href="javascript:stepcarousel.stepBy('mygallery', -1)"><span>left</span></a></li>
				
		    <li id="right"><a href="javascript:stepcarousel.stepBy('mygallery', 1)"><span>right</span></a></li>
					
	    </ul><!--/gallery-nav-->
		
	</div><!-- /grid_12 -->
	                
	<div class="grid_12 stepcarousel" id="mygallery">

			<div class="belt">
        
                <?php if (have_posts()) : $count = 0; ?>

	            <?php while (have_posts()) : the_post(); $postcountfeat++; ?>	        					
        
                	<div class="panel">
                    
                        <div class="slider-post">
						
						    <?php $category = get_the_category(); ?>
							
						    <div class="slider-cat"><a title="<?php echo $category[0]->cat_name; ?>" href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?> &raquo;</a></div>
							
                            
								
								<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>
                        
                          
							
							<div class="slider-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
                        
                        </div><!--/post -->
                                                
                        <div class="fix"><!----></div>

					</div><!--/panel -->
                    
				<?php endwhile; endif; ?>
                    					
			</div><!-- /belt -->
               		
    </div><!-- /grid_12 -->
	
</div><!-- /featslider -->

<?php wp_reset_query(); ?>

</div><!-- /container_12 -->

<?php } ?>