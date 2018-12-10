<?php
/*-----------------------------------------------------------------------------------*/
/*	Do not remove these lines, sky will fall on your head.
/*-----------------------------------------------------------------------------------*/
define( 'MTS_THEME_NAME', 'justfit' );
define( 'MTS_THEME_VERSION', '1.2.1' );
require_once( dirname( __FILE__ ) . '/theme-options.php' );
if ( ! isset( $content_width ) ) $content_width = 705;

/*-----------------------------------------------------------------------------------*/
/*	Load Options
/*-----------------------------------------------------------------------------------*/
$mts_options = get_option( MTS_THEME_NAME );
add_theme_support( 'title-tag' );

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'mythemeshop', get_template_directory().'/lang' );

// Custom translations
if ( !empty( $mts_options['translate'] )) {
	$mts_translations = get_option( 'mts_translations_'.MTS_THEME_NAME );//$mts_options['translations'];
	function mts_custom_translate( $translated_text, $text, $domain ) {
		if ( $domain == 'mythemeshop' || $domain == 'nhp-opts' ) {
			global $mts_translations;
			if ( !empty( $mts_translations[$text] )) {
				$translated_text = $mts_translations[$text];
			}
		}
		return $translated_text;
		
	}
	add_filter( 'gettext', 'mts_custom_translate', 20, 3 );
}

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*	Disable theme updates from WordPress.org theme repository
/*-----------------------------------------------------------------------------------*/
function mts_disable_theme_update( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}
add_filter( 'http_request_args', 'mts_disable_theme_update', 5, 2 );
add_filter( 'auto_update_theme', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/*  Disable Google Typography plugin
/*-----------------------------------------------------------------------------------*/
add_action( 'admin_init', 'mts_deactivate_google_typography_plugin' );
function mts_deactivate_google_typography_plugin() {
	if ( in_array( 'google-typography/google-typography.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		deactivate_plugins( 'google-typography/google-typography.php' );
	}
}

// a shortcut function
function mts_isWooCommerce(){
	if(is_multisite()){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		return is_plugin_active('woocommerce/woocommerce.php');
	} else {
		return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
	}
}

/*------------------------------------------------------------------------------------------------------------*/
/*  Define MTS_ICONS constant containing all available icons for use in nav menus and icon select option
/*------------------------------------------------------------------------------------------------------------*/
$_mts_icons = array(
	__( 'Web Application Icons', 'mythemeshop' ) => array(
		'adjust', 'american-sign-language-interpreting', 'anchor', 'archive', 'area-chart', 'arrows', 'arrows-h', 'arrows-v', 'assistive-listening-systems', 'asterisk', 'at', 'audio-description', 'balance-scale', 'ban', 'bar-chart', 'barcode', 'bars', 'battery-empty', 'battery-full', 'battery-half', 'battery-quarter', 'battery-three-quarters', 'bed', 'beer', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'blind', 'bluetooth', 'bluetooth-b', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'braille', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'calculator', 'calendar', 'calendar-check-o', 'calendar-minus-o', 'calendar-o', 'calendar-plus-o', 'calendar-times-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'cart-arrow-down', 'cart-plus', 'cc', 'certificate', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'clone', 'cloud', 'cloud-download', 'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o', 'commenting', 'commenting-o', 'comments', 'comments-o', 'compass', 'copyright', 'creative-commons', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs', 'cube', 'cubes', 'cutlery', 'database', 'deaf', 'desktop', 'diamond', 'dot-circle-o', 'download', 'ellipsis-h', 'ellipsis-v', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'fax', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-pdf-o', 'file-powerpoint-o', 'file-video-o', 'file-word-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flask', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gift', 'glass', 'globe', 'graduation-cap', 'hand-lizard-o', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'hashtag', 'hdd-o', 'headphones', 'heart', 'heart-o', 'heartbeat', 'history', 'home', 'hourglass', 'hourglass-end', 'hourglass-half', 'hourglass-o', 'hourglass-start', 'i-cursor', 'inbox', 'industry', 'info', 'info-circle', 'key', 'keyboard-o', 'language', 'laptop', 'leaf', 'lemon-o', 'level-down', 'level-up', 'life-ring', 'lightbulb-o', 'line-chart', 'location-arrow', 'lock', 'low-vision', 'magic', 'magnet', 'male', 'map', 'map-marker', 'map-o', 'map-pin', 'map-signs', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'money', 'moon-o', 'motorcycle', 'mouse-pointer', 'music', 'newspaper-o', 'object-group', 'object-ungroup', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'percent', 'phone', 'phone-square', 'picture-o', 'pie-chart', 'plane', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle', 'question-circle-o', 'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'registered', 'reply', 'reply-all', 'retweet', 'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'server', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'ship', 'shopping-bag', 'shopping-basket', 'shopping-cart', 'sign-in', 'sign-language', 'sign-out', 'signal', 'sitemap', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'space-shuttle', 'spinner', 'spoon', 'square', 'square-o', 'star', 'star-half', 'star-half-o', 'star-o', 'sticky-note', 'sticky-note-o', 'street-view', 'suitcase', 'sun-o', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'television', 'terminal', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-off', 'toggle-on', 'trademark', 'trash', 'trash-o', 'tree', 'trophy', 'truck', 'tty', 'umbrella', 'universal-access', 'university', 'unlock', 'unlock-alt', 'upload', 'user', 'user-plus', 'user-secret', 'user-times', 'users', 'video-camera', 'volume-control-phone', 'volume-down', 'volume-off', 'volume-up', 'wheelchair', 'wheelchair-alt', 'wifi', 'wrench'
	),
	__( 'Accessibility Icons', 'mythemeshop' ) => array(
		'american-sign-language-interpreting', 'assistive-listening-systems', 'audio-description', 'blind', 'braille', 'cc', 'deaf', 'low-vision', 'question-circle-o', 'sign-language', 'tty', 'universal-access', 'volume-control-phone', 'wheelchair', 'wheelchair-alt'
	),
	__( 'Hand Icons', 'mythemeshop' ) => array(
		'hand-lizard-o', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up'
	),
	__( 'Transportation Icons', 'mythemeshop' ) => array(
		'ambulance', 'bicycle', 'bus', 'car', 'fighter-jet', 'motorcycle', 'plane', 'rocket', 'ship', 'space-shuttle', 'subway', 'taxi', 'train', 'truck', 'wheelchair'
	),
	__( 'Gender Icons', 'mythemeshop' ) => array(
		'genderless', 'mars', 'mars-double', 'mars-stroke', 'mars-stroke-h', 'mars-stroke-v', 'mercury', 'neuter', 'transgender', 'transgender-alt', 'venus', 'venus-double', 'venus-mars'
	),
	__( 'File Type Icons', 'mythemeshop' ) => array(
		'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-o', 'file-pdf-o', 'file-powerpoint-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o'
	),
	__( 'Spinner Icons', 'mythemeshop' ) => array(
		'circle-o-notch', 'cog', 'refresh', 'spinner'
	),
	__( 'Form Control Icons', 'mythemeshop' ) => array(
		'check-square', 'check-square-o', 'circle', 'circle-o', 'dot-circle-o', 'minus-square', 'minus-square-o', 'plus-square', 'plus-square-o', 'square', 'square-o'
	),
	__( 'Payment Icons', 'mythemeshop' ) => array(
		'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'credit-card', 'credit-card-alt', 'google-wallet', 'paypal'
	),
	__( 'Chart Icons', 'mythemeshop' ) => array(
		'area-chart', 'bar-chart', 'line-chart', 'pie-chart'
	),
	__( 'Currency Icons', 'mythemeshop' ) => array(
		'btc', 'eur', 'gbp', 'gg', 'gg-circle', 'ils', 'inr', 'jpy', 'krw', 'money', 'rub', 'try', 'usd'
	),
	__( 'Text Editor Icons', 'mythemeshop' ) => array(
		'align-center', 'align-justify', 'align-left', 'align-right', 'bold', 'chain-broken', 'clipboard', 'columns', 'eraser', 'file', 'file-o', 'file-text', 'file-text-o', 'files-o', 'floppy-o', 'font', 'header', 'indent', 'italic', 'link', 'list', 'list-alt', 'list-ol', 'list-ul', 'outdent', 'paperclip', 'paragraph', 'repeat', 'scissors', 'strikethrough', 'subscript', 'superscript', 'table', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'underline', 'undo'
	),
	__( 'Directional Icons', 'mythemeshop' ) => array(
		'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'exchange', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up'
	),
	__( 'Video Player Icons', 'mythemeshop' ) => array(
		'arrows-alt', 'backward', 'compress', 'eject', 'expand', 'fast-backward', 'fast-forward', 'forward', 'pause', 'pause-circle', 'pause-circle-o', 'play', 'play-circle', 'play-circle-o', 'random', 'step-backward', 'step-forward', 'stop', 'stop-circle', 'stop-circle-o', 'youtube-play'
	),
	__( 'Brand Icons', 'mythemeshop' ) => array(
		'500px', 'adn', 'amazon', 'android', 'angellist', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square', 'black-tie', 'bluetooth', 'bluetooth-b', 'btc', 'buysellads', 'cc-amex', 'cc-diners-club', 'cc-discover', 'cc-jcb', 'cc-mastercard', 'cc-paypal', 'cc-stripe', 'cc-visa', 'chrome', 'codepen', 'codiepie', 'connectdevelop', 'contao', 'css3', 'dashcube', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox', 'drupal', 'edge', 'empire', 'envira', 'expeditedssl', 'facebook', 'facebook-official', 'facebook-square', 'firefox', 'first-order', 'flickr', 'font-awesome', 'fonticons', 'fort-awesome', 'forumbee', 'foursquare', 'get-pocket', 'gg', 'gg-circle', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gitlab', 'glide', 'glide-g', 'google', 'google-plus', 'google-plus-official', 'google-plus-square', 'google-wallet', 'gratipay', 'hacker-news', 'houzz', 'html5', 'instagram', 'internet-explorer', 'ioxhost', 'joomla', 'jsfiddle', 'lastfm', 'lastfm-square', 'leanpub', 'linkedin', 'linkedin-square', 'linux', 'maxcdn', 'meanpath', 'medium', 'mixcloud', 'modx', 'odnoklassniki', 'odnoklassniki-square', 'opencart', 'openid', 'opera', 'optin-monster', 'pagelines', 'paypal', 'pied-piper', 'pied-piper-alt', 'pied-piper-pp', 'pinterest', 'pinterest-p', 'pinterest-square', 'product-hunt', 'qq', 'rebel', 'reddit', 'reddit-alien', 'reddit-square', 'renren', 'safari', 'scribd', 'sellsy', 'share-alt', 'share-alt-square', 'shirtsinbulk', 'simplybuilt', 'skyatlas', 'skype', 'slack', 'slideshare', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'soundcloud', 'spotify', 'stack-exchange', 'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo', 'themeisle', 'trello', 'tripadvisor', 'tumblr', 'tumblr-square', 'twitch', 'twitter', 'twitter-square', 'usb', 'viacoin', 'viadeo', 'viadeo-square', 'vimeo', 'vimeo-square', 'vine', 'vk', 'weibo', 'weixin', 'whatsapp', 'wikipedia-w', 'windows', 'wordpress', 'wpbeginner', 'wpforms', 'xing', 'xing-square', 'y-combinator', 'yahoo', 'yelp', 'yoast', 'youtube', 'youtube-play', 'youtube-square'
	),
	__( 'Medical Icons', 'mythemeshop' ) => array(
		'ambulance', 'h-square', 'heart', 'heart-o', 'heartbeat', 'hospital-o', 'medkit', 'plus-square', 'stethoscope', 'user-md', 'wheelchair'
	)
);

define ( 'MTS_ICONS', serialize( $_mts_icons ) ); // To use it - $mts_icons = unserialize( MTS_ICONS );

/*-----------------------------------------------------------------------------------*/
/*	Post Thumbnail Support
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 223, 137, true );
	add_image_size( 'featured', 360, 250, true ); //featured
	add_image_size( 'featuredfull', 765, 400, true ); //featured full width
	add_image_size( 'widgetthumb', 71, 71, true ); //widget
	add_image_size( 'widgetfull', 320, 210, true ); //sidebar full width
	add_image_size( 'facility', 240, 240, true ); // Facility
}

function mts_get_thumbnail_url( $size = 'full' ) {
	global $post;
	if (has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
		return $image[0];
	}
	
	// use first attached image
	$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
	if (!empty($images)) {
		$image = reset($images);
		$image_data = wp_get_attachment_image_src( $image->ID, $size );
		return $image_data[0];
	}
		
	// use no preview fallback
	if ( file_exists( get_template_directory().'/images/nothumb-'.$size.'.png' ) )
		return get_template_directory_uri().'/images/nothumb-'.$size.'.png';
	else
		return '';
}

/*-----------------------------------------------------------------------------------*/
/*  CREATE AND SHOW COLUMN FOR FEATURED IN PORTFOLIO ITEMS LIST ADMIN PAGE
/*-----------------------------------------------------------------------------------*/

//Get Featured image
function mts_get_featured_image($post_ID) {  
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);  
	if ($post_thumbnail_id) {  
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'widgetfull');  
		return $post_thumbnail_img[0];  
	}  
} 
function mts_columns_head($defaults) {
	if (get_post_type() == 'post')
		$defaults['featured_image'] = __('Featured Image', 'mythemeshop');
	return $defaults;  
}  
function mts_columns_content($column_name, $post_ID) {  
	if ($column_name == 'featured_image') {  
		$post_featured_image = mts_get_featured_image($post_ID);  
		if ($post_featured_image) {  
			echo '<img width="150" height="100" src="' . $post_featured_image . '" />';  
		}  
	}  
} 
add_filter('manage_posts_columns', 'mts_columns_head');  
add_action('manage_posts_custom_column', 'mts_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*	Use first attached image as post thumbnail (fallback)
/*-----------------------------------------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'mts_post_image_html', 10, 5 );
function mts_post_image_html( $html, $post_id, $post_image_id, $size, $attr ) {
	if ( has_post_thumbnail() || get_post_type( $post_id ) != 'post'  )
		return $html;
	
	// use first attached image
	$images = get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post_id );
	if (!empty($images)) {
		$image = reset($images);
		return wp_get_attachment_image( $image->ID, $size, false, $attr );
	}
		
	// use no preview fallback
	if ( file_exists( get_template_directory().'/images/nothumb-'.$size.'.png' ) )
		return '<img src="'.get_template_directory_uri().'/images/nothumb-'.$size.'.png" class="attachment-'.$size.' wp-post-image" alt="'.get_the_title().'">';
	else
		return '';
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary-menu' => __( 'Primary Menu', 'mythemeshop' )
        )
    );
}

/*-----------------------------------------------------------------------------------*/
/*	Enable Widgetized sidebar and Footer
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'register_sidebar' ) ) {   
	function mts_register_sidebars() {
		$mts_options = get_option( MTS_THEME_NAME );
		
		// Default sidebar
		register_sidebar( array(
			'name' => __('Sidebar','mythemeshop'),
			'description'   => __( 'Default sidebar.', 'mythemeshop' ),
			'id' => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		));

	   
		// Top level footer widget areas
		if ( !empty( $mts_options['mts_first_footer'] )) {
			if ( empty( $mts_options['mts_first_footer_num'] )) $mts_options['mts_first_footer_num'] = 4;
			register_sidebars( $mts_options['mts_first_footer_num'], array(
				'name' => __( 'Footer %d', 'mythemeshop' ),
				'description'   => __( 'Appears in the footer.', 'mythemeshop' ),
				'id' => 'footer-first',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}
	   
		// Custom sidebars
		if ( !empty( $mts_options['mts_custom_sidebars'] ) && is_array( $mts_options['mts_custom_sidebars'] )) {
			foreach( $mts_options['mts_custom_sidebars'] as $sidebar ) {
				if ( !empty( $sidebar['mts_custom_sidebar_id'] ) && !empty( $sidebar['mts_custom_sidebar_id'] ) && $sidebar['mts_custom_sidebar_id'] != 'sidebar-' ) {
					register_sidebar( array( 'name' => ''.$sidebar['mts_custom_sidebar_name'].'', 'id' => ''.sanitize_title( strtolower( $sidebar['mts_custom_sidebar_id'] )).'', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
				}
			}
		}

		if ( mts_isWooCommerce() ) {
			// Register WooCommerce Shop and Single Product Sidebar
			register_sidebar( array(
				'name' => __('Shop Page Sidebar', 'mythemeshop'),
				'description'   => __( 'Appears on Shop main page and product archive pages.', 'mythemeshop' ),
				'id' => 'shop-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
			register_sidebar( array(
				'name' => __('Single Product Sidebar', 'mythemeshop'),
				'description'   => __( 'Appears on single product pages.', 'mythemeshop' ),
				'id' => 'product-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}
	}
	add_action( 'widgets_init', 'mts_register_sidebars' );
}

function mts_custom_sidebar() {
	$mts_options = get_option( MTS_THEME_NAME );
	
	// Default sidebar
	$sidebar = 'Sidebar';

	if ( is_page_template('page-blog.php') && !empty( $mts_options['mts_sidebar_for_blog'] )) $sidebar = $mts_options['mts_sidebar_for_blog'];	
	if ( is_single() && !empty( $mts_options['mts_sidebar_for_post'] )) $sidebar = $mts_options['mts_sidebar_for_post'];
	if ( is_page() && !empty( $mts_options['mts_sidebar_for_page'] )) $sidebar = $mts_options['mts_sidebar_for_page'];
	
	// Archives
	if ( is_archive() && !empty( $mts_options['mts_sidebar_for_archive'] )) $sidebar = $mts_options['mts_sidebar_for_archive'];
	if ( is_category() && !empty( $mts_options['mts_sidebar_for_category'] )) $sidebar = $mts_options['mts_sidebar_for_category'];
	if ( is_tag() && !empty( $mts_options['mts_sidebar_for_tag'] )) $sidebar = $mts_options['mts_sidebar_for_tag'];
	if ( is_date() && !empty( $mts_options['mts_sidebar_for_date'] )) $sidebar = $mts_options['mts_sidebar_for_date'];
	if ( is_author() && !empty( $mts_options['mts_sidebar_for_author'] )) $sidebar = $mts_options['mts_sidebar_for_author'];
	
	// Other
	if ( is_search() && !empty( $mts_options['mts_sidebar_for_search'] )) $sidebar = $mts_options['mts_sidebar_for_search'];
	if ( is_404() && !empty( $mts_options['mts_sidebar_for_notfound'] )) $sidebar = $mts_options['mts_sidebar_for_notfound'];
	
	// Woo
	if ( mts_isWooCommerce() ) {
		if ( is_shop() || is_product_category() ) {
			if ( !empty( $mts_options['mts_sidebar_for_shop'] ))
				$sidebar = $mts_options['mts_sidebar_for_shop'];
			else
				$sidebar = 'shop-sidebar'; // default
		}
		if ( is_product() || is_account_page() ) {
			if ( !empty( $mts_options['mts_sidebar_for_product'] ))
				$sidebar = $mts_options['mts_sidebar_for_product'];
			else
				$sidebar = 'product-sidebar'; // default
		}
	}
	
	// Page/post specific custom sidebar
	if ( is_page() || is_single() ) {
		wp_reset_postdata();
		global $post;
		$custom = get_post_meta( $post->ID, '_mts_custom_sidebar', true );
		if ( !empty( $custom )) $sidebar = $custom;
	}

	// Posts page
	if ( is_home() && ! is_front_page() && 'page' == get_option( 'show_on_front' ) ) {
		wp_reset_postdata();
		global $wp_registered_sidebars;
		$custom = get_post_meta( get_option( 'page_for_posts' ), '_mts_custom_sidebar', true );
		if ( !empty( $custom ) && array_key_exists( $custom, $wp_registered_sidebars ) || 'mts_nosidebar' == $custom ) {
			$sidebar = $custom;
		}
	}

	return $sidebar;
}

/*-----------------------------------------------------------------------------------*/
/*  Load Widgets, Actions and Libraries
/*-----------------------------------------------------------------------------------*/

// Add the 125x125 Ad Block Custom Widget
locate_template( "functions/widget-ad125.php", true, true );

// Add the 300x250 Ad Block Custom Widget
locate_template( "functions/widget-ad300.php", true, true );

// Add the About Author Widget
locate_template( "functions/widget-about-author.php", true, true );

// Add the Calculator Widget
locate_template( "functions/widget-calculator.php", true, true );

// Add the Latest Tweets Custom Widget
locate_template( "functions/widget-tweets.php", true, true );

// Add Recent Posts Widget
locate_template( "functions/widget-recentposts.php", true, true );

// Add Related Posts Widget
locate_template( "functions/widget-relatedposts.php", true, true );

// Add Author Posts Widget
locate_template( "functions/widget-authorposts.php", true, true );

// Add Popular Posts Widget
locate_template( "functions/widget-popular.php", true, true );

// Add Facebook Like box Widget
locate_template( "functions/widget-fblikebox.php", true, true );

// Add Social Profile Widget
locate_template( "functions/widget-social.php", true, true );

// Add Category Posts Widget
locate_template( "functions/widget-catposts.php", true, true );

// Add Welcome message
include_once( "functions/welcome-message.php" );

// Template Functions
include_once( "functions/theme-actions.php" );

// Post/page editor meta boxes
include_once( "functions/metaboxes.php" );

// TGM Plugin Activation
include_once( "functions/plugin-activation.php" );

// AJAX Contact Form - mts_contact_form()
include_once( 'functions/contact-form.php' );

// Custom menu walker
include_once( 'functions/nav-menu.php' );

/*-----------------------------------------------------------------------------------*/
/*	Javascript
/*-----------------------------------------------------------------------------------*/
function mts_nojs_js_class() {
	echo '<script type="text/javascript">document.documentElement.className = document.documentElement.className.replace( /\bno-js\b/,\'js\' );</script>';
}
add_action( 'wp_head', 'mts_nojs_js_class', 1 );

function mts_add_scripts() {
	$mts_options = get_option( MTS_THEME_NAME );

	wp_enqueue_script( 'jquery' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_register_script( 'customscript', get_template_directory_uri() . '/js/customscript.js', true );
	if ( ! empty( $mts_options['mts_show_primary_nav'] ) && ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
		$nav_menu = 'both';
	} else {
		if ( ! empty( $mts_options['mts_show_primary_nav'] ) ) {
			$nav_menu = 'primary';
		} elseif ( ! empty( $mts_options['mts_show_secondary_nav'] ) ) {
			$nav_menu = 'secondary';
		} else {
			$nav_menu = 'none';
		}
	}
	wp_localize_script(
		'customscript',
		'mts_customscript',
		array(
			'responsive' => ( empty( $mts_options['mts_responsive'] ) ? false : true ),
			'nav_menu' => $nav_menu
		)
	);
	wp_enqueue_script( 'customscript' );

	// Slider
	wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), null, true);
	if(!empty($mts_options['mts_featured_area_slides'])) {
		wp_enqueue_script ('owl-carousel');
	}
	
	// Animated single post/page header
	if ( is_singular() ) {
		$header_animation = mts_get_post_header_effect();
		if ( 'parallax' == $header_animation ) {
			wp_register_script ( 'jquery-parallax', get_template_directory_uri() . '/js/parallax.js' );
			wp_enqueue_script ( 'jquery-parallax' );
		} else if ( 'zoomout' == $header_animation ) {
			wp_register_script ( 'jquery-zoomout', get_template_directory_uri() . '/js/zoomout.js' );
			wp_enqueue_script ( 'jquery-zoomout' );
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'mts_add_scripts' );
   
function mts_load_footer_scripts() {  
	$mts_options = get_option( MTS_THEME_NAME );
	
	//Lightbox
	if ( ! empty( $mts_options['mts_lightbox'] ) ) {
		wp_register_script( 'magnificPopup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', true );
		wp_enqueue_script( 'magnificPopup' );
	}	
	
	// Ajax Load More and Search Results
	wp_register_script( 'mts_ajax', get_template_directory_uri() . '/js/ajax.js', true );
	if( ! empty( $mts_options['mts_pagenavigation_type'] ) && $mts_options['mts_pagenavigation_type'] >= 2 
		&& !is_singular() && (!mts_isWooCommerce() || !is_woocommerce()) ) {
		wp_enqueue_script( 'mts_ajax' );
		
		wp_register_script( 'historyjs', get_template_directory_uri() . '/js/history.js', true );
		wp_enqueue_script( 'historyjs' );
		
		// Add parameters for the JS
		global $wp_query;
		$max = $wp_query->max_num_pages;
		$paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
		$autoload = ( $mts_options['mts_pagenavigation_type'] == 3 );
		wp_localize_script(
			'mts_ajax',
			'mts_ajax_loadposts',
			array(
				'startPage' => $paged,
				'maxPages' => $max,
				'nextLink' => next_posts( $max, false ),
				'autoLoad' => $autoload,
				'i18n_loadmore' => __( 'Load More Posts', 'mythemeshop' ),
				'i18n_loading' => __('Loading...', 'mythemeshop'),
				'i18n_nomore' => __( 'No more posts.', 'mythemeshop' )
			 )
		);
	}
	if ( ! empty( $mts_options['mts_ajax_search'] ) ) {
		wp_enqueue_script( 'mts_ajax' );
		wp_localize_script(
			'mts_ajax',
			'mts_ajax_search',
			array(
				'url' => admin_url( 'admin-ajax.php' ),
				'ajax_search' => '1'
			 )
		);
	}
	
}  
add_action( 'wp_footer', 'mts_load_footer_scripts' );  

if( !empty( $mts_options['mts_ajax_search'] )) {
	add_action( 'wp_ajax_mts_search', 'ajax_mts_search' );
	add_action( 'wp_ajax_nopriv_mts_search', 'ajax_mts_search' );
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue CSS
/*-----------------------------------------------------------------------------------*/
function mts_enqueue_css() {
	$mts_options = get_option( MTS_THEME_NAME );

	wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/style.css', 'style' );
	
	$handle = 'stylesheet';

	wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), null);
	if(!empty($mts_options['mts_featured_area_slides'])) {
		wp_enqueue_style('owl-carousel');
	}
	
	// WooCommerce
	if ( mts_isWooCommerce() ) {
        wp_register_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce2.css', 'style' );
        wp_enqueue_style( 'woocommerce' );
		$handle = 'woocommerce';
	}
	
	// Lightbox
	if ( ! empty( $mts_options['mts_lightbox'] ) ) {
		wp_register_style( 'magnificPopup', get_template_directory_uri() . '/css/magnific-popup.css', 'style' );
		wp_enqueue_style( 'magnificPopup' );
	}
	
	//Font Awesome
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', 'style' );
	wp_enqueue_style( 'fontawesome' );
	
	//Responsive
	if ( ! empty( $mts_options['mts_responsive'] ) ) {
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', 'style' );
	}
	
	$mts_bg = '';
	if ( $mts_options['mts_bg_pattern_upload'] != '' ) {
		$mts_bg = $mts_options['mts_bg_pattern_upload'];
	} else {
		if( !empty( $mts_options['mts_bg_pattern'] )) {
			$mts_bg = get_template_directory_uri().'/images/'.$mts_options['mts_bg_pattern'].'.png';
		}
	}
	$mts_sclayout = '';
	$mts_shareit_left = '';
	$mts_shareit_right = '';
	$mts_author = '';
	$mts_header_section = '';
	if ( is_page() || is_single() ) {
		$mts_sidebar_location = get_post_meta( get_the_ID(), '_mts_sidebar_location', true );
	} else {
		$mts_sidebar_location = '';
	}
	if ( $mts_sidebar_location != 'right' && ( $mts_options['mts_layout'] == 'sclayout' || $mts_sidebar_location == 'left' )) {
		$mts_sclayout = '.article { float: right;}
		.sidebar.c-4-12 { float: left; padding-right: 0; }';
		if( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
			$mts_shareit_right = '.shareit { margin: 0 760px 0; border-left: 0; }';
		}
	}
	if ( empty( $mts_options['mts_header_section2'] ) ) {
		$mts_header_section = '.logo-wrap, .widget-header { display: none; }
		#navigation { border-top: 0; }
		.primary-navigation{float: left}';
	}
	if ( isset( $mts_options['mts_social_button_position'] ) && $mts_options['mts_social_button_position'] == 'floating' ) {
		$mts_shareit_left = '.shareit { top: 282px; left: auto; margin: 0 0 0 -123px; width: 90px; position: fixed; padding: 5px; border:none; border-right: 0;}
		.share-item {margin: 2px;}';
	}
	if ( ! empty( $mts_options['mts_author_comment'] ) ) {
		$mts_author = '.bypostauthor { background: #FAFAFA; }
		.bypostauthor:after { content: "'.__( 'Author', 'mythemeshop' ).'"; position: absolute; right: 0; top: -1px; padding: 1px 10px; background: #818181; color: #FFF; }';
	}
	$example_bg = mts_get_background_styles( 'mts_background' );
	$custom_css = "
		body {background-color:{$mts_options['mts_bg_color']}; }
		body {background-image: url( {$mts_bg} );}
		.main-header { background-color: {$mts_options['mts_header_bg']}; }
		.header-join .join-description { text-align: {$mts_options['mts_featured_text_align']}; }
		
		.pace .pace-progress, #mobile-menu-wrapper ul li a:hover { background: {$mts_options['mts_color_scheme']}; }
		.postauthor h5, #navigation ul .current-menu-item a, .copyrights a, .single_post a, .textwidget a, .pnavigation2 a, .postauthor h5 a:hover, #header .primary-navigation .wpmm-megamenu-showing.wpmm-light-scheme a, .sidebar.c-4-12 a:hover, .copyrights a:hover, footer .widget li a:hover, .sidebar.c-4-12 a:hover, .related-posts a:hover, .widget .wp_review_tab_widget_content .entry-title a:hover, .title a:hover, .post-info a:hover, .comm, #tabber .inside li a:hover, .single_post header .post-info .theauthor a:hover, .fn a, a, .primary-navigation a:hover, .widget .wpt_widget_content .tab-content li a:hover, .widget .wpt_widget_content .wpt-pagination a:hover, .latestPost .post-info .theauthor a:hover, .latestPost .title a:hover, #navigation ul ul a:hover, a:hover, .woocommerce ul.products li.product .price, .woocommerce .widget_layered_nav ul li.chosen a:before, .Justfit-benefit-section .title a:hover, .Justfit-facility-section header .title a:hover, .featured-category-title span, .Justfit-members-stories h2 span, .Justfit-benefit-sections h3 span, .Justfit-ambition h3 span { color:{$mts_options['mts_color_scheme']}; }
		 .currenttext, .widget .wp_review_tab_widget_content .tab_title.selected a, .widget .wpt_widget_content .tab_title.selected a, #commentform input#submit, .contactform #submit, #commentform input#submit:hover, .contactform #submit:hover, .latestPost-review-wrapper, #move-to-top, .pagination a:hover, #tabber ul.tabs li a.selected, .tagcloud a:hover, .widget .wpt_widget_content #tags-tab-content ul li a:hover, #navigation ul .sfHover a, #searchsubmit, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce .bypostauthor:after, #searchsubmit, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .latestPost .post-info .thecategory a:hover, .latestPost-review-wrapper.review-type-circle.review-total-only, .latestPost-review-wrapper.review-type-circle.wp-review-show-total, .single_post header .post-info .thecategory a:hover, #wpmm-megamenu .review-total-only, .widget .review-total-only.small-thumb, .contact-form input[type='submit'], #load-posts a, .mts-calorie-calculator .calculate a { background-color:{$mts_options['mts_color_scheme']}; color: #fff!important; }
		.owl-prev:hover, .owl-next:hover { background-color:{$mts_options['mts_color_scheme']}!important; }

		{$mts_sclayout}
		{$mts_shareit_left}
		{$mts_shareit_right}
		{$mts_author}
		{$mts_header_section}
		{$mts_options['mts_custom_css']}
			";
	wp_add_inline_style( $handle, $custom_css );
}
add_action( 'wp_enqueue_scripts', 'mts_enqueue_css', 99 );

/*-----------------------------------------------------------------------------------*/
/*	Wrap videos in .responsive-video div
/*-----------------------------------------------------------------------------------*/
function mts_responsive_video( $data ) {
	return '<div class="flex-video">' . $data . '</div>';
}
add_filter( 'embed_oembed_html', 'mts_responsive_video' );

/*-----------------------------------------------------------------------------------*/
/*	Filters that allow shortcodes in Text Widgets
/*-----------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_content_rss', 'do_shortcode' );

/*-----------------------------------------------------------------------------------*/
/*	Custom Comments template
/*-----------------------------------------------------------------------------------*/
function mts_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
	$mts_options = get_option( MTS_THEME_NAME ); ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment_wrap" id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/UserComments">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 91 ); ?>
				<div class="post-info">
				<?php printf( '<span class="theauthor"><span>%s</span></span>', get_comment_author_link() ) ?> 
				<?php if ( ! empty( $mts_options['mts_comment_date'] ) ) { ?>
					<span class="thetime updated"><span><?php comment_date( get_option( 'date_format' ) ); ?></span></span>
				<?php } ?>
				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ) ?>
				</span>
				</div>
				<span class="comment-meta">
					<?php edit_comment_link( __( '( Edit )', 'mythemeshop' ), '  ', '' ) ?>
				</span>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'mythemeshop' ) ?></em>
				<br />
			<?php endif; ?>
			<div class="commentmetadata">
				<div class="commenttext" itemprop="commentText">
					<?php comment_text() ?>
				</div>
			</div>
		</div>
	</li>
