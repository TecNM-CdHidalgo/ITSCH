<?php

	function theblogger_customize_register__settings($wp_customize)
	{
		$theblogger_control_main_style_choices = array(
			""           => 'Default',
			'default-v2' => 'Default v2',
			'adventura'  => 'Adventura',
			'milo'       => 'Milo',
			'phil'       => 'Phil',
			'mona'       => 'Mona',
			'misty'      => 'Misty',
			'lisa'       => 'Lisa',
			'eric'       => 'Eric',
			'lori'       => 'Lori',
			'john'       => 'John',
			'anna'       => 'Anna',
			'roger'      => 'Roger',
			'emma'       => 'Emma',
			'andy'       => 'Andy',
			'oliver'     => 'Oliver',
			'jim'        => 'Jim'
		);
		
		$wp_customize->add_setting('theblogger_setting_main_style',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_style',
								   array('label'       => esc_html__('Styles', 'theblogger'),
										 'description' => esc_html__('Pre-defined styles.', 'theblogger'),
										 'section'     => 'theblogger_section_main_style',
										 'settings'    => 'theblogger_setting_main_style',
										 'type'        => 'select',
										 'choices'     => $theblogger_control_main_style_choices));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_color_link',
								   array('default'           => '#d2ab74',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_link',
																  array('label'    => esc_html__('Link Color', 'theblogger'),
																		'section'  => 'theblogger_section_colors',
																		'settings' => 'theblogger_setting_color_link')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_link_hover',
								   array('default'           => '#c9b69b',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_link_hover',
																  array('label'    => esc_html__('Link Hover Color', 'theblogger'),
																		'section'  => 'theblogger_section_colors',
																		'settings' => 'theblogger_setting_color_link_hover')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_body_text',
								   array('default'           => '#222222',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_body_text',
																  array('label'    => esc_html__('Body Text Color', 'theblogger'),
																		'section'  => 'theblogger_section_colors',
																		'settings' => 'theblogger_setting_color_body_text')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_body_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_body_bg',
																  array('label'    => esc_html__('Body Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_colors',
																		'settings' => 'theblogger_setting_color_body_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_button_hover_bg',
								   array('default'           => '#333333',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_button_hover_bg',
																  array('label'    => esc_html__('Button Hover Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_colors',
																		'settings' => 'theblogger_setting_color_button_hover_bg')));
		
		
		/* ================================================== */
		
		
		include_once(get_template_directory() . '/admin/fonts.php');
		
		
		$theblogger_font_weights = array('100' => '100',
										 '200' => '200',
										 '300' => '300',
										 '400' => '400',
										 '500' => '500',
										 '600' => '600',
										 '700' => '700',
										 '800' => '800',
										 '900' => '900');
		
		
		$theblogger_setting_yes_no = array('Yes' => 'Yes',
										   'No'  => 'No');
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_font_text_logo',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_text_logo',
								   array('label'    => esc_html__('Text Logo Font', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_font_text_logo',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_text_logo',
								   array('default'           => '48',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_text_logo',
								   array('label'    => esc_html__('Text Logo Font Size (px)', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_font_size_text_logo',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 8,
																'max'  => 300,
																'step' => 4)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_text_logo',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_text_logo',
								   array('label'    => esc_html__('Text Logo Font Weight', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_font_weight_text_logo',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_logo_site',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
																  'theblogger_control_logo_site',
																  array('label'       => esc_html__('Image Logo', 'theblogger'),
																		'description' => esc_html__('Upload a logo or choose an image from your media library.', 'theblogger'),
																		'section'     => 'title_tagline',
																		'settings'    => 'theblogger_setting_logo_site')));
		
		
		$wp_customize->add_setting('theblogger_setting_logo_height',
								   array('default'           => '80',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_logo_height',
								   array('label'    => esc_html__('Image Logo Height (px)', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_logo_height',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 20,
																'max'  => 400,
																'step' => 5)));
		
		
		$wp_customize->add_setting('theblogger_setting_logo_height_mobile',
								   array('default'           => '60',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_logo_height_mobile',
								   array('label'    => esc_html__('Image Logo Height Mobile (px)', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_logo_height_mobile',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 30,
																'max'  => 300,
																'step' => 5)));
		
		
		$wp_customize->add_setting('theblogger_setting_logo_margin',
								   array('default'           => '50',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_logo_margin',
								   array('label'    => esc_html__('Logo Margin (px)', 'theblogger'),
										 'section'  => 'title_tagline',
										 'settings' => 'theblogger_setting_logo_margin',
										 'type'     => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 500,
																'step' => 5)));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_font_h1',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_h1',
								   array('label'    => esc_html__('Heading Font (H1)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_h1',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_h1',
								   array('default'           => '48',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_h1',
								   array('label'    => esc_html__('Heading (H1) Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_size_h1',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_h1',
								   array('default'           => '700',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_h1',
								   array('label'    => esc_html__('Heading Font Weight (H1)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_weight_h1',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_text_transform_h1',
								   array('default'           => 'none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_text_transform_h1',
								   array('label'    => esc_html__('Heading Font Text Transform (H1)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_text_transform_h1',
										 'type'     => 'select',
										 'choices'  => array('none'      => 'None',
															 'uppercase' => 'Uppercase')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_h2_h6',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font (H2-H6)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_h2_h6',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_h2_h6',
								   array('default'           => '700',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font Weight (H2-H6)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_weight_h2_h6',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_text_transform_h2_h6',
								   array('default'           => 'none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_text_transform_h2_h6',
								   array('label'    => esc_html__('Sub Heading Font Text Transform (H2-H6)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_text_transform_h2_h6',
										 'type'     => 'select',
										 'choices'  => array('none'      => 'None',
															 'uppercase' => 'Uppercase')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_body',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_body',
								   array('label'    => esc_html__('Body Font', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_body',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_body',
								   array('default'           => '14',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_body',
								   array('label'    => esc_html__('Body Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_fonts',
										 'settings' => 'theblogger_setting_font_size_body',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_body_line_height',
								   array('default'           => '1.8',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_body_line_height',
								   array('label'       => esc_html__('Body Line Height', 'theblogger'),
										 'section'     => 'theblogger_section_fonts',
										 'settings'    => 'theblogger_setting_body_line_height',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 1,
																'max'  => 3,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_styles',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_styles',
								   array('label'       => esc_html__('Include All Font Weights (100-900)', 'theblogger'),
										 'description' => esc_html__('Bold/italic styles.', 'theblogger'),
										 'section'     => 'theblogger_section_fonts',
										 'settings'    => 'theblogger_setting_font_styles',
										 'type'        => 'select',
										 'choices'     => array('No'  => 'No',
																'Yes' => 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_latin',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_latin',
								   array('label'    => esc_html__('Latin Characters', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_latin',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_latin_ext',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_latin_ext',
								   array('label'    => esc_html__('Latin Characters (extended)', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_latin_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_cyrillic',
								   array('default'   	     => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_cyrillic',
								   array('label'    => esc_html__('Cyrillic Characters', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_cyrillic',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_cyrillic_ext',
								   array('default'      	 => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_cyrillic_ext',
								   array('label'    => esc_html__('Cyrillic Characters (extended)', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_cyrillic_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_greek',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_greek',
								   array('label'    => esc_html__('Greek Characters', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_greek',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_greek_ext',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_greek_ext',
								   array('label'    => esc_html__('Greek Characters (extended)', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_greek_ext',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_font_char_sets_vietnamese',
								   array('default'   		 => 0,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_char_sets_vietnamese',
								   array('label'    => esc_html__('Vietnamese Characters', 'theblogger'),
										 'section'  => 'theblogger_section_chars',
										 'settings' => 'theblogger_setting_font_char_sets_vietnamese',
										 'type'     => 'checkbox'));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_body_layout',
								   array('default'           => 'is-body-full-width',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_body_layout',
								   array('label'    => esc_html__('Body Layout', 'theblogger'),
										 'section'  => 'theblogger_section_layout',
										 'settings' => 'theblogger_setting_body_layout',
										 'type'     => 'select',
										 'choices'  => array('is-body-full-width' => 'Full-width',
															 'is-body-boxed' 	  => 'Boxed',
															 'is-middle-boxed' 	  => 'Middle Boxed')));
		
		
		$wp_customize->add_setting('theblogger_setting_body_top_bottom_margin',
								   array('default'           => '0',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_body_top_bottom_margin',
								   array('label'       => esc_html__('Body Top-Bottom Margin', 'theblogger'),
										 'section'     => 'theblogger_section_layout',
										 'settings'    => 'theblogger_setting_body_top_bottom_margin',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 400,
																'step' => 20)));
		
		
		$wp_customize->add_setting('theblogger_setting_content_width',
								   array('default'           => '1060',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_content_width',
								   array('label'       => esc_html__('Content Width (px)', 'theblogger'),
										 'section'     => 'theblogger_section_layout',
										 'settings'    => 'theblogger_setting_content_width',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 500,
																'max'  => 5000,
																'step' => 10)));
		
		
		$wp_customize->add_setting('theblogger_setting_page_post_content_width',
								   array('default'           => '740',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_page_post_content_width',
								   array('label'       => esc_html__('Page/Post Content Width (px)', 'theblogger'),
										 'section'     => 'theblogger_section_layout',
										 'settings'    => 'theblogger_setting_page_post_content_width',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 320,
																'max'  => 2000,
																'step' => 10)));
		
		
		$wp_customize->add_setting('theblogger_setting_mobile_zoom',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_mobile_zoom',
								   array('label'    => esc_html__('Mobile Zoom', 'theblogger'),
										 'section'  => 'theblogger_section_layout',
										 'settings' => 'theblogger_setting_mobile_zoom',
										 'type'     => 'select',
										 'choices'  => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_smooth_scroll',
								   array('default'           => 'no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_smooth_scroll',
								   array('label'    => esc_html__('Smooth Scroll', 'theblogger'),
										 'section'  => 'theblogger_section_layout',
										 'settings' => 'theblogger_setting_smooth_scroll',
										 'type'     => 'select',
										 'choices'  => array('no'  => 'No',
															 'yes' => 'Yes')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_header_layout',
								   array('default'           => 'is-menu-top is-menu-bar',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_header_layout',
								   array('label'    => esc_html__('Header Layout', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_layout',
										 'type'     => 'select',
										 'choices'  => array('is-menu-top is-menu-bar'    => 'Menu Top',
															 'is-menu-bottom is-menu-bar' => 'Menu Bottom',
															 'is-header-row'              => 'Header One Row',
															 'is-header-small'            => 'Header Small')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_width',
								   array('default'           => 'is-header-full-width',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_width',
								   array('label'    => esc_html__('Header Width', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_width',
										 'type'     => 'select',
										 'choices'  => array('is-header-full-width'        => 'Full',
															 'is-header-fixed-width'       => 'Fixed',
															 'is-header-full-with-margins' => 'Full with margins')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_header_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_header_bg',
																  array('label'    => esc_html__('Header Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_header_general',
																		'settings' => 'theblogger_setting_color_header_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_bg_img',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
																  'theblogger_control_header_bg_img',
																  array('label'       => esc_html__('Header Background Image', 'theblogger'),
																		'description' => esc_html__('Upload an image or choose from your media library.', 'theblogger'),
																		'section'     => 'theblogger_section_header_general',
																		'settings'    => 'theblogger_setting_header_bg_img')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_parallax_effect',
								   array('default'           => 'is-header-parallax-no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_header_parallax_effect',
								   array('label'    => esc_html__('Header Parallax Effect', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-header-parallax-no' => 'No',
															 'is-header-parallax' 	 => 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_bg_video',
								   array('default' 			 => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_header_bg_video',
								   array('label'       => esc_html__('Header Background Video', 'theblogger'),
										 'description' => esc_html__('YouTube, Vimeo page url.', 'theblogger'),
										 'section'     => 'theblogger_section_header_general',
										 'settings'    => 'theblogger_setting_header_bg_video',
										 'type'        => 'text'));
		
		
		$wp_customize->add_setting('theblogger_setting_header_mask_style',
								   array('default'           => 'none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_mask_style',
								   array('label'    => esc_html__('Header Mask Style', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_mask_style',
										 'type'     => 'select',
										 'choices'  => array('none'    	  => 'None',
															 'solid'      => 'Solid Color',
															 'vertical'   => 'Vertical Gradient',
															 'horizontal' => 'Horizontal Gradient',
															 'radial' 	  => 'Radial Gradient')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_header_mask_1',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_header_mask_1',
																  array('label'    => esc_html__('Header Mask Color 1', 'theblogger'),
																		'section'  => 'theblogger_section_header_general',
																		'settings' => 'theblogger_setting_color_header_mask_1')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_header_mask_2',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_header_mask_2',
																  array('label'    => esc_html__('Header Mask Color 2', 'theblogger'),
																		'section'  => 'theblogger_section_header_general',
																		'settings' => 'theblogger_setting_color_header_mask_2')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_mask_opacity',
								   array('default'           => '0.4',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_mask_opacity',
								   array('label'       => esc_html__('Header Mask Opacity', 'theblogger'),
										 'section'     => 'theblogger_section_header_general',
										 'settings'    => 'theblogger_setting_header_mask_opacity',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 1.0,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('theblogger_setting_header_text_color',
								   array('default'           => 'is-header-light',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_text_color',
								   array('label'    => esc_html__('Header Text Color', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_text_color',
										 'type'     => 'select',
										 'choices'  => array('is-header-light' => 'Dark',
															 'is-header-dark'  => 'Light')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_search',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_header_search',
								   array('label'    => esc_html__('Header Search', 'theblogger'),
										 'section'  => 'theblogger_section_header_general',
										 'settings' => 'theblogger_setting_header_search',
										 'type'     => 'select',
										 'choices'  => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_menu_behaviour',
								   array('default'       	 => 'is-menu-sticky',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_menu_behaviour',
								   array('label'    => esc_html__('Menu Behaviour', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_menu_behaviour',
										 'type'     => 'select',
										 'choices'  => array('is-menu-sticky' 					   => 'Sticky',
														     'is-menu-sticky is-menu-smart-sticky' => 'Smart Sticky',
														     'is-menu-static' 					   => 'Static')));
		
		
		$wp_customize->add_setting('theblogger_setting_menu_width',
								   array('default'       	 => 'is-menu-fixed-width',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_menu_width',
								   array('label'    => esc_html__('Menu Width', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_menu_width',
										 'type'     => 'select',
										 'choices'  => array('is-menu-fixed-width' => 'Fixed',
														     'is-menu-fixed-bg'    => 'Fixed Bg',
														     'is-menu-full'        => 'Full')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_menu_align',
								   array('default'           => 'is-menu-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_menu_align',
								   array('label'    => esc_html__('Menu Align', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_header_menu_align',
										 'type'     => 'select',
										 'choices'  => array('is-menu-align-center' => 'Center',
															 'is-menu-align-left'   => 'Left',
															 'is-menu-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_menu_style',
								   array('default'           => 'is-menu-light',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_menu_style',
								   array('label'    => esc_html__('Menu Text Color', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_header_menu_style',
										 'type'     => 'select',
										 'choices'  => array('is-menu-light' => 'Dark',
															 'is-menu-dark'  => 'Light')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_menu_bg',
								   array('default'           => '#ffffff',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_menu_bg',
																  array('label'    => esc_html__('Menu Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_header_menu',
																		'settings' => 'theblogger_setting_color_menu_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_menu_link_hover',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_menu_link_hover',
																  array('label'    => esc_html__('Menu Link Hover Color', 'theblogger'),
																		'section'  => 'theblogger_section_header_menu',
																		'settings' => 'theblogger_setting_color_menu_link_hover')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_menu',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_menu',
								   array('label'       => esc_html__('Menu Font', 'theblogger'),
										 'description' => esc_html__('Also for buttons and labels.', 'theblogger'),
										 'section'     => 'theblogger_section_header_menu',
										 'settings'    => 'theblogger_setting_font_menu',
										 'type'        => 'select',
										 'choices'     => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_nav_menu',
								   array('default'           => '11',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_nav_menu',
								   array('label'    => esc_html__('Menu Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_font_size_nav_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_nav_menu',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_nav_menu',
								   array('label'    => esc_html__('Menu Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_font_weight_nav_menu',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_letter_spacing_nav_menu',
								   array('default'           => '1',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_letter_spacing_nav_menu',
								   array('label'    => esc_html__('Menu Letter Spacing (px)', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_letter_spacing_nav_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_header_sub_menu_style',
								   array('default'           => 'is-submenu-light',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_sub_menu_style',
								   array('label'    => esc_html__('Sub Menu Style', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_header_sub_menu_style',
										 'type'     => 'select',
										 'choices'  => array('is-submenu-light'        => 'Light',
															 'is-submenu-light-border' => 'Light Border',
															 'is-submenu-dark'         => 'Dark')));
		
		
		$wp_customize->add_setting('theblogger_setting_header_sub_menu_align',
								   array('default'           => 'is-submenu-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_sub_menu_align',
								   array('label'    => esc_html__('Sub Menu Align', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_header_sub_menu_align',
										 'type'     => 'select',
										 'choices'  => array('is-submenu-align-center' => 'Center',
															 'is-submenu-align-left'   => 'Left',
															 'is-submenu-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_nav_sub_menu',
								   array('default'           => '10',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_font_size_nav_sub_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_nav_sub_menu',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_font_weight_nav_sub_menu',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_letter_spacing_nav_sub_menu',
								   array('default'           => '1',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_letter_spacing_nav_sub_menu',
								   array('label'    => esc_html__('Sub Menu Letter Spacing (px)', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_letter_spacing_nav_sub_menu',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_header_menu_text_transform',
								   array('default'           => 'is-menu-uppercase',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_header_menu_text_transform',
								   array('label'    => esc_html__('Menu Text Transform', 'theblogger'),
										 'section'  => 'theblogger_section_header_menu',
										 'settings' => 'theblogger_setting_header_menu_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-menu-uppercase'      => 'Uppercase',
															 'is-menu-none-uppercase' => 'None')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_footer_layout',
								   array('default'           => 'is-footer-full-width',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_footer_layout',
								   array('label'    => esc_html__('Footer Layout', 'theblogger'),
										 'section'  => 'theblogger_section_footer',
										 'settings' => 'theblogger_setting_footer_layout',
										 'type'     => 'select',
										 'choices'  => array('is-footer-full-width' => 'Full-width',
															 'is-footer-boxed'  	=> 'Boxed')));
		
		
		$wp_customize->add_setting('theblogger_setting_footer_columns',
								   array('default'           => '4',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_footer_columns',
								   array('label'       => esc_html__('Footer Columns', 'theblogger'),
										 'description' => esc_html__('Footer widget areas.', 'theblogger'),
										 'section'     => 'theblogger_section_footer',
										 'settings'    => 'theblogger_setting_footer_columns',
										 'type'        => 'select',
										 'choices'     => array('4' => '4 Columns',
																'3' => '3 Columns')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_footer_bg',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_footer_bg',
																  array('label'    => esc_html__('Footer Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_footer',
																		'settings' => 'theblogger_setting_color_footer_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_footer_subscribe_style',
								   array('default'           => 'is-footer-subscribe-light',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_footer_subscribe_style',
								   array('label'    => esc_html__('Footer Subscribe Style', 'theblogger'),
										 'section'  => 'theblogger_section_footer',
										 'settings' => 'theblogger_setting_footer_subscribe_style',
										 'type'     => 'select',
										 'choices'  => array('is-footer-subscribe-light' => 'Light',
															 'is-footer-subscribe-dark'  => 'Dark')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_footer_subscribe_bg',
								   array('default'           => '#fafafa',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_footer_subscribe_bg',
																  array('label'    => esc_html__('Footer Subscribe Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_footer',
																		'settings' => 'theblogger_setting_color_footer_subscribe_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_copyright_bar_bg',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_copyright_bar_bg',
																  array('label'    => esc_html__('Copyright Bar Background Color', 'theblogger'),
																		'section'  => 'theblogger_section_footer',
																		'settings' => 'theblogger_setting_color_copyright_bar_bg')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_copyright_bar_text',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_copyright_bar_text',
																  array('label'    => esc_html__('Copyright Bar Text Color', 'theblogger'),
																		'section'  => 'theblogger_section_footer',
																		'settings' => 'theblogger_setting_color_copyright_bar_text')));
		
		
		$wp_customize->add_setting('theblogger_setting_footer_widget_text_align',
								   array('default'           => 'is-footer-widgets-align-left',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_footer_widget_text_align',
								   array('label'    => esc_html__('Footer Widgets Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_footer',
										 'settings' => 'theblogger_setting_footer_widget_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-footer-widgets-align-left'   => 'Left',
															 'is-footer-widgets-align-center' => 'Center')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_blog',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_blog',
								   array('label'       => esc_html__('Blog Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for blog page.', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_blog',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_archive',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_archive',
								   array('label'       => esc_html__('Blog Archive Sidebar', 'theblogger'),
										 'description' => esc_html__('Applies to category/tag/author/date/search archives.', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_archive',
										 'type'        => 'select',
										 'choices'     => array('No'  => 'No',
																'Yes' => 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_post',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_post',
								   array('label'       => esc_html__('Post Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for single posts.', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_post',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_portfolio_category',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_portfolio_category',
								   array('label'       => esc_html__('Portfolio Category Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for portfolio category pages.', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_portfolio_category',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_portfolio_post',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_portfolio_post',
								   array('label'       => esc_html__('Portfolio Post Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for single portfolio posts.', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_portfolio_post',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_product_category',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_product_category',
								   array('label'       => esc_html__('Product Category Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for shop categories. (for WooCommerce plugin)', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_product_category',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_single_product',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_single_product',
								   array('label'       => esc_html__('Single Product Sidebar', 'theblogger'),
										 'description' => esc_html__('Activate sidebar area for individual product page. (for WooCommerce plugin)', 'theblogger'),
										 'section'     => 'theblogger_section_sidebar',
										 'settings'    => 'theblogger_setting_sidebar_single_product',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_position',
								   array('default'           => 'is-sidebar-right',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_sidebar_position',
								   array('label'    => esc_html__('Sidebar Position', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_sidebar_position',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-right' => 'Right',
															 'is-sidebar-left'  => 'Left')));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_sticky',
								   array('default'           => 'is-sidebar-sticky',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sidebar_sticky',
								   array('label'    => esc_html__('Sticky Sidebar', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_sidebar_sticky',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-sticky' 	=> 'Yes',
															 'is-sidebar-sticky-no' => 'No')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_sidebar',
								   array('default'           => '13',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_sidebar',
								   array('label'    => esc_html__('Sidebar Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_font_size_sidebar',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_widget_text_align',
								   array('default'           => 'is-sidebar-align-left',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_sidebar_widget_text_align',
								   array('label'    => esc_html__('Sidebar Widgets Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_sidebar_widget_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-sidebar-align-left'   => 'Left',
															 'is-sidebar-align-center' => 'Center')));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_widget_title_align',
								   array('default'           => 'is-widget-title-align-left',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_sidebar_widget_title_align',
								   array('label'    => esc_html__('Widget Title Align', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_sidebar_widget_title_align',
										 'type'     => 'select',
										 'choices'  => array('is-widget-title-align-left'   => 'Left',
															 'is-widget-title-align-center' => 'Center')));
		
		
		$wp_customize->add_setting('theblogger_setting_sidebar_widget_title_style',
								   array('default'           => 'is-widget-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_sidebar_widget_title_style',
								   array('label'    => esc_html__('Widget Title Style', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_sidebar_widget_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-widget-minimal'             => 'Minimal',
															 'is-widget-ribbon'              => 'Ribbon',
															 'is-widget-border'              => 'Border',
															 'is-widget-border-arrow'        => 'Border Arrow',
															 'is-widget-solid'               => 'Solid',
															 'is-widget-solid-arrow'         => 'Solid Arrow',
															 'is-widget-underline'           => 'Underline',
															 'is-widget-bottomline'          => 'Bottomline',
															 'is-widget-first-letter-border' => 'First Letter Border',
															 'is-widget-first-letter-solid'  => 'First Letter Solid',
															 'is-widget-line-cut'            => 'Line Cut',
															 'is-widget-line-cut-center'     => 'Line Cut Center')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_widget_title',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_widget_title',
								   array('label'    => esc_html__('Widget Title Font', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_font_widget_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_sidebar_widget_title',
								   array('default'           => '11',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_font_size_sidebar_widget_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_sidebar_widget_title',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_font_weight_sidebar_widget_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_letter_spacing_sidebar_widget_title',
								   array('default'           => '2',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_letter_spacing_sidebar_widget_title',
								   array('label'    => esc_html__('Widget Title Letter Spacing (px)', 'theblogger'),
										 'section'  => 'theblogger_section_sidebar',
										 'settings' => 'theblogger_setting_letter_spacing_sidebar_widget_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_color_widget_witle_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_widget_witle_bg_border',
																  array('label'    => esc_html__('Widget Title Bg/Border Color', 'theblogger'),
																		'section'  => 'theblogger_section_sidebar',
																		'settings' => 'theblogger_setting_color_widget_witle_bg_border')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_portfolio_page_layout',
								   array('default'           => 'layout-medium',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_portfolio_page_layout',
								   array('label' 	   => esc_html__('Page Layout', 'theblogger'),
										 'description' => esc_html__('For portfolio page template and portfolio category page.', 'theblogger'),
										 'section' 	   => 'theblogger_section_portfolio',
										 'settings'    => 'theblogger_setting_portfolio_page_layout',
										 'type' 	   => 'select',
										 'choices' 	   => array('layout-medium' => 'Default',
																'layout-fixed'  => 'Narrow',
																'layout-full' 	=> 'Full Width')));
		
		
		$wp_customize->add_setting('theblogger_setting_portfolio_page_grid_type',
								   array('default'           => 'masonry',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_portfolio_page_grid_type',
								   array('label'    => esc_html__('Grid Type', 'theblogger'),
										 'section'  => 'theblogger_section_portfolio',
										 'settings' => 'theblogger_setting_portfolio_page_grid_type',
										 'type'     => 'select',
										 'choices'  => array('masonry' 		  => 'Masonry',
															 'fitRows_square' => 'Fit Rows - (Square)',
															 'fitRows_wide'   => 'Fit Rows - (Wide)')));
		
		
		$wp_customize->add_setting('theblogger_setting_portfolio_page_post_width',
								   array('default'           => '320',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_portfolio_page_post_width',
								   array('label' 	   => esc_html__('Grid Post Width', 'theblogger'),
										 'description' => esc_html__('Default: 320 (px)', 'theblogger'),
										 'section' 	   => 'theblogger_section_portfolio',
										 'settings'    => 'theblogger_setting_portfolio_page_post_width',
										 'type' 	   => 'number',
										 'input_attrs' => array('min'  => 120,
																'max'  => 1200,
																'step' => 10)));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_shop_grid_type',
								   array('default'           => 'masonry',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_shop_grid_type',
								   array('label'    => esc_html__('Grid Type', 'theblogger'),
										 'section'  => 'theblogger_section_shop',
										 'settings' => 'theblogger_setting_shop_grid_type',
										 'type'     => 'select',
										 'choices'  => array('masonry' 		  => 'Masonry',
															 'fitRows_square' => 'Fit Rows - (Square)',
															 'fitRows_wide'   => 'Fit Rows - (Wide)')));
		
		
		$wp_customize->add_setting('theblogger_setting_shop_grid_item_width',
								   array('default'           => '320',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_shop_grid_item_width',
								   array('label' 	   => esc_html__('Grid Item Width', 'theblogger'),
										 'description' => esc_html__('Default: 320 (px)', 'theblogger'),
										 'section' 	   => 'theblogger_section_shop',
										 'settings'    => 'theblogger_setting_shop_grid_item_width',
										 'type' 	   => 'number',
										 'input_attrs' => array('min'  => 100,
																'max'  => 700,
																'step' => 10)));
		
		
		$wp_customize->add_setting(
			'theblogger_setting_products_per_page',
			array(
				'default'           => 8,
				'sanitize_callback' => 'theblogger_sanitize',
				'transport'         => 'refresh'
			)
		);
		
		$wp_customize->add_control(
			'theblogger_control_products_per_page',
			array(
				'label'       => esc_html__('Products Per Page', 'theblogger'),
				'description' => esc_html__('Number of products displayed per page.', 'theblogger'),
				'section'     => 'theblogger_section_shop',
				'settings'    => 'theblogger_setting_products_per_page',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1
				)
			)
		);
		
		
		$wp_customize->add_setting(
			'theblogger_setting_related_products_count',
			array(
				'default'           => 3,
				'sanitize_callback' => 'theblogger_sanitize',
				'transport'         => 'refresh'
			)
		);
		
		$wp_customize->add_control(
			'theblogger_control_related_products_count',
			array(
				'label'       => esc_html__('Related Products Count', 'theblogger'),
				'description' => esc_html__('Number of products to show.', 'theblogger'),
				'section'     => 'theblogger_section_shop',
				'settings'    => 'theblogger_setting_related_products_count',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 15,
					'step' => 1
				)
			)
		);
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_feat_area_width',
								   array('default'           => 'is-featured-area-fixed',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_feat_area_width',
								   array('label'    => esc_html__('Featured Area Width', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_general',
										 'settings' => 'theblogger_setting_feat_area_width',
										 'type'     => 'select',
										 'choices'  => array('is-featured-area-fixed'        => 'Fixed',
															 'is-featured-area-full'         => 'Full',
															 'is-featured-area-full-margins' => 'Full With Margins')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_nav_position',
								   array('default'           => 'is-slider-buttons-stick-to-edges',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_nav_position',
								   array('label'    => esc_html__('Slider Nav Position', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_nav_position',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-stick-to-edges' => 'Stick To Edges',
															 'is-slider-buttons-center-margin'  => 'Center Margin')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_nav_shape',
								   array('default'           => 'is-slider-buttons-sharp-edges',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_nav_shape',
								   array('label'    => esc_html__('Slider Nav Shape', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_nav_shape',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-sharp-edges' => 'Sharp Edges',
															 'is-slider-buttons-rounded'     => 'Rounded')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_nav_style',
								   array('default'           => 'is-slider-buttons-dark',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_nav_style',
								   array('label'    => esc_html__('Slider Nav Style', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_nav_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-buttons-dark'   => 'Dark',
															 'is-slider-buttons-light'  => 'Light',
															 'is-slider-buttons-border' => 'Border')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_title_style',
								   array('default'           => 'is-slider-title-default',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_title_style',
								   array('label'    => esc_html__('Slider Title Style', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-title-default'        				 => 'Default',
															 'is-slider-title-label' 		  				 => 'Label',
															 'is-slider-title-label is-slider-title-rotated' => 'Label Rotated',
															 'is-slider-title-inline-borders' 				 => 'Inline Borders',
															 'is-slider-title-stamp'         				 => 'Stamp',
															 'is-slider-title-border-bottom' 				 => 'Border Bottom',
															 'is-slider-title-3d-shadow' 					 => '3D Shadow',
															 'is-slider-title-3d-hard-shadow' 				 => '3D Hard Shadow',
															 'is-slider-title-dark-shadow' 					 => 'Dark Shadow',
															 'is-slider-title-retro-shadow' 				 => 'Retro Shadow',
															 'is-slider-title-comic-shadow' 				 => 'Comic Shadow',
															 'is-slider-title-futurist-shadow' 				 => 'Futurist Shadow')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_parallax_effect',
								   array('default'           => 'is-slider-parallax-no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_main_slider_parallax_effect',
								   array('label'    => esc_html__('Slider Parallax Effect', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-slider-parallax-no' => 'No',
															 'is-slider-parallax' 	 => 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_slider_title',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_slider_title',
								   array('label'    => esc_html__('Slider Title Font', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_font_slider_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_slider_title',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_slider_title',
								   array('label'    => esc_html__('Slider Title Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_font_weight_slider_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_letter_spacing_main_slider_title',
								   array('default'           => '0',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_letter_spacing_main_slider_title',
								   array('label'       => esc_html__('Slider Title Letter Spacing (px)', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_slider',
										 'settings'    => 'theblogger_setting_letter_spacing_main_slider_title',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_title_ratio',
								   array('default'           => '0.5',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_title_ratio',
								   array('label'       => esc_html__('Slider Title Text Ratio', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_slider',
										 'settings'    => 'theblogger_setting_font_title_ratio',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 2,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_title_text_transform',
								   array('default'           => 'is-slider-title-none-uppercase',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_title_text_transform',
								   array('label'    => esc_html__('Slider Title Text Transform', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_title_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-slider-title-none-uppercase' => 'None',
															 'is-slider-title-uppercase'      => 'Uppercase')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_meta_style',
								   array('default'           => 'is-cat-link-ribbon-left',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_meta_style',
								   array('label'    => esc_html__('Slider Meta Style', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_meta_style',
										 'type'     => 'select',
										 'choices'  => array('is-cat-link-default' 								=> 'Default',
															 'is-cat-link-borders' 								=> 'Borders',
															 'is-cat-link-borders is-cat-link-rounded' 	        => 'Borders Rounded',
															 'is-cat-link-borders-light' 						=> 'Borders Light',
															 'is-cat-link-borders-light is-cat-link-rounded'    => 'Borders Light Rounded',
															 'is-cat-link-solid' 								=> 'Solid',
															 'is-cat-link-solid is-cat-link-rounded' 		    => 'Solid Rounded',
															 'is-cat-link-solid-light' 							=> 'Solid Light',
															 'is-cat-link-solid-light is-cat-link-rounded'      => 'Solid Light Rounded',
															 'is-cat-link-ribbon' 								=> 'Ribbon',
															 'is-cat-link-ribbon-left' 							=> 'Ribbon Left',
															 'is-cat-link-ribbon-right' 						=> 'Ribbon Right',
															 'is-cat-link-ribbon is-cat-link-ribbon-dark' 		=> 'Ribbon Dark',
															 'is-cat-link-ribbon-left is-cat-link-ribbon-dark' 	=> 'Ribbon Dark Left',
															 'is-cat-link-ribbon-right is-cat-link-ribbon-dark' => 'Ribbon Dark Right',
															 'is-cat-link-border-bottom'					    => 'Border Bottom',
															 'is-cat-link-line-before' 							=> 'Line Before',
															 'is-cat-link-dots-bottom' 							=> 'Dots Bottom')));
		
		
		$wp_customize->add_setting('theblogger_setting_color_slider_meta_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_slider_meta_bg_border',
																  array('label'    => esc_html__('Slider Meta Bg/Border Color', 'theblogger'),
																		'section'  => 'theblogger_section_featured_area_slider',
																		'settings' => 'theblogger_setting_color_slider_meta_bg_border')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_more_link_visibility',
								   array('default'           => 'is-slider-more-link-show',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_more_link_visibility',
								   array('label'    => esc_html__('Slider More Link Visibility', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_more_link_visibility',
										 'type'     => 'select',
										 'choices'  => array('is-slider-more-link-show' 		 => 'Show',
															 'is-slider-more-link-show-on-hover' => 'Show on Hover',
															 'is-slider-more-link-hidden' 		 => 'Hide')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_more_link_style',
								   array('default'           => 'is-slider-more-link-button-style',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_more_link_style',
								   array('label'    => esc_html__('Slider More Link Style', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_more_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-slider-more-link-minimal' 		 => 'Minimal',
															 'is-slider-more-link-button-style'  => 'Button Like',
															 'is-slider-more-link-border-bottom' => 'Border Bottom')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_text_align',
								   array('default'           => 'is-slider-text-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_text_align',
								   array('label'    => esc_html__('Slider Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-text-align-center' => 'Center',
															 'is-slider-text-align-left'   => 'Left',
															 'is-slider-text-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_vertical_align',
								   array('default'           => 'is-slider-v-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_vertical_align',
								   array('label'    => esc_html__('Slider Vertical Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_vertical_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-v-align-center' => 'Center',
															 'is-slider-v-align-top'    => 'Top',
															 'is-slider-v-align-bottom' => 'Bottom')));
		
		
		$wp_customize->add_setting('theblogger_setting_main_slider_horizontal_align',
								   array('default'           => 'is-slider-h-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_main_slider_horizontal_align',
								   array('label'    => esc_html__('Slider Horizontal Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_slider',
										 'settings' => 'theblogger_setting_main_slider_horizontal_align',
										 'type'     => 'select',
										 'choices'  => array('is-slider-h-align-center' => 'Center',
															 'is-slider-h-align-left'   => 'Left',
															 'is-slider-h-align-right'  => 'Right')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_link_box_title_style',
								   array('default'           => 'is-link-box-title-default',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_link_box_title_style',
								   array('label'    => esc_html__('Link Box Title Style', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_link_box_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-title-default' 						 => 'Default',
															 'is-link-box-title-label' 							 => 'Label',
															 'is-link-box-title-label is-link-box-title-rotated' => 'Label Rotated',
															 'is-link-box-title-inline-borders' 				 => 'Inline Borders',
															 'is-link-box-title-border-bottom' 					 => 'Border Bottom')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_link_box_title',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_link_box_title',
								   array('label'    => esc_html__('Link Box Title Font', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_font_link_box_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_font_weight_link_box_title',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_weight_link_box_title',
								   array('label'    => esc_html__('Link Box Title Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_font_weight_link_box_title',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_letter_spacing_link_box_title',
								   array('default'           => '0',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_letter_spacing_link_box_title',
								   array('label'       => esc_html__('Link Box Title Letter Spacing (px)', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_link_box',
										 'settings'    => 'theblogger_setting_letter_spacing_link_box_title',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => -5,
																'max'  => 20,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_title_ratio_link_box',
								   array('default'           => '0.5',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_font_title_ratio_link_box',
								   array('label'       => esc_html__('Link Box Title Text Ratio', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_link_box',
										 'settings'    => 'theblogger_setting_font_title_ratio_link_box',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0.1,
																'max'  => 2,
																'step' => 0.05)));
		
		
		$wp_customize->add_setting('theblogger_setting_link_box_text_transform',
								   array('default'           => 'is-link-box-title-transform-none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_link_box_text_transform',
								   array('label'    => esc_html__('Link Box Text Transform', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_link_box_text_transform',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-title-transform-none' => 'None',
															 'is-link-box-title-uppercase' 		=> 'Uppercase')));
		
		
		$wp_customize->add_setting('theblogger_setting_link_box_text_align',
								   array('default'           => 'is-link-box-text-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_link_box_text_align',
								   array('label'    => esc_html__('Link Box Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_link_box_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-text-align-center' => 'Center',
															 'is-link-box-text-align-left' 	 => 'Left',
															 'is-link-box-text-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_link_box_vertical_align',
								   array('default'           => 'is-link-box-v-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_link_box_vertical_align',
								   array('label'    => esc_html__('Link Box Vertical Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_link_box_vertical_align',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-v-align-center' => 'Center',
															 'is-link-box-v-align-top' 	  => 'Top',
															 'is-link-box-v-align-bottom' => 'Bottom')));
		
		
		$wp_customize->add_setting('theblogger_setting_link_box_parallax_effect',
								   array('default'           => 'is-link-box-parallax-no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_link_box_parallax_effect',
								   array('label'    => esc_html__('Link Box Parallax Effect', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_link_box',
										 'settings' => 'theblogger_setting_link_box_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-link-box-parallax-no' => 'No',
															 'is-link-box-parallax' => 'Yes')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_intro_text_align',
								   array('default'           => 'is-intro-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_text_align',
								   array('label'    => esc_html__('Intro Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-intro-align-center' => 'Center',
															 'is-intro-align-left'   => 'Left',
															 'is-intro-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_text_color',
								   array('default'           => 'is-intro-text-dark',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_text_color',
								   array('label'    => esc_html__('Intro Text Color', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_text_color',
										 'type'     => 'select',
										 'choices'  => array('is-intro-text-dark'  => 'Dark',
															 'is-intro-text-light' => 'Light')));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_top_bottom_padding',
								   array('default'           => '50',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_top_bottom_padding',
								   array('label'       => esc_html__('Intro Top-Bottom Padding', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_intro',
										 'settings'    => 'theblogger_setting_intro_top_bottom_padding',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 20,
																'max'  => 400,
																'step' => 10)));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_mask_color',
								   array('default'           => '#25262e',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_intro_mask_color',
																  array('label'    => esc_html__('Intro Mask Color', 'theblogger'),
																		'section'  => 'theblogger_section_featured_area_intro',
																		'settings' => 'theblogger_setting_intro_mask_color')));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_mask_opacity',
								   array('default'           => '0',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_mask_opacity',
								   array('label'       => esc_html__('Intro Mask Opacity', 'theblogger'),
										 'section'     => 'theblogger_section_featured_area_intro',
										 'settings'    => 'theblogger_setting_intro_mask_opacity',
										 'type'        => 'range',
										 'input_attrs' => array('min'  => 0,
																'max'  => 1,
																'step' => 0.1)));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_parallax_bg_img',
								   array('default'           => 'is-intro-parallax-no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_intro_parallax_bg_img',
								   array('label'    => esc_html__('Parallax Background Image', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_parallax_bg_img',
										 'type'     => 'select',
										 'choices'  => array('is-intro-parallax-no' => 'No',
															 'is-intro-parallax' 	=> 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_font_size',
								   array('default'           => '38',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_font_size',
								   array('label'    => esc_html__('Intro Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_font_size',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_font',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_font',
								   array('label'    => esc_html__('Intro Font', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_font',
										 'type'     => 'select',
										 'choices'  => $theblogger_fonts));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_font_weight',
								   array('default'           => '400',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_font_weight',
								   array('label'    => esc_html__('Intro Font Weight', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_font_weight',
										 'type'     => 'select',
										 'choices'  => $theblogger_font_weights));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_letter_spacing',
								   array('default'           => '0',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_letter_spacing',
								   array('label'    => esc_html__('Intro Letter Spacing (px)', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_letter_spacing',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => -10,
																'max'  => 50,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_intro_text_transform',
								   array('default'           => 'none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_intro_text_transform',
								   array('label'    => esc_html__('Intro Text Transform', 'theblogger'),
										 'section'  => 'theblogger_section_featured_area_intro',
										 'settings' => 'theblogger_setting_intro_text_transform',
										 'type'     => 'select',
										 'choices'  => array('none' 	 => 'None',
															 'uppercase' => 'Uppercase')));
		
		
		/* ================================================== */
		
		
		$theblogger_layouts = array('Regular'         => 'Regular',
									'Grid'            => 'Grid',
									'List'            => 'List',
									'Circles'         => 'Circles',
									'1st Full + Grid' => '1st Full + Grid',
									'1st Full + List' => '1st Full + List');
		
		
		$wp_customize->add_setting('theblogger_setting_layout_blog',
								   array('default'           => 'Regular',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_blog',
								   array('label'    => esc_html__('Blog', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_blog',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_layout_category',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_category',
								   array('label'    => esc_html__('Category Archive', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_category',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_layout_tag',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_tag',
								   array('label'    => esc_html__('Tag Archive', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_tag',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_layout_author',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_author',
								   array('label'    => esc_html__('Author Archive', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_author',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_layout_date',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_date',
								   array('label'    => esc_html__('Date Archive', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_date',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_layout_search',
								   array('default'           => 'Grid',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_layout_search',
								   array('label'    => esc_html__('Search Result', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_layout_search',
										 'type'     => 'select',
										 'choices'  => $theblogger_layouts));
		
		
		$wp_customize->add_setting('theblogger_setting_blog_text_align',
								   array('default'           => 'is-blog-text-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_blog_text_align',
								   array('label'    => esc_html__('Blog Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_blog_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-blog-text-align-center' => 'Center',
															 'is-blog-text-align-left'   => 'Left',
															 'is-blog-text-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_grid_type',
								   array('default'           => 'masonry',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_grid_type',
								   array('label'    => esc_html__('Grid Type', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_grid_type',
										 'type'     => 'select',
										 'choices'  => array('masonry' => 'masonry',
															 'fitRows' => 'fitRows')));
		
		
		$wp_customize->add_setting('theblogger_setting_grid_post_width',
								   array('default'           => '320',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_grid_post_width',
								   array('label'    => esc_html__('Grid Post Width (px)', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_grid_post_width',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 120,
																'max'  => 1200,
																'step' => 10)));
		
		
		$wp_customize->add_setting('theblogger_setting_sticky_posts',
								   array('default'           => 'exclude',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_sticky_posts',
								   array('label'    => esc_html__('Sticky Posts', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_sticky_posts',
										 'type'     => 'select',
										 'choices'  => array('exclude' => 'Exclude from blog',
															 'include' => 'Include to blog')));
		
		
		$wp_customize->add_setting('theblogger_setting_more_link_style',
								   array('default'           => 'is-more-link-button-style',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_more_link_style',
								   array('label'    => esc_html__('More Link Style', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_more_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-more-link-button-minimal' 		 => 'Minimal',
															 'is-more-link-button-style' 		 => 'Button Like',
															 'is-more-link-border-bottom' 		 => 'Border Bottom',
															 'is-more-link-border-bottom-light'  => 'Border Bottom Light',
															 'is-more-link-border-bottom-dotted' => 'Border Bottom Dotted')));
		
		
		$wp_customize->add_setting('theblogger_setting_automatic_excerpt',
								   array('default'           => 'standard',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_automatic_excerpt',
								   array('label' 	   => esc_html__('Automatic Excerpt', 'theblogger'),
										 'description' => esc_html__('Generates an excerpt from the post content.', 'theblogger'),
										 'section' 	   => 'theblogger_section_blog',
										 'settings'    => 'theblogger_setting_automatic_excerpt',
										 'type' 	   => 'select',
										 'choices' 	   => array('standard' => 'Yes - Only for standard format',
																'Yes'      => 'Yes - For all post formats',
																'No'       => 'No')));
		
		
		$wp_customize->add_setting('theblogger_setting_excerpt_length',
								   array('default'           => '65',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_excerpt_length',
								   array('label'       => esc_html__('Excerpt Length', 'theblogger'),
										 'description' => esc_html__('For regular layout. Default: 65 (words)', 'theblogger'),
										 'section'     => 'theblogger_section_blog',
										 'settings'    => 'theblogger_setting_excerpt_length',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 20,
																'max'  => 1000,
																'step' => 5)));
		
		
		$wp_customize->add_setting('theblogger_setting_excerpt_length_layout_grid',
								   array('default'           => '35',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_excerpt_length_layout_grid',
								   array('label'       => esc_html__('Blog Grid Excerpt Length', 'theblogger'),
										 'description' => esc_html__('For grid, list and circles layouts. Default: 35 (words)', 'theblogger'),
										 'section'     => 'theblogger_section_blog',
										 'settings'    => 'theblogger_setting_excerpt_length_layout_grid',
										 'type'        => 'number',
										 'input_attrs' => array('min'  => 20,
																'max'  => 1000,
																'step' => 5)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_excerpt',
								   array('default'           => '13',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_excerpt',
								   array('label'    => esc_html__('Excerpt Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_font_size_excerpt',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_blog_grid_excerpt',
								   array('default'           => '13',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_blog_grid_excerpt',
								   array('label'    => esc_html__('Blog Grid Excerpt Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_font_size_blog_grid_excerpt',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_blog_regular_post_title',
								   array('default'           => '34',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_blog_regular_post_title',
								   array('label'    => esc_html__('Blog Regular Post Title Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_font_size_blog_regular_post_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_blog_grid_post_title',
								   array('default'           => '22',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_blog_grid_post_title',
								   array('label'    => esc_html__('Blog Grid Post Title Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_font_size_blog_grid_post_title',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 9,
																'max'  => 200,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_numbered_pagination',
								   array('default'           => 'No',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_numbered_pagination',
								   array('label'    => esc_html__('Blog Navigation', 'theblogger'),
										 'section'  => 'theblogger_section_blog',
										 'settings' => 'theblogger_setting_numbered_pagination',
										 'type'     => 'select',
										 'choices'  => array('No'  => 'Older/Newer Links',
															 'Yes' => 'Numbered Pagination')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_post_style_global',
								   array('default'           => 'post-header-classic',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_post_style_global',
								   array('label'       => esc_html__('Post Style', 'theblogger'),
										 'description' => esc_html__('These setting may be overridden for individual articles.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_post_style_global',
										 'type'        => 'select',
										 'choices'     => array('post-header-classic' 						 	  			  => 'Classic',
																'is-top-content-single-medium' 	  						   	  => 'Classic Medium',
																'is-top-content-single-medium with-parallax' 	  			  => 'Classic Medium Parallax',
																'is-top-content-single-full' 		  						  => 'Classic Full',
																'is-top-content-single-full with-parallax' 				   	  => 'Classic Full Parallax',
																'is-top-content-single-full-margins' 						  => 'Classic Full with Margins',
																'is-top-content-single-full-margins with-parallax' 		   	  => 'Classic Full with Margins Parallax',
																'post-header-overlay post-header-overlay-inline is-post-dark' => 'Overlay',
																'is-top-content-single-medium with-overlay' 				  => 'Overlay Medium',
																'is-top-content-single-full with-overlay' 					  => 'Overlay Full',
																'is-top-content-single-full-margins with-overlay' 			  => 'Overlay Full with Margins',
																'is-top-content-single-medium with-title-full' 			   	  => 'Title Full',
																'post-header-classic is-featured-image-left' 				  => 'Image Left',
																'post-header-classic is-featured-image-right' 				  => 'Image Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_title_style',
								   array('default'           => 'is-single-post-title-default',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_post_title_style',
								   array('label'    => esc_html__('Post Title Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_post_title_style',
										 'type'     => 'select',
										 'choices'  => array('is-single-post-title-default'      => 'Default',
															 'is-single-post-title-with-margins' => 'Post Title With Margins')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_featured_image_position',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_post_featured_image_position',
								   array('label'       => esc_html__('Featured Image Position', 'theblogger'),
										 'description' => esc_html__('Also for featured videos.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_post_featured_image_position',
										 'type'        => 'select',
										 'choices'     => array('below_title' => 'Below Title',
																'above_title' => 'Above Title')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_page_title_text_align',
								   array('default'           => 'is-post-title-align-center',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_post_page_title_text_align',
								   array('label'    => esc_html__('Post-Page Title Text Align', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_post_page_title_text_align',
										 'type'     => 'select',
										 'choices'  => array('is-post-title-align-center' => 'Center',
															 'is-post-title-align-left'   => 'Left',
															 'is-post-title-align-right'  => 'Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_media_width',
								   array('default'           => 'is-post-media-fixed',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_post_media_width',
								   array('label'       => esc_html__('Post Media Width', 'theblogger'),
										 'description' => esc_html__('For images and embed media like video in content.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_post_media_width',
										 'type'        => 'select',
										 'choices'     => array('is-post-media-fixed'    => 'Fixed',
																'is-post-media-overflow' => 'Overflow')));
		
		
		$wp_customize->add_setting('theblogger_setting_share_links',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_share_links',
								   array('label'    => esc_html__('Share Links', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_share_links',
										 'type'     => 'select',
										 'choices'  => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_post_navigation',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_post_navigation',
								   array('label'       => esc_html__('Post Navigation', 'theblogger'),
										 'description' => esc_html__('For previous post/next post.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_post_navigation',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_author_info_box',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_author_info_box',
								   array('label'       => esc_html__('Author Info Box', 'theblogger'),
										 'description' => esc_html__('About post author module under post content.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_author_info_box',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_related_posts',
								   array('label'       => esc_html__('Related Posts', 'theblogger'),
										 'description' => esc_html__('Display related posts module.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_related_posts',
										 'type'        => 'select',
										 'choices'     => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts_category',
								   array('default'           => 'all',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_related_posts_category',
								   array('label'       => esc_html__('Related Posts Category', 'theblogger'),
										 'description' => esc_html__('Display posts from all categories or within same category of current post.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_related_posts_category',
										 'type'        => 'select',
										 'choices'     => array('all'  => esc_html__('All categories', 'theblogger'),
																'same' => esc_html__('Same category', 'theblogger'))));
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts_order',
								   array('default'           => 'rand',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_related_posts_order',
								   array('label'       => esc_html__('Related Posts Order', 'theblogger'),
										 'description' => esc_html__('Display posts order by.', 'theblogger'),
										 'section'     => 'theblogger_section_post',
										 'settings'    => 'theblogger_setting_related_posts_order',
										 'type'        => 'select',
										 'choices'     => array('rand'          => esc_html__('Random order', 'theblogger'),
																'date'          => esc_html__('Order by date', 'theblogger'),
																'comment_count' => esc_html__('Order by number of comments', 'theblogger'))));
		
		
		$wp_customize->add_setting(
			'theblogger_setting_related_posts_count',
			array(
				'default'           => 3,
				'sanitize_callback' => 'theblogger_sanitize',
				'transport'         => 'refresh'
			)
		);
		
		$wp_customize->add_control(
			'theblogger_control_related_posts_count',
			array(
				'label'       => esc_html__('Related Posts Count', 'theblogger'),
				'description' => esc_html__('Number of posts to show.', 'theblogger'),
				'section'     => 'theblogger_section_post',
				'settings'    => 'theblogger_setting_related_posts_count',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 15,
					'step' => 1
				)
			)
		);
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts_style',
								   array('default'           => 'overlay',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_related_posts_style',
								   array('label'    => esc_html__('Related Posts Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_related_posts_style',
										 'type'     => 'select',
										 'choices'  => array('overlay' => 'Overlay',
															 'classic' => 'Classic')));
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts_parallax_effect',
								   array('default'           => 'is-related-posts-parallax-no',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_related_posts_parallax_effect',
								   array('label'    => esc_html__('Related Posts Parallax Effect', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_related_posts_parallax_effect',
										 'type'     => 'select',
										 'choices'  => array('is-related-posts-parallax-no' => 'No',
															 'is-related-posts-parallax' 	=> 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_related_posts_width',
								   array('default'           => 'is-related-posts-fixed',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_related_posts_width',
								   array('label'    => esc_html__('Related Posts Width', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_related_posts_width',
										 'type'     => 'select',
										 'choices'  => array('is-related-posts-fixed'    => 'Fixed',
															 'is-related-posts-overflow' => 'Overflow')));
		
		
		$wp_customize->add_setting('theblogger_setting_tags',
								   array('default'           => 'Yes',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_tags',
								   array('label'    => esc_html__('Tags', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_tags',
										 'type'     => 'select',
										 'choices'  => $theblogger_setting_yes_no));
		
		
		$wp_customize->add_setting('theblogger_setting_author_info_box_style',
								   array('default'           => 'is-about-author-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_author_info_box_style',
								   array('label'    => esc_html__('Author Info Box Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_author_info_box_style',
										 'type'     => 'select',
										 'choices'  => array('is-about-author-minimal'      => 'Minimal',
															 'is-about-author-boxed'        => 'Boxed',
															 'is-about-author-boxed-dark'   => 'Boxed Dark',
															 'is-about-author-border'       => 'Border',
															 'is-about-author-border-arrow' => 'Border Arrow')));
		
		
		$wp_customize->add_setting('theblogger_setting_share_links_style',
								   array('default'           => 'is-share-links-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_share_links_style',
								   array('label'    => esc_html__('Share Links Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_share_links_style',
										 'type'     => 'select',
										 'choices'  => array('is-share-links-minimal' => 'Minimal',
															 'is-share-links-boxed'   => 'Boxed',
															 'is-share-links-border'  => 'Border')));
		
		
		$wp_customize->add_setting('theblogger_setting_tag_cloud_style',
								   array('default'           => 'is-tagcloud-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_tag_cloud_style',
								   array('label'    => esc_html__('Tag Cloud Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_tag_cloud_style',
										 'type'     => 'select',
										 'choices'  => array('is-tagcloud-minimal' => 'Minimal',
															 'is-tagcloud-solid'   => 'Solid')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_nav_image',
								   array('default'           => 'is-nav-single-rounded',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_post_nav_image',
								   array('label'    => esc_html__('Post Navigation Image', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_post_nav_image',
										 'type'     => 'select',
										 'choices'  => array('is-nav-single-rounded' => 'Rounded',
															 'is-nav-single-square'  => 'Square')));
		
		
		$wp_customize->add_setting('theblogger_setting_post_nav_animated',
								   array('default'           => 'is-nav-single-no-animated',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_post_nav_animated',
								   array('label'    => esc_html__('Post Navigation Animated', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_post_nav_animated',
										 'type'     => 'select',
										 'choices'  => array('is-nav-single-no-animated' => 'No',
															 'is-nav-single-animated'    => 'Yes')));
		
		
		$wp_customize->add_setting('theblogger_setting_comments_style',
								   array('default'           => 'is-comments-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_comments_style',
								   array('label'    => esc_html__('Comments Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_comments_style',
										 'type'     => 'select',
										 'choices'  => array('is-comments-minimal'                                             => 'Minimal',
															 'is-comments-boxed is-comments-boxed-solid'                       => 'Boxed',
															 'is-comments-boxed is-comments-border'                            => 'Border',
															 'is-comments-boxed is-comments-boxed-solid is-comments-image-out' => 'Boxed Image Out',
															 'is-comments-boxed is-comments-border is-comments-image-out'      => 'Border Image Out')));
		
		
		$wp_customize->add_setting('theblogger_setting_comment_image_shape',
								   array('default'           => 'is-comments-image-rounded',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_comment_image_shape',
								   array('label'    => esc_html__('Comment Image Shape', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_comment_image_shape',
										 'type'     => 'select',
										 'choices'  => array('is-comments-image-rounded'      => 'Circle',
															 'is-comments-image-soft-rounded' => 'Soft Rounded',
															 'is-comments-image-square'       => 'Square')));
		
		
		$wp_customize->add_setting('theblogger_setting_comment_form_style',
								   array('default'           => 'is-comment-form-minimal',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_comment_form_style',
								   array('label'    => esc_html__('Comment Form Style', 'theblogger'),
										 'section'  => 'theblogger_section_post',
										 'settings' => 'theblogger_setting_comment_form_style',
										 'type'     => 'select',
										 'choices'  => array('is-comment-form-minimal'                            => 'Minimal',
															 'is-comment-form-boxed is-comment-form-boxed-solid'  => 'Boxed',
															 'is-comment-form-boxed is-comment-form-border'       => 'Border',
															 'is-comment-form-boxed is-comment-form-border-arrow' => 'Border Arrow')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_meta_prefix_style',
								   array('default'           => 'is-meta-with-none',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_meta_prefix_style',
								   array('label'    => esc_html__('Meta Prefix Style', 'theblogger'),
										 'section'  => 'theblogger_section_meta_style',
										 'settings' => 'theblogger_setting_meta_prefix_style',
										 'type'     => 'select',
										 'choices'  => array('is-meta-with-none'   => 'None',
															 'is-meta-with-icons'  => 'Icons',
															 'is-meta-with-prefix' => 'Prefix Text')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_cat_link_style',
								   array('default'           => 'is-cat-link-border-bottom',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_meta_cat_link_style',
								   array('label'    => esc_html__('Category Link Style', 'theblogger'),
										 'section'  => 'theblogger_section_meta_style',
										 'settings' => 'theblogger_setting_meta_cat_link_style',
										 'type'     => 'select',
										 'choices'  => array('is-cat-link-link-style' 						  	=> 'Link Style',
															 'is-cat-link-regular' 							  	=> 'Regular Text',
															 'is-cat-link-border-bottom' 					  	=> 'Border Bottom',
															 'is-cat-link-borders' 							  	=> 'Borders',
															 'is-cat-link-borders is-cat-link-rounded' 		  	=> 'Borders Round',
															 'is-cat-link-borders-light' 					  	=> 'Borders Light',
															 'is-cat-link-borders-light is-cat-link-rounded'  	=> 'Borders Light Round',
															 'is-cat-link-solid' 							  	=> 'Solid',
															 'is-cat-link-solid is-cat-link-rounded' 		  	=> 'Solid Round',
															 'is-cat-link-solid-light' 						  	=> 'Solid Light',
															 'is-cat-link-solid-light is-cat-link-rounded' 	  	=> 'Solid Light Round',
															 'is-cat-link-underline' 						  	=> 'Underline',
															 'is-cat-link-line-before' 						  	=> 'Line Before',
															 'is-cat-link-ribbon' 						  	  	=> 'Ribbon',
															 'is-cat-link-ribbon-left' 						  	=> 'Ribbon Left',
															 'is-cat-link-ribbon-right' 					  	=> 'Ribbon Right',
															 'is-cat-link-ribbon is-cat-link-ribbon-dark' 	  	=> 'Ribbon Dark',
															 'is-cat-link-ribbon-left is-cat-link-ribbon-dark'  => 'Ribbon Dark Left',
															 'is-cat-link-ribbon-right is-cat-link-ribbon-dark' => 'Ribbon Dark Right')));
		
		
		$wp_customize->add_setting('theblogger_setting_font_size_meta',
								   array('default'           => '11',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_font_size_meta',
								   array('label'    => esc_html__('Meta Font Size (px)', 'theblogger'),
										 'section'  => 'theblogger_section_meta_style',
										 'settings' => 'theblogger_setting_font_size_meta',
										 'type'     => 'number',
										 'input_attrs' => array('min'  => 8,
																'max'  => 24,
																'step' => 1)));
		
		
		$wp_customize->add_setting('theblogger_setting_color_cat_link_bg_border',
								   array('default'           => "",
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'theblogger_control_color_cat_link_bg_border',
																  array('label'    => esc_html__('Category Link Bg/Border Color', 'theblogger'),
																		'section'  => 'theblogger_section_meta_style',
																		'settings' => 'theblogger_setting_color_cat_link_bg_border')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_cat',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_cat',
								   array('label'    => esc_html__('Category', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_cat',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_date',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_date',
								   array('label'    => esc_html__('Date', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_date',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_comment',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_comment',
								   array('label'    => esc_html__('Comment', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_comment',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_comment_hide_0',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_comment_hide_0',
								   array('label'    => esc_html__('Hide Comment if count is 0', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_comment_hide_0',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_author',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_author',
								   array('label'    => esc_html__('Author', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_author',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_share',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_share',
								   array('label'    => esc_html__('Share', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_share',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_like',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_like',
								   array('label'       => esc_html__('Like', 'theblogger'),
										 'description' => esc_html__('Install and activate', 'theblogger') . ' <a target="_blank" href="https://wordpress.org/plugins/i-recommend-this/">I Recommend This</a> plugin.',
										 'section'     => 'theblogger_section_meta_blog',
										 'settings'    => 'theblogger_setting_meta_blog_like',
										 'type'        => 'select',
										 'choices'     => array('above_title'   => 'Above Title',
																'below_title'   => 'Below Title',
																'below_content' => 'Below Content',
																'hidden' 		=> 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_blog_edit',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_blog_edit',
								   array('label'    => esc_html__('Edit', 'theblogger'),
										 'section'  => 'theblogger_section_meta_blog',
										 'settings' => 'theblogger_setting_meta_blog_edit',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_cat',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_cat',
								   array('label'    => esc_html__('Category', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_cat',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_date',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_date',
								   array('label'    => esc_html__('Date', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_date',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_comment',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_comment',
								   array('label'    => esc_html__('Comment', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_comment',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_comment_hide_0',
								   array('default'   		 => 1,
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport' 		 => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_comment_hide_0',
								   array('label'    => esc_html__('Hide Comment if count is 0', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_comment_hide_0',
										 'type'     => 'checkbox'));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_author',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_author',
								   array('label'    => esc_html__('Author', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_author',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_share',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_share',
								   array('label'    => esc_html__('Share', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_share',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_like',
								   array('default'           => 'below_title',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_like',
								   array('label'       => esc_html__('Like', 'theblogger'),
										 'description' => esc_html__('Install and activate', 'theblogger') . ' <a target="_blank" href="https://wordpress.org/plugins/i-recommend-this/">I Recommend This</a> plugin.',
										 'section'     => 'theblogger_section_meta_post',
										 'settings'    => 'theblogger_setting_meta_post_like',
										 'type'        => 'select',
										 'choices'     => array('above_title'   => 'Above Title',
																'below_title'   => 'Below Title',
																'below_content' => 'Below Content',
																'hidden' 		=> 'Hidden')));
		
		
		$wp_customize->add_setting('theblogger_setting_meta_post_edit',
								   array('default'           => 'hidden',
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'refresh'));
		
		$wp_customize->add_control('theblogger_control_meta_post_edit',
								   array('label'    => esc_html__('Edit', 'theblogger'),
										 'section'  => 'theblogger_section_meta_post',
										 'settings' => 'theblogger_setting_meta_post_edit',
										 'type'     => 'select',
										 'choices'  => array('above_title'   => 'Above Title',
															 'below_title'   => 'Below Title',
															 'below_content' => 'Below Content',
															 'hidden' 		 => 'Hidden')));
		
		
		/* ================================================== */
		
		
		$wp_customize->add_setting('theblogger_setting_custom_css',
								   array('default'           => "",
										 'sanitize_callback' => 'theblogger_sanitize',
										 'transport'         => 'postMessage'));
		
		$wp_customize->add_control('theblogger_control_custom_css',
								   array('label'    => esc_html__('Custom CSS', 'theblogger'),
										 'section'  => 'theblogger_section_custom_css',
										 'settings' => 'theblogger_setting_custom_css',
										 'type'     => 'textarea'));
		
		
		/* ================================================== */
		
		
		$wp_customize->get_setting('blogname')->transport 		 = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	}
	
	add_action('customize_register', 'theblogger_customize_register__settings');

?>