<?php if (!function_exists('dt_theme_features')) {

	// Register Theme Features
	function dt_theme_features() {
		global $wp_version;

		# Now Theme supports WooCommerce
		add_theme_support('woocommerce');
		
		# Now theme supports custom header
		add_theme_support( 'custom-header' );
		
		# Now Theme support custom background
		add_theme_support( 'custom-background' );

		// Add theme support for Translation
		load_theme_textdomain('dt_themes', get_template_directory().'/languages');

		// Add theme support for Post Formats
		$formats = array(
			'status',
			'quote',
			'gallery',
			'image',
			'video',
			'audio',
			'link',
			'aside',
			'chat'
		);
		add_theme_support('post-formats', $formats);
		// END of Post Formats

		// Add theme support for custom CSS in the TinyMCE visual editor
		add_editor_style('custom-editor-style.css');
		
		// Add theme support for Automatic Feed Links
	
		add_theme_support('automatic-feed-links');
		// END of Automatic Feed Links

		// Add theme support for Featured Images
		add_theme_support('post-thumbnails', array(
			'post',
			'page',
			'product',
			'dt_catalog',
			'dt_services',
			'dt_staffs'
		));

		// END of Featured Images option
		
		if (version_compare($wp_version, '3.6', '>=')) :
		
			$args = array(
				'search-form',
				'comment-form',
				'comment-list'
			);
		
			add_theme_support( 'html5', $args );		
		endif;

	}
	// Hook into the 'after_setup_theme' action
	add_action('after_setup_theme', 'dt_theme_features');

}

if (!function_exists('dt_theme_activation_function')) {
	function dt_theme_activation_function($oldname, $oldtheme=false) {
		update_option(IAMD_THEME_SETTINGS, dttheme_default_option());
	}
	add_action("after_switch_theme", "dt_theme_activation_function", 10 , 2);
}


if (!function_exists('dt_theme_navigation_menus')) {

	// Register Navigation Menus
	function dt_theme_navigation_menus() {
		$locations = array(
			'header_menu' => __('Header Menu', 'dt_themes'),
			'top_menu' => __('Top Menu', 'dt_themes'),
			'footer_menu' => __('Footer Menu', 'dt_themes')
		);
		register_nav_menus($locations);
	}

	// Hook into the 'init' action
	add_action('init', 'dt_theme_navigation_menus');
}