<?php

// Register widgetized areas

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

    register_sidebars(1,array('name' => 'Sidebar','before_widget' => '<div class="widget">','after_widget' => '</div><!--/widget-->','before_title' => '<h3 class="hl">','after_title' => '</h3>'));
    register_sidebars(3,array('name' => 'Front %d','before_widget' => '<div class="widget">','after_widget' => '</div><!--/widget-->','before_title' => '<h3 class="hl">','after_title' => '</h3>'));
    
}

add_action( 'init', 'the_widgets_init' );
	
// Check for widgets in widget-ready areas http://wordpress.org/support/topic/190184?replies=7#post-808787
// Thanks to Chaos Kaizer http://blog.kaizeku.com/
function is_sidebar_active( $index = 1){
	$sidebars	= wp_get_sidebars_widgets();
	$key		= (string) 'sidebar-'.$index;
 
	return (isset($sidebars[$key]));
}


// =============================== 300x250 AdBanner Widget ======================================

class BigBannerWidget extends WP_Widget {

	function BigBannerWidget() {

	//Constructor
		$widget_ops = array('classname' => 'widget adbanner', 'description' => '300x250 Ad Banner Widget' );
		$this->WP_Widget('widget_adbanner', 'wc &rarr; 300x250 AdBanner', $widget_ops);
	}
 
	function widget($args, $instance) {
	
	// prints the widget

		extract($args, EXTR_SKIP);

		$image_url = empty($instance['image_url']) ? '&nbsp;' : apply_filters('widget_image_url', $instance['image_url']);
		$destination_url = empty($instance['destination_url']) ? '&nbsp;' : apply_filters('widget_destination_url', $instance['destination_url']);
		    
		?>

			<div class="ad-box">

                <div id="big_banner">

                    <a href="<?php echo $destination_url; ?>"><img src="<?php echo $image_url; ?>" alt="" /></a>

                </div>

            </div>

		<?php

	}

	function update($new_instance, $old_instance) {

	//save the widget

		$instance = $old_instance;
		$instance['image_url'] = strip_tags($new_instance['image_url']);
		$instance['destination_url'] = strip_tags($new_instance['destination_url']);
		return $instance;
	}

	function form($instance) {

	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'image_url' => '', 'destination_url' => '' ) );
		$image_url = strip_tags($instance['image_url']);
		$destination_url = strip_tags($instance['destination_url']);

?>

			<p><label for="<?php echo $this->get_field_id('image_url'); ?>">Image URL (<code>http://</code> included): <input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo attribute_escape($image_url); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('destination_url'); ?>">URL where this Ad points to (<code>http://</code> included): <input class="widefat" id="<?php echo $this->get_field_id('destination_url'); ?>" name="<?php echo $this->get_field_name('destination_url'); ?>" type="text" value="<?php echo attribute_escape($destination_url); ?>" /></label></p>

<?php
	}
}

register_widget('BigBannerWidget');

// =============================== Flickr widget ======================================

function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
			
        <h3 class="hl">flick<b>r</b></h3>
				
		<div class="fix"></div>
            			
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>  
		
		<div class="fix"></div>
		
</div>		

<?php
}
function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('wc &rarr; Flickr Photos', 'flickrWidget');
register_widget_control('wc &rarr; Flickr Photos', 'flickrWidgetAdmin', 250, 200);


// =============================== Popular Posts Widget ======================================

function PopularPostsSidebar()
{

    $settings_pop = get_option("widget_popularposts");

	$name = $settings_pop['name'];
	$number = $settings_pop['number'];
	if ($name <> "") { $popname = $name; } else { $popname = 'Popular Posts'; }
	if ($number <> "") { $popnumber = $number; } else { $popnumber = '10'; }

?>

<div class="widget popular">

	<h3 class="hl">
	<?php echo $popname; ?>
	</h3>
	
		<ul>
			 
			<?php
			global $wpdb;
            $now = gmdate("Y-m-d H:i:s",time());
            $lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-12,date("d"),date("Y")));
            $popularposts = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT $popnumber";
            $posts = $wpdb->get_results($popularposts);
            $popular = '';
            if($posts){
                foreach($posts as $post){
	                $post_title = stripslashes($post->post_title);
		               $guid = get_permalink($post->ID);
					   
					      $first_post_title=substr($post_title,0,30);
            ?>
		        <li>
                    <a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $first_post_title; ?></a> [...]
                    <br style="clear:both" />
                </li>
            <?php } } ?>

		</ul>
