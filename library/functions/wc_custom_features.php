<?php

//Custom Settings

$wc_metaboxes = array(
		"featured_video" => array (
			"name"		=> "featured_video",
			"default" 	=> "",
			"label" 	=> __("Featured  Video code"),
			"type" 		=> "text",
			"desc"      => __("Enter 1 code for youtube to be displayed on single page as featured video. eg. : youtube video code")
		),
		"video" => array (
			"name"		=> "video",
			"default" 	=> "",
			"label" 	=> __("Custom Video code"),
			"type" 		=> "text",
			"desc"      => __("Enter embaded code for video. eg. : youtube video code")
		),
		"address" => array (
			"name"		=> "address",
			"default" 	=> "",
			"label" 	=> __("Listing Address"),
			"type" 		=> "text",
			"desc"      => __("Enter listing place address. eg. : <b>230 Vine Street And locations throughout Old City,
Philadelphia, PA 19106</b>")
		),
		"geo_address" => array (
			"name"		=> "geo_address",
			"default" 	=> "",
			"label" 	=> __("Nearby Address"),
			"type" 		=> "text",
			"desc"      => __("Enter listing place address. eg. : <b>230 Vine Street And locations throughout Old City,
Philadelphia, PA 19106</b>")
		),
		"geo_latitude" => array (
			"name"		=> "geo_latitude",
			"default" 	=> "",
			"label" 	=> __("Latitude Form Map"),
			"type" 		=> "text",
			"desc"      => __("Enter Google Map Latitude. eg. : <b>39.955823048131286</b>")
		),
		"geo_longitude" => array (
			"name"		=> "geo_longitude",
			"default" 	=> "",
			"label" 	=> __("Longitude Form Map"),
			"type" 		=> "text",
			"desc"      => __("Enter Google Map Longitude. eg. : <b>-75.14408111572266</b>")
		),
	
		"contact" => array (
			"name"		=> "contact",
			"default" 	=> "",
			"label" 	=> __("Contact Information"),
			"type" 		=> "text",
			"desc"      => __("Enter Contact Information, Phone or mobile number. eg. : <b>(610) 388-1000</b>")
		),
		
		"email" => array (
			"name"		=> "email",
			"default" 	=> "",
			"label" 	=> __("Email Address"),
			"type" 		=> "text",
			"desc"      => __("Enter Address. eg. : <b>info@myplace.com</b>")
		),
		
		"website" => array (
			"name"		=> "website",
			"default" 	=> "",
			"label" 	=> __("Website"),
			"type" 		=> "text",
			"desc"      => __("Enter Website Address. eg. : <b>http://myplace.com</b>")
		),
		"booking" => array (
			"name"		=> "booking",
			"default" 	=> "",
			"label" 	=> __("Booking URL"),
			"type" 		=> "text",
			"desc"      => __("Enter the booking URL. eg. : <b>http://myplace.com</b>")
		)
		
		
		
	);
	


function wc_meta_box_content() {
    global $post, $wc_metaboxes;
    $output = '';
    $output .= '<div class="wc_metaboxes_table">'."\n";
    foreach ($wc_metaboxes as $wc_id => $wc_metabox) {
    if($wc_metabox['type'] == 'text' OR $wc_metabox['type'] == 'select' OR $wc_metabox['type'] == 'checkbox' OR $wc_metabox['type'] == 'textarea')
            $wc_metaboxvalue = get_post_meta($post->ID,$wc_metabox["name"],true);
            if ($wc_metaboxvalue == "" || !isset($wc_metaboxvalue)) {
                $wc_metaboxvalue = $wc_metabox['default'];
            }
            if($wc_metabox['type'] == 'text'){
            
                $output .= "\t".'<div>';
                $output .= "\t\t".'<br/><p><strong><label for="'.$wc_id.'">'.$wc_metabox['label'].'</label></strong></p>'."\n";
                $output .= "\t\t".'<p><input size="100" class="wc_input_text" type="'.$wc_metabox['type'].'" value="'.$wc_metaboxvalue.'" name="wc_'.$wc_metabox["name"].'" id="'.$wc_id.'"/></p>'."\n";
                $output .= "\t\t".'<p><span style="font-size:11px">'.$wc_metabox['desc'].'</span></p>'."\n";
                $output .= "\t".'</div>'."\n";
                              
            }
            
            elseif ($wc_metabox['type'] == 'textarea'){
            			
				$output .= "\t".'<div>';
                $output .= "\t\t".'<br/><p><strong><label for="'.$wc_id.'">'.$wc_metabox['label'].'</label></strong></p>'."\n";
                $output .= "\t\t".'<p><textarea rows="5" cols="98" class="wc_input_textarea" name="wc_'.$wc_metabox["name"].'" id="'.$wc_id.'">' . $wc_metaboxvalue . '</textarea></p>'."\n";
                $output .= "\t\t".'<p><span style="font-size:11px">'.$wc_metabox['desc'].'</span></p>'."\n";
                $output .= "\t".'</div>'."\n";
                              
            }

            elseif ($wc_metabox['type'] == 'select'){
                            
                $output .= "\t".'<div>';
                $output .= "\t\t".'<br/><p><strong><label for="'.$wc_id.'">'.$wc_metabox['label'].'</label></strong></p>'."\n";
                $output .= "\t\t".'<p><select class="wc_input_select" id="'.$wc_id.'" name="wc_'. $wc_metabox["name"] .'"></p>'."\n";
                $output .= '<option>Select a Upload</option>';
                
                $array = $wc_metabox['options'];
                
                if($array){
                    foreach ( $array as $id => $option ) {
                        $selected = '';
                        if($wc_metabox['default'] == $option){$selected = 'selected="selected"';} 
                        if($wc_metaboxvalue == $option){$selected = 'selected="selected"';}
                        $output .= '<option value="'. $option .'" '. $selected .'>' . $option .'</option>';
                    }
                }
                
                $output .= '</select><p><span style="font-size:11px">'.$wc_metabox['desc'].'</span></p>'."\n";
                $output .= "\t".'</div>'."\n";
            }
            
            elseif ($wc_metabox['type'] == 'checkbox'){
                if($wc_metaboxvalue == 'on') { $checked = 'checked="checked"';} else {$checked='';}
                
				$output .= "\t".'<div>';
                $output .= "\t\t".'<br/><p><strong><label for="'.$wc_id.'">'.$wc_metabox['label'].'</label></strong></p>'."\n";
                $output .= "\t\t".'<p><input type="checkbox" '.$checked.' class="wc_input_checkbox"  id="'.$wc_id.'" name="wc_'. $wc_metabox["name"] .'" /></p>'."\n";
                $output .= "\t\t".'<p><span style="font-size:11px">'.$wc_metabox['desc'].'</span></p>'."\n";
                $output .= "\t".'</div>'."\n";

            }
        
        }
    
    $output .= '</div>'."\n\n";
    echo $output;
}

function wc_metabox_insert() {
    global $wc_metaboxes;
    global $globals;
    $pID = $_POST['post_ID'];
    $counter = 0;

    
    foreach ($wc_metaboxes as $wc_metabox) { // On Save.. this gets looped in the header response and saves the values submitted
    if($wc_metabox['type'] == 'text' OR $wc_metabox['type'] == 'select' OR $wc_metabox['type'] == 'checkbox' OR $wc_metabox['type'] == 'textarea') // Normal Type Things...
        {
            $var = "wc_".$wc_metabox["name"];
            if (isset($_POST[$var])) {            
                if( get_post_meta( $pID, $wc_metabox["name"] ) == "" )
                    add_post_meta($pID, $wc_metabox["name"], $_POST[$var], true );
                elseif($_POST[$var] != get_post_meta($pID, $wc_metabox["name"], true))
                    update_post_meta($pID, $wc_metabox["name"], $_POST[$var]);
                elseif($_POST[$var] == "")
                    delete_post_meta($pID, $wc_metabox["name"], get_post_meta($pID, $wc_metabox["name"], true));
            }  
        } 
    }
}

function wc_header_inserts(){
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/library/functions/admin_style.css" media="screen" />';
}

function wc_meta_box() {
    if ( function_exists('add_meta_box') ) {
        add_meta_box('wc-settings',$GLOBALS['themename'].' Custom Settings','wc_meta_box_content','post','normal','high');
        add_meta_box('wc-settings',$GLOBALS['themename'].' Custom Settings','wc_meta_box_content','page','normal','high');
    }
}

add_action('admin_menu', 'wc_meta_box');
add_action('admin_head', 'wc_header_inserts');
add_action('save_post', 'wc_metabox_insert');


function ctaxonomy_init() {

$labels_region = array(
    'name' => _x( 'Regions', 'taxonomy general name' ),
    'singular_name' => _x( 'Region', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Regions' ),
    'all_items' => __( 'All Regions' ),
    'parent_item' => __( 'Parent Region' ),
    'parent_item_colon' => __( 'Parent Region:' ),
    'edit_item' => __( 'Edit Region' ),
    'update_item' => __( 'Update Region' ),
    'add_new_item' => __( 'Add New Region' ),
    'new_item_name' => __( 'New Region Name' ),
  ); 	
	// create a new taxonomy
	register_taxonomy('region','post',array(
    'hierarchical' => true,
    'labels' => $labels_region
  ));
  $labels_grading = array(
    'name' => _x( 'Grading', 'taxonomy general name' ),
    'singular_name' => _x( 'Grading', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Gradings' ),
    'all_items' => __( 'All Gradings' ),
    'parent_item' => __( 'Parent Grading' ),
    'parent_item_colon' => __( 'Parent Grading:' ),
    'edit_item' => __( 'Edit Grading' ),
    'update_item' => __( 'Update Grading' ),
    'add_new_item' => __( 'Add New Grading' ),
    'new_item_name' => __( 'New Grading Name' ),
  ); 
	
		register_taxonomy('grading','post',array(
    'hierarchical' => true,
    'labels' => $labels_grading
  ));
  
  
	// create a new taxonomy
	register_taxonomy(
		'features',
		'post',
		array(
			'label' => __( 'Features' ),
			'sort' => true,
			'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'feature' )
		)
	);
}
add_action( 'init', 'ctaxonomy_init' );


?>