<?php }

/*-----------------------------------------------------------------------------------*/
/*	Excerpt
/*-----------------------------------------------------------------------------------*/

// Increase max length
function mts_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'mts_excerpt_length', 20 );

// Remove [...] and shortcodes
function mts_custom_excerpt( $output ) {
  return preg_replace( '/\[[^\]]*]/', '', $output );
}
add_filter( 'get_the_excerpt', 'mts_custom_excerpt' );

// Truncate string to x letters/words
function mts_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
	if ( $units == 'letters' ) {
		if ( mb_strlen( $str ) > $length ) {
			return mb_substr( $str, 0, $length ) . $ellipsis;
		} else {
			return $str;
		}
	} else {
		$words = explode( ' ', $str );
		if ( count( $words ) > $length ) {
			return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
		} else {
			return $str;
		}
	}
}

if ( ! function_exists( 'mts_excerpt' ) ) {
	function mts_excerpt( $limit = 40 ) {
	  return mts_truncate( get_the_excerpt(), $limit, 'words' );
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Remove more link from the_content and use custom read more
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_content_more_link', 'mts_remove_more_link', 10, 2 );
function mts_remove_more_link( $more_link, $more_link_text ) {
	return '';
}
// shorthand function to check for more tag in post
function mts_post_has_moretag() {
	global $post;
	return strpos( $post->post_content, '<!--more-->' );
}

if ( ! function_exists( 'mts_readmore' ) ) {
	function mts_readmore() { ?>
		<div class="readMore">
			<a href="<?php echo get_the_permalink().'#more-'.get_the_ID(); ?>" title="<?php the_title(); ?>" rel="nofollow">
				<?php _e( 'Read More', 'mythemeshop' ); ?>
			</a>
		</div>
	<?php }
}

/*-----------------------------------------------------------------------------------*/
/* nofollow to next/previous links
/*-----------------------------------------------------------------------------------*/
function mts_pagination_add_nofollow( $content ) {
	return 'rel="nofollow"';
}
add_filter( 'next_posts_link_attributes', 'mts_pagination_add_nofollow' );
add_filter( 'previous_posts_link_attributes', 'mts_pagination_add_nofollow' );

/*-----------------------------------------------------------------------------------*/
/* Nofollow to category links
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_category', 'mts_add_nofollow_cat' ); 
function mts_add_nofollow_cat( $text ) {
	$text = str_replace( 'rel="category tag"', 'rel="nofollow"', $text ); return $text;
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow post author link
/*-----------------------------------------------------------------------------------*/
add_filter( 'the_author_posts_link', 'mts_nofollow_the_author_posts_link' );
function mts_nofollow_the_author_posts_link ( $link ) {
	return str_replace( '<a href=', '<a rel="nofollow" href=', $link ); 
}

/*-----------------------------------------------------------------------------------*/	
/* nofollow to reply links
/*-----------------------------------------------------------------------------------*/
function mts_add_nofollow_to_reply_link( $link ) {
	return str_replace( '" )\'>', '" )\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'mts_add_nofollow_to_reply_link' );

/*-----------------------------------------------------------------------------------*/
/* removes the WordPress version from your header for security
/*-----------------------------------------------------------------------------------*/
function mts_remove_wpversion() {
	return '<!--Theme by MyThemeShop.com-->';
}
add_filter( 'the_generator', 'mts_remove_wpversion' );
	
/*-----------------------------------------------------------------------------------*/
/* Removes Trackbacks from the comment count
/*-----------------------------------------------------------------------------------*/
add_filter( 'get_comments_number', 'mts_comment_count', 0 );
function mts_comment_count( $count ) {
	if ( ! is_admin() ) {
		global $id;
		$comments = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $comments );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

/*-----------------------------------------------------------------------------------*/
/* adds a class to the post if there is a thumbnail
/*-----------------------------------------------------------------------------------*/
function has_thumb_class( $classes ) {
	global $post;
	if( has_post_thumbnail( $post->ID ) ) { $classes[] = 'has_thumb'; }
		return $classes;
}
add_filter( 'post_class', 'has_thumb_class' );

/*-----------------------------------------------------------------------------------*/	
/* AJAX Search results
/*-----------------------------------------------------------------------------------*/
function ajax_mts_search() {
	$query = $_REQUEST['q']; // It goes through esc_sql() in WP_Query
	$search_query = new WP_Query( array( 's' => $query, 'posts_per_page' => 3, 'post_status' => 'publish' )); 
	$search_count = new WP_Query( array( 's' => $query, 'posts_per_page' => -1, 'post_status' => 'publish' ));
	$search_count = $search_count->post_count;
	if ( !empty( $query ) && $search_query->have_posts() ) : 
		//echo '<h5>Results for: '. $query.'</h5>';
		echo '<ul class="ajax-search-results">';
		while ( $search_query->have_posts() ) : $search_query->the_post();
			?><li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'widgetthumb', array( 'title' => '' )); ?>
					<?php the_title(); ?>	
				</a>
				<div class="meta">
						<span class="thetime"><?php the_time( 'F j, Y' ); ?></span>
				</div> <!-- / .meta -->

			</li>	
			<?php
		endwhile;
		echo '</ul>';
		echo '<div class="ajax-search-meta"><span class="results-count">'.$search_count.' '.__( 'Results', 'mythemeshop' ).'</span><a href="'.get_search_link( $query ).'" class="results-link">'.__('Show all results.', 'mythemeshop').'</a></div>';
	else:
		echo '<div class="no-results">'.__( 'No results found.', 'mythemeshop' ).'</div>';
	endif;
		
	exit; // required for AJAX in WP
}

/*-----------------------------------------------------------------------------------*/
/* Redirect feed to feedburner
/*-----------------------------------------------------------------------------------*/

if ( $mts_options['mts_feedburner'] != '' ) {
	function mts_rss_feed_redirect() {
		$mts_options = get_option( MTS_THEME_NAME );
		global $feed;
		$new_feed = $mts_options['mts_feedburner'];
		if ( !is_feed() ) {
				return;
		}
		if ( preg_match( '/feedburner/i', $_SERVER['HTTP_USER_AGENT'] )){
				return;
		}
		if ( $feed != 'comments-rss2' ) {
				if ( function_exists( 'status_header' )) status_header( 302 );
				header( "Location:" . $new_feed );
				header( "HTTP/1.1 302 Temporary Redirect" );
				exit();
		}
	}
	add_action( 'template_redirect', 'mts_rss_feed_redirect' );
}

/*-----------------------------------------------------------------------------------*/
/* Single Post Pagination - Numbers + Previous/Next
/*-----------------------------------------------------------------------------------*/
function mts_wp_link_pages_args( $args ) {
	global $page, $numpages, $more, $pagenow;
	if ( $args['next_or_number'] != 'next_and_number' )
		return $args; 
	$args['next_or_number'] = 'number'; 
	if ( !$more )
		return $args; 
	if( $page-1 ) 
		$args['before'] .= _wp_link_page( $page-1 )
		. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
	;
	if ( $page<$numpages ) 
	
		$args['after'] = _wp_link_page( $page+1 )
		. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
		. $args['after']
	;
	return $args;
}
add_filter( 'wp_link_pages_args', 'mts_wp_link_pages_args' );


/*-----------------------------------------------------------------------------------*/
/* WooCommerce
/*-----------------------------------------------------------------------------------*/
if ( mts_isWooCommerce() ) {
	add_theme_support( 'woocommerce' );
	
	// Change number or products per row to 3
	add_filter( 'loop_shop_columns', 'loop_columns' );
	if ( !function_exists( 'loop_columns' )) {
		function loop_columns() {
			return 3; // 3 products per row
		}
	}
	
	// Redefine woocommerce_output_related_products()
	function woocommerce_output_related_products() {
		$args = array(
			'posts_per_page' => 3,
			'columns' => 1,
		);
		woocommerce_related_products($args); // Display 3 products in rows of 1
	}
	
	/*** Hook in on activation */
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'mythemeshop_woocommerce_image_dimensions', 1 );
	 
	/*** Define image sizes */
	function mythemeshop_woocommerce_image_dimensions() {
		$catalog = array(
			'width'	 => '236',   // px
			'height'	=> '270',   // px
			'crop'	  => 1		// true
		 );
		$single = array(
			'width'	 => '338',   // px
			'height'	=> '457',   // px
			'crop'	  => 1		// true
		 );
		$thumbnail = array(
			'width'	 => '77',	// px
			'height'	=> '100',   // px
			'crop'	  => 0		// false
		 ); 
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog );	   // Product category thumbs
		update_option( 'shop_single_image_size', $single );		 // Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
	}
	
	add_filter( 'woocommerce_product_thumbnails_columns', 'mts_thumb_cols' );
	function mts_thumb_cols() {
	 return 4; // .last class applied to every 4th thumbnail
	}
	
	add_filter( 'loop_shop_per_page', 'mts_products_per_page', 20 );
	function mts_products_per_page() {
		$mts_options = get_option( MTS_THEME_NAME );
		return $mts_options['mts_shop_products'];
	}
	
	// Ensure cart contents update when products are added to the cart via AJAX
	add_filter( 'add_to_cart_fragments', 'mts_header_add_to_cart_fragment' );
	function mts_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start(); ?>
		
		<a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'mythemeshop' ); ?>"><?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mythemeshop' ), $woocommerce->cart->cart_contents_count );?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		
		<?php $fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
	
	/**
	 * Optimize WooCommerce Scripts
	 * Updated for WooCommerce 2.0+
	 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
	 */
	add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
	
	function child_manage_woocommerce_styles() {
		//remove generator meta tag
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	 
		//first check that woo exists to prevent fatal errors
		if ( function_exists( 'is_woocommerce' ) ) {
			//dequeue scripts and styles
			if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
				wp_dequeue_style( 'woocommerce-layout' );
				wp_dequeue_style( 'woocommerce-smallscreen' );
				wp_dequeue_style( 'woocommerce-general' );
				wp_dequeue_style( 'wc-bto-styles' ); //Composites Styles
				wp_dequeue_script( 'wc-add-to-cart' );
				wp_dequeue_script( 'wc-cart-fragments' );
				wp_dequeue_script( 'woocommerce' );
				wp_dequeue_script( 'jquery-blockui' );
				wp_dequeue_script( 'jquery-placeholder' );
			}
		}
	}
	 
	remove_action('wp_head', 'wc_generator_tag');
}