</div>

<?php
}
function PopularPostsAdmin() {

	$settings_pop = get_option("widget_popularposts");

	// check if anything's been sent
	if (isset($_POST['update_popular'])) {
		$settings_pop['name'] = strip_tags(stripslashes($_POST['popular_name']));
		$settings_pop['number'] = strip_tags(stripslashes($_POST['popular_number']));

		update_option("widget_popularposts",$settings_pop);
	}

	echo '<p>
			<label for="popular_name">Title:
			<input id="popular_name" name="popular_name" type="text" class="widefat" value="'.$settings_pop['name'].'" /></label></p>';
	echo '<p>
			<label for="popular_number">Number of popular posts:
			<input id="popular_number" name="popular_number" type="text" class="widefat" value="'.$settings_pop['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_popular" name="update_popular" value="1" />';

}

register_sidebar_widget('wc &rarr; Popular Posts', 'PopularPostsSidebar');
register_widget_control('wc &rarr; Popular Posts', 'PopularPostsAdmin', 250, 200);

// =============================== Twitter widget ======================================
// Plugin Name: Twitter Widget
// Plugin URI: http://seanys.com/2007/10/12/twitter-wordpress-widget/
// Description: Adds a sidebar widget to display Twitter updates (uses the Javascript <a href="http://twitter.com/badges/which_badge">Twitter 'badge'</a>)
// Version: 1.0.3
// Author: Sean Spalding
// Author URI: http://seanys.com/
// License: GPL

