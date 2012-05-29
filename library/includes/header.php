
<?php function bizz_header_navigation() { ?>

<div class="top-menu-bgr clearfix">

    <div class="container_16">

	<div class="top_menu grid_16">
	
	    <div class="fl">
	
            <ul id="pagenav" class="page-menu">
			
			    <li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?>&nbsp; &rsaquo;</a></li>
								
				<?php wp_list_pages('title_li=&depth=0&exclude=' . get_inc_pages("pag_exclude_") .'&sort_column=menu_order'); ?>
											        
		    </ul> 
	   
	    </div>
														
		<div class="feed-spot">
			
			<?php if ( $user_ID ) { ?>
			
			    <a href="<?php echo get_option('home'); ?>/wp-admin/"><?php $user = wp_get_current_user(); $link = ''.$user->user_email.''; echo apply_filters('loginout', $link); ?></a>&nbsp;&nbsp;-&nbsp;&nbsp;<?php wp_loginout(); ?>
			
			<?php } else { ?>
			
			    <?php wp_loginout(); ?>
			
			<?php } ?>&nbsp;
					
			<?php if ( get_option('bizzthemes_feedburner_url') <> "" ) { ?> 
			
			    <a href="<?php echo get_option('bizzthemes_feedburner_url'); ?>"><span class="rss-button"></span></a>
					
					&nbsp;&rarr; <a href="<?php echo get_option('bizzthemes_feedburner_url'); ?>"><?php echo get_option('bizzthemes_subscribe_name'); ?></a>
			
			<?php } else { ?>
			
			    <a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><span class="rss-button"></span></a>
					
				&nbsp;&rarr; <a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"><?php echo get_option('bizzthemes_subscribe_name'); ?></a>
				 
			<?php } ?>

		</div><!--/feed-spot-->
							
	</div><!--/top_menu-->
	
	</div><!--/container_16-->
		
</div><!--/top-menu-bgr-->
	
<div class="header-bgr clearfix">

    <div class="container_16">
	
	<div id="header">
	
	    <div class="grid_7" id="logo-spot">
    			
		    <?php if ( get_option('bizzthemes_show_blog_title') ) { ?>
			
			    <div class="blog-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
			
		        <div class="blog-description"><?php bloginfo('description'); ?></div>
			
		    <?php } else { ?>
				
                <h1 class="logo">
			
			        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
			
			            <img src="<?php if ( get_option('bizzthemes_logo_url') <> "" ) { echo get_option('bizzthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo-trans.png'; } ?>" alt="<?php bloginfo('name'); ?>" />
				    
					</a>
				
			    </h1><!--/logo-->

	        <?php } ?>

		</div><!--/logo-spot-->
		
		<div class="grid_9 ad-468">
				
			<?php include(TEMPLATEPATH . '/library/includes/ad-468x60.php'); ?>
				
		</div><!--/search-spot-->
		
		<div class="fix"><!----></div>
        
	</div><!--/header -->

    </div><!--/container_16-->
		
</div><!--/header-bgr-->
					
<div class="top-cat-bgr clearfix">

    <div class="container_16" id="cat-menu">
		
		<ul id="catnav" class="grid_16">
					
			<li <?php if(is_front_page()): ?>class="current-cat"<?php endif; ?>><a href="<?php bloginfo('url'); ?>"><?php echo get_option('bizzthemes_home_name'); ?></a></li>
					
			<?php wp_list_categories('title_li=&exclude=9999999' . get_inc_categories("cat_exclude_") .''); ?>
                    
		</ul><!--/catnav -->
		                
    </div><!--/cat-menu -->
		
</div><!--/top-cat-bgr-->

<?php if (get_option('bizzthemes_adsense_header') <> "") { ?>

<div class="container_16 clearfix adsense-box">

    <!-- AdSense Archive: START -->
							
		<div class="adsense-inline">
		
		    <?php echo stripslashes(get_option('bizzthemes_adsense_header')); ?>
		
		</div>
		
    <!-- AdSense Archive: END -->
		
</div><!-- /adsense -->

<?php } ?>	

<?php } ?>