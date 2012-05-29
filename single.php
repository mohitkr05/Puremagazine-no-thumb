
<?php require_once(TEMPLATEPATH . '/library/includes/hooks.php'); ?>

<?php get_header(); ?>

<?php 

if ( get_option('bizzthemes_layout_order') == "0" ) {  /* LAYOUT ORDER: Header News Stream - single */
        
		  bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_single(); 
	
}

if ( get_option('bizzthemes_layout_order') == "1" ) {  /* LAYOUT ORDER: Header - News Stream - single */
        
          bizz_header_navigation();
	if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_single(); 
	
} 

if ( get_option('bizzthemes_layout_order') == "2" ) { /* LAYOUT ORDER: Header - News Stream - single */

          bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_single();

}

if ( get_option('bizzthemes_layout_order') == "3" ) { /* LAYOUT ORDER: News Stream - Header - single */

          echo '<div style="margin:10px 0 0 0"><!----></div>';
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_header_navigation();
	      bizz_single();

}

if ( get_option('bizzthemes_layout_order') == "4" ) { /* LAYOUT ORDER: Header - single - News Stream */

          bizz_header_navigation();
          bizz_single(); 
	if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 

} 

?>

<?php get_footer(); ?>
