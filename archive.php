
<?php require_once(TEMPLATEPATH . '/library/includes/hooks.php'); ?>

<?php get_header(); ?>

<?php 

if ( get_option('bizzthemes_layout_order') == "0" ) {  /* LAYOUT ORDER: Header News Stream - Archives */
        
		  bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_archives(); 
	
}

if ( get_option('bizzthemes_layout_order') == "1" ) {  /* LAYOUT ORDER: Header - News Stream - Archives */
        
          bizz_header_navigation();
	if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_archives(); 
	
} 

if ( get_option('bizzthemes_layout_order') == "2" ) { /* LAYOUT ORDER: Header - News Stream - Archives */

          bizz_header_navigation();
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_archives();

}

if ( get_option('bizzthemes_layout_order') == "3" ) { /* LAYOUT ORDER: News Stream - Header - Archives */

          echo '<div style="margin:10px 0 0 0"><!----></div>';
    if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 
	      bizz_header_navigation();
	      bizz_archives();

}

if ( get_option('bizzthemes_layout_order') == "4" ) { /* LAYOUT ORDER: Header - Archives - News Stream */

          bizz_header_navigation();
          bizz_archives(); 
	if ( !get_option('bizzthemes_hide_stepcarousel_archives') ) { bizz_stepcarousel(); } 

} 

?>

<?php get_footer(); ?>
