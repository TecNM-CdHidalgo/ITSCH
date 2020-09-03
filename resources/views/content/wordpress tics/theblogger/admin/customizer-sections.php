<?php

	function theblogger_customize_register__sections($wp_customize)
	{
		$wp_customize->add_section('theblogger_section_main_style',
								   array('title'       => esc_html__('Main Style', 'theblogger'),
										 'description' => esc_html__('Select theme style.', 'theblogger'),
										 'priority'    => 1));
		
		$wp_customize->add_panel('theblogger_panel_general',
								 array('title'       => esc_html__('General', 'theblogger'),
									   'description' => esc_html__('General options.', 'theblogger'),
									   'priority'    => 2));
		
				$wp_customize->add_section('theblogger_section_layout',
										   array('title'       => esc_html__('Layout', 'theblogger'),
												 'description' => esc_html__('Set theme layout.', 'theblogger'),
												 'panel'       => 'theblogger_panel_general',
												 'priority'    => 3));
				
				$wp_customize->add_section('theblogger_section_fonts',
										   array('title'       => esc_html__('Fonts', 'theblogger'),
												 'description' => esc_html__('Theme font settings.', 'theblogger'),
												 'panel'       => 'theblogger_panel_general',
												 'priority'    => 4));
			
				$wp_customize->add_section('theblogger_section_chars',
										   array('title'       => esc_html__('Characters', 'theblogger'),
												 'description' => esc_html__('Set character sets.', 'theblogger'),
												 'panel'       => 'theblogger_panel_general',
												 'priority'    => 5));
				
				$wp_customize->add_section('theblogger_section_colors',
										   array('title'       => esc_html__('Colors', 'theblogger'),
												 'description' => esc_html__('Select theme colors.', 'theblogger'),
												 'panel'       => 'theblogger_panel_general',
												 'priority'    => 6));
		
		
		$wp_customize->add_panel('theblogger_panel_header',
								 array('title'       => esc_html__('Header', 'theblogger'),
									   'description' => esc_html__('Theme header options.', 'theblogger'),
									   'priority'    => 21));
				
				$wp_customize->add_section('theblogger_section_header_general',
										   array('title'       => esc_html__('General', 'theblogger'),
												 'description' => esc_html__('General header options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_header',
												 'priority'    => 22));
				
				$wp_customize->add_section('theblogger_section_header_menu',
										   array('title'       => esc_html__('Menu', 'theblogger'),
												 'description' => esc_html__('Navigation menu options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_header',
												 'priority'    => 23));
		
		
		$wp_customize->add_section('theblogger_section_footer',
								   array('title'       => esc_html__('Footer', 'theblogger'),
										 'description' => esc_html__('Theme footer options.', 'theblogger'),
										 'priority'    => 24));
		
		
		$wp_customize->add_panel('theblogger_panel_featured_area',
								 array('title'       => esc_html__('Featured Area', 'theblogger'),
									   'description' => esc_html__('Featured Area options.', 'theblogger'),
									   'priority'    => 25));
				
				$wp_customize->add_section('theblogger_section_featured_area_general',
										   array('title'       => esc_html__('General', 'theblogger'),
												 'description' => esc_html__('General options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_featured_area',
												 'priority'    => 26));
				
				$wp_customize->add_section('theblogger_section_featured_area_slider',
										   array('title'       => esc_html__('Slider', 'theblogger'),
												 'description' => esc_html__('Go to Widgets section and add Main Slider widget to any Featured Area.', 'theblogger'),
												 'panel'       => 'theblogger_panel_featured_area',
												 'priority'    => 27));
				
				$wp_customize->add_section('theblogger_section_featured_area_link_box',
										   array('title'       => esc_html__('Link Box', 'theblogger'),
												 'description' => esc_html__('Go to Widgets section and drag and drop Link Box widgets to Blog/Page Featured Area.', 'theblogger'),
												 'panel'       => 'theblogger_panel_featured_area',
												 'priority'    => 28));
				
				$wp_customize->add_section('theblogger_section_featured_area_intro',
										   array('title'       => esc_html__('Intro', 'theblogger'),
												 'description' => esc_html__('Go to Widgets section and drag and drop Intro widget to Blog/Page Featured Area.', 'theblogger'),
												 'panel'       => 'theblogger_panel_featured_area',
												 'priority'    => 29));
		
		
		$wp_customize->add_section('theblogger_section_blog',
								   array('title'       => esc_html__('Blog', 'theblogger'),
										 'description' => esc_html__('Blog page options.', 'theblogger'),
										 'priority'    => 30));
		
		$wp_customize->add_section('theblogger_section_post',
								   array('title'       => esc_html__('Single Post', 'theblogger'),
										 'description' => esc_html__('Individual post options.', 'theblogger'),
										 'priority'    => 31));
		
		$wp_customize->add_panel('theblogger_panel_meta',
								 array('title'       => esc_html__('Meta', 'theblogger'),
									   'description' => esc_html__('Meta options.', 'theblogger'),
									   'priority'    => 32));
		
				$wp_customize->add_section('theblogger_section_meta_style',
										   array('title'       => esc_html__('Style', 'theblogger'),
												 'description' => esc_html__('Meta style options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_meta',
												 'priority'    => 33));
		
				$wp_customize->add_section('theblogger_section_meta_blog',
										   array('title'       => esc_html__('Blog Meta', 'theblogger'),
												 'description' => esc_html__('Blog meta options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_meta',
												 'priority'    => 34));
				
				$wp_customize->add_section('theblogger_section_meta_post',
										   array('title'       => esc_html__('Single Post Meta', 'theblogger'),
												 'description' => esc_html__('Post meta options.', 'theblogger'),
												 'panel'       => 'theblogger_panel_meta',
												 'priority'    => 35));
		
		$wp_customize->add_section('theblogger_section_sidebar',
								   array('title'       => esc_html__('Sidebar', 'theblogger'),
										 'description' => esc_html__('Theme sidebar settings.', 'theblogger'),
										 'priority'    => 36));
		
		$wp_customize->add_section('theblogger_section_portfolio',
								   array('title'       => esc_html__('Portfolio', 'theblogger'),
										 'description' => esc_html__('Portfolio page options.', 'theblogger'),
										 'priority'    => 37));
		
		$wp_customize->add_section('theblogger_section_shop',
								   array('title'       => esc_html__('Shop', 'theblogger'),
										 'description' => esc_html__('Shop page options.', 'theblogger'),
										 'priority'    => 38));
		
		$wp_customize->add_panel('widgets',
								 array('title'       => esc_html__('Widgets', 'theblogger'),
									   'description' => esc_html__('Widgets are independent sections of content that can be placed into widgetized areas provided by your theme (commonly called sidebars).', 'theblogger'),
									   'priority'    => 99));
		
		$wp_customize->add_section('theblogger_section_custom_css',
								   array('title'       => esc_html__('Custom CSS', 'theblogger'),
										 'description' => esc_html__('Quickly add custom css.', 'theblogger'),
										 'priority'    => 121));
	}
	
	add_action('customize_register', 'theblogger_customize_register__sections');
	
	
	function theblogger_sanitize($value)
	{
		return $value;
	}

?>