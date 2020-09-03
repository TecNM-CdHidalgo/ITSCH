<?php

	function theblogger_check_font_type($font)
	{
		$font_local = strpos($font, 'FONT_LOCAL_'); // Check for local font.
		
		if ($font_local !== false)
		{
			$local_font_name = substr($font, 11); //  Remove: FONT_LOCAL_
			$font = "'" . $local_font_name . "', sans-serif";
		}
		else
		{
			// This is a Google font.
			$font = "'" . $font . "'";
		}
		
		return $font;
	}
	
	
	function theblogger_enqueue__inline_style()
	{
		$custom_css = "";
		
		
		// Font Family
		
		$theblogger_setting_font_text_logo = get_theme_mod('theblogger_setting_font_text_logo');
		
		if (! empty($theblogger_setting_font_text_logo))
		{
			$theblogger_setting_font_text_logo = theblogger_check_font_type($theblogger_setting_font_text_logo);
			$custom_css .= ".site-title { font-family: {$theblogger_setting_font_text_logo}; }";
		}
		
		
		$theblogger_setting_font_menu = get_theme_mod('theblogger_setting_font_menu');
		
		if (! empty($theblogger_setting_font_menu))
		{
			$theblogger_setting_font_menu = theblogger_check_font_type($theblogger_setting_font_menu);
			$custom_css .= PHP_EOL . PHP_EOL . ".nav-menu, .entry-meta, .owl-nav, .more-link, label, input[type=submit], input[type=button], button, .button, .page-links, .navigation, .entry-title i, .site-info, .filters { font-family: {$theblogger_setting_font_menu}; }";
		}
		
		
		$theblogger_setting_font_widget_title = get_theme_mod('theblogger_setting_font_widget_title');
		
		if (! empty($theblogger_setting_font_widget_title))
		{
			$theblogger_setting_font_widget_title = theblogger_check_font_type($theblogger_setting_font_widget_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-family: {$theblogger_setting_font_widget_title}; }";
		}
		
		
		$theblogger_setting_font_h1 = get_theme_mod('theblogger_setting_font_h1');
		
		if (! empty($theblogger_setting_font_h1))
		{
			$theblogger_setting_font_h1 = theblogger_check_font_type($theblogger_setting_font_h1);
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li a, .widget_pages ul li, .widget_nav_menu ul li, .widget_archive ul li, .widget_most_recommended_posts ul li a, .widget_calendar table caption, .tptn_title, .nav-single a { font-family: {$theblogger_setting_font_h1}; }";
		}
		
		
		$theblogger_setting_font_h2_h6 = get_theme_mod('theblogger_setting_font_h2_h6');
		
		if (! empty($theblogger_setting_font_h2_h6))
		{
			$theblogger_setting_font_h2_h6 = theblogger_check_font_type($theblogger_setting_font_h2_h6);
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .tab-titles { font-family: {$theblogger_setting_font_h2_h6}; }";
		}
		
		
		$theblogger_setting_font_slider_title = get_theme_mod('theblogger_setting_font_slider_title');
		
		if (! empty($theblogger_setting_font_slider_title))
		{
			$theblogger_setting_font_slider_title = theblogger_check_font_type($theblogger_setting_font_slider_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-family: {$theblogger_setting_font_slider_title}; }";
		}
		
		
		$theblogger_setting_font_body = get_theme_mod('theblogger_setting_font_body');
		
		if (! empty($theblogger_setting_font_body))
		{
			$theblogger_setting_font_body = theblogger_check_font_type($theblogger_setting_font_body);
			$custom_css .= PHP_EOL . PHP_EOL . "body, input, textarea, select, button { font-family: {$theblogger_setting_font_body}; }";
		}
		
		
		$theblogger_setting_intro_font = get_theme_mod('theblogger_setting_intro_font');
		
		if (! empty($theblogger_setting_intro_font))
		{
			$theblogger_setting_intro_font = theblogger_check_font_type($theblogger_setting_intro_font);
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro h1 { font-family: {$theblogger_setting_intro_font}; } }";
		}
		
		
		$theblogger_setting_font_link_box_title = get_theme_mod('theblogger_setting_font_link_box_title');
		
		if (! empty($theblogger_setting_font_link_box_title))
		{
			$theblogger_setting_font_link_box_title = theblogger_check_font_type($theblogger_setting_font_link_box_title);
			$custom_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-family: {$theblogger_setting_font_link_box_title}; }";
		}
		
		
		// Font Size
		
		$theblogger_setting_font_size_text_logo = get_theme_mod('theblogger_setting_font_size_text_logo', '48');
		
		if ($theblogger_setting_font_size_text_logo != '48')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-header .site-title { font-size: {$theblogger_setting_font_size_text_logo}px; } }";
		}
		
		
		$theblogger_setting_font_size_blog_regular_post_title = get_theme_mod('theblogger_setting_font_size_blog_regular_post_title', '34');
		
		if ($theblogger_setting_font_size_blog_regular_post_title != '34')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-regular .entry-title { font-size: {$theblogger_setting_font_size_blog_regular_post_title}px; } }";
		}
		
		
		$theblogger_setting_font_size_blog_grid_post_title = get_theme_mod('theblogger_setting_font_size_blog_grid_post_title', '22');
		
		if ($theblogger_setting_font_size_blog_grid_post_title != '22')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-small .entry-title { font-size: {$theblogger_setting_font_size_blog_grid_post_title}px; } }";
		}
		
		
		$theblogger_setting_font_size_h1 = get_theme_mod('theblogger_setting_font_size_h1', '48');
		
		if ($theblogger_setting_font_size_h1 != '48')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { h1 { font-size: {$theblogger_setting_font_size_h1}px; } }";
		}
		
		
		$theblogger_setting_font_size_body = get_theme_mod('theblogger_setting_font_size_body', '14');
		
		if ($theblogger_setting_font_size_body != '14')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { font-size: {$theblogger_setting_font_size_body}px; } }";
		}
		
		
		$theblogger_setting_font_size_nav_menu = get_theme_mod('theblogger_setting_font_size_nav_menu', '11');
		
		if ($theblogger_setting_font_size_nav_menu != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-size: {$theblogger_setting_font_size_nav_menu}px; } }";
		}
		
		
		$theblogger_setting_font_size_excerpt = get_theme_mod('theblogger_setting_font_size_excerpt', '13');
		
		if ($theblogger_setting_font_size_excerpt != '13')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream .entry-content { font-size: {$theblogger_setting_font_size_excerpt}px; } }";
		}
		
		
		$theblogger_setting_font_size_blog_grid_excerpt = get_theme_mod('theblogger_setting_font_size_blog_grid_excerpt', '13');
		
		if ($theblogger_setting_font_size_blog_grid_excerpt != '13')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .blog-stream.blog-small .entry-content { font-size: {$theblogger_setting_font_size_blog_grid_excerpt}px; } }";
		}
		
		
		$theblogger_setting_font_size_sidebar = get_theme_mod('theblogger_setting_font_size_sidebar', '13');
		
		if ($theblogger_setting_font_size_sidebar != '13')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .sidebar { font-size: {$theblogger_setting_font_size_sidebar}px; } }";
		}
		
		
		$theblogger_setting_font_size_sidebar_widget_title = get_theme_mod('theblogger_setting_font_size_sidebar_widget_title', '11');
		
		if ($theblogger_setting_font_size_sidebar_widget_title != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-size: {$theblogger_setting_font_size_sidebar_widget_title}px; }";
		}
		
		
		$theblogger_setting_font_size_nav_sub_menu = get_theme_mod('theblogger_setting_font_size_nav_sub_menu', '9');
		
		if ($theblogger_setting_font_size_nav_sub_menu != '9')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-size: {$theblogger_setting_font_size_nav_sub_menu}px; } }";
		}
		
		
		$theblogger_setting_intro_font_size = get_theme_mod('theblogger_setting_intro_font_size', '38');
		
		if ($theblogger_setting_intro_font_size != '38')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro h1 { font-size: {$theblogger_setting_intro_font_size}px; } }";
		}
		
		
		$theblogger_setting_font_size_meta = get_theme_mod('theblogger_setting_font_size_meta', '11');
		
		if ($theblogger_setting_font_size_meta != '11')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".entry-meta { font-size: {$theblogger_setting_font_size_meta}px; }";
		}
		
		
		// Font Weight
		
		$theblogger_setting_font_weight_text_logo = get_theme_mod('theblogger_setting_font_weight_text_logo', "");
		
		if ($theblogger_setting_font_weight_text_logo != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-title { font-weight: {$theblogger_setting_font_weight_text_logo}; }";
		}
		
		
		$theblogger_setting_font_weight_h1 = get_theme_mod('theblogger_setting_font_weight_h1', "");
		
		if ($theblogger_setting_font_weight_h1 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3 { font-weight: {$theblogger_setting_font_weight_h1}; }";
		}
		
		
		$theblogger_setting_font_weight_h2_h6 = get_theme_mod('theblogger_setting_font_weight_h2_h6', "");
		
		if ($theblogger_setting_font_weight_h2_h6 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { font-weight: {$theblogger_setting_font_weight_h2_h6}; }";
		}
		
		
		$theblogger_setting_font_weight_slider_title = get_theme_mod('theblogger_setting_font_weight_slider_title', "");
		
		if ($theblogger_setting_font_weight_slider_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".slider-box .entry-title { font-weight: {$theblogger_setting_font_weight_slider_title}; }";
		}
		
		
		$theblogger_setting_font_weight_sidebar_widget_title = get_theme_mod('theblogger_setting_font_weight_sidebar_widget_title', "");
		
		if ($theblogger_setting_font_weight_sidebar_widget_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { font-weight: {$theblogger_setting_font_weight_sidebar_widget_title}; }";
		}
		
		
		$theblogger_setting_font_weight_nav_menu = get_theme_mod('theblogger_setting_font_weight_nav_menu', "");
		
		if ($theblogger_setting_font_weight_nav_menu != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { font-weight: {$theblogger_setting_font_weight_nav_menu}; } }";
		}
		
		
		$theblogger_setting_font_weight_nav_sub_menu = get_theme_mod('theblogger_setting_font_weight_nav_sub_menu', "");
		
		if ($theblogger_setting_font_weight_nav_sub_menu != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { font-weight: {$theblogger_setting_font_weight_nav_sub_menu}; } }";
		}
		
		
		$theblogger_setting_intro_font_weight = get_theme_mod('theblogger_setting_intro_font_weight', "");
		
		if ($theblogger_setting_intro_font_weight != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { font-weight: {$theblogger_setting_intro_font_weight}; }";
		}
		
		
		$theblogger_setting_font_weight_link_box_title = get_theme_mod('theblogger_setting_font_weight_link_box_title', "");
		
		if ($theblogger_setting_font_weight_link_box_title != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".link-box .entry-title { font-weight: {$theblogger_setting_font_weight_link_box_title}; }";
		}
		
		
		// Letter Spacing
		
		$theblogger_setting_letter_spacing_main_slider_title = get_theme_mod('theblogger_setting_letter_spacing_main_slider_title', '0');
		
		if ($theblogger_setting_letter_spacing_main_slider_title != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .slider-box .entry-title { letter-spacing: {$theblogger_setting_letter_spacing_main_slider_title}px; } }";
		}
		
		
		$theblogger_setting_letter_spacing_nav_menu = get_theme_mod('theblogger_setting_letter_spacing_nav_menu', '1');
		
		if ($theblogger_setting_letter_spacing_nav_menu != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu > ul { letter-spacing: {$theblogger_setting_letter_spacing_nav_menu}px; } }";
		}
		
		
		$theblogger_setting_letter_spacing_nav_sub_menu = get_theme_mod('theblogger_setting_letter_spacing_nav_sub_menu', '1');
		
		if ($theblogger_setting_letter_spacing_nav_sub_menu != '1')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .nav-menu ul ul { letter-spacing: {$theblogger_setting_letter_spacing_nav_sub_menu}px; } }";
		}
		
		
		$theblogger_setting_letter_spacing_sidebar_widget_title = get_theme_mod('theblogger_setting_letter_spacing_sidebar_widget_title', '2');
		
		if ($theblogger_setting_letter_spacing_sidebar_widget_title != '2')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".widget-title { letter-spacing: {$theblogger_setting_letter_spacing_sidebar_widget_title}px; }";
		}
		
		
		$theblogger_setting_intro_letter_spacing = get_theme_mod('theblogger_setting_intro_letter_spacing', '0');
		
		if ($theblogger_setting_intro_letter_spacing != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { letter-spacing: {$theblogger_setting_intro_letter_spacing}px; }";
		}
		
		
		$theblogger_setting_letter_spacing_link_box_title = get_theme_mod('theblogger_setting_letter_spacing_link_box_title', '0');
		
		if ($theblogger_setting_letter_spacing_link_box_title != '0')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .link-box .entry-title { letter-spacing: {$theblogger_setting_letter_spacing_link_box_title}px; } }";
		}
		
		
		// Text Transform
		
		$theblogger_setting_intro_text_transform = get_theme_mod('theblogger_setting_intro_text_transform', "");
		
		if ($theblogger_setting_intro_text_transform != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro h1 { text-transform: {$theblogger_setting_intro_text_transform}; }";
		}
		
		
		$theblogger_setting_text_transform_h1 = get_theme_mod('theblogger_setting_text_transform_h1', "");
		
		if ($theblogger_setting_text_transform_h1 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h1, .entry-title, .footer-subscribe h3, .widget_categories ul li, .widget_recent_entries ul li, .widget_pages ul li, .widget_archive ul li, .widget_calendar table caption, .tptn_title, .nav-single a { text-transform: {$theblogger_setting_text_transform_h1}; }";
		}
		
		
		$theblogger_setting_text_transform_h2_h6 = get_theme_mod('theblogger_setting_text_transform_h2_h6', "");
		
		if ($theblogger_setting_text_transform_h2_h6 != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "h2, h3, h4, h5, h6, blockquote, .comment-meta .fn { text-transform: {$theblogger_setting_text_transform_h2_h6}; }";
		}
		
		
		// Line Height
		
		$theblogger_setting_body_line_height = get_theme_mod('theblogger_setting_body_line_height', '1.8');
		
		if ($theblogger_setting_body_line_height != '1.8')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { html { line-height: {$theblogger_setting_body_line_height}; } }";
		}
		
		
		$theblogger_setting_logo_height = get_theme_mod('theblogger_setting_logo_height', '80');
		
		if ($theblogger_setting_logo_height != '80')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-header .site-title img { max-height: {$theblogger_setting_logo_height}px; } }";
		}
		
		
		$theblogger_setting_logo_height_mobile = get_theme_mod('theblogger_setting_logo_height_mobile', '60');
		
		if ($theblogger_setting_logo_height_mobile != '60')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (max-width: 991px) { .site-title img { max-height: {$theblogger_setting_logo_height_mobile}px; } }";
		}
		
		
		// Other
		
		$theblogger_setting_logo_margin = get_theme_mod('theblogger_setting_logo_margin', '50');
		
		if ($theblogger_setting_logo_margin != '50')
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site-branding { padding: {$theblogger_setting_logo_margin}px 0; } }";
		}
		
		
		$theblogger_setting_intro_top_bottom_padding = get_theme_mod('theblogger_setting_intro_top_bottom_padding', "");
		
		if ($theblogger_setting_intro_top_bottom_padding != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .intro { padding: {$theblogger_setting_intro_top_bottom_padding}px 0; } }";
		}
		
		
		$theblogger_setting_body_top_bottom_margin = get_theme_mod('theblogger_setting_body_top_bottom_margin', "");
		
		if ($theblogger_setting_body_top_bottom_margin != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "@media screen and (min-width: 992px) { .site { margin-top: {$theblogger_setting_body_top_bottom_margin}px; margin-bottom: {$theblogger_setting_body_top_bottom_margin}px; } }";
		}
		
		
		$theblogger_setting_content_width = get_theme_mod('theblogger_setting_content_width', '1060');
		
		if ($theblogger_setting_content_width != '1060')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".layout-medium, .is-header-row .header-wrap-inner, .is-header-small .header-wrap-inner, .is-menu-bar.is-menu-fixed-bg .menu-wrap, .is-header-fixed-width .header-wrap, .is-header-fixed-width.is-menu-bar .site-navigation, .is-body-boxed .site, .is-body-boxed .header-wrap, .is-body-boxed.is-menu-bar .site-navigation, .is-body-boxed:not(.is-menu-bar) .site-header, .is-middle-boxed .site-main, .intro-content, .is-footer-boxed .site-footer, .is-content-boxed .site-main .layout-fixed { max-width: {$theblogger_setting_content_width}px; }";
		}
		
		
		$theblogger_setting_page_post_content_width = get_theme_mod('theblogger_setting_page_post_content_width', '740');
		
		if ($theblogger_setting_page_post_content_width != '740')
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".layout-fixed, .blog-list, .blog-regular, .is-content-boxed .single .site-content, .is-content-boxed .page .site-content { max-width: {$theblogger_setting_page_post_content_width}px; }";
		}
		
		
		// Color
		
		$theblogger_setting_color_link = get_theme_mod('theblogger_setting_color_link', "");
		
		if ($theblogger_setting_color_link != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a { color: {$theblogger_setting_color_link}; }";
		}
		
		
		$theblogger_setting_color_link_hover = get_theme_mod('theblogger_setting_color_link_hover', "");
		
		if ($theblogger_setting_color_link_hover != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "a:hover { color: {$theblogger_setting_color_link_hover}; }";
		}
		
		
		$theblogger_setting_color_header_bg = get_theme_mod('theblogger_setting_color_header_bg', "");
		
		if ($theblogger_setting_color_header_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-color: {$theblogger_setting_color_header_bg}; }";
		}
		
		
		$theblogger_setting_header_bg_img = get_theme_mod('theblogger_setting_header_bg_img', "");
		
		if ($theblogger_setting_header_bg_img != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .header-wrap { background-image: url({$theblogger_setting_header_bg_img}); }";
		}
		
		
		// start Header Mask Style
		$theblogger_setting_color_header_mask_1 = get_theme_mod('theblogger_setting_color_header_mask_1', "");
		$theblogger_setting_color_header_mask_2 = get_theme_mod('theblogger_setting_color_header_mask_2', "");
		$theblogger_setting_header_mask_style   = get_theme_mod('theblogger_setting_header_mask_style', 'none');
		
		if ($theblogger_setting_header_mask_style != 'none')
		{
			if (($theblogger_setting_header_mask_style == 'solid') && ($theblogger_setting_color_header_mask_1 != ""))
			{
				$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: {$theblogger_setting_color_header_mask_1}; }";
			}
			elseif (($theblogger_setting_header_mask_style == 'vertical') && ($theblogger_setting_color_header_mask_1 != "") && ($theblogger_setting_color_header_mask_2 != ""))
			{
				$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient({$theblogger_setting_color_header_mask_1}, {$theblogger_setting_color_header_mask_2}); }";
			}
			elseif (($theblogger_setting_header_mask_style == 'horizontal') && ($theblogger_setting_color_header_mask_1 != "") && ($theblogger_setting_color_header_mask_2 != ""))
			{
				$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: linear-gradient(to right, {$theblogger_setting_color_header_mask_1}, {$theblogger_setting_color_header_mask_2}); }";
			}
			elseif (($theblogger_setting_header_mask_style == 'radial') && ($theblogger_setting_color_header_mask_1 != "") && ($theblogger_setting_color_header_mask_2 != ""))
			{
				$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { background: radial-gradient(circle, {$theblogger_setting_color_header_mask_1}, {$theblogger_setting_color_header_mask_2}); }";
			}
		}
		// end Header Mask Style
		
		
		$theblogger_setting_header_mask_opacity = get_theme_mod('theblogger_setting_header_mask_opacity', "");
		
		if ($theblogger_setting_header_mask_opacity != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".header-wrap:before { opacity: {$theblogger_setting_header_mask_opacity}; }";
		}
		
		
		$theblogger_setting_intro_mask_color = get_theme_mod('theblogger_setting_intro_mask_color', "");
		
		if ($theblogger_setting_intro_mask_color != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro:before { background: {$theblogger_setting_intro_mask_color}; }";
		}
		
		
		$theblogger_setting_intro_mask_opacity = get_theme_mod('theblogger_setting_intro_mask_opacity', "");
		
		if ($theblogger_setting_intro_mask_opacity != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".intro:before { opacity: {$theblogger_setting_intro_mask_opacity}; }";
		}
		
		
		$theblogger_setting_color_menu_bg = get_theme_mod('theblogger_setting_color_menu_bg', "");
		
		if ($theblogger_setting_color_menu_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-header .menu-wrap { background-color: {$theblogger_setting_color_menu_bg}; }";
		}
		
		
		$theblogger_setting_color_menu_link_hover = get_theme_mod('theblogger_setting_color_menu_link_hover', "");
		
		if ($theblogger_setting_color_menu_link_hover != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".nav-menu ul a:hover { color: {$theblogger_setting_color_menu_link_hover}; }";
		}
		
		
		$theblogger_setting_color_body_text = get_theme_mod('theblogger_setting_color_body_text', "");
		
		if ($theblogger_setting_color_body_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { color: {$theblogger_setting_color_body_text}; }";
		}
		
		
		$theblogger_setting_color_body_bg = get_theme_mod('theblogger_setting_color_body_bg', "");
		
		if ($theblogger_setting_color_body_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "body { background: {$theblogger_setting_color_body_bg}; }";
		}
		
		
		$theblogger_setting_color_footer_bg = get_theme_mod('theblogger_setting_color_footer_bg', "");
		
		if ($theblogger_setting_color_footer_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer { background: {$theblogger_setting_color_footer_bg}; }";
		}
		
		
		$theblogger_setting_color_footer_subscribe_bg = get_theme_mod('theblogger_setting_color_footer_subscribe_bg', "");
		
		if ($theblogger_setting_color_footer_subscribe_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site .footer-subscribe { background: {$theblogger_setting_color_footer_subscribe_bg}; }";
		}
		
		
		$theblogger_setting_color_copyright_bar_bg = get_theme_mod('theblogger_setting_color_copyright_bar_bg', "");
		
		if ($theblogger_setting_color_copyright_bar_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { background-color: {$theblogger_setting_color_copyright_bar_bg}; }";
		}
		
		
		$theblogger_setting_color_copyright_bar_text = get_theme_mod('theblogger_setting_color_copyright_bar_text', "");
		
		if ($theblogger_setting_color_copyright_bar_text != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".site-footer .site-info { color: {$theblogger_setting_color_copyright_bar_text}; }";
		}
		
		
		$theblogger_setting_color_cat_link_bg_border = get_theme_mod('theblogger_setting_color_cat_link_bg_border', "");
		
		if ($theblogger_setting_color_cat_link_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-regular .cat-links a, .is-cat-link-borders .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-borders-light .cat-links a { color: {$theblogger_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-borders .cat-links a, .is-cat-link-borders-light .cat-links a, .is-cat-link-border-bottom .cat-links a, .is-cat-link-ribbon .cat-links a:before, .is-cat-link-ribbon .cat-links a:after, .is-cat-link-ribbon-left .cat-links a:before, .is-cat-link-ribbon-right .cat-links a:after, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a:after, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a:before, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a:after { border-color: {$theblogger_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-solid .cat-links a, .is-cat-link-solid-light .cat-links a, .is-cat-link-ribbon .cat-links a, .is-cat-link-ribbon-left .cat-links a, .is-cat-link-ribbon-right .cat-links a, .is-cat-link-ribbon.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-left.is-cat-link-ribbon-dark .cat-links a, .is-cat-link-ribbon-right.is-cat-link-ribbon-dark .cat-links a { background: {$theblogger_setting_color_cat_link_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$theblogger_setting_color_cat_link_bg_border}; }";
		}
		
		
		$theblogger_setting_color_slider_meta_bg_border = get_theme_mod('theblogger_setting_color_slider_meta_bg_border', "");
		
		if ($theblogger_setting_color_slider_meta_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-regular .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a, .main-slider-post.is-cat-link-dots-bottom .cat-links a:before { color: {$theblogger_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-borders .cat-links a, .main-slider-post.is-cat-link-borders-light .cat-links a, .main-slider-post.is-cat-link-border-bottom .cat-links a, .main-slider-post.is-cat-link-line-before .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:before, .main-slider-post.is-cat-link-ribbon .cat-links a:after, .main-slider-post.is-cat-link-ribbon-left .cat-links a:before, .main-slider-post.is-cat-link-ribbon-right .cat-links a:after { border-color: {$theblogger_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-solid .cat-links a, .main-slider-post.is-cat-link-solid-light .cat-links a, .main-slider-post.is-cat-link-ribbon .cat-links a, .main-slider-post.is-cat-link-ribbon-left .cat-links a, .main-slider-post.is-cat-link-ribbon-right .cat-links a { background: {$theblogger_setting_color_slider_meta_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".main-slider-post.is-cat-link-underline .cat-links a { box-shadow: inset 0 -7px 0 {$theblogger_setting_color_slider_meta_bg_border}; }";
		}
		
		
		$theblogger_setting_color_widget_witle_bg_border = get_theme_mod('theblogger_setting_color_widget_witle_bg_border', "");
		
		if ($theblogger_setting_color_widget_witle_bg_border != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span, .is-widget-solid .site-main .widget-title span, .is-widget-solid-arrow .site-main .widget-title span, .is-widget-first-letter-solid .site-main .widget-title span:first-letter { background: {$theblogger_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-ribbon .site-main .widget-title span:before, .is-widget-ribbon .site-main .widget-title span:after, .is-widget-border .site-main .widget-title span, .is-widget-border-arrow .site-main .widget-title span, .is-widget-bottomline .site-main .widget-title:after, .is-widget-first-letter-border .site-main .widget-title span:first-letter, .is-widget-line-cut .site-main .widget-title span:before, .is-widget-line-cut .site-main .widget-title span:after, .is-widget-line-cut-center .site-main .widget-title span:before, .is-widget-line-cut-center .site-main .widget-title span:after { border-color: {$theblogger_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-border-arrow .site-main .widget-title span:before, .is-widget-solid-arrow .site-main .widget-title span:after { border-top-color: {$theblogger_setting_color_widget_witle_bg_border}; }";
			
			$custom_css .= PHP_EOL . PHP_EOL . ".is-widget-underline .site-main .widget-title span { box-shadow: inset 0 -6px 0 {$theblogger_setting_color_widget_witle_bg_border}; }";
		}
		
		
		$theblogger_setting_color_button_hover_bg = get_theme_mod('theblogger_setting_color_button_hover_bg', "");
		
		if ($theblogger_setting_color_button_hover_bg != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . "input[type=submit]:hover, input[type=button]:hover, button:hover, a.button:hover, .more-link:hover { background-color: {$theblogger_setting_color_button_hover_bg}; }";
		}
		
		
		$theblogger_setting_custom_css = get_theme_mod('theblogger_setting_custom_css', "");
		
		if ($theblogger_setting_custom_css != "")
		{
			$custom_css .= PHP_EOL . PHP_EOL . $theblogger_setting_custom_css;
		}
		
		
		$custom_css = trim($custom_css);
		
		
		$main_style = get_theme_mod('theblogger_setting_main_style', "");
		
		if (! empty($main_style))
		{
			wp_add_inline_style('theblogger-main-style', $custom_css);
		}
		else
		{
			wp_add_inline_style('theblogger-style', $custom_css);
		}
	}
	
	
	function theblogger_after_setup_theme__inline_style()
	{
		add_action('wp_enqueue_scripts', 'theblogger_enqueue__inline_style');
	}
	
	add_action('after_setup_theme', 'theblogger_after_setup_theme__inline_style');

?>