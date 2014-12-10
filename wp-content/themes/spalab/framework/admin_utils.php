<?php
/** dttheme_option()
 * Objective:
 *		To get my theme options stored in database by the thme option page at back end.
 **/
function dttheme_option($key1, $key2 = '') {
	$options = get_option ( IAMD_THEME_SETTINGS );
	$output = NULL;

	if (is_array ( $options )) {

		if (array_key_exists ( $key1, $options )) {
			$output = $options [$key1];
			if (is_array ( $output ) && ! empty ( $key2 )) {
				$output = (array_key_exists ( $key2, $output ) && (! empty ( $output [$key2] ))) ? $output [$key2] : NULL;
			}
		} else {
			$output = $output;
		}
	}
	return $output;
}
// # --- **** dttheme_option() *** --- ###

/**
 * dttheme_default_option()
 * Objective:
 * To return my theme default options to store in database.
 */
function dttheme_default_option() {
	
	$general = array(
				"logo" => "true",
				"breadcrumb-delimiter"	=>"fa-angle-double-right",
				"enable-favicon" => "true",
				"disable-page-comment"	=>"true",
				"disable-page-title"	=>"true",
				"disable-custom-scroll" =>"on",
				"show-sociables" => "on",
				"top-message" => '<span class="fa fa-phone-square"> </span> 1 (800) 567 8765 <a title="" href=""> name@somemail.com </a>',
				"show-footer" => "on",
				"footer-columns" => "4",
				"show-copyrighttext" => "on",
				"disable-picker"		=>"on",
				"show-footer-logo"		=>"on",
				"copyright-text" => 'Copyright &copy; 2014 Spa Lab Theme All Rights Reserved | <a href="http://themeforest.net/user/designthemes" title=""> Design Themes </a>');
				
	$appearance = array("disable-menu-settings" => "true","disable-typography-settings" => "true","disable-boddy-settings" => "true","skin" => "purple" , "header_type" =>"header1");

	$integration = array(
			"post-googleplus-layout" => "small",
			"post-googleplus-lang" => "en_GB",
			"post-twitter-layout" => "vertical",
			"post-fb_like-layout" => "box_count",
			"post-fb_like-color-scheme" => "light",
			"post-digg-layout" => "medium",
			"post-stumbleupon-layout" => "5",
			"post-linkedin-layout" => "2",
			"page-pintrest-layout" => "none",
			"page-googleplus-layout" => "small",
			"page-googleplus-lang" => "en_GB",
			"page-twitter-layout" => "blue",
			"page-fb_like-layout" => "box_count",
			"page-fb_like-color-scheme" => "light",
			"page-digg-layout" => "medium",
			"page-stumbleupon-layout" => "5",
			"page-linkedin-layout" => "2",
			"page-pintrest-layout" => "none");

	$mobile = array ("is-theme-responsive" => "true");
	
	$social = array ( 'social-1'=>array('icon'=>'flickr.png','link'=>'#'), 'social-2'=>array('icon'=>'google.png','link'=>'#'), 'social-3'=>array('icon'=>'technorati.png','link'=>'#'));

	$seo = array ( "title-delimiter" => "|", 
			"post-title-format" => array ( "blog_title", "post_title" ),
			"page-title-format" => array ( "blog_title", "post_title" ),
			"archive-page-title-format" => array ( "blog_title", "date"	),
			"category-page-title-format" => array (	"blog_title", "category_title" ),
			"tag-page-title-format" => array ( "blog_title", "tag"),
			"search-page-title-format" => array ( "blog_title", "search" ),
			"404-page-title-format" => array ( "blog_title"));	

	$specialty = array (
			"author-archives-layout" => "content-full-width",
			"author-archives-post-layout" => "one-column",
			"category-archives-layout" => "content-full-width",
			"category-archives-post-layout" => "one-column",
			"tag-archives-layout" => "content-full-width",
			"tag-archives-post-layout" => "one-column",
			"gallery-archives-layout" => "content-full-width",
			"gallery-archives-post-layout" => "one-column",
			"search-layout" => "content-full-width",
			"search-post-layout" => "one-column",
			"404-layout" => "content-full-width",
			"404-message" => "<h2> 404! </h2>
<h3> The page you are looking for is Not Found! </h3>
<p>Etiam sit amet orci eget eros faucibus tincidunt. Duis kalam <br> stefen kajas in the enter leo. Sed fringilla mauris sit amet nibh.  </p>");

	$woo = array(
		"shop-product-per-page" => "10",
		"shop-page-product-layout" => "one-third-column",
		"product-layout" => "with-left-sidebar",
		"product-category-layout" => "content-full-width",
		"product-tag-layout" => "content-full-width");


	$company = array(
		'currency' => 'USD',
		
		'dt_company_monday_start' => '08:00',
		'dt_company_monday_end' => '17:00',

		'dt_company_tuesday_start' => '08:00',
		'dt_company_tuesday_end' => '17:00',

		'dt_company_wednesday_start' => '08:00',
		'dt_company_wednesday_end' => '17:00',

		'dt_company_thursday_start' => '08:00',
		'dt_company_thursday_end' => '17:00',

		'dt_company_friday_start' => '08:00',
		'dt_company_friday_end' => '18:00',

		'notification_sender_name' => get_option( 'blogname' ),
		'notification_sender_email' => get_option( 'admin_email' ),
		
		'appointment_notification_to_staff_subject' =>  'Hi [STAFF_NAME] , New booking information ( Booking id: [APPOINTMENT_ID] )',
		'appointment_notification_to_staff_message' => '<p> Hello [STAFF_NAME], </p>
	<p> Your new Booking id : [APPOINTMENT_ID] </p>
	<p> Service: [SERVICE]</p>
	<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
	<p>Client Name: [CLIENT_NAME]</p>
	<p>Client Phone: [CLIENT_PHONE]</p>
	<p>Client Email: [CLIENT_EMAIL]</p>
	<p>[APPOINTMENT_BODY]</p>',
	
	
		'modified_appointment_notification_to_staff_subject' => 'Hi [STAFF_NAME] , ( Booking id: [APPOINTMENT_ID] ) - Modified',
		'modified_appointment_notification_to_staff_message' => '<p> Hello [STAFF_NAME], </p>
		<p> Your Booking id : [APPOINTMENT_ID]  was modified </p>
		<p> Service: [SERVICE]</p>
		<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
		<p>Client Name: [CLIENT_NAME]</p>
		<p>Client Phone: [CLIENT_PHONE]</p>
		<p>Client Email: [CLIENT_EMAIL]</p>
		<p>[APPOINTMENT_BODY]</p>',
		
		'deleted_appointment_notification_to_staff_subject' => 'Hi [STAFF_NAME] , ( Booking id: [APPOINTMENT_ID] ) - Deleted / Declined',
		'deleted_appointment_notification_to_staff_message' => '<p> Hello [STAFF_NAME], </p>
		<p> Booking id : [APPOINTMENT_ID]  was Deleted / Declined </p>
		<p> Service: [SERVICE]</p>
		<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
		<p>Client Name: [CLIENT_NAME]</p>
		<p>Client Phone: [CLIENT_PHONE]</p>
		<p>Client Email: [CLIENT_EMAIL]</p>
		<p>[APPOINTMENT_BODY]</p>',
		
		'agenda_to_staff_subject' => 'Hi [STAFF_NAME] , Your Agenda for [TOMORROW]',
		'agenda_to_staff_message' => '<p> Hello [STAFF_NAME], </p><p>Your agenda for tomorrow is </p><p>[TOMORROW_AGENDA]</p>',

		'appointment_notification_to_client_subject' => 'Hi [CLIENT_NAME] , New booking information ( Booking id: [APPOINTMENT_ID] )',
		'appointment_notification_to_client_message' => '<p> Hello [CLIENT_NAME], </p>
	<p> Your new Booking id : [APPOINTMENT_ID] </p>
	<p> Service: [SERVICE]</p>
	<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
	<p> Amount to pay : [AMOUNT]</p>
	<p>[APPOINTMENT_BODY]</p>
	<p></p>
	<p>Thank you for choosing our company.</p>',

		'modified_appointment_notification_to_client_subject' => 'Hi [CLIENT_NAME] , ( Booking id: [APPOINTMENT_ID] ) - Modified',
		'modified_appointment_notification_to_client_message' => '<p> Hello [CLIENT_NAME], </p>
	<p> Your Booking id : [APPOINTMENT_ID]  was modified </p>
	<p> Service: [SERVICE]</p>
	<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
	<p> Amount to pay : [AMOUNT]</p>
	<p>[APPOINTMENT_BODY]</p>
	<p></p>
	<p>Thank you for choosing our company.</p>',
		
		'deleted_appointment_notification_to_client_subject' => 'Hi [CLIENT_NAME] , ( Booking id: [APPOINTMENT_ID] ) - Deleted / Declined',
		'deleted_appointment_notification_to_client_message' => '<p> Hello [CLIENT_NAME], </p>
		<p> Your Booking id : [APPOINTMENT_ID]  was Deleted / Declined </p>
		<p> Service: [SERVICE]</p>
		<p> Date & Time: [APPOINTMENT_DATE] - [APPOINTMENT_TIME] </p>
		<p>[APPOINTMENT_BODY]</p>',
	
	);
		
			
	$data = array(
		"general" => $general,
		"appearance" => $appearance,
		"integration" => $integration,
		"mobile" => $mobile,
		"social" => $social,
		"seo" => $seo,
		"specialty" => $specialty,
		"company" => $company,
		"woo" => $woo);		
					
	return $data;
}
// # --- **** dttheme_default_option() *** --- ###

/** dttheme_adminpanel_tooltip()
 * Objective:
 *		To place tooltip content in thme option page at back end.
 * args:
 *		1. $tooltip = content which is shown as tooltip
 **/
function dttheme_adminpanel_tooltip($tooltip) {
	$output = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title=''> <img src='" . IAMD_FW_URL . "theme_options/images/help.png' alt='' title='' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip'>\n";
	$output .= $tooltip;
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo $output;
}
// # --- **** dttheme_adminpanel_tooltip() *** --- ###

/**
 * dttheme_adminpanel_image_preview()
 * Objective:
 * To place tooltip content in thme option page at back end.
 * args:
 * 1. $src = image source
 * 2. $backend = true - to get images placed in framework ? false - to get images stored in theme/images folder
 */
function dttheme_adminpanel_image_preview($src, $backend = true, $default = "no-image.jpg") {
	$default = ($backend) ? IAMD_FW_URL . "theme_options/images/" . $default : IAMD_BASE_URL . "images/" . $default;
	$src = ! empty ( $src ) ? $src : $default;
	$output = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title='' class='a_image_preivew'> <img src='" . IAMD_FW_URL . "theme_options/images/image-preview.png' alt='' title='' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip imagepreview'>\n";
	$output .= "\r<img src='{$src}' data-default='{$default}'/>";
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo $output;
}
// # --- **** dttheme_adminpanel_image_preview() *** --- ###

/**
 * dttheme_pagelist()
 * Objective:
 * To create dropdown box with list of pages.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_postlist($id, $selected, $class = "mytheme_select") {
	global $post;
	$args = array (
			'numberposts' => - 1 
	);
	
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Post', 'dt_themes' ) . "</option>";
	$posts = get_posts ( $args );
	foreach ( $posts as $post ) :
		$id = esc_attr ( $post->ID );
		$title = esc_html ( $post->post_title );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	echo $output;
}
// # --- **** dttheme_postlist() *** --- ###

/**
 * dttheme_productlist()
 * Objective:
 * To create dropdown box with list of products.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_productlist($id, $selected, $class = "mytheme_select") {
	global $post;
	$args = array (
			'numberposts' => - 1,
			'post_type' => 'product' 
	);
	
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Product', 'dt_themes' ) . "</option>";
	$posts = get_posts ( $args );
	foreach ( $posts as $post ) :
		$id = esc_attr ( $post->ID );
		$title = esc_html ( $post->post_title );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	echo $output;
}
// # --- **** dttheme_productlist() *** --- ###

function dttheme_product_taxonomy_list($id, $selected = '', $class = "mytheme_select", $taxonomy) {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select', 'dt_themes' ) . "</option>";
	$cats = get_categories ( "taxonomy={$taxonomy}&hide_empty=0" );
	
	foreach ( $cats as $cat ) :
		$id = esc_attr ( $cat->term_id );
		$title = esc_html ( $cat->name );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	
	return $output;
}

/**
 * dttheme_pagelist()
 * Objective:
 * To create dropdown box with list of pages.
 * args:
 * 1. $id = page id
 * 2. $selected = ( true / false)
 */
function dttheme_pagelist($id, $selected, $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Page', 'dt_themes' ) . "</option>";
	$pages = get_pages ( 'title_li=&orderby=name' );
	foreach ( $pages as $page ) :
		$id = esc_attr ( $page->ID );
		$title = esc_html ( $page->post_title );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	echo $output;
}
// # --- **** dttheme_pagelist() *** --- ###

/**
 * dttheme_categorylist()
 * Objective:
 * To create dropdown box with list of categories.
 * args:
 * 1. $id = dropdown id
 * 2. $selected = ( true / false)
 * 3. $class = default class
 */
function dttheme_categorylist($id, $selected = '', $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Category', 'dt_themes' ) . "</option>";
	$cats = get_categories ( 'orderby=name&hide_empty=0' );
	foreach ( $cats as $cat ) :
		$id = esc_attr ( $cat->term_id );
		$title = esc_html ( $cat->name );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	return $output;
}
// # --- **** dttheme_categorylist() *** --- ###

// # --- **** dt_theme_catalog_categorylist() *** --- ###

function dt_theme_catalog_categorylist($id, $selected = '', $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Category', 'dt_themes' ) . "</option>";
	$cats = get_categories ( 'taxonomy=catalog_entries&hide_empty=0' );
	foreach ( $cats as $cat ) :
		@$id = esc_attr ( $cat->term_id );
		@$title = esc_html ( $cat->name );
		@$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	return $output;
}

// # --- **** dttheme_portfolio_categorylist() *** --- ###
function dttheme_portfolio_categorylist($id, $selected = '', $class = "mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}
	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";
	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Category', 'dt_themes' ) . "</option>";
	$cats = get_categories ( 'taxonomy=portfolio_entries&hide_empty=0' );
	foreach ( $cats as $cat ) :
		$id = esc_attr ( $cat->term_id );
		$title = esc_html ( $cat->name );
		$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$title}</option>";
	endforeach
	;
	$output .= "</select>\n";
	return $output;
}

