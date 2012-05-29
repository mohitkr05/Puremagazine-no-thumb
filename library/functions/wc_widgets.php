<?php 

function widget_contactform_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_contactform($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_contactform');
		$title = $options['title'];  // Title in sidebar for widget
		$private = $options['private'];  // Recaptcha Private Key
		$public = $options['public'];  // Recaptcha Public key
		$akismetkey = $options['akismetkey'];  // Akismet Key
		

        // Output
		echo $before_widget ;

		function cP($name){//clean post, to prevent mysql injection Post method and remove html
	if(get_magic_quotes_gpc()) $_POST[$name]=stripslashes($_POST[$name]); 
	$name=mysql_real_escape_string(strip_tags($_POST[$name]));
	return $name;
}
function isEmail($email){//check that the email is correct
	$pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
	if(preg_match($pattern, $email) > 0) return true;
	else return false;
}
function isSpam($name,$email,$comment){//return if something is spam or not using akismet
	if ($akismetkey!=""){
		$akismet = new Akismet(get_option('siteurl') ,$akismetkey);//change this! or use defines with that name!
		$akismet->setCommentAuthor($name);
		$akismet->setCommentAuthorEmail($email);
		$akismet->setCommentContent($comment);
		return $akismet->isCommentSpam();
	}
	else return false;//we return is not spam since we don't have the api :(
}
if (cP("contact")==1){
      		$error = false;
			$resp = recaptcha_check_answer ($private,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
			if(!$resp->is_valid) {
				$error = true;
				$error_text .= "<p>".__('The captcha is wrong!', "wpct")."</p>";//wrong email address
			}
            if(!isEmail(cP("email"))) {
            	$error = true;
                $error_text .= "<p>".__('Not valid email address', "wpct")."</p>";//wrong email address
            }
            if(isSpam(cP("name"),cP("email"),cP("description"))) {//check if is spam!
                $error = true;
                $error_text .= "<p>".__('Ups!Spam? if you are not spam contact us.', "wpct")."</p>";
            }
            if(cP("contact_name") == "" || cP("email") == "" || cP("msg") == "") {
                $error = true;
                $error_text .= "<p>".__('Please complete the mandatory fields.', "wpct")."</p>";
            }
            if (!$error){
                //generate the email to send to the client that is contacted
                $subject="[".get_bloginfo('name')."] ".__('Re:', "wpct")." ".get_the_title();
                $body=cP("contact_name")." (".cP("email").") ".__('contacted you for the Ad', "wpct")."\n".get_permalink()." \n \n".cP("msg")." \n \n";
                                            
                $headers = 'From: '.cP("contact_name").' <'.cP("email").'>' . "\r\n\\";
                wp_mail(get_post_meta(get_the_ID(), "contact", true),$subject,$body,$headers);
                                                            
                $error_text = "<p>".__('Message sent, thank you.', "wpct")."</p>";
            }
      	}//if post
		?>
    <?php if ($error_text) { echo "<div class=\"error-msg\">$error_text</div>"; }?>
		 <div id="contactform" class="contactform form">
      	<form action="" method="post">
          <p>
            <label for="contact_name"><small><?php _e('Your name', "wpct");?>*</small></label>
            <br />
            <input type="text" name="contact_name" id="contact_name" class="ico_person" value="" />
          </p>
          <p>
        	<label for="email"><small><?php _e('Email', "wpct");?>*</small></label>
            <br />
            <input type="text" name="email" id="email" class="ico_mail" value="" />
          </p>
          <p>
            <label for="msg"><small><?php _e('Message', "wpct");?>*</small></label>
            <br />
            <textarea name="msg" id="msg" rows="10"></textarea>
          </p>
          <p>
            <script type="text/javascript">
 			  var RecaptchaOptions = {
			  theme : 'white',
			  tabindex : '1',
			  };
		    </script>
            <?php echo recaptcha_get_html($public); ?>
          </p>          
          <p style="margin-top:15px;">
            <input type="submit" class="submit" value="<?php _e('Contact', "wpct");?>" />
            <input type="hidden" name="contact" value="1" />
          </p>
        </form>
      </div>
	  <?php
		// echo widget closing tag
		echo $after_widget;
	}

		
	// Settings form
	function widget_contactform_control() {

		// Get options
		$options = get_option('widget_contactform');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('title'=>'Contact Owner', 'private'=>'', 'public'=>'', 'akismetkey'=>'');

        // form posted?
		if ( $_POST['contactowner-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['contactowner-title']));
			$options['private'] = strip_tags(stripslashes($_POST['contactowner-private']));
			$options['public'] = strip_tags(stripslashes($_POST['contactowner-public']));
			$options['akismetkey'] = strip_tags(stripslashes($_POST['contactowner-akismetkey']));
			update_option('widget_contactform', $options);
		}

		// Get options for form fields to show
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$private = htmlspecialchars($options['private'], ENT_QUOTES);
		$public = htmlspecialchars($options['public'], ENT_QUOTES);
		$akismetkey = htmlspecialchars($options['akismetkey'], ENT_QUOTES);
		

		// The form fields
		
	echo '<p style="text-align:right;">
				<label for="contactowner-title">' . __('Title:') . '
				<input style="width: 200px;" id="contactowner-title" name="contactowner-title" type="text" value="'.$title.'" />
				</label></p>';
					echo '<p style="text-align:right;">
				<label for="contactowner-private">' . __('Private Key:') . '
				<input style="width: 200px;" id="contactowner-private" name="contactowner-private" type="text" value="'.$private.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="contactowner-public">' . __('Public Key:') . '
				<input style="width: 200px;" id="contactowner-public" name="contactowner-public" type="text" value="'.$public.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="contactowner-akismetkey">' . __('Akismet Key:') . '
				<input style="width: 200px;" id="contactowner-akismetkey" name="contactowner-akismetkey" type="text" value="'.$akismetkey.'" />
				</label></p>';
		echo '<input type="hidden" id="contactowner-submit" name="contactowner-submit" value="1" />';
	}

	// Register widget for use
	register_sidebar_widget(array('wc &rarr; contactowner', 'widgets'), 'widget_contactform');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('wc &rarr; contactowner', 'widgets'), 'widget_contactform_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_contactform_init');
?>