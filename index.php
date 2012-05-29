
<?php require_once(TEMPLATEPATH . '/library/includes/hooks.php'); ?>

<?php get_header(); ?>

<?php 

if ( get_option('bizzthemes_layout_order') == "0" ) {  /* LAYOUT ORDER: Header - Featured Post - News Stream - Front Widgets */
        
	      bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_featpanel') ) { bizz_featured_panel();} 
	if ( !get_option('bizzthemes_hide_stepcarousel') ) { bizz_stepcarousel(); } 
	if ( !get_option('bizzthemes_hide_fwidgets') ) { bizz_front_widgets(); } 
	
}

if ( get_option('bizzthemes_layout_order') == "1" ) {  /* LAYOUT ORDER: Featured Post - Header - News Stream - Front Widgets */
	
	      echo '<div style="margin:10px 0 0 0"><!----></div>';
    if ( !get_option('bizzthemes_hide_featpanel') ) { bizz_featured_panel();} 
	      bizz_header_navigation();
	if ( !get_option('bizzthemes_hide_stepcarousel') ) { bizz_stepcarousel(); } 
	if ( !get_option('bizzthemes_hide_fwidgets') ) { bizz_front_widgets(); }
	
} 

if ( get_option('bizzthemes_layout_order') == "2" ) { /* LAYOUT ORDER: Header - News Stream - Featured Post - Front Widgets */
	
	      bizz_header_navigation();
	if ( !get_option('bizzthemes_hide_stepcarousel') ) { bizz_stepcarousel(); } 
    if ( !get_option('bizzthemes_hide_featpanel') ) { bizz_featured_panel();} 
	if ( !get_option('bizzthemes_hide_fwidgets') ) { bizz_front_widgets(); } 

}

if ( get_option('bizzthemes_layout_order') == "3" ) { /* LAYOUT ORDER: News Stream - Header - Featured Post - Front Widgets */
	
	      echo '<div style="margin:10px 0 0 0"><!----></div>';
	if ( !get_option('bizzthemes_hide_stepcarousel') ) { bizz_stepcarousel(); }
	      bizz_header_navigation(); 
    if ( !get_option('bizzthemes_hide_featpanel') ) { bizz_featured_panel();} 
	if ( !get_option('bizzthemes_hide_fwidgets') ) { bizz_front_widgets(); } 

}

if ( get_option('bizzthemes_layout_order') == "4" ) { /* LAYOUT ORDER: Header - Featured Post - Front Widgets - News Stream */
	
	      bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_featpanel') ) { bizz_featured_panel();} 
	if ( !get_option('bizzthemes_hide_fwidgets') ) { bizz_front_widgets(); } 
	if ( !get_option('bizzthemes_hide_stepcarousel') ) { bizz_stepcarousel(); } 

} 

?>

<?php get_footer(); ?>
