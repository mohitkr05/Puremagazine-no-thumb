
<?php function bizz_footer() { ?>
	
<div class="container_16 footer clearfix">

	<!-- Footer: START -->
		
	<div class="grid_16" id="footer">
			
		<div class="copyright">

			<div class="fl">
			
			    <div class="searchform">

                    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>">

                    <input type="text" value="<?php echo get_option('bizzthemes_search_name'); ?>" name="s" id="s" class="s" onfocus="if (this.value == '<?php echo get_option('bizzthemes_search_name'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo get_option('bizzthemes_search_name'); ?>';}" />

                    <input type="image" class="button" src="<?php bloginfo('template_url'); ?>/images/i-search-trans.png" alt="Submit button" />

                    </form>

                </div>
			
			</div><!-- /fl -->
				
			<div class="fr"><a href="http://bizzartic.com/bizzthemes/puremagazine/">Pure Magazine</a> &rarr; <a href="http://bizzartic.com"><span></span></a></div>
				
        </div><!-- /copyright -->
								
	</div><!-- /grid_16 -->
		
	<!-- Footer: END -->
	
</div><!-- /container_16 -->

<div class="container_16 clearfix credentials">
		
	<div class="grid_16">

			<div class="fl">&copy; <?php echo date("Y") ?> <?php bloginfo(); ?>.</div><!-- /fl -->
				
			<div class="fr">
			
			<?php if ( get_option('bizzthemes_footpages') <> "" ) { ?>
			
			    <ul>
			
			    <?php wp_list_pages('title_li=&depth=0&include=' . get_option('bizzthemes_footpages') .'&sort_column=menu_order'); ?>
				
				
				</ul>
			
		    <?php } ?>
						
			</div>
								
	</div><!-- /grid_16 -->
	
</div><!-- /container_16 -->

<?php } ?>


