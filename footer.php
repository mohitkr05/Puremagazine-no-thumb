	
<?php bizz_footer(); ?>

<?php wp_footer(); ?>
	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/library/js/suckerfish.js"></script>
	
<?php if ( get_option('bizzthemes_google_analytics') <> "" ) { echo stripslashes(get_option('bizzthemes_google_analytics')); } ?>

</body>

</html>
