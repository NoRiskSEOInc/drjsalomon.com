<?php 
	#Display Everywhere
	register_sidebar(array(
		'name' 			=>	'Display Everywhere',
		'id'			=>	'display-everywhere-sidebar',
		'description'	=>	__("Common sidebar that appears on the left (or) right.","dt_themes"),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle"><span>',
		'after_title' 	=> 	'</span></h3>'));
	
	#Custom Sidebars
	$widgets = dttheme_option('widgetarea','custom');
	$widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);
    foreach ($widgets as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  __("A unique sidebar that is created in Admin panel","dt_themes"),
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'</h3>'));
    }
	
		
    #Post's Author Archive Sidebar 
    	$author_archive_layout = dttheme_option('specialty','author-archives-layout');
    	$author_archive_layout = !empty($author_archive_layout) ? $author_archive_layout : "content-full-width";
		if( $author_archive_layout != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__("Author's Archive Sidebar",'dt_themes'),
				'id'			=>	'author-archive-sidebar',
				'description'   =>  __("Author's archive sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}

    #Post's Category Archive Sidebar 
    	$cat_archive_layout = dttheme_option('specialty','category-archives-layout');
    	$cat_archive_layout = !empty($cat_archive_layout) ? $cat_archive_layout : "content-full-width";
		if( $cat_archive_layout != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__("Post's Category Archive Sidebar",'dt_themes'),
				'id'			=>	'post-category-archive-sidebar',
				'description'   =>  __("Category's archive sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}

    #Post's Tag Archive Sidebar
    	$tag_archive_layout = dttheme_option('specialty','tag-archives-layout');
    	$tag_archive_layout = !empty($tag_archive_layout) ? $tag_archive_layout : "content-full-width";
		if( $tag_archive_layout != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__("Tag's Archive Sidebar",'dt_themes'),
				'id'			=>	'post-tags-archive-sidebar',
				'description'   =>  __("Tag's archive sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}

    #Search Page Layout
    	$search_layout = dttheme_option('specialty','search-layout');
    	$search_layout = !empty($search_layout) ? $search_layout : "content-full-width";
		if( $search_layout != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__("Search Sidebar",'dt_themes'),
				'id'			=>	'search-sidebar',
				'description'   =>  __("Search page sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}

    #404 Page Layout
    	$layout_404 = dttheme_option('specialty','404-layout');
    	$layout_404 = !empty($layout_404) ? $layout_404 : "content-full-width";
		if( $layout_404 != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__('Not Found ( 404 ) Sidebar','dt_themes'),
				'id'			=>	'not-found-404-sidebar',
				'description'   =>  __("404 page sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}

if( dttheme_is_plugin_active('designthemes-core-features/designthemes-core-features.php') ):

    	$layout = dttheme_option('specialty','gallery-archives-layout');
    	$layout = !empty($layout) ? $layout : "content-full-width";
    	if( $layout != "content-full-width" ){
			register_sidebar(array(
				'name' 			=>	__("Gallery's Category Sidebar",'dt_themes'),
				'id'			=>	'custom-post-gallery-archives',
				'description'   =>  __("Gallery post's archive sidebar that appears on the left (or) right.","dt_themes"),
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		}
endif;

		
if( class_exists('woocommerce')	):
	#Shop Everywhere Sidebar
	register_sidebar(array(
		'name' 			=>	'Shop Everywhere',
		'id'			=>	'shop-everywhere-sidebar',
		'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widgettitle"><span>',
		'after_title' 	=> 	'</span></h3>'));

	#Custom Sidebars for Product
	$products = dttheme_option("widgetarea","products");
	$products = !empty($products) ? $products : array();
	$widget_areas_for_products = array_filter(array_unique($products));
	foreach($widget_areas_for_products as $id):
		$title = get_the_title($id);
		register_sidebar(array(
			'name' 			=>	"Product: {$title}",
			'id'			=>	"product-{$id}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle"><span>',
			'after_title' 	=> 	'</span></h3>'));
	endforeach;

	#Custom Sidebars for Product Category
	$product_categories = dttheme_option("widgetarea","product-category");
	$product_categories = !empty($product_categories) ? $product_categories : array();
	$widget_areas_for_product_categories = array_filter(array_unique($product_categories));
	
	foreach($widget_areas_for_product_categories as $id):
	
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		
		register_sidebar(array(
			'name' 			=>	"Product Category: {$title}",
			'id'			=>	"product-category-{$slug}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle"><span>',
			'after_title' 	=> 	'</span></h3>'));
	endforeach;
	
	#Custom Sidebars for Product Tag
	$product_tags = dttheme_option("widgetarea","product-tag");
	$product_tags = !empty($product_tags) ? $product_tags : array();
	$widget_areas_for_product_tags = array_filter(array_unique($product_tags));
	foreach($widget_areas_for_product_tags as $id):
		$title = $wpdb->get_var( $wpdb->prepare("SELECT name FROM $wpdb->terms  WHERE term_id = %s",$id));
		$slug  = $wpdb->get_var( $wpdb->prepare("SELECT slug FROM $wpdb->terms  WHERE term_id = %s",$id));	
		register_sidebar(array(
			'name' 			=>	"Product Tag: {$title}",
			'id'			=>	"product-tag-{$slug}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle"><span>',
			'after_title' 	=> 	'</span></h3>'));
	endforeach;
endif;

	
	#Footer Columnns		
	$footer_columns =  dttheme_option('general','footer-columns');
	dttheme_footer_widgetarea($footer_columns);

	#Custom Mega Menu Sidebars
	$widgets = dttheme_option('widgetarea','megamenu');
	$widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);
    foreach ($widgets as $key => $value) {
    	$id = mb_convert_case($value, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $id);

    	register_sidebar(array(
		'name' 			=>	$value,
		'id'			=>	$id,
		'description'   =>  __("A unique mega menu sidebar that is created in Admin panel","dt_themes"),
		'before_widget' => 	'<li id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</li>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'</h3>'));
    }
	?>