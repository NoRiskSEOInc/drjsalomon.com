<?php
add_action('customize_register','dt_customizer_register' ); 
function dt_customizer_register( $wp_customize ) {
	#To remove default sections
	$wp_customize->remove_section("title_tagline");
	$wp_customize->remove_section("colors");
	$wp_customize->remove_section("background_image");

	#DesignThemes Customizer
	$wp_customize->add_section("dt_customizer_settings",array(
		'title' => __("DesignThemes' Settings" , "dt_themes" )
	));

	#Skin
		$wp_customize->add_setting("dt_skin", array(
			'default' => dttheme_option('appearance','skin'),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control("dt_skin", array(
			'section' => "dt_customizer_settings",
			'priority' =>1,
			'label' => __('Choose skin?','dt_themes'),
			'type' => 'select',
			'choices' => array(
				'blue'=> __('Blue','dt_themes'),
				'chocolate' => __('Chocolate','dt_themes'),
				'coral' => __('Coral','dt_themes'),
				'cyan' => __('Cyan','dt_themes'),
				'eggplant' => __('Eggplant','dt_themes'),
				'electricblue' => __('Electric blue','dt_themes'),
				'ferngreen' => __('fern green','dt_themes'),
				'gold' => __('Gold','dt_themes'),
				'green' => __('Green','dt_themes'),
				'grey' => __('Grey','dt_themes'),
				'khaki' => __('Khaki','dt_themes'),
				'ocean' => __('Ocean','dt_themes'),
				'orange' => __('Orange','dt_themes'),
				'palebrown' => __('Pale brown','dt_themes'),
				'pink' => __('Pink','dt_themes'),
				'purple' => __('Purple','dt_themes'),
				'raspberry' => __('raspberry','dt_themes'),
				'red' => __('Red','dt_themes'),
				'skyblue' => __('Sky blue','dt_themes'),
				'slateblue' => __('Slate blue','dt_themes')
			)
		));
	#Skin End

	#Layout
		$wp_customize->add_setting("dt_layout", array(
			'default' => dttheme_option('appearance','layout'),
			'transport' => 'postMessage'
		));
		$wp_customize->add_control("dt_layout", array(
			'section' => "dt_customizer_settings",
			'priority' =>2,
			'label' => __("Choose Layout:","dt_themes"),
			'type'	=> 'select',
			'choices' => array(
				'boxed' => __("Boxed","dt_themes"),
				'fullwidth' => __("Full Width","dt_themes"),

			)
		));

			#Boxed Layout Pattern
			$wp_customize->add_setting("dt_boxed_layout_bg", array(
				'default' => dttheme_option('appearance','boxed-layout-pattern'),
				'transport' => 'postMessage'));
			$wp_customize->add_control("dt_boxed_layout_bg",array(
				'section'=>"dt_customizer_settings",
				'priority' =>3,
				'label' => __("Choose Background Pattern:","dt_themes"),
				'type'	=> 'select',
				'choices' => array(
					'pattern1.jpg' => __("Pattern 1","dt_themes"),
					'pattern2.jpg' => __("Pattern 2","dt_themes"),
					'pattern3.jpg' => __("Pattern 3","dt_themes"),
					'pattern4.jpg' => __("Pattern 4","dt_themes"),
					'pattern5.jpg' => __("Pattern 5","dt_themes"),
					'pattern6.jpg' => __("Pattern 6","dt_themes"),
					'pattern7.jpg' => __("Pattern 7","dt_themes"),
					'pattern8.jpg' => __("Pattern 8","dt_themes"),
					'pattern9.jpg' => __("Pattern 9","dt_themes"),
					'pattern10.jpg' => __("Pattern 10","dt_themes"),
					'pattern11.png' => __("Pattern 11","dt_themes"),
					'pattern12.png' => __("Pattern 12","dt_themes"),
					'pattern13.png' => __("Pattern 13","dt_themes"),
					'pattern14.png' => __("Pattern 14","dt_themes"),
					'pattern15.png' => __("Pattern 15","dt_themes")
				)
			));
			#Boxed Layout Pattern End

			#Boxed Layout Background Color
			$wp_customize->add_setting("dt_boxed_layout_bg_color",array(
				'default' => dttheme_option('appearance','boxed-layout-pattern-color'),
				'transport' => 'postMessage'));
			$wp_customize->add_control( new WP_Customize_Color_Control(
				$wp_customize,
				"dt_boxed_layout_bg_color",
				array( 'label' => __( "Choose Background Color:","dt_themes"),
						'section' => "dt_customizer_settings",
						'priority' =>4,)
			));
			#Boxed Layout Background Color End
			
			#Boxed Layout BG Opacity
			$wp_customize->add_setting("dt_boxed_layout_bg_opacity", array(
				'default' => dttheme_option('appearance','boxed-layout-pattern-opacity'),
				'transport' => 'postMessage'));

			$wp_customize->add_control("dt_boxed_layout_bg_opacity",array(
				'section' => "dt_customizer_settings",
				'priority' =>5,
				'label' => __("Opacity:","dt_themes"),
				'type'  => 'select',
				'choices' => array("0",
					"0.1"=>"0.1",
					"0.2"=>"0.2",
					"0.3"=>"0.3",
					"0.4"=>"0.4",
					"0.5"=>"0.5",
					"0.6"=>"0.6",
					"0.7"=>"0.7",
					"0.8"=>"0.8",
					"0.9"=>"0.9",
					"1"=>"1")
			));
			#Boxed Layout BG Opacity End
	#Layout End	


	#Hidden - Used to update the back end options by calling customize_save_dt-update-backend-options
	# dt-update-backend-options  == customize_save_dt-update-backend-options
		$wp_customize->add_setting("dt-update-backend-options", array(
			'default' => '',
			'transport' => 'postMessage'
		));

		$wp_customize->add_control( 'dt-update-backend-options',array(
			'section' => 'dt_customizer_settings',
			'type' => 'hidden'
		));
	#Hidden End
	#DesignThemes Customizer - End
} #dt_customizer_register() End 

#For Admin
# customize_controls_print_footer_scripts , customize_controls_print_scripts - To add scripts
# customize_controls_print_styles - to add style for customizer 
add_action( 'customize_controls_print_footer_scripts', 'dt_customiser_admin_scripts' );
function dt_customiser_admin_scripts() {
	wp_enqueue_script( 'dt-customizer' , IAMD_FW_URL.'js/admin/admin-customizer.js');
}

add_action('customize_controls_print_styles', 'dt_customiser_admin_style');
function dt_customiser_admin_style(){
	wp_enqueue_style('dttheme-customizer-css', IAMD_FW_URL.'customizer.css');
}

# For Public
add_action( 'customize_preview_init', 'dt_frontend_customizer_live_preview_js' );
function dt_frontend_customizer_live_preview_js() {
	wp_enqueue_script( 'dt-customizer' , IAMD_FW_URL.'js/public/customizer.js', array( 'jquery', 'customize-preview' ) , "0.1" , true);
}

add_action( 'customize_save_dt-update-backend-options', 'dt_update_backend_options' );
function dt_update_backend_options() {
	$options = get_option(IAMD_THEME_SETTINGS);
	$options['appearance']['skin'] = get_theme_mod('dt_skin');
	$options['appearance']['layout'] = get_theme_mod('dt_layout');
	$options['appearance']['bg-type'] = 'bg-patterns';
	$options['appearance']['boxed-layout-pattern'] = get_theme_mod('dt_boxed_layout_bg');
	$options['appearance']['boxed-layout-pattern-color'] = get_theme_mod('dt_boxed_layout_bg_color');
	$options['appearance']['boxed-layout-pattern-opacity'] = get_theme_mod('dt_boxed_layout_bg_opacity');

	update_option( IAMD_THEME_SETTINGS, $options );
}?>