/*------------[ Cart ]-------------*/
if ( ! function_exists( 'mts_cart' ) ) {
	function mts_cart() { 
	   if (mts_isWooCommerce()) {
	   global $mts_options;
?>
<div class="mts-cart">
	<?php global $woocommerce; ?>
	<span>
		<?php if ( is_user_logged_in() ) { ?>
			<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('My Account', 'mythemeshop' ); ?>"><?php _e('My Account', 'mythemeshop' ); ?></a>
		<?php } 
		else { ?>
			<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php _e('Login / Register', 'mythemeshop' ); ?>"><?php _e('Login ', 'mythemeshop' ); ?></a>
		<?php } ?>
	</span>
	<span>
		<a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php _e('View your shopping cart', 'mythemeshop' ); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mythemeshop' ), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	</span>
</div>
<?php } 
	}
}

/*-----------------------------------------------------------------------------------*/
/* add <!-- next-page --> button to tinymce
/*-----------------------------------------------------------------------------------*/
add_filter( 'mce_buttons', 'wysiwyg_editor' );
function wysiwyg_editor( $mce_buttons ) {
   $pos = array_search( 'wp_more', $mce_buttons, true );
   if ( $pos !== false ) {
	   $tmp_buttons = array_slice( $mce_buttons, 0, $pos+1 );
	   $tmp_buttons[] = 'wp_page';
	   $mce_buttons = array_merge( $tmp_buttons, array_slice( $mce_buttons, $pos+1 ));
   }
   return $mce_buttons;
}