function dttheme_custom_widgetarea_list( $id, $selected = "", $class="mytheme_select") {
	$name = explode ( ",", $id );
	if (count ( $name ) > 1) {
		$name = "[{$name[0]}][{$name[1]}]";
	} else {
		$name = "[{$name[0]}]";
	}

	$name = ($class == "multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";

	$widgets = dttheme_option('widgetarea','custom');
    $widgets = is_array($widgets) ? array_unique($widgets) : array();
    $widgets = array_filter($widgets);

	$output = "<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>" . __ ( 'Select Widget Area', 'dt_themes' ) . "</option>";
	foreach( $widgets as $widget){
		$id = mb_convert_case($widget, MB_CASE_LOWER, "UTF-8");
    	$id = str_replace(" ", "-", $widget);
    	$output .= "<option value='{$id}' " . selected ( $selected, $id, false ) . ">{$widget}</option>";
	}
	$output .= "</select>\n";
	return $output;
	
}

/**
 * dttheme_listImage()
 * Args:
 * 1.
 * $dir = location of the folder from which you wnat to get images
 * Objective:
 * Returns an array that contains icon names located at $dir.
 */
function dttheme_listImage($dir) {
	$sociables = array ();
	$icon_types = array (
			'jpg',
			'jpeg',
			'gif',
			'png' 
	);
	
	if (is_dir ( $dir )) {
		$handle = opendir ( $dir );
		while ( false !== ($dirname = readdir ( $handle )) ) {
			
			if ($dirname != "." && $dirname != "..") {
				$parts = explode ( '.', $dirname );
				$ext = strtolower ( $parts [count ( $parts ) - 1] );
				
				if (in_array ( $ext, $icon_types )) {
					$option = $parts [count ( $parts ) - 2];
					$sociables [$dirname] = str_replace ( ' ', '', $option );
				}
			}
		}
		closedir ( $handle );
	}
	
	return $sociables;
}
// # --- **** dttheme_listImage() *** --- ###

/**
 * dttheme_sociables_selection()
 * Objective:
 * Returns selection box.
 */
function dttheme_sociables_selection($name = '', $selected = "") {
	$dir = get_template_directory () . "/images/sociable/";
	$sociables = dttheme_listImage ( $dir );
	$name = ! empty ( $name ) ? "name='mytheme[social][{$name}][icon]'" : '';
	$out = "<select class='social-select' {$name}>"; // ame attribute will be added to this by jQuery menuAdd()
	foreach ( $sociables as $key => $value ) :
		$s = selected ( $key, $selected, false );
		$v = ucwords ( $value );
		$out .= "<option value='{$key}' {$s} >{$v}</option>";
	endforeach
	;
	$out .= "</select>";
	return $out;
}
// # --- **** dttheme_sociables_selection() *** --- ###

/**
 * dttheme_admin_color_picker()
 * Objective:
 * Outputs the wordpress default color picker.
 * Args:
 * 1.Label
 * 2.Name
 * 3.Value - stored in db
 * 4.Tooltip
 */
function dttheme_admin_color_picker($label, $name, $value, $tooltip = NULL) {
	global $wp_version;
	
	$output = "<div class='bpanel-option-set'>\n";
	if (! empty ( $label )) :
		$output .= "<label>{$label}</label>";
		$output .= "<div class='clear'></div>";
	
	
	endif;
	
	if (( float ) $wp_version >= 3.5) :
		$output .= "<input type='text' class='my-color-field medium' name='{$name}' value='{$value}' />";
	 else :
		$output .= "<input type='text' class='medium color_picker_element' name='{$name}' value='{$value}' />";
		$output .= "<div class='color_picker'></div>";
	endif;
	echo $output;
	if ($tooltip != NULL) :
		dttheme_adminpanel_tooltip ( $tooltip );
	
	
	endif;
	echo "</div>\n";
}
// # --- **** dttheme_admin_color_picker() *** --- ###

/**
 * dttheme_admin_fonts()
 * Objective:
 * Outputs the fonts selection box.
 */
function dttheme_admin_fonts($label, $name, $selctedFont) {
	global $dt_google_fonts;
	$f = IAMD_SAMPLE_FONT;
	$css = (! empty ( $selctedFont )) ? 'style="font-family:' . $selctedFont . ';"' : '';
	$output = "<div class='mytheme-font-preview' {$css}>{$f}</div>";
	$output .= "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<select class='mytheme-font-family-selector' name='{$name}'>";
	$output .= "<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
	foreach ( $dt_google_fonts as $fonts ) :
		$rs = selected ( $fonts, $selctedFont, false );
		$output .= "<option value='{$fonts}' {$rs}>{$fonts}</option>";
	endforeach
	;
	$output .= "</select>";
	echo $output;
}
// # --- **** dttheme_admin_fonts() *** --- ###

/**
 * dttheme_admin_jqueryuislider()
 * Objective:
 * Outputs the jQurey UI Slider.
 */
function dttheme_admin_jqueryuislider($label, $id = '', $value = '', $px = "px") {
	$div_value = (! empty ( $value ) && ($px == "px")) ? $value . "px" : $value;
	$output = "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<div id='{$id}' class='mytheme-slider' data-for='{$px}'></div>";
	$output .= "<input type='hidden' class='' name='{$id}' value='{$value}'/>";
	$output .= "<div class='mytheme-slider-txt'>{$div_value}</div>";
	echo $output;
}
// # --- **** dttheme_admin_jqueryuislider() *** --- ###

/**
 * getFolders()
 * Objective:
 */
function getFolders($directory, $starting_with = "", $sorting_order = 0) {
	if (! is_dir ( $directory ))
		return false;
	$dirs = array ();
	$handle = opendir ( $directory );
	while ( false !== ($dirname = readdir ( $handle )) ) {
		if ($dirname != "." && $dirname != ".." && is_dir ( $directory . "/" . $dirname )) {
			if ($starting_with == "")
				$dirs [] = $dirname;
			else {
				$filter = strstr ( $dirname, $starting_with );
				if ($filter !== false)
					$dirs [] = $dirname;
			}
		}
	}
	
	closedir ( $handle );
	
	if ($sorting_order == 1) {
		rsort ( $dirs );
	} else {
		sort ( $dirs );
	}
	return $dirs;
}
// # --- **** getFolders() *** --- ###

/**
 * dttheme_switch()
 * Objective:
 * Outputs the switch control at the backend.
 */
function dttheme_switch($label, $parent, $name) {
	$checked = ("true" == dttheme_option ( $parent, $name )) ? ' checked="checked"' : '';
	$switchclass = ("true" == dttheme_option ( $parent, $name )) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$out = "<div data-for='mytheme-{$parent}-{$name}' class='checkbox-switch {$switchclass}'></div>";
	$out .= "<input id='mytheme-{$parent}-{$name}' class='hidden' name='mytheme[{$parent}][{$name}]' type='checkbox' value='true' {$checked} />";
	echo $out;
}
// # --- **** dttheme_switch() *** --- ###

/**
 * dttheme_switch()
 * Objective:
 * Outputs the switch control at the backend.
 */
function dttheme_switch_page($label, $name, $value, $datafor = NULL) {
	$checked = ("true" == $value) ? ' checked="checked"' : '';
	$switchclass = ("true" == $value) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$datafor = ($datafor == NULL) ? $name : $datafor;
	$out = "<label>{$label}</label>";
	$out .= '<div class="clear"></div>';
	$out .= "<div data-for='{$datafor}' class='checkbox-switch {$switchclass}'></div>";
	$out .= "<input id='{$datafor}' class='hidden' name='{$name}' type='checkbox' value='true' {$checked} />";
	
	echo $out;
}
// # --- **** dttheme_switch() *** --- ###

/**
 * dttheme_bgtypes()
 * Objective:
 * Outputs the <select></select> control at the backend.
 */
function dttheme_bgtypes($name, $parent, $child) {
	$args = array (
			"bg-patterns" => __ ( "Pattern", 'dt_themes' ),
			"bg-custom" => __ ( "Custom Background", 'dt_themes' ),
			"bg-none" => __ ( "None", 'dt_themes' ) 
	);
	$out = '<div class="bpanel-option-set">';
	$out .= "<label>" . __ ( "Background Type", 'dt_themes' ) . "</label>";
	$out .= "<div class='clear'></div>";
	$out .= "<select class='bg-type' name='{$name}'>";
	foreach ( $args as $k => $v ) :
		$rs = selected ( $k, dttheme_option ( $parent, $child ), false );
		$out .= "<option value='{$k}' {$rs}>{$v}</option>";
	endforeach
	;
	$out .= "</select>";
	$out .= '</div>';
	echo $out;
}
### --- ****  dttheme_bgtypes() *** --- ###

function dttheme_standard_font($label, $name, $selectedFont ){
	$fonts = array("Arial","Verdana, Geneva","Trebuchet","Georgia","Times New Roman","Tahoma, Geneva","Palatino","Helvetica");
	$output = "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<select class='mytheme-select' name='{$name}'>";
	$output .= "<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
	foreach ( $fonts as $font ) {
		$rs = selected ( $font, $selectedFont, false );
		$output .= "<option value='{$font}' {$rs}>{$font}</option>";
	}
	$output .= "</select>";
	echo $output;
}

function dttheme_standard_font_style($label, $name, $selectedFontStyle) {
	$styles = array("Normal","Italic","Bold","Bold Italic");
	$output = "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<select class='mytheme-select' name='{$name}'>";
	$output .= "<option value=''>" . __ ( "Select", 'dt_themes' ) . "</option>";
	foreach ( $styles as $style ) {
		$rs = selected ( $style, $selectedFontStyle, false );
		$output .= "<option value='{$style}' {$rs}>{$style}</option>";
	}
	$output .= "</select>";
	echo $output;
}
/* Calender */
function dt_replace( $content , $array ){
    $replace = array(
     '[STAFF_NAME]' => $array['staff_name'],
     '[SERVICE]' => $array['service_name'],
     '[CLIENT_NAME]' => $array['client_name'],
     '[CLIENT_PHONE]' => $array['client_phone'],
     '[CLIENT_EMAIL]' => $array['client_email'],
     '[APPOINTMENT_ID]' => $array['appointment_id'],
     '[APPOINTMENT_TIME]' => $array['appointment_time'],
     '[APPOINTMENT_DATE]' => $array['appointment_date'],
     '[APPOINTMENT_TITLE]' => $array['appointment_title'],   
     '[APPOINTMENT_BODY]' => $array['appointment_body'],
     '[AMOUNT]' => $array['amount'],
     '[COMPANY_LOGO]' => $array['company_logo'],
     '[COMPANY_NAME]' => $array['company_name'],
     '[COMPANY_PHONE]' => $array['company_phone'],
     '[COMPANY_ADDRESS]' => $array['company_address'],
     '[COMPANY_WEBSITE]' => $array['company_website']);

    return str_replace( array_keys( $replace ), array_values( $replace ), $content );
}

function dt_replace_agenda( $content , $array ){
    $replace = array(
     '[STAFF_NAME]' => $array['staff_name'],
     '[TOMORROW]' => $array['tomorrow'],
     '[TOMORROW_AGENDA]' => $array['tomorrow_agenda'],
     '[COMPANY_LOGO]' => $array['company_logo'],
     '[COMPANY_NAME]' => $array['company_name'],
     '[COMPANY_PHONE]' => $array['company_phone'],
     '[COMPANY_ADDRESS]' => $array['company_address'],
     '[COMPANY_WEBSITE]' => $array['company_website']);

    return str_replace( array_keys( $replace ), array_values( $replace ), $content );
}

function dt_company_timer( $name, $selected, $is_start = true){

 	$time_format = get_option( 'time_format' );
 	$time_start = new DateTime( '00:00:00', new DateTimeZone( 'UTC' ) );
    $time_end = new DateTime( '23:45:00', new DateTimeZone( 'UTC' ) );
    $time_interval = '+ 15 min';

    $class = $is_start ? "select_start" : "select_end";

    $output = "<select name='{$name}' class='medium {$class}' data-current='{$selected}'>";
    $output .= ( $is_start ) ? "<option value=''>OFF</option>" : "";
    while( $time_start <= $time_end ){
    	$value = $time_start->format('H:i');
    	$name = $time_start->format($time_format);
    	$s = ( $selected == $value ) ? " selected='selected' " : "";
    	$output .= "<option value='{$value}' {$s}>{$name}</option>";
    	$time_start->modify($time_interval);
    }
    $output .= '</select>';
    return $output;
}

function dt_member_timer( $name, $selected = "", $is_start = true ){

 	$time_format = get_option( 'time_format' );
 	$time_start = new DateTime( '00:00:00', new DateTimeZone( 'UTC' ) );
    $time_end = new DateTime( '23:45:00', new DateTimeZone( 'UTC' ) );
    $time_interval = '+ 15 min';

    $class = $is_start ? "select_start" : "select_end";

    $output = "<select name='{$name}' class='{$class}' data-current='{$selected}'>";
    $output .= ( $is_start ) ? "<option value=''>OFF</option>" : "";
    while( $time_start <= $time_end ){
    	$value = $time_start->format('H:i');
    	$name = $time_start->format($time_format);
    	$s = ( $selected == $value ) ? " selected='selected' " : "";
    	$output .= "<option value='{$value}' {$s}>{$name}</option>";
    	$time_start->modify($time_interval);
    }
    $output .= '</select>';
    return $output;
}

function dt_currency_symbol( $currency = '' ) {
    switch ( $currency ) {
        case 'BRL' :
            $currency_symbol = '&#82;&#36;';
            break;
        case 'BGN' :
            $currency_symbol = '&#1083;&#1074;.';
            break;
        case 'AUD' :
        case 'CAD' :
        case 'CLP' :
        case 'MXN' :
        case 'NZD' :
        case 'HKD' :
        case 'SGD' :
        case 'USD' :
            $currency_symbol = '&#36;';
            break;
        case 'EUR' :
            $currency_symbol = '&euro;';
            break;
        case 'CNY' :
        case 'RMB' :
        case 'JPY' :
            $currency_symbol = '&yen;';
            break;
        case 'RUB' :
            $currency_symbol = '&#1088;&#1091;&#1073;.';
            break;
        case 'KRW' : $currency_symbol = '&#8361;'; break;
        case 'TRY' : $currency_symbol = '&#84;&#76;'; break;
        case 'NOK' : $currency_symbol = '&#107;&#114;'; break;
        case 'ZAR' : $currency_symbol = '&#82;'; break;
        case 'CZK' : $currency_symbol = '&#75;&#269;'; break;
        case 'MYR' : $currency_symbol = '&#82;&#77;'; break;
        case 'DKK' : $currency_symbol = '&#107;&#114;'; break;
        case 'HUF' : $currency_symbol = '&#70;&#116;'; break;
        case 'IDR' : $currency_symbol = 'Rp'; break;
        case 'INR' : $currency_symbol = 'Rs.'; break; #Rs. &#x20b9; &#8377;
        case 'ISK' : $currency_symbol = 'Kr.'; break;
        case 'ILS' : $currency_symbol = '&#8362;'; break;
        case 'PHP' : $currency_symbol = '&#8369;'; break;
        case 'PLN' : $currency_symbol = '&#122;&#322;'; break;
        case 'SEK' : $currency_symbol = '&#107;&#114;'; break;
        case 'CHF' : $currency_symbol = '&#67;&#72;&#70;'; break;
        case 'TWD' : $currency_symbol = '&#78;&#84;&#36;'; break;
        case 'THB' : $currency_symbol = '&#3647;'; break;
        case 'GBP' : $currency_symbol = '&pound;'; break;
        case 'RON' : $currency_symbol = 'lei'; break;
        case 'VND' : $currency_symbol = '&#8363;'; break;
        case 'NGN' : $currency_symbol = '&#8358;'; break;
        default    : $currency_symbol = ''; break;
    }

    return $currency_symbol;
}

function dt_currencies() {
    return array_unique(
            array(
                'AUD' => __( 'Australian Dollars', 'dt_themes' ),
                'BRL' => __( 'Brazilian Real', 'dt_themes' ),
                'BGN' => __( 'Bulgarian Lev', 'dt_themes' ),
                'CAD' => __( 'Canadian Dollars', 'dt_themes' ),
                'CLP' => __( 'Chilean Peso', 'dt_themes' ),
                'CNY' => __( 'Chinese Yuan', 'dt_themes' ),
                'COP' => __( 'Colombian Peso', 'dt_themes' ),             
                'CZK' => __( 'Czech Koruna', 'dt_themes' ),
                'DKK' => __( 'Danish Krone', 'dt_themes' ),
                'EUR' => __( 'Euros', 'dt_themes' ),
                'HKD' => __( 'Hong Kong Dollar', 'dt_themes' ),
                'HRK' => __( 'Croatia kuna', 'dt_themes' ),
                'HUF' => __( 'Hungarian Forint', 'dt_themes' ),
                'ISK' => __( 'Icelandic krona', 'dt_themes' ),
                'IDR' => __( 'Indonesia Rupiah', 'dt_themes' ),
                'INR' => __( 'Indian Rupee', 'dt_themes' ),
                'ILS' => __( 'Israeli Shekel', 'dt_themes' ),
                'JPY' => __( 'Japanese Yen', 'dt_themes' ),
                'KRW' => __( 'South Korean Won', 'dt_themes' ),
                'MYR' => __( 'Malaysian Ringgits', 'dt_themes' ),
                'MXN' => __( 'Mexican Peso', 'dt_themes' ),
                'NGN' => __( 'Nigerian Naira', 'dt_themes' ),
                'NOK' => __( 'Norwegian Krone', 'dt_themes' ),
                'NZD' => __( 'New Zealand Dollar', 'dt_themes' ),
                'PHP' => __( 'Philippine Pesos', 'dt_themes' ),
                'PLN' => __( 'Polish Zloty', 'dt_themes' ),
                'GBP' => __( 'Pounds Sterling', 'dt_themes' ),
                'RON' => __( 'Romanian Leu', 'dt_themes' ),
                'RUB' => __( 'Russian Ruble', 'dt_themes' ),
                'SGD' => __( 'Singapore Dollar', 'dt_themes' ),
                'ZAR' => __( 'South African rand', 'dt_themes' ),
                'SEK' => __( 'Swedish Krona', 'dt_themes' ),
                'CHF' => __( 'Swiss Franc', 'dt_themes' ),
                'TWD' => __( 'Taiwan New Dollars', 'dt_themes' ),
                'THB' => __( 'Thai Baht', 'dt_themes' ),
                'TRY' => __( 'Turkish Lira', 'dt_themes' ),
                'USD' => __( 'US Dollars', 'dt_themes' ),
                'VND' => __( 'Vietnamese Dong', 'dt_themes' ),
            )
        );
}

function durationToString( $duration ) {

    $hours   = (int)( $duration / 3600 );
    $minutes = (int)( ( $duration % 3600 ) / 60 );
    $result  = '';
    if ( $hours > 0 ) {
        $result = sprintf( __( '%d h', 'ab' ), $hours );
        if ( $minutes > 0 ) {
            $result .= ' ';
        }
    }

    if ( $minutes > 0 ) {
        $result .= sprintf( __( '%d min', 'ab' ), $minutes );
    }
 return $result;
}

function dates_range( $start_date, $end_date, $days = array() ){

    $interval = new DateInterval( 'P1D' );

    $realEnd = new DateTime( $end_date );
    $realEnd->add( $interval );

    $period = new DatePeriod( new DateTime( $start_date ), $interval, $realEnd );
    $dates = array();

    foreach ( $period as $date ) {
        $dates[] = in_array( strtolower( $date->format('l')) , $days ) ? $date->format( 'Y-m-d l' ) :"" ;
    }
    
    $dates = array_filter($dates);
    return $dates;
}

function dt_send_mail( $to, $subject, $message ){
	$sender_name =  dttheme_option('company', 'notification_sender_name');
	$sender_name = !empty($sender_name) ? $sender_name : get_option( 'blogname' );

	$sender_email = dttheme_option('company', 'notification_sender_email');
	$sender_email = !empty( $sender_email ) ? $sender_email : get_option( 'admin_email' );

	$from = $sender_name."<{$sender_email}>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: '.$from.'' . "\r\n";
	return @mail( $to, $subject, $message, $headers );
}
/* Calender */