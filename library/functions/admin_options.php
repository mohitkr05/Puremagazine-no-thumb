<?php

$options[] = array(	"type" => "maintabletop");

    ////// General Settings
	    $options[] = array(	"name" => "General Settings",
						"type" => "heading");
						
		    $options[] = array(	"name" => "Customize Your Design",
						        "toggle" => "true",
								"type" => "subheadingtop");
				
				$options[] = array(	"name" => "Blog Background",
				                    "desc" => "Select the background for your blog here.",
					                "id" => $shortname."_alt_bgr",
					                "std" => "Select a bacground image:",
					                "type" => "select",
					                "options" => $backgrounds);
									
				$options[] = array(	"label" => "Use Custom Stylesheet",
						            "desc" => "If you want to make custom design changes using CSS enable and <a href='". $customcssurl . "'>edit custom.css file here</a>.",
						            "id" => $shortname."_customcss",
						            "std" => "true",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Favicon",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"desc" => "Paste the full URL for your favicon image here if you wish to show it in browsers. <a href='http://www.favicon.cc/'>Create one here</a>",
						            "id" => $shortname."_favicon",
						            "std" => "",
						            "type" => "upload");	
			
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Logo",
						        "toggle" => "true",
								"type" => "subheadingtop");

                $options[] = array(	"name" => "Choose Your Logo",
				                    "desc" => "Paste the full URL to your logo here. Must be within <code>450x60 px</code> dimensions!",
						            "id" => $shortname."_logo_url",
						            "std" => "",
						            "type" => "upload");

				$options[] = array(	"name" => "Choose Blog Title over Logo",
				                    "desc" => "This option will overwrite your logo selection above - You can <a href='". $generaloptionsurl . "'>change your settings here</a>",
						            "label" => "Show Blog Title + Tagline.",
						            "id" => $shortname."_show_blog_title",
						            "std" => "true",
						            "type" => "checkbox");	

			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Comments Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Display Comments Count",
						            "desc" => "Show comments count in Front/Archive",
						            "id" => $shortname."_commentcount",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Syndication / Feed",
						        "toggle" => "true",
								"type" => "subheadingtop");			
						
				$options[] = array( "desc" => "If you are using a service like Feedburner to manage your RSS feed, enter full URL to your feed into box above. If you'd prefer to use the default WordPress feed, simply leave this box blank.",
			    		            "id" => $shortname."_feedburner_url",
			    		            "std" => "",
			    		            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
								
		$options[] = array(	"type" => "maintablebreak");
		
	/// Layout Settings											
				
		$options[] = array(	"name" => "Layout Settings",
						    "type" => "heading");
										
			$options[] = array(	"name" => "Content Box Order",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Choose in which order content blocks should appear on front page",
					                "id" => $shortname."_layout_order",
					                "type" => "radio",
									"std" => "Featured Post, News Stream",
									"options" => array("Header &rarr; Featured Post &rarr; News Stream &rarr; Front Widgets", 
									                   "Featured Post &rarr; Header &rarr; News Stream &rarr; Front Widgets", 
													   "Header &rarr; News Stream &rarr; Featured Post &rarr; Front Widgets", 
									                   "News Stream &rarr; Header &rarr; Featured Post &rarr; Front Widgets",
													   "Header &rarr; Featured Post &rarr; Front Widgets &rarr; News Stream")
									);
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Featured Post Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Hide Featured Post Block",
						            "desc" => "Check this option if you want to hide Featured Post Block block (Top Posts on the right included).",
						            "id" => $shortname."_hide_featpanel",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "News Stream Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Hide News Stream Block on Front Page",
						            "desc" => "Check this option if you want to hide jQuery news sream block on Front Page.",
						            "id" => $shortname."_hide_stepcarousel",
						            "std" => "false",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Hide News Stream Block in Archives",
						            "desc" => "Check this option if you want to hide jQuery news sream block in Archives (category archives, search results, author archives,...).",
						            "id" => $shortname."_hide_stepcarousel_archives",
						            "std" => "false",
						            "type" => "checkbox");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Front Widgets Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Hide Front Widgets",
						            "desc" => "Check this option if you want to hide Front Widgets block.",
						            "id" => $shortname."_hide_fwidgets",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
	/// Navigation Settings												
				
		$options[] = array(	"name" => "Navigation Settings",
						    "type" => "heading");
										
			$options[] = array(	"name" => "Exclude Pages from Header",
								"toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"type" => "multihead");
						
				$options = pages_exclude($options);
					
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Exclude Categories from Header",
								"toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"type" => "multihead");
						
				$options = category_exclude($options);
					
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Footer Navigation",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "",
                	                "desc" => "Enter a comma-separated list of the <code>page ID's</code> that you'd like to display in footer (on the right). (ie. <code>1,2,3,4</code>)",
						            "id" => $shortname."_footpages",
						            "std" => "",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
	/// Featured Post Settings											
				
		$options[] = array(	"name" => "Featured Post Settings",
						    "type" => "heading");
			
			$options[] = array(	"name" => "Name for the Featured Post Block",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Enter name for the Featured Post block.",
						            "id" => $shortname."_feat_name",
						            "std" => "Featured Post",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Featured Post Category",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Latest post from selected category will be displayed.",
					                "id" => $shortname."_feat_cat",
					                "std" => "",
					                "type" => "select",
					                "options" => $pn_categories);	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Featured Post Image",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Auto-resized Image Width (in pixels).",
						            "id" => $shortname."_feat_i_w",
						            "std" => "300",
						            "type" => "text");	
									
				$options[] = array(	"desc" => "Auto-resized Image Height (in pixels).",
						            "id" => $shortname."_feat_i_h",
						            "std" => "250",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Excerpted Post Content Length",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Enter number of characters to appear.",
						            "id" => $shortname."_excerpted_length",
						            "std" => "200",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Related Posts",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Hide Related Posts",
						            "desc" => "Check this option if you want to hide 3 related posts under excerpted content.",
						            "id" => $shortname."_hide_related",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Sticky Posts Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Enter name for the Sticky Posts block.",
						            "id" => $shortname."_tstories_name",
						            "std" => "Sticky Posts",
						            "type" => "text");
				
				$options[] = array(	"desc" => "Choose the maximum amount of sticky posts to show.",
					                "id" => $shortname."_tstories_number",
					                "type" => "select",
									"std" => "3",
									"options" => array("1","2","3","4","5")
									);	
									
				$options[] = array(	"name" => "Bottom Links",
				                    "desc" => "Bottom Link 1 Name",
						            "id" => $shortname."_tstories_link1_name",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"desc" => "Bottom Link 1 URL",
						            "id" => $shortname."_tstories_link1_url",
						            "std" => "http://",
						            "type" => "text");
									
				$options[] = array(	"desc" => "Bottom Link 2 Name",
						            "id" => $shortname."_tstories_link2_name",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"desc" => "Bottom Link 2 URL",
						            "id" => $shortname."_tstories_link2_url",
						            "std" => "http://",
						            "type" => "text");
									
				$options[] = array(	"desc" => "Bottom Link 3 Name",
						            "id" => $shortname."_tstories_link3_name",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"desc" => "Bottom Link 3 URL",
						            "id" => $shortname."_tstories_link3_url",
						            "std" => "http://",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
	/// News Stream Settings											
				
		$options[] = array(	"name" => "News Stream Settings",
						    "type" => "heading");
			
			$options[] = array(	"name" => "Name for the News Stream Block",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Enter name for the news stream block.",
						            "id" => $shortname."_stream_name",
						            "std" => "Latest News Stream",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Number of Posts to Show",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Choose how many posts will appear in news stream block.",
					                "id" => $shortname."_stream_number",
					                "type" => "select",
									"std" => "10",
									"options" => array("10","11","12","13","14","15","16","17","18","19","20","22","24","26","28","30")
									);	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Exclude Categories from News Stream",
								"toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"type" => "multihead");
						
				$options = category_exclude2($options);
					
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
				
$options[] = array(	"type" => "maintablebottom");
				
$options[] = array(	"type" => "maintabletop");

    /// Featured Images and Thumbnails											
				
		$options[] = array(	"name" => "Images & Thumbnails",
						    "type" => "heading");
										
			$options[] = array(	"name" => "Thumbnails Appearance",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Show Image Thumbnails in Single Posts",
						            "desc" => "",
						            "id" => $shortname."_show_img_single",
						            "std" => "false",
						            "type" => "checkbox");	
									
				$options[] = array(	"label" => "Show Image Thumbnails in Archives",
						            "desc" => "",
						            "id" => $shortname."_show_img_archives",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Thumbnails Dimensions",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Auto-resized Image Width (in pixels).",
						            "id" => $shortname."_iauto_w",
						            "std" => "90",
						            "type" => "text");	
									
				$options[] = array(	"desc" => "Auto-resized Image Height (in pixels).",
						            "id" => $shortname."_iauto_h",
						            "std" => "90",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
	/// Blog Stats and Scripts											
				
		$options[] = array(	"name" => "Blog Stats and Scripts",
						    "type" => "heading");
										
			$options[] = array(	"name" => "Blog Header Scripts",
						        "toggle" => "true",
								"type" => "subheadingtop");	
						
				$options[] = array(	"name" => "Header Scripts",
					                "desc" => "If you need to add scripts to your header (like <a href='http://haveamint.com/'>Mint</a> tracking code), do so here.",
					                "id" => $shortname."_scripts_header",
					                "std" => "",
					                "type" => "textarea");
			
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Blog Footer Scripts",
						        "toggle" => "true",
								"type" => "subheadingtop");	
						
				$options[] = array(	"name" => "Footer Scripts",
					                "desc" => "If you need to add scripts to your footer (like <a href='http://www.google.com/analytics/'>Google Analytics</a> tracking code), do so here.",
					                "id" => $shortname."_google_analytics",
					                "std" => "",
					                "type" => "textarea");
			
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
	/// SEO Options
				
		$options[] = array(	"name" => "SEO Options",
						    "type" => "heading");
						
			$options[] = array(	"name" => "Home Page <code>&lt;meta&gt;</code> tags",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Meta Description",
					                "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
					                "id" => $shortname."_meta_description",
					                "std" => "",
					                "type" => "textarea");

				$options[] = array(	"name" => "Meta Keywords (comma separated)",
					                "desc" => "Meta keywords are rarely used nowadays but you can still provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
						            "id" => $shortname."_meta_keywords",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"name" => "Meta Author",
					                "desc" => "You should write your <em>full name</em> here but only do so if this blog is writen only by one outhor. This only applies to your home page.",
						            "id" => $shortname."_meta_author",
						            "std" => "",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Add <code>&lt;noindex&gt;</code> tags",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to category archives.",
						            "id" => $shortname."_noindex_category",
						            "std" => "true",
						            "type" => "checkbox");
									
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to tag archives.",
						            "id" => $shortname."_noindex_tag",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to author archives.",
						            "id" => $shortname."_noindex_author",
						            "std" => "true",
						            "type" => "checkbox");
									
			    $options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to Search Results.",
						            "id" => $shortname."_noindex_search",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to daily archives.",
						            "id" => $shortname."_noindex_daily",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to monthly archives.",
						            "id" => $shortname."_noindex_monthly",
						            "std" => "true",
						            "type" => "checkbox");
				
				$options[] = array(	"label" => "Add <code>&lt;noindex&gt;</code> to yearly archives.",
						            "id" => $shortname."_noindex_yearly",
						            "std" => "true",
						            "type" => "checkbox");
				
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
		$options[] = array(	"type" => "maintablebreak");
		
	////// Advertising scripts
                
		$options[] = array(	"name" => "Advertising Scripts",
						    "type" => "heading");
							
			$options[] = array(	"name" => "Ad Scripts Code - below header",
						        "toggle" => "true",
								"type" => "subheadingtop");
				
				$options[] = array(	"name" => "Browsing Homepage",
					                "desc" => "Enter your ad script code here. Must be up to <code>728 px</code> width.",
					                "id" => $shortname."_adsense_header",
					                "std" => "",
					                "type" => "textarea");
						
		    $options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
			
	/// 468x60	

	    $options[] = array(	"name" => "Header Ad 468x60",
						    "type" => "heading");
						
			$options[] = array(	"name" => "468x60 Ad Banner Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Enable 468x60 Ad Banner",
						            "label" => "Display the 468x60 Ad.",
						            "id" => $shortname."_not_468",
						            "std" => "false",
						            "type" => "checkbox");

				$options[] = array(	"name" => "468x60 Ad - Image Location",
						            "desc" => "Enter the URL for this Ad.",
						            "id" => $shortname."_block1_image",
						            "std" => $template_path . "/images/ad-468x60.png",
						            "type" => "upload");
						
				$options[] = array(	"name" => "468x60 Ad - Destination",
						            "desc" => "Enter the URL where this Ad points to.",
			    		            "id" => $shortname."_block1_url",
						            "std" => "http://bizzartic.com",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "468x60 Ad Script Settings",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Enable 468x60 Ad Script",
						            "label" => "Display the 468x60 Ad Script.",
						            "id" => $shortname."_show_script_468",
						            "std" => "false",
						            "type" => "checkbox");

				$options[] = array(	"name" => "468x60 Ad Script Code",
					                "desc" => "Enter your ad script code here. Must be up to <code>468 px</code> width and up to <code>60 px</code> height.",
					                "id" => $shortname."_script_468",
					                "std" => "",
					                "type" => "textarea");
						
			$options[] = array(	"type" => "subheadingbottom");
			
		$options[] = array(	"type" => "maintablebreak");
		
	//////Translations		

	    $options[] = array(	"name" => "Translations",
						    "type" => "heading");
						
			$options[] = array(	"name" => "General Text",
			                    "toggle" => "true",
						        "type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Change Home link text - next to category menu in header",
			    		            "id" => $shortname."_home_name",
			    		            "std" => "Home",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change Search text",
			    		            "id" => $shortname."_search_name",
			    		            "std" => "Search",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Search results text",
			    		            "id" => $shortname."_search_results",
			    		            "std" => "Search results for",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Nothing Found for Search text",
			    		            "id" => $shortname."_search_nothing_found",
			    		            "std" => "Nothing found, please search again.",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Tags text",
			    		            "id" => $shortname."_general_tags_name",
			    		            "std" => "Tags",
			    		            "type" => "text");
				
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Subscription Text",
			                    "toggle" => "true",
						        "type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Change Subscribe text",
			    		            "id" => $shortname."_subscribe_name",
			    		            "std" => "Subscribe",
			    		            "type" => "text");
				
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Archives Text",
			                    "toggle" => "true",
						        "type" => "subheadingtop");
				
				$options[] = array(	"desc" => "Change Browsing Category text",
			    		            "id" => $shortname."_browsing_category",
			    		            "std" => "Browsing Category",
			    		            "type" => "text");
				
				$options[] = array(	"desc" => "Change Browsing Tag text",
			    		            "id" => $shortname."_browsing_tag",
			    		            "std" => "Browsing Tag",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Browsing Day text",
			    		            "id" => $shortname."_browsing_day",
			    		            "std" => "Browsing Day",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Browsing Month text",
			    		            "id" => $shortname."_browsing_month",
			    		            "std" => "Browsing Month",
			    		            "type" => "text");
									
				$options[] = array(	"desc" => "Change Browsing Year text",
			    		            "id" => $shortname."_browsing_year",
			    		            "std" => "Browsing Year",
			    		            "type" => "text");
				
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "404 Error Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change 404 error text",
			    		            "id" => $shortname."_404error_name",
			    		            "std" => "Error 404 | Nothing found!",
			    		            "type" => "text");
						
				$options[] = array(	"desc" => "Change 404 error solution text",
			    		            "id" => $shortname."_404solution_name",
			    		            "std" => "Sorry, but you are looking for something that is not here.",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Comments Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change password protected text",
			    		            "id" => $shortname."_password_protected_name",
			    		            "std" => "This post is password protected. Enter the password to view comments.",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change no responses text",
			    		            "id" => $shortname."_comment_responsesa_name",
			    		            "std" => "No Comments",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change one response text",
			    		            "id" => $shortname."_comment_responsesb_name",
			    		            "std" => "One Comment",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change multiple responses text, leave % intact!",
			    		            "id" => $shortname."_comment_responsesc_name",
			    		            "std" => "% Comments",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change trackbacks text",
			    		            "id" => $shortname."_comment_trackbacks_name",
			    		            "std" => "Trackbacks For This Post",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change comment moderation text",
			    		            "id" => $shortname."_comment_moderation_name",
			    		            "std" => "Your comment is awaiting moderation.",
			    	             	"type" => "text");
						
				$options[] = array( "desc" => "Change start conversation text",
			    		            "id" => $shortname."_comment_conversation_name",
			    		            "std" => "Be the first to start a conversation",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change closed comments text",
			    		            "id" => $shortname."_comment_closed_name",
			    		            "std" => "Comments are closed.",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change disabled comments text",
			    		            "id" => $shortname."_comment_off_name",
			    		            "std" => "Comments are off for this post",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change leave a reply text",
			    		            "id" => $shortname."_comment_reply_name",
			    		            "std" => "Leave a Reply",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change 'you must be' text",
			    		            "id" => $shortname."_comment_mustbe_name",
			    		            "std" => "You must be",
			    		            "type" => "text");
				
				$options[] = array( "desc" => "Change 'logged in' text",
			    		            "id" => $shortname."_comment_loggedin_name",
			    		            "std" => "logged in",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'to post a comment' text",
			    		            "id" => $shortname."_comment_postcomment_name",
			    		            "std" => "to post a comment.",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change Logout text",
			    		            "id" => $shortname."_comment_logout_name",
			    		            "std" => "Logout",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change name text",
			    		            "id" => $shortname."_comment_name_name",
			    		            "std" => "Name",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change mail text",
			    		            "id" => $shortname."_comment_mail_name",
			    		            "std" => "Mail",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change website text",
			    		            "id" => $shortname."_comment_website_name",
			    		            "std" => "Website",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change add comment text",
			    		            "id" => $shortname."_comment_addcomment_name",
			    		            "std" => "Add Comment",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'reply' to threaded comment text",
			    		            "id" => $shortname."_comment_justreply_name",
			    		            "std" => "Reply",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'edit' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_edit_name",
			    	            	"std" => "Edit",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'delete' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_delete_name",
			    		            "std" => "Delete",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change 'spam' comment text, only visible to administrators",
			    		            "id" => $shortname."_comment_spam_name",
			    		            "std" => "Spam",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Pagination Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change first page text",
			    		            "id" => $shortname."_pagination_first_name",
			    	 	            "std" => "First",
			    		            "type" => "text");
						
				$options[] = array( "desc" => "Change last page text",
			    		            "id" => $shortname."_pagination_last_name",
			    		            "std" => "Last",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Relative Dates Text",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"desc" => "Change Posted text",
			    		            "id" => $shortname."_relative_posted",
			    	 	            "std" => "Posted",
			    		            "type" => "text");
				
				$options[] = array(	"desc" => "Change Ago text",
			    		            "id" => $shortname."_relative_ago",
			    	 	            "std" => "ago",
			    		            "type" => "text");
				
				$options[] = array(	"desc" => "Change plural text&nbsp;  [ i.e. hour &rarr; hours ]",
			    		            "id" => $shortname."_relative_s",
			    	 	            "std" => "s",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Year text",
			    		            "id" => $shortname."_relative_year",
			    		            "std" => "year",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Month text",
			    		            "id" => $shortname."_relative_month",
			    		            "std" => "month",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Week text",
			    		            "id" => $shortname."_relative_week",
			    		            "std" => "week",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Day text",
			    		            "id" => $shortname."_relative_day",
			    		            "std" => "day",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Hour text",
			    		            "id" => $shortname."_relative_hour",
			    		            "std" => "hour",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Minute text",
			    		            "id" => $shortname."_relative_minute",
			    		            "std" => "minute",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Second text",
			    		            "id" => $shortname."_relative_second",
			    		            "std" => "second",
			    		            "type" => "text");
									
				$options[] = array( "desc" => "Change Moments text",
			    		            "id" => $shortname."_relative_moments",
			    		            "std" => "moments",
			    		            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
						
$options[] = array(	"type" => "maintablebottom");

?>