/*-----------------------------------------------------------------------------------*/
/*	Alternative post templates
/*-----------------------------------------------------------------------------------*/
function mts_get_post_template( $default = 'default' ) {
	global $post;
	$single_template = $default;
	$posttemplate = get_post_meta( $post->ID, '_mts_posttemplate', true );
	
	if ( empty( $posttemplate ) || ! is_string( $posttemplate ) )
		return $single_template;
	
	if ( file_exists( dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php' ) ) {
		$single_template = dirname( __FILE__ ) . '/singlepost-'.$posttemplate.'.php';
	}
	
	return $single_template;
}
function mts_set_post_template( $single_template ) {
	 return mts_get_post_template( $single_template );
}
//add_filter( 'single_template', 'mts_set_post_template' );

/*-----------------------------------------------------------------------------------*/
/*  Get Post header animation
/*-----------------------------------------------------------------------------------*/
function mts_get_post_header_effect() {
	global $post;
	$postheader_effect = get_post_meta( $post->ID, '_mts_postheader', true );
	
	return $postheader_effect;
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/
function mts_custom_gravatar( $avatar_defaults ) {
	$mts_avatar = get_template_directory_uri() . '/images/gravatar.png';
	$avatar_defaults[$mts_avatar] = 'Custom Gravatar ( /images/gravatar.png )';
	return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'mts_custom_gravatar' );

/*-----------------------------------------------------------------------------------*/
/*  WP Review Support
/*-----------------------------------------------------------------------------------*/

// Set default colors for new reviews
function new_default_review_colors( $colors ) {
	$colors = array(
		'color' => '#fff',
		'fontcolor' => '#fff',
		'bgcolor1' => '#DA0F16',
		'bgcolor2' => '#DA0F16',
		'bordercolor' => '#DA0F16'
	);
  return $colors;
}
add_filter( 'wp_review_default_colors', 'new_default_review_colors' );
 
// Set default location for new reviews
function new_default_review_location( $position ) {
  $position = 'top';
  return $position;
}
add_filter( 'wp_review_default_location', 'new_default_review_location' );


/*-----------------------------------------------------------------------------------*/
/*  Thumbnail Upscale
/*  Enables upscaling of thumbnails for small media attachments, 
/*  to make sure it fits into it's supposed location.
/*  Cannot be used in conjunction with Retina Support.
/*-----------------------------------------------------------------------------------*/
if ( empty( $mts_options['mts_retina'] ) ) {
	function mts_image_crop_dimensions( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
		if( !$crop )
			return null; // let the wordpress default function handle this
	
		$aspect_ratio = $orig_w / $orig_h;
		$size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );
	
		$crop_w = round( $new_w / $size_ratio );
		$crop_h = round( $new_h / $size_ratio );
	
		$s_x = floor( ( $orig_w - $crop_w ) / 2 );
		$s_y = floor( ( $orig_h - $crop_h ) / 2 );
	
		return array( 0, 0, ( int ) $s_x, ( int ) $s_y, ( int ) $new_w, ( int ) $new_h, ( int ) $crop_w, ( int ) $crop_h );
	}
	add_filter( 'image_resize_dimensions', 'mts_image_crop_dimensions', 10, 6 );
}


/*-----------------------------------------------------------------------------------*/
/* Post view count
/* AJAX is used to support caching plugins - it is possible to disable with filter
/* It is also possible to exclude admins with another filter
/*-----------------------------------------------------------------------------------*/
/**
 * Append JS to content for AJAX call on single.
 *
 * @param $content
 *
 * @return string
 */
function mts_view_count_js( $content ) {
	$id = get_the_ID();
	$use_ajax = apply_filters( 'mts_view_count_cache_support', true );
	
	$exclude_admins = apply_filters( 'mts_view_count_exclude_admins', false ); // pass in true or a user capability
	if ($exclude_admins === true) {
		$exclude_admins = 'edit_posts';
	}
	if ($exclude_admins && current_user_can( $exclude_admins )) {
		return $content; // do not count post views here
	}
	if (is_single()) {
		if ($use_ajax) {
			// enqueue jquery
			wp_enqueue_script( 'jquery' );
			
			$url = admin_url( 'admin-ajax.php' );
			$content .= "
			<script type=\"text/javascript\">
			jQuery(document).ready(function($) {
				$.post('".esc_js($url)."', {action: 'mts_view_count', id: '".esc_js($id)."'});
			});
			</script>";
		}
		if (!$use_ajax) {
			mts_update_view_count($id);
		}
	} 
	return $content;
}
//add_filter('the_content', 'mts_view_count_js');
/**
 * Call mts_update_view_count on AJAX.
 */
function mts_ajax_mts_view_count() {
	// do count
	$post_id = absint( $_POST['id'] );
	mts_update_view_count( $post_id );
	exit();
}
add_action('wp_ajax_mts_view_count', 'mts_ajax_mts_view_count');
add_action('wp_ajax_nopriv_mts_view_count','mts_ajax_mts_view_count');

/**
 * Update the view count of a post.
 *
 * @param $post_id
 */
function mts_update_view_count( $post_id ) {
	$count = get_post_meta( $post_id, '_mts_view_count', true );
	update_post_meta( $post_id, '_mts_view_count', ++$count );
	
	do_action( 'mts_view_count_after_update', $post_id, $count );
	return $count;
}

/*-----------------------------------------------------------------------------------*/
/*  Color manipulations
/*-----------------------------------------------------------------------------------*/
function mts_hex_to_hsl( $color ){

	// Sanity check
	$color = mts_check_hex_color($color);

	// Convert HEX to DEC
	$R = hexdec($color[0].$color[1]);
	$G = hexdec($color[2].$color[3]);
	$B = hexdec($color[4].$color[5]);

	$HSL = array();

	$var_R = ($R / 255);
	$var_G = ($G / 255);
	$var_B = ($B / 255);

	$var_Min = min($var_R, $var_G, $var_B);
	$var_Max = max($var_R, $var_G, $var_B);
	$del_Max = $var_Max - $var_Min;

	$L = ($var_Max + $var_Min)/2;

	if ($del_Max == 0) {
		$H = 0;
		$S = 0;
	} else {
		if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
		else			$S = $del_Max / ( 2 - $var_Max - $var_Min );

		$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
		$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
		$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

		if	  ($var_R == $var_Max) $H = $del_B - $del_G;
		else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
		else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

		if ($H<0) $H++;
		if ($H>1) $H--;
	}

	$HSL['H'] = ($H*360);
	$HSL['S'] = $S;
	$HSL['L'] = $L;

	return $HSL;
}

function mts_hsl_to_hex( $hsl = array() ){

	list($H,$S,$L) = array( $hsl['H']/360,$hsl['S'],$hsl['L'] );

	if( $S == 0 ) {
		$r = $L * 255;
		$g = $L * 255;
		$b = $L * 255;
	} else {

		if($L<0.5) {
			$var_2 = $L*(1+$S);
		} else {
			$var_2 = ($L+$S) - ($S*$L);
		}

		$var_1 = 2 * $L - $var_2;

		$r = round(255 * mts_huetorgb( $var_1, $var_2, $H + (1/3) ));
		$g = round(255 * mts_huetorgb( $var_1, $var_2, $H ));
		$b = round(255 * mts_huetorgb( $var_1, $var_2, $H - (1/3) ));
	}

	// Convert to hex
	$r = dechex($r);
	$g = dechex($g);
	$b = dechex($b);

	// Make sure we get 2 digits for decimals
	$r = (strlen("".$r)===1) ? "0".$r:$r;
	$g = (strlen("".$g)===1) ? "0".$g:$g;
	$b = (strlen("".$b)===1) ? "0".$b:$b;

	return $r.$g.$b;
}

function mts_huetorgb( $v1,$v2,$vH ) {
	if( $vH < 0 ) {
		$vH += 1;
	}

	if( $vH > 1 ) {
		$vH -= 1;
	}

	if( (6*$vH) < 1 ) {
		   return ($v1 + ($v2 - $v1) * 6 * $vH);
	}

	if( (2*$vH) < 1 ) {
		return $v2;
	}

	if( (3*$vH) < 2 ) {
		return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
	}

	return $v1;

}

function mts_check_hex_color( $hex ) {
	// Strip # sign is present
	$color = str_replace("#", "", $hex);

	// Make sure it's 6 digits
	if( strlen($color) == 3 ) {
		$color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
	}

	return $color;
}

// Check if color is considered light or not
function mts_is_light_color( $color ){

	$color = mts_check_hex_color( $color );

	// Calculate straight from rbg
	$r = hexdec($color[0].$color[1]);
	$g = hexdec($color[2].$color[3]);
	$b = hexdec($color[4].$color[5]);

	return ( ( $r*299 + $g*587 + $b*114 )/1000 > 130 );
}

// Darken color by given amount in %
function mts_darken_color( $color, $amount = 10 ) {

	$hsl = mts_hex_to_hsl( $color );

	// Darken
	$hsl['L'] = ( $hsl['L'] * 100 ) - $amount;
	$hsl['L'] = ( $hsl['L'] < 0 ) ? 0 : $hsl['L']/100;

	// Return as HEX
	return mts_hsl_to_hex($hsl);
}

// Lighten color by given amount in %
function mts_lighten_color( $color, $amount = 10 ) {

	$hsl = mts_hex_to_hsl( $color );

	// Lighten
	$hsl['L'] = ( $hsl['L'] * 100 ) + $amount;
	$hsl['L'] = ( $hsl['L'] > 100 ) ? 1 : $hsl['L']/100;
	
	// Return as HEX
	return mts_hsl_to_hex($hsl);
}

/*-----------------------------------------------------------------------------------*/
/*  Generate css from background option
/*-----------------------------------------------------------------------------------*/
function mts_get_background_styles( $option_id ) {

	$mts_options = get_option( MTS_THEME_NAME );

	if ( ! isset( $mts_options[ $option_id ]) ) return;

	$background_option = $mts_options[ $option_id ];

	$output = '';

	$background_image_type = isset( $background_option['use'] ) ? $background_option['use'] : '';

	if ( isset( $background_option['color'] ) && !empty( $background_option['color'] ) && 'gradient' !== $background_image_type ) {
		$output .= 'background-color:'.$background_option['color'].';';
	}

	if ( !empty( $background_image_type ) ) {

		if ( 'upload' == $background_image_type ) {

			if ( isset( $background_option['image_upload'] ) && !empty( $background_option['image_upload'] ) ) {
				$output .= 'background-image:url('.$background_option['image_upload'].');';
			}
			if ( isset( $background_option['repeat'] ) && !empty( $background_option['repeat'] ) ) {
				$output .= 'background-repeat:'.$background_option['repeat'].';';
			}
			if ( isset( $background_option['attachment'] ) && !empty( $background_option['attachment'] ) ) {
				$output .= 'background-attachment:'.$background_option['attachment'].';';
			}
			if ( isset( $background_option['position'] ) && !empty( $background_option['position'] ) ) {
				$output .= 'background-position:'.$background_option['position'].';';
			}
			if ( isset( $background_option['size'] ) && !empty( $background_option['size'] ) ) {
				$output .= 'background-size:'.$background_option['size'].';';
			}

		} else if ( 'gradient' == $background_image_type ) {

			$from	  = $background_option['gradient']['from'];
			$to		= $background_option['gradient']['to'];
			$direction = $background_option['gradient']['direction'];

			if ( !empty( $from ) && !empty( $to ) ) {

				$output .= 'background: '.$background_option['color'].';';

				if ( 'horizontal' == $direction ) {

					$output .= 'background: -moz-linear-gradient(left, '.$from.' 0%, '.$to.' 100%);';
					$output .= 'background: -webkit-gradient(linear, left top, right top, color-stop(0%,'.$from.'), color-stop(100%,'.$to.'));';
					$output .= 'background: -webkit-linear-gradient(left, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: -o-linear-gradient(left, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: -ms-linear-gradient(left, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: linear-gradient(to right, '.$from.' 0%,'.$to.' 100%);';
					$output .= "filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$from."', endColorstr='".$to."',GradientType=1 );";

				} else {

					$output .= 'background: -moz-linear-gradient(top, '.$from.' 0%, '.$to.' 100%);';
					$output .= 'background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$from.'), color-stop(100%,'.$to.'));';
					$output .= 'background: -webkit-linear-gradient(top, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: -o-linear-gradient(top, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: -ms-linear-gradient(top, '.$from.' 0%,'.$to.' 100%);';
					$output .= 'background: linear-gradient(to bottom, '.$from.' 0%,'.$to.' 100%);';
					$output .= "filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$from."', endColorstr='".$to."',GradientType=0 );";
				}
			}

		} else if ( 'pattern' == $background_image_type ) {

			$output .= 'background-image:url('.get_template_directory_uri().'/images/'.$background_option['image_pattern'].'.png'.');';
		}
	}

	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*  WP Mega Menu Configuration
