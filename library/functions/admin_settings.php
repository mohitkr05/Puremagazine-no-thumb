<?php

function mytheme_add_admin() {

    global $kampylefeedback, $themename, $shortname, $options, $bloghomeurl;
	
	if ( $_GET['page'] == 'functions.php' ||
         $_GET['page'] == 'woothemes_uploader')
    {
    
        if ( 'save' == $_REQUEST['action'] ) {
					
				foreach ($options as $value) {
                
                    if($current_page === $live_page){
                                         
                        if ( is_array($value['type'])) {
						
                            foreach($value['type'] as $meta => $type){
							
                                if($type == 'text'){
								
                                update_option( $meta, $_REQUEST[ $meta ]);
								
                                }
                            }                 
                        }
						
                        elseif($value['type'] != 'multicheck'){
						
                             if(isset( $_REQUEST[ $value['id'] ])){update_option( $value['id'], $_REQUEST[ $value['id'] ] );} else { delete_option( $value['id'] ); }
                               
                        } else {
						
                            foreach($value['options'] as $mc_key => $mc_value){
							
                                $up_opt = $value['id'].'_'.$mc_key;
								
                                update_option($up_opt, $_REQUEST[$up_opt] );
								
                            }
                        }
                     }
                }
				
				// PHP File Upload 
				// Code provided from PHP forum (http://us3.php.net/manual/en/features.file-upload.php)
				// Code snippets borrowed from GPL theme framework from WooThemes (http://www.woothemes.com/)
                
                foreach($options as $key => $value) {

                    $uploaddir = ABSPATH . '/wp-content/bizz_uploads/' ;
                    $loc = get_bloginfo('url'). '/wp-content/bizz_uploads/';
                    if(!is_dir($uploaddir)){
                        $make = @mkdir($uploaddir,0777);
                    }
                
                    $dir = @opendir($uploaddir);
                    if ($dir == false && $make == false){
					    $uploaddir = ABSPATH . "/wp-content/uploads/" ;
					    $loc = get_bloginfo('url').'/wp-content/uploads/';
                    }
                
                    $files = array();
    
                    if($value['type'] == 'upload' ){
					
                        $id = $value['id'];

                        if(isset($_FILES['attachment_'.$id]) && !empty($_FILES['attachment_'.$id]['name'])) 
                        
						{
						
                            if(!eregi('image/', $_FILES['attachment_'.$id]['type'])) {
                                
								echo 'The uploaded file is not an image please upload a valide file. Please go <a href="javascript:history.go(-1)">go back</a> and try again.';
                      
					        } else {
                        
						        while($file = readdir($dir)) { array_push($files,$file); } closedir($dir);
                        
                                $name = $_FILES['attachment_'.$id]['name'];
						        $file_name = substr($name,0,strpos($name,'.'));
						        $file_name = str_replace(' ','_',$file_name);
									
                         
                                $_FILES['attachment_'.$id]['name'] = $loc . ceil(count($files) + 1).'-'. $file_name .''.strrchr($name, '.');
						        $uploadfile = $uploaddir . basename($_FILES['attachment_'.$id]['name']);                    
                    
                                if(move_uploaded_file($_FILES['attachment_'.$id]['tmp_name'], $uploadfile)) {
									
                                    update_option($id,$_FILES['attachment_'.$id]['name']);
                                    $new_file = $_FILES['attachment_'.$id]['name'];
								    $old_files = get_option('bizz_uploads');
                                 
 								        if($old_files){
                                    
									        if(!is_array($old_files)) {
                                      
									            $all_files = array(get_option('bizz_uploads'));
                                            
											} else {
                                      
									            $all_files = $old_files;
                                      
									        }
												
                                            array_unshift($all_files,$new_file);
                                  
								        } else {
                                  
								            $all_files = $new_file;
                                  
								        }
											
                                        update_option('bizz_uploads',$all_files);
                                }
                            }
                        }
                    }
                }

                $send = $_GET['page'];
                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
				if($value['type'] != 'multicheck'){
                	delete_option( $value['id'] ); 
				}else{
					foreach($value['options'] as $mc_key => $mc_value){
						$del_opt = $value['id'].'_'.$mc_key;
						delete_option($del_opt);
					}
				}
			}
            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "$themename Theme Options", 'edit_themes', 'functions.php', 'mytheme_admin');

}

