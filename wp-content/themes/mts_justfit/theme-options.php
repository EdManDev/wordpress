<?php

defined('ABSPATH') or die;

/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );
/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
		'title' => __('A Section added by hook', 'mythemeshop'),
		'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'mythemeshop'),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array()
	);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
	$args = array();

	//Set it to dev mode to view the class settings/info in the form - default is false
	$args['dev_mode'] = false;
	//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
	//$args['stylesheet_override'] = true;

	//Add HTML before the form
	//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'mythemeshop');

	//Setup custom links in the footer for share icons
	$args['share_icons']['twitter'] = array(
		'link' => 'http://twitter.com/mythemeshopteam',
		'title' => 'Follow Us on Twitter', 
		'img' => 'fa fa-twitter-square'
	);
	$args['share_icons']['facebook'] = array(
		'link' => 'http://www.facebook.com/mythemeshop',
		'title' => 'Like us on Facebook', 
		'img' => 'fa fa-facebook-square'
	);

	//Choose to disable the import/export feature
	//$args['show_import_export'] = false;

	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$args['opt_name'] = MTS_THEME_NAME;

	//Custom menu icon
	//$args['menu_icon'] = '';

	//Custom menu title for options page - default is "Options"
	$args['menu_title'] = __('Theme Options', 'mythemeshop');

	//Custom Page Title for options page - default is "Options"
	$args['page_title'] = __('Theme Options', 'mythemeshop');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
	$args['page_slug'] = 'theme_options';

	//Custom page capability - default is set to "manage_options"
	//$args['page_cap'] = 'manage_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	//$args['page_type'] = 'submenu';

	//parent menu - default is set to "themes.php" (Appearance)
	//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	//$args['page_parent'] = 'themes.php';

	//custom page location - default 100 - must be unique or will override other items
	$args['page_position'] = 62;

	//Custom page icon class (used to override the page icon next to heading)
	//$args['page_icon'] = 'icon-themes';
			
	//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
	$args['help_tabs'][] = array(
		'id' => 'nhp-opts-1',
		'title' => __('Support', 'mythemeshop'),
		'content' => __('<p>If you are facing any problem with our theme or theme option panel, head over to our <a href="http://mythemeshop.com/support">Knowledge Base</a></p>', 'mythemeshop')
	);
	$args['help_tabs'][] = array(
		'id' => 'nhp-opts-3',
		'title' => __('Credit', 'mythemeshop'),
		'content' => __('<p>Options Panel created using the <a href="http://leemason.github.com/NHP-Theme-Options-Framework/" target="_blank">NHP Theme Options Framework</a> Version 1.0.5</p>', 'mythemeshop')
	);
	$args['help_tabs'][] = array(
		'id' => 'nhp-opts-2',
		'title' => __('Earn Money', 'mythemeshop'),
		'content' => __('<p>Earn 70% commision on every sale by refering your friends and readers. Join our <a href="http://mythemeshop.com/affiliate-program/">Affiliate Program</a>.</p>', 'mythemeshop')
	);

	//Set the Help Sidebar for the options page - no sidebar by default										
	//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'mythemeshop');

	$mts_patterns = array(
		'nobg' => array('img' => NHP_OPTIONS_URL.'img/patterns/nobg.png'),
		'pattern0' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern0.png'),
		'pattern1' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern1.png'),
		'pattern2' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern2.png'),
		'pattern3' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern3.png'),
		'pattern4' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern4.png'),
		'pattern5' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern5.png'),
		'pattern6' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern6.png'),
		'pattern7' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern7.png'),
		'pattern8' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern8.png'),
		'pattern9' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern9.png'),
		'pattern10' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern10.png'),
		'pattern11' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern11.png'),
		'pattern12' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern12.png'),
		'pattern13' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern13.png'),
		'pattern14' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern14.png'),
		'pattern15' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern15.png'),
		'pattern16' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern16.png'),
		'pattern17' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern17.png'),
		'pattern18' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern18.png'),
		'pattern19' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern19.png'),
		'pattern20' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern20.png'),
		'pattern21' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern21.png'),
		'pattern22' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern22.png'),
		'pattern23' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern23.png'),
		'pattern24' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern24.png'),
		'pattern25' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern25.png'),
		'pattern26' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern26.png'),
		'pattern27' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern27.png'),
		'pattern28' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern28.png'),
		'pattern29' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern29.png'),
		'pattern30' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern30.png'),
		'pattern31' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern31.png'),
		'pattern32' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern32.png'),
		'pattern33' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern33.png'),
		'pattern34' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern34.png'),
		'pattern35' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern35.png'),
		'pattern36' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern36.png'),
		'pattern37' => array('img' => NHP_OPTIONS_URL.'img/patterns/pattern37.png'),
		'hbg' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg.png'),
		'hbg2' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg2.png'),
		'hbg3' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg3.png'),
		'hbg4' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg4.png'),
		'hbg5' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg5.png'),
		'hbg6' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg6.png'),
		'hbg7' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg7.png'),
		'hbg8' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg8.png'),
		'hbg9' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg9.png'),
		'hbg10' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg10.png'),
		'hbg11' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg11.png'),
		'hbg12' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg12.png'),
		'hbg13' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg13.png'),
		'hbg14' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg14.png'),
		'hbg15' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg15.png'),
		'hbg16' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg16.png'),
		'hbg17' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg17.png'),
		'hbg18' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg18.png'),
		'hbg19' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg19.png'),
		'hbg20' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg20.png'),
		'hbg21' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg21.png'),
		'hbg22' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg22.png'),
		'hbg23' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg23.png'),
		'hbg24' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg24.png'),
		'hbg25' => array('img' => NHP_OPTIONS_URL.'img/patterns/hbg25.png')
	);

	$sections = array();

	$sections[] = array(
		'icon' => 'fa fa-cogs',
		'title' => __('General Settings', 'mythemeshop'),
		'desc' => __('<p class="description">This tab contains common setting options which will be applied to the whole theme.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_logo',
				'type' => 'upload',
				'title' => __('Logo Image', 'mythemeshop'), 
				'sub_desc' => __('Upload your logo using the Upload Button or insert image URL.', 'mythemeshop')
			),
			array(
				'id' => 'mts_footer_logo',
				'type' => 'upload',
				'title' => __('Footer Logo Image', 'mythemeshop'), 
				'sub_desc' => __('Upload your Footer logo using the Upload Button or insert image URL.', 'mythemeshop')
			),
			array(
				'id' => 'mts_favicon',
				'type' => 'upload',
				'title' => __('Favicon', 'mythemeshop'), 
				'sub_desc' => __('Upload a <strong>16 x 16 px</strong> image that will represent your website\'s favicon. You can refer to this link for more information on how to make it: <a href="http://www.favicon.cc/" target="blank" rel="nofollow">http://www.favicon.cc/</a>', 'mythemeshop')
			),
			array(
				'id' => 'mts_touch_icon',
				'type' => 'upload',
				'title' => __('Touch icon', 'mythemeshop'), 
				'sub_desc' => __('Upload a <strong>152 x 152 px</strong> image that will represent your website\'s touch icon for iOS 2.0+ and Android 2.1+ devices.', 'mythemeshop')
			),
			array(
				'id' => 'mts_metro_icon',
				'type' => 'upload',
				'title' => __('Metro icon', 'mythemeshop'), 
				'sub_desc' => __('Upload a <strong>144 x 144 px</strong> image that will represent your website\'s IE 10 Metro tile icon.', 'mythemeshop')
			),
			array(
				'id' => 'mts_twitter_username',
				'type' => 'text',
				'title' => __('Twitter Username', 'mythemeshop'),
				'sub_desc' => __('Enter your Username here.', 'mythemeshop'),
			),
			array(
				'id' => 'mts_feedburner',
				'type' => 'text',
				'title' => __('FeedBurner URL', 'mythemeshop'),
				'sub_desc' => __('Enter your FeedBurner\'s URL here, ex: <strong>http://feeds.feedburner.com/mythemeshop</strong> and your main feed (http://example.com/feed) will get redirected to the FeedBurner ID entered here.)', 'mythemeshop'),
				'validate' => 'url'
			),
			array(
				'id' => 'mts_header_code',
				'type' => 'textarea',
				'title' => __('Header Code', 'mythemeshop'), 
				'sub_desc' => __('Enter the code which you need to place <strong>before closing </head> tag</strong>. (ex: Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', 'mythemeshop')
			),
			array(
				'id' => 'mts_analytics_code',
				'type' => 'textarea',
				'title' => __('Footer Code', 'mythemeshop'), 
				'sub_desc' => __('Enter the codes which you need to place in your footer. <strong>(ex: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)</strong>.', 'mythemeshop')
			),
			array(
				'id' => 'mts_copyrights',
				'type' => 'textarea',
				'title' => __('Copyrights Text', 'mythemeshop'), 
				'sub_desc' => __('You can change or remove our link from footer and use your own custom text. (Link back is always appreciated)', 'mythemeshop'),
				'std' => 'Theme by <a href="http://mythemeshop.com/" rel="nofollow">MyThemeShop</a>'
			),
			array(
				'id' => 'mts_pagenavigation_type',
				'type' => 'radio',
				'title' => __('Pagination Type', 'mythemeshop'),
				'sub_desc' => __('Select pagination type.', 'mythemeshop'),
				'options' => array(
					'0'=> __('Default (Next / Previous)','mythemeshop'), 
					'1' => __('Numbered (1 2 3 4...)','mythemeshop'), 
					'2' => 'AJAX (Load More Button)', 
					'3' => 'AJAX (Auto Infinite Scroll)'
				),
				'std' => '0'
			),
			array(
				'id' => 'mts_ajax_search',
				'type' => 'button_set',
				'title' => __('AJAX Quick search', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Enable or disable search results appearing instantly below the search form', 'mythemeshop'),
				'std' => '0'
			),
			array(
				'id' => 'mts_responsive',
				'type' => 'button_set',
				'title' => __('Responsiveness', 'mythemeshop'),
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('MyThemeShop themes are responsive, which means they adapt to tablet and mobile devices, ensuring that your content is always displayed beautifully no matter what device visitors are using. Enable or disable responsiveness using this option.', 'mythemeshop'),
				'std' => '1'
			),
			array(
				'id' => 'mts_prefetching',
				'type' => 'button_set',
				'title' => __('Prefetching', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Enable or disable prefetching. If user is on homepage, then single page will load faster and if user is on single page, homepage will load faster in modern browsers.', 'mythemeshop'),
				'std' => '0'
			),
			array(
				'id' => 'mts_shop_products',
				'type' => 'text',
				'title' => __('No. of Products', 'mythemeshop' ),
				'sub_desc' => __('Enter the total number of products which you want to show on shop page (WooCommerce plugin must be enabled).', 'mythemeshop' ),
				'validate' => 'numeric',
				'std' => '9',
				'class' => 'small-text'
			),
		)
	);
	$sections[] = array(
		'icon' => 'fa fa-adjust',
		'title' => __('Styling Options', 'mythemeshop'),
		'desc' => __('<p class="description">Control the visual appearance of your theme, such as colors, layout and patterns, from here.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_color_scheme',
				'type' => 'color',
				'title' => __('Color Scheme', 'mythemeshop'), 
				'sub_desc' => __('The theme comes with unlimited color schemes for your theme\'s styling.', 'mythemeshop'),
				'std' => '#da0f16'
			),
			array(
				'id' => 'mts_layout',
				'type' => 'radio_img',
				'title' => __('Layout Style', 'mythemeshop'), 
				'sub_desc' => __('Choose the <strong>default sidebar position</strong> for your site. The position of the sidebar for individual posts can be set in the post editor.', 'mythemeshop'),
				'options' => array(
					'cslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/cs.png'),
					'sclayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/sc.png')
				),
				'std' => 'cslayout'
			),
			array(
				'id' => 'mts_first_footer',
				'type' => 'button_set_hide_below',
				'title' => __('Footer', 'mythemeshop'), 
				'sub_desc' => __('Enable or disable footer widget area with this option.', 'mythemeshop'),
				'options' => array( '0' => 'Off', '1' => 'On' ),
				'std' => '0'
				),
				array(
				'id' => 'mts_first_footer_num',
				'type' => 'button_set',
				'class' => 'green',
				'title' => __('Footer Layout', 'mythemeshop'), 
				'sub_desc' => __('Choose the number of widget areas in the <strong>footer</strong>', 'mythemeshop'),
				'options' => array(
					'3' => '3 Widgets',
					'4' => '4 Widgets'
				),
				'std' => '3'
			),
			array(
				'id' => 'mts_bg_color',
				'type' => 'color',
				'title' => __('Background Color', 'mythemeshop'), 
				'sub_desc' => __('Pick a color for the site background color.', 'mythemeshop'),
				'std' => '#eeeeee'
			),
			array(
				'id' => 'mts_bg_pattern',
				'type' => 'radio_img',
				'title' => __('Background Pattern', 'mythemeshop'), 
				'sub_desc' => __('Choose from any of <strong>63</strong> awesome background patterns for your site\'s background.', 'mythemeshop'),
				'options' => $mts_patterns,
				'std' => 'nobg'
			),
			array(
				'id' => 'mts_bg_pattern_upload',
				'type' => 'upload',
				'title' => __('Custom Background Image', 'mythemeshop'), 
				'sub_desc' => __('Upload your own custom background image or pattern.', 'mythemeshop')
			),
			array(
				'id' => 'mts_custom_css',
				'type' => 'textarea',
				'title' => __('Custom CSS', 'mythemeshop'), 
				'sub_desc' => __('You can enter custom CSS code here to further customize your theme. This will override the default CSS used on your site.', 'mythemeshop')
			),
			array(
				'id' => 'mts_lightbox',
				'type' => 'button_set',
				'title' => __('Lightbox', 'mythemeshop'),
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'mythemeshop'),
				'std' => '0'
			),
		)
	);
	$sections[] = array(
		'icon' => 'fa fa-credit-card',
		'title' => __('Header', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of header section.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_header_bg',
				'type' => 'color',
				'title' => __('Header Background Color', 'mythemeshop'), 
				'sub_desc' => __('Choose background color for your site header.', 'mythemeshop'),
				'std' => '#000000',
				'reset_at_version' => '1.2'
			),
			array(
				'id' => 'mts_show_primary_nav',
				'type' => 'button_set',
				'title' => __('Show Primary Menu', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Use this button to enable <strong>Primary Navigation Menu</strong>.', 'mythemeshop'),
				'std' => '1'
			),
			array(
				'id' => 'mts_header_section2',
				'type' => 'button_set',
				'title' => __('Show Logo', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Use this button to Show or Hide <strong>Logo</strong> completely.', 'mythemeshop'),
				'std' => '1'
			),
			array(
				'id' => 'mts_show_cart_buttons',
				'type' => 'button_set',
				'title' => __('Show Cart Buttons', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Use this button to Show or Hide <strong>Cart Buttons</strong> in header (WooCommerce must be enabled).', 'mythemeshop'),
				'std' => '1'
			),
		)
	);
	$sections[] = array(
		'icon' => 'fa fa-home',
		'title' => __('Home Layout', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the Homepage elements.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id'	  => 'mts_homepage_layout',
				'type'	=> 'layout',
				'title'   => 'Homepage Layout Manager',
				'sub_desc'	=> 'Organize how you want the layout to appear on the homepage',
				'options' => array(
					'enabled' => array(
						'featured'		=> __('Featured Area', 'mythemeshop'),
						'partner'		=> __('Our Partner', 'mythemeshop'),
						'training'		=>	__('Training', 'mythemeshop'),
						'trusted'		=>	__('Trusted Athletes', 'mythemeshop'),
						'benefits'		=> 	__('Benefits', 'mythemeshop'),
						'facility'		=> 	__('Facility', 'mythemeshop'),
						'ambition'		=> 	__('Ambition', 'mythemeshop'),
						'meal'			=> 	__('Meal Plan', 'mythemeshop'),
						'progress'		=> 	__('Athlete Progress', 'mythemeshop'),
					),
					'disabled'  => array()
				),
				'std' => array(
					'enabled' => array(
						'featured'		=> __('Featured Area', 'mythemeshop'),
						'partner'		=> __('Our Partner', 'mythemeshop'),
						'training'		=>	__('Training', 'mythemeshop'),
						'trusted'		=>	__('Trusted Athletes', 'mythemeshop'),
						'benefits'		=> 	__('Benefits', 'mythemeshop'),
						'facility'		=> 	__('Facility', 'mythemeshop'),
						'ambition'		=> 	__('Ambition', 'mythemeshop'),
						'meal'			=> 	__('Meal Plan', 'mythemeshop'),
						'progress'		=> 	__('Athlete Progress', 'mythemeshop'),
					),
					'disabled'  => array()
				)
			),
		)
	);	
	/* ==========================================================================
	Featured
	========================================================================== */
	$sections[] = array(
		'icon' => '',
		'title' => __('Featured Area', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_featured_background',
				'type' => 'upload',
				'title' => __('Featured Area Image', 'mythemeshop'), 
				'sub_desc' => __('Upload your Featured Area Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' => get_template_directory_uri().'/images/header-img.jpg'
			),
		  	array(
				'id' => 'mts_featured_area_title',
				'type' => 'text',
				'title' => __('Featured Area Title', 'mythemeshop'), 
				'sub_desc' => __('Featured Area Title', 'mythemeshop'),
				'std' => 'Fitness Reconfigured'
			),
		  	array(
				'id' => 'mts_featured_area_button',
				'type' => 'group',
				'title'	 => __('Featured Area Button', 'mythemeshop'), 
				'sub_desc'  => __('You can set up Call To Action buttons for the Featured Area.', 'mythemeshop'),
				'groupname' => __('featured area button', 'mythemeshop'), // Group name
				'subfields' => array(
					array('id' => 'mts_featured_area_button_label',
						'type' => 'text',
						'title' => __('Button Label', 'mythemeshop'), 
						'sub_desc' => __('Featured button text', 'mythemeshop'),
						'std' => 'Try us today'
					), 
					array('id' => 'mts_featured_area_button_link',
						'type' => 'text',
						'title' => __('Button Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for the featured button', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_featured_area_button_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'), 
						'sub_desc' => __('Pick a color for the featured button color.', 'mythemeshop'),
						'std' => '#ed1c24'
					),
				),
				'std' => array(
					'1' => array(
						'group_title' => '',
						'group_sort' => '1',
						'mts_featured_area_button_label' => 'Try Us Today',
						'mts_featured_area_button_link' => '#',
						'mts_featured_area_button_color' => '#ed1c24'
					)
				)
			),
		  	array(
				'id' => 'mts_featured_area_slides',
				'type' => 'group',
				'title' => __('Additional Slides', 'mythemeshop'), 
				'sub_desc'  => __('Use this option to show content slider in the Featured Area.', 'mythemeshop'),
				'groupname' => __('Slide', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_featured_area_slide_image',
						'type' => 'upload',
						'title' => __('Featured Area Image', 'mythemeshop'), 
						'sub_desc' => __('Upload your Featured Area Image using the Upload Button or insert image URL.', 'mythemeshop'),
						'std' => ''
					),
				  	array(
						'id' => 'mts_featured_area_slide_title',
						'type' => 'text',
						'title' => __('Featured Area Title', 'mythemeshop'), 
						'sub_desc' => __('Featured Area Title', 'mythemeshop'),
						'std' => 'Fitness Reconfigured'
					),
					array('id' => 'mts_featured_area_slide_button_label',
						'type' => 'text',
						'title' => __('Button Label', 'mythemeshop'), 
						'sub_desc' => __('Leave empty to not show CTA button.', 'mythemeshop'),
						'std' => 'Try us today'
					), 
					array('id' => 'mts_featured_area_slide_button_link',
						'type' => 'text',
						'title' => __('Button Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for the featured button', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_featured_area_slide_button_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'), 
						'sub_desc' => __('Pick a color for the featured button.', 'mythemeshop'),
						'std' => '#ed1c24'
					),
				),
				'std' => array()
			),
			array(
				'id' => 'mts_featured_text_align',
				'type' => 'button_set',
				'title' => __('Text Alignment', 'mythemeshop'), 
				'options' => array('left' => __('Left','mythemeshop'), 'center' => __('Center','mythemeshop'), 'right' => __('Right','mythemeshop')),
				'sub_desc' => __('Choose text alignment for featured section.', 'mythemeshop'),
				'std' => 'center',
				'class' => 'green',
				'reset_at_version' => '1.2'
			),
		)
	);	

	$sections[] = array(
		'icon' => '',
		'title' => __('Our Partners', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_our_partners_title',
				'type' => 'text',
				'title' => __('Our Partners Title', 'mythemeshop'), 
				'sub_desc' => __('Our Partners Title', 'mythemeshop'),
				'std' => 'Our Partners'
			),
		  	array(
				'id' => 'mts_our_partner',
				'type' => 'group',
				'title'	 => __('Our Partners', 'mythemeshop'), 
				'sub_desc'  => __('Our Partners', 'mythemeshop'),
				'groupname' => __('Our Partners', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_our_partner_image',
						'type' => 'upload',
						'title' => __('Image', 'mythemeshop'), 
						'sub_desc' => __('Upload or select an image for Our Partners', 'mythemeshop'),
						'return' => 'id'
					),	
					array('id' => 'mts_our_partner_link',
						'type' => 'text',
						'title' => __('Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Our Partners', 'mythemeshop'),
						'std' => '#'
					),
				),
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Training', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_training_title',
				'type' => 'text',
				'title' => __('Train With Us Title', 'mythemeshop'), 
				'sub_desc' => __('Training With Us Title', 'mythemeshop'),
				'std' => 'Train With Us'
			),
		  	array(
				'id' => 'mts_training',
				'type' => 'group',
				'title'	 => __('Training', 'mythemeshop'), 
				'sub_desc'  => __('Add various trainings here', 'mythemeshop'),
				'groupname' => __('Training', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_training_image',
						'type' => 'upload',
						'title' => __('Image', 'mythemeshop'), 
						'sub_desc' => __('Upload or select an image for Training(Recommended Size: 96x96px)', 'mythemeshop'),
						'return' => 'id'
					),
					array('id' => 'mts_training_text',
						'type' => 'text',
						'title' => __('Title', 'mythemeshop'), 
						'sub_desc' => __('Title for Training', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_training_description',
						'type' => 'textarea',
						'title' => __('Description', 'mythemeshop'), 
						'sub_desc' => __('Description for Training', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_training_link',
						'type' => 'text',
						'title' => __('Link(optional)', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Training', 'mythemeshop'),
						'std' => '#'
					),
				),
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Trusted Athletes', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_athletes_title',
				'type' => 'text',
				'title' => __('Our Trusted Athletes Title', 'mythemeshop'), 
				'sub_desc' => __('Our Trusted Athletes Title', 'mythemeshop'),
				'std' => 'Our Trusted Athletes'
			),
		  	array(
				'id' => 'mts_athletes_button_title',
				'type' => 'text',
				'title' => __('Our Trusted Athletes Button Text', 'mythemeshop'), 
				'sub_desc' => __('Our Trusted Athletes Button Text', 'mythemeshop'),
				'std' => 'Read their stories'
			),
		  	array(
				'id' => 'mts_athletes_button_link',
				'type' => 'text',
				'title' => __('Our Trusted Athletes Button Link', 'mythemeshop'), 
				'sub_desc' => __('Our Trusted Athletes Button Link', 'mythemeshop'),
				'std' => '#'
			),
		  	array(
				'id' => 'mts_athletes_button_color',
				'type' => 'color',
				'title' => __('Our Trusted Athletes Button Color', 'mythemeshop'), 
				'sub_desc' => __('Our Trusted Athletes Button Color', 'mythemeshop'),
				'std' => '#ed1c24'
			),
		  	array(
				'id' => 'mts_athletes_image',
				'type' => 'upload',
				'title' => __('Our Trusted Athletes Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Our Trusted Athletes Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/athletic.png'
			),
		  	array(
				'id' => 'mts_left_athletes_name',
				'type' => 'text',
				'title' => __('Left Trusted Athletes Name', 'mythemeshop'), 
				'sub_desc' => __('Left Trusted Athletes Name', 'mythemeshop'),
				'std' => 'Jessica'
			),
		  	array(
				'id' => 'mts_left_athletes_description',
				'type' => 'text',
				'title' => __('Left Trusted Athletes Description', 'mythemeshop'), 
				'sub_desc' => __('Left Trusted Athletes Description', 'mythemeshop'),
				'std' => 'Trusted female athletic since June, 2010'
			),
		  	array(
				'id' => 'mts_right_athletes_name',
				'type' => 'text',
				'title' => __('right Trusted Athletes Name', 'mythemeshop'), 
				'sub_desc' => __('right Trusted Athletes Name', 'mythemeshop'),
				'std' => 'Chris'
			),
			array(
				'id' => 'mts_right_athletes_description',
				'type' => 'text',
				'title' => __('right Trusted Athletes Description', 'mythemeshop'), 
				'sub_desc' => __('right Trusted Athletes Description', 'mythemeshop'),
				'std' => 'Trusted athletic since September, 2008.'
			),
				array(
				'id' => 'mts_athletes_background_image',
				'type' => 'upload',
				'title' => __('Our Trusted Athletes Background Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Our Trusted Athletes Background Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/members-back.png'
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Benefits', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_benefits_title',
				'type' => 'text',
				'title' => __('JustFit Benefits Title', 'mythemeshop'), 
				'sub_desc' => __('JustFit Benefits Title', 'mythemeshop'),
				'std' => 'JustFit Benefits'
			),
		  	array(
				'id' => 'mts_benefits_description',
				'type' => 'textarea',
				'title' => __('JustFit Benefits Description', 'mythemeshop'), 
				'sub_desc' => __('JustFit Benefits Description', 'mythemeshop'),
				'std' => 'In case you aren’t convinced with our gym services yet, here are some of many benefits that you receive by signing up.'
			),
		  	array(
				'id' => 'mts_benefits',
				'type' => 'group',
				'title'	 => __('Benefits', 'mythemeshop'), 
				'sub_desc'  => __('Benefits', 'mythemeshop'),
				'groupname' => __('Benefit', 'mythemeshop'), // Group name
				'subfields' => array(
					array('id' => 'mts_benefits_text',
						'type' => 'text',
						'title' => __('Title', 'mythemeshop'), 
						'sub_desc' => __('Title for Benefits', 'mythemeshop'),
						'std' => ''
					),
					array(
						'id' => 'mts_benefits_icon',
						'type' => 'icon_select',
						'allow_empty' => false,
						'title' => __('Icon Select', 'mythemeshop'), 
						'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
					),
					array('id' => 'mts_benefits_description',
						'type' => 'textarea',
						'title' => __('Description', 'mythemeshop'), 
						'sub_desc' => __('Description for Benefits', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_benefits_link',
						'type' => 'text',
						'title' => __('Link(optional)', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Benefits', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_benefits_icon_color',
						'type' => 'color',
						'title' => __('Icon Background Color', 'mythemeshop'), 
						'sub_desc' => __('Choose background color for Icon', 'mythemeshop'),
						'std' => '#444',
						'reset_at_version' => '1.2'
					),
				),
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Facilities', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_facility_title',
				'type' => 'text',
				'title' => __('Facility Title', 'mythemeshop'), 
				'sub_desc' => __('JustFit Facility Title', 'mythemeshop'),
				'std' => 'Our Facilities'
			),
		  	array(
				'id' => 'mts_facility_description',
				'type' => 'textarea',
				'title' => __('Facility Description', 'mythemeshop'), 
				'sub_desc' => __('JustFit Facility Description', 'mythemeshop'),
				'std' => 'Loads of new service standards, new ways to train and relax afterwards will make this your fittest year so far.'
			),
		  	array(
				'id' => 'mts_facility',
				'type' => 'group',
				'title'	 => __('Facility', 'mythemeshop'), 
				'sub_desc'  => __('Add Facilities here', 'mythemeshop'),
				'groupname' => __('Facility', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_facility_image',
						'type' => 'upload',
						'title' => __('Image', 'mythemeshop'), 
						'sub_desc' => __('Upload or select an image for Facility(Recommended Size: 240x240px)', 'mythemeshop'),
						'return' => 'id'
					),
					array('id' => 'mts_facility_text',
						'type' => 'text',
						'title' => __('Title', 'mythemeshop'), 
						'sub_desc' => __('Title for Facility', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_facility_description',
						'type' => 'textarea',
						'title' => __('Description', 'mythemeshop'), 
						'sub_desc' => __('Description for Facility', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_facility_link',
						'type' => 'text',
						'title' => __('Link(optional)', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Facility', 'mythemeshop'),
						'std' => '#'
					),
				),
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Ambition', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_ambition_title',
				'type' => 'text',
				'title' => __('Fuel Your Ambition Title', 'mythemeshop'), 
				'sub_desc' => __('Fuel Your Ambition Title', 'mythemeshop'),
				'std' => 'Fuel Your Ambition'
			),
		  	array(
				'id' => 'mts_ambition_description',
				'type' => 'textarea',
				'title' => __('Ambition Description', 'mythemeshop'), 
				'sub_desc' => __('Ambition Description', 'mythemeshop'),
				'std' => "Whether you're looking to bulk up, enhance workout performance, improve recovery or shed unwanted body fat, we have a great range of products to help take your training to new heights. Our selection of Muscle & Strength products provide the ultimate selection of protein powders, amino acids, weight gainers and recovery formulas to ensure you have the nutrition you need to achieve your goals."
			),
		  	array(
				'id' => 'mts_ambition_image',
				'type' => 'upload',
				'title' => __('Ambition Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Ambition Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/supp-img.png'
			),
		  	array(
				'id' => 'mts_ambition_background_image',
				'type' => 'upload',
				'title' => __('Ambition Background Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Ambition Background Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/supp-back.png'
			),
		  	array(
				'id' => 'mts_ambition_button',
				'type' => 'group',
				'title'	 => __('Ambition Button', 'mythemeshop'), 
				'sub_desc'  => __('Ambition Button', 'mythemeshop'),
				'groupname' => __('Ambition Button', 'mythemeshop'), // Group name
				'subfields' => array(
					array('id' => 'mts_ambition_button_label',
						'type' => 'text',
						'title' => __('Button Label', 'mythemeshop'), 
						'sub_desc' => __('featured button text', 'mythemeshop'),
						'std' => 'Shop Supplements'
					), 
					array('id' => 'mts_ambition_button_link',
						'type' => 'text',
						'title' => __('Button Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for the featured button', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_ambition_button_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'), 
						'sub_desc' => __('Pick a color for the featured button color.', 'mythemeshop'),
						'std' => '#ed1c24'
					),
				),
				'std' => array(
					'1' => array(
						'group_title' => '',
						'group_sort' => '1',
						'mts_ambition_button_label' => 'Shop Supplements',
						'mts_ambition_button_link' => '#',
						'mts_ambition_button_color' => '#ed1c24'
					)
				)
			),
		)
	);

	$sections[] = array(
		'icon' => '',
		'title' => __('Meals Plan', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_meal_title',
				'type' => 'text',
				'title' => __(' Meal Title', 'mythemeshop'), 
				'sub_desc' => __('Meal Title', 'mythemeshop'),
				'std' => 'Meal Plans'
			),
		  	array(
				'id' => 'mts_meal_description',
				'type' => 'textarea',
				'title' => __('Meal Description', 'mythemeshop'), 
				'sub_desc' => __('Meal Description', 'mythemeshop'),
				'std' => "Take the guesswork out of eating healthy and losing weight. Our daily meal plans can help you healthfully lose up to 2 pounds a week. The plans are designed by EatingWell’s nutrition staff with a variety of healthy, delicious recipes to meet your nutrition needs."
			),
		  	array(
				'id' => 'mts_meal_image',
				'type' => 'upload',
				'title' => __('Meal Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Meal Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/meal.png'
			),
		  	array(
				'id' => 'mts_meal_background_image',
				'type' => 'upload',
				'title' => __('Meal Background Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Meal Background Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/supp-back.png'
			),
		  	array(
				'id' => 'mts_meal',
				'type' => 'group',
				'title'	 => __('Meals', 'mythemeshop'), 
				'sub_desc'  => __('Add your Meal Plans here', 'mythemeshop'),
				'groupname' => __('Meal', 'mythemeshop'), // Group name
				'subfields' => array(
					array('id' => 'mts_meal_text',
						'type' => 'text',
						'title' => __('Title', 'mythemeshop'), 
						'sub_desc' => __('Title for Meal', 'mythemeshop'),
						'std' => ''
					),
					array(
						'id' => 'mts_meal_icon',
						'type' => 'icon_select',
						'allow_empty' => false,
						'title' => __('Icon Select', 'mythemeshop'), 
						'sub_desc' => __('Select an icon from the vector icon set.', 'mythemeshop')
					),
					array('id' => 'mts_meal_description',
						'type' => 'textarea',
						'title' => __('Description', 'mythemeshop'), 
						'sub_desc' => __('Description for Meal', 'mythemeshop'),
						'std' => ''
					),
					array('id' => 'mts_meal_link',
						'type' => 'text',
						'title' => __('Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Meal', 'mythemeshop'),
						'std' => '#'
					),
				),
			),
		  	array(
				'id' => 'mts_meal_button',
				'type' => 'group',
				'title' => __('Meal Button', 'mythemeshop'), 
				'sub_desc'  => __('Add Buttons from here', 'mythemeshop'),
				'groupname' => __('Meal Button', 'mythemeshop'), // Group name
				'subfields' => array(
					
					array('id' => 'mts_meal_button_label',
						'type' => 'text',
						'title' => __('Button Label', 'mythemeshop'), 
						'sub_desc' => __('Meal button text', 'mythemeshop'),
						'std' => 'See Meal Plans'
					), 
					array('id' => 'mts_meal_button_link',
						'type' => 'text',
						'title' => __('Button Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for the Meal', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_meal_button_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'), 
						'sub_desc' => __('Pick a color for the Meal button color.', 'mythemeshop'),
						'std' => '#ed1c24'
					),
				),
				'std' => array(
					'1' => array(
						'group_title' => '',
						'group_sort' => '1',
						'mts_meal_button_label' => 'See Meal Plans',
						'mts_meal_button_link' => '#',
						'mts_meal_button_color' => '#ed1c24'
					)
				)
			),
		)
	);	

	$sections[] = array(
		'icon' => '',
		'title' => __('Athlete Progress', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the homepage.</p>', 'mythemeshop'),
		'fields' => array(
		  	array(
				'id' => 'mts_progress_title',
				'type' => 'text',
				'title' => __('Athlete Progress Title', 'mythemeshop'), 
				'sub_desc' => __('Athlete Progress Title', 'mythemeshop'),
				'std' => 'Athlete Progress'
			),
		  	array(
				'id' => 'mts_progress_description',
				'type' => 'textarea',
				'title' => __('Athlete Progress Description', 'mythemeshop'), 
				'sub_desc' => __('Athlete Progress Description', 'mythemeshop'),
				'std' => 'Thousands have already been successful with our gym services. You are only one step away from your glory and success. It’s your time to shine.'
			),
		  	array(
				'id' => 'mts_progress_background_image',
				'type' => 'upload',
				'title' => __('Athlete Progress Background Image', 'mythemeshop'), 
				'sub_desc' => __('Upload Athlete Progress Background Image using the Upload Button or insert image URL.', 'mythemeshop'),
				'std' =>  get_template_directory_uri().'/images/members-back.png'
			),
		  	array(
				'id' => 'mts_progress',
				'type' => 'group',
				'title'	 => __('Athlete Progress', 'mythemeshop'), 
				'sub_desc'  => __('Athlete Progress', 'mythemeshop'),
				'groupname' => __('Athlete Progress', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_progress_image',
						'type' => 'upload',
						'title' => __('Image', 'mythemeshop'), 
						'sub_desc' => __('Upload or select an image for Athlete Progress', 'mythemeshop'),
						'return' => 'id'
					),	
					array('id' => 'mts_progress_link',
						'type' => 'text',
						'title' => __('Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for Athlete Progress. Enable <strong>Lightbox</strong> from Styling Tab to show YouTube Videos in Lightbox.', 'mythemeshop'),
						'std' => '#'
					),
				),
			),
			array(
				'id' => 'mts_progress_button',
				'type' => 'group',
				'title'	 => __('Athlete Progress Button', 'mythemeshop'), 
				'sub_desc'  => __('Athlete Progress Button', 'mythemeshop'),
				'groupname' => __('Athlete Progress button', 'mythemeshop'), // Group name
				'subfields' => array(
					
					array('id' => 'mts_progress_button_label',
						'type' => 'text',
						'title' => __('Button Label', 'mythemeshop'), 
						'sub_desc' => __('Athlete Progress button text', 'mythemeshop'),
						'std' => 'Sign Up Now'
					), 
					array('id' => 'mts_progress_button_link',
						'type' => 'text',
						'title' => __('Button Link', 'mythemeshop'), 
						'sub_desc' => __('Insert a link URL for the Athlete Progress button', 'mythemeshop'),
						'std' => '#'
					),
					array(
						'id' => 'mts_progress_color',
						'type' => 'color',
						'title' => __('Background Color', 'mythemeshop'), 
						'sub_desc' => __('Pick a color for the Athlete Progress button color.', 'mythemeshop'),
						'std' => '#ed1c24'
						),
				),
			),
		)
	);

	$sections[] = array(
		'icon' => 'fa fa-th-list',
		'title' => __('Blog Page', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the elements of the Blog Page.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_featured_categories',
				'type' => 'group',
				'title' => __('Featured Categories', 'mythemeshop'), 
				'sub_desc'  => __('Select categories appearing on the Blog Page.', 'mythemeshop'),
				'groupname' => __('Section', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_featured_category',
						'type' => 'cats_select',
						'title' => __('Category', 'mythemeshop'), 
						'sub_desc' => __('Select a category or the latest posts for this section', 'mythemeshop'),
						'std' => 'latest',
						'args' => array('include_latest' => 1, 'hide_empty' => 0),
					),
					array(
						'id' => 'mts_featured_category_postsnum',
						'type' => 'text',
						'class' => 'small-text',
						'title' => __('Number of posts', 'mythemeshop'), 
						'sub_desc' => sprintf(__('Enter the number of posts to show in this section.<br/><strong>For Latest Posts</strong>, this setting will be ignored, and number set in <a href="%s" target="_blank">Settings&nbsp;&gt;&nbsp;Reading</a> will be used instead.', 'mythemeshop'), admin_url('options-reading.php')),
						'std' => '3',
						'args' => array('type' => 'number')
					),
				),
				'std' => array(
					'1' => array(
						'group_title' => '',
						'group_sort' => '1',
						'mts_featured_category' => 'latest',
						'mts_featured_category_postsnum' => get_option('posts_per_page')
					)
				)
			),
			array(
				'id' => 'mts_home_headline_meta_info',
				'type' => 'layout',
				'title'	=> __('HomePage Post Meta Info', 'mythemeshop'),
				'sub_desc' => __('Organize how you want the post meta info to appear on the Blog Page', 'mythemeshop'),
				'options'  => array(
					'enabled'  => array(
						'author'   => __('Author Name','mythemeshop'),
						'category' => __('Categories','mythemeshop')
					),
					'disabled' => array(
						'comment'  => __('Comment Count','mythemeshop')
					)
				),
				'std'  => array(
					'enabled'  => array(
						'author'   => __('Author Name','mythemeshop'),
						'category' => __('Categories','mythemeshop')
					),
					'disabled' => array(
						 'comment'  => __('Comment Count','mythemeshop')
					)
				)
			),
		   array(
				'id' => 'mts_date_blog',
				'type' => 'button_set',
				'title' => __('Show Date on Blog Posts', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Show Date on Blog Posts', 'mythemeshop'),
				'std' => '1'
			),
		)
	);

	$sections[] = array(
		'icon' => 'fa fa-file-text',
		'title' => __('Single Posts', 'mythemeshop'),
		'desc' => __('<p class="description">From here, you can control the appearance and functionality of your single posts page.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_single_post_layout',
				'type'	 => 'layout2',
				'title'	=> __('Single Post Layout', 'mythemeshop'),
				'sub_desc' => __('Customize the look of single posts', 'mythemeshop'),
				'options'  => array(
					'enabled'  => array(
						'content'   => array(
							'label' 	=> __('Post Content','mythemeshop'),
							'subfields'	=> array()
						),
						'related'   => array(
							'label' 	=> __('Related Posts','mythemeshop'),
							'subfields'	=> array(
								array(
									'id' => 'mts_related_posts_taxonomy',
									'type' => 'button_set',
									'title' => __('Related Posts Taxonomy', 'mythemeshop') ,
									'options' => array(
										'tags' => 'Tags',
										'categories' => 'Categories'
									) ,
									'class' => 'green',
									'sub_desc' => __('Related Posts based on tags or categories.', 'mythemeshop') ,
									'std' => 'categories'
								),
								array(
									'id' => 'mts_related_postsnum',
									'type' => 'text',
									'class' => 'small-text',
									'title' => __('Number of related posts', 'mythemeshop') ,
									'sub_desc' => __('Enter the number of posts to show in the related posts section.', 'mythemeshop') ,
									'std' => '4',
									'args' => array(
										'type' => 'number'
									)
								),
							)
						),
						'author'   => array(
							'label' 	=> __('Author Box','mythemeshop'),
							'subfields'	=> array(
								array(
									'id' => 'mts_authorbox_email_id',
									'type' => 'button_set',
									'title' => __('Email ID', 'mythemeshop'), 
									'options' => array('0' => 'Off','1' => 'On'),
									'sub_desc' => __('Use this button to show email id of Author in Author Box.', 'mythemeshop'),
									'std' => '1'
								),
							)
						),
					),
					'disabled' => array(
						'tags'   => array(
							'label' 	=> __('Tags','mythemeshop'),
							'subfields'	=> array(
							)
						),
					)
				)
			),
			array(
				'id' => 'mts_single_headline_meta_info',
				'type'	 => 'layout',
				'title'	=> __('Meta Info to Show', 'mythemeshop'),
				'sub_desc' => __('Organize how you want the post meta info to appear', 'mythemeshop'),
				'options'  => array(
					'enabled'  => array(
						'author'   => __('Author Name','mythemeshop'),
						'date'	 => __('Date','mythemeshop'),
						'category' => __('Categories','mythemeshop'),
						'comment'  => __('Comment Count','mythemeshop')
					),
					'disabled' => array()
				),
				'std'  => array(
					'enabled'  => array(
						'author'   => __('Author Name','mythemeshop'),
						'date'	 => __('Date','mythemeshop'),
						'category' => __('Categories','mythemeshop'),
						'comment'  => __('Comment Count','mythemeshop')
					),
					'disabled' => array()
				)
			),
			array(
				'id' => 'mts_breadcrumb',
				'type' => 'button_set',
				'title' => __('Breadcrumbs', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Breadcrumbs are a great way to make your site more user-friendly. You can enable them by checking this box.', 'mythemeshop'),
				'std' => '1'
			),
			array(
				'id' => 'mts_author_comment',
				'type' => 'button_set',
				'title' => __('Highlight Author Comment', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Use this button to highlight author comments.', 'mythemeshop'),
				'std' => '1'
			),
			array(
				'id' => 'mts_comment_date',
				'type' => 'button_set',
				'title' => __('Date in Comments', 'mythemeshop'), 
				'options' => array('0' => 'Off','1' => 'On'),
				'sub_desc' => __('Use this button to show the date for comments.', 'mythemeshop'),
				'std' => '1'
			),
		)
	);

	$sections[] = array(
		'icon' => 'fa fa-group',
		'title' => __('Social Buttons', 'mythemeshop'),
		'desc' => __('<p class="description">Enable or disable social sharing buttons on single posts using these buttons.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_social_button_position',
				'type' => 'button_set',
				'title' => __('Social Sharing Buttons Position', 'mythemeshop'), 
				'options' => array('top' => __('Above Content','mythemeshop'), 'bottom' => __('Below Content','mythemeshop'), 'floating' => __('Floating','mythemeshop')),
				'sub_desc' => __('Choose position for Social Sharing Buttons.', 'mythemeshop'),
				'std' => 'floating',
				'class' => 'green'
			),
			array(
				'id' => 'mts_social_buttons',
				'type'	 => 'layout',
				'title'	=> __('Social Media Buttons', 'mythemeshop'),
				'sub_desc' => __('Organize how you want the social sharing buttons to appear on single posts', 'mythemeshop'),
				'options'  => array(
					'enabled'  => array(
						'twitter'   => __('Twitter','mythemeshop'),
						'gplus'	 => __('Google Plus','mythemeshop'),
						'facebook'  => __('Facebook Like','mythemeshop'),
						'pinterest' => __('Pinterest','mythemeshop'),
					),
					'disabled' => array(
						'linkedin'  => __('LinkedIn','mythemeshop'),
						'stumble'   => __('StumbleUpon','mythemeshop'),
					)
				),
				'std'  => array(
					'enabled'  => array(
						'twitter'   => __('Twitter','mythemeshop'),
						'gplus'	 => __('Google Plus','mythemeshop'),
						'facebook'  => __('Facebook Like','mythemeshop'),
						'pinterest' => __('Pinterest','mythemeshop'),
					),
					'disabled' => array(
						'linkedin'  => __('LinkedIn','mythemeshop'),
						'stumble'   => __('StumbleUpon','mythemeshop'),
					)
				)
			),
		)
	);

	$sections[] = array(
		'icon' => 'fa fa-bar-chart-o',
		'title' => __('Ad Management', 'mythemeshop'),
		'desc' => __('<p class="description">Now, ad management is easy with our options panel. You can control everything from here, without using separate plugins.</p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_posttop_adcode',
				'type' => 'textarea',
				'title' => __('Below Post Title', 'mythemeshop'), 
				'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below your article title on single posts.', 'mythemeshop')
			),
			array(
				'id' => 'mts_posttop_adcode_time',
				'type' => 'text',
				'title' => __('Show After X Days', 'mythemeshop'), 
				'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'mythemeshop'),
				'validate' => 'numeric',
				'std' => '0',
				'class' => 'small-text',
				'args' => array('type' => 'number')
			),
			array(
				'id' => 'mts_postend_adcode',
				'type' => 'textarea',
				'title' => __('Below Post Content', 'mythemeshop'), 
				'sub_desc' => __('Paste your Adsense, BSA or other ad code here to show ads below the post content on single posts.', 'mythemeshop')
			),
			array(
				'id' => 'mts_postend_adcode_time',
				'type' => 'text',
				'title' => __('Show After X Days', 'mythemeshop'), 
				'sub_desc' => __('Enter the number of days after which you want to show the Below Post Title Ad. Enter 0 to disable this feature.', 'mythemeshop'),
				'validate' => 'numeric',
				'std' => '0',
				'class' => 'small-text',
				'args' => array('type' => 'number')
			),
		)
	);

	$sections[] = array(
		'icon' => 'fa fa-columns',
		'title' => __('Sidebars', 'mythemeshop'),
		'desc' => __('<p class="description">Now you have full control over the sidebars. Here you can manage sidebars and select one for each section of your site, or select a custom sidebar on a per-post basis in the post editor.<br></p>', 'mythemeshop'),
		'fields' => array(
			array(
				'id' => 'mts_custom_sidebars',
				'type' => 'group', //doesn't need to be called for callback fields
				'title' => __('Custom Sidebars', 'mythemeshop'), 
				'sub_desc' => __('Add custom sidebars. <strong>You need to save the changes to use the sidebars in the dropdowns below.</strong><br />You can add content to the sidebars in Appearance &gt; Widgets.', 'mythemeshop'),
				'groupname' => __('Sidebar', 'mythemeshop'), // Group name
				'subfields' => array(
					array(
						'id' => 'mts_custom_sidebar_name',
						'type' => 'text',
						'title' => __('Name', 'mythemeshop'), 
						'sub_desc' => __('Example: Homepage Sidebar', 'mythemeshop')
					),	
					array(
						'id' => 'mts_custom_sidebar_id',
						'type' => 'text',
						'title' => __('ID', 'mythemeshop'), 
						'sub_desc' => __('Enter a unique ID for the sidebar. Use only alphanumeric characters, underscores (_) and dashes (-), eg. "sidebar-home"', 'mythemeshop'),
						'std' => 'sidebar-'
					),
				),
			),
			array(
				'id' => 'mts_sidebar_for_blog',
				'type' => 'sidebars_select',
				'title' => __('Blog', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the Blog.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_post',
				'type' => 'sidebars_select',
				'title' => __('Single Post', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'mythemeshop'),
				'args' => array('exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_page',
				'type' => 'sidebars_select',
				'title' => __('Single Page', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'mythemeshop'),
				'args' => array('exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_archive',
				'type' => 'sidebars_select',
				'title' => __('Archive', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_category',
				'type' => 'sidebars_select',
				'title' => __('Category Archive', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the category archives.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_tag',
				'type' => 'sidebars_select',
				'title' => __('Tag Archive', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the tag archives.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_date',
				'type' => 'sidebars_select',
				'title' => __('Date Archive', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the date archives.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_author',
				'type' => 'sidebars_select',
				'title' => __('Author Archive', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the author archives.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_search',
				'type' => 'sidebars_select',
				'title' => __('Search', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the search results.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_notfound',
				'type' => 'sidebars_select',
				'title' => __('404 Error', 'mythemeshop'), 
				'sub_desc' => __('Select a sidebar for the 404 Not found pages.', 'mythemeshop'),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => ''
			),
			array(
				'id' => 'mts_sidebar_for_shop',
				'type' => 'sidebars_select',
				'title' => __('Shop Pages', 'mythemeshop' ), 
				'sub_desc' => __('Select a sidebar for Shop main page and product archive pages (WooCommerce plugin must be enabled). Default is <strong>Shop Page Sidebar</strong>.', 'mythemeshop' ),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => 'shop-sidebar'
			),
			array(
				'id' => 'mts_sidebar_for_product',
				'type' => 'sidebars_select',
				'title' => __('Single Product', 'mythemeshop' ), 
				'sub_desc' => __('Select a sidebar for single products (WooCommerce plugin must be enabled). Default is <strong>Single Product Sidebar</strong>.', 'mythemeshop' ),
				'args' => array('allow_nosidebar' => false, 'exclude' => array('sidebar', 'footer-first', 'footer-first-2', 'footer-first-3', 'footer-first-4', 'footer-second', 'footer-second-2', 'footer-second-3', 'footer-second-4', 'widget-header','shop-sidebar', 'product-sidebar')),
				'std' => 'product-sidebar'
			),
		),
	);


	$sections[] = array(
		'icon' => 'fa fa-list-alt',
		'title' => __('Navigation', 'mythemeshop'),
		'desc' => __('<p class="description"><div class="controls">Navigation settings can now be modified from the <a href="nav-menus.php"><b>Menus Section</b></a>.<br></div></p>', 'mythemeshop')
	);
					
					
	$tabs = array();

	$args['presets'] = array();
	include('theme-presets.php');

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function

/*--------------------------------------------------------------------
 * 
 * Default Font Settings
 *
 --------------------------------------------------------------------*/
if(function_exists('mts_register_typography')) { 
	mts_register_typography(array(
		'logo_font' => array(
			'preview_text' => __( 'Logo Font', 'mythemeshop' ),
			'preview_color' => 'dark',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '26px',
			'font_color' => '#ffffff',
			'css_selectors' => '#logo a',
			'additional_css' => 'text-transform: uppercase;'
		),
		'navigation_font' => array(
			'preview_text' => __( 'Navigation Font', 'mythemeshop' ),
			'preview_color' => 'dark',
			'font_family' => 'Open Sans',
			'font_variant' => '600',
			'font_size' => '13px',
			'font_color' => '#c2c2c2',
			'css_selectors' => '.menu li, .menu li a'
		),
		'home_title_font' => array(
			'preview_text' => __( 'Blog Article Title', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_size' => '20px',
			'font_variant' => '700',
			'font_color' => '#000000',
			'css_selectors' => '.latestPost .title',
			'additional_css' => 'text-transform: uppercase;'
		),
		'single_title_font' => array(
			'preview_text' => __( 'Single Article Title', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_size' => '30px',
			'font_variant' => '700',
			'font_color' => '#000000',
			'css_selectors' => '.single-title',
			'additional_css' => 'text-transform: uppercase;'
		),
		'content_font' => array(
			'preview_text' => __( 'Content Font', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Open Sans',
			'font_size' => '14px',
			'font_variant' => 'normal',
			'font_color' => '#555555',
			'css_selectors' => 'body'
		),
		'sidebar_font' => array(
			'preview_text' => __( 'Sidebar Font', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Open Sans',
			'font_variant' => 'normal',
			'font_size' => '15px',
			'font_color' => '#000000',
			'css_selectors' => '#sidebars .widget'
		),
		'sidebar_title_font' => array(
			'preview_text' => __( 'Sidebar Title Font', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Open Sans',
			'font_variant' => '700',
			'font_size' => '20px',
			'font_color' => '#000000',
			'css_selectors' => '.sidebar .widget h3'
		),
		'footer_font' => array(
			'preview_text' => __( 'Footer Font', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Open Sans',
			'font_variant' => '600',
			'font_size' => '13px',
			'font_color' => '#909090',
			'css_selectors' => 'footer.footer, .footer-widgets'
		),
		'h1_headline' => array(
			'preview_text' => __( 'Content H1', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '30px',
			'font_color' => '#000000',
			'css_selectors' => 'h1'
		),
		'h2_headline' => array(
			'preview_text' => __( 'Content H2', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '26px',
			'font_color' => '#000000',
			'css_selectors' => 'h2'
		),
		'h3_headline' => array(
			'preview_text' => __( 'Content H3', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '24px',
			'font_color' => '#000000',
			'css_selectors' => 'h3'
		),
		'h4_headline' => array(
			'preview_text' => __( 'Content H4', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '22px',
			'font_color' => '#000000',
			'css_selectors' => 'h4'
		),
		'h5_headline' => array(
			'preview_text' => __( 'Content H5', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '20px',
			'font_color' => '#000000',
			'css_selectors' => 'h5'
		),
		'h6_headline' => array(
			'preview_text' => __( 'Content H6', 'mythemeshop' ),
			'preview_color' => 'light',
			'font_family' => 'Montserrat',
			'font_variant' => '700',
			'font_size' => '18px',
			'font_color' => '#000000',
			'css_selectors' => 'h6'
		)
	));
}

?>