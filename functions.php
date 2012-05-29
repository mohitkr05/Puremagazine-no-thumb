<?php 

/*************************************************************
* Do not modify unless you know what you're doing, SERIOUSLY!
*************************************************************/

/* Admin framework version 3.0 by Zeljan Topic */


//** DIRECTORY CONSTANTS **//

    $functions_path = TEMPLATEPATH . '/library/functions/';
    $includes_path = TEMPLATEPATH . '/library/includes/';
    $javascript_path = TEMPLATEPATH . '/library/js/';
    $css_path = TEMPLATEPATH . '/library/css/';
		
//** THEME VARIABLES **//

    $themename = "Pure Magazine";
    $shortname = "bizzthemes";
    $customserviceurl = "http://bizzartic.com/services/";
    $customcssurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/theme-editor.php?file=/themes/puremagazine/custom.css&theme=Pure+Magazine";
    $breadcrumbsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/options-general.php?page=yoast-breadcrumbs.php";
    $generaloptionsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/options-general.php";
    $widgetsurl = "".trailingslashit( get_bloginfo('url') )."wp-admin/widgets.php";
    $bloghomeurl = "".trailingslashit( get_bloginfo('url') )."";

//** ADMINISTRATION FILES **//

    require_once ($functions_path . 'admin_functions.php'); // Theme admin functions
    require_once ($functions_path . 'admin_options.php'); // Theme admin options
    require_once ($functions_path . 'admin_settings.php'); // Theme admin Settings

   
//** FRONT-END FILES **//

    require_once ($functions_path . 'widgets_functions.php'); // Widgets
    require_once ($functions_path . 'custom_functions.php'); // Custom
    require_once ($functions_path . 'wc_custom_features.php'); // Comments
    require_once ($functions_path . 'comments_functions.php'); // Comments
    //require_once ($functions_path . 'yoast-breadcrumbs.php'); // Yoast's plugins
    //require_once ($functions_path . 'yoast-posts.php'); //Yoast's plugins
	require_once ($functions_path . 'yoast-canonical.php'); //Yoast's plugins
	require_once ($functions_path . 'recaptchalib.php'); //Recaptcha
	require_once ($functions_path . 'Akismet.class.php'); //Akismet
	
	
if (function_exists( 'add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	
	if ( function_exists('add_image_size')) {
		add_image_size( 'full-size',  9999, 9999, false );
		add_image_size( 'slider',  700, 9999, false );
		add_image_size( 'featured_thumb',  400, 320, true );
		add_image_size( 'small-thumb',  50, 50, true );
		add_image_size( 'thumb',  230, 180, true );
		add_image_size( 'grid-thumb',  230, 180, true );
		add_image_size( 'grid-region-thumb',  154, 100, true );
		add_image_size( 'grid-hotel-thumb',  300, 200, true );
	}
}

?>
