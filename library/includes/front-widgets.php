
<?php function bizz_front_widgets() { ?>

<div class="container_12 clearfix">

<div class="clearfix">

<?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(2)) ) : ?>

	<div class="widgetized"><?php dynamic_sidebar(2); ?></div>
			
<?php endif; ?>

<?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(3)) ) : ?>

	<div class="widgetized"><?php dynamic_sidebar(3); ?></div>
			
<?php endif; ?>

<?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(4)) ) : ?>

	<div class="widgetized wlast"><?php dynamic_sidebar(4); ?></div>
			
<?php endif; ?>

</div><!-- /clearfix -->
	
</div><!-- /container_12 -->

<?php } ?>