/*-----------------------------------------------------------------------------------*/
function megamenu_parent_element( $selector ) {
	return '.primary-navigation';
}
add_filter( 'wpmm_container_selector', 'megamenu_parent_element' );

/* Change image size */
function megamenu_thumbnails( $thumbnail_html, $post_id ) {
	$thumbnail_html = '<div class="wpmm-thumbnail">';
	$thumbnail_html .= '<a title="'.get_the_title( $post_id ).'" href="'.get_permalink( $post_id ).'">';
	if(has_post_thumbnail($post_id)):
		$thumbnail_html .= get_the_post_thumbnail($post_id, 'widgetfull', array('title' => ''));
	else:
		$thumbnail_html .= '<img src="'.get_template_directory().'/images/nothumb-widgetfull.png" alt="'.__('No Preview', 'wpmm').'"  class="wp-post-image" />';
	endif;
	$thumbnail_html .= '</a>';
	
	// WP Review
	$thumbnail_html .= (function_exists('wp_review_show_total') ? wp_review_show_total(false) : '');
	
	$thumbnail_html .= '</div>';

	return $thumbnail_html;
}
add_filter( 'wpmm_thumbnail_html', 'megamenu_thumbnails', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*  Create Blog Page on Theme Activation
/*-----------------------------------------------------------------------------------*/
if (isset($_GET['activated']) && is_admin()){
	$blog_page_title = 'Blog';
	$blog_page_content = '';
	$blog_page_template = 'page-blog.php';
	//don't change the code below, unless you know what you're doing
	$page_check = get_page_by_title($blog_page_title);
	$blog_page = array(
		'post_type' => 'page',
		'post_title' => $blog_page_title,
		'post_content' => $blog_page_content,
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($page_check->ID)){
		$blog_page_id = wp_insert_post($blog_page);
		if(!empty($blog_page_template)){
			update_post_meta($blog_page_id, '_wp_page_template', $blog_page_template);
		}
		$page_id = $blog_page_id;
	} else {
	   $page_id = $page_check->ID;
	}
}

// Map images and categories in group field after demo content import
add_filter( 'mts_correct_single_import_option', 'mts_correct_homepage_sections_import', 10, 3 );
function mts_correct_homepage_sections_import( $item, $key, $data ) {

    if ( !in_array( $key, array( 'mts_featured_area_slides', 'mts_our_partner', 'mts_training', 'mts_facility', 'mts_progress', 'mts_featured_categories' ) ) ) return $item;

    $new_item = $item;

    if ( 'mts_featured_area_slides' === $key ) {

        foreach( $item as $i => $image ) {

            $id = $image['mts_featured_area_slide_image'];

            if ( is_numeric( $id ) ) {

                if ( array_key_exists( $id, $data['posts'] ) ) {

                    $new_item[ $i ]['mts_featured_area_slide_image'] = $data['posts'][ $id ];
                }

            } else {

                if ( array_key_exists( $id, $data['image_urls'] ) ) {

                    $new_item[ $i ]['mts_featured_area_slide_image'] = $data['image_urls'][ $id ];
                }
            }
        }

    } elseif ( 'mts_our_partner' === $key ) {

        foreach( $item as $i => $image ) {

            $id = $image['mts_our_partner_image'];

            if ( is_numeric( $id ) ) {

                if ( array_key_exists( $id, $data['posts'] ) ) {

                    $new_item[ $i ]['mts_our_partner_image'] = $data['posts'][ $id ];
                }

            } else {

                if ( array_key_exists( $id, $data['image_urls'] ) ) {

                    $new_item[ $i ]['mts_our_partner_image'] = $data['image_urls'][ $id ];
                }
            }
        }

    } elseif ( 'mts_training' === $key ) {

        foreach( $item as $i => $image ) {

            $id = $image['mts_training_image'];

            if ( is_numeric( $id ) ) {

                if ( array_key_exists( $id, $data['posts'] ) ) {

                    $new_item[ $i ]['mts_training_image'] = $data['posts'][ $id ];
                }

            } else {

                if ( array_key_exists( $id, $data['image_urls'] ) ) {

                    $new_item[ $i ]['mts_training_image'] = $data['image_urls'][ $id ];
                }
            }
        }

    } elseif ( 'mts_facility' === $key ) {

        foreach( $item as $i => $image ) {

            $id = $image['mts_facility_image'];

            if ( is_numeric( $id ) ) {

                if ( array_key_exists( $id, $data['posts'] ) ) {

                    $new_item[ $i ]['mts_facility_image'] = $data['posts'][ $id ];
                }

            } else {

                if ( array_key_exists( $id, $data['image_urls'] ) ) {

                    $new_item[ $i ]['mts_facility_image'] = $data['image_urls'][ $id ];
                }
            }
        }

    } elseif ( 'mts_progress' === $key ) {

        foreach( $item as $i => $image ) {

            $id = $image['mts_progress_image'];

            if ( is_numeric( $id ) ) {

                if ( array_key_exists( $id, $data['posts'] ) ) {

                    $new_item[ $i ]['mts_progress_image'] = $data['posts'][ $id ];
                }

            } else {

                if ( array_key_exists( $id, $data['image_urls'] ) ) {

                    $new_item[ $i ]['mts_progress_image'] = $data['image_urls'][ $id ];
                }
            }
        }

    } else { // mts_featured_categories

        foreach( $item as $i => $category ) {

            $cat_id = $category['mts_featured_category'];

            if ( is_numeric( $cat_id ) && array_key_exists( $cat_id, $data['terms']['category'] ) ) {

                $new_item[ $i ]['mts_featured_category'] = $data['terms']['category'][ $cat_id ];
            }
        }
    }

    return $new_item;
}