function mytheme_admin() {

    global $customserviceurl, $kampylefeedback, $themename, $bloghomeurl, $shortname, $options;
    
?>
<div class="clear"><!----></div>
<div class="bizzadmin">
<h2>
<span class="theme-name"><?php echo $themename; ?> Theme Options</span>
<a id="master_switch" href="" title="Show/Hide All Options"><span class="pos"><b>+</b></span><span class="neg"><b>&#8211;</b></span> Show/Hide All Options</a>
</h2>
<a class="powered-link" href="http://bizzartic.com">Powered by BizzArtic</a>
<div class="clear"><!----></div>
	
<?php 
    
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved!&nbsp; <a href="'.$bloghomeurl.'">Check out your blog &rarr;</a></strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset!&nbsp; <a href="'.$bloghomeurl.'">Check out your blog &rarr;</a></strong></p></div>'; 
	
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post"  enctype="multipart/form-data">

<?php foreach ($options as $value) { 
	
	switch ( $value['type'] ) {
		case 'text':
		option_wrapper_header($value);
		?>
		        <input class="text_input" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
		<?php
		option_wrapper_footer($value);
		break;
		
		case 'select':
		option_wrapper_header($value);
		?>
	            <select class="select_input" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select>
		<?php
		option_wrapper_footer($value);
		break;
		
		case 'upload':
		option_wrapper_header($value);
		?>
		    <p id="upload-wrap">
		    <input type="file" name="attachment_<?php echo $value['id']; ?>" class="upload_input"></input>
            <input name="save" type="submit" value="Upload" class="button upload_save" />
            <input type="hidden" name="attachment_loos_<?php echo $value['id']; ?>" value="<?php echo $globals['attachment_'.$value['id']]; ?>"></input>
	
			<?php $upload = get_settings( $value['id'] ); ?>
			
            <?php if (empty($upload) || $upload == $std) { ?>
                <input class="upload_text_input" name="<?php echo $value['id']; ?>" value="<?php echo $std; ?>"/>
            <?php } else { ?>
                <input class="upload_text_input" name="<?php echo $value['id']; ?>" value="<?php echo $upload; ?>"/>
                <a href="<?php echo $upload; ?>" class="img-preview">
                    <img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $upload; ?>&w=440&h=100&zc=1" alt="" />
                </a>
            <?php } ?>
			
			<div class="clear"></div>
			
			</p>
			
		<?php
		option_wrapper_footer($value);
		break;
		
		case 'textarea':
		$ta_options = $value['options'];
		option_wrapper_header($value);
		?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="8"><?php  if( get_settings($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>
		<?php
		option_wrapper_footer($value);
		break;
		
		case 'textarea2':
		$ta_options = $value['options'];
		option_wrapper_header($value);
		?>
				<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="2"><?php  if( get_settings($value['id']) != "") { echo stripslashes(get_settings($value['id'])); } else { echo $value['std']; } ?></textarea>
		<?php
		option_wrapper_footer($value);
		break;

		case "radio":
		option_wrapper_header($value);
		
 		foreach ($value['options'] as $key=>$option) { 
				$radio_setting = get_settings($value['id']);
				if($radio_setting != ''){
		    		if ($key == get_settings($value['id']) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input class="input_checkbox" type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
		<?php 
		}
		 
		option_wrapper_footer($value);
		break;
		
		case "checkbox":
		option_wrapper_header($value);
						if(get_settings($value['id'])){
							$checked = "checked=\"checked\"";
						}else{
							$checked = "";
						}
					?>
		            <input <?php echo $value['disabled']; ?> class="input_checkbox" type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />&nbsp;<label><?php echo $value['label']; ?></label><br />
		<?php
		option_wrapper_footer($value);
		break;
		
		case "multicheck":
		option_wrapper_header($value);
		
 		foreach ($value['options'] as $key=>$option) {
	 			$pn_key = $value['id'] . '_' . $key;
				$checkbox_setting = get_settings($pn_key);
				if($checkbox_setting != ''){
		    		if (get_settings($pn_key) ) {
						$checked = "checked=\"checked\"";
						} else {
							$checked = "";
						}
				}else{
					if($key == $value['std']){
						$checked = "checked=\"checked\"";
					}else{
						$checked = "";
					}
				}?>
	            <input type="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />
		<?php 
		}
		 
		option_wrapper_footer($value);
		break;
		
		case "heading":
		?>
		
		    <div class="box-title"><?php echo $value['name']; ?>
			</div>
			<div class="fr submit submit-title">
                <input name="save" type="submit" value="Save changes" />    
                <input type="hidden" name="action" value="save" />
            </div>
		
		<?php
		break;
		
		case "subheadingtop":
		?>

		    <div class="feature-box">
			<div class="subheading"><?php if ($value['toggle'] <> "") { ?><a href="" title="Show/hide additional information"><span class="pos">+</span><span class="neg">&#8211;</span></a>&nbsp;&nbsp;<?php } ?><?php echo $value['name']; ?></div>
			<div class="options-box">
		
		<?php
		break;
		
		case "subheadingbottom":
		?>
		    </div>
			</div>
		<?php
		break;
		
		case "wraptop":
		?><div class="bottom-container">
		      <p class="text">
			      <div class="wrap-dropdown"><?php
		break;
		case "wrapbottom":
		?>        </div>
		      </p>
	      </div>
		</div>
		<?php
		break;
		case "multihead":
		option_wrapper_header2($value);
		break;
		
		case "maintabletop":
		?><div class="maintable"><?php
		break;
		case "maintablebottom":
		?></div><?php
		break;
		case "maintablebreak":
		?><br/><?php
		break;
		default:
		break;
	}
}
?>

<div class="clear"></div><br/>
<p class="submit reset_save">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit reset_save reset">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

function option_wrapper_header2($values){
	?>
	<div class="table-row"> 
	<?php
}

function option_wrapper_header($values){
	?>
	<div class="table-row"> 
	    <div class="top-container"><?php echo $values['name']; ?><!--<a href="" title="Show/hide additional information">[+]</a>--></div>
	    <div class="bottom-container">
		<p class="description"><?php echo $values['desc']; ?></p>
		<p class="text">
	<?php
}

function option_wrapper_footer($values){
	?>
	    </p>
		</div>
	</div>
	<?php 
}

function mytheme_wp_head() { 
	$stylesheet = get_option('bizzthemes_alt_stylesheet');
	if($stylesheet != ''){?>
		<link href="<?php bloginfo('template_directory'); ?>/skins/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" />
<?php }
} 

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');
add_action('admin_head', 'mytheme_admin_head');	

?>