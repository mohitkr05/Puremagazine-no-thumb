
<?php function bizz_featured_panel() { ?>

<div class="container_12">

<div class="featured-panel clearfix">

	<div class="grid_8 featured-post">
	
	    <h3><?php echo get_option('bizzthemes_feat_name'); ?></h3>
		
		<?php 
	            global $wpdb, $post;
				
				$catname = get_option('bizzthemes_feat_cat');
		  
		        $catid = $wpdb->get_row("SELECT * FROM $wpdb->terms WHERE name = '$catname'");
		        $cat_id = $catid->term_id;
		  		  
		        query_posts('cat=' .$cat_id.'&showposts=1');

        ?>
		
		<?php if (have_posts()) : $count = 0; ?>

	    <?php while (have_posts()) : the_post(); $postcountfeat++; ?>
		
		  <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'featured_thumb' ); ?></a>
		
		<div class="feat-right">
		
		    <div class="feat-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
		
		    <div class="feat-meta">
		
		        <span class="feat-date"><?php the_time('F j, Y'); ?></span> &nbsp;-&nbsp;
				
				<?php if ( get_option( 'bizzthemes_commentcount' )) { ?> 
					
					<span class="feat-comment"><?php comments_popup_link(''.get_option('bizzthemes_comment_responsesa_name').'', ''.get_option('bizzthemes_comment_responsesb_name').'', ''.get_option('bizzthemes_comment_responsesc_name').''); ?></span>
						
			    <?php } ?>
								
		    </div>
					
		    <div class="feat-content"><?php echo bm_better_excerpt(get_option( 'bizzthemes_excerpted_length' ), ' [...] '); ?></div>
			
			<?php if ( !get_option( 'bizzthemes_hide_related' )) { ?> 
					
				<div class="feat-related"><?php echo bizz_get_related($post); ?></div>
						
			<?php } ?>
	
	    </div>
		
		<?php endwhile; endif; ?>
		
		<?php wp_reset_query(); ?>
		
	</div><!-- /featured-post -->
   
	<div class="grid_4 top-stories">
	
	<?php
	
        $sticky=get_option('sticky_posts');
		$args=array(
        'post__in' => $sticky,
		'showposts'=>get_option('bizzthemes_tstories_number'),
		'caller_get_posts' => '1',
        );

		query_posts($args);
    ?>
	
	    <h3><?php echo get_option('bizzthemes_tstories_name'); ?></h3>		
		
		<div class="ts-content clearfix">
		
		<?php if (have_posts()) : $count = 0; ?>

	    <?php while (have_posts()) : the_post(); $postcountfeat++; ?>
		
		    <div class="ts-cat">
			<?php $category = get_the_category(); ?>
			<a title="<?php echo $category[0]->cat_name; ?>" href="<?php echo get_category_link( $category[0]->cat_ID ); ?>"><?php echo $category[0]->cat_name; ?> &raquo;</a>
			</div>
			<div class="ts-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
		
		<?php endwhile; endif; ?>
		
		    <div class="ts-more">
							
				<?php if ( get_option('bizzthemes_tstories_link1_name') <> "&nbsp;" ) { ?><a href="<?php echo get_option('bizzthemes_tstories_link1_url'); ?>"><?php echo get_option('bizzthemes_tstories_link1_name'); ?></a> | <?php } ?>
			    <?php if ( get_option('bizzthemes_tstories_link2_name') <> "&nbsp;" ) { ?><a href="<?php echo get_option('bizzthemes_tstories_link2_url'); ?>"><?php echo get_option('bizzthemes_tstories_link2_name'); ?></a> | <?php } ?>
			    <?php if ( get_option('bizzthemes_tstories_link3_name') <> "&nbsp;" ) { ?><a href="<?php echo get_option('bizzthemes_tstories_link3_url'); ?>"><?php echo get_option('bizzthemes_tstories_link3_name'); ?></a><?php } ?>
			
			</div>
		
		</div>
		
	<?php wp_reset_query(); ?>
	
	</div><!-- /top-stories -->
	
</div><!-- /featured-panel -->

</div><!-- /container_12 -->

<?php } ?>
