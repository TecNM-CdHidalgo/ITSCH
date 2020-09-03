<?php

	function theblogger_font_subsets()
	{
		$font_subsets = "";
		
		if (get_theme_mod('theblogger_setting_font_char_sets_latin')) { $font_subsets .= 'latin,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_latin_ext')) { $font_subsets .= 'latin-ext,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_cyrillic')) { $font_subsets .= 'cyrillic,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_cyrillic_ext')) { $font_subsets .= 'cyrillic-ext,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_greek')) { $font_subsets .= 'greek,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_greek_ext')) { $font_subsets .= 'greek-ext,'; }
		if (get_theme_mod('theblogger_setting_font_char_sets_vietnamese')) { $font_subsets .= 'vietnamese,'; }
		
		if (! empty($font_subsets))
		{
			$font_subsets = substr($font_subsets, 0, -1); // Remove the last "," character. (Parameters: String, Start, Length.)
			$font_subsets = '&subset=' . $font_subsets;
		}
		
		return $font_subsets;
	}
	
	
	function theblogger_font_styles()
	{
		$font_styles 	 = ':400,400i,700,700i'; // Default font styles.
		$all_font_styles = get_theme_mod('theblogger_setting_font_styles', 'No');
		
		if ($all_font_styles == 'Yes')
		{
			$font_styles = ':100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}
		
		return $font_styles;
	}
	
	
	function theblogger_theme_fonts()
	{
		$theme_fonts  = "";
		$font_styles  = theblogger_font_styles();
		$font_subsets = theblogger_font_subsets();
		
		$customizer_fonts = array(
			get_theme_mod('theblogger_setting_font_text_logo'),
			get_theme_mod('theblogger_setting_font_menu'),
			get_theme_mod('theblogger_setting_font_widget_title'),
			get_theme_mod('theblogger_setting_font_h1'),
			get_theme_mod('theblogger_setting_font_h2_h6'),
			get_theme_mod('theblogger_setting_font_slider_title'),
			get_theme_mod('theblogger_setting_font_body'),
			get_theme_mod('theblogger_setting_intro_font'),
			get_theme_mod('theblogger_setting_font_link_box_title')
		);
		
		$customizer_fonts = array_unique($customizer_fonts);
		
		foreach ($customizer_fonts as $font)
		{
			if (! empty($font))
			{
				$font_local = strpos($font, 'FONT_LOCAL_'); // Check for local font.
				
				if (($font != "") && ($font_local === false))
				{
					// This is a Google font.
					$theme_fonts .= $font . $font_styles . '|'; // Include font styles.
				}
			}
		}
		
		if (! empty($theme_fonts))
		{
			$theme_fonts  = substr($theme_fonts, 0, -1); // Remove the last "|" character. (Parameters: String, Start, Length.)
			$theme_fonts .= $font_subsets;
		}
		
		return $theme_fonts;
	}
	
	
	function theblogger_fonts_url()
	{
		$font_url = "";
		$fonts    = theblogger_theme_fonts();
		
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		
		if (('off' !== _x('on', 'Google font: on or off', 'theblogger')) && (! empty($fonts)))
		{
			$font_url = add_query_arg('family', urlencode($fonts), '//fonts.googleapis.com/css');
		}
		
		return $font_url;
	}


/* ============================================================================================================================================= */


	function theblogger_fonts_local()
	{
		$customizer_fonts = array(
			get_theme_mod('theblogger_setting_font_text_logo'),
			get_theme_mod('theblogger_setting_font_menu'),
			get_theme_mod('theblogger_setting_font_widget_title'),
			get_theme_mod('theblogger_setting_font_h1'),
			get_theme_mod('theblogger_setting_font_h2_h6'),
			get_theme_mod('theblogger_setting_font_slider_title'),
			get_theme_mod('theblogger_setting_font_body'),
			get_theme_mod('theblogger_setting_intro_font'),
			get_theme_mod('theblogger_setting_font_link_box_title')
		);
		
		$customizer_fonts = array_unique($customizer_fonts);
		
		foreach ($customizer_fonts as $font)
		{
			if (! empty($font))
			{
				$font_local = strpos($font, 'FONT_LOCAL_'); // Check for local font.
				
				if ($font_local !== false)
				{
					$local_font_name   = substr($font, 11); //  Remove: FONT_LOCAL_
					$local_font_name   = strtolower($local_font_name);
					$local_font_folder = str_replace(' ', '-', $local_font_name); // Parameters: Old value, New value, String.
					$local_font_url    = get_template_directory_uri() . '/css/fonts/' . $local_font_folder . '/stylesheet.css';
					
					wp_enqueue_style('theblogger-font-' . $local_font_folder, esc_url($local_font_url));
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_enqueue_scripts__theme_styles()
	{
		$theme_directory_url = get_template_directory_uri();
		
		theblogger_fonts_local();
		wp_enqueue_style('theblogger-fonts', theblogger_fonts_url());
		wp_enqueue_style('normalize', $theme_directory_url . '/css/normalize.css');
		wp_enqueue_style('bootstrap', $theme_directory_url . '/css/bootstrap.css');
		wp_enqueue_style('fluidbox', $theme_directory_url . '/js/fluidbox/fluidbox.css');
		wp_enqueue_style('fontello', $theme_directory_url . '/css/fonts/fontello/css/fontello.css');
		wp_enqueue_style('magnific-popup', $theme_directory_url . '/js/jquery.magnific-popup/magnific-popup.css');
		wp_enqueue_style('owl-carousel', $theme_directory_url . '/js/owl-carousel/owl.carousel.css');
		wp_enqueue_style('theblogger-main', $theme_directory_url . '/css/main.css');
		wp_enqueue_style('theblogger-768', $theme_directory_url . '/css/768.css');
		wp_enqueue_style('theblogger-992', $theme_directory_url . '/css/992.css');
		wp_enqueue_style('theblogger-style', get_stylesheet_uri());
		
		$main_style = get_theme_mod('theblogger_setting_main_style', "");
		
		if ($main_style != "")
		{
			$main_style_url = $theme_directory_url . '/admin/main-style/' . $main_style . '/css/style.css';
			
			wp_enqueue_style('theblogger-main-style', esc_url($main_style_url));
		}
	}
	
	
	function theblogger_enqueue_scripts__theme_scripts()
	{
		$theme_directory_url = get_template_directory_uri();
		
		if (is_singular() && comments_open() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
		
		$smooth_scroll = get_theme_mod('theblogger_setting_smooth_scroll', 'no');
		
		if ($smooth_scroll == 'yes')
		{
			wp_enqueue_script('smooth-scroll', $theme_directory_url . '/js/smooth-scroll.js', array('jquery'), null, true);
		}
		
		wp_enqueue_script('fitvids', $theme_directory_url . '/js/jquery.fitvids.js', array('jquery'), null, true);
		wp_enqueue_script('jarallax', $theme_directory_url . '/js/jarallax.min.js', array('jquery'), null, true);
		wp_enqueue_script('jarallax-video', $theme_directory_url . '/js/jarallax-video.min.js', array('jquery'), null, true);
		wp_enqueue_script('fluidbox', $theme_directory_url . '/js/fluidbox/jquery.fluidbox.min.js', array('jquery'), null, true);
		wp_enqueue_script('validate', $theme_directory_url . '/js/jquery.validate.js', array('jquery'), null, true);
		wp_enqueue_script('isotope', $theme_directory_url . '/js/isotope.pkgd.min.js', array('jquery'), null, true);
		wp_enqueue_script('magnific-popup', $theme_directory_url . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', array('jquery'), null, true);
		wp_enqueue_script('owl-carousel', $theme_directory_url . '/js/owl-carousel/owl.carousel.min.js', array('jquery'), null, true);
		wp_enqueue_script('imagesloaded', $theme_directory_url . '/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
		wp_enqueue_script('collagePlus', $theme_directory_url . '/js/jquery.collagePlus.min.js', array('jquery'), null, true);
		wp_enqueue_script('fittext', $theme_directory_url . '/js/jquery.fittext.js', array('jquery'), null, true);
		wp_enqueue_script('resize-sensor', $theme_directory_url . '/js/resize-sensor.js', array('jquery'), null, true);
		wp_enqueue_script('sticky-sidebar', $theme_directory_url . '/js/jquery.sticky-sidebar.min.js', array('jquery'), null, true);
		wp_enqueue_script('theblogger-main', $theme_directory_url . '/js/main.js', array('jquery'), null, true);
	}
	
	
	function theblogger_after_setup_theme__enqueue_scripts()
	{
		add_action('wp_enqueue_scripts', 'theblogger_enqueue_scripts__theme_styles');
		add_action('wp_enqueue_scripts', 'theblogger_enqueue_scripts__theme_scripts');
	}
	
	add_action('after_setup_theme', 'theblogger_after_setup_theme__enqueue_scripts');


/* ============================================================================================================================================= */


	function theblogger_enqueue_admin()
	{
		$theme_directory_url = get_template_directory_uri();
		
		wp_enqueue_style('theblogger-admin', $theme_directory_url . '/admin/css/admin.css');
		wp_enqueue_script('theblogger-admin', $theme_directory_url . '/admin/js/admin.js', array('jquery'), null, true);
		wp_enqueue_media();
	}
	
	add_action('admin_enqueue_scripts', 'theblogger_enqueue_admin');


/* ============================================================================================================================================= */


	function theblogger_customize_controls()
	{
		$theme_directory_url = get_template_directory_uri();
		
		wp_enqueue_style('theblogger-customize-controls', $theme_directory_url . '/admin/css/customize-controls.css');
		wp_enqueue_script('theblogger-customize-controls', $theme_directory_url . '/admin/js/customize-controls.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), null, true);
	}
	
	add_action('customize_controls_enqueue_scripts', 'theblogger_customize_controls');
	
	
	function theblogger_customize_preview()
	{
		wp_enqueue_script('theblogger-customize-preview', get_template_directory_uri() . '/admin/js/customize-preview.js', array('customize-preview'), null, true);
	}
	
	add_action('customize_preview_init', 'theblogger_customize_preview');

?>