function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show
		$follow = $options['follow'];  // # of Updates to show

        // Output
		echo $before_widget ;

		// start
		echo '<div id="twitter">';
		echo '<h3 class="hl">'.$title.'</h3>';              
		echo '<ul id="twitter_update_list"><li></li></ul>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';
		echo '<p class="website"><a href="http://www.twitter.com/'.$account.'/" title="'.$follow.'">'.$follow.'</a></p></div>';


		// echo widget closing tag
		echo $after_widget;
	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'Google', 'title'=>'Twitter Updates', 'show'=>'3', 'follow'=>'Follow us on Twitter');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			$options['follow'] = strip_tags(stripslashes($_POST['Twitter-follow']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);
		$follow = htmlspecialchars($options['follow'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:right;">
				<label for="Twitter-account">' . __('Account:') . '
				<input style="width: 200px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 200px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-show">' . __('Show:') . '
				<input style="width: 200px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-follow">' . __('Follow us:') . '
				<input style="width: 200px;" id="Twitter-follow" name="Twitter-follow" type="text" value="'.$follow.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}

	// Register widget for use
	register_sidebar_widget(array('wc &rarr; Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('wc &rarr; Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');


// =============================== Recent Posts (particular category) ======================================

class RecentPostsCat extends WP_Widget {

	function RecentPostsCat() {
	//Constructor
	
		$widget_ops = array('classname' => 'widget recposts', 'description' => 'List of recent posts from particular category' );
		$control_ops = array('width' => 400);
		$this->WP_Widget('widget_recent_cat', 'wc &rarr; Recent Posts from Category', $widget_ops, $control_ops);
	}
 
	function widget($args, $instance) {
	// prints the widget

		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$category = empty($instance['category']) ? '&nbsp;' : apply_filters('widget_category', $instance['category']);
		$rec_number = empty($instance['rec_number']) ? '&nbsp;' : apply_filters('widget_rec_number', $instance['rec_number']);
		$rec_number_f = empty($instance['rec_number_f']) ? '&nbsp;' : apply_filters('widget_rec_number_f', $instance['rec_number_f']);
		$rec_date = empty($instance['rec_date']) ? '&nbsp;' : apply_filters('widget_rec_date', $instance['rec_date']);
		$rec_feed = empty($instance['rec_feed']) ? '&nbsp;' : apply_filters('widget_rec_feed', $instance['rec_feed']);
		$rec_comment = empty($instance['rec_comment']) ? '&nbsp;' : apply_filters('widget_rec_comment', $instance['rec_comment']);
		$rec_thumb = empty($instance['rec_thumb']) ? '&nbsp;' : apply_filters('widget_rec_thumb', $instance['rec_thumb']);
		$rec_thumb_size_w = empty($instance['rec_thumb_size_w']) ? '&nbsp;' : apply_filters('widget_rec_thumb_size_w', $instance['rec_thumb_size_w']);
		$rec_thumb_size_h = empty($instance['rec_thumb_size_h']) ? '&nbsp;' : apply_filters('widget_rec_thumb_size_h', $instance['rec_thumb_size_h']);
		$rec_excerpt_l = empty($instance['rec_excerpt_l']) ? '&nbsp;' : apply_filters('widget_rec_excerpt_l', $instance['rec_excerpt_l']);
		$rec_link1_t = empty($instance['rec_link1_t']) ? '&nbsp;' : apply_filters('widget_rec_link1_t', $instance['rec_link1_t']);
		$rec_link1_u = empty($instance['rec_link1_u']) ? '&nbsp;' : apply_filters('widget_rec_link1_u', $instance['rec_link1_u']);
		$rec_link2_t = empty($instance['rec_link2_t']) ? '&nbsp;' : apply_filters('widget_rec_link2_t', $instance['rec_link2_t']);
		$rec_link2_u = empty($instance['rec_link2_u']) ? '&nbsp;' : apply_filters('widget_rec_link2_u', $instance['rec_link2_u']);
		$rec_link3_t = empty($instance['rec_link3_t']) ? '&nbsp;' : apply_filters('widget_rec_link3_t', $instance['rec_link3_t']);
		$rec_link3_u = empty($instance['rec_link3_u']) ? '&nbsp;' : apply_filters('widget_rec_link3_u', $instance['rec_link3_u']);
 				        
		?>
		
		    <?php $categoryl = get_the_category(); ?>
            <h3>
			<?php if ( $category == "-99" ) { ?>
                Recent Posts
				<?php if ( get_option('wcthemes_feedburner_url') <> "" ) { ?> 
			        <span><a href="<?php echo get_option('wcthemes_feedburner_url'); ?>"></a></span>
                <?php } else { ?>
			        <span><a href="<?php echo get_bloginfo_rss('rss2_url'); ?>"></a></span>				 
			    <?php } ?>
			<?php } else { ?>
			    <a title="Browse all posts filed under &rarr; <?php echo get_cat_name($category); ?>" href="<?php echo get_category_link( $category ); ?>"><?php echo get_cat_name($category); ?> &raquo;</a>
			    <span><a href="<?php echo get_category_feed_link(''.$category.'',''); ?>"></a></span>
			<?php } ?>
			</h3>
						
			<div class="rec-post-cat">
			
			<?php global $post; setup_postdata($post); ?>
				
			<?php query_posts('showposts='.$rec_number.'&order=DESC&cat='.$category.''); ?>
			
			<?php if (have_posts()) : $count = 0; ?>

	        <?php while (have_posts()) : the_post(); $postcount++; ?>
			
			<?php if ( $postcount <= $rec_number_f ) { ?>
			
			    <div class="rec-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		
		        <div class="rec-meta clearfix">
		
		            <div class="rec-date"><?php the_time(''.$rec_date.'') ?></div>
					
					<?php if ( $rec_comment == "on" ) { ?>
                
                        <div class="rec-comment"><a href="<?php comments_link() ?>"><?php comments_number(''.get_option('wcthemes_comment_responsesa_name').'', ''.get_option('wcthemes_comment_responsesb_name').'', ''.get_option('wcthemes_comment_responsesc_name').''); ?></a></div>
                
			        <?php } ?>
								
		        </div>
			  
			   
                
                   <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>
                
			   
							  
			    <p class="featured-excerpt"><?php echo bm_better_excerpt($rec_excerpt_l, ' [...] '); ?></p>
			
			<?php continue; } ?>
						
			    <div class="rec-list">&rsaquo; <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							 
			<?php endwhile; else: endif; wp_reset_query(); ?>
			
			    <?php if ( $rec_link1_t <> "&nbsp;" || $rec_link2_t <> "&nbsp;" || $rec_link3_t <> "&nbsp;" ) { ?>
                
                    <div class="rec-more clearfix">
			
			            <?php if ( $rec_link1_t <> "&nbsp;" ) { ?><a href="<?php echo $rec_link1_u; ?>"><?php echo $rec_link1_t; ?></a> | <?php } ?>
						<?php if ( $rec_link2_t <> "&nbsp;" ) { ?><a href="<?php echo $rec_link2_u; ?>"><?php echo $rec_link2_t; ?></a> | <?php } ?>
						<?php if ( $rec_link3_t <> "&nbsp;" ) { ?><a href="<?php echo $rec_link3_u; ?>"><?php echo $rec_link3_t; ?></a><?php } ?>
			
			        </div>	
                
			    <?php } ?>
			
			</div><!-- /rec-post-cat -->
				
			<?php
				
		echo $after_widget;
		
	}
 
	function update($new_instance, $old_instance) {
	//save the widget
	
		$instance = $old_instance;
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['rec_number'] = strip_tags($new_instance['rec_number']);
		$instance['rec_number_f'] = strip_tags($new_instance['rec_number_f']);
		$instance['rec_date'] = strip_tags($new_instance['rec_date']);
		$instance['rec_feed'] = strip_tags($new_instance['rec_feed']);
		$instance['rec_comment'] = strip_tags($new_instance['rec_comment']);
		$instance['rec_thumb'] = strip_tags($new_instance['rec_thumb']);
		$instance['rec_thumb_size_w'] = strip_tags($new_instance['rec_thumb_size_w']);
		$instance['rec_thumb_size_h'] = strip_tags($new_instance['rec_thumb_size_h']);
		$instance['rec_excerpt_l'] = strip_tags($new_instance['rec_excerpt_l']);
		$instance['rec_link1_t'] = strip_tags($new_instance['rec_link1_t']);
		$instance['rec_link1_u'] = strip_tags($new_instance['rec_link1_u']);
		$instance['rec_link2_t'] = strip_tags($new_instance['rec_link2_t']);
		$instance['rec_link2_u'] = strip_tags($new_instance['rec_link2_u']);
		$instance['rec_link3_t'] = strip_tags($new_instance['rec_link3_t']);
		$instance['rec_link3_u'] = strip_tags($new_instance['rec_link3_u']);
 
		return $instance;
	}
 
	function form($instance) {
	//widgetform in backend

		$instance = wp_parse_args( (array) $instance, array( 'category' => '', 'rec_number' => '5', 'rec_number_f' => '1',  'rec_date' => 'F j, Y', 'rec_feed' => 'true', 'rec_comment' => 'true', 'rec_thumb' => 'true', 'rec_thumb_size_w' => '125', 'rec_thumb_size_h' => '125', 'rec_excerpt_l' => '135', 'rec_link1_t' => '', 'rec_link1_u' => 'http://', 'rec_link2_t' => '', 'rec_link2_u' => 'http://', 'rec_link3_t' => '', 'rec_link3_u' => 'http://' ) );
		$category = strip_tags($instance['category']);
		$rec_number = strip_tags($instance['rec_number']);
		$rec_number_f = strip_tags($instance['rec_number_f']);
		$rec_date = strip_tags($instance['rec_date']);
		$rec_feed = strip_tags($instance['rec_feed']);
		$rec_comment = strip_tags($instance['rec_comment']);
		$rec_thumb = strip_tags($instance['rec_thumb']);
		$rec_thumb_size_w = strip_tags($instance['rec_thumb_size_w']);
		$rec_thumb_size_h = strip_tags($instance['rec_thumb_size_h']);
		$rec_excerpt_l = strip_tags($instance['rec_excerpt_l']);
		$rec_link1_t = strip_tags($instance['rec_link1_t']);
		$rec_link1_u = strip_tags($instance['rec_link1_u']);
		$rec_link2_t = strip_tags($instance['rec_link2_t']);
		$rec_link2_u = strip_tags($instance['rec_link2_u']);
		$rec_link3_t = strip_tags($instance['rec_link3_t']);
		$rec_link3_u = strip_tags($instance['rec_link3_u']);
?>
			<p>
			<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category') ?>" class="widefat">
				<option value="-99"<?php  selected(-99, (int) $instance['category']); ?>>-- All Categories --</option>
				<?php
				$categories	= get_terms('category');
				foreach ( $categories as $cat ) {
					echo '<option value="' . $cat->term_id .'"';
					selected((int) $cat->term_id, (int) $instance['category']);
					echo '>' . $cat->name . '</option>';
				}
				?>
			</select>
		    </p>
			<p><label for="<?php echo $this->get_field_id('rec_number'); ?>">Total number of posts to show: <input class="widefat" id="<?php echo $this->get_field_id('rec_number'); ?>" name="<?php echo $this->get_field_name('rec_number'); ?>" type="text" value="<?php echo attribute_escape($rec_number); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_number_f'); ?>">Number of featured posts to show: <input class="widefat" id="<?php echo $this->get_field_id('rec_number_f'); ?>" name="<?php echo $this->get_field_name('rec_number_f'); ?>" type="text" value="<?php echo attribute_escape($rec_number_f); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_date'); ?>">Select <a href="http://si2.php.net/manual/en/function.date.php">date format</a>: <input class="widefat" id="<?php echo $this->get_field_id('rec_date'); ?>" name="<?php echo $this->get_field_name('rec_date'); ?>" type="text" value="<?php echo attribute_escape($rec_date); ?>" /></label></p>
			<p><input class="checkbox" type="checkbox" <?php checked( $instance['rec_feed'], true ); ?> id="<?php echo $this->get_field_id( 'rec_feed' ); ?>" name="<?php echo $this->get_field_name( 'rec_feed' ); ?>" />&nbsp;&nbsp;<label for="<?php echo $this->get_field_id('rec_feed'); ?>">Show feed for selected category:</label></p>
			<p><input class="checkbox" type="checkbox" <?php checked( $instance['rec_comment'], true ); ?> id="<?php echo $this->get_field_id( 'rec_comment' ); ?>" name="<?php echo $this->get_field_name( 'rec_comment' ); ?>" />&nbsp;&nbsp;<label for="<?php echo $this->get_field_id('rec_comment'); ?>">Show comment count:</label></p>
			<p><input class="checkbox" type="checkbox" <?php checked( $instance['rec_thumb'], true ); ?> id="<?php echo $this->get_field_id( 'rec_thumb' ); ?>" name="<?php echo $this->get_field_name( 'rec_thumb' ); ?>" />&nbsp;&nbsp;<label for="<?php echo $this->get_field_id('rec_thumb'); ?>">Show thumbnails:</label></p>
			<p><label for="<?php echo $this->get_field_id('rec_thumb_size_w'); ?>">Thumbnail width (in pixels): <input class="widefat" id="<?php echo $this->get_field_id('rec_thumb_size_w'); ?>" name="<?php echo $this->get_field_name('rec_thumb_size_w'); ?>" type="text" value="<?php echo attribute_escape($rec_thumb_size_w); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_thumb_size_h'); ?>">Thumbnail height (in pixels): <input class="widefat" id="<?php echo $this->get_field_id('rec_thumb_size_h'); ?>" name="<?php echo $this->get_field_name('rec_thumb_size_h'); ?>" type="text" value="<?php echo attribute_escape($rec_thumb_size_h); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_excerpt_l'); ?>">Length of excerpted post content (in #characters): <input class="widefat" id="<?php echo $this->get_field_id('rec_excerpt_l'); ?>" name="<?php echo $this->get_field_name('rec_excerpt_l'); ?>" type="text" value="<?php echo attribute_escape($rec_excerpt_l); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link1_t'); ?>">Bottom LINK 1 title: <input class="widefat" id="<?php echo $this->get_field_id('rec_link1_t'); ?>" name="<?php echo $this->get_field_name('rec_link1_t'); ?>" type="text" value="<?php echo attribute_escape($rec_link1_t); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link1_u'); ?>">Bottom LINK 1 url: <input class="widefat" id="<?php echo $this->get_field_id('rec_link1_u'); ?>" name="<?php echo $this->get_field_name('rec_link1_u'); ?>" type="text" value="<?php echo attribute_escape($rec_link1_u); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link2_t'); ?>">Bottom LINK 2 title: <input class="widefat" id="<?php echo $this->get_field_id('rec_link2_t'); ?>" name="<?php echo $this->get_field_name('rec_link2_t'); ?>" type="text" value="<?php echo attribute_escape($rec_link2_t); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link2_u'); ?>">Bottom LINK 2 url: <input class="widefat" id="<?php echo $this->get_field_id('rec_link2_u'); ?>" name="<?php echo $this->get_field_name('rec_link2_u'); ?>" type="text" value="<?php echo attribute_escape($rec_link2_u); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link3_t'); ?>">Bottom LINK 3 title: <input class="widefat" id="<?php echo $this->get_field_id('rec_link3_t'); ?>" name="<?php echo $this->get_field_name('rec_link3_t'); ?>" type="text" value="<?php echo attribute_escape($rec_link3_t); ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('rec_link3_u'); ?>">Bottom LINK 3 url: <input class="widefat" id="<?php echo $this->get_field_id('rec_link3_u'); ?>" name="<?php echo $this->get_field_name('rec_link3_u'); ?>" type="text" value="<?php echo attribute_escape($rec_link3_u); ?>" /></label></p>
			
<?php
	}
}
register_widget('RecentPostsCat');

?>